<x-layout>

    @if (session('access.denied'))
    <div class="row justify-content-center mt-5 pt-3">
        <div class="alert alert-danger alert-dismissible fade show w-25" role="alert">
            {{ session('access.denied') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <x-masthead />
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center fs-1 fw-bold font-title  text-dark">{{__('ui.checkOutTheLatestAnnouncements')}}</h2>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row my-5 justify-content-center">
            @if($articles->isNotEmpty())
                @foreach ($articles as $article)
                    <div class="col-12 col-md-3 my-2 d-flex justify-content-center">
                        <x-article-card
                        :article='$article'
                        :categories='$categories'
                        />
                    </div>
                @endforeach
            @else
        </div>
        <div class="row justify-content-center my-5 py-5">
            <div class="col-12 col-md-3 text-center">
            <h3 class="text-warning font-title">{{__('ui.ThereAreNoAds')}}</h3>
            </div>
        </div>
            @endif
    </div>
</x-layout>