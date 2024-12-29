<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <img alt="logo" class="img-fluid mb-3" src="{{ asset("images/logo2.png") }}" style="max-width: 100%; height: auto;">
                    <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="/">
                        <span class="menu-title fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a class="nav-link align-middle px-0" href="{{ route("dashboard") }}">
                                <i class="fa fa-home"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle" data-toggle="collapse" href="#submenu1">
                                <i class="fa fa-table"></i> <span class="ms-1 d-none d-sm-inline">Aset</span>
                            </a>
                            <ul class="collapse nav flex-column ml-3" data-parent="#menu" id="submenu1">
                                <li class="w-100">
                                    <a class="nav-link px-0" href="#"> <span class="d-none d-sm-inline">Kelola Data Aset</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle" data-toggle="collapse" href="#submenu2">
                                <i class="fa fa-users"></i> <span class="ms-1 d-none d-sm-inline">Pengguna</span>
                            </a>
                            <ul class="collapse nav flex-column ml-3" data-parent="#menu" id="submenu2">
                                <li class="w-100">
                                    <a class="nav-link px-0" href="{{ route("user") }}"> <span class="d-none d-sm-inline">Kelola Data Pengguna</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a aria-expanded="false" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-toggle="dropdown" href="#" id="dropdownUser1">
                            <img alt="hugenerd" class="rounded-circle" height="30" src="{{ asset("images/profile.jpg") }}" width="30">
                            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Ganti Password</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                @yield("content")
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>

</html>
