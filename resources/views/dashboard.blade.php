@extends("layouts.app")
@section("content")
@section("title", "SmartManage - Dashboard")

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Pengguna</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userCount }}</h5>
                    <p class="card-text">Total pengguna yang terdaftar di sistem SmartManage</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Jumlah Aset</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $asetCount }}</h5>
                    <p class="card-text">Total aset yang terdaftar di sistem SmartManage</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
