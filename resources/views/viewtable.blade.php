<table align="center"  cellspacing="5" class="table table-bordered table-hover table-striped"  >
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
                            {!! $data->render() !!}