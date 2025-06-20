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
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Tanggal Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data diisi via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Asset -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Asset</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-dataasset">
                <input type="hidden" id="dataasset-id" name="dataasset-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-archive-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="dataasset-nama"
                                name="dataasset-nama"
                                class="form-control"
                                placeholder="Nama Asset"
                                required />
                            <label for="dataasset-nama">Nama Asset</label>
                        </div>
                    </div>
                </div>

                <!-- Kode -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-barcode-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="dataasset-kode"
                                name="dataasset-kode"
                                class="form-control"
                                placeholder="Kode Unik"
                                required />
                            <label for="dataasset-kode">Kode Unik</label>
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            id="dataasset-kategori"
                            name="dataasset-kategori"
                            class="form-control"
                            placeholder="Kategori" />
                        <label for="dataasset-kategori">Kategori</label>
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="number"
                            id="dataasset-jumlah"
                            name="dataasset-jumlah"
                            class="form-control"
                            min="1"
                            value="1"
                            required />
                        <label for="dataasset-jumlah">Jumlah</label>
                    </div>
                </div>

                <!-- Tanggal Beli -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="date"
                            id="dataasset-tanggal-beli"
                            name="dataasset-tanggal-beli"
                            class="form-control" />
                        <label for="dataasset-tanggal-beli">Tanggal Beli</label>
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

<!-- Script khusus asset -->
<script src="{{ asset('js/master/assets.js') }}"></script>
@endsection