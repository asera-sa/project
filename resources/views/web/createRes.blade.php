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
    <style>
      body,h1,h2,h3,h4,h5,h6 {

      font-family: 'Cairo', sans-serif;
      }

    </style>
</head>
<body dir="rtl">
    @include('sweetalert::alert')

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
                           <li><a href="{{url('/halls')}}"  class="active" > قاعات الأفراح</a></li>
                           <li><a href="{{url('canelReservation')}}">  الحجوزات الملغية</a></li>
                           <li><a href="{{url('/contact')}}" > اتصل بنا</a></li>
                           <li><a href="{{url('/login')}}" > دخول </a></li>
                      @else
                            <li><a href="{{url('/')}}"  >  الرئيسية </a></li>
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
        @include('_session')

        <div class="row row-sm">

            <div class="col-xl-12">
                <div class="card">
                    <h4 class="text-right p-3" style="color: #c40083;">بيانات حجز</h4>
           
                   <form class="form-horizontal" action="{{url('/reservation/create/'.$id)}}" method="POST" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group row" style="align-items: center">
                                    <label class="col-sm-2 control-label">رقم الزبون</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="number" value="{{$customer ?? ''}}" class="form-control" >
                                     </div>
                                     <a data-target="#customer_insert" data-toggle="modal" style="background-color: #c40083;" class="m-2 text-white btn btn-sm">
                                         زبون جديد
                                    </a>
                                </div>
                
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"> تاريخ الحجز</label>
                                    <div class="col-sm-6">
                                    <input type="date" name="date" value="{{old('date')}}" class="form-control" >
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"> المناسبة</label>
                                    <div class="col-sm-6">
                                        <select name="occasions_id" class="form-control js-example-matcher" required>
                                            @foreach ($occasions as $item)
                                               <option value="{{$item->id}}">{{$item->name}} </option>                                          
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">الفترة</label>
                                    <div class="col-sm-6">
                                        <select name="time" class="form-control js-example-matcher" required>
                                            <option value="0">فترة صباحية </option>                                          
                                            <option value="1">فترة مسائية </option>                                          
                                        </select> 
                                    </div>
                                </div>
                                
                                @if($services->count() > 0 )     
                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right"><h6>الخدمات المتوفرة</h6>  </label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-8">
                
                                        <table class="table">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th >الكمية المطلوبة</th>
                                                <th></th>
                                            </tr><?php $i=0; ?>
                                            @foreach ($services as $index=>$item)
                                                <tr>
                                                    <td>{{++$index}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->price}} د.ل</td>
                                                    <input type="hidden"  name="services_id[]" disabled value="{{$item->id}}">
                                                    <input type="hidden"  name="price[]" disabled value="{{$item->price}}">
                                                    <td><input type="number" name="quantity[]" disabled style="width: 7rem;"  min="1"></td>
                                                    <td><input type="checkbox" name="check[]" class="check" value="false"></td>
                                                    <?php $i++; ?>
                                                </tr>
                                            @endforeach
                                           
                                           
                
                                        </table> 
                                    </div>
                               
                                </div> 
                                @endif    
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit"  style="background-color: #c40083;"  class="btn text-white pull-right">إضـافـة</button>
                            </div>
                            <!-- /.card-footer -->
                   </form>
                </div>
            </div>

            {{-- <div class="col-xl-6"> --}}
                {{-- <div class="card">
                    <h4 class="text-right p-3" style="color: #c40083;"> زبون جديد </h4>
           
                   <form class="form-horizontal" action="{{url('/customer')}}" method="get" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">إسم</label>
                            <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                            </div> 
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">البريد الألكتروني</label>
                            <div class="col-sm-10">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" >
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">العنوان</label>
                            <div class="col-sm-10">
                            <input type="text" name="address" value="{{old('address')}}" class="form-control" >
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">رقم الهاتف</label>
                            <div class="col-sm-10">
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" autocomplete="on">
                            </div>
                        </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button data-target="#loginModal" data-toggle="modal"  type="submit" class="btn btn-primary">إضـافـة</button>
                    </div>
                    <!-- /.card-footer -->
                   </form>
                </div> --}}
                
            {{-- </div> <!-- End of customer --> --}}
            
            

            <div class="modal text-right" id="customer_insert"  tabindex="-1">
                <div class="modal-dialog text-right" style="max-width: 750px !important;">
                    <div class="modal-content">
                        <div class="modal-header " dir="rtl">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="margin-left: 12rem;"> </h4>
                        </div>
                        
                        <div class="modal-body">
                            <div class="card">
                                <h4 class="text-right p-3" style="color: #c40083;"> زبون جديد </h4>
                       
                               <form class="form-horizontal" action="{{url('/customer')}}" method="get" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">إسم</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                                        </div> 
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">البريد الألكتروني</label>
                                        <div class="col-sm-10">
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" >
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">العنوان</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="address" value="{{old('address')}}" class="form-control" >
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">رقم الهاتف</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" autocomplete="on">
                                        </div>
                                    </div>
                                  
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">إضـافـة</button>
                                </div>
                                <!-- /.card-footer -->
                               </form>
                            </div>
            
                        </div>
            
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-sm" data-dismiss="modal"> إغلاق </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>



        </div> <!-- End of row row-sm-->

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










    <div class="text-center p-3 mt-5" style="background-color: rgba(220, 227, 230, 0.829)">
        <p class="lf">Copyright &copy; 2020 <a href="#">أفـراحنـا</a> </p>
    </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
   
    const checkboxes = document.querySelectorAll('.check');
    checkboxes.forEach(box => {
        box.addEventListener('click', function(e) {
            let td = e.currentTarget.parentElement;
            let inputquantity = td.previousElementSibling.children[0];
            let price = td.previousElementSibling.previousElementSibling;
            let services_id = price.previousElementSibling;
           // console.log(services_id);
            if (e.target.checked) {
                inputquantity.disabled = false;
                price.disabled = false;
                services_id.disabled = false;
                inputquantity.value = 1;
                e.target.value = true;
            } else {
                inputquantity.disabled = true;
                price.disabled = true;
                services_id.disabled = true;
                inputquantity.value = 0;
                e.target.value = false;
            }
        })
    });



      
      

</script>
</body>
</html>