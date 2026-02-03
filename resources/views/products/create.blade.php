@extends('layout.master', ['title' => $title])
@section('content')
    <div class="container-fluid py-4" style="display: flex; justify-content: center; align-items: center">
        <div class="card-body px-0 pt-0 pb-2" style="width: 700px">
                <form action="{{ route('products.store') }}" method="POST" id="frm" enctype="multipart/form-data">
                            @csrf
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="code" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter Product Code">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="type" class="form-label">Product Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Product Type</option>
                                            <option value="Food">Food</option>
                                            <option value="Beverage">Beverage</option>
                                            <option value="Snack">Snack</option>
                                            <option value="Household">Household</option>
                                            <option value="Personal Care">Personal Care</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="px-3 pb-3 text-end">
                                        <a href="{{ route('products.index') }}" 
                                            id="cancelBtn" 
                                            class="btn bg-gradient-secondary me-5">Cancel</a>
                                        <button type="submit" id="simpan" class="btn bg-gradient-primary">Save New
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
document.addEventListener('DOMContentLoaded', function () {
    const frm = document.getElementById('frm');
    const cancelBtn = document.getElementById('cancelBtn');
    const simpanBtn = document.getElementById('simpan');

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function (event) {
            event.preventDefault();
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
                    window.location.href = url;
                }
            });
        });
    }

    if (simpanBtn && frm) {
        simpanBtn.addEventListener('click', function (event) {
            event.preventDefault();

            // Use actual product input IDs
            const code = document.getElementById('code')?.value.trim() || '';
            const name = document.getElementById('name')?.value.trim() || '';
            const type = document.getElementById('type')?.value.trim() || '';
            const price = document.getElementById('price')?.value.trim() || '';
            const stock = document.getElementById('stock')?.value.trim() || '';

            if (!code || !name || !type || !price || !stock) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please fill in all required fields!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Confirm Submission',
                text: 'Are you sure you want to submit this product data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    frm.submit();
                }
            });
        });
    }
});
</script>
@endpush