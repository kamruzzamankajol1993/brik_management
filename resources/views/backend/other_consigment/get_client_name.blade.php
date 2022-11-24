
@foreach($client_lists as $all_client_lists)
<div class="form-group row mt-2">
    <label for="" class="col-sm-4 col-form-label">Delivery Address</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" value="{{ $all_client_lists->address }}" name="delivery_address" id="delivery_address">
    </div>
</div>

<div class="form-group row mt-2">
    <label for="" class="col-sm-4 col-form-label">Contact No</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" value="{{ $all_client_lists->phone }}" name="contact" id="contact">
    </div>
</div>
@endforeach

