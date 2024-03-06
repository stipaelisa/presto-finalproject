@php
$category = $article->category->name
@endphp

<x-layout>
  @if($article)
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-6">
        @if ($article->images->isNotEmpty())
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($article->images as $image)
              <div class="swiper-slide">
                <img src="{{$image->getUrl(500, 500)}}" class="btn img-fluid d-block w-100" data-bs-toggle="modal" data-bs-target="#imageModal{{$image->id}}" alt="...">
              </div>
            @endforeach        
          </div>      

          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>

        @else          
              <img class="img-fluid mb-3" src="/img-default.png" alt="">        
        @endif
      
      </div>
      <div class="col-12 col-md-6 shadow-sm column">
          <h2 id="card-show-title" class="mb-3 mt-4 font-title">{{$article->title}}</h2>
          <hr class="divider w-auto">
          
          <div class="d-flex">
              <p class="text-muted"><i class="fa-regular text-primary fa-user me-2"></i>{{$article->user->name}}</p>
              <p class="text-muted"><i class="fa-regular text-primary fa-calendar me-2 mb-2 mx-3"></i>{{$article->created_at->format('d M Y')}}</p>
          </div>
          <p class="fs-6 mb-3">{{__('ui.category')}}: <span><a href="{{route('article.category', $article->category)}}" class="mb-3 text-decoration-none text-primary">{{__("ui.$category")}}</a></span></p>
          <h4 class="my-5 fs-2 fw-bold">€ {{$article->price}}</h4>
          <!-- <h5 class="mt-5 text-primary fw-bold">{{__('ui.description')}}</h5> -->
          <p class="fs-6 my-3">{{$article->description}}</p>
            
      </div>
    </div>
    
  </div>

  @foreach ($article->images as $image)
    <div class="modal fade" id="imageModal{{$image->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body p-0">
            <button class="btn text-danger position-absolute top-0 end-0" data-bs-dismiss="modal"><i class="fa-solid fa-2xl fa-xmark"></i></button>
            <img src="{{$image->getUrl(500, 500)}}" class="img-fluid w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
  @endforeach

  @endif



<div class="container my-3 shadow">
        <div class="row my-5 justify-content-around">
            @if($correlateArticles->isNotEmpty())
            <h2 class="fw-bold font-title text-center my-5">Annunci correlati</h2>
                @foreach ($correlateArticles as $article)
                    <div class="col-12 col-md-3 my-2 mb-5 d-flex">
                        <x-article-card
                        :article='$article'
                        />
                    </div>
                @endforeach
            @else
        </div>
        <div class="row justify-content-center my-5 py-5">
            <div class="col-12 col-md-3 text-center">
            <h3 class="text-warning font-title">{{__('ui.noRelatedAds')}}</h3>
            </div>
        </div>
            @endif
    </div>
</x-layout>