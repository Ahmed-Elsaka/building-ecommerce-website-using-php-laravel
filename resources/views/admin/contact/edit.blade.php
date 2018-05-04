@extends('admin.layouts.layout')


@section('header')
    {!! Html::style('cus/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Edit Message | {{ $contact->contact_name}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/adminpanel/contact') }}">Control Messages</a></li>
            <li class="active"><a href="{{ url('/adminpanel/contact/'.$contact->id.'/edit') }}"> Edit member | {{ $contact->contact_name }}</a></li>
        </ol>
    </section>

    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Edit Message | {{ $contact->contact_name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        {!! Form::model($contact,['route'=>['contact.update' ,$contact->id],'method'=>'PATCH']) !!}
                            @csrf
                            @include('admin.contact.form')
                        {!! Form::close() !!}


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection