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

						</div>
					</div>					
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

<br><br><br>

<div class="row  pr-3">
    <div class="col-lg-12">
        <div class="card " dir="rtl">

               
                    
                    <a href="{{url('admin/report/allEmp')}}" class="btn btn-primary">عرض تقرير بجميع أسماء الموظفين </a>
                
        </div>
    </div>
   
   
</div>
<div class="row  pr-3">
    <div class="col-lg-6">
        <div class="card " dir="rtl">
            <div class="card-header text-right">
                <h5>  قائمة بأسماء الموظفين الراتب</h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/report/allEmp_salary')}}" method="GET">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __(' الراتب ') }}</label>
    
                        <div class="col-md-8">
                            <select name="salary" class="form-control js-example-matcher" required>
                                @foreach ($employees as $item)
                                   <option value="{{$item->salary}}">{{$item->salary}} </option>                                          
                                @endforeach
                            </select>                  
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">عرض التقرير</button>
                </form>
                
            </div> 
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card " dir="rtl">
            <div class="card-header  text-right">
                <h5>  قائمة بأسماء الموظفين حسب الوظيفة </h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/report/allEmp_jobs')}}" method="GET">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __(' الوظائف ') }}</label>
    
                        <div class="col-md-8">
                            <select name="jobs_id" class="form-control js-example-matcher" required>
                                @foreach ($jobs as $item)
                                   <option value="{{$item->id}}">{{$item->name_job}} </option>                                          
                                @endforeach
                            </select>        
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">عرض التقرير</button>
                </form>
            </div>
        </div>
    </div>
   
</div>


<div class="row  pr-3">
    <div class="col-lg-6">
        <div class="card " dir="rtl">
            <div class="card-header text-right">
                <h5> عرض فاتورة  </h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/report/bills_id')}}" method="GET">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __(' أدخل رقم الفاتورة ') }}</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="bills_id"  required  autofocus>             
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">عرض التقرير</button>
                </form>
                
            </div> 
        </div>
    </div>
   


    <div class="col-lg-6">
        <div class="card " dir="rtl">
            <div class="card-header text-right">
                <h5> عرض فاتورة  </h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/bills')}}" method="GET">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __(' أدخل  رقم الحجز ') }}</label>
    
                        <div class="col-md-8">
                            <select name="reservation_id" class="form-control js-example-matcher" required>
                                @foreach ($reservation as $item)
                                   <option value="{{$item->id}}">{{$item->num}} </option>                                          
                                @endforeach
                            </select>                             
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">عرض التقرير</button>
                </form>
                
            </div> 
        </div>
    </div>
   
   
</div>










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
