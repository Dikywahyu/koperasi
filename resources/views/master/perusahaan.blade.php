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
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diisi via DataTables AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal untuk tambah/edit perusahaan -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Perusahaan</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-perusahaan">
                <input type="hidden" id="perusahaan-id" name="id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-building-2-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="Nama Perusahaan"
                                required />
                            <label for="nama">Nama Perusahaan</label>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            class="form-control"
                            id="alamat"
                            name="alamat"
                            placeholder="Alamat" />
                        <label for="alamat">Alamat</label>
                    </div>
                </div>

                <!-- Telepon -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            class="form-control"
                            id="telepon"
                            name="telepon"
                            placeholder="Telepon" />
                        <label for="telepon">Telepon</label>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script khusus perusahaan -->
<script src="{{ asset('js/master/perusahaan.js') }}"></script>
@endsection