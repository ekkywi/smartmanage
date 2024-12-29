@extends("layouts.app")
@section("title", "SmartManage - Ganti Password")
@section("content")

    <div class="container mt-5">
        <h2>Ganti Password</h2>
        @if (session("success"))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route("password.update") }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="current_password">Password Saat Ini</label>
                <input class="form-control" id="current_password" name="current_password" required type="password">
            </div>
            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input class="form-control" id="new_password" name="new_password" required type="password">
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input class="form-control" id="new_password_confirmation" name="new_password_confirmation" required type="password">
            </div>
            <button class="btn btn-primary" type="submit">Ganti Password</button>
        </form>
    </div>

@endsection
