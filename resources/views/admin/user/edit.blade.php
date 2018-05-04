@extends('admin.layouts.layout')
@section('titile')
    Edit member | {{ $user->name }}
@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Edit member | {{ $user->name }}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/users') }}">Control members</a></li>
            <li class="active"><a href="{{ url('/users/'.$user->id.'/edit') }}"> Edit member | {{ $user->name }}</a></li>
        </ol>
    </section>

    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Edit member | {{ $user->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                            {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PATCH']) !!}

                            @include('admin.user.form')
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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Change password  member | {{ $user->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {!! Form::open(['url'=>'/user/changepassword', 'method'=>'post']) !!}
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right" style="padding-left:10%" >{{ __('Password') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-2 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change password') }}
                                    </button>
                                </div>
                            </div>
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