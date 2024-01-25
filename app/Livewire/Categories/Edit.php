<?php

namespace App\Livewire\Categories;

use DeepL\DeepLException;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Livewire\Categories\Forms\CategoryForm;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    /**
     * @var Category
     */
    public Category $category;

    /**
     * @var CategoryForm
     */
    public CategoryForm $categoryForm;

    /**
     * @var Collection
     */
    public Collection $childCategories;

    /**
     * @var Collection
     */
    public Collection $categories;

    public $image = null;

    /**
     * @var int|null
     */
    public ?int $existingToAdd = null;

    public $size_guide_tables = [];

    /**
     * @var string
     */
    public string $currentLang;

    public function mount()
    {
        $this->currentLang = config('app.locale');
        $this->categoryForm->setCategoryForm($this->category);
        $this->size_guide_tables =  (array) json_decode($this->category->size_guide);
        $this->loadCategories();
    }

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.categories.edit');
    }

    public function toggleSizeGuideTable($table) {
        if(!in_array($table, $this->size_guide_tables)) {
            $this->size_guide_tables[] = $table;
        } else {
            if (($k = array_search($table, $this->size_guide_tables)) !== false) {
                unset($this->size_guide_tables[$k]);
            }
            unset($this->size_guide_tables[$table]);
        }
    }

    public function update()
    {
        $this->categoryForm->update();

        if ($this->image) {
            if ($this->category->image) {
                storage::disk('public')->delete($this->category->image);
            }

            $image_path = Storage::disk('public')->put('categories/'. $this->category->name, $this->image);

            $this->category->update([
                'image' => $image_path,
            ]);
        }

        $this->category->update([
            'size_guide' => $this->size_guide_tables
        ]);

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.updating.success'),
            type: 'success'
        );
    }

    public function deleteParent()
    {
        $this->category->delete();

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     */
    public function deleteChild(Category $category)
    {
        $category->delete();
        $this->dispatch('open-notification',
            title: __('notifications.titles.deleting'),
            subtitle: __('notifications.categories.deleting.success'),
            type: 'success'
        );
        $this->dispatch('reload-child-categories');
    }

    #[On('reload-child-categories')]
    public function refresh(){
        $this->loadCategories();
        $this->existingToAdd = null;
    }

    public function addExisting()
    {
        Category::findOrFail((int) $this->existingToAdd)->update(['parent_id' => $this->category->id]);
        $this->refresh();
        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.updating.children_success'),
            type: 'success'
        );
    }

    /**
     * @param string $lang
     */
    public function setCurrentLang(string $lang)
    {
        $this->currentLang = $lang;
    }

    /**
     * @throws DeepLException
     */
    public function translateAllFields()
    {
        $this->categoryForm->translateAllFields($this->currentLang);
        $this->update();
    }

    private function loadCategories()
    {
        $categories = Category::where('id', '!=', $this->category->id)->orderBy('name->it')->get();
        $this->childCategories = $categories->where('parent_id', $this->category->id)->sortBy('id');
        $this->categories = $categories->whereNotIn('id', [$this->category->id, ...$this->childCategories->pluck('id')])->pluck('name', 'id');
    }
}
