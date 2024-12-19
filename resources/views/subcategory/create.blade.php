<x-layout>
    <main>
        <section>
            <form action="{{route('subcategory.store')}}" method="POST">
                @csrf
                <div>
                    <h3>Categoria di appartenenza</h3>
                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name">Inserisci sottocategoria</label>
                    <input type="text" name="name" id="name">
                </div>
                <button type="submit">Inserisci</button>
            </form>
        </section>
    </main>
</x-layout>