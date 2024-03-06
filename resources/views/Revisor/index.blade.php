

    <x-layout>
    <div class="container mt-5 pt-2">
        <div class="row mb-5">
            <div class="col-12 text-center ">
                <h1 class="font-title"> {{ $article_to_check ? 'Tutti gli annunci da revisionare:' : 'Non ci sono annunci da revisionare' }} </h1>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row my-5 text-center ">

            <div class="col-12 overflow-auto px-0  ">
            <table>
                <thead >
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Utente</th>
                    <th scope="col">Data aggiunta</th>
                    <th class="text-center" scope="col">Dettaglio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($article_to_check as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>{{$article->created_at->format('D d M Y')}}</td>
                    <td>
                        <div class="d-flex text-center justify-content-center">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$article->id}}" href="{{route('revisor.show', compact('article'))}}" class="btn btn-warning p-1" data-announcement="{{ $article->toJson() }}"><i class="fa-solid fa-eye"></i></a>
            

                        <!-- Modal -->
                        
                        <div class="modal fade" id="exampleModal{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Revisiona questo articolo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              
<!-- inizio bpody modale -->

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
                                    <div class="col-12 col-md-6 shadow-sm column text-start">
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
                                        
                                            <div class="col-12 col-md-5">
                                            
                                            <h5>Tags</h5>
                                            @foreach($article->images as $image)        
                                                @if($image->labels)
                                                @foreach($image->labels as $label)
                                                    <span class="badge rounded-pill text-bg-secondary my-1 fs-6">{{$label}}</span>
                                                @endforeach
                                                @endif
                                            @endforeach
                                                
                                            </div>
                                            <div class="col-12 col-md-7 mt-2">
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
<!-- 
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
                                @endforeach -->

                            @endif


<!-- fine body modale -->


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> X </button>
                            </div>
                            </div>
                        </div>
                        </div>

<!-- fine modale -->
                            </td>
                            
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
            </table>

            <div class="modal fade" id="modalDettagli" tabindex="-1" role="dialog" aria-labelledby="modalDettagliLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDettagliLabel">Dettagli annuncio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Informazioni sull'annuncio</p>
                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>
    </x-layout>