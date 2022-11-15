@extends('backend.master.master')

@section('title')
{{ $client_lists->name }} |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="{{ asset('/') }}public/new_admin/assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <h5 class="font-size-15 text-truncate mt-4">{{ $client_lists->name }} </h5>

                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>


                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>{{ $client_lists->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>{{ $client_lists->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>{{ $client_lists->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Address :</th>
                                                        <td>{{ $client_lists->address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->


                                <!-- end card -->
                            </div>

                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Total Money</p>
                                                        <h4 class="mb-0">{{ $payment_list_amount }}</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Remaining Money</p>
                                                        <h4 class="mb-0">{{ $payment_list_amount - $total_price_list }}</h4>
                                                    </div>

                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">


                                        <button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                            <i class="far fa-calendar-plus  mr-2"></i> Add Money
                                        </button>


                                        <!--  Large modal example -->
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">Add Money</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('client_payment') }}" method="POST" enctype="multipart/form-data">

                                                            @csrf
                                                            <div class="row">

                                                                <div class="form-group col-md-12 col-sm-12">
                                                                    <label for="email">Date</label>

                                                                    <input type="date" class="form-control form-control-sm" id="email" value="<?php echo date('Y-m-d'); ?>" name="main_date" placeholder="Enter Amount" >
                                                                </div>


                                                                <div class="form-group col-md-12 col-sm-12">
                                                                    <label for="email">Amount</label>
                                                                    <input type="hidden" class="form-control form-control-sm" value="{{ $client_lists->id  }}" id="email" name="id" placeholder="Enter Amount" >
                                                                    <input type="text" class="form-control form-control-sm" id="email" name="amount" placeholder="Enter Amount" >
                                                                </div>


                                                            </div>





                                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Advance Money List</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Amount</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($payment_list as $key=>$all_payment_list)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ date('d-m-Y', strtotime($all_payment_list->main_date)) }}</td>
                                                        <td>{{ $all_payment_list->amount }}</td>

                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">My Product</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Unit Price</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($consigment_main_detail as $key=>$all_consigment_main_detail)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $all_consigment_main_detail->product_name }}</td>
                                                        <td>{{ $all_consigment_main_detail->quantity }}</td>
                                                        <td>{{ $all_consigment_main_detail->price }}</td>
                                                  
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
@endsection


@section('script')
@endsection
