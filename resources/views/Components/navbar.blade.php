<div class="@if(Route::currentRouteName() == 'home') sticky-top @endif">
  <nav class="navbar navbar-expand-lg navbar-bg">
    <div class="container-fluid">
      <a class="navbar-brand" id="logo" href="{{ route('home') }}">Presto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- nuovo articolo e categorie --}}
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link link active" href="{{route('article.create')}}"><i class="fa-solid fa-square-plus me-2"></i>{{__('ui.createYourAd')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link active" aria-current="page" href="{{route('about-us')}}">{{__('ui.chisiamo')}}</a>
          </li> 
          <li class="nav-item dropdown nav-item nav-item-pc mb-1">
            <button class="btn nav-item link mt-1 dropBorder dropdown-toggle" type="button" data-bs-toggle="dropdown">
              {{__('ui.categories')}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('article.index') }}">{{__('ui.allArticles')}}</a></li>
              @foreach ($categories as $category)
                <li>
                  <a class="dropdown-item" href="{{route('article.category', $category)}}">{{__("ui.$category->name")}}</a>
                </li>
              @endforeach
            </ul>
          </li>
        </ul>

        {{-- form cerca --}}
        <div class="mx-auto searchInput nav-item-pc">
          <form class="input-group" role="search" action="{{ route('articles.search') }}" method="GET">
            <input name="searched" class="form-control" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
            <button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
        <hr>
        
        {{-- account e lingua --}}
        <p class="mb-2 collapse-p">Account</p>
        <ul class="navbar-nav ms-auto">
          @guest
            <li class="nav-item">
              <a class="nav-link link active" href="{{ route('login') }}">{{__('ui.login')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link active mx-2" href="{{ route('register') }}">{{__('ui.signIn')}}</a>
            </li>
          @endguest

          @auth
            <li class="nav-item">
              <a class="nav-link link active mx-2" href="{{ route('auth.dashboard', Auth::user()) }}">{{__('ui.welcome')}}, {{Auth::user()->name}}</a>
            </li>

            @if (Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="nav-link link btn mx-2 position-relative dropBorder" href="{{route('revisor.index')}}">
                {{__("ui.revisorArea")}}
                <span class="position-absolute mt-2 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Article::toBeRevisionedCount()}}
                  <span class="visually-hidden">Messaggi non letti</span>
                </span>        
              </a>
            </li>                  
            @endif
            
            <li class="nav-item">
              <form action="{{route('logout')}}" method="POST">
                  @csrf
                  <button class="nav-link link btn mx-2" href="{{ route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> {{__('ui.logout')}}</button>
              </form>
            </li>
          @endauth

          <hr>
          <p class="mb-2 collapse-p">Lingua</p>
          <li class="dropdown nav-item-pc"> 
            <a class="nav-link btn dropdown-toggle text-dark" href="#" id="languageDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-globe fs-5"></i>
            </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDrop">
                <li class="dropdown-item"><x-_locale lang='it' nation='it'/> IT</li>
                <li class="dropdown-item"><x-_locale lang='en' nation='en'/> EN</li>
                <li class="dropdown-item"><x-_locale lang='sard' nation='sard'/> SA</li>
              </ul>
          </li>
          <div class="d-flex justify-content-center">
            <a class="text-decoration-none text-dark nav-item-mobile" href="#"><x-_locale lang='it' nation='it'/></a>
            <a class="text-decoration-none text-dark nav-item-mobile" href="#"><x-_locale lang='en' nation='en'/></a>
            <a class="text-decoration-none text-dark nav-item-mobile" href="#"><x-_locale lang='sard' nation='sard'/></a>
          </div>
        </ul>
    </div>
  </nav>

  {{-- category and search mobile --}}
  <div class=" mb-0 nav-item-mobile container py-1 bg-white pb-2">
    <div class="row mt-2">
      <div class="col-4">
        <div class="dropdown">
          <button class="btn btn-warning navbar-bg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.categories')}}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('article.index') }}">{{__('ui.allArticles')}}</a></li>
              @foreach ($categories as $category)
                <li>
                  <a class="dropdown-item "href="{{route('article.category', $category)}}">{{__("ui.$category->name")}}</a>
                </li>
              @endforeach
            </ul>
        </div>
      </div>

      <div class="col-8">
        <form class="input-group" role="search" action="{{ route('articles.search') }}" method="GET">
          <input name="searched" class="form-control" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
          <button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>