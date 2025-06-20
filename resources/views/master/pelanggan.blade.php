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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
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

    <!-- Modal Form Tambah/Edit -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Pelanggan</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-pelanggan">
                <input type="hidden" id="pelanggan-id" name="pelanggan-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-user-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="pelanggan-nama"
                                name="pelanggan-nama"
                                class="form-control"
                                placeholder="Nama"
                                required />
                            <label for="pelanggan-nama">Nama</label>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="email"
                            id="pelanggan-email"
                            name="pelanggan-email"
                            class="form-control"
                            placeholder="Email" />
                        <label for="pelanggan-email">Email</label>
                    </div>
                </div>

                <!-- Telepon -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            id="pelanggan-telepon"
                            name="pelanggan-telepon"
                            class="form-control"
                            placeholder="Telepon" />
                        <label for="pelanggan-telepon">Telepon</label>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea
                            id="pelanggan-alamat"
                            name="pelanggan-alamat"
                            class="form-control"
                            placeholder="Alamat"
                            style="height: 100px"></textarea>
                        <label for="pelanggan-alamat">Alamat</label>
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
<script src="{{ asset('js/master/pelanggan.js') }}"></script>
@endsection