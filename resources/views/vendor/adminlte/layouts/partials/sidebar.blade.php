<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>manage welcome</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/create') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/indeks') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>manage pengetahuan</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/createP') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/pengetahuan') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>manage banner</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/createB') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/banner') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>manage project pemetaan</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/createProject') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/project') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>manage daerah</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/createD') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/daerah') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>our project</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/createOP') }}"><i class='fa fa-edit'></i> Create</a></li>
                    <li><a href="{{ url('/ourPro') }}"><i class='fa fa-home'></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/report1') }}"><i class='fa fa-edit'></i> report1</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>Manage users & roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/users') }}"><i class='fa fa-edit'></i> manage users</a></li>
                    <li><a href="{{ url('/roles') }}"><i class='fa fa-home'></i> manage role</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
