<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Firebase RealTime Chat</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <h2>Firebase RealTime Chat</h2>
    </header>
<style>

.star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: red;}
</style>
<div class="" style="text-align:center;">
<div id="chat">
    <!-- messages will display here -->
    <ul id="messages"></ul>
    
    <!-- form to send message -->
    <form id="message-form" method="POST">
        @csrf
        <input type="hidden" id="from_id" value="2"/>
        <input type="hidden" id="to_id" value="1"/>
      <input id="messageinput" type="text" />
      <button id="message-btn" type="submit">Send</button>
    </form>
  </div>
</div>
<div class="modal" id="showModal" tabindex="-1" role="dialog" style="display:none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>How would you rate the Health Adviser?</h2>
        <div class="star-rating">
          <span class="fa fa-circle-o" data-rating="1"><p>1</p></span>
          <span class="fa fa-circle-o" data-rating="2"><p>2</p></span>
          <span class="fa fa-circle-o" data-rating="3"><p>3</p></span>
          <span class="fa fa-circle-o" data-rating="4"><p>4</p></span>
          <span class="fa fa-circle-o" data-rating="5"><p>5</p></span>
          <span class="fa fa-circle-o" data-rating="6"><p>6</p></span>
          <span class="fa fa-circle-o" data-rating="7"><p>7</p></span>
          <span class="fa fa-circle-o" data-rating="8"><p>8</p></span>
          <span class="fa fa-circle-o" data-rating="9"><p>9</p></span>
          <span class="fa fa-circle-o" data-rating="10"><p>10</p></span>
          <input type="hidden" name="whatever1" class="rating-value" value="2.56">
        </div>
      </div>
    </div>
     {{-- <div class="row">
      <div class="col-lg-12">
        <div class="">
          <span class="" >1</span>
          <span class="" >2</span>
          <span class="" >3</span>
          <span class="" >4</span>
          <span class="" >5</span>
          <span class="" >6</span>
          <span class="" >7</span>
          <span class="" >8</span>
          <span class="" >9</span>
          <span class="" >10</span>
        </div>
      </div>
    </div> --}}
    {{-- <div class="row">
      <div class="col-lg-12">
        <div class="star-rating">
          <span class="fa fa-star-o" data-rating="1"></span>
          <span class="fa fa-star-o" data-rating="2"></span>
          <span class="fa fa-star-o" data-rating="3"></span>
          <span class="fa fa-star-o" data-rating="4"></span>
          <span class="fa fa-star-o" data-rating="5"></span>
          <input type="hidden" name="whatever3" class="rating-value" value="4.1">
        </div>
      </div>
    </div> --}} 
  </div>
<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-firestore.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    {{-- <script src="https://healthadvisory-954a5-default-rtdb.firebaseio.com/"></script> --}}
    <script  type="text/javascript">
    var arr = [];
    const firebaseConfig = {
        apiKey: "AIzaSyDV6PVO_Mr8mA9xrRZzP_Pq_pHwH9KleFc",
        authDomain: "healthadvisory-954a5.firebaseapp.com",
        databaseURL: "https://healthadvisory-954a5-default-rtdb.firebaseio.com",
        projectId: "healthadvisory-954a5",
        storageBucket: "healthadvisory-954a5.appspot.com",
        messagingSenderId: "1002397162781",
        appId: "1:1002397162781:web:31d3658d09f1f8bd0695f4",
        measurementId: "G-RK2S1EYQJQ"
      };
      firebase.initializeApp(firebaseConfig);
      var myName = "Aish";
        // const db = firebase.database();
        // console.log(db);
        
        // // Add the public key generated from the console here.
        // // messaging.usePublicVapidKey("BL2uEqRHqn_DXtCSDy-DPy25Q0PB0B-v2rpLg6G1rXQ8goPV4ci3pjv0CyLjWy-lb_JEDsg-kZ4sUwteOnu_008");
        // const username = prompt("Aish");

        db = firebase.firestore();            
        var ref = firebase.database().ref("messages");
        // ref.on("value", function(snapshot) {
        //         console.log(snapshot);
        //     snapshot.forEach(function(childSnapshot) {
        //     var childData = childSnapshot.val();
        //     //var id=childData.content;
        //     console.log(childData);
        //     })
        //     });
        
    setTimeout(() => {
        console.log(arr)
        
    }, 1000);

    function getMessage() {
        arr.sort(function(a,b){return a['createdAt'] - b['createdAt']});
        console.log(arr)
        $("#messages").html("");
        if(arr.length > 0){
            arr.forEach((ele) => {
                if(ele.from_id == $("#from_id").val())
                {
                $("#messages").append("<li style='float:right'>"+ele.content+"</li><br>")
                }else{
                    $("#messages").append("<li style='float:left'>"+ele.content+"</li><br>")
                }
            })
        }
    }
    var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-circle-o').addClass('fa-circle');
    } else {
      return $(this).removeClass('fa-circle').addClass('fa-circle-o');
    }
  });
};
var setval = 4;
$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  var vat= $star_rating.siblings('input.rating-value').val();
  console.log("hoo",vat)
  setval = vat;
  return SetRatingStar();
});


