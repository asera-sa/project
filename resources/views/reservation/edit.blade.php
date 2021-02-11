@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الزبائن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل بيانات زبون </span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="row row-sm">
	<div class="col-xl-12">
        <div class="card">
            @include('_session')

            <form class="form-horizontal" action="{{url('/admin/reservation/'.$reservation->id)}}" method="POST" >
                @csrf
                @method('PUT')            

            	<div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">الإسم</label>
                        <div class="col-sm-6">
                            <select name="customers_id" class="form-control js-example-matcher" required>
                                @foreach ($customer as $item)
                                <option value="{{$item->id}}"  {{$reservation->customer_id==$item->id  ? 'selected' : ' ' }}>{{$item->name}}</option>  
                                @endforeach
                            </select>                        
                         </div>
                        
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label"> تاريخ الحجز </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control " name="date"  value="{{$reservation->date}}" autocomplete="date" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label"> المناسبة</label>
                        <div class="col-sm-6">
                            <select name="occasions_id" class="form-control js-example-matcher" required>
                                @foreach ($occasions as $item)
                                <option value="{{$item->id}}"  {{$reservation->occasions_id ==$item->id  ? 'selected' : ' ' }}>{{$item->name}}</option>  
                                @endforeach
                            </select> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">الفترة</label>
                        <div class="col-sm-6">
                            <select name="time" class="form-control js-example-matcher" required>
                                @if($reservation->time ==0)
                                <option value="0">فترة صباحية </option>                                          
                                <option value="1">فترة مسائية </option> 
                                @endif    
                                @if($reservation->time ==1)
                                <option value="1">فترة مسائية </option> 
                                <option value="0">فترة صباحية </option>                                          
                                @endif                                         
                            </select> 
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label  class="col-md-2 col-form-label text-md-right"><h5>الخدمات المتوفرة</h5>  </label>
                        
                        <div class="col-md-6"><br><br>
                            <table class="table">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th >الكمية المطلوبة</th>
                                    <th></th>
                                </tr><?php $i=[]; ?>
                                @foreach ($servicesReservation->services as $servic)
                                    <tr>
                                        <td></td>
                                        <td>{{$servic->name}}</td>
                                        <td>{{$servic->price}} د.ل</td>
                                        <input type="hidden"  name="services_id[]" value="{{$servic->id}}">
                                        <input type="hidden"  name="price[]"  value="{{$servic->price}}">
                                        <td><input type="number" name="quantity[]" value="{{$servic->pivot->quantity}}" style="width: 7rem;" min="1"></td>
                                        <td>
                                            @if ($servic->pivot->quantity > 0)
                                                <input type="checkbox" name="check[]" class="check" checked value="true">
                                            @endif
                                        </td>
                                        <?php array_push($i, $servic->id); ?>
                                    </tr>
                                @endforeach


                                @foreach ($serviceshalls as $servic)
                                    @if( ! in_array($servic->id, $i))
                                        <tr>
                                            <td></td>
                                            <td>{{$servic->name}}</td>
                                            <td>{{$servic->price}} د.ل</td>
                                            <input type="hidden"  name="services_id[]" disabled value="{{$servic->id}}">
                                            <input type="hidden"  name="price[]"  value="{{$servic->price}}">
                                            <td><input type="number" name="quantity[]" disabled style="width: 7rem;" min="1"></td>
                                            <td><input type="checkbox" name="check[]" class="check" value="false"></td>
                                        </tr>
                                    @endif
                                @endforeach 

                               

                            </table> 

                        </div>

                    </div>
                 
                    
                    
            	</div>
            	<!-- /.card-body -->
            	<div class="card-footer">
            		<button type="submit" class="btn btn-primary">حفظ التعديلات </button>
            	</div>
            	<!-- /.card-footer -->
            </form>
		</div>
	</div>
</div>
			


			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

 
<script>
   
   
const checkboxes = document.querySelectorAll('.check');
checkboxes.forEach(box => {
    box.addEventListener('click', function(e) {
        let td = e.currentTarget.parentElement;
        let inputquantity = td.previousElementSibling.children[0];
        let price = td.previousElementSibling.previousElementSibling;
        let services_id = price.previousElementSibling;
        console.log(price);
        if (e.target.checked) {
            inputquantity.disabled = false;
            price.disabled = false;
            services_id.disabled = false;
            inputquantity.value = 1;
            e.target.value = true;
        } else {
            inputquantity.disabled = true;
            price.disabled = true;
            services_id.disabled = true;
            inputquantity.value = 0;
            e.target.value = false;
        }
    })
});
</script>
@endsection