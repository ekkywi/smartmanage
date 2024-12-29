@extends("layouts.app")
@section("title", "SmartManage - User")
@section("content")

    <div class="container">
        <h2>Daftar User</h2>
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

        <table class="table table-striped table-bordered" id="userTable" style="width:100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Update</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-target="#editUserModal" data-toggle="modal" data-username="{{ $user->username }}">Edit</button>
                            <button class="btn btn-danger btn-sm" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-target="#deleteUserModal" data-toggle="modal">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div aria-hidden="true" aria-labelledby="editUserModalLabel" class="modal fade" id="editUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("user.update") }}" id="editUserForm" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input id="editUserId" name="id" type="hidden">
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input class="form-control" id="editUsername" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editName">Nama</label>
                            <input class="form-control" id="editName" name="name" required type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="deleteUserModalLabel" class="modal fade" id="deleteUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("user.delete") }}" id="deleteUserForm" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus user ini?</p>
                        <input id="deleteUserId" name="id" type="hidden">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#editUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var username = button.data('username');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#editUserId').val(id);
            modal.find('#editUsername').val(username);
            modal.find('#editName').val(name);
        });

        $('#deleteUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('#deleteUserId').val(id);
        });
    </script>
@endsection
