@extends('layouts.app')
@section('title', 'Dashboard')
@section('description', 'Pagina principal')
@section('font', 'home')
@section('content')
	<div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>{{$usersCount}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-wrench fa-3x"></i>
            <div class="info">
              <h4>Trabajadores</h4>
              <p><b>{{$employeesCount}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-bell fa-3x"></i>
            <div class="info">
              <h4>Notificaciones</h4>
              <p><b>{{$notificationsCount}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-list fa-3x"></i>
            <div class="info">
              <h4>Tareas</h4>
              <p><b>{{$tasks}}</b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
              <h4>Ordenes</h4>
              <p><b>{{$orders}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
              <h4>Ordenes Cancel</h4>
              <p><b>{{$ordersCanceled}}</b></p>
            </div>
          </div>
        </div>
      </div>

@endsection