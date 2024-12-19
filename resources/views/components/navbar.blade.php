<nav class="d-flex align-items-center justify-content-center fixed-top container-fluid">
    <div class="row center">
        <div class="col-10 col-md-12 center mb-3">
            <div class="button-container">
                <a href="{{route('homepage')}}">
                    <button class="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
                            <path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>
                        </svg>
                    </button>
                </a>
                <button class="button">
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item p-2  text-capitalize" href="{{route('article.byCategory',$category)}}">{{__("ui.$category->name")}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </button>
                <a href="{{route('article.index')}}">
                    <button class="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                    </button>
                </a>
                <label class="popup">
                    <input type="checkbox" />
                    <div tabindex="0" class="burger">
                        <svg
                            viewBox="0 0 24 24"
                            fill="white"
                            height="20"
                            width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"></path>
                        </svg>
                    </div>
                    @guest
                    <nav class="popup-window">
                        <p class="text-center persona">{{__('ui.hiGuest')}}</p>
                        <ul>
                            <li>
                                <button class="button">
                                    <a class="dropdown-item" href="{{route('login')}}">{{__('ui.buttonIntroWelcomeOneLogOff')}}</a>
                                </button>
                            </li>
                            <li>
                                <button class="button">
                                    <a class="dropdown-item" href="{{route('register')}}">{{__('ui.register')}}</a>
                                </button>
                            </li>
                        </ul>
                    </nav>
                    @endguest
                    @auth
                    <nav class="popup-window">
                        <ul>
                            <li>
                                <p class="text-center persona">{{__('ui.hi')}}{{ Auth::user()->name }}</p>
                            </li>
                            @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <button>
                                    <a href="{{route('revisor.index')}}" class="dropdown-item">{{__('ui.dashReview')}} <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{\App\Models\Article::toBeRevisedCount()}}</span></a>
                                    <span></span>
                                </button>
                            </li>
                            @endif
                            <li>
                                <button class="center">
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">LogOut</a>
                                    <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none">
                                        @csrf
                                    </form>
                                </button>
                            </li>
                            </li>

                        </ul>
                    </nav>
                    @endauth
                </label>
            </div>
            <div class="mx-3 dropdown">
                <div class="dropdown ">
                    <button class="circle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(session('locale')=='')                        
                        <img src="{{asset('vendor/blade-flags/country-it.svg')}}" width="40px" height="40px" alt="" class="imgLanguageNavBar">
                        @elseif(session('locale')=='it')
                        <img src="{{asset('vendor/blade-flags/country-it.svg')}}" width="40px" height="40px" alt="" class="imgLanguageNavBar">
                        @elseif(session('locale')=='gb')
                        <img src="{{asset('vendor/blade-flags/country-gb.svg')}}" width="40px" height="40px" alt="" class="imgLanguageNavBar">
                        @elseif(session('locale')=='es')
                        <img src="{{asset('vendor/blade-flags/country-es.svg')}}" width="40px" height="40px" alt="" class="imgLanguageNavBar">
                        @elseif(session('locale')=='fr')
                        <img src="{{asset('vendor/blade-flags/country-fr.svg')}}" width="40px" height="40px" alt="" class="imgLanguageNavBar">
                        @endif
                    </button>
                    <ul class="dropdown-menu flag">
                        <li class="d-flex align-items-center w-100"><x-_locale lang='it' /></li>
                        <li class="d-flex align-items-center w-100"><x-_locale lang='gb' /></li>
                        <li class="d-flex align-items-center w-100"><x-_locale lang='es' /></li>
                        <li class="d-flex align-items-center w-100"><x-_locale lang='fr' /></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-10 col-md-10 center">
            <form class="d-flex w-100" role="search" method="GET" action="{{route('article.searcharticle')}}">
                <input class="form-control me-2" type="search" placeholder="Search" name='searchArticles' aria-label="Search">
                <button class="btn btn-outline-success center" style="width: 50px !important;" type="submit">{{__('ui.search')}}</button>
            </form>
        </div>
    </div>
</nav>