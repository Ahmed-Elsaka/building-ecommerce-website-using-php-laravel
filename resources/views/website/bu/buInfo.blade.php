@extends('layouts.app')
@section('title')
    Building : {{ $buInfo->bu_name }}
@endsection
@section('header')




    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    {!! Html::style('cus/buall.css') !!}
    {!! Html::style('cus/css/select2.css') !!}

    <!-- sliderheaders -->

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
            <div class="row profile">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a> </li>
                    <li><a href="{{ url('/ShowAllBuildings') }}">All Properties</a> </li>
                    <li><a href="{{ url('/SingleBuilding/'.$buInfo->id) }}"> {{ $buInfo->bu_name }} </a> </li>
                </ol>
            </div>
            @include('/website/bu/pages')
            <div class="col-md-9">
                <div class="profile-content" style="color:#777">

                    <h1>{{ $buInfo->bu_name }}</h1> <hr>
                    <div class="btn-group" role="group">
                        <a href="{{ url('/search?bu_price='.$buInfo->bu_price) }}" class="btn btn-default">Price: {{ $buInfo->bu_price }}</a>
                        <a href="{{ url('/search?bu_square='.$buInfo->bu_square) }}" class="btn btn-default">Area: {{ $buInfo->bu_square }}</a>
                        <a href="{{ url('/search?bu_place='.$buInfo->bu_place) }}" class="btn btn-default">Place: {{ bu_place()[$buInfo->bu_place] }}</a>
                        <a href="{{ url('/search?rooms='.$buInfo->rooms) }}" class="btn btn-default">No of Rooms: {{ $buInfo->rooms }}</a>
                        <a href="{{ url('/search?bu_type='.$buInfo->bu_type) }}" class="btn btn-default">Building Type: {{ bu_type()[$buInfo->bu_type] }}</a>
                        <a href="{{ url('/search?bu_type='.$buInfo->bu_rent) }}" class="btn btn-default">Sale-Rent: {{ bu_rent()[$buInfo->bu_rent] }}</a>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    <div>

                        @include('website.bu.itemSlider')

                        <p>{!! nl2br($buInfo->bu_larg_dis)  !!} </p>
                        <br>
                        <div id="map" style="width:100%;height:300px"></div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ae2f67c464cbb8a"></script>
                        <br>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                    </div>
                </div>
                <br>
                <div class="profile-content" style="color:#777">
                    <h2>Other Properties</h2>
                    @include('/website/bu/sharefile',['bu'=>$same_rent])
                    @include('/website/bu/sharefile',['bu'=>$same_type])

                </div>
            </div>
        </div>
    </div>




@endsection
@section('footer')

    <script>

            //var myCenter = new google.maps.LatLng(-0.1276250,51.5033640);
            var myCenter = new google.maps.LatLng({{ $buInfo->bu_langtuite }},{{ $buInfo->bu_latitude }});
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);

    </script>


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
