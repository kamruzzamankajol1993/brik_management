@extends('backend.master.master')

@section('title')
Dashboard
@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4">
        <div class="card bg-primary bg-soft">
            <div>
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>



                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('/') }}public/new_admin/assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL BRICKS</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>1,452 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-archive-in"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL CONSIGNMENT AMOUNT</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>$ 28,452 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-purchase-tag-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">ALERT INVENTORY</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>$ 16.2 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-purchase-tag-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL DELIVERY</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>$ 16.2 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Consignment On board</h4>

                <div class="table-responsive">
                    <table class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Delivery Type</th>
                                <th scope="col">Release By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>X</td>
                                <td>200</td>
                                <td>Y</td>
                                <td>Dhaka</td>
                                <td>Pending</td>
                                <td>Z</td>
                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>X</td>
                                <td>200</td>
                                <td>Y</td>
                                <td>Dhaka</td>
                                <td>Delivered</td>
                                <td>Z</td>
                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>X</td>
                                <td>200</td>
                                <td>Y</td>
                                <td>Dhaka</td>
                                <td>Pending</td>
                                <td>Z</td>
                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>X</td>
                                <td>200</td>
                                <td>Y</td>
                                <td>Dhaka</td>
                                <td>Pending</td>
                                <td>Z</td>
                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-pencil-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
