@extends('layouts.master')
@section('content')
<br><br>
@include('layouts._session')

        <!-- Main content -->
        <section class="content" >
            @if($user != null)
            <div class="card card-outline card-primary" dir="rtl">
                <div class="card-header">
                   <h3 class="card-title">
                       <b> اسم المستخدم : </b> {{$user->name}} <br>
                   </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " >
                         
                           <tr>
                              <td ><b>البريد الإلكتروني :</b> {{$user->email}} </td>
                              <td colspan="2"> </td>
                           </tr>
                                
                                <tr>
                                    <td><b>العنوان : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->address}} <br><br>
                                    <b> رقم الهاتف : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$user->phone}}</td>
                                </tr>
                           
                            
                            <tr>
                                <td colspan="3"><b>  تاريخ التسجيل  :</b> {{$user->created_at}} </td>
                            </tr> 
                            <tr>
                                <td colspan="3">
                                    <b>   الصلاحية  :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if($user->prive == 0)
                                       مسؤول  
                                    @endif
                                    @if($user->prive == 1)
                                       موظف حجز
                                    @endif
                                
                                </td>
                            </tr>                   

                        </table>
                    </div> <!-- End table-responsive -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if(auth()->user()->id != $user->id)
                    <form action="{{url('/admin/User/'.$user->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> حدف بيانات المستخدم
                        </button>
                    </form>
                    @endif
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