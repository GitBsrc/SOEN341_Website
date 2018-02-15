<!DOCTYPE html>
<html>
	<head>
		<title> List</title>
		<style>
		body{
			background-color: white;
		}
		.button {
				background-color: #ff6666;
				border:none;
				color: white;
				padding: 15px;
				text-align: center;
				display: inline-block;
				font-size: 10px;
				margin-top: 5px;
				margin-left: 50px;
				cursor: pointer;
				border-radius: 12px;
				
			}
		.button:hover{background-color:#ff0000}

		.username{
			float:right;
			margin-top:3%;
			margin-right:4%;
			margin-bottom: 1%;
		}

		.titlebox{
			width:100%;
			height: 20%;
			border: 1px solid black;
		}

		.replybox{
			width:52%;
			float:right;
			border: 1px solid black;
			display:flex;
			flex-direction: column;

		}

		.recommendbox{
			width: 44%;
			float:left;
			border: 1px solid black;	
		}


			
 		.questioncontainer{
 			display: flex;
 			flex-direction: column;
 			/*border: 3px solid gray; */
 			 border-left: 6px solid green;
 			margin: 3%;	
 			background-color: #f1f1f1;
 			border-radius: 10px;
 			font-family: Verdana;
 		}

 		#helpful{
 			border-left: 6px solid green;
 		}
 		#unhelpful{
 			border-left: 6px solid red;
 		}
 		.questioncontainer>div {
  			background-color: #f1f1f1;	
  			/*margin: 3%;
  			padding:2%;	*/		
  		}


 		.questioninfocontainer{
 			display:flex;
 			flex-direction: row;
 			justify-content: space-between;
 			/*border: 1px solid blue; */
 			/*margin: 4%; */
 			 margin-right: 2%;
		    margin-top: 2%;
		    margin-left: 2%;
 		}
 		.userboxed{

 			flex:0 1 10%;
 			height: 10%;
 			font-size: 16px;
 			cursor: pointer;
 			padding-right: 5%;
 		}
 		.descboxed{
 			background-color: white;
 			overflow: auto;
 			/*margin: 5%; */

 			padding: 3%;
  			flex:0 1 80%;
  			border-radius: 8px;
  			font-size: 15px;
 		}


 		.buttoncontainer{
 			display:flex;
 			flex-direction: row;
 			justify-content: flex-end;
 			margin-right: 4%;
 			/*border: 1px solid red; */
 			
 		}

 		.displayupvote{
 			background-color: white;
		    border: none;
		    color: black;
		    padding: 6px 10px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 12px;
		    margin: 5px 10px;
		    border-radius: 7px;
 		}
 		.plusbutton{
 			background-color: forestgreen;
		    border: none;
		    color: white;
		    padding: 6px 30px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 12px;
		    margin: 4px 2px;
		    cursor: pointer;
		    border-radius: 7px;
 		}
        .plusbutton:hover{background-color: darkgreen;}
 		.minusbutton{
 			background-color: red;
		    border: none;
		    color: white;
		    padding: 6px 30px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
			font-size: 12px;
		    margin: 4px 2px;
		    cursor: pointer;
		    border-radius: 7px;
 		}
        .minusbutton:hover{
            background-color: darkred;}
 		li{list-style-type: none;}
        .titleinfo{
            width: 100%;
            height: 20%;
            border: black 1px solid;
        }
        .title{
            text-align:center;
        }
        .description{
            margin-left: 20%;
            word-wrap: break-word;
        }
        .usernamelabel{
            margin-left: 20%;
        }
        .replydescription {
            width: 100%;
        }


		</style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript">


                $(document).ready(function(){
                    inforeply();


                $("#addreply").click(function(){
                    $.post("../Controller/addreply.php",{
                            desc: $("#inputReplyInfo").val()
                        },
                        function(data){
                            window.location.href="question.php";
                        });
                });

                    function inforeply() {
                        $.post("../Controller/TitleInfo.php",
                            function(data){
                                var info = JSON.parse(data);

                                $("#titleinfoTitle").html(info['title']);
                                $("#userinfotitle").html(info['user']);
                                $("#dateinfotitle").html(info['date']);
                                $("#idtitleinfo").html(info['ID']);
                                $("#descinfoTitleinput").html(info['description']);

                            });
                        $.post("../controller/replyinfo.php", function (data) {

                            var info = JSON.parse(data);
                            str = "";

                            for (var x = info[0].length-1; x >= 0; x--) {
                                if(info[1]){
                                 str+= "<li>";
                                if(info[0][x]['validate']==0 )
                                    str+="<div class=\"questioncontainer\" id=\"unhelpful\">";
                                else{
                                    str+="<div class=\"questioncontainer\" id=\"helpful\">";
                                }
                                str+="<div class=\"questioninfocontainer\"><div class=\"userboxed\" >"+ info[0][x]['username'] +"</div><div class=\"descboxed\">"+ info[0][x]['description_reply'] +"</div></div><div class=\"buttoncontainer\" >";
                                if(info[1]==true)
                                    str+="<button class= \"pbuttonboxed plusbutton\" onclick='approve("+info[0][x]['ID']+")'>Approved</button><button class= \"mbuttonboxed minusbutton\" onclick='decline("+info[0][x]['ID']+")'>Decline</button>";
                                str+="<div class=\"displayupvote\"> "+info[0][x]['total_positive'] +" </div><button class=\"pbuttonboxed plusbutton\" onclick='upvote("+info[0][x]['ID']+")'>+</button><button class= \"mbuttonboxed minusbutton\" onclick='downvote("+info[0][x]['ID']+")'>-</button></div></div><input type=\"hidden\"/></li>";
                            }
                            else{
                                    if(info[0][x]['validate']==1 ) {
                                        str += "<li><div class=\"questioncontainer\" id=\"helpful\">";
                                        str += "<div class=\"questioninfocontainer\"><div class=\"userboxed\" >" + info[0][x]['username'] + "</div><div class=\"descboxed\">" + info[0][x]['description_reply'] + "</div></div><div class=\"buttoncontainer\" >";
                                        str += "<div class=\"displayupvote\"> " + info[0][x]['total_positive'] + " </div><button class=\"pbuttonboxed plusbutton\" onclick='upvote(" + info[0][x]['ID'] + ")'>+</button><button class= \"mbuttonboxed minusbutton\" onclick='downvote(" + info[0][x]['ID'] + ")'>-</button></div></div><input type=\"hidden\"/></li>";
                                    }}}
                            $("#test23").append(str);

                        });
                    }

 
			});

			function approve(id){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../controller/approveReply.php", true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("value="+id);
                window.location.href="question.php";            }

			function decline(id){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../controller/declineReply.php", true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("value="+id);
                window.location.href="question.php";
            }

			function upvote(id){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../controller/upvoteReply.php", true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("value="+id);
                window.location.href="question.php";            }

			function downvote(id){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../controller/downvoteReply.php", true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("value="+id);
                window.location.href="question.php";            }

		</script>
	</head>
	<body> 
		<nav>
			<img src="../Img/LogoOMQ.png" alt="Logo" height="80px" width="80px"/>
			<label class="username"> Username </label>
		</nav>
		<div>
			<div class="titlebox">     <div class="titleinfo">


                    <h1 class="title" id="titleinfoTitle" >Title</h1>
                    <br>
                    <label class="usernamelabel">By: </label><label id="userinfotitle"></label><label class="usernamelabel">Date: </label><label id="dateinfotitle"></label><label id="idtitleinfo"></label>
                    <br>
                    <br>
                    <label id="descinfoTitle" class="description">Description:</label>
                    <label id="descinfoTitleinput"></label>
                    <div class="container" style="text-align: center">
                        <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">reply</button>

                    </div>

                </div>
                <div class="container">
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Reply</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Enter your reply:</p>
                                    <textarea id="inputReplyInfo" class="replydescription"></textarea>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" id="addreply" class="btn btn-default" data-dismiss="modal">Add</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div></div>
			<div class="replybox"> 	
			<ul id="test23">




			</ul>

</div>

			<div class ="recommendbox"> <p>.. </p></div>
		</div>
	</body>
</html>