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

<div class="row mt-5" id="print-area">
    <div class="col-3">
    </div>
    <div class="col-6 mt-5">
        <h4 class="center text-center">
            {{$title}}  {{$value}}
        </h4><br>
        <div  style="background-color:#ffffff;" dir="rtl">
            @if($employee->count() > 0 )
            <table class="table pull-right center">
                <thead class="mt-5">
                    <th>#</th>
                    <th>اسم الموظف</th>
                    <th> رقم الهاتف</th>
                </thead>
                <tbody>
                    @foreach($employee as $index=>$item)
                    <tr>
						<td>{{++$index}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
       
    </div>
    
</div>


    <script>  
    // System32 -> drivers ->
      //    window.print();
    </script>
      		
	</div>
		<!-- Container closed -->
</div>
		<!-- main-content closed -->
@endsection
