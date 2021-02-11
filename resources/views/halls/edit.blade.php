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
							<h4 class="content-title mb-0 my-auto">الصالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  تعديل بيانات صالة </span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="row row-sm">
	<div class="col-xl-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('/admin/halls/'.$halls->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT') 
            
            	<div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">الإسم</label>
                        <div class="col-sm-10">
                        <input type="text" name="name" value="{{$halls->name}}" class="form-control" autocomplete="on">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">صورة</label>
                        <div class="col-sm-10">
                        <input type="file" name="file" value="{{old('file')}}" class="form-control image-input" autocomplete="on">
                        </div>
                        <div class="col-md-6 mt-1">
                    

                            {{-- @if(in_array($extension,$imageExtensions)) --}}
                            <img class="img-fluid review-img center img-thumbnail img-responsive" id="img" src="{{asset($halls->file)}}" alt="">
                            {{-- @endif --}}
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">المنطقة</label>
                        <div class="col-sm-10">
                            <select name="Address_id" class="form-control js-example-matcher" required>
                                @foreach ($Address as $item)
                                <option value="{{$item->id}}"  {{$halls->Address_id==$item->id  ? 'selected' : ' ' }}>{{$item->name}}</option>  
                                @endforeach
                            </select>                           </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">العنوان</label>
                        <div class="col-sm-10">
                        <input type="text" name="address" value="{{$halls->address}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">رقم الهاتف</label>
                        <div class="col-sm-10">
                        <input type="text" name="phone" value="{{$halls->phone}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">البريد الألكتروني</label>
                        <div class="col-sm-10">
                        <input type="email" name="email" value="{{$halls->email}}" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> سعة الصالة </label>
                        <div class="col-sm-10">
                        <input type="number" name="capacity" value="{{$halls->capacity}}" class="form-control" autocomplete="on">
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
    // ** Review image on select ** //
    $('.image-input').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.review-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        } // End if
    });
</script>
@endsection
























