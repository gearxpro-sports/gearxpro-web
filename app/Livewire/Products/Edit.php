<?php

namespace App\Livewire\Products;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Term;
use App\Models\Attribute;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Livewire\Products\Forms\ProductForm;
use Illuminate\Database\Eloquent\Collection;
use Spatie\MediaLibraryPro\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;

    /**
     * @var Product
     */
    public Product $product;

    /**
     * @var ProductForm
     */
    public ProductForm $productForm;

    /**
     * @var bool
     */
   // public bool $simple_product = false;

    /**
     * @var Collection
     */
    public Collection $productVariants;

    /**
     * @var array
     */
    public array $productAttributesList;

    /**
     * @var array
     */
    public array $countriesAvailable;

    /**
     * @var array
     */
    public array $images = [];

    /**
     * @var Collection
     */
    public Collection $categories;

    public function mount()
    {
        $this->productForm->setProduct($this->product);
        $this->countriesAvailable = User::role(User::RESELLER)
                    ->with('country')
                    ->get()
                    ->map(function($item){
                        return [
                            'id'   => $item->country->id,
                            'iso'  => strtolower($item->country->iso2_code),
                            'name' => $item->country->name,
                        ];
                    })
                    ->sortBy('name')
                    ->toArray();
        $this->productAttributesList = $this->getCompleteAttributesArray();
        $this->loadProductVariants();

        foreach ($this->productVariants as $variant) {
            $this->images['var_'.$variant->id] = [];
        }

        $this->categories = Category::with('children')->whereNull('parent_id')->get();
    }

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.products.edit');
    }

    public function save()
    {
        $this->productForm->update();

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.products.updating.success'),
            type: 'success'
        );
    }

    public function updateSlug()
    {
        $this->productForm->updateSlug();
    }

    /**
     * @param array $attributes
     * @return bool|void
     */
    // TODO: verificare se é possibile semplificare alcuni passaggi
    public function generateVariants(array $attributes)
    {
        if (!$attributes) {
            return false;
        }

        // FIRST CHECK - Prevent fake terms ids
        // Get all terms ids
        $whiteListTermsIds = Term::pluck('id')->toArray();
        // Filter id attributes from fake ones
        $attributes = array_map(fn($values) => array_unique(array_filter($values, fn($item) => in_array($item, $whiteListTermsIds))), $attributes);

        $termsWithAttributes = [];
        foreach ($attributes as $attributeId => $terms) {
            foreach ($terms as $termId) {
                $termsWithAttributes[$attributeId][] = [
                    'term_id' => $termId,
                    'attribute_id' => $attributeId
                ];
            }
        }

        $termsSets =  $this->generateTermSets(array_values($termsWithAttributes));

        // Get all attribute sets in array format [attr1, attr2, attr3], [attr1, attr2, attr4], [attr1, attr5, attr3], ....
        $existingTermSets = $this->productVariants->map(function($item){
            $arrayIds = $item->terms->pluck('id')->toArray();
            sort($arrayIds);
            return $arrayIds;
        })->toArray();

        $newCombinations = [];
        $positionStart = $this->productVariants->count() > 0 ? $this->productVariants->count() : 1;
        foreach ($termsSets as $termSet) {

            // SECOND CHECK - Prevent duplicate combinations
            $tempTs = array_column($termSet, 'term_id');
            sort($tempTs);
            if (in_array($tempTs, $existingTermSets)) {
                continue;
            }

            $productVariant = ProductVariant::create([
                'product_id' => $this->product->id,
                'position'   => $positionStart,
            ]);
            $termSet = array_map(fn($item) => ['attribute_id' => $item['attribute_id']], array_column($termSet, null, 'term_id'));
            $productVariant->terms()->attach($termSet);
            $newCombinations[] = $productVariant;
            $positionStart++;
            $this->images['var_'.$productVariant->id] = [];
        }

        if ($this->productVariants->isEmpty()) {
            $this->dispatch('open-notification',
                title: __('notifications.titles.saving'),
                subtitle: __('notifications.product_variants.saving.success'),
                type: 'success'
            );
        } else {
            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.product_variants.updating.success'),
                type: 'success'
            );
        }

        $this->productVariants = $this->productVariants->merge(collect($newCombinations));

        if ($newCombinations) {
            $this->dispatch('list-updated');
        }
    }

    public function updateProductVariantOrder(array $list)
    {
        $list = array_column($list, 'order', 'value');
        $cases = $ids = $params = [];

        foreach ($this->productVariants as $productVariant) {
            $cases[]  = sprintf('WHEN %s THEN ?', $productVariant->id);
            $params[] = $list[$productVariant->id];
            $ids[]    = $productVariant->id;
        }

        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);

        if (!empty($ids)) {
            $updateQuery = sprintf('UPDATE %s SET `position` = CASE `id` %s END WHERE `id` in (%s)', app(ProductVariant::class)->getTable(), $cases, $ids);
            DB::update($updateQuery, $params);
        }

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.product_variants.updating.success'),
            type: 'success'
        );

        $this->loadProductVariants();
    }

    /**
     * @param ProductVariant $productVariant
     */
    #[On('product-variant-deleted')]
    public function removeVariant(ProductVariant $productVariant)
    {
        $this->productVariants = $this->productVariants->reject(fn($item) => $item->id === $productVariant->id);
        unset($this->images['var_'.$productVariant->id]);
        $productVariant->delete();
        $this->dispatch('open-notification',
            title: __('notifications.titles.deleting'),
            subtitle: __('notifications.product_variants.deleting.success'),
            type: 'success'
        );
    }

    /**
     * @param Category $category
     */
    public function updateCategories(Category $category)
    {
        $this->productForm->updateCategories($category);
    }

    /**
     * @return array
     */
    private function getCompleteAttributesArray(): array
    {
        $attributes = Attribute::with('terms')->get();
        $data = [];
        foreach ($attributes as $attribute) {
            $terms = [];
            foreach ($attribute->terms as $term) {
                $terms[$term->id] = [
                    'value' => $term->value,
                    'color' => $term->color,
                ];
            }
            $data[$attribute->id] = [
                'name' => $attribute->name,
                'terms' => $terms,
            ];
        }

        return $data;
    }

    /**
     * @param array $arrays
     * @param integer $currentIndex
     * @param array $currentCombination
     * @return array
     */
    private function generateTermSets(array $arrays, int $currentIndex = 0, array $currentCombination = []): array
    {
        if ($currentIndex == count($arrays)) {
            return [$currentCombination];
        }

        $combinations = [];
        foreach ($arrays[$currentIndex] as $value) {
            $newCombination = array_merge($currentCombination, [$value]);
            $combinations = array_merge($combinations, $this->generateTermSets($arrays, $currentIndex + 1, $newCombination));
        }

        return $combinations;
    }

    public function loadProductVariants()
    {
        $this->productVariants = $this->product->variants()->with('terms.attribute')->get();
        $this->dispatch('refresh-variant');
    }
}
