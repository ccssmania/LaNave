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
                <li class="header">Menú</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="{{Route::getCurrentRoute()->getController() == "UserController" ? 'active' : ''}}">
                    <a href="{{url('/')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </li>
                <li class="{{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\ProductController" ? 'active' : ''}}">

                    <a href="{{url('/products')}}"><i class="fa fa-car"></i><span>Productos</span></a>
                </li>
                <li class="{{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\PerfilController" ? 'active' : ''}}">
                    <a href="{{url('/perfil')}}"><i class="fa fa-user"></i><span>Perfil</span></a>
                </li>
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