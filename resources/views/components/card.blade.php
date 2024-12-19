<div class="card p-2" style="width: 18rem; max-height: 25rem">
  <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200'}}" class="card-img-top img-fluid" alt="Immagine dell'articolo {{$article->title}}">
  <div class="card-body">
    <h5 class="card-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$article->title}}</h5>
    <a href="{{route('article.byCategory',$article)}}">
      <p class="card-text">{{$article->category->name}} </p>
    </a>
    <p class="card-text">{{$article->price}} €</p>
    <a href="{{route('article.show',$article)}}" class="btn btn-primary">{{__('ui.buttonCard')}}</a>
  </div>
</div>