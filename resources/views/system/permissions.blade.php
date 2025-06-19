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
            <form class="add-new-record pt-0 row g-3" id="form-permissions">
                <div class="col-sm-12">
                    <input type="hidden" id="permissions-id" name="permissions-id" />
                    <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ri-service-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="permissions-name"
                                class="form-control "
                                name="permissions-name"
                                placeholder="Name" />
                            <label for="permissions-name">Permissions Name</label>
                        </div>
                    </div>
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
<script src="{{ asset('js/system/permissions.js') }}"></script>
@endsection