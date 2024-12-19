<div class="card mt-3 p-2">
    <div class="image imgCard3">
        <img src="{{$lastArticle->images->isNotEmpty() ? $lastArticle->images->first()->getUrl(300, 300) : 'https://picsum.photos/200'}}" class="card-img-top img-fluid image "  alt="Immagine dell'articolo {{$lastArticle->title}}">
    </div>
    <div class="content d-flex flex-column justify-content-between">
        <div class="h-25">
            <div >
                   <p style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;" class="title fs-4 fw-semibold text-dark">{{$lastArticle->title}}</p> 
            </div>
            <div class="d-flex flex-column justify-content-start mt-3 ">
                <small>{{__('ui.descriptionCard')}}</small>
                <p class="description" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;" >
                    {{$lastArticle->description}}
                </p>
            </div>
        </div>
        <div>
            <div class="d-flex flex-column justify-content-start ">
                <small>{{__('ui.categoryCard')}}</small>
                <p class="description">
                    {{$lastArticle->category->name}}
                </p>
            </div>
            <div class="d-flex flex-column justify-content-start ">
                <small>{{__('ui.priceCard')}}</small>
                <p class="desc">
                    {{$lastArticle->price}} €
                </p>
            </div>
            <div>
                <small>{{__('ui.userCard')}}</small>
                <p class="desc">
                    {{$lastArticle->user->name}}
                </p>
            </div>
        </div>
        <div class="h-25">
            <a class="btn" href="{{route('article.show',$lastArticle)}}">
                {{__('ui.buttonCard')}}
                <span aria-hidden="true">
                    →
                </span>
            </a>
        </div>
    </div>
</div>