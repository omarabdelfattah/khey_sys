  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="height: auto;">





                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">


                    <li class="treeview">
                        <a href="#">
                            <i class="fa  fa-list"></i>
                            <span>المساجد</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ Route('mosques') }}"><i class="fa fa-circle-o"></i> قائمة المساجد</a></li>
                            <li><a href="{{ Route('add_mosque') }}"><i class="fa fa-circle-o"></i> إضافة مسجد</a></li>
                        </ul>
                    </li>

    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th" aria-hidden="true"></i>
                            <span>الموارد</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ Route('resources') }}"><i class="fa fa-circle-o"></i> قائمة الموارد</a></li>
                            <li><a href="{{ Route('add_resource') }}"><i class="fa fa-circle-o"></i> إضافة مورد</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>الطلبات</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ Route('orders') }}"><i class="fa fa-circle-o"></i> قائمة الطلبات</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-briefcase"></i>
                            <span>مجموعات المشرفين</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ Route('admin_groups') }}"><i class="fa fa-circle-o"></i> قائمة المجموعات</a></li>
                            <li><a href="{{ Route('add_admin_groups') }}"><i class="fa fa-circle-o"></i> إضافة مجموعة</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>المستخدمين</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ Route('users') }}"><i class="fa fa-circle-o"></i> قائمة المستخدمين</a></li>
                            <li><a href="{{ Route('add_User') }}"><i class="fa fa-circle-o"></i> إضافة مستخدم</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
