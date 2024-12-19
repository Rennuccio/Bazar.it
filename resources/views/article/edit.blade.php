<x-layout>
    <main style="margin-top:10rem">
        <section class="min-vh-100 center flex-column container">
            <div class="row w-100 center">
                <div class="col-12 col-md-10 ">
                    <livewire:edit-article :article='$article' :categories='$categories' />
                </div>
            </div>
        </section>
    </main>
</x-layout>