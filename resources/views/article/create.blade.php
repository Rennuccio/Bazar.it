<x-layout>
    <!-- MAIN -->
    <main class="" style="margin-top: 95px !important;">
        <section class="min-vh-100 center flex-column container">
            <div class="row center w-100">
                <div class="col-12 col-md-10">
                    <livewire:create-article :categories='$categories' />
                </div>
            </div>
        </section>
    </main>
</x-layout>