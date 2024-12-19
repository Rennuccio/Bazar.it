<x-layout>
    <main>
        <section>
            @foreach($categories as $category)
            <div class="d-flex">
                <p>{{$category->name}}</p>
                <a href="{{route('category.edit',$category)}}">
                    <button class="btn btn-warning">Modifica</button>
                </a>
            </div>
            @endforeach
        </section>
    </main>
</x-layout>