@extends('admin.layouts.layout')
@section('titile')
    Edit Property | {{ $bu->name }}
@endsection

@section('header')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Edit Property | {{ $bu->bu_name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/adminpanel/bu') }}">Control Propertys</a></li>
            <li class="active"><a href="{{ url('/adminpanel/bu'.$bu->id.'/edit') }}"> Edit Property | {{ $bu->bu_name }}</a></li>
        </ol>
    </section>
    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Edit Property | {{ $bu->bu_name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($bu, ['route' =>['bu.update', $bu->id],'method' =>'PATCH', 'files'=> true]) !!}
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

@endsection