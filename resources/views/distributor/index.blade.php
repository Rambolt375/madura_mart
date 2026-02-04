@extends('layout.master', ['title' => $title])

@section('content')
    <div class="container-fluid py-4">
        {{-- ADD BUTTON --}}
        <a class="btn bg-gradient-dark mb-3" href="{{ route('distributors.create') }}">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New {{ $title }}
        </a>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ $title }} table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            {{-- Added ID 'distributorTable' for precise JS targeting --}}
                            <table class="table align-items-center mb-0" id="distributorTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Distributor Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $item)
                                        <tr>
                                            <td class="text-xs font-weight-bold mb-8 ps-2">
                                                {{ $no + 1 }}.
                                            </td>
                                            <td>
                                                <a href="{{ route('distributors.edit', $item->id) }}" class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('distributors.destroy', $item->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border:none; background:none; padding:0; cursor:pointer;" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #ea0606;">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-xs font-weight-bold mb-8 searchable">
                                                {{ $item->nama_distributor }}
                                            </td>
                                            <td class="text-xs font-weight-bold mb-8 searchable">
                                                {{ $item->alamat_distributor }}
                                            </td>
                                            <td class="text-xs font-weight-bold mb-8 searchable">
                                                {{ $item->notelepon_distributor }}
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

        {{-- FOOTER --}}
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>document.write(new Date().getFullYear())</script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
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
            
            // 1. FLASH MESSAGES
            @if (session('success'))
                Swal.fire({ title: "Succeed!", text: "{{ session('success') }}", icon: "success" });
            @endif
            @if (session('error'))
                Swal.fire({ title: "Error!", text: "{{ session('error') }}", icon: "error" });
            @endif
            @if (session('duplikat'))
                Swal.fire({ title: "Duplicate!", text: "{{ session('duplikat') }}", icon: "warning" });
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
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // 3. LOGOUT CONFIRMATION (If navbar logout exists in master)
            const logoutForm = document.getElementById('logoutForm');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Logout?',
                        text: 'Are you sure you want to end your session?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, logout!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            logoutForm.submit();
                        }
                    });
                });
            }

            // 4. IMPROVED SEARCH FUNCTION
            const searchInput = document.getElementById('navbarSearch');
            const tableBody = document.querySelector('#distributorTable tbody');
            
            if (searchInput && tableBody) {
                const tableRows = tableBody.querySelectorAll('tr');

                searchInput.addEventListener('keyup', function(e) {
                    const searchTerm = e.target.value.toLowerCase();

                    tableRows.forEach(row => {
                        // Get only the text content from cells we care about (using class .searchable)
                        // If you didn't add the class, it will search the whole row text
                        const searchableCells = row.querySelectorAll('td.searchable');
                        let rowText = '';
                        
                        if (searchableCells.length > 0) {
                            searchableCells.forEach(cell => rowText += cell.textContent.toLowerCase());
                        } else {
                            // Fallback: search whole row if no classes defined
                            rowText = row.textContent.toLowerCase();
                        }

                        if (rowText.includes(searchTerm)) {
                            row.style.display = ''; 
                        } else {
                            row.style.display = 'none'; 
                        }
                    });
                });
            }
        });
    </script>
@endpush