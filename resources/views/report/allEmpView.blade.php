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
<style >
    @media print{
        #print-area{
            display: none;
        }
        *{
        background-color: #ffffff !important;
    }
    }
</style>
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm mt-5" >
					<!--div-->
						<!--div-->
                        <div class="col-xl-3"></div>
						<div class="col-xl-6" >
							<div class="card bg-white" id="print" >
								<div class="card-header pb-0">
									<h4 class="text-center" style="margin-top: 5rem;">
										{{$title}}
									</h4>
								</div>
								<div class="card-body">
									<div style="background-color: white;">
                                        <table class="table  " >
											<thead>
												<th  class="border-bottom-0"> # </th>
												<th  class="border-bottom-0 p-2">اسم المستخدم</th>
											</thead>
											<tbody>
												@foreach ($employee as $index=>$item) 
												<tr class="rowdate">
													<td>{{++$index}}</td>
													<td>{{$item->name}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div><!-- bd -->
                             
							</div><!-- bd -->
                            <div class="card-footer text-muted text-right">
                                <button class="btn btn-info" id="print-area" onclick="printReport()">
                                    <i class="mdi mdi-printer ml-1"></i>
                                    طباعة</button>
                            </div>
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
<script type="text/javascript">
    function printReport() {
        var printContents = document.getElementById("print").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML=printContents;
        console.log(printContents);
        console.log(originalContents);
        window.print();
        document.body.innerHTML=originalContents;
        location.reload();
    }
</script>
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