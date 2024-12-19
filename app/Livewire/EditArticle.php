<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditArticle extends Component
{

    use WithFileUploads;
    public $title;
    public $user_id;
    public $description;
    public $price;
    public $images = [];
    public $category_id;
    public $categories;
    public $article;
    public $temporary_images;

    public function mount()
    {
        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->images = $this->article->images;
        $this->price= $this->article->price;
        $this->category_id = $this->article->category_id;
    }

   

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'required|max:1024',
            'temporary_images' => 'required|max:5'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function update()
    {
        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth()->id(),
            'category_id' => $this->category_id,
        ]);
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $this->article->images()->create([
                    'path' => $image->store('images', 'public'),
                ]);
            }
        };
        $this->article->setAccepted(null);
        return redirect(route('article.index'))->with('success', 'Articolo modificato con successo! Il nostro staff revisionerà il tuo articolo!');
    }

    public function delete()
    {
        $this->article->delete();
        return redirect(route('article.index'))->with('success', 'Articolo eliminato con successo!');
    }

    public function render()
    {
        $categories =  Category::all();
        return view('livewire.edit-article', compact('categories'));
    }
}
