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
							<h4 class="content-title mb-0 my-auto">إنشاء فاتورة</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


<form class="form-horizontal" action="{{url('/admin/bills')}}" method="POST" >
    @csrf
<div class="row-sm">
	<div class="col-xl-12">
        <div class="card">
            
            	<div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-1 control-label">اسم الزبون </label>
                        <div class="col-sm-10">
                          <input type="text"  readonly="true" value="{{$reservation->customer->name}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 control-label"> تاريخ الحجز </label>
                        <div class="col-sm-4">
                          <input type="text"  readonly="true" value="{{$reservation->date}}" class="form-control" autocomplete="on">
                        </div>
                        <label class="col-sm-1 control-label">  المناسبة </label>
                        <div class="col-sm-4">
                           <input type="text"  readonly="true" value="{{$reservation->occasions->name}}" class="form-control" autocomplete="on">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 control-label"> سعر الحجز </label>
                        <?php
                             $day = date('l' , strtotime($reservation->date));
                             $price=0;
                            if($day='Thursday')
                            {
                                $price = $reservation->occasions->thu_price;
                            }
                            else {
                                $price = $reservation->occasions->st_fr_price;
                            }
                         ?>
                        <div class="col-sm-4">
                          <input type="text"  readonly="true" value="{{$price}}" class="form-control" autocomplete="on">
                        </div>
                        <?php 
                            $sum=0 ;
                            foreach ($servicesReservation->services as $index=>$item)  
                            {
                                $sum+=$item->pivot->price;
                            }      
                        ?>  
                        <label class="col-sm-1 control-label">  سعر الخدمات </label>
                        <div class="col-sm-4">
                           <input type="text"  readonly="true" value="{{$sum}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <?php
                        $sum_credit=0;
                        $sum_debit=$sum;
                        foreach ($bills as $item)  
                        {
                            $sum_credit+=$item->credit;
                        } 
                        $total=$sum+ $price;  
                        $sum_debit=$total-$sum_credit;  
                    ?> 
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">  السعر الكلي  </label>
                        <div class="col-sm-2">
                          <input type="text" name="total" readonly="true" value="{{$total}}" class="form-control" autocomplete="on">
                        </div>
                        <label class="col-sm-2 control-label">  القيمة المدفوعة </label>
                        <div class="col-sm-2">
                          <input type="text" name="old_credit" readonly="true" value="{{$sum_credit}}" class="form-control" autocomplete="on">
                        </div>
                        <label class="col-sm-1 control-label">  الباقي </label>
                        <div class="col-sm-2">
                           <input type="text" name="old_debit" readonly="true" value="{{$sum_debit}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                  
            	</div>
                <!-- /.card-body -->

            </div>
	</div>
</div>




<div class="row row-sm">
	<div class="col-xl-12">
        <div class="card">
           
            	<div class="card-body">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}" class="form-control" autocomplete="on">

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">القيمة المدفوعة</label>
                        <div class="col-sm-10">
                        <input type="number" name="credit" value="{{old('credit')}}" class="form-control" autocomplete="on">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label"> تاريخ الدفع</label>
                        <div class="col-sm-10">
                        <input type="date" name="date" value="{{old('date')}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label"> طريقة الدفع</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control js-example-matcher">
                                <option value="0">كاش</option>
                                <option value="1">بطاقة</option>
                                <option value="2">شيك</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">ملاحظات</label>
                        <div class="col-sm-10">
                            <textarea name="note" id="" cols="90" rows="10"  class="form-control" >

                            </textarea>
                        </div> 
                    </div>
                  
            	</div>
            	<!-- /.card-body -->
            	<div class="card-footer">
            		<button type="submit" class="btn btn-primary">إضـافـة</button>
            	</div>
            	<!-- /.card-footer -->
           
		</div>
	</div>
</div>
			
</form>

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
@endsection