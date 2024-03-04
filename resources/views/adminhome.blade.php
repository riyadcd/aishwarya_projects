
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <!--  <div class="row mb-2"> -->
            <div class="col-sm-12">
               <h1 class="m-0 text-dark" align="center">Admin Dashboard</h1>
                 <div class="container-fluid">
                    <div class="card card-primary card-outline">
                      <div class="row">
                        <div class="col-sm">
                        <br>Total Users<br>
                        <pre style="color:blue;font-size:20px;padding-left:20px;"><a href="{{ url('/userlist') }}" >User's</a>    <strong style="color:black;font-size:15px;">100%</strong></pre>
                        </div>
                        <div class="col-sm">
                          <br>Total Products<br>
                          <pre style="color:blue;font-size:20px;padding-left:5px;"><a href="{{ url('/viewProduct') }}" >Product's</a>    <strong style="color:black;font-size:15px;">100%</strong></pre>
                        </div>
                        <div class="col-sm">
                          <br>Total Sale<br>
                          <pre style="color:blue;font-size:20px;padding-left:5px;">$5,219.00     <strong style="color:black;font-size:15px;">100%</strong></pre>
                        </div>
                     </div>
                   </div>
                 </div>
               </div> 
            </div>
       </div>
   
       <div class="content-header">
            <div class="container-fluid">
               <div class="card card-primary card-outline">
                  <div class="row">
                      <div class="col">
                          <p style="font-size:20px;padding-left:15px;">Top Selling products</p>
                          <br>
                          <img style="width:40px;height:40px;margin-left:15px;" src="/images/1649236981-profile.jpg">
                          Product name
                          <br>
                          <img style="width:40px;height:40px;margin-left:15px;" src="/images/1649238006-profile.jpg">
                          Product name
                          </div>
                          <div class="col">
                          <p style="font-size:20px;padding-left:15px;">Customer With Most Sales</p> 
                          <br>
                          <img style="width:40px;height:40px;margin-left:15px;margin-bottom:15px;" src="/images/1649236981-profile.jpg">
                          Name
                          <br>
                          <img style="width:40px;height:40px;margin-left:15px;margin-bottom:15px;" src="/images/1649656867-profile.jpeg">
                          Name
                       </div>
                   </div>
                </div>
             </div>
          </div>
      </div>


@endsection
