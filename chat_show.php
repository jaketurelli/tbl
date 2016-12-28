<?php
include('get_SESSION.php');
$query = "SELECT * FROM chat WHERE league_id = $LEAGUE_ID ORDER BY id ASC";
$result1 = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

$num_chats = mysqli_num_rows($result1);
$i=1;
while($chat = mysqli_fetch_array($result1)){
//	if($num_chats - $i <= 10){
	if($num_chats - $i > -1){ // load all
		$alias = $chat['alias'];
		$user_id = $chat['user_id'];
		if($i>1 && $previous_chat_id === $user_id){
			$display_info = false;
		}else{
			$display_info = true;
		}
		$this_time = $chat['time_stamp'];
		$this_time_display = date("M j", strtotime($this_time)) . '  ' . date("g:i a", strtotime($this_time));
		if($user_id === $USER_ID){
			$info_to_display = $this_time_display;
			$this_class_info = "chat-me-info";
			$this_class_bg = "chat-me-bg";
			$this_class_comment = "chat-me-comment";
		}else{
			$info_to_display = $alias . '   ' .  $this_time_display;
			$this_class_info = "chat-other-info";
			$this_class_bg = "chat-other-bg";
			$this_class_comment = "chat-other-comment";
		}

		if($display_info){
		?>
			<div class = <?php echo $this_class_info; ?>> <small> <?php  echo $info_to_display; ?>  </small></div>
		<?php
		}
		?>
		<p class=<?php echo $this_class_comment; ?>><span class = <?php echo $this_class_bg; ?>><?php echo $chat['comment']; ?> </span></p> 
		<!--<p class = "chat-spacer"></p>-->
		<?php
	}else{
		$user_id = $chat['user_id'];
	}
	$i++;
	$previous_chat_id=$user_id;
}
?>