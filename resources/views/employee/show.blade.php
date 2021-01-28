@extends('layouts.master')
@section('content')
<br><br>
@include('layouts._session')

        <!-- Main content -->
        <section class="content" >
            @if($employees != null)
            <div class="card card-outline card-primary" dir="rtl">
                <div class="card-header">
                   <h3 class="card-title">
                       <b> اسم الموظف : </b> {{$employees->name}} <br>
                   </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " >
                         
                           <tr>
                              <td ><b> العنوان :</b> {{$employees->phone}} <br>
                                 <b> الهاتف :</b> {{$employees->phone}}
       
                            </td>
                              <td colspan="2"> </td>
                           </tr>
                                
                                <tr>
                                    <td><b>الوظيفة : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$employees->address}} <br>
                                        <b> الوضع الوظيفي  : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$employees->phone}} <br>
                                        <b>  المرتب  : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$employees->salary}} <br>
                                        
                                    </td>
                                </tr>
                           
                            
                            <tr>
                                <td colspan="3"><b>  تاريخ التسجيل  :</b> {{$employees->created_at}} </td>
                            </tr> 
                            <tr>
                                <td colspan="3">
                                    <b>   الوضع الوظيفي  :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if($employees->state == 1)
                                       يعمل  
                                    @endif
                                    @if($employees->state == 2)
                                        إجازة 
                                    @endif
                                    @if($employees->state == 3)
                                     متوقف عن العمل 
                                @endif
                                </td>
                            </tr>                   

                        </table>
                    </div> <!-- End table-responsive -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{url('admin/employees/'.$employees->id.'/edit')}}" class="btn btn-warning pull-left">
                        <i class="fas fa-edit"></i>   
                        تعديل بيانات موظف 
                    </a>
                    <form action="{{url('/admin/employees/'.$employees->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> حدف بيانات الموظف
                        </button>
                    </form>
                </div>
            </div>
            @else
            <h3 class="m-5">خطأ ,  لايوجد بيانات لعرضها </h3>
            @endif
        </section>
        <!-- End of Main content -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
 @endsection