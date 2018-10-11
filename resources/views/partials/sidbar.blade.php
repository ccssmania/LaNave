        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        
                         <img src=". . ." onerror="this.src='{{url('images/small/perfil.png')}}';" class="img-circle" alt="User Image" />
                        
                    </div>
                    <div class="pull-left info">
                        <p>Nombre</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree" >
                    <li class="header">@lang('project.menu')</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@home" ? 'active' : ''}}">
                        <a href="{{url('/')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li class="{{Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\PerfilController@index" ? 'active' : ''}}">
                        <a href="{{url('/perfil')}}"><i class="fa fa-user"></i><span>Perfil</span></a></li>
                    <!--<li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>-->
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>