
@extends('layouts.app')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<h1>
Calendar
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Calendar</li>
</ol>
</section>

<section class="content">





<div class="col-md-9">
<div class="box box-primary">
<div class="box-body no-padding">

<div id="calendar"></div>
</div>
<div class="modal" style='display: none;' id="myModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="insertModalLabel">Please Enter</h5>
                            <button type="button" onclick="closea()" class="close" data-dismiss="modal"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                          <form id="form" name="form" class="edit_database_operation" onsubmit="getformdata();" >
                            @csrf
                            
                            <input type="hidden" name="start" value="" id="start">
                            <input type="hidden" name="end" value="" id="end">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                              <h5>Event Title</h5>
                                <input type="text" id="eventname" name="eventname" placeholder="Event Title">
                              </div>

                              <div class="form-group col-md-6">
                                  <h5>End Date</h5>
                                <input type="date" id="enddate" name="enddate" placeholder="End">
                              </div>
                            
                              <div class="form-group col-md-6">
                              <h5>Select users </h5>
                              <select  multiple="multiple" name="userlist[]"  id="userlist" class="form-control">
                                            <option value="">--Select User--</option>
                                            @foreach($userdata as $user)                                             
                                             <option value="{{$user->name}}">{{$user->name}}</option>                                            
                                            @endforeach    
                                        </select>                         
                              </div>
                            </div>     
                            
                                              

                            <button type="submit" name="submit"  class="btn btn-primary text-left">Submit</button>
                          </form>
                        </div>
                        
                    </div>
                </div>
              </div>
</div>

<div class="modal" style='display: none;' id="updateModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="insertModalLabel">Update Event</h5>
                            <button type="button" onclick="closeupdate()" class="close" data-dismiss="modal"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                          <form id="upform" name="upform" class="edit_database_operation"  >
                            @csrf
                            
                            <input type="hidden" name="start" value="" id="start">
                            <input type="hidden" name="end" value="" id="end">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <input type="text" id="eventname" name="eventname" placeholder="Event Title">
                              </div>
                            
                              <div class="form-group col-md-6">
                              <select name="userlist"  id="userlist" class="form-control">
                                            <option value="">--Select User--</option>
                                            @foreach($userdata as $user)                                             
                                             <option value="{{$user->name}}">{{$user->name}}</option>                                            
                                            @endforeach    
                                        </select>                         
                              </div>
                            </div>   
                            <button type="submit" name="submit"  class="btn btn-primary text-left">Update</button>
                            <button type="submit" name="Delete" id="delete"  class="btn btn-primary text-left">Delete</button>
                                
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

</section>

</div>

@endsection

@section('script')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    
<script type="text/javascript">
    
function closea()
        {
            $('#myModal').modal('hide'); 
            return true;
        }
function closeupdate()
{
    {
            $('#updateModal').modal('hide'); 
            return true;
    }
}
        
function getformdata()
{
     var formData = new FormData(document.querySelector('#form'))
     
     return true;
}
function getupdateformdata()
{
     var formeData = new FormData(document.querySelector('#upform'))
     
     return true;
}

 function showinput(){
    var x = document.getElementById("view");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
      return true;  
    }

    function showdel()
    {
    var x = document.getElementById("viewdelete");
        if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
        return true;
    }
    
                   
            

   
        $(document).ready(function() {

            // pass _token in all ajax
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // initialize calendar in all events
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "{{ url('view_calender') }}",
                displayEventTime: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                            event.allDay = true;
                    } else {
                            event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    $('#myModal').modal('show');
                    var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
                    
                   
                        $('#start').val(start);
                      
                    
                    $("#form").submit(function(e){
                        //e.preventDefault();
                        $('#myModal').modal('hide');
                     
                
                    var end = $(this).find("#enddate").val();
                    
                    var event = $(this).find("#eventname").val();   
                    var userlist = $(this).find("#userlist").val();   

                   
                    $.ajax({
                            url: "{{ url('/create_Events') }}",
                            data: {
                                title: event,
                                start: start,
                                end: end,
                                users: userlist
                            },
                            type: 'post',
                            success: function (data) {
                               iziToast.success({
                                    position: 'topRight',
                                    message: alert('Event created successfully.'),
                                });

                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    users : users,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    });
    
                },
                eventDrop: function (event, delta) {
                    
                    var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
                    
                    $.ajax({
                        url: "{{ url('/edit-event') }}",
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                        },
                        type: "post",
                        success: function (response) {
                            iziToast.success({
                                position: 'topRight',
                                message: 'Event updated successfully.',
                            });
                        }
                    });
                    
                
                },
                eventClick: function (event) {

                    $('#updateModal').modal('show');
                    var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
                        $('#start').val(start);
                        $('#end').val(end);

                        

                    $("#upform").submit(function(e){
                        $('#updateModal').modal('hide');
                    e.preventDefault();
                
                    
                    var eventname = $(this).find("#eventname").val();   
                    var userlist = $(this).find("#userlist").val();   

                    console.log(userlist);
                    $.ajax({
                        url: "{{ url('/update-event') }}",
                        data: {
                            title: eventname,
                            idd: event.id,
                            users : userlist,
                        },
                        type: "post",
                        success: function (response) {
                            iziToast.success({
                                position: 'topRight',
                                message: 'Event updated successfully.',
                            });
                        }
                    });
                    
                        });


                    $('#delete').click(function(e)
                    {
                        $('#updateModal').modal('hide');
                        e.preventDefault();
                        var eventDelete = confirm('Are you sure to remove event?');
                        if (eventDelete) {
                        $.ajax({
                            type: "post",
                            url: "{{ url('destroy') }}",
                            data: {
                                id: event.id,
                                _method: 'delete',
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                iziToast.success({
                                    position: 'topRight',
                                    message: 'Event removed successfully.',
                                });
                            }
                        });
                    }
                });
                       
                   
            }    
              
                
        });
    });
        
    </script>
@endsection