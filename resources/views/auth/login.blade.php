<x-layout>
    <main>
        <section class="vh-100 center " id="sectionFormLogin">
            <div class="container my-5">
                <div class="row justify-content-center">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="col-12 col-md-6 center" id="styleFormLogin">
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-light">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-light">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-light" for="exampleCheck1" >{{__('ui.rememberMe')}}</label>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('ui.buttonIntroWelcomeOneLogOff')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


</x-layout>