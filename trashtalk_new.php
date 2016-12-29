<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'trashtalk.php';
?>

<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
</head>
<body>
	<!-- NAVIGATION PANE START -->
	<?php
	//  $nav_page_id index:
	//  1: commisioner.php
	//  2: league.php
	//  3: lineup.php
	//  4: trashtalk.php
	//  5: createjoin.php
	//  6: contestants.php
	//  7: blog.php
	//  8: admin.php
	$nav_page_id = 4;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->

	
		<?php 
		if($IS_SIGNED_IN){
		?>
			<div id="trashtalk" class="container-fluid">
			<div class="container">
				<div class="row text-center">
					<h3>Trash Talk</h3>
				</div>
				<div class="row trashtalk-content">
					<div class="col-sm-2"></div>
					<div id = "online-offline-lists" class="col-sm-2 col-xs-12">
					</div>
					<div class="col-sm-6 col-xs-12">
						<!-- <form name = "form1" id="trashtalkform"> -->
						<form name = "form1" id= <?php echo '"' . $LEAGUE_ID . '_' . $USER_ID . '"' ?>>
							<div class="panel">
								<div id = "chatlogs">
								</div>
							</div> 
							<textarea autofocus placeholder="Type message here..." name = "msg" id = "myMessage"></textarea>
							<button type="button" href = "#" onClick="submitChat()" class="btn btn-pink trash-btn">SEND</button> 
							<!--<a href = "#" onClick = "submitChat()" class = "button" >Send</a>--> 
						</form>
					</div>
					<div class="col-sm-2"></div>
				</div>	
			</div><!-- container -->
		</div><!-- trashtalk container-fluid -->
		<?php
		}else{
		?>
		<div id="trashtalk-ns" class="container-fluid">
			<div class="container">
				<!--<div class="row text-center preview-title">
					<h3>trash talk</h3>
				</div>-->
				<div class="row text-center preview-cta">
					<h1 class="preview-title">Start the trash talk with your friends today!</h1>
					<p>Sign up or login to start playing The Bach League</p>
					<a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#"><button class="btn btn-pink preview-btn">SIGN UP</button></a>
					<a class="login" data-toggle="modal" data-target="#loginmodal" href="#"><button class="btn btn-pinkoutline preview-btn">LOGIN</button></a>
				</div>
				<div class="row">
					<h2 class="how-title text-center">How does the trash talking feature work?</h2>
					<div class="col-md-3">
						<div class="row feature">
							<img src="img/1.svg" alt="1" /><span class="feature-title">Status</span><p class="feature-description">See which of your leaguemates are online or offline.</p>
						</div>
						<div class="row feature">
							<img src="img/2.svg" alt="2" /><span class="feature-title">Real-time chatting</span><p class="feature-description">Chat with your online leaguemates during episodes or just throw shade during the week.</p>
						</div>
					</div>
					<div class="col-md-9">
						<img class="preview-img" src="img/previewtrashtalk.svg" alt="trash talk preview" style="width: 80%;"/>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	
	<script>
		$('#chatlogs').load('chat_show.php');
		$('#chat-online-offline').load('chat-online-offline.php');
		var myMessage = document.getElementById("myMessage");
		myMessage.addEventListener("keydown", function(e) {
			if(e.keyCode === 13) {
				e.preventDefault();
				if(form1.msg.value === ''){
					form1.msg.value = '';
					return;
				}else{
					submitChat();
				}
			}
		})


		function submitChat(){
			if(form1.msg.value === ''){
				return;
			}else{
				var msg = form1.msg.value;
				form1.msg.value = '';
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState===4&&xmlhttp.status === 200  ){
						document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
						$('#imageload').hide();
					}
				}
				xmlhttp.open('GET','chat_insert.php?msg='+msg,true);
				xmlhttp.send();
				//var chatBox = document.getElementById('chatlogs');
				//chatBox.scrollTop = chatBox.scrollHeight;
				//document.getElementById("chatlogs").scrollTop = document.getElementById("chatlogs").scrollHeight ;
				$("#chatlogs").animate({ scrollTop: $('#chatlogs')[0].scrollHeight },"fast");
			}
		}

		$(document).ready(function() {
			$('#chatlogs').load('chat_show.php');
			$('#chat-online-offline').load('chat-online-offline.php');
			//var chatBox = document.getElementById('chatlogs');
			//chatBox.scrollTop = chatBox.scrollHeight;
			$("#chatlogs").animate({ scrollTop: $('#chatlogs')[0].scrollHeight }, 1000);
			//document.getElementById("chatlogs").scrollTop = document.getElementById("chatlogs").scrollHeight ;
			//$("#chatlogs").animate({ scrollTop: $('#chatlogs')[0].scrollHeight }, "fast");
			//$.ajaxSetup({cache:false}); // doesn't reload
			setInterval(function() 	{ $('#chatlogs').load('chat_show.php'); 
									  $('#online-offline-lists').load('chat-online-offline.php');
									}, 50); 
			
		});

		$(".trash-btn").click(function(){
		    $("#myMessage").focus();
		    return false;
		});
		$(function () {
		    $('textarea').focus(function () {
		        $(this).data('placeholder', $(this).attr('placeholder'))
		               .attr('placeholder', '');
		    }).blur(function () {
		        $(this).attr('placeholder', $(this).data('placeholder'));
		    });
		});
	</script>
</body>
</html>