
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <!--  <div class="row mb-2"> -->
            <div class="col-sm-12">
            <h1 class="m-0 text-dark" align="center">Product list<button class="text-danger btn btn-outline-info ml-4" align-items="flex-start" onclick="addRow()"> + Add</a></h1>
                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <table align="center"  cellspacing="5" class="table table-bordered table-hover table-striped" id="Tables">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Short Desctiption</th>
                                        <th>Long Desctiption</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <tr>
                                        <td><input type="text" value="" name="nameTxt"></td>
                                        <td><input type="text" value="" name="short"></td>
                                        <td><input type="text" value="" name="long"></td>
                                        
                                    </tr>
                                    
                                   
                                </tbody>          
                            </table> 
                            

                        </div>
                    </div>    
                </div>    
            </div> 
        </div>
    </div>
</div>
<script>
    function addRow(){
        var table = document.getElementById('Tables');  
        var rowCount = table.rows.length;  
        console.log(rowCount);
        var row = table.insertRow(rowCount);  
        //Column 1  
        var cell1 = row.insertCell(0);  
        var element1 = document.createElement("input");  
       
        cell1.appendChild(element1);  
        //Column 2  
        var cell2 = row.insertCell(1);  
        var element2 = document.createElement("input");  
        element2.type = "text";  
        cell2.appendChild(element2);  
        //Column 3  
        var cell3 = row.insertCell(2);  
        var element3 = document.createElement("input");  
        element3.type = "text";  
        cell3.appendChild(element3);  
    }
    </script>
@endsection

