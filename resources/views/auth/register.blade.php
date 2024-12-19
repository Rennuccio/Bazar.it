<x-layout>
    <main>
        <section class="center flex-column" id="sectionFormRegister">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center flex-column">
                    <!-- errors message -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- frm register -->
                    <div class="col-12 col-md-6 p-5" id="formRegister">
                        <H3 class="text-center text-light fw-bold">{{__('ui.register')}}</H3>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label text-light fw-light fs-4">{{__('ui.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-light fw-light fs-4">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-light fw-light fs-4">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label text-light fw-light fs-4">{{__('ui.passConfirm')}}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('ui.register')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>