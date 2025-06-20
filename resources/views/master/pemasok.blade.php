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
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Diisi via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah/Edit Pemasok -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Pemasok</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-pemasok">
                <input type="hidden" id="pemasok-id" name="pemasok-id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-user-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="pemasok-nama"
                                name="pemasok-nama"
                                class="form-control"
                                placeholder="Nama Pemasok"
                                required />
                            <label for="pemasok-nama">Nama</label>
                        </div>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            id="pemasok-kontak"
                            name="pemasok-kontak"
                            class="form-control"
                            placeholder="Kontak" />
                        <label for="pemasok-kontak">Kontak</label>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="text"
                            id="pemasok-alamat"
                            name="pemasok-alamat"
                            class="form-control"
                            placeholder="Alamat" />
                        <label for="pemasok-alamat">Alamat</label>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input
                            type="email"
                            id="pemasok-email"
                            name="pemasok-email"
                            class="form-control"
                            placeholder="Email" />
                        <label for="pemasok-email">Email</label>
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
<script src="{{ asset('js/master/pemasok.js') }}"></script>
@endsection