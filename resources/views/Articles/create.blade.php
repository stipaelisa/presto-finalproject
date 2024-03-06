<x-layout>
    <div class="container my-4">
        <div class="row justify-content-center ">
            <div id="create-size" class="col-12 col-md-6 bg-form rounded p-4 shadow">
            <h1>{{__('ui.createYourAd')}}</h1>
                <livewire:create-form :categories="$categories"/>
            </div>
        </div>
    </div>
</x-layout>