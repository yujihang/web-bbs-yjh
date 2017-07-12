<?php 
	session_start();

	//读取缓存，获得用户名
	$username="";
	if(isset($_SESSION['valid_user'])){
		$username=$_SESSION['valid_user'];
	}
	
	if(isset($_GET['f_id'])){
		$_SESSION['f_board_id']=$_GET['f_id'];
	}

	//如果读取不到缓存，则提示用户登录
	if(empty($_SESSION['valid_user'])){
		include("none.php");
		exit;
	}
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>用户注册</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
  		<link rel="stylesheet" href="css-yjh/board.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    	<div class="right">
	    		 <span id="username"><?php echo $username; ?></span> <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content_board">
						<h1 class="center" id="title"></h1>
						<input type="button" value="返回" id="back">
						<input type="button" value="发表文章" id="post">	
						<p><b>&nbsp;&nbsp;描述：</b><span id="desc"></span></p>
						<div id="boardlist">
						</div>					
			</div>
		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
    <script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/board1.js"></script>
</html>