@extends('layouts.master')
@section('content')
<br><br>
@include('layouts._session')
<style >
    @media print{
        #print-area{
            display: none;
        }
        *{
        background-color: #ffffff !important;
    }
    }
</style>
        <!-- Main content -->
        <section class="content" >
            
            <div class="card card-outline card-primary mt-5" id="print" dir="rtl">
                <div class="card-header mt-5" >
                   <h3 class="card-title">
                    صالة {{$halls->name}} للمناسبات والأفراح             
                </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " >
                            <div class="card">
                                <div class="card-header">
                                <h3 class="card-title"> اسم زبون : {{$reservation->customer->name}} <br>
                                                          رقم الحجز : {{$reservation->num}}
                                </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                  <table class="table table-hover text-nowrap ">
                                    <thead>
                                      <tr class="p-5 m-5">
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
                                      <tr class="p-5 m-5">
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
                                      <tr class="p-5 m-5">
                
                                        <td colspan="2"> تكلفة الكلية : 
                                            <?php 
                                                  if($day == 'Thursday')
                                                   {
                                                       echo  $reservation->occasions->thu_price + $sum;
                                                   }  
                                                   else 
                                                   {
                                                    echo $reservation->occasions->st_fr_price;
                                                   }                                                   
                                            ?>
                                           </td>    
                                        <td > القيمة المدفوعة  : {{$bills->credit}}د.ل </td>               
                                        </tr>
                                        <tr class="p-5 m-5">
                                            <td colspan="2"> تاريخ الدفع  : {{$bills->date}}</td>                              
                                            <td colspan="2"> الباقي   : {{$bills->debit}}د.ل</td>                              
                                        </tr>
                                        <tr class="p-5 m-5">
                                            <td colspan="4"> طريقة الدفع  :
                                               @if($bills->type==0) كاش @endif
                                               @if($bills->type==1) بطاقة @endif
                                               @if($bills->type==2) شيك @endif
                                            </td>                              
                                        </tr>
                                        <tr class="p-5 m-5">
                                            <td colspan="4"> ملاحظات  : {{$bills->note}}</td>                              
                                        </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>

                        </table>
                    </div> <!-- End table-responsive -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-info" id="print-area" onclick="printReport()">
                        <i class="mdi mdi-printer ml-1"></i>
                        طباعة</button>                
                </div>
            </div>
           
        </section>
        <!-- End of Main content -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
 @endsection
 <script type="text/javascript">
    function printReport() {
        var printContents = document.getElementById("print").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML=printContents;
        console.log(printContents);
        console.log(originalContents);
        window.print();
        document.body.innerHTML=originalContents;
        location.reload();
    }
</script>