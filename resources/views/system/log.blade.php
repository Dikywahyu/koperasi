<!doctype html>

<html
    lang="en"
    class="light-style layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="assets/"
    data-template="horizontal-menu-template"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>KOPERASI KARYAWAN SURI TANI PEMUKA</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/remixicon/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-statistics.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-analytics.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Template customizer & config -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-xxl">
                    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-6">
                        <a href="index.html" class="app-brand-link gap-2">

                            <span class="app-brand-text demo menu-text fw-semibold">KOPERASI KARYAWAN SURI TANI PEMUKA</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="ri-close-fill align-middle"></i>
                        </a>
                    </div>

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="ri-menu-fill ri-22px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">


                            <!-- Style Switcher -->
                            <li class="nav-item dropdown-style-switcher dropdown me-1 me-xl-0">
                                <a
                                    class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <i class="ri-22px"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span class="align-middle"><i class="ri-sun-line ri-22px me-3"></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span class="align-middle"><i class="ri-moon-clear-line ri-22px me-3"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span class="align-middle"><i class="ri-computer-line ri-22px me-3"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- / Style Switcher-->



                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                                <a
                                    class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside"
                                    aria-expanded="false">
                                    <i class="ri-notification-2-line ri-22px"></i>
                                    <span
                                        class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom py-50">
                                        <div class="dropdown-header d-flex align-items-center py-2">
                                            <h6 class="mb-0 me-auto">Notification</h6>
                                            <div class="d-flex align-items-center">
                                                <span class="badge rounded-pill bg-label-primary fs-xsmall me-2">8 New</span>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Mark all as read"><i class="ri-mail-open-line text-heading ri-20px"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/1.png" alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                                        <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Charles Franklin</h6>
                                                        <small class="mb-1 d-block text-body">Accepted your connection</small>
                                                        <small class="text-muted">12hr ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/2.png" alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">New Message ✉️</h6>
                                                        <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-shopping-cart-2-line"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Whoo! You have new order 🛒</h6>
                                                        <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                                        <small class="text-muted">1 day ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/9.png" alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Application has been approved 🚀</h6>
                                                        <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Monthly report is generated</h6>
                                                        <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                                                        <small class="text-muted">3 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/5.png" alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Send connection request</h6>
                                                        <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                                        <small class="text-muted">4 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/6.png" alt class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">New message from Jane</h6>
                                                        <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="ri-error-warning-line"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">CPU is running high</h6>
                                                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="border-top">
                                        <div class="d-grid p-4">
                                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                                <small class="align-middle">View all notifications</small>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="assets/img/avatars/1.png" alt class="rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="assets/img/avatars/1.png" alt class="rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block small">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="ri-user-3-line ri-22px me-3"></i><span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="ri-settings-4-line ri-22px me-3"></i><span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 ri-file-text-line ri-22px me-3"></i>
                                                <span class="flex-grow-1 align-middle">Transaksi</span>
                                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="pages-faq.html">
                                            <i class="ri-question-line ri-22px me-3"></i><span class="align-middle">FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="d-grid px-4 pt-2 pb-1">
                                            <a class="btn btn-sm btn-danger d-flex" href="{{ route('logout') }}">
                                                <small class="align-middle">Logout</small>
                                                <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
                        <input
                            type="text"
                            class="form-control search-input border-0"
                            placeholder="Search..."
                            aria-label="Search..." />
                        <i class="ri-close-fill search-toggler cursor-pointer"></i>
                    </div>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
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
                                            <a href="index.html" class="menu-link">
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
                                            <a href="layouts-container.html" class="menu-link">
                                                <i class="menu-icon tf-icons ri-layout-top-2-line"></i>
                                                <div data-i18n="Menu">Menu</div>
                                            </a>
                                        </li>

                                        <li class="menu-item">
                                            <a href="layouts-container.html" class="menu-link">
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
                                                    <a href="app-access-roles.html" class="menu-link">
                                                        <i class="menu-icon tf-icons ri-circle-fill"></i>
                                                        <div data-i18n="Roles">Roles</div>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="app-access-permission.html" class="menu-link">
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
                    <!-- / Menu -->

                    <!-- Content -->



                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- DataTable with Buttons -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table table-bordered">

                                </table>
                            </div>
                        </div>
                        <!-- Modal to add new record -->
                        <div class="offcanvas offcanvas-end" id="add-new-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                                <button
                                    type="button"
                                    class="btn-close text-reset"
                                    data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-3" id="form-user">
                                    <div class="col-sm-12">
                                        <input type="hidden" id="user-id" name="user-id" />
                                        <div class="input-group input-group-merge">
                                            <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
                                            <div class="form-floating form-floating-outline">
                                                <input
                                                    type="text"
                                                    id="user-name"
                                                    class="form-control "
                                                    name="user-name"
                                                    placeholder="Name" />
                                                <label for="user-name">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
                                            <div class="form-floating form-floating-outline">
                                                <input
                                                    type="text"
                                                    id="user-email"
                                                    name="user-email"
                                                    class="form-control  "
                                                    placeholder="john.doe@example.com" />
                                                <label for="user-email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <select id="user-role" class="form-select form-select-sm">
                                            <option>Select Role</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="BAAK">BAAK</option>
                                            <option value="BAUK">BAUK</option>
                                            <option value="Sarpras">Sarpras</option>
                                            <option value="Koperasi">Koperasi</option>
                                            <option value="Kaprodi">Kaprodi</option>
                                            <option value="Dosen Wali">Dosen Wali</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1" id="usersform">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--/ DataTable with Buttons -->


                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="text-body mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with <span class="text-danger"><i class="tf-icons ri-heart-fill"></i></span> by
                                    <a href="kopkarstp.com" target="_blank" class="footer-link">UNICS 2025</a>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <a href="#" class="footer-link me-4">License</a>


                                    <a
                                        href="#"

                                        class="footer-link me-4">Documentation</a>



                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>
    <!-- Core JS -->

    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Flat Picker -->
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <!-- Form Validation -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>


    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/system/log.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script> -->

</body>

</html>