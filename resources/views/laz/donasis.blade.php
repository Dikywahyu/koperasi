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
                        <th>Donatur</th>
                        <th>Zisco</th>
                        <th>Jenis Donasi</th>
                        <th>Nominal</th>
                        <th>Bulan Donasi</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Donasi -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Donasi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-donasi">
                <input type="hidden" id="donasi-id" name="donasi-id">

                <!-- Donatur -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="donasi-donatur" name="donasi-donatur" class="form-select" required>
                            <option value="">-- Pilih Donatur --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="donasi-donatur">Donatur</label>
                    </div>
                </div>

                <!-- Zisco -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="donasi-zisco" name="donasi-zisco" class="form-select">
                            <option value="">-- Pilih Zisco (Opsional) --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="donasi-zisco">Zisco</label>
                    </div>
                </div>

                <!-- Jenis Donasi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="donasi-jenis" name="donasi-jenis" class="form-select" required>
                            <option value="">-- Pilih Jenis Donasi --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="donasi-jenis">Jenis Donasi</label>
                    </div>
                </div>

                <!-- Nominal -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="donasi-nominal" name="donasi-nominal" class="form-control" min="0" required />
                        <label for="donasi-nominal">Nominal</label>
                    </div>
                </div>

                <!-- Bulan Donasi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="date" id="donasi-bulan" name="donasi-bulan" class="form-control" required />
                        <label for="donasi-bulan">Awal Donasi</label>
                    </div>
                </div>

                <!-- Metode -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="donasi-metode" name="donasi-metode" class="form-control" />
                        <label for="donasi-metode">Metode Pembayaran</label>
                    </div>
                </div>

                <!-- Status -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="donasi-status" name="donasi-status" class="form-select" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                        <label for="donasi-status">Status Donasi</label>
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
<script src="{{ asset('js/laz/donasis.js') }}"></script>
@endsection