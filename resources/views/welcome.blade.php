<x-layout>
    <!-- header -->
    <header id="headerWelcome" class="container-fluid center">
        <div class="row h-100 w-100 justify-content-around" id="rowHeaderWelcome">
            <div class="col-12 col-md-6 center">
                <div class="d-flex flex-column justify-content-start align-items-center">
                    @guest
                    <h2 class="display-1 text-light mt-5 p-5 mt-md-0">{{__('ui.welcomeHeader')}}</h2>

                    @endguest
                    @auth
                    <div class="center flex-column">
                        <h2 class="display-1 text-light ">{{__('ui.welcomeHeader')}},</h2>
                        <h2 class="display-1 text-light " style="text-transform: capitalize;">{{Auth::user()->name}}</h2>
                    </div>
                    @endauth
                </div>
            </div>

            @guest
            <!-- form LogIn -->
            <div class="col-12 col-md-6 center mt-5">
                <div class="container" id="containerFormWelcome">
                    <div class="heading">Sign In</div>
                    <form action="{{route('login')}}" method="POST" class="form">
                        @csrf
                        <input class="input" type="email" name="email" id="email" placeholder="E-mail">
                        <input class="input" type="password" name="password" id="password" placeholder="Password">
                        <input class="login-button" type="submit" value="Sign In">
                    </form>
                </div>
                <!-- end FormLogin -->
            </div>
            @endguest
            @auth
            @endauth
        </div>
    </header>
    @if(session()->has('error'))
    <div class="alert alert-danger text-center">
        {{session('error')}}
    </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif

    <!-- main -->
    <main>
        <!-- sectionWelcome1 -->
        <section class="p-3 center min-vh-100">
            <div class="container-fluid">
                <div class="row mt-5">
                    <!-- slide photo -->
                    <div class="col-12 col-md-12 col-lg-6 mt-5">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome1.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelocme2.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome3.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome4.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome5.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome6.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome7.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome8.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/media/welcome/photoSectionWelcome9.jpg" class="photoSectionWelcome" alt="Bazar.it">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end slide -->
                    <!-- intro -->
                    <div class="col-12 col-md-12 col-lg-6 mt-5 mt-lg-0 center flex-column">
                        <h3 class="display-3">{{__('ui.introSectionWelcomeOne')}}</h3>
                        <p class="fs-4">{{__('ui.introSectionWelcomeTwo')}}</p>
                        <div class="p-4 center flex-column">
                            <h3 class="p-3">{{__('ui.introSectionWelcomeThree')}}</h3>
                            @guest
                            <a href="{{route('login')}}">
                                <button class="btn">
                                    {{__('ui.buttonIntroWelcomeOneLogOn')}}
                                </button>
                            </a>
                            @endguest
                            @auth
                            <a href="{{route('article.create')}}">
                                <button class="btn">
                                    {{__('ui.buttonIntroWelcomeOneLogOn')}}
                                </button>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="w-100 center">
            <hr class="w-75">
        </div>

        <!-- section Welcome 2 -->
        <section class="container min-vh-100 my-3">
            <div class="row">
                <div class="col-12 p-3">
                    <h3>{{__('ui.titleLastArticle')}}</h3>
                </div>
                @forelse ($lastArticles as $lastArticle)
                <div class="col-12 col-md-6 col-lg-3 center">
                    <x-card3 :lastArticle='$lastArticle' />
                </div>
                @empty
                <div class="col-6 col-md-3">
                    <h1>{{__('ui.lastArticleEmpty')}}</h1>
                </div>
                @endforelse
            </div>
        </section>

        <div class="w-100 center">
            <hr class="w-75">
        </div>

        <!-- section welcome3 -->
        <section class="container center shadow my-2" id="sectionAllArticlesWelcome">
            <div class="row center">
                <div class="col-12 col-md-6 center flex-column">
                    <h3 class="p-3 fs-1">{{__('ui.titleSectionWelcomeTwo')}}</h3>
                    <a href="{{route('article.index')}}">
                        <button class="btn">{{__('ui.buttonSectionWelcomeTwo')}}</button>
                    </a>
                </div>
            </div>
        </section>
    </main>

</x-layout>
<!-- script swiper -->