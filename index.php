<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$value = $_POST['field1'];
$value2 = $_POST['field2'];
$sql = "INSERT INTO tyh (activity, happlev)
VALUES ('$value', '$value2')";
mysqli_query ($conn,$sql);
mysqli_close($conn);
?>
<html>
<head>
 <link rel="icon" 
      type="image/png" 
      href="bl.png">
  <title>Baemax</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    var accessToken = "794015458e22456d944550441ba333b4",
      baseUrl = "https://api.api.ai/v1/",
      $speechInput,
      $recBtn,
      recognition,
      messageRecording = "Uhmm. I hear you!",
      messageCouldntHear = "God, your voice is horrible. Could you say that again?",
      messageInternalError = "Oh no, there has been an internal server error",
      messageSorry = "Come on man. I don't know. I'm not Jarvis!";


    $(document).ready(function() {
      $speechInput = $("#speech");
      $recBtn = $("#rec");

      $speechInput.keypress(function(event) {
        if (event.which == 13) {
          event.preventDefault();
          send();
        }
      });
      $recBtn.on("click", function(event) {
        switchRecognition();
      });
      $(".debug__btn").on("click", function() {
        $(this).next().toggleClass("is-active");
        return false;
      });
    });

    function startRecognition() {
      recognition = new webkitSpeechRecognition();
      recognition.continuous = false;
          recognition.interimResults = false;

      recognition.onstart = function(event) {
        respond(messageRecording);
        updateRec();
      };
      recognition.onresult = function(event) {
        recognition.onend = null;
        
        var text = "";
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            text += event.results[i][0].transcript;
          }
          setInput(text);
        stopRecognition();
      };
      recognition.onend = function() {
        respond(messageCouldntHear);
        stopRecognition();
      };
      recognition.lang = "en-US";
      recognition.start();
    }
  
    function stopRecognition() {
      if (recognition) {
        recognition.stop();
        recognition = null;
      }
      updateRec();
    }

    function switchRecognition() {
      if (recognition) {
        stopRecognition();
      } else {
        startRecognition();
      }
    }

    function setInput(text) {
      $speechInput.val(text);
      send();
    }

    function updateRec() {
      $recBtn.text(recognition ? "Stop" : "");
    }

    function send() {
      var text = $speechInput.val();
      $.ajax({
        type: "POST",
        url: baseUrl + "query",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        headers: {
          "Authorization": "Bearer " + accessToken
        },
        data: JSON.stringify({query: text, lang: "en", sessionId: "yaydevdiner"}),

        success: function(data) {
          prepareResponse(data);
        },
        error: function() {
          respond(messageInternalError);
        }
      });
    }

    function prepareResponse(val) {``
      var debugJSON = JSON.stringify(val, undefined, 2),
        spokenResponse = val.result.speech;

      respond(spokenResponse);
      debugRespond(debugJSON);
    }

    function debugRespond(val) {
      $("#response").text(val);
    }

    function respond(val) {
      if (val == "") {
        val = messageSorry;
      }

      if (val !== messageRecording) {
        var msg = new SpeechSynthesisUtterance();
        msg.voiceURI = "native";
        msg.text = val;
        msg.lang = "en-US";
        window.speechSynthesis.speak(msg);
      }


      $("#spokenResponse").addClass("is-active").find(".spoken-response__text").html(val);
    }
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<meta charset="utf-8">
<script type="text/javascript">
    var stub_showing = false;
 
    function woahbar_show() { 
        if(stub_showing) {
          $('.woahbar-stub').slideUp('fast', function() {
            $('.woahbar').show('bounce', { times:3, distance:15 }, 100); 
            $('body').animate({"marginTop": "2.4em"}, 250);
          }); 
        }
        else {
          $('.woahbar').show('bounce', { times:3, distance:15 }, 100); 
          $('body').animate({"marginTop": "2.4em"}, 250);
        }
    }
 
    function woahbar_hide() { 
        $('.woahbar').slideUp('fast', function() {
          $('.woahbar-stub').show('bounce', { times:3, distance:15 }, 100);  
          stub_showing = true;
        }); 
 
        if( $(window).width() > 1024 ) {
          $('body').animate({"marginTop": "0px"}, 250); // if width greater than 1024 pull up the body
        }
    }
 
    $().ready(function() {
        window.setTimeout(function() {
        woahbar_show();
     }, 30000000);
    });
