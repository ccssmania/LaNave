<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar responsive-avatar" src="{{url('/images/user_'.Auth::user()->id.'.jpg')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
      <p class="app-sidebar__user-designation"></p>
    </div>
  </div>
  <ul class="app-menu">
    <li>
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\AdminController" ? 'active' : ''}}" href="{{url('/dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
    </li>
    <li class="treeview">
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\ProfileController" ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Perfil</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{url('/profile/0')}}"><i class="icon fa fa-circle-o"></i> Perfil </a></li>
        <li><a class="treeview-item" href="{{url('/profile/1')}}"><i class="icon fa fa-cog"></i> Configuración</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\ProductController" ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Productos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{url('/products')}}" class="treeview-item"><i class="icon fa fa-circle-o"></i> Products </a></li>
        <li><a href="{{url('/product_category')}}" class="treeview-item"><i class="icon fa fa-circle-o"></i> Categorias del producto </a></li>
      </ul>
    </li>
    <li>
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\InsuranceCompanyController" ? 'active' : ''}}" href="{{url('/tasks')}}">
        <i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Tareas</span></a></li>
    <li>
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\NotificationController" ? 'active' : ''}}" href="{{url('/notifications')}}"><i class="app-menu__icon fa fa-bell {{$unread > 0 ? 'notification-icon' :''}} "></i><span class="app-menu__label">Notificaciones</span></a>
    </li>
    <li>
      <a class="app-menu__item {{get_class(Route::getCurrentRoute()->getController()) == "App\Http\Controllers\OrderController" ? 'active' : ''}}" href="{{url('/orders')}}"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Ordenes</span></a>
    </li>
  </ul>
</aside>