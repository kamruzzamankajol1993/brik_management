
@foreach($client_lists as $all_client_lists)
<div class="form-group row mt-2">
    <label for="" class="col-sm-4 col-form-label">Driver</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" value="{{ $all_client_lists->driver_name }}" name="driver_name" id="driver_name">
    </div>
</div>

<div class="form-group row mt-2">
    <label for="" class="col-sm-4 col-form-label">Contact No</label>
    <div class="col-sm-8">
        <input class="form-control" type="text"  value="{{ $all_client_lists->contact_no }}"  name="driver_contact" id="driver_contact">
    </div>
</div>
@endforeach

