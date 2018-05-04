@extends('layouts.app')
@section('title')
    {{$user->name}} Properties
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
                    <li><a href="{{ url('/') }}">Home</a> </li>
                    <li><a href="{{ url('/ShowAllBuildings') }}">All Buildings</a> </li>
                    <li class="active"><a href="#">{{ $user->name }} Properties</a> </li>
                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <div class="profile-content">
                @include('/website/bu/sharefile',['bu'=>$bu])
                @if(!isset($search))
                    {{ $bu->appends(Request::except('page'))->render() }}
                @endif
                <!-- adjust pagination -->

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
