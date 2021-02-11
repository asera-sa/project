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
							<h4 class="content-title mb-0 my-auto">الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الحجوزات</span>
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
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<h4>
										<p class="tx-12 tx-gray-500 mb-2">عدد الحجوزات
											 <small>({{$reservation->count()}})</small>
										</p>
										{{-- <a href="{{url('admin/refresh')}}" class="btn-sm btn-info">تحديث البيانات</a> --}}

									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										{{-- <table class="table text-md-nowrap" id="ex" > --}}
                                        <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
											<thead>
												<th  class="border-bottom-0"> # </th>
												<th  class="border-bottom-0">اسم الزبون</th>
                                                <th  class="border-bottom-0"> رقم الحجز </th>
                                                <th  class="border-bottom-0"> تاريخ الحجز </th>
                                                <th  class="border-bottom-0">الفترة  </th>
                                                <th  class="border-bottom-0">نوع الحجز  </th>
											    <th></th>																							</tr>
											</thead>
											<tbody>
												@foreach ($reservation as $index=>$item) 
												
												<tr class="rowdate">
													<td>{{++$index}}</td>
													<td>{{$item->customer->name}}</td>
													<td>{{$item->num}}</td>
                                                    <td>{{$item->date}}</td>
                                                    @if($item->time == 0)
                                                    <td>صباحية</td>
                                                    @endif
                                                    @if($item->time == 1)
                                                    <td>مسائية</td>
													@endif
													@if($item->flag == 1)
                                                    <td ><b class="bg-success pl-4 pr-3 btn-sm pt-1 pb-1 text-white"> مؤكد</b></td>
                                                    @endif
                                                    @if($item->flag == 0)
                                                    <td><b class="bg-warning pl-3 pr-3 btn-sm pt-1 pb-1 text-white">مبدئي </b></td>
                                                    @endif
													<td>
														<!-- show -->
														 <a href="{{url('admin/reservation/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
														 <!-- End of Show -->
														  <!-- pay -->
														  {{-- <a href="{{url('admin/bills/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a> --}}

														<form action="{{url('/admin/bills/')}}" method="get" style="display: inline-block">
															@csrf
															<input type="hidden" name="reservation_id" value="{{$item->id}}">
															<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-money-check-alt"></i>
															</button>
													    </form>
														  <!-- End of pay -->
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