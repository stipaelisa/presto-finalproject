<div>
    <form wire:submit.prevent="store">
    <div class="mb-3">
        <label  class="form-label">{{__('ui.title')}}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
        @error('title')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label  class="form-label">{{__('ui.description')}}</label>
        <textarea cols="30" rows="10" wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
        @error('description')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label  class="form-label">{{__('ui.category')}}</label>
        <select class="form-select" wire:model="category_id">
            <option class="text-muted" value="">{{__('ui.chooseCategory')}}</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{__("ui.$category->name")}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label  class="form-label">{{__('ui.price')}}</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" wire:model="price">   
        @error('price')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{__('ui.img')}}</label>
        <input name="images" type="file" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" wire:model="temporary_images">   
        @error('temporary_images.*')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    @if(!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Photo preview</p>
                <div class="row border border-2 border-warning rounded shadow py-4">
                    @foreach($images as $key=> $image)
                        <div class="col my-3">
                            <img class="img-preview img-fluid my-2" src="{{$image->temporaryUrl()}}" alt="">
                            <button type="button" class="btn btn-danger shadow d-block text-center text-white mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    
    <button type="submit" class="btn btn-custom1 my-3">{{__('ui.create')}}</button>
    </form>
</div>

   
