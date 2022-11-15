@extends('backend.master.master')

@section('title')
Car and Driver  List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Car and Driver   List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('car_and_driver_add'))
<button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Car and Driver
                                    </button>
@endif
                                </div>
                            </div>
                        </div>
</div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>SL</th>
                                    <th>Driver Name</th>
                                    <th>Car Number Plate</th>
                                    <th>Driver Contact Number</th>
                                       <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($car_and_driver_lists as $user)


                                <tr>
                                   <td>{{ $loop->index+1 }}</td>
                                   <td>{{ $user->driver_name }}</td>
                                    <td>{{ $user->car_number	 }}</td>
                                    <td>{{ $user->contact_no }}</td>


                                    <td>

                                        @if($user->status == 1)


                                        <span class="badge bg-success mt-1">
                                            Active
                                         </span>


                                        @else

                                        <span class="badge bg-danger mt-1">
                                           Inactive
                                        </span>
                                      @endif
                                    </td>

                                    <td>{{ date('d-m-Y', strtotime($user->main_date)) }}</td>

                                    <td>


                                      @if (Auth::guard('admin')->user()->can('car_and_driver_update'))
                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update Car and Driver </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.car_and_driver.update') }}" method="POST" enctype="multipart/form-data">

                                                                @csrf
                                                                <div class="row">
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="name">Date</label>
                                                        <input type="date" class="form-control form-control-sm" id="name" name="main_date" placeholder="Enter Name" value="{{ $user->main_date }}">

                                                        <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                    </div>

                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="email">Driver Name</label>
                                                                        <input type="text" class="form-control form-control-sm" id="email" name="driver_name" value="{{ $user->driver_name }}" placeholder="Enter Driver Name" >
                                                                    </div>

                                                                     <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="email">Car Number Plate</label>
                                                                        <input type="text" class="form-control form-control-sm" id="email" name="car_number" value="{{ $user->car_number }}" placeholder="Enter Car Number Plate" >
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="email1">Driver Phone</label>
                                                                        <input type="number" class="form-control form-control-sm" id="email1" name="contact_no" value="{{ $user->contact_no }}" placeholder="Enter Driver  Phone" >
                                                                    </div>


                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password">Status</label>
                                                                        <select name="status" class="form-control form-control-sm" >

                                                                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                                                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>InActive</option>
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

                                  @if (Auth::guard('admin')->user()->can('car_and_driver_delete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.car_and_driver.delete',$user->id) }}" method="POST" style="display: none;">
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
                        </div> <!-- end col -->
                    </div> <!-- end row -->




  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add New Car and Driver </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.car_and_driver.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="name">Date</label>
                            <input type="date" class="form-control form-control-sm" id="name" name="main_date" placeholder="Enter Name" value="<?php echo date('Y-m-d');?>">


                                        </div>

                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Driver Name</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="driver_name" placeholder="Enter Driver Name" >
                                        </div>

                                         <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Car Number Plate</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="car_number" placeholder="Enter Car Number Plate" >
                                        </div>
                                    </div>

                                    <div class="row mt-2">


                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="email1">Driver Phone</label>
                                            <input type="number" class="form-control form-control-sm" id="email1" name="contact_no" placeholder="Enter Driver  Phone" >
                                        </div>


                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="password">Status</label>
                                            <select name="status" class="form-control form-control-sm" >

                                                    <option value="1" >Active</option>
                                                    <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>


                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">

                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>
                                      </div>

                          </div>
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('script')

     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
     </script>

      <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You will not be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection







