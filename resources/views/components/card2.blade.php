<a href="{{route('article.show', $article)}}" class="text-decoration-none">
    <div class="card mt-5" style="width: 13rem; ">
        <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200'}}" class="card-img-top img-fluid" alt="Immagine dell'articolo {{$article->title}}">
        <div class="card-body">
            <p class="card-text"><h4>{{$article->title}}</h3></p>
            <p class="card-text"></p>
            <p class="card-text">{{$article->price}} €</p>
        </div>
    </div>
</a>