@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                  <h1>
                    Demo
                  </h1>
                  <form method="POST" action="{{url('submitData')}}" enctype="multipart/form-data">
                    @csrf
                  <input type="file" name="file">
                  <button type="submit">Submit</button>
                  </form>
                </div>
          </div>
      </div>
  </div>
</div> 

@endsection