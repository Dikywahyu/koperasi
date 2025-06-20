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
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Offcanvas Form -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Transaksi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-transaksi">
                <input type="hidden" id="transaksi-id" name="transaksi-id">

                <!-- User -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="transaksi-user" name="transaksi-user" class="form-select" required>
                            <option value="">-- Pilih User --</option>
                            <!-- Isi via JS -->
                        </select>
                        <label for="transaksi-user">User</label>
                    </div>
                </div>

                <!-- Tanggal -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="date" id="transaksi-tanggal" name="transaksi-tanggal" class="form-control" required />
                        <label for="transaksi-tanggal">Tanggal</label>
                    </div>
                </div>

                <!-- Tipe -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="transaksi-tipe" name="transaksi-tipe" class="form-select" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="simpanan">Simpanan</option>
                            <option value="pinjaman">Pinjaman</option>
                            <option value="angsuran">Angsuran</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <label for="transaksi-tipe">Tipe</label>
                    </div>
                </div>

                <!-- Jenis -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="transaksi-jenis" name="transaksi-jenis" class="form-select" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                        <label for="transaksi-jenis">Jenis</label>
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="transaksi-jumlah" name="transaksi-jumlah" class="form-control" min="0" required />
                        <label for="transaksi-jumlah">Jumlah</label>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea id="transaksi-keterangan" name="transaksi-keterangan" class="form-control" rows="3"></textarea>
                        <label for="transaksi-keterangan">Keterangan</label>
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
<script src="{{ asset('js/laz/transaksis.js') }}"></script>
@endsection