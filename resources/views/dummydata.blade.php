
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
                    <h1 class="m-0 text-dark" align="center">User Information</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 table-responsive">
                            <div id='loader' style='display: none;'>
                        <img src="images/loadimage.gif" width='132px' height='132px'>
                        </div>
                                <table class="table table-bordered user_datatable" id="Tableee">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email address</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>   
                                </table> 
                            </div>
                        </div>    
                    </div>    
                </div> 
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
  $(function () {
    var table = $('#Tableee').DataTable({
        destroy: true,
        retrieve: true,
        paging: false, 
        processing: true,
        serverSide: true,
        ajax: "{{ url('datatable') }}",
        beforeSend: function(){
                /* Show image container */
                $("#loader").show();
              },
        columns: [     
            
            {data: 'Firstname', name: 'Firstname'},
            {data: 'Lastname', name: 'Lastname'},
            {data: 'email', name: 'email'},
            {data: 'phonenumber', name: 'phonenumber'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endsection