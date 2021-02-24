<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>أفراحنا</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="css/images/favicon.ico"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{asset('map/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css" />

    <style>
      body,h1,h2,h3,h4,h5,h6 {

      font-family: 'Cairo', sans-serif;
      }

    </style>
</head>
<body dir="rtl">
    <div id="header">
          <img src="{{asset('css/images/logo.jpg')}}"  style="width:20rem; height:4rem; margin-top:2rem; margin-left:8rem;"  alt="">
          <nav id="navigation"  class="navbar navbar-expand-lg navbar-light ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"></a>
                    <ul class="navbar-nav mr-auto mt-2 " >
                      @guest
                           <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                           <li><a href="{{url('/halls')}}"  > قاعات الأفراح</a></li>
                           <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" class="active"> دخول </a></li>
                      @else
                            <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                             <li><a href="{{url('/halls')}}"  > قاعات الأفراح</a></li>
                            <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                            <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                            @if(auth()->user()->prive == 1)
                               <li><a href="{{url('/admin')}}" class="active" >لوحة التحكم </a></li>
                            @endif
                            @if(auth()->user()->prive == 2)
                            <li><a href="{{url('/admin')}}" >لوحة التحكم </a></li>
                             @endif
                            @if(auth()->user()->prive == 0)
                                <li><a href="{{url('/admin/homeAdmin')}}" class="active" >لوحة التحكم </a></li>
                            @endif
                      @endguest  

                    </ul>  
                     
               </div>
              
          </nav>
    </div>

    <div class="container" dir="rtl" class="text-right" >
        @include('_session')
        <form class="form-horizontal" action="{{url('/createhalls')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row row-sm">
           
            <div class="col-xl-6">
                <div class="card">
                    <h4 class="text-right p-3" style="color: #c40083;">بيانات صالة</h4>
                    <input type="hidden" name="lat" placeholder="lat" id="lat"> <br>
                    <input type="hidden" name="lng" placeholder="lng" id="lng">
                    {{-- <input type="text" name="" placeholder="address" id="address"> --}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">إسم الصالة</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"> صورة </label>
                                    <div class="col-sm-10">
                                    <input type="file" name="file" value="{{old('name')}}" class="form-control" >
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">رقم الهاتف</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" autocomplete="on">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">البريد الألكتروني</label>
                                    <div class="col-sm-10">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">المنطقة</label>
                                    <div class="col-sm-10">
                                        <select name="Address_id" class="form-control js-example-matcher" required>
                                            @foreach ($Address as $item)
                                               <option value="{{$item->id}}">{{$item->name}} </option>                                          
                                            @endforeach
                                        </select>   	
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"> سعة الصالة</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="capacity" value="{{old('capacity')}}" class="form-control" autocomplete="on">
                                    </div>
                                </div>

                                
                            </div>
                            <!-- /.card-body -->             
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <h4 class="text-right p-3" style="color: #c40083;"> بيانات صاحب الصالة </h4>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">إسم المستخدم</label>
                            <div class="col-sm-10">
                            <input type="text" name="uname" value="{{old('uname')}}" class="form-control" >
                            </div> 
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">البريد الألكتروني</label>
                            <div class="col-sm-10">
                            <input type="email" name="uemail" value="{{old('uemail')}}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">كلمة السر</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control required" name="upassword" placeholder="  كلمة المرور">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">تأكيد كلمة السر</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control required" name="upassword_confirmation" placeholder=" تأكيد كلمة المرور ">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">الهاتف</label>
                            <div class="col-sm-10">
                               <input type="text" name="uphone" value="{{old('phone')}}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">العنوان</label>
                            <div class="col-sm-10">
                               <input type="text" name="uaddress" value="{{old('address')}}" class="form-control" >
                            </div>
                        </div>                      
                      
                    </div>
                    <!-- /.card-body -->
                  
               
                </div>
            </div>
           
        </div>
       

        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact mt-2">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label text-right"> اختر موقع الصالة </h3>
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
        <button type="submit" class="btn btn-block btn-outline-c40083 btn-lg" style="border-color: #c40083; color:#c40083;"> حفظ </button>
        </form>
    </div>




    <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
        <p class="lf">Copyright &copy; 2020 <a href="#">أفـراحنـا</a> </p>
    </div>




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script src="{{asset('map/plugins/global/plugins.bundle.js')}}"></script>
  <script src="{{asset('map/plugins/custom/prismjs/prismjs.bundle.js')}}"></script> 
  <script src="{{asset('map/js/scripts.bundle.js')}}"></script>
  <!--end::Global Theme Bundle-->
  <!--begin::Page Vendors(used by this page)-->
  <script src="{{asset('map/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>

  <script src="{{asset('js/maps/mapCreat.js')}}"></script>
        
</body>
</html>