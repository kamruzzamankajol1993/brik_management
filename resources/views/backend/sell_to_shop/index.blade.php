@extends('backend.master.master')

@section('title')
Sell To Shop List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Sell To Shop List</h4>

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
                                @if (Auth::guard('admin')->user()->can('sell_to_shop_add'))
<a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" href="{{ route('admin.sell_to_shop.create') }}">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Product
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
                                    <th>Vendor Name</th>
                                    <th>Shop Name</th>
                                    <th>Address</th>
                                    <th>Product Name & Quantity</th>


                                    <th>Created At</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($consigment_detail as $user)


                                <tr>
                                   <td>{{ $loop->index+1 }}</td>
                                   <td>{{ $user->name }}</td>
                                   <td>{{ $user->shop_name }}</td>
                                    <td>{{ $user->delivery_address}}</td>

                                    <td>

                                        <?php

                                        $p_name = DB::table('selltoshopdetails')
                                        ->where('consigment_id',$user->id)
                                        ->latest()
                                        ->get();
                                        ?>

                                        @foreach($p_name as $all_p_name)

{{ $all_p_name->product_name }} - {{ $all_p_name->quantity }}<br>
                                        @endforeach


                                    </td>





                                    <td>{{ date('d-m-Y', strtotime($user->main_date)) }}</td>

                                    <td>

                                        @if (Auth::guard('admin')->user()->can('sell_to_shop_view'))
                                        <a type="button" href="{{ route('admin.sell_to_shop.view',$user->id) }}"
                                        class="btn btn-success waves-light waves-effect  btn-sm" >
                                        <i class="fas fa-eye"></i></a>
                                        @endif


                                      @if (Auth::guard('admin')->user()->can('sell_to_shop_update'))
                                          <a type="button" href="{{ route('admin.sell_to_shop.edit',$user->id) }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></a>




@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                  @if (Auth::guard('admin')->user()->can('sell_to_shop_delete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.sell_to_shop.delete',$user->id) }}" method="POST" style="display: none;">
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







