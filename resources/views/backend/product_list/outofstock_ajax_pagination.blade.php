<ul class="pagination pagination-rounded justify-content-end mb-2">
    {{-- <li class="page-item active" aria-current="page">
      <span class="page-link">1</span>
    </li> --}}

    <!--check total number greater than 10  -->
    @if($total_serial_number_outOfStock > 10)

    <!--previous button work -->
    @if($id_for_pass_outOfStock == 1)

    <li class="page-item disabled">
      <button  class="page-link" id="papage_link_outOfStock"> <i class="mdi mdi-chevron-left"></i></button>
  </li>

    @else
    <li class="page-item ">
      <button  class="page-link" id="papage_link_outOfStock{{ $id_for_pass_outOfStock }}"> <i class="mdi mdi-chevron-left"></i></button>
  </li>
  @endif
<!--end previous button work-->

    @for($i = 1; $i <= $total_serial_number_outOfStock; $i++)

    <!-- 1 to 5 code --->
    <!-- end 1 to 5 code --->

    @if($i == 1)
    @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
    @elseif($i == 2)
    @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
  @elseif($i == 3)
  @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
  @elseif($i == 4)
  @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif

  @elseif($i == 5)
  @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i+1 }}">{{ $i+1 }}</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @if($id_for_pass_outOfStock == 6 || $id_for_pass_outOfStock == 7 )

   @else

  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  @endif
  @endif

  @elseif($i == $id_for_pass_outOfStock)
  @if($i == $id_for_pass_outOfStock)
  @if($id_for_pass_outOfStock == $total_serial_number_outOfStock || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 1))

  @else

  @if($id_for_pass_outOfStock == 6)

   @else
  <li class="page-item">
      <button  class="page-link" id="apage_link_outOfStock{{ $i-1 }}">{{ $i-1 }}</button>
  </li>
  @endif
@endif
<!-- main -->
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
<!--main-->
  @if($id_for_pass_outOfStock == $total_serial_number_outOfStock || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 1) || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 2) || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 3)  )

  @else
  <li class="page-item">
      <button  class="page-link" id="apage_link_outOfStock{{ $i+1 }}">{{ $i+1 }}</button>
  </li>
@endif
@if($id_for_pass_outOfStock == $total_serial_number_outOfStock || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 1) || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 2) || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 3) || $id_for_pass_outOfStock == ($total_serial_number_outOfStock - 4) )



@else
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  @endif


  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  {{-- <li class="page-item ">
      <button  class="page-link" >.</button>
  </li>
  <li class="page-item ">
      <button  class="page-link" >.</button>
  </li> --}}
  @endif

  @elseif($i == ($total_serial_number_outOfStock-2) )

  @if($i == $id_for_pass_outOfStock)

    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>

  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
  @elseif($i == ($total_serial_number_outOfStock-1) )
  @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
  @elseif($i == $total_serial_number_outOfStock )
  @if($i == $id_for_pass_outOfStock)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else
  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif

  @endif
  @endfor
<!--next button work -->
@if($id_for_pass_outOfStock == $total_serial_number_outOfStock)
<li class="page-item disabled">
<button  class="page-link disabled" id="napage_link_outOfStock"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@else
<li class="page-item ">
<button  class="page-link" id="napage_link_outOfStock{{ $id_for_pass_outOfStock }}"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@endif
<!--end next button work-->

    @else
    <!--end check total number greatee than 10 -->
        <!--check total number smaller than 10  -->
        <!--previous button work -->
        @if($id_for_pass_outOfStock == 1)

    <li class="page-item disabled">
      <button  class="page-link" id="papage_link_outOfStock"> <i class="mdi mdi-chevron-left"></i></button>
  </li>

    @else
    <li class="page-item ">
      <button  class="page-link" id="papage_link_outOfStock{{ $id_for_pass_outOfStock }}"> <i class="mdi mdi-chevron-left"></i></button>
  </li>
  @endif
<!--end previous button work-->
    @for($i = 1; $i <= $total_serial_number_outOfStock; $i++)



    @if($i == 1)
    @if($id_for_pass_outOfStock == 1)
    <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @else

  <li class="page-item ">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}">{{ $i }}</button>
  </li>
  @endif
  @else

  @if($i == $id_for_pass_outOfStock)

  <li class="page-item active">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}" >{{ $i }}</button>
  </li>

  @else
  <li class="page-item">
      <button  class="page-link" id="apage_link_outOfStock{{ $i }}" >{{ $i }}</button>
  </li>
@endif

@endif


  @endfor
     <!--end check total number smaller than 10  -->
<!--next button work -->

@if($id_for_pass_outOfStock == $total_serial_number_outOfStock)
<li class="page-item disabled">
<button  class="page-link disabled" id="napage_link_outOfStock"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@else
<li class="page-item ">
<button  class="page-link" id="napage_link_outOfStock{{ $id_for_pass_outOfStock }}"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@endif
<!--end next button work-->
  @endif
  </ul>
