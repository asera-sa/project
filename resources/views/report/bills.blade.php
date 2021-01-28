@extends('layouts.master')
@section('content')
<style media="print" >
    @page {
        size: auto;
        margin: 0%;
    }
    footer{
        display: none;
    }
    *{
        background-color: #ffffff !important;
    }
</style>
<div class="row " style="background-color: white;">
    <div class="col-6">
        {{-- <a target="_blank" class="btn btn-info " onclick="myfun()">طباعة</a> --}}
          {{-- <a  id="print" class="btn btn-info " onclick="javascript:printlayer('print-area')">طباعة</a> --}}
    </div> 
</div>

<div class="row mt-5" id="print-area" style="width: 80rem">
    <div class="col-3"></div>
    <div class="col-6 mt-5">
        <h4 class="center text-center" >
         
                 صالة {{$halls->name}} للمناسبات والأفراح             
        </h4> <br>
        <div  style="background-color:#ffffff;" dir="rtl">
       
            <div class="col-12">
              {{-- @if($reservation == null || $bills == null )
                   <div class="card  card-default" dir="rtl">
                       <h3 class="m-3">للإسـف ، لا يوجد بيانات</h3>
                   </div>
              @else --}}
              <div class="card">
                <div class="card-header">
                <h3 class="card-title"> اسم زبون : {{$reservation->customer->name}} <br>
                                          رقم الحجز : {{$reservation->num}}
                </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th> حجز بتاريخ : {{$reservation->date}}</th>
                        <th>المناسبة : {{$reservation->occasions->name}}</th> 
                        <th> <?php
                               if($reservation->time == 0)
                               echo 'فترة صباحية';
                               else 
                                   echo 'فترة مسائية';
                                ?>
                        </th> 
                      <th></th>                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td colspan="2"> تكلفة الصالة :
                        
                        <?php 
                                   $day= date('l' , strtotime($reservation->date));  
                                   if($day == 'Thursday')
                                   {
                                   echo $reservation->occasions->thu_price;
                                   }  
                                   else {
                                    echo $reservation->occasions->st_fr_price;
                                    
                                   }
                                ?>  
                        </td>
                      <?php 
                            $sum=0; 
                            foreach ($reservation->services as $servic)
                                $sum+=$servic->pivot->price;
                         
                       ?>
                      <td colspan="2"> تكلفة الخدمات : {{$sum}}</td>
                        
                      </tr>
                      <tr>

                        <td colspan="2"> تكلفة الكلية : 
                            <?php 
                                  if($day == 'Thursday')
                                   {
                                       echo  $reservation->occasions->thu_price + $sum;
                                   }  
                                   else {
                                    echo $reservation->occasions->st_fr_price;
                                    
                                   }    
                                
                            ?>
                           </td>    
                        <td > القيمة المدفوعة  : {{$bills->credit}}د.ل </td>               
                        </tr>
                        <tr>
                            <td colspan="2"> تاريخ الدفع  : {{$bills->date}}</td>                              
                            <td colspan="2"> الباقي   : {{$bills->debit}}د.ل</td>                              
                        </tr>
                        <tr>
                            <td colspan="4"> طريقة الدفع  :
                               @if($bills->type==0) كاش @endif
                               @if($bills->type==1) بطاقة @endif
                               @if($bills->type==2) شيك @endif
                              </td>                              
                        </tr>
                        <tr>
                            <td colspan="4"> ملاحظات  : {{$bills->note}}</td>                              
                        </tr>
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              {{-- @endif --}}
            </div>
          </div>
          <!-- /.row --> 
       
       
    </div>
    
</div>


    <script>  
      //    window.print();
    </script>
      		
		</div>
		<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
