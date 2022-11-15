@extends('backend.master.master')

@section('title')
Containment Release List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Containment Release List</h4>

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
                        </div> <!-- end col -->
                    </div> <!-- end row -->







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







