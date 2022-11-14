

@foreach($size_list_all as $all_size_list_all)
<tr>

<td><input id="s" type="text" value="{{$all_size_list_all->size}}" name="size[]" required placeholder="Enter Size" class="form-control" /></td>
<td><input id="ll" type="text" value="{{$all_size_list_all->length}}" name="length[]" required placeholder="Enter Length" class="form-control" /></td>
<td><input id="ll" type="text" value="{{$all_size_list_all->width}}" name="width[]" required placeholder="Enter Length" class="form-control" /></td>
<td><input id="sh" type="text" value="{{$all_size_list_all->shoulder}}" name="shoulder[]" required placeholder="Enter Shoulder" class="form-control" /></td>
<td><input id="ch" type="text" value="{{$all_size_list_all->sleeve}}" name="chest[]" placeholder="Enter Chest" required class="form-control" /></td>

</tr>
@endforeach