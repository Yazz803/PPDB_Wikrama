@extends('login.layouts.main')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                @if(session('loginGagal'))
                                <script>
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'bottom',
                                        showConfirmButton: false,
                                        timer: 5000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })

                                    Toast.fire({
                                        icon: 'warning',
                                        width: 500,
                                        title: '{!! session("loginGagal") !!}'
                                    })
                                </script>
                                @endif
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user" action="{{ route("login.authenticate") }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                            @error('email')
                                                <div class="ml-3 text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="ml-3 text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a href="{{ route('landingpage') }}" class="btn btn-info">Back to Home</a>
                                </div>
                                <div class="text-center">
                                    {{-- <a class="small" href="register.html">Create an Account!</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection