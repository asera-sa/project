@extends('layouts.master')
@section('content')


<br><br>  
        <!-- Main content -->
        <section class="content" >
            @if($news != null)
            <div class="card card-outline card-primary" dir="rtl">

                <div class="card-header">
                   
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-1">

                            <div class="bg-light p-3">
                                {{-- <h5><i class="fa fa-user"></i> {{$news->user->name}}</h5> --}}
                                <div class="text-right">
                                    <i class="fa fa-calendar"></i>
                                    تم إنشاءه في : {{$news->created_at}} <br>
                                   
                                </div>
                            </div>

                            <br>

                            <div class="bg-light p-2 " >
                                <h4>العنوان  : {{$news->subject}}</h4>
                                <p style="font-size: 16px; margin-top:20px" >المحتوى :{{$news->content}}</p>
                                
                    
                            </div>

                        </div>
                        

                    </div> <!-- End row -->

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