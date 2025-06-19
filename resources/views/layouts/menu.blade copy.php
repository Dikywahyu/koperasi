<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="app-ecommerce-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-hand-heart-line"></i>
                            <div data-i18n="Simpan Pinjam">Simpan Pinjam</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="dashboards-crm.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-restaurant-line"></i>
                            <div data-i18n="Toko dan Depot">Toko dan Depot</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-anchor-line"></i>
                            <div data-i18n="Keramba">Keramba</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-logistics-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-truck-line"></i>
                            <div data-i18n="Bisnis Lain">Bisnis Lain</div>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="app-academy-dashboard.html" class="menu-link">
                            <i class="menu-icon ri-money-dollar-box-fill"></i>
                            <div data-i18n="SHU">SHU</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="app-academy-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-book-open-line"></i>
                            <div data-i18n="FAT">FAT</div>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="System">System</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('menu') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-layout-top-2-line"></i>
                            <div data-i18n="Menu">Menu</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('menuuser') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-layout-top-2-line"></i>
                            <div data-i18n="User Menu">User Menu</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-shield-user-line"></i>
                            <div data-i18n="Roles & Permissions">Roles & Permission</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('role') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Roles">Roles</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('permission') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Permission">Permission</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('user') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-user-line"></i>
                            <div data-i18n="User">User</div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('log') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-history-line"></i>
                            <div data-i18n="Log History">Log History</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-database-2-line"></i>
                    <div data-i18n="Master">Master</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-community-line"></i>
                            <div data-i18n="Perusahaan">Perusahaan</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-bag-line"></i>
                            <div data-i18n="Jenis Usaha">Jenis Usaha</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-id-card-line"></i>
                            <div data-i18n="Anggota">Anggota</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-layout-top-2-line"></i>
                            <div data-i18n="Tipe Dokumen">Tipe Dokumen</div>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-hand-heart-line"></i>
                            <div data-i18n="SP">SP</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-access-roles.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Simpanan">Simpanan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Pinjaman">Pinjaman</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-restaurant-line"></i>
                            <div data-i18n="Toko dan Depot">Toko dan Depot</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Stok">Stok</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-access-roles.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Kategori Barang">Kategori Barang</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Barang">Barang</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Tempat dan Lokasi">Tempat dan Lokasi</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Margin">Margin</div>
                                </a>
                            </li>

                        </ul>
                    </li>




                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-anchor-line"></i>
                            <div data-i18n="Keramba">Keramba</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Tempat">Tempat</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-access-roles.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Line">Line</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Kolam">Kolam</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Komponen Biaya">Komponen Biaya</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Jadwal">Jadwal</div>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Stok">Stok</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-access-roles.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Kategori Barang">Kategori Barang</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Barang">Barang</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Tempat dan Lokasi">Tempat dan Lokasi</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Formula">Formula</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-truck-line"></i>
                            <div data-i18n="Lainnya">Lainnya</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Jadwal">Jadwal</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-book-open-line"></i>
                            <div data-i18n="FAT">FAT</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="app-access-roles.html" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Akun">Akun</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-access-roles.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="COA">COA</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Bank">Bank</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-access-permission.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Biaya">Biaya</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penyusutan">Penyusutan</div>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-vip-crown-line"></i>
                            <div data-i18n="Pelanggan">Pelanggan</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-basket-line"></i>
                            <div data-i18n="Pemasok">Pemasok</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="app-access-permission.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-roadster-line"></i>
                            <div data-i18n="Assets">Assets</div>
                        </a>
                    </li>

                </ul>
            </li>

            <!-- Apps -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-hand-heart-line"></i>
                    <div data-i18n="Simpan Pinjam">Simpan Pinjam</div>
                </a>
                <ul class="menu-sub">


                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-bank-line"></i>
                            <div data-i18n="Simpanan">Simpanan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-academy-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Setor Simpanan">Setor Simpanan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-academy-course.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penarikan">Penarikan</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-article-line"></i>
                            <div data-i18n="Pinjaman">Pinjaman</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-invoice-list.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Pengajuan Pinjaman">Pengajuan Pinjaman</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-preview.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Approval Pinjaman">Approval Pinjaman</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-id-card-line"></i>
                            <div data-i18n="Kartu Anggota">Kartu Anggota</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-money-dollar-box-fill"></i>
                            <div data-i18n="Posting SHU">Posting SHU</div>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-restaurant-line"></i>
                    <div data-i18n="Toko & Depot">Toko & Depot</div>
                </a>
                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-clipboard-line"></i>
                            <div data-i18n="Surat Pesanan">Surat Pesanan</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-cart-line"></i>
                            <div data-i18n="Pembelian">Pembelian</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-archive-line"></i>
                            <div data-i18n="Penerimaan Barang">Penerimaan Barang</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-restart-line"></i>
                            <div data-i18n="Retur Pembelian">Retur Pembelian</div>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-store-2-line"></i>
                            <div data-i18n="Toko">Toko</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-ecommerce-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penjualan">Penjualan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Retur">Retur</div>
                                </a>
                            </li>





                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-bowl-line"></i>
                            <div data-i18n="Depot">Depot</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="front-pages/pricing-page.html" class="menu-link" target="_blank">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Pemakaian">Pemakaian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="front-pages/payment-page.html" class="menu-link" target="_blank">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penjualan Depot">Penjualan Depot</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-survey-line"></i>
                            <div data-i18n="Stok">Stok</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-logistics-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Stok">Stok</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-logistics-fleet.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penyesuaian">Penyesuaian</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>


            <!-- Components -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-anchor-line"></i>
                    <div data-i18n="Keramba">Keramba</div>
                </a>
                <ul class="menu-sub">
                    <!-- Cards -->
                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-clipboard-line"></i>
                            <div data-i18n="Surat Pesanan">Surat Pesanan</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-cart-line"></i>
                            <div data-i18n="Pembelian">Pembelian</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-archive-line"></i>
                            <div data-i18n="Penerimaan Barang">Penerimaan Barang</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-restart-line"></i>
                            <div data-i18n="Retur Pembelian">Retur Pembelian</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-service-line"></i>
                            <div data-i18n="Penjualan">Penjualan</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-close-circle-line"></i>
                            <div data-i18n="Retur">Retur</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-wallet-2-line"></i>
                            <div data-i18n="Anggaran">Anggaran</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-money-dollar-box-line"></i>
                            <div data-i18n="Realisasi">Realisasi</div>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-macbook-line"></i>
                            <div data-i18n="Monitoring">Monitoring</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="cards-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Jadwal">Jadwal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Aktivitas">Aktivitas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-advance.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Kinerja">Kinerja</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-statistics.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Rekap Kinerja">Rekap Kinerja</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- User interface -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-survey-line"></i>
                            <div data-i18n="Stok">Stok</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="ui-accordion.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Stok">Stok</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-alerts.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penyesuaian">Penyesuaian</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- Extended components -->


                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-truck-line"></i>
                    <div data-i18n="Bisnis Lain">Bisnis Lain</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-clipboard-line"></i>
                            <div data-i18n="Surat Pesanan">Surat Pesanan</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-cart-line"></i>
                            <div data-i18n="Pembelian">Pembelian</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-archive-line"></i>
                            <div data-i18n="Penerimaan Barang">Penerimaan Barang</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-restart-line"></i>
                            <div data-i18n="Retur Pembelian">Retur Pembelian</div>
                        </a>
                    </li>
                    <!-- Cards -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-truck-line"></i>
                            <div data-i18n="Bisnis">Bisnis</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="front-pages/pricing-page.html" class="menu-link" target="_blank">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Biaya">Biaya</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="front-pages/payment-page.html" class="menu-link" target="_blank">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penjualan">Penjualan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- User interface -->

                    <!-- Extended components -->


                </ul>
            </li>

            <!-- Forms -->


            <!-- Tables -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-book-open-line"></i>
                    <div data-i18n="FAT">FAT</div>
                </a>
                <ul class="menu-sub">
                    <!-- Tables -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-grid-line"></i>
                            <div data-i18n="Finance">Finance</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Bank-Kas Masuk">Bank-Kas Masuk</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Bank-Kas Keluar">Bank-Kas Keluar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Tarikan Kas Kecil">Tarikan Kas Kecil</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-advanced.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Pencairan Dana">Pencairan Dana</div>
                                </a>
                            </li>


                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Arus Kas">Arus Kas</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-grid-line"></i>
                            <div data-i18n="Akuntansi">Akuntansi</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Buku Besar">Buku Besar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-advanced.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Jurnal">Jurnal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Trial Balance">Trial Balance</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Kliring">Kliring</div>
                                </a>
                            </li>


                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Laporan Keuangan">Laporan Keuangan</div>
                                </a>
                                <ul class="menu-sub">

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Hpp">Hpp</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Laba Rugi">Laba Rugi</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Neraca">Neraca</div>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Laporan Hutang">Laporan Hutang</div>
                                </a>
                                <ul class="menu-sub">

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Hutang">Hutang</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Usia Hutang">Usia Hutang</div>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Laporan Piutang">Laporan Piutang</div>
                                </a>
                                <ul class="menu-sub">

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Piutang">Piutang</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="tables-datatables-extensions.html" class="menu-link">
                                            <i class="menu-icon tf-icons ri-circle-fill"></i>
                                            <div data-i18n="Usia Piutang">Usia Piutang</div>
                                        </a>
                                    </li>

                                </ul>
                            </li>




                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-grid-line"></i>
                            <div data-i18n="Asset">Assets</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Monitoring">Monitoring</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-advanced.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penjualan">Penjualan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Penyusutan">Penyusutan</div>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="front-pages/payment-page.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-book-marked-line"></i>
                            <div data-i18n="Tutup Buku">Tutup Buku</div>
                        </a>
                    </li>

                </ul>
            </li>

            <!-- Charts & Maps -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-donut-chart-line"></i>
                    <div data-i18n="Report & Charts">Report & Analyze</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-bar-chart-2-line"></i>
                            <div data-i18n="Analisa">Analisa</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="charts-apex.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="ROP">ROP</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-chartjs.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Forecast">Forecast</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="maps-leaflet.html" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ri-book-read-line"></i>
                            <div data-i18n="Report">Report</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="charts-apex.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Simpan Pinjam">Simpan Pinjam</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-apex.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Toko & Depot">Toko & Depot</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-chartjs.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Keramba">Keramba</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-chartjs.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="Bisnis Lain">Bisnis Lain</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-chartjs.html" class="menu-link">
                                    <i class="menu-icon tf-icons ri-circle-fill"></i>
                                    <div data-i18n="FAT">FAT</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>