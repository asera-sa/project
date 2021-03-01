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
                           <li><a href="{{url('/halls')}}"  > قاعات الأفراح</a></li>
                           <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" > دخول </a></li>
                      @else
                            <li><a href="{{url('/')}}" class="active" >  الرئيسية </a></li>
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
  
  <div class="container mt-5" dir="rtl" class="text-right">
    <div class="row shell" >        
            <div class="slider-right">
              <div id="carouselExampleControls" class="carousel slide w-100 p-3" data-ride="carousel">
                    <div class="carousel-inner w-100">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src={{asset('css/images/1.jpg')}} style=""   alt="First slide">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src={{asset('css/images/2.jpg')}} style=""   alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src={{asset('css/images/4.jpg')}} style=""   alt="Third slide">
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
            <div class="slider-left">
              <h2 dir="rtl">إضافة قاعة أفراح جديدة</h2>
              <p>
                يعرض الموقع خريطة توضح موقع الصالة , بالإضافة لوجود مساحة خاصة بالإعلانات وعرض الحجوزات الملغية من قبل الزبائن , كما ان هذا البرنامج يستخدم لإدارة قاعات الافراح بطريقة سهلة وسلسة الاستخدام, حيث  يمكن استخدامه من أي جهاز 
              </p>
              <a href="{{url('/login') }}" class="order-now "> <b> تسجيل الان</b></a> 
            </div>
    </div>
  </div>
   
  <div class="container mt-5" dir="rtl" class="text-right">
      <div class="row text-right">
        <div class="col-md-7 last">
          <div class="post">
            <h2 dir="rtl" > <b>من نحن </b></h2>
            <img src="css/images/book.png" style="width:200px;" alt="image" class="right" />
            <p>
              أفراحنا هو موقع قام بجمع تفاصيل قاعات الأفراح وعرض مواعيدها ، كما انه يضم العديد من قاعات الأفراح التي تم تسجيلها لتسهيل عمليات البحث عن القاعات وتصفحها والتعرف على خدماتها وحجزها بطريقة سلسة لتسهل على الزبون التواصل والتعامل معها .
              كما انه يعتبر موقع خدمي واداري الذي بدوره يقوم بادارة الحجوزات ومتابعتها وتسجيل بيانات العاملين والموظفين واصدار التقارير والفواتير وغيرها من الخدمات الادارية.
            </p>
            <div class="cl">&nbsp;</div>
           </div>
          </div>
          <div class="pr-5 text-container">
            <img src="css/images/m.jpg" style="width:300px;" alt="image" />
          </div>
        </div>
            
      </div>
  </div>

  <div class="container mt-5" dir="rtl" class="text-right">
    <div class="row text-right">
      <div class="col-md-3 last">
        <div class="post">
          <h2 dir="rtl">مميزاتنا</h2>
          <img src="css/images/fav.png" alt="" class="right" />
            <p>
            	سهولة استخدام تطبيقنا سوف يوفر عليك الكثير من الوقت والجهد ويجعلك تصل الى صالتك المفضلة في اسرع وقت
            </p>
            <a href="#" class="more text-left left"> </a>
          <div class="cl">&nbsp;</div>
        </div>
      </div>
      <div class="col-md-5 last">
        <div class="post">
         <h2 dir="rtl" >الحجوزات الملغية</h2>
         <img src="css/images/testt.jpg"style="width:90px; alt="" class="right" />
         <p>
          افراحنا يتيح خدمة جديدة تعود بفائدتها على الزبون قبل ادارة الصالة ، فكما نعلم انه يوجد قانون صارم بشأن الغاء الحجز واسترجاع قيمة العربون المدفوعة مهما كانت الظروف ، ومن هنا يمكنك عرض حجزك الملغي لإتاحته للبيع الى زبون اخر ففي خانة الحجوزات الملغية يمكنك فقط كتابة رقم الحجز الخاص بك ، ومن ثم موقع أفراحنا تلقائياً سيقوم بإحضار بيانات حجزك مثل اسمك وعنوانك ورقم هاتفك بالاضافة لتاريخ حجزك واسم القاعة الذي قمت بالحجز فيها ، وعرضها في خانة الحجوزات الملغية التي تتيح للمتصفح الإطّلاع على هذه الحجوزات والتواصل مع صاحب الحجز الملغي ، ولعرض الحجوزات الملغية ، اضغط هنا  .
         </p>
         <div class="cl">&nbsp;</div>
         <a href="{{url('/canelReservation') }}" class="more text-left">اضغط هنا</a> </div>
        </div>     
        <div class="post">
          <h2 dir="rtl" > <b> قاعات الأفراح </b></h2>
          <img src="css/images/hall.jpg" style="width:300px;" alt="image" />
          <p dir="rtl"> <b> من هنا يمكنك الاطلاع على قاعات الافراح ورؤية عروضنا..<a href="{{url('/halls') }}" class="more">اضغط هنا</a> </b></div>
        </div>
     </div>
  </div>  

  <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
    <p class="lf">Copyright &copy; 2020 <a href="#">أفـراحنـا</a> </p>
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