@extends('backend.master.master')

@section('title')
Invoice View|{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Invoice View</h4>

        </div>
    </div>

</div>

<div class="row">
    @include('flash_message')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="button-items justify-content-center">


                    <a href="{{ route('admin.sell_to_shop.edit',$consigment_detail->id) }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-pen"></i> Edit Invoice
                    </a>




                    <a href="{{ route('admin.sell_to_shop.print',$consigment_detail->id) }}" class="btn btn-info waves-effect waves-light"><i class="fas fa-print"></i> Print
                    </a>






                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Order #{{ $consigment_detail->consignment_number }}</h4>
                    <div class="mb-4">
                        <img src="{{ asset('/') }}{{ $logo }}" alt="logo" height="20" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            {{ $consigment_detail->shop_name }}<br>
                            {{ $consigment_detail->delivery_address }}<br>
                            {{ $consigment_detail->contact }}
                        </address>
                    </div>
                    {{-- <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Shipped To:</strong><br>
                           {{ $ship_address_detail->name }}<br>
                           {{ $ship_address_detail->address }}
                        </address>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <div class="col-sm-6 mt-3">
                        <address>
                            <strong>Payment Method:</strong><br>
                            <br>

                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Order Date:</strong><br>
                            <br><br>
                        </address>
                    </div>
                </div> --}}
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Order summary</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 70px;">No.</th>
                            <th>Item</th>
                            <th>Quantity</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php  $total_quantity = 0;?>
                            @foreach($consigment_main_detail as $key=>$all_consigment_main_detail)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $all_consigment_main_detail->product_name }}</td>
                                <td>{{ $all_consigment_main_detail->quantity }}</td>
                            </tr>

                            <?php  $total_quantity = $total_quantity + $all_consigment_main_detail->quantity; ?>

                            @endforeach


                        <tr>
                            <td colspan="3" class=" border-0 text-end">Sub Total</td>
                            <td class="text-end">{{ $total_quantity }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="d-print-none">
                    {{-- <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('script')

@endsection
