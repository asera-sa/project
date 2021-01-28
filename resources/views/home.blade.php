@extends('layouts.master')

@push('css')
    <link href='{{URL::asset("/assets/fullcalendar/assets/css/fullcalendar.css")}}' rel='stylesheet' />
    <link href='{{URL::asset("/assets/fullcalendar/assets/css/fullcalendar.print.css")}}' rel='stylesheet' media='print' />
    <style>

        body {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
            background-color: #DDDDDD;
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
            margin: 0 auto;
            width: 900px;
            background-color: #FFFFFF;
            border-radius: 6px;
            box-shadow: 0 1px 2px #C3C3C3;
            }

    </style>
@endpush

@section('content')
    <div id='wrap'>
        <div id='calendar'></div>
        <div style='clear:both'></div>
    </div>
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

@endsection
@push('js')
    <script src='{{URL::asset("/assets/fullcalendar/assets/js/jquery-1.10.2.js")}}' type="text/javascript"></script>
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

    </script>
@endpush