<x-layout>
    <!-- MAIN -->
    <main style="margin-top:10rem" class="center flex-column">
        <!-- section articles da revisionare -->
        <section class="min-vh-100 ">
            @if (session()->has('success'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{session('message')}}
                </div>
            </div>
            @endif
            <div class="container-fluid pt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded shadow bg-body-secondary">
                            <h1 class="display-5 text-center pb-2">
                                Revisor dashboard di {{Auth::user()->name}}
                            </h1>
                        </div>
                    </div>
                </div>
                @if ($article_to_check)
                <div class="row justify-content-center pt-5 h-100 ">
                    <div class="col-12">
                        <h2 class="p-3 text-center">{{__('ui.titleViewRevisor')}}</h2>
                    </div>
                    @if ($article_to_check->images->count())
                    @foreach ($article_to_check->images as $key => $image)
                    <div class="col-12 my-3">
                        <div class="row g-0">
                            <div class="col-12 col-md-6 center">
                                <img src="{{ $image->getUrl(300, 300) }}"
                                    class="img-fluid rounded-start" alt="Immagine {{$key + 1}} dell'articolo {{$article_to_check->title}}">
                            </div>
                            <div class="col-12 col-md-6 ps-3">
                                <div class="card-body">
                                    <h5>Labels</h5>
                                    @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                    #{{$label}},
                                    @endforeach
                                    @else
                                    <p class="fst-italic">No labels</p>
                                    @endif
                                </div>
                                <div class="container-fluid my-3">
                                    <div class="row">
                                        <h5>Ratings</h5>
                                        <div class="row justify-content-around">
                                            <div class="col-2 center flex-column">
                                                <div>adult</div>
                                                <div class="text-center mx-auto {{$image->adult}}"></div>
                                            </div>
                                            <div class="col-2 center flex-column">
                                                <div>violence</div>
                                                <div class="text-center mx-auto {{$image->violence}}"></div>
                                            </div>
                                            <div class="col-2 center flex-column">
                                                <div>spoof</div>
                                                <div class="text-center mx-auto {{$image->spoof}}"></div>
                                            </div>
                                            <div class="col-2 center flex-column">
                                                <div>racy</div>
                                                <div class="text-center mx-auto {{$image->racy}}"></div>
                                            </div>
                                            <div class="col-2 center flex-column">
                                                <div>medical</div>
                                                <div class="text-center mx-auto {{$image->medical}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ps-3">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    @else
                    <div class="col-12 col-md-8">
                        <div class="row">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 text-center mt-3">
                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="Immagine segnaposto"></img>
                                @endfor
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-11 container-fluid d-flex flex-column justify-content-between mt-4">
                <div class="row w-100 center" id="sectionRevisorArticle">
                    <div class="col-11 col-md-6 center flex-column">
                        <h3 class="text-center fw-light p-3">{{__('ui.detail')}}</h3>
                        <div class="w-75">
                            <div class="center flex-column">
                                <p class="fw-light fs-3 text-danger">{{__('ui.titleCreate')}}
                                <p class="mx-3 fs-3 fw-bold">{{$article_to_check->title}}</p>
                                </p>
                            </div>
                            <div class="center flex-column">
                                <p class="fw-light fs-3 text-danger">{{__('ui.userCard')}}
                                <p class="mx-3 fs-3 fw-bold">{{$article_to_check->user->name}}</p>
                                </p>
                            </div>
                            <div class="center flex-column">
                                <p class="fw-light fs-3 text-danger">{{__('ui.priceCard')}}
                                <p class="mx-3 fs-3 fw-bold">{{$article_to_check->price}} €</p>
                                </p>
                            </div>
                            <div class="center flex-column">
                                <p class="fw-light fs-3 text-danger">{{__('ui.categoryCard')}}
                                <p class="mx-3 fs-3 fw-bold">{{$article_to_check->category->name}}</p>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 h-75 center flex-column">
                        <h3 class="text-center fw-light p-3">{{__('ui.descriptionReview')}}</h3>
                        <div class="m-5 fs-3 border-1">
                            <p>{{$article_to_check->description}}</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 justify-content-around">
                        <form action="{{route('reject', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btnDenied btn-danger py-2 px-5 fw-bold">
                                {{__('ui.reject')}}
                            </button>
                        </form>
                        <form action="{{route('accept', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btnEdit py-2 px-5 fw-bold">
                                {{__('ui.accept')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="row justify-content-center h-100 align-items-center text-center">
                <div class="col-12 center h-100 flex-column sectionArticle">
                    <h1>{{__('ui.noArticleReview')}}</h1>
                    <a href="{{route('homepage')}}" class="btn btn-success">{{__('ui.backHome')}}</a>
                </div>
            </div>
            @endif
            </div>
        </section>

        <hr style="height: 5px; color:darkblue;" class="w-75">

        <!-- section da ricontrollare -->
        <section class="p-4 container_fluid">
            <div class="row w-100">
                <div class="col-12 d-flex flex-row container-fluid">
                    <div class="row w-100">
                        <div class="col-12 p-3">
                            <h2 class="text-center p-3">{{__('ui.controlArticle')}}</h2>
                        </div>
                        <div class="col-12 center p-4">
                            <div class="bg-warning p-4 center rounded-5">
                                <div class="center">
                                    <p class="m-0">Legend: </p>
                                </div>
                                <span class="mx-4 center">
                                    <div class="accepted"></div>
                                    <span>{{__('ui.accepted')}}</span>
                                </span>
                                <span class="center">
                                    <div class="denied"></div>
                                    <span>{{__('ui.denied')}}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-12 container-fluid">
                <div class="col-12 rounded-5 bg-light p-5">
                    <div class="row">
                        <div class="col-4 center mb-3">
                            <p>{{__('ui.titleCreate')}}</p>
                        </div>
                        <div class="col-4 center mb-3">
                            <p>Status</p>
                        </div>
                        <div class="col-4 center mb-3">
                            <p>CheckButton</p>
                        </div>
                        @foreach($articles_to_review as $articleReview)
                        <div class="col-4 center">
                            <p>{{$articleReview->title}}</p>
                        </div>
                        <div class="col-4 center">
                            @if($articleReview->is_accepted == 1)
                            <div class="accepted">
                            </div>
                            @elseif($articleReview->is_accepted == 0)
                            <div class="denied">
                            </div>
                            @endif
                        </div>
                        <div class="col-4 center">
                            <form action="{{route('new.revisor',$articleReview)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Check again</button>
                            </form>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr class="separationBar">
        </section>
    </main>




</x-layout>