$(document).ready(function() {
    $(".rating-value").val(setval);
    SetRatingStar();
});
    function loadMsg(){
        arr = [];
        from_id = $("#from_id").val();
        to_id = $("#to_id").val();
        var id = from_id+to_id;
        var id2 = to_id+from_id
        

            ref.child(id).on("value", async function(snapshot) {
            console.log(snapshot.val());
            var data = snapshot.val();
            if(snapshot.exists()){
                for(let key in data){
                // console.log("data[key]",data[key]);
                this.arr.push(data[key]);
                // console.log("intVal",this.intVal);
                }
            }
            console.log(this.arr)
        });
        ref.child(id2).on("value",async function(snapshot) {
            console.log(snapshot.val());
            var data = snapshot.val();
            if(snapshot.exists()){
                for(let key in data){
                console.log("data[key]",data[key]);
                this.arr.push(data[key]);
                console.log("intVal",this.intVal);
                }
            }
            console.log(this.arr , "arr2")
            this.getMessage()
        });
        

    }
        
    $( document ).ready(function() {
        
        loadMsg();
        $("#message-btn").on("click",function(e){
            e.preventDefault();
            var d = new Date();
            $('#showModal').trigger('focus')
            $("#showModal").show();
            // messageinput = $("#messageinput").val();
            // sendMsg(from_id,to_id,messageinput);
            
            // ref("messages").push().set({
			// "sender": myName,
			// "message": message
		// });
        })
    });
    // function checkNode(snapshot,from_id,to_id)
    // {
        
    //     if (snapshot.childExists(from_id+to_id)) {
    //                 alert("yes");
    //     }else{
    //         alert("no");
    //     }
    // }
            //  db.collection("messages").onSnapshot((querySnapshot) =>
            //  {                  
            //     var htmls = [];
            //     var vat = querySnapshot.val();
            //     console.log("hi"+vat);
            //     (querySnapshot).forEach(item => {

            //        console.log(item);
                    
                    
            //   })
            // })
    function sendMsg(from_id,to_id,messageinput) {
        ref = firebase.database().ref('messages');
        ref.once("value")
        .then(function(snapshot) {
            var a = snapshot.exists();  // true
            var b = snapshot.child(from_id+to_id).exists();
                firebase.database().ref("messages/"+from_id+to_id).push().set({
                "content" : messageinput,
                "from_id" : from_id,
                "to_id"   : to_id,
                "createdAt" : firebase.database.ServerValue.TIMESTAMP
            });
            
            loadMsg();
            $("#messageinput").val("");
        });
        
        
        // if(ref.hasChild(from_id+to_id)){
        //     alert("hii");
        // }else{
        //     alert("hello");
        // }
        // console.log("aish"+data);
        
        

    }
      </script>
</body>
</html>

