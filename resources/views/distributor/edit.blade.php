@extends('layout.master')
@section('menu')
    @include('layout.menu')
@endsection
@section('editdistributor')
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
    <div class="container-fluid py-4" style="display: flex; justify-content: center; align-items: center">
        <div class="card-body px-0 pt-0 pb-2" style="width: 700px">
                <form action="{{ route('distributors.update', $data->id) }}" method="POST" id="frm">
                            @csrf
                            @method('PATCH')
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="nama_distributor" class="form-label">Nama Distributor</label>
                                        <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" value="{{ $data->nama_distributor }}" placeholder="Enter Distributor Name">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="alamat_distributor" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" id="alamat_distributor" name="alamat_distributor" value="{{ $data->alamat_distributor }}" placeholder="Enter Address" style="height: 100px">{{ $data->alamat_distributor }}</textarea>
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="notelepon_distributor" class="form-label">No. Telp</label>
                                        <input type="text" class="form-control" id="notelepon_distributor" name="notelepon_distributor" value="{{ $data->notelepon_distributor }}" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="px-3 pb-3 text-end">
                                        <a href="{{ route('distributors.index') }}" 
                                          id="cancelBtn" 
                                          class="btn bg-gradient-secondary me-5">Cancel</a>
                                        <button type="submit" id="simpan" class="btn bg-gradient-primary">Update
                                            {{ $title }}
                                            Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('cancelBtn').addEventListener('click', function(event) {
    // 1. Stop the link from going to the URL immediately
    event.preventDefault();
    
    // 2. Capture the URL from the href attribute
    const url = this.getAttribute('href');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will discard all changes!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Cancelled',
                text: 'Form has been reset.',
                icon: 'success',
                timer: 500,
                showConfirmButton: false
            }).then(() => {
                // 3. Manually navigate to the URL
                window.location.href = url;
            });
        }
    });
});

    document.getElementById('simpan').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        
        // Validation
        const name = document.getElementById('nama_distributor').value.trim();
        const address = document.getElementById('alamat_distributor').value.trim();
        const phone = document.getElementById('notelepon_distributor').value.trim();

        if (!name || !address || !phone) {
            Swal.fire({
                title: 'Validation Error',
                text: 'Please fill in all required fields!',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Show confirmation dialog only if validation passes
        Swal.fire({
            title: 'Confirm Submission',
            text: 'Are you sure you want to submit this distributor data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('frm').submit();
            }
        });
    });
</script>
@endpush