@extends('layouts.app')

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="float: right;" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    
        
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin  Drashboard</a>
            </div>
          </div>
    
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                   View users
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/userlist') }}" class="nav-link active">
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p>User List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                   Product's
                    <i class="right fas fa-angle-left "></i>
                  </p>
                </a>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/addCategories') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p>Add Categories</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/addsubCategories') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p>Add Sub Categories</p>
                    </a>
                  </li>
                </ul>
    
    
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/addProduct') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p>Add Product's</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/viewProduct') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> View Product's</p>
                    </a>
                  </li>
                </ul>
    
               
    
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/pagenation') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> View Product's</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/formdata') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> Form Data with request</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/formdataparsely') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> Form Data with parsely</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('/datatable') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> DataTable</p>
                    </a>
                  </li>
                </ul>
    
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('view_calender') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> Calender</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('messages') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p> Messages</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a href="{{ url('Showwhether') }}" class="nav-link active" >
                      <!-- <i class="far fa-circle nav-icon"></i> -->
                      <p>whether</p>
                    </a>
                  </li>
                </ul>
    
              </li>          
            </ul>
          </nav>
        </div>
    </aside>
    
@section('content')
<div class="content-wrapper">
    <div class="col-md-12">
    <livewire:user-table />
    </div>
</div>
@endsection
