<div class="col col-md-3">
@if(\Illuminate\Support\Facades\Auth::user())

    <div class="profile-sidebar" style="color:#777">
        <!-- SIDEBAR USER TITLE -->
        <h2 style="margin-left: 10px">Member Options</h2>
        <div class="profile-usermenu">
            <ul class="nav">
                <li  class="{{ setActive(['user','editinfo']) }}">
                    <a href="{{url('/user/editinfo')}}">
                        <i class="fa fa-edit"></i>
                        Edit Personal Info
                    </a>
                </li>
                <li  class="{{ setActive(['user','buldingShow']) }}">
                    <a href="{{url('/user/buldingShow')}}">
                        <i class="fa fa-check"></i>
                        Active Buildings
                        <label class="label label-default pull-right">{{buForUserCount(Auth::user()->id,1)}}</label>
                    </a>
                </li>
                <li  class="{{ setActive(['user','buldingShowWait']) }}">
                    <a href="{{url('/user/buldingShowWait')}}">
                        <i class="fa fa-clock-o"></i>
                        Active Waiting Buildings
                        <label class=" label label-info pull-right">{{buForUserCount(Auth::user()->id,0)}}</label>
                    </a>
                </li>
                <li  class="{{ setActive(['user','create','building']) }}">
                    <a href="{{url('/user/create/building')}}">
                        <i class="fa fa-plus "></i>
                        Add new Properity </a>
                </li>



            </ul>
        </div>
        <!-- END MENU -->
    </div>

    <br>
    @endif
    <div class="profile-sidebar" style="color:#777">
        <!-- SIDEBAR USER TITLE -->
        <h2 style="margin-left: 10px">Property Option</h2>
        <div class="profile-usermenu">
            <ul class="nav">

                <li class="{{ setActive(['ShowAllBuildings']) }}">
                    <a href="{{url('/ShowAllBuildings')}}">
                        <i class="fa fa-building"></i>
                        All Properties
                    </a>
                </li>
                <li class="{{ setActive(['ForRent']) }}">
                    <a href="{{url('/ForRent')}}">
                        <i class="fa fa-calendar"></i>
                        For Rent </a>
                </li>
                <li class="{{ setActive(['ForBuy']) }}">
                    <a href="{{url('/ForBuy')}}">
                        <i class="fa fa-building-o"></i>
                        For Sale </a>
                </li>
                <li class="{{ setActive(['type','0']) }}">
                    <a href="{{url('/type/0')}}">
                        <i class="fa fa-home"></i>
                        For Flat</a>
                </li>
                <li class="{{ setActive(['type','1']) }}">
                    <a href="{{url('/type/1')}}">
                        <i class="fa fa-institution"></i>
                        For Villa</a>
                </li>
                <li class="{{ setActive(['type','2']) }}">
                    <a href="{{url('/type/2')}}">
                        <i class="fa fa-area-chart"></i>
                        For Chalet </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar" style="color:#777">
        <!-- SIDEBAR USER TITLE -->
        <h2 style="margin-left: 10px">Advanced Search </h2>
        <div class="profile-usermenu" style="padding-right: 10px; padding-left: 10px">
            {!! Form::open(['url' =>'/search', 'method'=>'get']) !!}
            <ul class="nav" style="width: 100% ">
                <li style="margin-top: 10px">
                    {!! Form::text("bu_price_from", null ,['class'=>'form-control','placeholder'=>'Price from']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::text("bu_price_to", null ,['class'=>'form-control','placeholder'=>'Price to']) !!}
                </li >
                <li style="margin-top: 10px" >
                    {!! Form::select("rooms",roomnumber(), null,['class'=>'form-control js-example-basic-single']) !!}
                </li>
                <li style=" margin-top: 10px  " >
                    {!! Form::select("bu_place",bu_place(), null,['class'=>'js-example-basic-single form-control']) !!}
                </li>
                <li style="margin-top: 10px ">
                    {!! Form::select("bu_type",bu_type(), null ,['class'=>'form-control','placeholder'=>'Building type']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::select("bu_rent",bu_rent(), null ,['class'=>'form-control','placeholder'=>'Operation type']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'Area']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::submit("Search",['class'=>'btn btn-success']) !!}
                </li>

            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>




</div>
