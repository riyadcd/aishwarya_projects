  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    -->
 <script>
    $(document).ready( function (){
    $('#Table').DataTable();
    $('#simpleTable').DataTable();
    });
</script>
<script>
$(document).ready(function(){

$(document).on('click', '.pagination a', function(event){
 event.preventDefault(); 
 var page = $(this).attr('href').split('page=')[1];
 fetch_data(page);
});
function fetch_data(page)
{
  
  $.ajax({
   url:"/viewProductpagenation_data?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
</script> 
  <script type="text/javascript">
        
        $(document).ready(function(){
          
            $(document).on('click','.pagination a',function(event){
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var url = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });
        function getData(page) {
            // body...
            $.ajax({
                url : '?page=' + page,
                type : 'get',
                datatype : 'html',
                beforeSend: function(){
                /* Show image container */
                $("#loader").show();
              },
            }).done(function(data){
              //$("#loader").hide();

                $('#table_data').empty().html(data);
                //location.hash = page;
            }).fail(function(jqXHR,ajaxOptions,thrownError){
                alert('No response from server');
            });
        }
    </script> 
<!-- <script src="http://parsleyjs.org/dist/parsley.js"></script> -->
<!-- <script>
$(document).ready(function(){

 $('#validate_form').parsley();

 $('#validate_form').on('submit', function(event){
  event.preventDefault();

  if($('#validate_form').parsley().isValid())
  {
   $.ajax({
    url: '{{ url("parsely") }}',
    method:"POST",
    data:$(this).serialize(),
    dataType:"json",
    // beforeSend:function()
    // {
    //  $('#submit').attr('disabled', 'disabled');
    //  $('#submit').val('Submitting...');
    // },
    success:function(data)
    {
     $('#validate_form')[0].reset();
     $('#validate_form').parsley().reset();
     $('#submit').attr('disabled', false);
     $('#submit').val('Submit');
     alert(data.success);
    }
   });
  }
 });

});
</script>  -->

