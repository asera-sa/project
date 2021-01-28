<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>أفراحنا</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="css/images/favicon.ico"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link href='{{URL::asset("/assets/fullcalendar/assets/css/fullcalendar.css")}}' rel='stylesheet' />
    <link href='{{URL::asset("/assets/fullcalendar/assets/css/fullcalendar.print.css")}}' rel='stylesheet' media='print' />

    <style>
      body,h1,h2,h3,h4,h5,h6 {
        font-family: 'Cairo', sans-serif;
      }

      #wrap {
        width: 1100px;
        margin: 0 auto;
        }
    
      #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        text-align: left;
        }
    
      #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
        }
    
      .external-event { /* try to mimick the look of a real event */
        margin: 10px 0;
        padding: 2px 4px;
        background: #3366CC;
        color: #fff;
        font-size: .85em;
        cursor: pointer;
        }
    
      #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
        }
    
      #external-events p input {
        margin: 0;
        vertical-align: middle;
        }
    
      #calendar {
    /* 		float: right; */
            margin: 0 auto;
        width: 900px;
        background-color: #FFFFFF;
          border-radius: 6px;
            box-shadow: 0 1px 2px #C3C3C3;
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
                           <li><a href="#">  الرئيسية </a></li>
                           <li><a href="#" >من نحن </a></li>
                           <li><a href="{{url('/halls')}}"  class="active" > قاعات الأفراح</a></li>
                           <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" > دخول </a></li>
                      @else
                            <li><a href="#">  الرئيسية </a></li>
                            <li><a href="#" >من نحن </a></li>
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
                      @endguest  

                    </ul>  
                     
               </div>
              
          </nav>
    </div>
    <div class="container" dir="rtl" class="text-right" >
      <div class="row text-right" >
                <div class="col-md-8 col-md-offset-4 mt-3" >
  


                  <div id='wrap' style="width: 100% !important;">
                    <div id='calendar' style="width: 100% !important;"></div>                    
                    <div style='clear:both'></div>
                  </div>
                


















                  
                </div>
                <div class="col-md-4 col-md-offset-4 mt-3" >
                  <?php $count=0; ?>
                  @foreach ($news as $index=>$item) 
                  @if($count < 5)
                  <div class="card mt-2">
                    <div class="card-header" style="max-height:3rem;">
                      <span>{{$item->subject}}</span>
                      <button data-target="#loginModal" data-toggle="modal" class="float-left m-2 btn btn-info btn-sm btn__show__news"
                        data-subject="{{ $item->subject }}" data-content="{{ $item->content }}">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="card-body bg-light" style="max-height:4rem;overflow:hidden;">
                      {{$item->content}}
                    </div>
                  </div>
                  <?php $count++; ?>
                  @endif
                  @endforeach
                 
                </div>             
      </div>
    </div>

    <div class="modal text-right" id="loginModal"  tabindex="-1">
      <div class="modal-dialog text-right">
        <div class="modal-content">
            <div class="modal-header " dir="rtl">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="margin-left: 12rem;"> </h4>
            </div>
          
            <div class="modal-body">
              <p></p>    
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal"> إغلاق </button>
            </div>
          </form>

        </div>
    </div>

    </div>

    <div class="container" dir="rtl" class="text-right" >
      <div class="row">
                <div class="col-md-8 col-md-offset-4 mt-3" >
                    <div class="table-responsive">
                           <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
                               <thead>
                                   <th  class="border-bottom-0"> # </th>
                                   <th  class="border-bottom-0"> المناسبة </th>
                                   <th  class="border-bottom-0"> سعر يوم الخميس </th>
                                   <th class="border-bottom-0"> سعر باقي الأيام</th>																							
                               </thead>
                               <tbody>
                                    @foreach ($occasions as $index=>$item) 	
                                         <tr class="rowdate">
                                           <td>{{++$index}}</td>
                                           <td>{{$item->name}}</td>
                                           <td>{{$item->st_fr_price}}</td>
                                           <td>{{$item->thu_price}}</td>
                 
                                         </tr>
                                    @endforeach                                    
                               </tbody>
                           </table>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4 mt-3" >
                  <div class="table-responsive">
                         <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
                             <thead>
                                 <th  class="border-bottom-0"> # </th>
                                 <th  class="border-bottom-0"> الخدمة </th>
                                 <th  class="border-bottom-0"> السعر   </th>
                             </thead>
                             <tbody>   
                                 @foreach ($serviceshalls->services as $index=>$item) 	
                                     <tr class="rowdate">
                                       <td>{{++$index}}</td>
                                       <td>{{$item->name}}</td>
                                       <td>{{$item->pivot->price}}</td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                  </div>
                 </div>
               
                
      </div>
    </div>


    <div class="container" dir="rtl" class="text-right mt-2" >
        <a href="{{url('/reservation/create/'.$halls->id) }}"  class="btn btn-block btn-outline-success btn-lg">  حجز جديد </a>
    </div>


    {{-- الصور --}}
    <div class="container" dir="rtl" class="text-right" >
        <div class="row">
              @foreach ($pic as $item)
                  <div class="col-md-3 col-md-offset-4 mt-2" >
                      <div class="card" >
                           <img class="card-img-top" src="{{asset($item->file)}}"  style="height:14rem;">
                      </div> 
                  </div>
              @endforeach
        </div>
    </div>



    <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
      © 2021 Copyright:
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  {{-- <script src='{{URL::asset("/assets/fullcalendar/assets/js/jquery-1.10.2.js")}}' type="text/javascript"></script> --}}
  <script src='{{URL::asset("/assets/fullcalendar/assets/js/jquery-ui.custom.min.js")}}' type="text/javascript"></script>
  <script src='{{URL::asset("/assets/fullcalendar/assets/js/fullcalendar.js")}}' type="text/javascript"></script>
  <script>
  
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate(); // اليوم الحالي
            var m = date.getMonth(); // الشهر الحالي 
            var y = date.getFullYear(); // السنه الحالية
            /*  
                className colors
                خاصية اللون
                className: default(transparent), important(red), chill(pink), success(green), info(blue)
            */

            /* initialize the external events */
            $('#external-events div.external-event').each(function() {

                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                    //هنا استخدم trim
                    // عشان يحذف الفراغات اللي من يمين ومن يسار العنوان
                };

                // store the Event Object in the DOM element so we can get to it later
                // لاستخدامه لاحقاً DOM ف الـ eventObject تخزين الحدث
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                // خاصة بالتصميم 
                $(this).draggable({
                    zIndex: 999, //  يخليها اعلى طبقة
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });

            /* initialize the calendar */
            var calendar =  $('#calendar').fullCalendar({
                header: {
                    left: 'title', // يسار title
                    center: 'agendaDay,agendaWeek,month',
                    right: 'prev,next today'
                },
                editable: false, // التعديل (سحب الاحداث وتغييرها)
                firstDay: 0, // اول يوم يبدا من 0 معناها من الاحد ، 1 من الاثنين وهكذا ...
                defaultView: 'month',
                axisFormat: 'h:mm', // عرض الوقت في الحدث
                // طريقة عرض التاريخ في العمود بالنسبة للجدول الشهري و الاسبوعي و اليومي
                columnFormat: {
                    // ddd => Mon, Sat, Sun
                    // dddd => Monday, Saturday, Sunday ...
                    month: 'ddd',    // Mon // اسم اليوم في العمود فوق (خاص بجدول الشهري)
                    week: 'ddd d', // Mon 7 // اسم اليوم و التاريخ في العمود (الخاص بالجدول الاسبوعي)
                    day: 'dddd M/d',  // Monday 9/7  اسم اليوم و التاريخ اليوم وشهر في العمود (الخاص بالجدول اليومي)
                    // agendaDay: 'dddd d',
                    // agendaWeek: 'dddd M/d' // Monday 9/7
                },
                // العنوان الخاص بكل جدول (شهري ، اسبوعي ، يومي)
                titleFormat: {
                    // MMM => شهر مختصر
                    // MMMM => اس شهر كامل
                    month: 'MMMM yyyy', //January 2021
                    week: "MMMM yyyy", //January 2021
                    day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
                },
                allDaySlot: true, // إظهار الاحداث فس الجدول الاسبوعي و اليومي
                selectHelper: true,
                
                events: [
            
                    @foreach($reservation as $reser)
                    {
                        title: "{{ $reser->time == 0 ? 'حجز صباحي' : 'حجز مسائي' }}",
                        start: new Date("{{ str_replace('-', ',', $reser->date) }}"),
                        className: "{{ $reser->flag == 0 ? 'important' : 'success' }}"
                      
                    },
                    @endforeach
                ],
            });


        });

  
        interval: 2000
        $('.carousel').carousel({
       });
       $('.btn__show__news').on('click', function(e) {

       e.preventDefault(); // عشان مايديرش load للصفحة
 
       $('.modal .modal-title').text($(this).data('subject'));
       $('.modal .modal-body p').text($(this).data('content'));

       });
 </script>


</body>



</html>