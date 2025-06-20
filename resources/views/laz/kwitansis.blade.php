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
                        <th>Nomor Transaksi</th>
                        <th>Donatur</th>
                        <th>Total</th>
                        <th>Komisi Zisco</th>
                        <th>Bulan Donasi</th>
                        <th>Status Cetak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah/Edit Kwitansi -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Kwitansi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-kwitansi">
                <input type="hidden" id="kwitansi-id" name="kwitansi-id">

                <!-- Donasi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="kwitansi-donasi-id" name="kwitansi-donasi-id" class="form-select" required>
                            <option value="">-- Pilih Donasi --</option>
                            <!-- Diisi via JS -->
                        </select>
                        <label for="kwitansi-donasi-id">Donasi</label>
                    </div>
                </div>

                <!-- Bulan Donasi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="month" id="kwitansi-bulan" name="kwitansi-bulan" class="form-control" required />
                        <label for="kwitansi-bulan">Bulan Donasi</label>
                    </div>
                </div>

                <!-- Total -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="kwitansi-total" name="kwitansi-total" class="form-control" min="0" required />
                        <label for="kwitansi-total">Total</label>
                    </div>
                </div>

                <!-- Komisi Zisco -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="kwitansi-komisi" name="kwitansi-komisi" class="form-control" min="0" required />
                        <label for="kwitansi-komisi">Komisi Zisco</label>
                    </div>
                </div>

                <!-- Dicetak -->
                <div class="col-sm-12">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="kwitansi-dicetak" name="kwitansi-dicetak" />
                        <label class="form-check-label" for="kwitansi-dicetak">Sudah Dicetak</label>
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
<script src="{{ asset('js/laz/kwitansis.js') }}"></script>
@endsection