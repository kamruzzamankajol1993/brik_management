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
<?php

$get_role_id = DB::table('model_has_roles')
                    ->where('model_id',Auth::guard('admin')->user()->id)->value('role_id');

?>
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
    @if($get_role_id == 1)
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
                            <h4>{{ $total_briks }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

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
                            <h4>{{ $total_price_list }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

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
                            <h4>{{ $alert_inventory }} <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>


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
                            <h4>{{ $total_delivery }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    @endif
</div>
@if($get_role_id == 1)
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Consignment On board</h4>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                               <th>SL</th>
                                                    <th>Client Name</th>
                                                    <th>Address</th>
                                                    <th>Product Name & Quantity</th>

                                                    <th>Truck Number</th>


                                                       <th> Request Status</th>

                                                    <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            @foreach ($consigment_detail as $user)


                                                <tr>
                                                   <td>{{ $loop->index+1 }}</td>
                                                   <td>{{ $user->client_name }}</td>
                                                    <td>{{ $user->delivery_address}}</td>

                                                    <td>

                                                        <?php

                                                        $p_name = DB::table('consigment_details')
                                                        ->where('consigment_id',$user->id)
                                                        ->latest()
                                                        ->get();
                                                        ?>

                                                        @foreach($p_name as $all_p_name)

                {{ $all_p_name->product_name }} - {{ $all_p_name->quantity }}<br>
                                                        @endforeach


                                                    </td>


                                                    <td>{{ $user->select_truck }}</td>
                                                    <td>

                                                        @if($user->status == 1)


                                                        <span class="badge bg-success mt-1">
                                                            Confirmed
                                                         </span>


                                                        @elseif($user->status == 0)

                                                        <span class="badge bg-warning mt-1">
                                                           Pending
                                                        </span>

                                                        @elseif($user->status == 2)

                                                        <span class="badge bg-danger mt-1">
                                                           Cancelled
                                                        </span>
                                                      @endif
                                                    </td>



                                                    <td>


                                                      @if (Auth::guard('admin')->user()->can('consigment_update'))
                                                      <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                                        class="btn btn-primary waves-light waves-effect  btn-sm" >
                                                        <i class="fas fa-list"></i></button>


                                                        <!--  Large modal example -->
                                                        <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel">Update Status </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('admin.release_product.update') }}" method="POST" enctype="multipart/form-data">

                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="name"> Release Date</label>
                                                                    <input type="date" class="form-control form-control-sm" id="name" name="rmain_date" placeholder="Enter Name" value="{{ $user->main_date }}">

                                                                    <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                                </div>


                                                                            </div>



                                                                            <div class="row">

                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="password">Status</label>
                                                                                    <select name="status" class="form-control form-control-sm" >

                                                                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Delivered</option>
                                                                                            <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Deny</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->




                @endif

                {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                                  @if (Auth::guard('admin')->user()->can('consigment_delete'))

                <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.consigment.delete',$user->id) }}" method="POST" style="display: none;">
                                      @method('DELETE')
                                                                    @csrf

                                                                </form>
                                                                @endif
                                                    </td>
                                                </tr>
                @endforeach


                                                        </tbody>
                                                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endif
@endsection
