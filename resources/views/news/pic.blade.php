@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->            
                
				<!-- breadcrumb -->
@endsection
@section('content')
     	<!-- row -->
				<div class="row mt-4">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
								صورة جديدة
								</div>
                                <p class="mg-b-20"></p>
								<form class="form-horizontal" action="{{url('/admin/pic')}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row">
                                        <div class="control-group form-group">
											<label class="form-label"> صورة </label>
											<input type="file" class="form-control image-input required" placeholder="قم بااختيار صورة " name="file">
											<div class="box-review-img">
												<img src="" alt="">
											</div>
                                        </div>
										<div class="col-lg-3 col-md-4 mg-t-10 mg-sm-t-25">
											<button class="btn btn-main-primary pd-x-20" type="submit"> إضافة</button>
										</div>
									</div>
								</form>
                            </div>
                           
						</div>
					</div>
				</div>
				<!-- /row -->
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
						<!--div-->
						<div class="col-xl-12">
                            @include('_session')

						</div>
						<!--/div-->		
				</div>
                <!-- /row -->
                <div class="row">
                    @foreach ($pic as $item)
                    <div class="col-md-4 mb-2">

                        <div class="card" style="">
                            @php
                            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

                            $explodeImage = explode('.', $item->file);

                            $extension = end($explodeImage);

                            @endphp
                            @if(in_array($extension,$imageExtensions))
                            <img class="card-img-top" style="height: 15rem; object-fit: contain;" src="{{asset($item->file)}}" alt="Card image cap" >                          
                            @endif
                            <form action="{{url('admin/pic/'.$item->id)}}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                        
                   
                    @endforeach


                </div> <!-- End row -->
                


<!---------------------------------------------------------------------->



			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
    $(document).ready(function() { // هذا لما تحمل الصفحة

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
@endsection