@extends('layouts.app')
@section('title')
    All Properties
@endsection
@section('header')
    {!! Html::style('cus/buall.css') !!}
    {!! Html::style('cus/css/select2.css') !!}
    <style>
        hr{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .dis{
            min-height: 40px;
            max-height: 10px;
        }
        .breadcrumb{
            background-color: #ffffff;
            color: #428bca;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="clearfix"></div>
        <br>
        <div class="clearfix"></div>

        <ol class="breadcrumb">
            <li><a href="{{ url('/ShowAllBuildings') }}">All Properties</a> </li>
            @if(isset($array))
                @if(!empty($array))
                    @foreach($array as $key => $value)
                        <li><a href="{{ url('/search?'.$key.'='.$value) }}"> {{searchnameFiled()[$key] }} :
                                @if($key =='bu_type')
                                    {{ bu_type()[$value] }}
                                @elseif($key =='bu_rent')
                                    {{ bu_rent()[$value] }}
                                @elseif($key =='bu_place')
                                    {{ bu_place()[$value] }}
                                @else
                                    {{$value}}
                                @endif
                            </a></li>
                    @endforeach
                @endif
            @endif
        </ol>


        @include('/website/bu/pages')


        <div class="col col-md-9">
            <div class="profile-content" style="color:#777">
            @include('/website/bu/sharefile',['bu'=>$buAll])
            @if(!isset($search))
                {{ $buAll->appends(Request::except('page'))->render() }}
            @endif
            <!-- adjust pagination -->

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
