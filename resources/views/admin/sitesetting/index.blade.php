@extends('admin.layouts.layout')
@section('titile')
    Edit site setting
@endsection

@section('header')

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Edit site setting
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{ url('/adminpanel/sitesetting') }}">Edit site setting</a></li>
        </ol>
    </section>
    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit site setting</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('adminpanel/sitesetting') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        @foreach($siteSetting as $setting)
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label for="name" class="text-md-right" >{{ __($setting->slug) }}</label>
                                </div>
                                <div class="col-md-10">
                                    @if($setting->type !=3)
                                         {!! Form::text($setting->namesetting, $setting->value , ['class'=>'form-control']) !!}
                                    @elseif($setting->type ==3)
                                        @if($setting->value !='')
                                            <img src="{{ checkIfImageIsExist($setting->value, '/public/website/slider/','/website/slider/') }}" width="150"/>
                                            <br>
                                        @endif
                                        {!! Form::file($setting->namesetting, null, ['class'=>'form-control']) !!}
                                        <br>
                                            {{ $setting->value }}
                                    @endif

                                    @if ($errors->has($setting->namesetting))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first($setting->namesetting) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                            <button name="submit" type="submit" class="btn btn-app" >
                                <i class="fa fa-save"></i>
                                Store site setting
                            </button>
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