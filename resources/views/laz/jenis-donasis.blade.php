@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- DataTable -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Jenis Donasi -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Jenis Donasi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-jenis-donasi">
                <input type="hidden" id="jenis-donasi-id" name="jenis-donasi-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="jenis-donasi-nama" name="jenis-donasi-nama" class="form-control" required />
                        <label for="jenis-donasi-nama">Nama</label>
                    </div>
                </div>

                <!-- Jenis -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="jenis-donasi-jenis" name="jenis-donasi-jenis" class="form-select" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Zakat">Zakat</option>
                            <option value="Infak">Infak</option>
                            <option value="Wakaf">Wakaf</option>
                        </select>
                        <label for="jenis-donasi-jenis">Jenis</label>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea id="jenis-donasi-deskripsi" name="jenis-donasi-deskripsi" class="form-control" rows="3"></textarea>
                        <label for="jenis-donasi-deskripsi">Deskripsi</label>
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

<!-- JS -->
<script src="{{ asset('js/laz/jenis-donasis.js') }}"></script>
@endsection