</script>
  <style type="text/css">
    html {
      box-sizing: border-box;
    }
    *, *:before, *:after {
      box-sizing: inherit;
    }
    body {
      background-color: #000000;
	   
      background-image: url("d.gif");
	background-attachment: fixed;
    background-position: 480px 50px;
    background-repeat: no-repeat;
<!--background-size: cover;-->
   
	  
      font-family: "Titillium Web", Arial, sans-serif;
      font-size: 20px;
      margin: 0;
    }
    .container {
      position: fixed;
      top: 23%;
      right:55%;
		left:20%;
      -webkit-transform: translate(-50%, -50%);
    }
	 .container1 {
      position: fixed;
      top: 30%;
      left: 80%;
	 
      -webkit-transform: translate(-50%, -50%);
    }
	
    input {
      background-color: #000000;
      border: 1px solid #000000;
      color: #FFFFFF;
      font-family: "Oswald";
      font-size: 20px;
      line-height: 43px;
      padding: 0 0.75em;
      width: 350px;
      -webkit-transition: all 0.35s ease-in;
    }
    textarea {
      background-color: #000000;
      border: 1px solid #47ff14;
      color: #000000;
      padding: 0.5em;
      width: 100%;
      -webkit-transition: all 0.35s ease-in;
    }
    input:active, input:focus, textarea:active, textarea:focus {
      outline: 1px solid #000000;
    }
    .btn {
		
      background-color: #000000;
	  background-position:center;
	  background-repeat:no-repeat;
      border: 1px solid #000000;
	  color: #549EAF;
      cursor: pointer;
      width: 40px;
	  height: 50px;
	  top:0%
	  left:60%;
	 
    }
    .btn:hover {
      background-color: #1888A9;
      color: #183035;
    }
	
    .debug {
      bottom: 0;
      position: fixed;
      right: 0;
    }
    .debug__content {
      font-size: 14px;
      max-height: 0;
      overflow: hidden;
      -webkit-transition: all 0.35s ease-in;
    }
    .debug__content.is-active {
      display: block;
      max-height: 500px;
    }
    .debug__btn {
      width: 50%;
    }
    .spoken-response {
      max-height: 0;
      overflow: hidden;
      -webkit-transition: all 0.35s ease-in;
    }
    .spoken-response.is-active {
      max-height: 2000px;
    }
    .spoken-response__text {
	top:20%;
      background-color: #000000;
      color: #E1E1E1;
	   font-family: "Oswald";
		width:350px;
      padding: 1em;
	  font-size: 20px;
    }
	  .a{
		  padding-top: 200px;
		  align-content: center;
		  
	  }
	  .input_align{
		  padding-left: 100px;
	  }
	  .mac{
		  padding-left: 200px;
	  }
.container3 {
	padding-top:50px;
	width: 500px;
	margin: 0 auto;
	}
.button_aligner{
		  float: left;
	padding-right: 200px;
	  } 
	  .try{
		  float: none;
		  padding-left:140px;
		  padding-top: 150px;
		  
	  }
	  
.buttonee{
	
  background-color: #000000;
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    
}

.buttonee:hover {
	 background-color: #000000;
    color: white;
	margin-top: 20px;
}	
  .voice{
		  padding-left: 700px;
		  padding-top: 250px;
	  }
  .woahbar
{
  position: fixed;
	
  top: 51%;
  right: 76%;
  width: 400px;
  height: 250px;
  z-index: 100;
  padding: 5px 0 5px 0;
  text-align: center;
  font-size: 110%;
  color: #fff;
  background-color: #000000;  /* << set custom bar color here */
  font-family: Georgia,Times New Roman,Times,serif;
}
 
 
.woahbar span
{
  float: left;
  width: 95%;
  text-align: center;
  padding-top: 2px;
}
 

.woahbar-down-arrow:hover {
  background-color:#222121; /* << set custom hover bar color here */
}
 
.woahbar-up-arrow: {
  background-color:#222121;
}
 

