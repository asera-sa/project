@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
            <form action="{{url('/admin/search')}}" method="get">
        	@csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-5">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									بحث بالمدينة
								</div>
								<p class="mg-b-20"></p>
								<div class="pd-30 pd-sm-40 bg-gray-200">
									<div class="row row-xs">
										
										<div class="col-md-8">
											
											<select name="city_id" class="form-control js-example-matcher" required>
												@foreach ($city as $item)
												   <option value="{{$item->id}}">{{$item->name}} </option>                                          
												@endforeach
											</select>  										
										</div>
										<div class="col-md mt-4 mt-xl-0">
											<button class="btn btn-main-primary btn-block" type="submit"> بحث </button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
			</form>
@endsection

@section('content')			
				<!-- row opened -->
				<div class="row row-sm">
                    @foreach ($halls as $index=>$item) 
					<div class="col-xl-4 col-lg-4 col-md-12 mt-3">
						<div class="card text-center">
                            @php
                            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

                            $explodeImage = explode('.', $item->file);

                            $extension = end($explodeImage);
                            @endphp

                            @if(in_array($extension,$imageExtensions))
                            <img class="img-fluid center img-thumbnail img-responsive"  src="{{asset($item->file)}}" alt="">
                            @endif
							<div class="card-body">
								<h4 class="card-title mb-3">{{$item->name}}</h4>
                                <p class="card-text">البريد الإلكتروني : {{$item->email}} <br>
                                    رقم الهاتف  : {{$item->phone}}  <br>
                                    المدينة   : {{$item->city->name}}
                                </p>

							</div>
						 </div>
                    </div>
                    @endforeach
				</div>
				<!-- row closed -->


			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection