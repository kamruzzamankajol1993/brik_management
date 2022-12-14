@extends('backend.master.master')

@section('title')
Product Containment List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Product Containment List</h4>

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
                                @if (Auth::guard('admin')->user()->can('consigment_add'))
<a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" href="{{ route('admin.consigment.create') }}">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Consigment
</a>
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
                                    <th>Client Name</th>
                                    <th>Address</th>
                                    <th>Product Name & Quantity</th>
                                    <th>Request Type</th>
                                    <th>Truck Number</th>


                                       <th> Request Status</th>
                                    <th>Created At</th>
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
                                    <td>{{ $user->request_type }}</td>

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

                                    <td>{{ date('d-m-Y', strtotime($user->main_date)) }}</td>

                                    <td>


                                      @if (Auth::guard('admin')->user()->can('consigment_update'))
                                          <a type="button" href="{{ route('admin.consigment.edit',$user->id) }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></a>




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







