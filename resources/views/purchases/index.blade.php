@extends('layout.master')

@section('content')

    {{-- FLASH MESSAGES --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid py-4">
        {{-- Add Button --}}
        <a class="btn bg-gradient-dark mb-3" href="{{ route('purchases.create') }}">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New purchases
        </a>

        {{-- Product Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 style="text-transform: capitalize;">purchases table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            {{-- Added class 'table' for search script compatibility --}}
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Invoice</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Purchase Date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Distributor</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Purchase Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
          
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart"></i> by Creative Tim.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // 1. FLASH MESSAGES (SweetAlert)
            @if (session('success'))
                Swal.fire({ title: "Succeed!", text: "{{ session('success') }}", icon: "success" });
            @endif
            @if (session('error'))
                Swal.fire({ title: "Error!", text: "{{ session('error') }}", icon: "error" });
            @endif
            @if (session('info'))
                Swal.fire({ title: "Info", text: "{{ session('info') }}", icon: "info" });
            @endif

            // 2. DELETE CONFIRMATION
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action cannot be undone!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) form.submit();
                    });
                });
            });

            // 3. LOGOUT CONFIRMATION
            const logoutForm = document.getElementById('logoutForm');
            if(logoutForm) {
                logoutForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Logout?',
                        text: 'Are you sure you want to end your session?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, logout!'
                    }).then((result) => {
                        if (result.isConfirmed) logoutForm.submit();
                    });
                });
            }

            // 4. IMAGE PREVIEW (Using SweetAlert for cleaner code)
            const images = document.querySelectorAll('.hover-image');
            images.forEach(function(img) {
                img.addEventListener('click', function() {
                    Swal.fire({
                        imageUrl: this.src,
                        imageAlt: this.alt,
                        showConfirmButton: false,
                        showCloseButton: true,
                        width: 'auto' // Auto width for better image fitting
                    });
                });
            });

            // 5. SEARCH FUNCTION
            const searchInput = document.getElementById('navbarSearch');
            const tableRows = document.querySelectorAll('.table tbody tr');

            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    tableRows.forEach(row => {
                        const rowText = row.innerText.toLowerCase();
                        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });
    </script>
@endpush