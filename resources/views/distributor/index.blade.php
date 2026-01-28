@extends('layout.master')
@section('menu')
    @include('layout.menu')
@endsection
@section('distributor')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">{{$title}}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
                    @auth
                        <li class="nav-item d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#"
                                    class="nav-link text-body font-weight-bold px-0 d-flex align-items-center dropdown-toggle"
                                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Inline SVG user icon (more reliable than icon-font at varying zooms) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" class="me-sm-2" aria-hidden="true">
                                        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z"
                                            fill="#2c3e50" />
                                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6v1H4v-1z" fill="#2c3e50" />
                                    </svg>
                                    <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                                    <span
                                        class="badge badge-sm bg-gradient-success ms-2">{{ ucfirst(Auth::user()->role ?? 'user') }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="userDropdown">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="#">
                                            <div class="d-flex py-1 align-items-center">
                                                <div
                                                    class="icon icon-shape icon-sm bg-gradient-primary shadow text-center me-3">
                                                    <i class="fa fa-user text-white text-lg opacity-10"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">Profile</span>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">View and edit your profile</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                            @csrf
                                            <button type="submit" class="dropdown-item border-radius-md text-danger"
                                                onclick="return confirm('Are you sure you want to logout?')">
                                                <div class="d-flex py-1 align-items-center">
                                                    <div
                                                        class="icon icon-shape icon-sm bg-gradient-danger shadow text-center me-3">
                                                        <i class="fa fa-sign-out text-white text-lg opacity-10"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">Logout</span>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">Sign out from your account</p>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                    <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                                <!-- Inline SVG user icon for Sign In link -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" class="me-sm-1" aria-hidden="true">
                                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z" fill="#2c3e50" />
                                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6v1H4v-1z" fill="#2c3e50" />
                                </svg>
                                <span class="d-sm-inline d-none">Sign In</span>
                            </a>
                        </li>
                    @endauth
        </div>
      </div>
</nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <a class="btn bg-gradient-dark mb-3" href="{{ route('distributors.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New {{ $title }}</a>
      <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{$title}} table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Distribution Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $data)
                                    <tr>
                                        <td class="text-xs font-weight-bold mb-8">
                                            {{ $no + 1 }}.
                                        </td>
                                        <td>
                                            <form action="{{ route('distributors.edit', $data->id) }}" method="GET" style="display:inline;">
                                                @csrf
                                                <button type="submit" style="border:none; background:none; padding:0; cursor:pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('distributors.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border:none; background:none; padding:0; cursor:pointer;" onclick="return confirm('Are you sure?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #ea0606;">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>                                        
                                        </td>
                                        <td class="text-xs font-weight-bold mb-8">
                                            {{ $data->nama_distributor	 }}
                                        </td>
                                        <td class="text-xs font-weight-bold mb-8">
                                            {{ $data->alamat_distributor }}
                                        </td>
                                        <td class="text-xs font-weight-bold mb-8">
                                            {{ $data->notelepon_distributor }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection