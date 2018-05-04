@extends('layouts.app')
@section('title')
    Edit Personal information for : {{$user->name}}
@endsection
@section('header')
    {!! Html::style('cus/buall.css') !!}
    {!! Html::style('cus/css/select2.css') !!}
@endsection

@section('content')

    <div class="col col-lg-3">
        <div class="container">
            <div class="row profile">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/ShowAllBuildings') }}">All Properties</a> </li>
                    <li class="active"><a href="">Edit Personal information for : {{$user->name}}</a> </li>
                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <h2>Enter new Name and Email</h2><br>
                <div class="profile-content">
                    {!! Form::model($user,['route'=>['user.editinfo',$user->id],'method'=>'PATCH']) !!}
                      @include('admin.user.form',['showforuser' =>1])
                    {!! Form::close() !!}
                    <hr>

                    {{-- change user password --}}
                    <h2>Change password :</h2><br>
                    {!! Form::open(['url'=>'/user/changecurrentpassword', 'method'=>'post']) !!}
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
                        <br>

                        <div class="clearfix"> <br>
                        {{-- New password --}}
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right" style="padding-left:10%" >{{ __('New Password') }}
                        </label>
                        <div class="col-md-6">
                            <input id="newpassword" type="password"
                                   class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}"
                                   name="newpassword" required>
                            @if ($errors->has('newpassword'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('newpassword') }}</strong>
                                        </span>
                            @endif
                        </div>

                        <br>

                    </div>
                        <div class="clearfix"> <br>
                    <div class="col-md-2 offset-md-4" style="padding-left:10%" >
                        <button type="submit" class="btn btn-primary">
                            {{ __('Change password') }}
                        </button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
@section('footer')
    {{--
        {!! Html::script('cus/js/select2.js') !!}
    <script>

            $('.select2').select2();

    </script>

    --}}
    {!! Html::script('cus/js/select2.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
