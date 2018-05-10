@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
                <i class="fa fa-paper-plane"></i> ONE
                <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                        <h3>{{ $bCountActive }}</h3>

                                        <p>Active Properties</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-home"></i>
                                </div>
                                <a href="{{ url('/adminpanel/bu') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                                <div class="inner">
                                        <h3>{{ $waitingActive }}</h3>

                                        <p>Waiting Active Properties</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-clock"></i>
                                </div>
                                <a href="{{ url('/adminpanel/bu') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                                <div class="inner">
                                        <h3>{{ $usersCount }}</h3>

                                        <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ url('/users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                                <div class="inner">
                                        <h3>{{ $contactUsCount }}</h3>

                                        <p>Message</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-android-chat"></i>
                                </div>
                                <a href="{{ url('/adminpanel/contact') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
                <div class="col-md-12">
                        <div class="box">
                                <div class="box-header with-border">
                                        <h3 class="box-title">Monthly Recap Report</h3>

                                        <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <div class="btn-group">
                                                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-wrench"></i></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                </div>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <div class="row">
                                                <div class="col-md-8">
                                                        <p class="text-center">
                                                                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                                        </p>

                                                        <div class="chart">
                                                                <!-- Sales Chart Canvas -->
                                                                <canvas id="salesChart" style="height: 180px;"></canvas>
                                                        </div>
                                                        <!-- /.chart-responsive -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-4">
                                                        <p class="text-center">
                                                                <strong>Goal Completion</strong>
                                                        </p>

                                                        <div class="progress-group">
                                                                <span class="progress-text">Add Products to Cart</span>
                                                                <span class="progress-number"><b>160</b>/200</span>

                                                                <div class="progress sm">
                                                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                                                </div>
                                                        </div>
                                                        <!-- /.progress-group -->
                                                        <div class="progress-group">
                                                                <span class="progress-text">Complete Purchase</span>
                                                                <span class="progress-number"><b>310</b>/400</span>

                                                                <div class="progress sm">
                                                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                                                </div>
                                                        </div>
                                                        <!-- /.progress-group -->
                                                        <div class="progress-group">
                                                                <span class="progress-text">Visit Premium Page</span>
                                                                <span class="progress-number"><b>480</b>/800</span>

                                                                <div class="progress sm">
                                                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                                                </div>
                                                        </div>
                                                        <!-- /.progress-group -->
                                                        <div class="progress-group">
                                                                <span class="progress-text">Send Inquiries</span>
                                                                <span class="progress-number"><b>250</b>/500</span>

                                                                <div class="progress sm">
                                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                                                </div>
                                                        </div>
                                                        <!-- /.progress-group -->
                                                </div>
                                                <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                </div>
                                <!-- ./box-body -->

                        </div>
                        <!-- /.box -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                        <!-- MAP & BOX PANE -->
                        <div class="box box-success">
                                <div class="box-header with-border">
                                        <h3 class="box-title">Visitors Report</h3>

                                        <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                        <div class="row">
                                                <div class="col-md-9 col-sm-8">
                                                        <div class="pad">
                                                                <!-- Map will be created here -->
                                                                <div id="world-map-markers" style="height: 325px;"></div>
                                                        </div>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-3 col-sm-4">
                                                        <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                                                <div class="description-block margin-bottom">
                                                                        <div class="sparkbar pad" data-color="#fff"></div>
                                                                        <h5 class="description-header">{{ $bCountActive }}</h5>
                                                                        <span class="description-text">Active</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                                <div class="description-block margin-bottom">
                                                                        <div class="sparkbar pad" data-color="#fff"></div>
                                                                        <h5 class="description-header">{{ $waitingActive }}</h5>
                                                                        <span class="description-text">Waiting Activate</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                                <div class="description-block">
                                                                        <div class="sparkbar pad" data-color="#fff"></div>
                                                                        <h5 class="description-header">{{ $waitingActive + $bCountActive }}</h5>
                                                                        <span class="description-text">Total</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                        </div>
                                                </div>
                                                <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                </div>

                                <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="row">

                                <div class="col-md-12">
                                        <!-- USERS LIST -->
                                        <div class="box box-danger">
                                                <div class="box-header with-border">
                                                        <h3 class="box-title">Latest Members</h3>

                                                        <div class="box-tools pull-right">
                                                                <span class="label label-danger">8 New Members</span>
                                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                                                </button>
                                                        </div>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body no-padding">
                                                        <ul class="users-list clearfix">
                                                            @foreach($latestMembers as $member)
                                                                <li>
                                                                        <img src="/admin/dist/img/user1-128x128.jpg" alt="{{ $member->name }}" title="{{ $member->name }}">
                                                                        <a class="users-list-name" href="{{ url('/users/'.$member->id.'/edit') }}">{{ $member->name }}</a>
                                                                        <span class="users-list-date">{{ $member->created_at }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <!-- /.users-list -->
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer text-center">
                                                        <a href="{{ url('/users') }}" class="uppercase">View All Users</a>
                                                </div>
                                                <!-- /.box-footer -->
                                        </div>
                                        <!--/.box -->
                                </div>
                                <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- TABLE: LATEST ORDERS -->
                        <div class="box box-info">
                                <div class="box-header with-border">
                                        <h3 class="box-title">Latest Messages</h3>

                                        <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <div class="table-responsive">
                                                <table class="table no-margin">
                                                        <thead>
                                                        <tr>
                                                                <th style="min-width: 94px;">Message ID</th>
                                                                <th style="min-width: 115px;">Name</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Subject</th>
                                                                <th class="text-center">Message</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($latestMessages as $message)
                                                        <tr>
                                                                <td class="text-center"><a href="{{ url('/adminpanel/contact/'.$message->id.'/edit') }}">{{$message->id}}</a></td>
                                                                <td>{{ $message->contact_name }}</td>
                                                                     <td class="text-center">
                                                                         @if($message->view ==0)
                                                                         <span class="label label-warning ">New Message</span>
                                                                         @else
                                                                             <span class="label label-info">Old Message</span>
                                                                         @endif
                                                                     </td>
                                                                    <td class="text-center">
                                                                    @if($message->contact_type ==1)
                                                                        <span class="label label-success ">{{contact()[$message->contact_type]}}</span>
                                                                    @elseif($message->contact_type ==3)
                                                                    <span class="label label-warning ">{{contact()[$message->contact_type]}}</span>

                                                                    @elseif($message->contact_type ==2)
                                                                    <span class="label label-danger ">{{contact()[$message->contact_type]}}</span>

                                                                    @else
                                                                    <span class="label label-info ">{{contact()[$message->contact_type]}}</span>

                                                                    @endif
                                                                    </td>
                                                                <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $message->contact_message }}</div>
                                                                </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                        <a href="{{ url('adminpanel/contact') }}" class="btn btn-sm btn-info btn-flat pull-left">View All Messages</a>
                                </div>
                                <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->
                        <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-home"></i></span>

                                <div class="info-box-content">
                                        <span class="info-box-text">Flat</span>
                                        <span class="info-box-number">{{ $countFlat }}</span>

                                        <div class="progress">
                                                <div class="progress-bar" style="width: {{($countFlat)/($countFlat + $countVilla + $countChalet) *100}}%"></div>
                                        </div>

                                        <span class="progress-description">{{number_format((float)(($countFlat)/($countFlat + $countVilla + $countChalet)) * 100, 2, '.', '')}}% Of Properties are Flats</span>
                                </div>
                                <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-institution"></i></span>

                                <div class="info-box-content">
                                        <span class="info-box-text">Villa</span>
                                        <span class="info-box-number">{{ $countVilla }}</span>

                                        <div class="progress">
                                                <div class="progress-bar" style="width: {{($countVilla)/($countFlat + $countVilla + $countChalet) *100}}%"></div>
                                        </div>
                                        <span class="progress-description">
                    {{number_format((float)(($countVilla)/($countFlat + $countVilla + $countChalet)) * 100, 2, '.', '')}}% OF Properties are Villa
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                        </div>

                        <!-- /.info-box -->
                        <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-area-chart"></i></span>

                                <div class="info-box-content">
                                        <span class="info-box-text">Chalet</span>
                                        <span class="info-box-number">{{ $countChalet }}</span>

                                        <div class="progress">
                                                <div class="progress-bar" style="width: {{($countChalet)/($countFlat + $countVilla + $countChalet)*100}}%"></div>
                                        </div>
                                        <span class="progress-description">
                    {{number_format((float)(($countChalet)/($countFlat + $countVilla + $countChalet)) * 100, 2, '.', '')}}% OF Properties are Chalet
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion ion-android-done-all"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total</span>
                            <span class="info-box-number">{{ ($countFlat + $countVilla + $countChalet) }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                            Total number of properties
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>

                        <!-- /.box -->

                        <!-- PRODUCT LIST -->
                        <div class="box box-primary">
                                <div class="box-header with-border">
                                        <h3 class="box-title">Recently Added Products</h3>

                                        <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <ul class="products-list product-list-in-box">
                                            @foreach($recentAddBuildings  as $RAB)
                                                <li class="item">
                                                        <div class="product-img">
                                                                <img src="{{ checkIfImageIsExist($RAB->image ,  '/public/website/thumb/', '/website/thumb/')
 }}" alt="Product Image">
                                                        </div>
                                                        <div class="product-info">
                                                                <a href="{{ url('/adminpanel/bu/'.$RAB->id.'/edit') }}" class="product-title">{{ $RAB->bu_name }}
                                                                        <span class="label label-warning pull-right">$.{{ $RAB->bu_price }}</span></a>
                                                                <span class="product-description">{{ $RAB->bu_small_dis }}</span>
                                                        </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                        <a href="{{ url('/adminpanel/bu') }}" class="uppercase">View All Products</a>
                                </div>
                                <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->

