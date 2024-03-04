@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('save-product')}}"  enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <select name="category" id="category" class="form-control" onchange="fun(this.value)">
                                <option value="">--Select  Category--</option>
                                @foreach($categorydata as $cat)                                             
                                    <option value="{{$cat->id}}" >{{$cat->categoryName}}</option>                                            
                                @endforeach    
                            </select>                                    
                        </div>
                                

                        <div class="row mb-3">
                                <select name="sub_category" id="sub_category" class="form-control" >
                                    <option value="">--Select  Sub Catagory--</option>
                                </select>                                    
                        </div>


                        <div class="row mb-3">
                            <label for="productName" class="col-md-4 col-form-label text-md-end">{{ __(' Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="productName" type="text" class="form-control @error('email') is-invalid @enderror" name="productName"  required >
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="shortDescription" class="col-md-4 col-form-label text-md-end">{{ __(' Short Description') }}</label>

                            <div class="col-md-6">
                            <textarea class="form-control ckeditor" id="shortDescription" name="shortDescription" placeholder="Enter Text..." required></textarea>
                                <!-- <textarea id="shortDescription" type="textarea" class="form-control @error('email') is-invalid @enderror" name="shortDescription"  required > -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="longDescription" class="col-md-4 col-form-label text-md-end">{{ __(' Long Description') }}</label>

                            <div class="col-md-6">
                            <textarea class="form-control ckeditor" id="longDescription" name="longDescription" placeholder="Enter Text..." required ></textarea>
                                <!-- <textarea id="shortDescription" type="textarea" class="form-control @error('email') is-invalid @enderror" name="shortDescription"  required > -->
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="productVariety" class="col-md-4 col-form-label text-md-end">{{ __(' Product Variety') }}</label>

                            <div class="col-md-6">
                                <input id="productVariety" type="text" class="form-control @error('email') is-invalid @enderror" name="productVariety"  required >
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="productQuantity" class="col-md-4 col-form-label text-md-end">{{ __(' Product Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="productQuantity" type="text" class="form-control @error('email') is-invalid @enderror" name="productQuantity"  required >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productPrice" class="col-md-4 col-form-label text-md-end">{{ __(' Product Price ') }}</label>

                            <div class="col-md-6">
                                <input id="productPrice" type="text" class="form-control @error('email') is-invalid @enderror" name="productPrice"  required >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productImage" class="col-md-4 col-form-label text-md-end">{{ __('Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="productImage" type="file" class="form-control" name="productImage" required>
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="{{ asset('javascript/javascriptaja.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                                $('.ckeditor').ckeditor();
                                });
                            
    </script>


@endsection