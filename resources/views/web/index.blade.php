<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>أفراحنا</title>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    
    <link rel="shortcut icon" href="css/images/favicon.ico"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
   
   <style>
      body,h1,h2,h3,h4,h5,h6 {
         font-family: 'Cairo', sans-serif;
      }
       .carousel
      {
        position:inherit!important;
        transform:unset!important;
        animation:none!important;
        /* animation:none; */
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
                           <li><a href="{{url('/')}}" class="active" >  الرئيسية </a></li>
                           <li><a href="{{url('/about')}}" >عن الموقع</a></li>
                           <li><a href="{{url('/halls')}}"  > قاعات الأفراح</a></li>
                           <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" > دخول </a></li>
                      @else
                            <li><a href="{{url('/')}}" class="active" >  الرئيسية </a></li>
                            <li><a href="{{url('/about')}}"> عن الموقع </a></li>
                            <li><a href="{{url('/halls')}}"  > قاعات الأفراح</a></li>
                            <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                            <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                            @if(auth()->user()->prive == 1)
                               <li><a href="{{url('/admin')}}" >لوحة التحكم </a></li>
                            @endif
                            @if(auth()->user()->prive == 2)
                            <li><a href="{{url('/admin')}}" >لوحة التحكم </a></li>
                             @endif
                            @if(auth()->user()->prive == 0)
                                <li><a href="{{url('/admin/homeAdmin')}}" >لوحة التحكم </a></li>
                            @endif
                      @endguest  


                    </ul>  
                     
               </div>
              
          </nav>
  </div>
  
  <div class="container mt-5" dir="rtl" class="text-right" >
      <div class="row">
          <div class="col-md-12 col-md-offset-4 mt-1 w-100" >
              <div id="carouselExampleControls" class="carousel slide w-100 p-3" data-ride="carousel">
                <div class="carousel-inner w-100">
                     <div class="carousel-item active">
                       <img class="d-block w-100" src={{asset('css/images/1.jpg')}} style="height:25rem;"   alt="First slide">
                     </div>
                     <div class="carousel-item">
                       <img class="d-block w-100" src={{asset('css/images/2.jpg')}} style="height:25rem;"   alt="Second slide">
                     </div>
                     <div class="carousel-item">
                       <img class="d-block w-100" src={{asset('css/images/4.jpg')}} style="height:25rem;"   alt="Third slide">
                     </div>
                   </div>
                   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                   </a>
                 </div>
              </div>
        </div>
      </div>
  </div>
  <div class="container mt-5" dir="rtl" class="text-right" >
      <div class="row" style="margin-top: 12rem;">
            <div class="col-md-8 col-md-offset-4 mt-5 shell" >
                <div class="card mt-5" style=" height:10rem;">
                  <div class="card-body text-right" style="font-size: 20px;">
                    <p style="line-height: 35px;">
                        أن الحجز في الصالات يتم بصورة تقليدية وذلك بحضور الشخص إلى موقع الصالة ومقابلة
                        موظف الصالة , ويوجد العديد من المشاكل في هذه الطريقة منها .... 
                    </p>
                  </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{url('/about')}}">عن الموقع</a>
                </div>
            </div> 
            @if($halls1 != null)
            <div class="col-md-4 col-md-offset-4 mt-5" >
              <div class="card">
                   <img class="card-img-top" src="{{asset($halls1->file)}}"  style="height:14rem;">
                   <div class="card-body text-right">
                       <h5 class="card-title">{{$halls1->name}}111</h5>
                   </div>
                   
              </div>
           
          </div>
          @endif
      </div>
  </div>


  <div class="container mt-5" dir="rtl" class="text-right" >
    <div class="row">
      <div class="col-md-4 col-md-offset-4 mt-1 p-3 text-right" style="line-height: 20px;background-color: lightgray;">
           <h4 dir="rtl">إضافة قاعة أفراح جديدة</h4>
           <div class="card mt-5" style=" height:10rem;">
              <div class="card-body text-right" style="font-size: 20px;">
                  <h6 class="mt-2">
                     يمكنك تسجيل صالتك الأن لعرض خدماتك وتسهيل عملية الحجز والتواصل معك من خلال موقعنا 
                  </h6>
                  <a href="advertising.php" class="btn btn-success text-white"><b> التسجيل</b></a>
              </div>
           </div>
         
      </div>
      @if($halls2 != null)
      <div class="col-md-4 col-md-offset-4" >
        <div class="card">
            <img class="card-img-top" src="{{asset($halls2->file)}}" style="height:14rem;">
            <div class="card-body text-right">
                  <h5 class="card-title">{{$halls2->name}}2222</h5>
            </div>  
        </div> 
      </div>
      @endif
      @if($halls3 != null)
      <div class="col-md-4 col-md-offset-4" >
          <div class="card">
              <img class="card-img-top" src="{{asset($halls3->file)}}" style="height:14rem;">
              <div class="card-body text-right">
                    <h5 class="card-title">{{$halls3->name}}3333</h5>
              </div>  
          </div> 
        </div>
      </div>
      @endif
    </div>
  </div>

    
  </div>
  </div>
  
  <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
    © 2021 Copyright:
  </div>




  <script src="js/jquery-1.4.2.js" type="text/javascript"></script>
  <script src="js/jquery.jcarousel.js" type="text/javascript"></script>
  <script src="js/js-func.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>

  $('.carousel').carousel({
    interval: 2000
  })
  
  </script>
</body>
</html>