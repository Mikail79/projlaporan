@extends('auth.layout.main')
@section('container')
    <style>
        body {
            background-image: url("https://www.smkn4bogor.sch.id/assets/images/background/smkn4bogor_3.jpg");
            background-color: #cccccc;
        }
    </style>
    {{-- Jika kita berhasil melakukan registrasi alert ini akan muncul , alert ini diatur didalam RegisterController --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        {{ route('login.index') }}
    @endif
    <div class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 bg-white rounded rounded-1 shadow-lg" style="padding: 50px 50px 50px 50px">
                    <main class="form-register">
                        <form action="/register" method="POST">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal text-center bg-white">Register</h1>

                            <div class="form-floating mb-4">
                                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                                <label for="password">Password</label>
                            </div>

                            <button class="w-100 btn btn-lg btn-info text-white mt-4" type="submit">Submit</button>
                        </form>
                        <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login</a></small>
                    </main>
                    
                </div>
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="img/register.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
