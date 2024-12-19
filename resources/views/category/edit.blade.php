<x-layout>
    <main>
        <section>
            <form action="{{route('category.update',$category)}}" method="POST">
                @csrf 
                @method('PUT')
                <div>
                <div>
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">
                        Invia
                    </button>
                </div>
                </div>
            </form>
        </section>
    </main>
</x-layout>