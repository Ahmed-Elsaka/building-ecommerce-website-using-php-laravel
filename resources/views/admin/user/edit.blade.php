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

    <!-- user buildings content-->
    <section class="content">
        <div class="row">
            <div class="col col-lg-5">
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
                                        <div class="clearfix"></div><br>
                                        <div class="col-md-2 offset-md-4 " style="margin-left: 5%">
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
            </div>
            <div class="col-lg-7" style="padding: 15px">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#activity" data-toggle="tab" aria-expanded="false">
                                Active Buildings
                                <label class="label label-primary" style="margin-left: 10px">
                                    {{buForUserCount($user->id,1)}}
                                </label>
                            </a>
                        </li>
                        <li class="">
                            <a href="#waitingActive" data-toggle="tab" aria-expanded="true">
                                Waiting Active buildings
                                <label class="label label-primary" style="margin-left: 10px">
                                    {{buForUserCount($user->id,0)}}
                                </label>
                            </a>
                        </li>


                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="waitingActive">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Waiting Active Table</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Building Name</th>
                                            <th> Building type</th>
                                            <th> Created at</th>
                                            <th>Change state</th>
                                        </tr>
                                        @foreach($buWaiting as $waiting)
                                            <tr>
                                                <th style="width: 10px">{{ $waiting->id }}</th>

                                                <th><a href="{{ url('/adminpanel/bu/'.$waiting->id.'/edit') }}">{{ $waiting->bu_name }}</a></th>
                                                <th>{{bu_type()[$waiting->bu_type]}}</th>
                                                <th style="width: 150px">{{$waiting->created_at}}</th>
                                                <th class="text-center">
                                                    <a href="{{ url('/adminpanel/changestatus/'.$waiting->id.'/1') }}" class="btn btn-primary">activate</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody></table>

                                </div>


                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="activity">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">  Active Table</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Building Name</th>
                                            <th> Building type</th>
                                            <th> Created at</th>
                                            <th>Change state</th>
                                        </tr>
                                        </tr>
                                        @foreach($buEnable as $active)
                                            <tr>
                                                <th style="width: 10px">{{ $active->id }}</th>
                                                <th><a href="{{ url('/adminpanel/bu/'.$active->id.'/edit') }}">{{ $active->bu_name }}</a></th>
                                                <th>{{bu_type()[$active->bu_type]}}</th>
                                                <th style="width: 150px">{{$active->created_at}}</th>
                                                <th >
                                                    <a href="{{ url('/adminpanel/changestatus/'.$active->id.'/0') }}" class="btn btn-danger">Deactivate</a>
                                                </th>
                                            </tr>
                                        @endforeach

                                        </tbody></table>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">

                                    <div class="text-center">
                                        {{ $buEnable->appends(Request::except('page'))->render() }}
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div> <!-- end of tab-content -->
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
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