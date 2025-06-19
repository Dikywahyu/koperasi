@extends('layouts.app')
@section('content')
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
            <form class="add-new-record pt-0 row g-3" id="form-menu">
                <!-- ID tersembunyi -->
                <input type="hidden" id="menu-id" name="menu-id" />

                <!-- Title -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-edit-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="menu-title" name="menu-title" class="form-control" placeholder="Title Menu" />
                            <label for="menu-title">Title</label>
                        </div>
                    </div>
                </div>

                <!-- Route -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-link"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="menu-route" name="menu-route" class="form-control" placeholder="Route name (ex: dashboard)" />
                            <label for="menu-route">Route</label>
                        </div>
                    </div>
                </div>

                <!-- Icon -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-image-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="menu-icon" name="menu-icon" class="form-control" placeholder="Icon class (ex: ri-dashboard-line)" />
                            <label for="menu-icon">Icon</label>
                        </div>
                    </div>
                </div>

                <!-- Parent Menu -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="menu-parent" name="menu-parent" class="form-select">
                            <option value="">-- Parent (Optional) --</option>
                            @foreach ($allMenus as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                            @endforeach
                        </select>
                        <label for="menu-parent">Parent Menu</label>
                    </div>
                </div>

                <!-- Order -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-sort-asc"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="number" id="menu-order" name="menu-order" class="form-control" placeholder="Order" />
                            <label for="menu-order">Order</label>
                        </div>
                    </div>
                </div>

                <!-- Permission -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <select id="menu-permission" name="menu-permission" class="form-select">
                            <option value="">-- Tanpa Permission --</option>
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                        <label for="menu-permission">Permission</label>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                </div>
            </form>

        </div>
    </div>
    <!--/ DataTable with Buttons -->


</div>
<script src="{{ asset('js/system/menus.js') }}"></script>
@endsection