
<li class=" treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>Site Setting</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{ url('/adminpanel/sitesetting') }}"><i class="fa fa-circle-o"></i> Main settings </a></li>
        <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
    </ul>
</li>

{{--users --}}

<li class=" treeview">
    <a href="{{ url('/users') }}">
        <i class="fa fa-users"></i> <span>Control members</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="/users/create"><i class="fa fa-circle-o"></i> Add member </a></li>
        <li><a href="{{ url('/users') }}"><i class="fa fa-circle-o"></i> All members </a></li>
    </ul>
</li>

{{--  BU --}}
<li class=" treeview">
    <a href="{{ url('/users') }}">
        <i class="fa fa-users"></i> <span>Control Properties</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{ url('adminpanel/bu/create') }}"><i class="fa fa-circle-o"></i> Add Property </a></li>
        <li><a href="{{ url('adminpanel/bu') }}"><i class="fa fa-circle-o"></i> All Properties </a></li>
    </ul>
</li>
{{-- Contact --}}
<li class=" treeview">
    <a href="{{ url('/users') }}">
        <i class="fa fa-users"></i> <span>Site Messages</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('adminpanel/contact') }}"><i class="fa fa-circle-o"></i> Messages  </a></li>
    </ul>
</li>