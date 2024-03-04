
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <!--  <div class="row mb-2"> -->
            <div class="col-sm-12">
            <h1 class="m-0 text-dark" align="center">User List</h1>
                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form method="POST" action="{{ url('addCategories') }}"  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="categoryName" class="col-md-4 col-form-label text-md-end">{{ __('Category ') }}</label>

                                    <div class="col-md-6">
                                        <input id="categoryName" type="text" class="form-control @error('email') is-invalid @enderror" name="categoryName"  required >
                                    </div>
                                </div>
                              
                                <div class="row mb-3">
                                    <label for="categoryImage" class="col-md-4 col-form-label text-md-end">{{ __('Category Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="categoryImage" type="file" class="form-control" name="categoryImage" required>
                                    </div>
                                </div>

                        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                                $('.ckeditor').ckeditor();
                                });
                            
    </script>


@endsection