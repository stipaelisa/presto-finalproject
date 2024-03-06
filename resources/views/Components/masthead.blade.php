<header class="">
    <div class="container mt-5 mb-2">
      <div class="row align-items-center">
        <div class="col-12 col-md-7 text-center">
          <h1 class="fw-light my-2 display-3">{{__('ui.chooseWellChoose')}}<span id="logo" class="">Presto.</span></h1>
          <p class="lead mb-5 fs-4">{{__('ui.giveYourSecondHand')}}</p>
          @guest
            <a class="btn btn-header px-5 py-2 mx-3 fs-5 grow my-3" href="{{ route('register') }}">{{__('ui.signIn')}}</a>
          @endguest
          <a class="btn btn-header px-5 py-2 mx-3 fs-5 grow" href="{{ route('article.create') }}">{{__('ui.createYourAd')}}</a>
        </div>
          <div class="col-12 col-md-5 text-center masthead"></div>
      </div>
    </div>
</header>