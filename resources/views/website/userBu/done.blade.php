@extends('layouts.app')
@section('title')
    The properity has been add successfully
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
                    <li><a href="{{ url('/ShowAllBuildings') }}">All</a> </li>
                    <li><a href="{{ url('/user/create/building') }}">Add new Property</a> </li>
                    <li class="active"><a href="">Added Done</a> </li>


                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <div class="profile-content">
                    <div class="alert alert-success">
                        The properity has been add
                        <b>
                             successfully
                        </b>
                        </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection