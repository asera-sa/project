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
                        <li><a href="{{url('/halls') }}" > قاعات الأفراح</a></li>
                        <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                        <li><a href="{{url('/contact')}}" class="active" > اتصل بنا</a></li>
                        <li><a href="{{url('/login')}}" > دخول </a></li>
                   @else
                         <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                          <li><a href="{{url('/halls') }}" > قاعات الأفراح</a></li>
                         <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                         <li><a href="{{url('/contact')}}" class="active" > اتصل بنا</a></li>
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



  <div class="container" dir="rtl" class="text-right">
    @include('_session')

         <div class="row">
            <div class="col-md-4 col-md-offset-4 p-5" style="margin-top:5rem;">
                <img src="{{asset('css/images/contact.png')}}"  style="width:30rem; margin-top:2rem; margin-left:8rem;"  alt="">

            </div>
            <div class="col-md-3 col-md-offset-4">
            </div>
            <div class="col-md-4 col-md-offset-4 mt-5">
                <div class="account-box mt-5">
                    
                    <form class="form-signin" action="{{url('/contact')}}" method="POST">
                        @csrf
                        <input type="hidden" value="0" name="halls_id" class="form-control"  />
                             <div class="form-group">
                                 <input type="text" name="email" class="form-control" placeholder="أكتب البريد الإلكتروني" required autofocus />
                             </div>
                             <div class="form-group">
                                <input type="text"  name="name" class="form-control" placeholder=" إسم المستخدم " required autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text"  name="title" class="form-control" placeholder="عنوان الرسالة" required autofocus />
                            </div>
                            <div class="form-group">
                                <textarea  name="content" class="form-control" placeholder="أكتب  استفسارك هنا" rows="7" required autofocus ></textarea>
                            </div>
                            <button class="btn btn-primary btn-block"> إرسال </button>

                    </form>                
                   
                </div>
             </div>
         </div>
         
   </div>



   <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
    © 2021 Copyright:
  </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  

</body>
</html>