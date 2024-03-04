
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
                        <div class="card-body">
                            <table align="center"  cellspacing="5" class="table table-bordered table-hover table-striped"  id="table_data">
                                <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Short Desctiption</th>
                                        <th>Long Desctiption</th>
                                        <th>Product Variety</th>
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach($data as $pro)
                                    
                                    <tr>
                                        <td>{{$pro->id}}</td>
                                        <td>{{$pro->productName}}</td>
                                        <td>{{$pro->shortDescription}}</td>
                                        <td>{{$pro->longDescription}}</td>
                                        <td>{{$pro->productVariety}}</td>
                                        <td>{{$pro->productQuantity}}</td>
                                        <td>{{$pro->productPrice}}</td>
                                        
                                        
                                        <td> <img src="{!! asset($pro->productImage)!!}" width="70" height="70"></td>
                                       
                                        <td><a class="text-danger btn btn-outline-info"  href={{"/viewProduct/".$pro['id']}}>Delete Product</a><br>
                                        <a class="text-danger btn btn-outline-secondary" href={{"/editProduct/".$pro['id']}}>Edit Product</a>
                                    </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>          
                            </table> 
                            {!! $data->links() !!}

                        </div>
                    </div>    
                </div>    
            </div> 
        </div>
    </div>
</div>


@endsection

