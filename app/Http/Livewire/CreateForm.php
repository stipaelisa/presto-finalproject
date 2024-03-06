<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category_id;
    public $temporary_images;
    public $images = [];
    public $article;
    

    protected $messages = [

        'title.required' => 'Il titolo è obbligatorio.',
        'title.min' => 'Il titolo deve avere almeno 8 caratteri.',
        'description.required' => 'La descrizione è obbligatoria.',
        'description.min' => 'La descrizione deve avere almeno 30 caratteri.',
        'price.required' => 'Il prezzo è obbligatorio.',
        'temporary_images.*.image' => 'I file devono essere delle immagini.',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 1 mb.',
        'temporary_images.required' => 'L\'immagine è richiesta.',
        'images.image' => 'L\'immagine deve essere un\'immagine.',
        'images.max' => 'L\'immagine deve essere di un massimo di 1 mb.',
    ];

    protected $rules = [
        'title' => 'required|min:8',
        'description' => 'required|min:30',
        'price'=> 'required',
        'category_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];


    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' =>'image|max:1024',
        ])) {
           foreach($this->temporary_images as $image) {
            $this->images[] = $image;
           } 
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        
        $this->article = Auth::user()->articles()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price'=> $this->price, 
            'category_id' => $this->category_id,
            
        ]);

        if(count($this->images)) {
            foreach($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    
                    new ResizeImage($newImage->path, 500, 500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        $this->cleanForm();

        return redirect()->route('home')->with('message', 'Annuncio creato con successo. Sarà pubblicato dopo il controllo di un revisore!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = [];
        $this->temporary_images = [];
        $this->images = [];

    }

    public function render()
    {

        return view('livewire.create-form', ['categories' => Category::all()]);
    }
}
