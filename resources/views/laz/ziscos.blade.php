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
                        <th>Lokasi</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Zisco -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Zisco</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-zisco">
                <input type="hidden" id="zisco-id" name="zisco-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="zisco-nama" name="zisco-nama" class="form-control" required />
                        <label for="zisco-nama">Nama Zisco</label>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="zisco-lokasi" name="zisco-lokasi" class="form-control" />
                        <label for="zisco-lokasi">Lokasi</label>
                    </div>
                </div>

                <!-- User -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="zisco-user" name="zisco-user" class="form-select" required>
                            <option value="">-- Pilih User --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="zisco-user">User</label>
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
<script src="{{ asset('js/laz/ziscos.js') }}"></script>
@endsection