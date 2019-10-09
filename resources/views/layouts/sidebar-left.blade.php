<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ session()->get('admin.username') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">LAOYOUT ADMIN</li>
            <li>
                <a href="{{ url('/admin/category') }}">
                    <i class="fa fa-code"></i> <span>Quản lý danh mục</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/news') }}">
                    <i class="fa fa-newspaper-o"></i> <span>Quản lý tin tức</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
