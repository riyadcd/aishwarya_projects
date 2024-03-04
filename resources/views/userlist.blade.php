


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
                            <table align="center"  cellspacing="5" class="table table-bordered table-hover table-striped" id="Table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach($data as $i)
                                    
                                    <tr>
                                        <td>{{$i->id}}</td>
                                        <td>{{$i->name}}</td>
                                        <td>{{$i->email}}</td>
                                        <td> <img src="{!! asset($i->image)!!}" width="50" height="40"></td>
                                       
                                        <td><a class="text-danger" href={{"/userlist/".$i['id']}}>Delete</a> </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>          
                            </table> 
                        </div>
                    </div>    
                </div>    
            </div> 
        </div>
    </div>
</div>


@endsection

</body>
</html>