<x-admin.layouts.admin_master>
    <main class="content">
        <div class="container-fluid p-0">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin Profile</div>
                <div class="breadcrumb-title pe-3">Change Password</div>

                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('status'))
                                    <div style="padding: 0 0 1rem 0">
                                        <strong style="color: green;">{{session('status')}}</strong>
                                    </div>
                                    @endif
                                    <form method="post" action="{{route('update.password')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" name="old_password" class="form-control" id="current_password" placeholder="Old Password" />
                                                @if (session('error'))
                                                <div style="padding: 0 0 1rem 0">
                                                    <strong style="color: red;">{{session('error')}}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">New Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirm New Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_conformation" placeholder="Confirm New Password" />
                                                @if (session('confirmerror'))
                                                <div style="padding: 0 0 1rem 0">
                                                    <strong style="color: red;">{{session('confirmerror')}}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-success px-4" value="Save Changes" />
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




</x-admin.layouts.admin_master>