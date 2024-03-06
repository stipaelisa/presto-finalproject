@php
$category = $article->category->name
@endphp

<div class="card card-style">
    <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500, 500) : '/img-default.png'}}" class="card-img-top p-3" alt="...">
    <div class="card-body">
      <h5 class="card-title font-title">{{$article->title}}</h5>
      <p id="card-price">€ {{$article->price}}</p>
      <div class="d-flex justify-content-between">
        <button class="btn btn-custom1 w-100 mx-1"><a class="text-decoration-none text-reset" href="{{route('article.category', $article->category->id)}}">{{__("ui.$category")}}</a></button>
        
        <a href="{{route('article.show', $article->id)}}" class="btn btn-custom btn-card w-100 mx-1">{{__('ui.details')}}</a>
      </div>

    </div>
</div>