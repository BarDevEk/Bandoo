<?php 	

	require_once("includes/config.php");

	// session_destroy();

	if(isset($_SESSION['LoggedIn'])){
		$LoggedIn = $_SESSION['LoggedIn'];
	}
	else{
		header("Location: register.php");
		exit();
	}

 ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome to Bandoo</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<div id="playBarContainer">

		<div id="nowPlayingBar">
			<div id="nowPlayingLeft"></div>
			<div id="nowPlayingCenter">
				<div class="content playerControls">
					<div class="musicButtons">
						<button class="controlButton shuffle" title="shuffle">
							<img src="assets/images/icons/shuffle.png" alt="shuffle">
						</button>
						<button class="controlButton previous" title="previous">
							<img src="assets/images/icons/previous.png" alt="previous">
						</button>
						<button class="controlButton play" title="play">
							<img src="assets/images/icons/play.png" alt="play">
						</button>
						<button class="controlButton pause" title="pause" style="display: none;">
							<img src="assets/images/icons/pause.png" alt="pause">
						</button>
						<button class="controlButton next" title="next">
							<img src="assets/images/icons/next.png" alt="next">
						</button>
						<button class="controlButton repeat" title="repeat">
							<img src="assets/images/icons/repeat.png" alt="repeat">
						</button>
					</div> <!-- <div class="musicButtons"> -->

					<div class="playBarContainer">
						
						<span class="progressTime current">0.00</span>
						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>
						<span class="progressTime remaining">0.00</span>

					</div>

				</div> <!-- <div class="content playerControls"> -->
			</div> <!-- <div id="nowPlayingCenter"> -->
			<div id="nowPlayingRight"></div>
		</div>

	</div> <!-- <div id="playBarContainer"> -->

</body>
</html>