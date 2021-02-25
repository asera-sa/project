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
                           <li><a href="{{url('canelReservation')}}"  class="active">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" > دخول </a></li>
                      @else
                            <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
                              <li><a href="{{url('/halls') }}" > قاعات الأفراح</a></li>
                            <li><a href="{{url('canelReservation')}}"  class="active">  الحجوزات الملغية</a></li>
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

  <div class="container text-right">
      <div class="row">
          <div class="col-xs-12">
              <button data-target="#loginModal" data-toggle="modal" class=" m-2 btn btn-danger btn-sm"> إلغاء حجز </button>
              <div class="modal text-right" id="loginModal" tabindex="-1">
                  <div class="modal-dialog text-right">
                      <div class="modal-content">
                          <div class="modal-header " dir="rtl">
                              <button class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" style="margin-left: 12rem;">إلغاء حجز</h4>
                          </div>
                        <form class="form-horizontal" action="{{url('/canelReservation')}}" method="POST" >
                            @csrf  
                          <div class="modal-body">
                                           
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                        <input type="text" name="number" placeholder="ادخل رقم الحجز" value="{{old('number')}}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-success btn-sm" type="submit">إلغاء الحجز</button>
                                        </div>

                                    </div>
                               </form>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-danger btn-sm" data-dismiss="modal"> إغلاق </button>
                          </div>
                        </form>

                      </div>
                  </div>
              </div>

          </div>
      </div>

  </div>
   <div class="container" dir="rtl" class="text-right">
    @include('_session')  
         <div class="row">
             @if($reser->count() > 0)    
            <div class="col-md-12 col-md-offset-6">
                <div class="table-responsive">
                    {{-- <table class="table text-md-nowrap" id="ex" > --}}
                    <table class="table table-striped mg-b-0 text-md-nowrap" id="ex">
                        <thead>
                            <th  class="border-bottom-0"> # </th>
                            <th  class="border-bottom-0">اسم العميل</th>
                            <th  class="border-bottom-0"> الصالة </th>
                            <th class="border-bottom-0">تاريخ الحجز</th>																							
                            <th  class="border-bottom-0">البريد الألكتروني </th>
                            <th  class="border-bottom-0"> العنوان </th>
                            <th  class="border-bottom-0">الهاتف  </th>
                        </thead>
                        <tbody>
                            @foreach ($reser as $index=>$item)                                
                                <tr class="rowdate">
                                    <td>{{++$index}}</td>
                                    <td  class="border-bottom-0">{{$item->customer->name}} </td>
                                    <td  class="border-bottom-0"> {{$item->halls->name}} </td>
                                    <td class="border-bottom-0"> {{$item->date}}</td>																							
                                    <td  class="border-bottom-0">{{$item->customer->email}} </td>
                                    <td  class="border-bottom-0"> {{$item->customer->address}} </td>
                                    <td  class="border-bottom-0"> {{$item->customer->phone}} </td>
                                </tr>
                           @endforeach

                        </tbody>
                    </table>
                </div>
            </div>                 
            @else
            <div class="col-md-2 col-md-offset-6" style="margin-bottom: 21rem;"></div>
                <h3 class="center m-5">لايوجد حجوزات ملغية</h3>  
            @endif
         </div>
         
   </div>

   <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
       <p class="lf">Copyright &copy; 2020 <a href="#">أفـراحنـا</a> </p>
   </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
       $('#loginModal').on('shown.bs.modal', function () {
             $('#myInput').trigger('focus')
        }) 

    </script>
</body>
</html>