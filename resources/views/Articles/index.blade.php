<x-layout>
    <div class="container mt-5 pt-4">
        <div class="row my-2">
            <div class="col"><h1 class="text-center fw-bold font-title ">{{__('ui.allArticles')}}</h1></div>
        </div>
        <div class="row mt-5">
        @if($articles->isNotEmpty())
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    <x-article-card :article='$article' />
                </div>
            @endforeach
            @else
        </div>
        <div class="row justify-content-center mt-5 py-5">
            <div class="col-12 col-md-3 text-center">
            <h3 class="text-warning font-title bg-title">Non ci sono Annunci</h3>
            </div>
        </div>
            @endif
        </div>
    </div>
</x-layout>