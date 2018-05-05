@extends('layouts.app')
@section('title')
    Add new Property
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


                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <div class="profile-content">
                    {!! Form::open(['url' =>'/user/create/building', 'method' =>'post', 'files'=> true]) !!}
                          @include('admin.bu.form',['user'=>1])
                    {!! Form::close() !!}
                    <br>
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
