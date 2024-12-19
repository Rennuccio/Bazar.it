<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Subcategory;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateArticle extends Component
{
    
    use WithFileUploads;
    
    #[Validate('required|min:3|max:50')]
    public $title;
    public $user_id;
    public $article;
    public $img;
    #[Validate('required|min:25|max:500')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    public $category_id;
    public $categories;
    #[Validate('required')]
    public $images = [];
    public $temporary_images;
    
    public function rules(){
        return [
            'title'=>'required|min:3|max:50',
            'description'=>'required|min:10|max:500',
            'price'=>'required|numeric',
            'category_id'=>'required'
        ];
    }
    
    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*' => 'required',
            'temporary_images' => 'required'
            ])){
                foreach ($this->temporary_images as $image){
                    $this->images[] = $image;
                }                
            }
        }
        
        public function removeImage($key)   {
            if (in_array($key, array_keys($this->images))) {
                unset($this->images[$key]);
            }
        }       
        
        public function store()
        {
            $this->validate();
            $this->article = Article::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'user_id' => Auth::id()
            ]);
            if (count($this->images) > 0){
                foreach ($this->images as $image) {
                    $newFileName = "articles/{$this ->article->id}";
                    $newImage = $this->article->images()->create(['path' => $image ->store($newFileName, 'public')]);                    
                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 300, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),

                        ])->dispatch($newImage->id);
                    }
                    File::deleteDirectory(storage_path('/app/public/livewire-tmp'));
                }
                session()->flash('success', 'Articolo creato con successo!');
                $this->cleanForm();
            }        
            
            
            protected function cleanForm(){
                $this->title = '';
                $this->description = '';
                $this->price = '';
                $this->category_id = '';
                $this->images = [];
                $this->temporary_images = '';            
            }
            
            
            public function render()
            {
                $categories = Category::All();
                return view('livewire.create-article', compact('categories'));
            }
        }
        