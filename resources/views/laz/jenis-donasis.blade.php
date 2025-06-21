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
                <input type="hidden" id="jenis-id" name="jenis-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="jenis-nama" name="jenis-nama" class="form-control" required />
                        <label for="jenis-nama">Nama</label>
                    </div>
                </div>

                <!-- Jenis -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="jenis-tipe" name="jenis-tipe" class="form-select" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Zakat">Zakat</option>
                            <option value="Infak">Infak</option>
                            <option value="Wakaf">Wakaf</option>
                        </select>
                        <label for="jenis-tipe">Jenis</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="jenis-deskripsi" name="jenis-deskripsi" class="form-select" required>
                            <option value="">-- Pilih Deskripsi --</option>
                            <option value="Rutin">Rutin</option>
                            <option value="Insidentil">Insidentil</option>
                        </select>
                        <label for="jenis-deskripsi">Deskripsi</label>
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

    <!-- Form Import Jenis Donasi -->
    <div class="offcanvas offcanvas-end" id="import-jenis-donasi-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Import Jenis Donasi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-import-jenis-donasi" enctype="multipart/form-data" method="POST">
                @csrf

                <!-- File Upload -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="file" id="file-import-jenis-donasi" name="file" class="form-control" required accept=".xls,.xlsx" />
                        <label for="file-import-jenis-donasi">Pilih File Excel</label>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Import</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- JS -->
<script src="{{ asset('js/laz/jenis-donasis.js') }}"></script>
@endsection