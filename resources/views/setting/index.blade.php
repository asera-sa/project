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
     


<!----------------------------------Address------------------------------------>



	<!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        منطقة جديدة
                    </div>
                    <p class="mg-b-20"></p>
                    <form class="form-horizontal" action="{{url('/admin/addAddress')}}" method="get" data-parsley-validate="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9 col-md-8 form-group mg-b-0">
                                <label class="form-label"> المدينة :<span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" placeholder="أدخل المدينة " required="" type="text">
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
                @if ($Address->count() > 0 )
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>
                            <p class="tx-12 tx-gray-500 mb-2">المدن  
                                 <small>({{$Address->count()}})</small>
                            </p>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- <table class="table text-md-nowrap" id="ex" > --}}
                            <table class="table table-striped mg-b-0 " id="ex" >
                                <thead>
                                    <th  class="border-bottom-0"> # </th>
                                    <th  class="border-bottom-0"> المدينة  </th>
                                    <th  class="border-bottom-0"> </th>	
                                    <th></th>																							</tr>
                                </thead>
                                <tbody>
                                    @foreach ($Address as $index=>$item) 												
                                    <tr class="rowdate">
                                        <td>{{++$index}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <form action="{{url('admin/delAddress/'.$item->id)}}" method="post"
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
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $Address->links() !!}
                        </ul>
                    </div>
                </div><!-- bd -->
                @else 
                <h4>لايوجد مدن</h4><br><br>
                @endif
            </div>
            <!--/div-->		
    </div>
    <!-- /row -->
    

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
@endsection