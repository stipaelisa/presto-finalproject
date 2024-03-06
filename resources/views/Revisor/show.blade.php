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
          <h4 class="my-4">€ {{$article->price}}</h4>
          <div class="d-flex">
              <p class="text-muted"><i class="fa-regular fa-user me-2"></i>Caricato da: {{$article->user->name}}</p>
              <p class="text-muted"><i class="fa-regular fa-calendar me-2 mb-2 mx-3"></i>Data: {{$article->created_at->format('d M Y')}}</p>
          </div>
          <p class="mb-3">{{__('ui.category')}}: <span><a href="{{route('article.category', $article->category)}}" class="mb-3 text-decoration-none text-primary">{{$article->category->name}}</a></span></p>
          <h5>Descrizione</h5>
          <p class="my-3">{{$article->description}}</p>
            <div class="d-flex mb-3">
              <a href="{{route('revisor.index')}}" class="btn btn-custom my-2 me-2">Torna indietro</a>
              <form action="{{route('revisor.accept_article', ['article'=>$article])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-success text-light my-2 me-2" type="submit">Accetta</button>
              </form>
              <form action="{{route('revisor.reject_article', ['article'=>$article])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger text-light my-2 me-2" type="submit">Rifiuta</button>
              </form>
            </div>
      </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-6">
          <h5>Tags</h5>
          
            @if($image->labels)
              @foreach($image->labels as $label)
                <span class="badge rounded-pill text-bg-secondary fs-6">{{$label}}</span>
              @endforeach
            @endif
        </div>
        <div class="col-12 col-md-6">
          <h5>Revisione immagini</h5>
          Adulti: <span class="{{$image->adult}} me-3"></span>
          Satira: <span class="{{$image->spoof}} me-3"></span>
          Medicina: <span class="{{$image->medical}} me-3"></span>
          Violenza: <span class="{{$image->violence}} me-3"></span>
          Contenuto Ammiccante: <span class="{{$image->racy}} me-3"></span>
        </div>
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

</x-layout>