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
			<div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">الصالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الصالات</span>
					</div>
				</div>					
			</div>
			<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<!--div-->
					@if($halls->count() > 0)
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<h4>
										<p class="tx-12 tx-gray-500 mb-2">عدد القاعات
											 <small>({{$halls->count()}})</small>
										</p>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										{{-- <table class="table text-md-nowrap" id="ex" > --}}
                                        <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
											<thead>
												<th  class="border-bottom-0"> # </th>
												<th  class="border-bottom-0">اسم الصالة</th>
												<th  class="border-bottom-0"> المنطقة </th>
                                                <th  class="border-bottom-0">البريد الألكتروني </th>
                                                <th  class="border-bottom-0">الهاتف  </th>
                                                <th  class="border-bottom-0"> وضع الصالة </th>
											    <th></th>																							</tr>
											</thead>
											<tbody>
												@foreach ($halls as $index=>$item) 
												
												<tr class="rowdate">
													<td>{{++$index}}</td>
													<td>{{$item->name}}</td>
													<td>{{$item->Address->name}}</td>
													<td>{{$item->email}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    @if($item->stat == 0)
                                                      <td>مغلقة</td>
                                                    @endif
                                                    @if($item->stat == 1)
                                                    <td> مفتوحة  </td>
                                                    @endif
                                                
													<td>
														 <!-- show -->
														 <a href="{{url('admin/halls/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
														 <!-- End of Show -->
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
					@else
						<h2>لايوجد قاعات لعرضها </h2>
					@endif	
				</div>
				<!-- /row -->
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
@endsection