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
							<h4 class="content-title mb-0 my-auto">تغيير كلمة السر</h4>
						</div>
					</div>
					
				</div>
                <!-- breadcrumb -->
                @include('layouts._session')

@endsection
@section('content')
<div class="row row-sm">

	<div class="col-xl-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('/User/'.auth()->user()->id)}}" method="POST" >
                @csrf
                @method('PUT')            
            
            	<div class="card-body">
            
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> كلمة المرور القديمة</label>
                        <div class="col-sm-10">
                        <input type="password" name="current_password" class="form-control" autocomplete="on">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"> كلمة المرور الجديدة</label>
                        <div class="col-sm-10">
                        <input type="password" name="new_password" class="form-control" autocomplete="on">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">تأكيد كلمة المرور </label>
                        <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="on">
                        </div>
                    </div>

                    
            	</div>
            	<!-- /.card-body -->
            	<div class="card-footer">
            		<button type="submit" class="btn btn-primary">حفظ</button>
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
@endsection
























