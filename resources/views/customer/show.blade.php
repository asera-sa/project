@extends('layouts.master')
@section('content')
<br><br>
@include('layouts._session')

        <!-- Main content -->
        <section class="content" >
            @if($customer != null)
            <div class="card card-outline card-primary" dir="rtl">
                <div class="card-header">
                   <h3 class="card-title">
                    <b> اسم الزبون : </b> {{$customer->name}} <br>
                    <b> رقم الزبون : </b> {{$customer->number}} <br>
                </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " >
                         
                           <tr>
                              <td ><b>البريد الإلكتروني :</b> {{$customer->email}} </td>
                              <td colspan="2"> </td>
                           </tr>
                                
                                <tr>
                                    <td><b>العنوان : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$customer->address}} <br><br>
                                    <b> رقم الهاتف : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$customer->phone}}</td>
                                </tr>
                           
                            
                            <tr>
                                <td colspan="3"><b>  تاريخ التسجيل  :</b> {{$customer->created_at}} </td>
                            </tr> 
                            <tr>
                                <td colspan="3">
                                   
                                
                                </td>
                            </tr>                   

                        </table>
                    </div> <!-- End table-responsive -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{url('admin/customer/'.$customer->id.'/edit')}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>   
                    تعديل بيانات</a>
                    
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