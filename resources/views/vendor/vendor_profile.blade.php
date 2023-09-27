<x-vendor.layouts.vendor_master>
    <main class="content">
        <div class="container-fluid p-0">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Vendor User Profile</div>
                <div class="breadcrumb-title pe-3">Vendor Profile</div>

                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center"><img src="{{asset(!empty($vendorData->photo)) ? url('upload/vendor_images/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="" class="img-fluid rounded-circle mb-2" width="200" height="150" />
                                        <div class="mt-3">
                                            <h4></h4>
                                            <p class="text-secondary mb-1"></p>
                                            <p class="text-muted font-size-sm"></p>

                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://w...content-available-to-author-only...3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                            <span class="text-secondary">https://c...content-available-to-author-only...t.com</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://w...content-available-to-author-only...3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                            <span class="text-secondary">codervent</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">User Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$vendorData->username}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$vendorData->name}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$vendorData->email}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$vendorData->phone}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$vendorData->address}}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                            <h6 class="mb-0">Picture</h6>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" class="form-control"  id="image"/>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Picture</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{asset(!empty($vendorData->photo)) ? url('upload/vendor_images/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="" class="img-fluid rounded-circle mb-2" width="200" height="150" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="button" class="btn btn-success px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src',e.target.result);
                }
             reader.readAsDataURL(e.target.files['0']);
            });

        });

    </script>
</x-vendor.layouts.vendor_master>
