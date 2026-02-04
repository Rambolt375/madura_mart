@extends('layout.master', ['title' => $title])
@section('content')
    <div class="container-fluid py-4" style="display: flex; justify-content: center; align-items: center">
        <div class="card-body px-0 pt-0 pb-2" style="width: 700px">
                <form action="{{ route('products.update', $data->id) }}" method="POST" id="frm" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="code" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{ $data->code }}" placeholder="Enter Product Code">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter Product Name">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="type" class="form-label">Product Type</label>
                                        <select name="type" id="type" class="form-control" value="{{ $data->type }}">
                                            <option value="Food" {{ $data->type == 'Food' ? 'selected' : '' }}>Food</option>
                                            <option value="Beverage" {{ $data->type == 'Beverage' ? 'selected' : '' }}>Beverage</option>
                                            <option value="Snack" {{ $data->type == 'Snack' ? 'selected' : '' }}>Snack</option>
                                            <option value="Household" {{ $data->type == 'Household' ? 'selected' : '' }}>Household</option>
                                            <option value="Personal Care" {{ $data->type == 'Personal Care' ? 'selected' : '' }}>Personal Care</option>
                                            <option value="Other" {{ $data->type == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $data->expiry_date }}">
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" placeholder="Enter Price" step="0.01" readonly>
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $data->stock }}" placeholder="Enter Stock" readonly>
                                    </div>
                                    <div class="mb-3 px-3 pt-3">
                                        <label for="image" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" value="{{ $data->image }}">
                                        <small class="text-muted">Leave empty to keep current image</small>
                                    </div>
                                    @if ($data->image)
                                        <div class="mb-3 px-3 pt-3">
                                            <label class="form-label">Current Image Preview</label>
                                            <div class="border rounded p-3" style="text-align: center;">
                                                <img src="{{ asset('storage/images/' . $data->image) }}" alt="Product Image" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                                
                                                {{-- NEW: Delete Checkbox --}}
                                                <div class="form-check form-switch mt-3 d-inline-block text-start">
                                                    <input class="form-check-input" type="checkbox" id="delete_image" name="delete_image" value="1">
                                                    <label class="form-check-label text-danger font-weight-bold" for="delete_image">Delete this image</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-3 px-3 pt-3" id="imagePreview" style="display: none;">
                                        <label class="form-label">New Image Preview</label>
                                        <div class="border rounded p-3" style="text-align: center;">
                                            <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 me-3 mt-3">
                                <div class="col-12">
                                    <div class="px-3 pb-3 text-end">
                                        <a href="{{ route('products.index') }}" 
                                            id="cancelBtn" 
                                            class="btn bg-gradient-secondary me-5">Cancel</a>
                                        <button type="submit" id="simpan" class="btn bg-gradient-primary">Update Product</button>
                                    </div>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart"></i> by Madura Mart
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
    // Image preview
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    document.getElementById('cancelBtn').addEventListener('click', function(event) {
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

    document.getElementById('simpan').addEventListener('click', function(event) {
        event.preventDefault();
        
        const code = document.getElementById('code').value.trim();
        const name = document.getElementById('name').value.trim();
        const type = document.getElementById('type').value.trim();
        const price = document.getElementById('price').value.trim();
        const stock = document.getElementById('stock').value.trim();

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
            text: 'Are you sure you want to update this product?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('frm').submit();
            }
        });
    });
</script>
@endpush