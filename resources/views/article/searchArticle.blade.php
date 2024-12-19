<x-layout>
    <main style="margin-top:10rem">
        <section>
            <div class="container-fluid">
                <div class="row py-5 justify-content-center align-items-center">
                    <div class="col-12">
                        <h1 class="display-4 text-center">{{__('ui.result')}} <span class="fw-bold">{{$searchArticles}}</span></h1>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    @forelse ($articles as $article)
                    <div class="col-12 col-md-3 center my-2">
                        <x-card :article="$article" />
                    </div>
                    @empty
                    <div class="col-12">
                        <h3 class="text-center">
                            {{__('ui.noArticleResearch')}}
                        </h3>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div>
                    {{ $articles->links() }}
                </div>
            </div>
        </section>
    </main>
</x-layout>