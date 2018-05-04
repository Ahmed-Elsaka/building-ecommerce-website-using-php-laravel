@extends('admin.layouts.layout')
@section('titile')
    Add member
@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Add Properity

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="{{ url('/users') }}">Control members</a></li>
            <li class="active"><a href="{{ url('/users/create') }}">Add new member</a></li>
        </ol>
    </section>

    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new Properity</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            {!! Form::open(['url' =>'/adminpanel/bu', 'method' =>'post', 'files'=> true]) !!}
                          @include('admin.bu.form')
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