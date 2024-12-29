@extends("layouts.auth")
@section("content")
@section("title", "SmartManage - Login")
<section class="h-100 gradient-form">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center mb-4">
                                    <img alt="logo" class="img-fluid" src="{{ asset("images/logo1.png") }}" style="max-width: 100%; height: auto;">
                                    <p><strong>Asset Management</strong></p>
                                </div>
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4" data-mdb-input-init>
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" id="username" name="username" placeholder="Masukan username Anda" required type="text" />
                                    </div>

                                    <div class="form-outline mb-4" data-mdb-input-init>
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" id="password" name="password" placeholder="Masukan password Anda" required type="password" />
                                    </div>
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 font-weight-bold" data-mdb-button-init data-mdb-ripple-init type="submit">Log in</button>
                                    </div>
                                    <p class="text-center">Belum punya akun? <a href="{{ route("register") }}">Daftar</a></p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4 text-center">Masuk dan mulai kelola aset anda</h4>
                                <p class="small mb-0 text-justify">SmartManage adalah aplikasi berbasis Web yang difungsikan untuk mengelola aset. Anda dapat mengelola aset anda mulai dari menambah, mengubah, dan menghapus aset.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
