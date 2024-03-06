

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-category mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="https://picsum.photos/200" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{$article->title}}</h5>
                        <p class="card-text">{{$article->description}}</p>
                        <h6 class="card-text">€{{$article->price}}</h6>
                        <button class="btn btn-custom1 mt-3">Acquista</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>