</section>
<!-- /.content -->

@endsection()

@section('footer')
    <script type="text/javascript">
        'use strict';

        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart       = new Chart(salesChartCanvas);

        var salesChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label               : 'Electronics',
                    fillColor           : 'rgb(210, 214, 222)',
                    strokeColor         : 'rgb(210, 214, 222)',
                    pointColor          : 'rgb(210, 214, 222)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgb(220,220,220)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label               : 'Digital Goods',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };


        $('#world-map-markers').vectorMap({
                map              : 'world_mill_en',
                normalizeFunction: 'polynomial',
                hoverOpacity     : 0.7,
                hoverColor       : false,
                backgroundColor  : 'transparent',
                regionStyle      : {
                    initial      : {
                        fill            : 'rgba(210, 214, 222, 1)',
                        'fill-opacity'  : 1,
                        stroke          : 'none',
                        'stroke-width'  : 0,
                        'stroke-opacity': 1
                    },
                    hover        : {
                        'fill-opacity': 0.7,
                        cursor        : 'pointer'
                    },
                    selected     : {
                        fill: 'yellow'
                    },
                    selectedHover: {}
                },
                markerStyle      : {
                    initial: {
                        fill  : '#00a65a',
                        stroke: '#111'
                    }
                },
                markers          : [
                    { latLng: [41.90, 12.45], name: 'Vatican City' },
                    { latLng: [43.73, 7.41], name: 'Monaco' },
                    { latLng: [-0.52, 166.93], name: 'Nauru' },
                    { latLng: [-8.51, 179.21], name: 'Tuvalu' },
                    { latLng: [43.93, 12.46], name: 'San Marino' },
                    { latLng: [47.14, 9.52], name: 'Liechtenstein' },
                    { latLng: [7.11, 171.06], name: 'Marshall Islands' },
                    { latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis' },
                    { latLng: [3.2, 73.22], name: 'Maldives' },
                    { latLng: [35.88, 14.5], name: 'Malta' },
                    { latLng: [12.05, -61.75], name: 'Grenada' },
                    { latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines' },
                    { latLng: [13.16, -59.55], name: 'Barbados' },
                    { latLng: [17.11, -61.85], name: 'Antigua and Barbuda' },
                    { latLng: [-4.61, 55.45], name: 'Seychelles' },
                    { latLng: [7.35, 134.46], name: 'Palau' },
                    { latLng: [42.5, 1.51], name: 'Andorra' },
                    { latLng: [14.01, -60.98], name: 'Saint Lucia' },
                    { latLng: [6.91, 158.18], name: 'Federated States of Micronesia' },
                    { latLng: [1.3, 103.8], name: 'Singapore' },
                    { latLng: [1.46, 173.03], name: 'Kiribati' },
                    { latLng: [-21.13, -175.2], name: 'Tonga' },
                    { latLng: [15.3, -61.38], name: 'Dominica' },
                    { latLng: [-20.2, 57.5], name: 'Mauritius' },
                    { latLng: [26.02, 50.55], name: 'Bahrain' },
                        @foreach($mapping as $map)
                    { latLng: [ {{ $map->bu_latitude }}, {{ $map->bu_langtuite }}], name: '{{ $map->bu_name }}' }
                    @endforeach
                ]
            });


    </script>
@endsection()