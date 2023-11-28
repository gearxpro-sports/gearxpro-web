<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;

    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var string
     */
    public string $description = '';

    /**
     * @var string
     */
    public $image = null;

    public function render()
    {
        return view('livewire.categories.create');
    }

    public function rules()
    {
        return [
            'name'        => 'required',
            'description' => 'nullable',
            'image'       => 'nullable',
        ];
    }

    public function save()
    {
        $this->validate();

        $image_path = null;

        if ($this->image) {
            $image_path = Storage::disk('public')->put('categories/'. $this->name, $this->image);
        }

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $image_path
        ]);

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.saving.success'),
            type: 'success'
        );

        return redirect()->route('categories.index');
    }
}
