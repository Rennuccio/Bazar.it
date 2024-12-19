<x-layout>
    <main>
        <section>
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div>
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">
                        Invia
                    </button>
                </div>
            </form>
        </section>
    </main>
</x-layout>