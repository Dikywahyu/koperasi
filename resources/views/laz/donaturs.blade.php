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
                        <th>Kode Donatur</th>
                        <th>Instansi</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Donatur -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Donatur</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-donatur">
                <input type="hidden" id="donatur-id" name="donatur-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="donatur-nama" name="donatur-nama" class="form-control" required />
                        <label for="donatur-nama">Nama Donatur</label>
                    </div>
                </div>

                <!-- Kode Donatur -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="donatur-kode" name="donatur-kode" class="form-control" required />
                        <label for="donatur-kode">Kode Donatur</label>
                    </div>
                </div>

                <!-- Instansi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="donatur-instansi" name="donatur-instansi" class="form-select">
                            <option value="">-- Pilih Instansi --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="donatur-instansi">Instansi</label>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="donatur-kontak" name="donatur-kontak" class="form-control" />
                        <label for="donatur-kontak">Kontak</label>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea id="donatur-alamat" name="donatur-alamat" class="form-control" rows="3"></textarea>
                        <label for="donatur-alamat">Alamat</label>
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

<!-- Script khusus Donatur -->
<script src="{{ asset('js/laz/donaturs.js') }}"></script>
@endsection