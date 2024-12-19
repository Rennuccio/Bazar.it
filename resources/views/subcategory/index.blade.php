<x-layout>
    <main>
        <!-- feedback create -->
        <div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <section>
            @foreach($subcategories as $subcategory)
            <div class="d-flex flex-row p-3">
                <p class="fs-3 mx-4">{{$subcategory->name}}</p>
                <a href="{{route('subcategory.edit',$subcategory)}}">Modifica</a>
            </div>
            @endforeach
        </section>
    </main>
</x-layout>