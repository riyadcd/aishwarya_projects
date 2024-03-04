
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.css"/>
<div id='section'>
    <label> Start :</label>
    <input type="text" name="start" id="start" style=" width: 107px !important;padding: 12px 20px !important;margin: 12px 0 !important;border: 1px solid #ccc !important;border-radius: 5px !important;" required/>
    
    <label>End : </label>
    <input type="text" name="end" id="end" style=" width: 107px !important;padding: 12px 20px !important;margin: 12px 0 !important;border: 1px solid #ccc !important;border-radius: 5px !important;" required/>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> --}}
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script> --}} 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.js" integrity="sha512-17lKwKi7MLRVxOz4ttjSYkwp92tbZNNr2iFyEd22hSZpQr/OnPopmgH8ayN4kkSqHlqMmefHmQU43sjeJDWGKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js" integrity="sha512-WHnaxy6FscGMvbIB5EgmjW71v5BCQyz5kQTcZ5iMxann3HczLlBHH5PQk7030XmmK5siar66qzY+EJxKHZTPEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script  type="text/javascript">
    
  $(document).ready(function(){
  $('#start').timepicker({
      timeFormat : 'H:m'
  });
  $('#end').timepicker({
    timeFormat : 'H:m'
  });

  function timeToInt(time) {
    var arr = time.match(/^(0?[1-9]|1[012]):([0-5][0-9])([APap][mM])$/);
    if (arr == null) return -1;

    if (arr[3].toUpperCase() == 'PM') {
      arr[1] = parseInt(arr[1]) + 12;
    }
    return parseInt(arr[1]*100) + parseInt(arr[2]);
  }

  function checkDates() {
    if (($('#start').val() == '') || ($('#end').val() == '')) return;

    var start = timeToInt($('#start').val());
    var end = timeToInt($('#end').val());

    if ((start == -1) || (end == -1)) {
      alert("Start or end time it's not valid");
    }

    if (start > end) {
      alert('Start time should be lower than end time');
    }

  }

  $('#start').on('change', checkDates);
  $('#end').on('change', checkDates);
});

    var name  = document.getElementById("name").value();
    console.log(name);
    
</script>
@endsection

