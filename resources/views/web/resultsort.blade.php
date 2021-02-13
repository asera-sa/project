<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>أفراحنا</title>    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="css/images/favicon.ico"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <style>
      body,h1,h2,h3,h4,h5,h6 {

      font-family: 'Cairo', sans-serif;
      }
      .vis
      {
        display: none;
      }
      .li__search {
        height: 0px !important;
      }
      
      .li__search a {
        padding: 8px 10px !important;
        margin-top: 8px !important;
      }
      .li__search a:hover {
        padding: 8px 10px !important; 
        margin-top: 8px !important;
      }

    </style>
</head>
<body dir="rtl">
  <div id="header">
    <img src="{{asset('css/images/logo.jpg')}}"  style="width:16rem; height:4rem; margin-top:2rem; margin-left:2rem;"  alt="">
    <nav id="navigation"  class="navbar navbar-expand-lg navbar-light ">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="#"></a>
              <ul class="navbar-nav mr-auto mt-2 " >
                @guest
                     <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                     <li><a href="{{url('about')}}" > عن الموقع </a></li>
                     <li><a href="{{url('/halls')}}"  class="active" > قاعات الأفراح</a></li>
                     <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                     <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                     <li><a href="{{url('/login')}}" > دخول </a></li>
                     <li>
                      <form action="{{ url('/halls') }}" id="form__search" method="post">
                        @csrf
                        <input class="form-control input__search" style="display: none;margin-top: 4px !important;" name="search" type="text" placeholder="Search">
                      </form>

                    </li>
                    <li class="li__search">
                      <a class="btn white btn__search show" href="{{ url('/halls') }}" >
                        <i class="fas fa-search"></i>
                      </a>
                    </li>
                    <li class="li__search">
                      <form action="{{ url('/halls/sort') }}" id="form__filter" method="get">
                        <select name="filter" class="form-control input__filter" style="display: none; margin-top: 4px !important">
                            <option value="0">فرز بالأعلى سعرا  </option>
                            <option value="1">فرز بالأقل سعرا  </option>
                            <option value="2"> حسب الاسم </option>
                        </select>
                      </form>
                    </li>
                    <li class="li__search">
                      <a class="btn white btn__filter show" href="{{url('/halls/sort') }}">
                        <i class="fas fa-filter"></i>
                      </a>
                    </li>
                @else
                      <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                      <li><a href="{{url('about')}}" > عن الموقع </a></li>
                      <li><a href="{{url('/halls')}}"  class="active" > قاعات الأفراح</a></li>
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
                      <li>
                        <form action="{{ url('/halls') }}" id="form__search" method="post">
                          @csrf
                          <input class="form-control input__search" style="display: none;margin-top: 4px !important;" name="search" type="text" placeholder="Search">
                        </form>
                      </li>
                      <li class="li__search">
                        <a class="btn white btn__search show" href="{{ url('/halls') }}" >
                          <i class="fas fa-search"></i>
                        </a>
                      </li>
                      <li>
                        <form action="{{url('/halls/sort')}}" id="form__filter" method="get">
                          
                          <select name="filter" class="form-control input__filter" style="display: none; margin-top: 4px !important">
                            <option value="0">فرز بالأعلى سعرا  </option>
                            <option value="1">فرز بالأقل سعرا  </option>
                            <option value="2"> حسب الاسم </option>
                          </select>
                        </form>
                      </li>
                      <li class="li__search">
                        <a class="btn white btn__filter show" href="{{url('/halls/sort') }}" >
                          <i class="fas fa-filter"></i>
                        </a>
                      </li>
                @endguest  
              </ul>  
         </div>
         
    </nav>

  </div>


  <div class="container" dir="rtl" class="text-right" >
  
        <div class="row">
              @foreach ($result as $item)
                  <div class="col-md-4 col-md-offset-4 mt-1" >
                      <div class="card" style=" height:26rem;">
                           <img class="card-img-top" src="{{asset($item->halls->file)}}"  style="height:14rem;">
                           <div class="card-body text-right">
                               <h5 class="card-title">{{$item->halls->name}}</h5>
                               <p>
                                   <b>البريد الإلكتروني : </b>{{$item->halls->email}} <br>
                                   <b> رقم الهاتف : </b>{{$item->halls->phone}} &nbsp;&nbsp;&nbsp;
                                   <b>المنطقة  : </b>{{$item->halls->Address->name}} <br>
                                   <b> المناسبة : </b>{{$item->name}} <br>
                                
                                </p>    
                           </div>
                           <div class="card-footer text-muted text-right mt-5">
                               <a href="{{url('/halls/'.$item->halls->id) }}" class="btn btn-primary btn-sm">عرض تفاصيل الصالة</a>
                               <button data-target="#loginModal" data-toggle="modal" class="m-2 btn btn-success btn-sm btn__show__news"
                                       data-id="{{ $item->halls->id }}">
                                       تواصل
                             </button>
                           </div>
                      </div>
                   
                  </div>
         
              @endforeach

            
        </div>
        <div class="modal text-right" id="loginModal"  tabindex="-1">
          <div class="modal-dialog text-right">
            <div class="modal-content">
                <div class="modal-header " dir="rtl">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="margin-left: 12rem;"> </h4>
                </div>
              
                <div class="modal-body">
                  <form class="form-signin" action="{{url('/contact')}}" method="POST">
                    @csrf
                        {{-- <textarea class="vis halls_id" name="halls_id " id="" cols="30" rows="10"></textarea> --}}
                        <input class="halls_id" type="hidden" name="halls_id" />
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
                            <input type="text"  name="content" class="form-control" placeholder="أكتب  استفسارك هنا" required autofocus >
                        </div>
                        <button class="btn btn-primary btn-block"> إرسال </button>

                </form>       
                </div>
    
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" data-dismiss="modal"> إغلاق </button>
                </div>
              </form>
    
            </div>
        </div>
  </div>

  <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
    © 2021 Copyright:
  </div>




  <script src="{{URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>
  {{-- <script src="{{asset('js/app.js')}}"></script> --}}
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 




  



  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <!--Internal  Datatable js -->
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
  <script>
       $( function ()
       {
        $('#ex').DataTable({      
                  pageLength: 10,
                  lengthChange: false,
                  
              "language": {  
                    "searchPlaceholder":"بحث",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "    ",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير",                     
                    }
                }              
        });
       }); 
       $('.btn__show__news').on('click', function(e) {
             e.preventDefault(); // عشان مايديرش load للصفحة          
            // $('.modal .modal-body textarea.halls_id').text($(this).data('id'));
            $('.modal .modal-body input.halls_id').val($(this).data('id'));

        }); 
        $('.btn__search').on('click', function (e) {
            e.preventDefault(); // يوقف تحميل الصفحة
            if ($(this).hasClass('show')) { // اذا كلاس  موجود يظهر حقل اﻹدخال ويحذف الكلاس
              $('.input__search').fadeIn('slow');
              $(this).removeClass('show');
            } else { 
              $('#form__search').submit();
            }
        });
        $('.btn__filter').on('click', function (e) {
          e.preventDefault(); // يوقف تحميل الصفحة
            if ($(this).hasClass('show')) { // اذا كلاس  موجود يظهر حقل اﻹدخال ويحذف الكلاس
              $('.input__filter').fadeIn('slow');
              $(this).removeClass('show');
            } else { 
              $('#form__search').submit();
            }
        });
        
    </script>
</body>
</html>