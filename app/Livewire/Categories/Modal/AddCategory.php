<?php

namespace App\Livewire\Categories\Modal;

use App\Models\Category;
use DeepL\Translator;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class AddCategory extends ModalComponent
{
    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var Category|null
     */
    public ?Category $parentCategory = null;

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required',
    ];

    /**
     * @var bool
     */
    public bool $submitDisabled = false;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.categories.modal.add-category');
    }

    public function save()
    {
        $this->submitDisabled = true;

        $this->validate();

        $translator = new Translator(env('DEEPL_API_KEY'));

        $name = [];
        foreach(config('gearxpro.languages') as $iso => $langData) {
            $name[$iso] = $translator->translateText($this->name, config('app.locale'), $langData['trans_code'])->text;
        }

        $category = Category::create([
            'name' => $name,
            'parent_id' => $this->parentCategory?->id,
        ]);

        if (!$this->parentCategory) {
            return redirect()->route('categories.edit', ['category' => $category->id]);
        }

        $this->dispatch('open-notification',
            title: __('notifications.titles.saving'),
            subtitle: __('notifications.categories.saving.success'),
            type: 'success',
        );
        $this->dispatch('closeModal');
        $this->dispatch('reload-child-categories');
    }

    /**
     * @return bool
     */
    public static function destroyOnClose(): bool
    {
        return true;
    }
}
