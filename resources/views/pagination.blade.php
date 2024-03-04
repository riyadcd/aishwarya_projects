
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <!--  <div class="row mb-2"> -->
            <div class="col-sm-12">
            <h1 class="m-0 text-dark" align="center">Product list</h1>
                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-body" id="table_data">
                            
                        <div id='loader' style='display: none;'>
                        <img src="images/loadimage.gif" width='132px' height='132px'>
                        </div>
                        <!-- Image loader -->

                        <div class='response'></div>
                        @include('viewtable')


                        <!-- Image loader -->
                       


                        </div>
                    </div>    
                </div>    
            </div> 
        </div>
    </div>
</div>


@endsection

