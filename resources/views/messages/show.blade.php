@extends('layouts.master')


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper text-right">

        <!-- Main content -->
        <section class="content" style="margin-top: 50px">

            @include('_session')

            <div class="card card-outline card-primary" dir="rtl">

                <div class="card-header">
                    <h3 class="card-title">عـرض الرد على المُرسِل : {{$messages->name}}</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">عنوان الرسالة</label>
                        <div class="col-sm-10">
                        <input type="text" disabled class="form-control" value="{{$messages->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">نص الرسالة</label>
                        <div class="col-sm-10">
                        <textarea type="text" disabled class="form-control" rows="5">{{$messages->content}}</textarea>
                        </div>
                    </div>

                    <hr style="height:1px;border:none;background-color:#a1a1a1;">


                    <div class="form-group">
                        <label class="col-sm-2 control-label">نـص الـرّد</label>
                        <div class="col-sm-10">
                        <textarea type="text" disabled name="text_replay" class="form-control" rows="5">{{$messages->text_replay}}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

            </div>

        </section>
        <!-- End of Main content -->

    </div>
    <!-- End of content-wrapper -->

@endsection
