@extends('layout.master', ['title' => $title])
@section('content')
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