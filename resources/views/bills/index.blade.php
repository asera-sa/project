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

@endsection
@section('content')
        
		<!-- row opened -->
        <div class="row row-sm mt-5">
            <!--div-->
                <!--div-->
                <br>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>
                                <p class="tx-13 mb-2" style="line-height: 2.5"> 
                                    <b>اسم الزبون :</b>   {{$reservation->customer->name}}   <br>
                                    <b>رقم الحجز :</b>    {{$reservation->num}} <br>
                                    <b> تاريخ المناسبة  :</b>  {{$reservation->date}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <b>  الفترة  :</b>  @if($reservation->time == 0) الصباحية @endif
                                                         @if($reservation->time == 1) مسائية @endif
                                </p>
                            </h4>
                        </div>
                        @if($bills->count() <= 0)
                         <h3 class="m-5"> لم يتم دفع أي قيمة مسبقا </h3>
                         <div class="card-footer text-center">
                           <a href="{{url('admin/bills/create/'.$reservation->id)}}" style="width:20rem;" class="btn btn-primary btn-lg"> دفع </a>
                         </div>
                        @endif
                        @if($bills->count() > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
                                    <thead>
                                        <th  class="border-bottom-0">رقم الفاتورة</th>
                                        <th  class="border-bottom-0">القيمة المدفوعة </th>
                                        <th  class="border-bottom-0">الباقي</th>
                                        <th  class="border-bottom-0">تاريخ الدفع</th>
                                        <th  class="border-bottom-0"></th>
                                        <th></th>																							
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $index=>$item)                                         
                                        <tr class="rowdate">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->credit}}</td>
                                            <td>{{$item->debit}}</td>
                                            <td>{{$item->date}}</td>
                                            
                                            <td>
                                                <form action="{{url('admin/report/bills_id')}}" method="GET">
                                                    @csrf
                                                    <input type="hidden" name="bills_id" value="{{$item->id}}">
                                                <!-- show -->
                                                 <button  type="submit" clbuttonss="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                                 <!-- End of Show -->
                                                </form>
                                            </td>
                                        </tr>
                                        <?php 
                                            $bills_id=$item->id;
                                         ?>
                                        @endforeach                                      
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- bd -->
                        <div class="card-footer text-center">

                            <a href="{{url('admin/bills/create/'.$reservation->id)}}" style="width:20rem;" class="btn btn-primary btn-lg"> دفع </a>

                            @if($bills->count() > 0)
                            <!-- Delete -->
                            <form action="{{url('admin/bills/'.$bills_id)}}" method="post"  style="display: inline-block">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger mr-3 btn-lg  mt-1" style="width:20rem;" >
                                   <i class="fa fa-trash"> حذف</i>
                               </button>
                            </form>
                           <!-- End of Delete -->
                           @endif
                        </div>
                        @endif
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