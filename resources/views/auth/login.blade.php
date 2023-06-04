@extends('auth.layout.main')
@section('container')
    @if (session('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="vh-100 vw-100" style="background-image:url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg')"  >
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="container d-flex flex-row justify-content-evenly align-items-center">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://smkn4bogor.sch.id/assets/images/logo/logoSMKN4.svg" alt="" class="img-fluid" style="height:500px" >
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <main class="form-login">
                            <form action="/login" method="POST">
                                @csrf
                                <h1 class="h3 mb-3 fw-normal text-center bg-white mb-5" style='color:#37517e; border: 1px white solid;' >Login</h1>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control mt-2" id="email"
                                        placeholder="name@example.com" autofocus>
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control mt-2" id="password"
                                        placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <button class="w-100 btn btn-lg btn-info text-white mt-4" type="submit">Login</button>
                            </form>
                            <small class="d-block text-center mt-3">Belum punya akun? <a
                                    href="/register">Register</a></small>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    @endsection
