<x-layout>
    <main>
        <section>
            <form action="{{route('subcategory.update',$subcategory)}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <h3>Categoria di appartenenza</h3>
                    <select name="category_id" id="category_id" value="{{$subcategory->category_id}}">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name">Inserisci sottocategoria</label>
                    <input type="text" name="name" id="name" value="{{$subcategory->name}}">
                </div>
                <button type="submit">Modifica</button>
            </form>
            <form action="{{route('subcategory.delete',$subcategory)}}" method='POST'>
                @csrf 
                @method('delete')
                <button class="btn btn-danger" type="submit">Elimina</button>
            </form>
        </section>
    </main>
</x-layout>