<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var string
     */
    public string $description = '';

    public function render()
    {
        return view('livewire.categories.create');
    }

    public function rules() 
    {
        return [
            'name'        => 'required',
            'description' => 'nullable',
        ];
    }

    public function save()
    {
        $this->validate();

        Category::create($this->only(['name', 'description']));

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.saving.success'),
            type: 'success'
        );
        
        return redirect()->route('categories.index');
    }
}
