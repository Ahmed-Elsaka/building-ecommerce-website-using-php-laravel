<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}

    {!! Html::script('website/js/jquery.min.js') !!}
    {!! Html::script('website/js/jquery.min.js') !!}
    {!! Html::script('js/app.js') !!}



    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <title>
       {{ getSetting() }}
         @yield('title')
    </title>
        @yield('header')
</head>

<body id="app-layout" >
        <div class="header" style="padding:10px">
            <div class="container">
                <a class="toggleMenu" href="{{ url('/') }}"><img src="website/images/nav_icon.png" alt="" /> </a>
                <nav class="navbar" style="margin-bottom: 0px">
                    {{-- NAV bar icon--}}
                    <a  class="navbar-brand" href="{{ url('/') }} " >
                        <i class="fa fa-paper-plane"> </i> ONE
                    </a>
                        <div class="menu pull-right"> <a class="toggleMenu" href="{{ url('/') }}"><img src="website/images/nav_icon.png" alt="" /> </a>

                            <ul class="nav navbar-nav">
                            <li class="{{ setActive(['home']) }}"><a href="{{ url('/home') }}">Home</a></li>
                            <li class="{{ setActive(['ShowAllBuildings']) }}"><a href="{{ url('/ShowAllBuildings') }}">All Properties</a></li>

                            <li class="dropdown">
                                <a  class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-expanded="false">
                                    For Rent <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach(bu_type() as $keyType =>$type)
                                        @if($type != 'Building Type')
                                        <li><a href="{{ url('/search?bu_rent=1&bu_type='.$keyType) }}">{{$type}}</a> </li><br>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a  class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-expanded="false">
                                    For Sale <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach(bu_type() as $keyType =>$type)
                                        @if($type != 'Building Type')
                                        <li><a href="{{ url('/search?bu_rent=0&bu_type='.$keyType) }}">{{$type}}</a> </li>
                                            <br>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                            <li class="{{ setActive(['contact']) }}"><a href="{{ url('/contact') }}">Contact Us</a></li>



                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" style="padding: 0px" aria-labelledby="navbarDropdown">
                                            <ul class="dropdown-menu show" role="menu">
                                                <li  class="{{ setActive(['user','editinfo']) }}">
                                                    <a href="{{url('/user/editinfo')}}">
                                                        <i class="fa fa-edit"></i>
                                                        Edit Personal Info
                                                    </a>
                                                </li>
                                                <li  class="{{ setActive(['user','buldingShow']) }}">
                                                    <a href="{{url('/user/buldingShow')}}">
                                                        <i class="fa fa-check"></i>
                                                        Active Buildings </a>
                                                </li>
                                                <li  class="{{ setActive(['user','buldingShowWait']) }}">
                                                    <a href="{{url('/user/buldingShowWait')}}">
                                                        <i class="fa fa-clock-o"></i>
                                                        Active Waiting Buildings </a>
                                                </li>
                                                <li  class="{{ setActive(['user','create','building']) }}">
                                                    <a href="{{url('/user/create/building')}}">
                                                        <i class="fa fa-plus "></i>
                                                        Add new Properity </a>
                                                </li>
                                                @if(\Illuminate\Support\Facades\Auth::user()->admin ==1)
                                                    <li  class="{{ setActive(['user','create','building']) }}">
                                                        <a href="{{url('/adminpanel')}}">
                                                            <i class="fa fa-gears "></i>
                                                            Admin Panel </a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out "></i>
                                                        {{ __('Logout') }}
                                                    </a>
                                                </li>
                                            </ul>
                                            {{--add items to USer menue--}}





                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                    </li>


                                    @endguest

                        </ul>

                        </div>

                </nav>
            </div>

        </div>
        <div class="clearfix"></div>


        @yield('content')

        <div class="clearfix"><br></div>
        <div class="footer">
            <div class="clearfix"><br></div>
            <div class="footer_bottom">
                <div class="follow-us">
                    <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a>
                    <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
                    <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a>
                </div>
                <div class="copy">
                    <p>{{getSetting('footer')}} <a href="https://www.facebook.com/ahmedelsaka000" rel="nofollow">Ahmed Elsaka</a> &copy; {{ date('Y') }} Elsaka. Design by<a href="https://www.facebook.com/ahmedelsaka000" rel="nofollow">  Ibrahim</a> </p>
                </div>
            </div>
        </div>
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('website/js/responsive-nav.js') !!}
        {!! Html::script('cus/sweetalert.min.js') !!}
        @include('/admin/layouts/f_message')

    @yield('footer')


</body>


</html>
