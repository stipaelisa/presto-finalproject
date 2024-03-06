<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5 font-title"><h1>Bentornato, {{Auth::user()->name}}</h1></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table align-middle">
                    <thead >
                        <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th class="text-dark" scope="col">{{__('ui.title')}}</th>
                        <th class="text-dark" scope="col">{{__('ui.price')}}</th>
                        <th class="text-dark" scope="col">{{__('ui.date')}}</th>
                        <th class="text-dark" scope="col">{{__('ui.details')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                        <!-- <th scope="row">{{$article->id}}</th> -->
                        <td >{{$article->title}}</td>
                        <td>€ {{$article->price}}</td>
                        <td>{{$article->created_at->format('D d M Y')}}</td>
                        <td>
                            <a href="{{ route('article.show', $article)}}" class="btn btn-custom"><i class="fa-solid fa-eye"></i></a>
                            <!-- <a href="" class="btn btn-danger text-white">Cancella</a> -->
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>