<div class="footer-dark">
        <footer>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3 item">
                        <a id="logo" href="/" class="fs-2 text-warning mb-3 text-decoration-none fontYellow">
                        Presto
                        </a>
                        <p class="m-0 text-light">© 2023 The Code Fellas</p>
                        <p class="text-muted">All rights reserved.</p>
                    </div>
                    <div class="col-md-3 item">
                        <h3>{{__('ui.support')}}</h3>
                        <ul>
                            <li><a href="#">{{__('ui.assistenza')}}</a></li>
                            <li><a href="#">{{__('ui.pubblicazione')}}</a></li>
                            <li><a href="#">{{__('ui.sicurezza')}}</a></li>
                        </ul>
                    </div>
                <div class="col-md-3 item">
                    <h3>{{__('ui.about')}}</h3>
                    <ul>
                        <li><a href="{{route('about-us')}}">{{__('ui.chisiamo')}}</a></li>
                        <li><a href="#">{{__('ui.servizi')}}</a></li>
                        <li><a href="#">{{__('ui.faqs')}}</a></li>
                        @auth
                        @if (!Auth::user()->is_revisor)
                        <li class="nav-item mb-2"><a href="{{route('become.revisor')}}" class="nav-link p-0 text-warning">Diventa revisore</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
                <div class="col-md-3 item text">
                    <h3>Hack63</h3>
                    <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus.</p>
                </div>
                <div class="col item social mt-4">
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></i></a>
                    <a href="https://twitter.com/?lang=en"><i class="fa-brands fa fa-twitter"></i></a>
                    <a href="https://twitter.com/?lang=en"><i class="fa-brands fa fa-youtube"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa fa-instagram"></i></a>
                    <a href="https://www.google.com/"><i class="fa-brands fa fa-google"></i></a>
                </div>
                </div>
                <p class="copyright">BBBootstrap.com &copy; 2023</p>
            </div>
        </footer>
    </div>