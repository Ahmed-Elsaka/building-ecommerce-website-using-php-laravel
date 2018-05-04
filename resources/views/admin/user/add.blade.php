@extends('admin.layouts.layout')
@section('titile')
    Add property
@endsection

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Add property

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="{{ url('adminpanel/bu') }}">Control Properties</a></li>
            <li class="active"><a href="{{ url('adminpanel/bu/create') }}">Add new property</a></li>
        </ol>
    </section>

    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new property</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ url('/users') }}">
                        @include('admin.user.form')
                        </form>

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