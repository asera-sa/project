@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('map/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الصالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صالة جديدة</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									نمودج تسجيل بيانات صالة جديدة
								</div><br><br>
								<form class="form-horizontal" action="{{url('/admin/halls')}}" method="post" enctype="multipart/form-data">
									@csrf
								<div id="wizard3">
									<h3 style="color: blue;" >بيانات الصالة</h3><br>
									<section>
										<input type="hidden" name="lat" placeholder="lat" id="lat"> <br>
                                        <input type="hidden" name="lng" placeholder="lng" id="lng">
    
										<div class="control-group form-group">
											<label class="form-label">اسم الصالة </label>
											<input type="text" class="form-control required" placeholder="اسم الصالة" name="name">
                                        </div>
                                        <div class="control-group form-group">
											<label class="form-label"> صورة </label>
											<input type="file" class="form-control image-input required" placeholder="قم بااختيار صورة " name="file">
											<div class="box-review-img">
												<img src="" alt="">
											</div>
                                        </div>
                                        <div class="control-group form-group">
											<label class="form-label"> رقم الهاتف </label>
											<input type="number" class="form-control required" placeholder=" رقم الهاتف" name="phone">
										</div>
										<div class="control-group form-group">
											<label class="form-label">البريد الإلكتروني</label>
											<input type="email" class="form-control required" name="email" placeholder=" البريد الإلكتروني لصالة">
										</div>
										<div class="control-group form-group mb-0">
											<label class="form-label">المنطقة</label>
											<select name="Address_id" class="form-control js-example-matcher" required>
												@foreach ($Address as $item)
												   <option value="{{$item->id}}">{{$item->name}} </option>                                          
												@endforeach
											</select>   									
										</div>
										<div class="control-group form-group mb-0">
											<label class="form-label">العنوان</label>
											<input type="text" class="form-control required" name="address" placeholder="العنوان">
                                        </div>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">سعة الصالة </label>
											<input type="number" class="form-control required" name="capacity" placeholder="سعة الصالة">
										</div>
										<div class="control-group form-group mb-0">

										  <!--begin::Card-->
                                           <div class="card card-custom gutter-b example example-compact mt-2">
                                               <div class="card-header">
                                                   <div class="card-title">
                                                       <h3 class="card-label text-right"> اختر موقع الصالة </h3>
                                                   </div>
                                               </div>
                                               <div class="card-body">
                                                   <div id="kt_leaflet_5" style="height:300px;"></div>
                                                   <!--begin::Code-->
                                                   <div class="example-code mt-5">
                                                       <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                                                          
                                                       </ul>
                                                   </div>
                                                   <!--end::Code-->
                                               </div>
                                            </div>
                                            <!--end::Card-->
										</div>
									</section>
									
									<h3 style="color: blue;">بيانات صاحب الصالة</h3><br>
									<section>
                                        <div class="control-group form-group">
											<label class="form-label">اسم المستخدم </label>
											<input type="text" class="form-control required" placeholder="اسم المستخدم" name="uname">
                                        </div>
                                        <div class="control-group form-group">
											<label class="form-label">البريد الإلكتروني</label>
											<input type="email" class="form-control required" name="uemail" placeholder="البريد الإلكتروني للمستخدم">
										</div>
                                        <div class="control-group form-group">
											<label class="form-label"> كلمة المرور  </label>
											<input type="password" class="form-control required" name="upassword" placeholder="  كلمة المرور">
                                        </div>
                                        <div class="control-group form-group">
											<label class="form-label"> تأكيد كلمة المرور  </label>
											<input type="password" class="form-control required" name="upassword_confirmation" placeholder=" تأكيد كلمة المرور ">
										</div>
                                        <div class="control-group form-group">
											<label class="form-label"> رقم الهاتف </label>
											<input type="number" class="form-control required" name="uphone" placeholder=" رقم الهاتف">
										</div>
										
										
										<div class="control-group form-group mb-0">
											<label class="form-label">العنوان</label>
											<input type="text" class="form-control required" name="uaddress" placeholder="العنوان">
                                        </div>
                                        
									</section>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
                <!-- row closed -->
                

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
<script>
    $(document).ready(function() { // هذا لما تحمل الصفحة


        const li = $('.actions.clearfix ul li').children('a[href$="finish"]').parent('li');
        const a = $('.actions.clearfix ul li').children('a[href$="finish"]');
        const previous = $('.actions.clearfix ul li').children('a[href$="previous"]');
        const next = $('.actions.clearfix ul li').children('a[href$="next"]');
		previous.text('السابق');
		next.text('التالي');
	
        li.prev('li').children('a').on('click', function(e) {
            e.preventDefault();
            li.css("display","block"); // يظهر li عشان تطلع ال button
            a.replaceWith('<button type="submit" role="menuitem" style="display:block; background-color: #00cccc;padding: 9px 25px;line-height: 1.573;color: #fff;border-radius: 3px; border:0;"> حفظ </button>');

        });
        previous.on('click', function(e) {
            e.preventDefault();
            li.css("display","none");
        });
		

		// ** Review image on select ** //
		$('.image-input').on('change', function() {
			console.log('hello');
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.box-review-img img').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} // End if
		});

	});
</script>
{{-- <script src="{{asset('map/plugins/global/plugins.bundle.js')}}"></script> --}}
<script src="{{asset('map/plugins/custom/prismjs/prismjs.bundle.js')}}"></script> 
<script src="{{asset('map/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('map/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>

<script src="{{asset('js/maps/mapCreat.js')}}"></script>
@endsection
