@extends('layouts.app')
@section('title')
    Edit Property |  {{ $bu->bu_name }}
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
                    <li><a href="{{ url('/user/buldingShowWait') }}">Waiting Active Properties</a> </li>
                    <li><a href="{{ url('/user/editBuilding/'.$bu->id) }}">Edit Property |  {{ $bu->bu_name }}</a> </li>


                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <h2>Edit Property |  {{ $bu->bu_name }}</h2>
                <div class="profile-content">
                    {!! Form::model($bu, ['url' =>'/user/update/building', 'method' =>'post', 'files'=> true]) !!}
                   {{-- make hidden field to send bu_id to controller to work with it --}}
                    <input type="hidden" name="bu_id" value="{{ $bu->id }}">
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
