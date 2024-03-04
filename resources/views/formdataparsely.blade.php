
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <!--  <div class="row mb-2"> -->
            <div class="col-sm-12">
            <h1 class="m-0 text-dark" align="center">Form</h1>
                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form id="validate_form" action="{{url('formdata')}}" method="post">

                            @csrf
                           
                        <div class="row mb-3">
                            <label for="productName" class="col-md-4 col-form-label text-md-end">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-required="true">
                                @if($errors->has('name'))
                                <div class="alert ">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __(' Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email"  data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required="true">
                                @if($errors->has('email'))
                                <div class="alert ">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __(' Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  data-parsley-length="[8,16]" data-parsley-trigger="keyup" data-parsley-required="true">
                                @if($errors->has('password'))
                                <div class="alert ">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirmpassword" class="col-md-4 col-form-label text-md-end">{{ __(' Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirmpassword" type="password" class="form-control" name="confirmpassword"  data-parsley-equalto="#password" data-parsley-trigger="keyup" data-parsley-required="true">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-end">{{ __(' Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" data-parsley-length="[8,16]" data-parsley-required="true">
                                @if($errors->has('phonenumber'))
                                <div class="alert alert-danger">{{ $errors->first('phonenumber') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"> 
                            </div>
                        </div>

                        </form>
                    </div>
                </div>    
            </div>    
        </div> 
    </div>
</div>
</div>

@endsection

