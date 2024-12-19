<x-layout>
    <main style="margin-top:10rem">
        <section class="container mt-5 bg-light d-flex flex-column align-items-center justify-content-around" id="SectionShow">
            <div class="row w-100 center flex-column">
                <!-- user -->
                <div class="col-12 col-md-8 d-flex center justify-content-start my-2">
                    <span class="mx-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </span>
                    <p class="fs-4 fw-light m-0">{{$article->user->name}}</p>
                </div>
                <!-- image article -->
                <div class="col-12 col-md-8 mb-3 mt-3">
                    @if ($article->images->count() > 0)
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($article->images as $key => $image)
                            <div class="swiper-slide p-2">
                                <img src="{{ $image->getUrl(300, 300) }}" class="imageShowArticle " alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded shadow" alt="Nessuna foto inserita dall'utente">
                    @endif
                </div>
                <hr class="">
                <div class="col-12 col-md-8">
                    <!-- title article -->
                    <div class="col-12 px-4">
                        <p class="fs-2 fw-semibold"> {{$article->title}}</p>
                    </div>
                    <!-- price article -->
                    <div class="col-12 px-4">
                        <p class="fs-2 fw-semibold"> {{$article->price}} €</p>
                    </div>
                    <!-- category -->
                    <div class="col-12 d-flex flex-column px-4">
                        <label for="">{{__('ui.categoryCard')}}</label>
                        <a href="#" class="text-decoration-none text-dark fs-3">
                            <p class="text-capitalize">{{$article->category->name}}</p>
                        </a>
                    </div>
                    <!-- description -->
                    <div class="col-11 m-4 ">
                        <p class="m-0">{{__('ui.descriptionCard')}}</p>
                        <div class="descriptionArticleShow m-0">
                            <p class="fs-5 fw-light p-2"> {{$article->description}} </p>
                        </div>
                    </div>
                    @if(Auth::user() && Auth::user()->id == $article->user->id)
                    <!-- for utent -->
                    <div class="col-12 center p-3">
                        <a href="{{route('article.edit',$article)}}">
                            <button class="btnEdit">{{__('ui.editButton')}}</button>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <script>
        var swiper = new Swiper(".mySwiper", {
            grabCursor: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    shadow: true,
                    translate: [0, 0, -400],
                },
                next: {
                    translate: ["100%", 0, 0],
                },
            },
        });
    </script>

</x-layout>