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
							<h4 class="content-title mb-0 my-auto">الوظائف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ وظيفة جديدة </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

<div class="row row-sm">
	<div class="col-xl-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('/admin/hallJobs')}}" method="POST" >
                @csrf
            	<div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">الوظيفة</label>
                        <div class="col-sm-10">
                            <input type="text" name="name_job" value="{{old('name_job')}}" class="form-control" autocomplete="on">
                        </select>
                        </div>
					</div>
            	</div>
            	<!-- /.card-body -->
            	<div class="card-footer">
            		<button type="submit" class="btn btn-primary">إضـافـة</button>
            	</div>
            	<!-- /.card-footer -->
            </form>
		</div>
	</div>
</div>
			
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الوظائف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  عرض الوظائف </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

				<div class="row row-sm">
					<!--div-->
						<!--div-->
						@include('_session')

						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<h4>
										<p class="tx-12 tx-gray-500 mb-2">عدد الوظائف في الصالة
											  <small>({{$jobs->count()}})</small> 
										</p>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										{{-- <table class="table text-md-nowrap" id="ex" > --}}
                                        <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
											<thead>
												<th  class="border-bottom-0"> # </th>
												<th  class="border-bottom-0"> الوظيفة </th>
											    <th></th>
											</thead>
											<tbody>
												@foreach ($jobs as $index=>$item) 	
												<tr class="rowdate">
													<td>{{++$index}}</td>
													<td>{{$item->name_job}}</td>
													<td>
														<form action="{{url('admin/hallJobs/'.$item->id)}}" method="post"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div><!-- bd -->
							</div><!-- bd -->
						</div>
						<!--/div-->		
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

