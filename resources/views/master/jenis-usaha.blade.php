@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis Usaha</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diisi melalui DataTables AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal to add new record -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">Tambah Jenis Usaha</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-jenis-usaha">
                <input type="hidden" id="jenis-usaha-id" name="id">
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-building-4-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="Nama Jenis Usaha"
                                required />
                            <label for="nama">Nama Jenis Usaha</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea
                            class="form-control"
                            placeholder="Deskripsi"
                            id="deskripsi"
                            name="deskripsi"
                            style="height: 100px"></textarea>
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS khusus untuk halaman ini -->
<script src="{{ asset('js/master/jenis_usaha.js') }}"></script>
@endsection