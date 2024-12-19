<form action="{{route('lenguage',$lang)}}" method="POST" class="d-flex flex-column " id="lenguage-{{$lang}}">
    @csrf
    <a href="#" onclick="event.preventDefault();document.querySelector('#lenguage-{{$lang}}').submit();" class="text-decoration-none " id="linkLanguageNavbar">
        <div class="d-flex align-items-center justify-content-around w-100">
            <img src="{{asset('vendor/blade-flags/country-' . $lang . '.svg')}}" width="40px" height="40px" alt="" class="mx-2">
            @if($lang=='it')
            Italiano
            @elseif($lang=='gb')
            English
            @elseif($lang=='es')
            Español
            @elseif($lang=='fr')
            Français
            @endif
        </div>
    </a>
</form>