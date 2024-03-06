<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
            <h1 class="font-title text-center"> {{__("ui.ResultsForTheCategory")}}: {{__("ui.$category->name")}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5 justify-content-center">
            @if($articles->isNotEmpty())
            @foreach($articles as $article)
                <div class="col-12 col-md-3">
                    <x-article-card :article="$article"/>
                </div>
            @endforeach
            @else
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-12 col-md-6 text-center">
                        <h3 class="text-warning">{{__('ui.ThereAreNoAds')}}</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>