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
                        <th>Kode</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Regional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Cabang -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Cabang</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-cabang">
                <input type="hidden" id="cabang-id" name="cabang-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="cabang-nama" name="cabang-nama" class="form-control" required />
                        <label for="cabang-nama">Nama Cabang</label>
                    </div>
                </div>

                <!-- Kode -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="cabang-kode" name="cabang-kode" class="form-control" />
                        <label for="cabang-kode">Kode Cabang</label>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="cabang-alamat" name="cabang-alamat" class="form-control" />
                        <label for="cabang-alamat">Alamat</label>
                    </div>
                </div>

                <!-- Telepon -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="cabang-telepon" name="cabang-telepon" class="form-control" />
                        <label for="cabang-telepon">Telepon</label>
                    </div>
                </div>

                <!-- Regional -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="cabang-regional" name="cabang-regional" class="form-select" required>
                            <option value="">-- Pilih Regional --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="cabang-regional">Regional</label>
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

    <!-- Offcanvas: Import Cabang via Excel -->
    <div class="offcanvas offcanvas-end" id="import-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Import Excel Cabang</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="pt-0 row g-3" id="form-import-cabang" enctype="multipart/form-data" method="POST" action="/cabangs/import">
                @csrf

                <!-- File Upload -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="file" id="file-import-cabang" name="file" class="form-control" accept=".xlsx,.xls" required />
                        <label for="file-import-cabang">File Excel</label>
                    </div>
                    <div class="form-text mt-1">Hanya file Excel (.xlsx, .xls) yang didukung.</div>
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
<script src="{{ asset('js/laz/cabangs.js') }}"></script>
@endsection