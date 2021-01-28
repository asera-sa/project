@extends('layouts.master')
@section('content')
<br><br>
@include('layouts._session')

        <!-- Main content -->
        <section class="content" >
            @if($reservation != null)
            <div class="card card-outline card-primary" dir="rtl">
                <div class="card-header">
                   <h3 class="card-title">
                       <b> رقم الزبون : </b> {{$reservation->customer->number}} <br>
                       <b>رقم الحجز  :</b> {{$reservation->num}} <br>
                   </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " >
                            <tr>
                                <td colspan="3">
                                    <b> اسم زبون : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$reservation->customer->name}} <br>
                                    <b> رقم الهاتف : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$reservation->customer->phone}} <br>
                                    <b> العنوان  : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$reservation->customer->address}} <br>
                                    <b>البريد الإلكتروني : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$reservation->customer->email}} <br>

                                </td>
                            </tr>
                           <tr>
                              <td colspan="3" ><b>  تاريح الحجز :</b> {{$reservation->date}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                                <b>  اليوم  :</b>
                                <?php 
                                   echo date('l' , strtotime($reservation->date));    
                                ?><br>
                                <b>   الفترة  :</b>
                                @if($reservation->time == 0)
                                   صباحية  
                                @endif
                                @if($reservation->time == 1)
                                   مسائية
                                @endif
                              </td>
                           </tr>
                           
                            <tr>                      
                            <td colspan="3"><b>  الخدمات المحجوزة  :</b> </td>
                            </tr> 
                            @foreach ($servicesReservation->services as $index=>$item)
                            <tr>
                                <td> <b>   الخدمة :</b> {{$item->name}} </td>
                                <td> <b>   السعر :</b> {{$item->pivot->price}} </td>
                                <td> <b>   الكمية :</b> {{$item->pivot->quantity}} </td>
                            </tr>    
                            @endforeach    
                        </table>
                    </div> <!-- End table-responsive -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{url('admin/reservation/'.$reservation->id.'/edit')}}" class="btn btn-warning pull-left">
                        <i class="fas fa-edit"></i>   
                        تعديل بيانات الحجز 
                    </a>
                    <form action="{{url('admin/reservation/'.$reservation->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> حدف بيانات الحجز
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