.close-notify
{
  float: right;
  margin-right: 52px;
  color: #fff;
  width: 17px;
  height: 19px;
  text-decoration: none;
  background-color: #222121; /* << set custom bar color here */
  cursor:pointer;
}
 
.show-notify
{
  
  border: 3px solid #fff;
  box-shadow: 0 0 5px rgba(0,0,0,0.35);
 
  float: right;
  
  color: #fff;
  width: 35px;
  height: 33px;
  text-decoration: none;
  background-color:#2731A4; /* << set custom bar color here */
  cursor:pointer;
}
	.a{
		padding-top: 10px;
		width: 400px;
		 color:white;
		 font-size:20px;
	}
	  .b{
		 padding-left: 50px;
	  }
	  .bubby{
		  color: white;
		  background-color: black;
		  width: 20px;
	  }
	  input.e{
		  background-color: #8B8B8B;
	  }
	  .form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 275px;
    margin: 5px auto;
    padding: 16px;
    background-color: #222121;
}
.form-style-6 h1{
    background-color: #090808;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #222121;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #DBDBDB;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
	padding-top: 5px;
    background: #090808;
       border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #222121;
}
	  .btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 50%;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
a{
	text-decoration:none;
	
}
a:visited{
	color:gray;
}
  </style>
  
  <link rel="icon" href="1images.jpg" type="image/gif" >
</head>
<body>
 <div class="container">
    <input id="speech" type="text"> <br> <br>
</div>
<div class="voice">
	<button id="rec" type="button" class="btn btn-default btn-circle btn-xl"><i class="glyphicon glyphicon-ok"></i></button>
	</div>
	 <div class="container1">
   <div class="a">
    <div id="spokenResponse" class="spoken-response">
      <div class="spoken-response__text"></div>
    </div>
		 </div>
  </div>
  
    <div class="debug__content">
      <textarea id="response" cols="40" rows="20"></textarea>
    </div>
 <div class="try">
    <div class="container3">
		<button class="buttonee"><a href="https://l.messenger.com/l.php?u=https%3A%2F%2Fbaemax2.slack.com%2Fmessages%2F%40baemax%2F&h=ATMTZufdo8RLAOrwoyd7wtx2LwXsdIpAVM2s3QU-Dw2_L3Pe-0YTKT-31FpkwkW6dv_53hkKCp7Bv-HdHM4uFv3UQFldcxg5zefRC6gf4UqwXVt21-iR4hrcoUKVZ4vKaHZn6Eu-"><img src="slack.png" width="60" height="60"></a></button>
   
    <button class="buttonee"><a href="https://www.messenger.com/t/434955823529159"><img src="mess.png" width="50" height="50"></a></button>
    <button class="buttonee"><a href="https://l.messenger.com/l.php?u=https%3A%2F%2Ftwitter.com%2Fgofornaman&h=ATMTZufdo8RLAOrwoyd7wtx2LwXsdIpAVM2s3QU-Dw2_L3Pe-0YTKT-31FpkwkW6dv_53hkKCp7Bv-HdHM4uFv3UQFldcxg5zefRC6gf4UqwXVt21-iR4hrcoUKVZ4vKaHZn6Eu-"><img src="twitter.png" width="50" height="50"></a></button>
  </div>
</div>
 <div class="woahbar" style="display:none">
   <span>
<div class="form-style-6">
<h1>OK Listen!</h1>
<form action="" method="post" name="form1">
<input type="text" name="field1" placeholder="Watcha Doin?" />
<input type="text" name="field2" placeholder="How happy are you? Rate it(Max:10)" />
<input type="submit" value="Send" />
<a href= "http://localhost/phpmyadmin/tbl_chart.php?db=data&table=tyh&printview=1&sql_query=SELECT+%2A+FROM+%60tyh%60&single_table=true&unlim_num_rows=10&token=88a2433ec42ca8e5f13d571144f046f9"> View Weekly Analysis </a>
</form>
</div>
    </span>
    <a class="close-notify" onclick="woahbar_hide();"><img class="woahbar-up-arrow" src="x.png" height="10px" width="10px"></a>
</div>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet" type="text/css">
</body>
</html>
