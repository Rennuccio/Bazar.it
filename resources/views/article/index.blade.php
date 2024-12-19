<x-layout>
   
    <!-- MAIN -->
    <main class="" style="margin-top: 20vh;">
    <div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
        <!-- section allArticle 1 -->
        <section class="container min-vh-100 p-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center display-2 fw-light">{{__('ui.discoverArticle')}}</h1>
                </div>
                @forelse ($articles as $article)
                <div class="col-12 col-md-3 mt-3 center">
                    <x-card :article='$article' />
                </div>
                @empty
                <h2>{{__('ui.noArticle')}}</h2>
                @endforelse
                <div class="center p-5">
                    {{$articles->links()}}
                </div>
            </div>
        </section>
    </main>
</x-layout>