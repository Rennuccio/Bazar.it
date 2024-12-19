<x-layout>
    <!-- MAIN -->
    <main style="margin-top:10rem">
        <section class="min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center display-1 fw-lighter">{{__('ui.titleByCategory')}}{{$category->name}}</h1>
                    </div>
                </div>
                <div class="row h-100 ">
                    @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-6 col-xl-3 center my-3 d-flex flex-column">
                        <x-card :article="$article" />
                    </div>
                    @empty
                    <div class="col-12 text-center h-100">
                        <h3>
                            {{__('ui.noArticleFind')}}
                        </h3>
                        @auth
                        <a href="{{route('article.create')}}">
                            <button class="btn">
                                {{__('ui.titleViewCreate')}}
                            </button>
                        </a>
                        @endauth
                    </div>
                    @endforelse
                    <div class="w-100 center p-5">
                    {{$articles->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>


</x-layout>