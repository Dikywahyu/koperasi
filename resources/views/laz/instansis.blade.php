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
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Penanggung Jawab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Instansi -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Instansi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-instansi">
                <input type="hidden" id="instansi-id" name="instansi-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="instansi-nama" name="instansi-nama" class="form-control" required />
                        <label for="instansi-nama">Nama Instansi</label>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea id="instansi-alamat" name="instansi-alamat" class="form-control" rows="2"></textarea>
                        <label for="instansi-alamat">Alamat</label>
                    </div>
                </div>

                <!-- Telepon -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="instansi-telepon" name="instansi-telepon" class="form-control" />
                        <label for="instansi-telepon">Telepon</label>
                    </div>
                </div>

                <!-- Penanggung Jawab -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="instansi-penanggung-jawab" name="instansi-penanggung-jawab" class="form-select">
                            <option value="">-- Pilih Donatur --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="instansi-penanggung-jawab">Penanggung Jawab</label>
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
<script src="{{ asset('js/laz/instansis.js') }}"></script>
@endsection