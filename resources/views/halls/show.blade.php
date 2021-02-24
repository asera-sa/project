@extends('layouts.master')
@section('content')

<link href="{{asset('map/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css" />

<br><br>  
        <!-- Main content -->
        <section class="content" >
            @include('_session')
            @if($halls != null)
            <div class="card card-outline card-primary" dir="rtl">

                <div class="card-header">
                    <h3 class="card-title"> اسم الصالة  : {{ $halls->name }}</h3><br>
                    <a href="{{url('admin/halls/'.$halls->id.'/edit')}}" class="btn btn-warning pull-left">
                        <i class="fas fa-edit"></i>   

                        تعديل بيانات الصالة 
                    </a>
                     <!-- Delete -->
                     <form action="{{url('admin/halls/'.$halls->id)}}" method="post"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <!-- End of Delete -->
                    @if($halls->state == 1)
                        <a href="{{url('admin/halls/'.$halls->id.'/close')}}" class="btn btn-danger pull-left">
                            <i class="bi bi-x text-white"></i>
                            إغلاق الصالة   
                        </a>
                    @else
                        <a href="{{url('admin/halls/'.$halls->id.'/open')}}" class="btn btn-success pull-left">
                            فتح الصالة   
                        </a>
                    @endif
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-1">

                            <div class="bg-light p-3">
                                {{-- <h5><i class="fa fa-user"></i> {{$halls->user->name}}</h5> --}}
                                <div class="text-right">
                                    <i class="fa fa-calendar"></i>
                                    تم إنشاءه في : {{$halls->created_at}} <br>
                                    <i class="fa fa-calendar"></i>
                                    تم تحديث : {{$halls->updated_at}}
                                </div>
                            </div>

                            <br>

                            <div class="bg-light p-2 " >
                                <h4>صالة  : {{$halls->name}}</h4>
                                <p style="font-size: 16px; margin-top:20px" >المنطقة :{{$halls->Address->name}}</p>
                                <p style="font-size: 16px; margin-top:20px" >البريد الإلكتروني :{{$halls->email}}</p>
                                <p style="font-size: 16px; margin-top:20px" >رقم الهاتف :{{$halls->phone}}</p>
                                
                            </div>

                        </div>
                        <!-- End of col-6 -->

                        <div class="col-md-6 mt-1">
                            @php
                            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

                            $explodeImage = explode('.', $halls->file);

                            $extension = end($explodeImage);

                            @endphp

                            @if(in_array($extension,$imageExtensions))
                            <img class="img-fluid center img-thumbnail img-responsive"  src="{{asset($halls->file)}}" alt="">
                            @endif
                        </div>
                        <!-- End of col-6 -->

                    </div> <!-- End row -->

                </div>


                <div class="container" dir="rtl" class="text-right" >
                    <!--begin::Card-->
                     <div class="card card-custom gutter-b example example-compact mt-2">
                         <div class="card-header">
                         <div class="card-title">
                             <h3 class="card-label text-right">  موقع الصالة </h3>
                         </div>
                         </div>
                         <div class="card-body">
                         <div id="kt_leaflet_5" style="height:300px;"></div>
                         <!--begin::Code-->
                         <div class="example-code mt-5">
                             <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                                
                             </ul>
                         </div>
                         <!--end::Code-->
                         </div>
                     </div>
                     <!--end::Card-->
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
    <script src="{{asset('map/plugins/global/plugins.bundle.js')}}"></script>
 <script src="{{asset('map/plugins/custom/prismjs/prismjs.bundle.js')}}"></script> 
 <script src="{{asset('map/js/scripts.bundle.js')}}"></script>
 <script>
    	var lat={{$halls->lat}};
		var lng={{$halls->lng}};
 </script>
  <script src="{{asset('map/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
<script src="{{asset('js/maps/mapShow.js')}}"></script>
 @endsection