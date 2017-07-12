<?php

	session_start();

	//读取缓存，获得用户名
	$username="";
	if(isset($_SESSION['valid_user'])){
		$username=$_SESSION['valid_user'];
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
		<title>用户管理主页</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
  		<link rel="stylesheet" href="css-yjh/adminBoard.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔后台管理系统
	    	</div>
	    	<div class="right">
	    		 <span id="username"><?php echo $username; ?></span> <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
				<div class="content_adminBoard">
					<div class="center"><h1>用户管理主页</h1></div>
					<div class="hang">
						<a href="adminBoard.php"><p class="span33 inactive">版面管理</p></a>
						<a href="adminUser.php"><p class="span33 active">用户管理</p></a>
						<a href=""><a href="adminPost.php"><p class="span33 inactive">发帖排行</p></a>
					</div>
					<br>
					<div id='board'></div>
					
					<p class="center">
						<input type="button" id="all" value="全选" >
						<input type="button" id="ping" value="屏蔽" >
						<input type="button" id="cancle" value="取消屏蔽" >
					</p>
			</div>
		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
    <script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/adminUser.js"></script>
</html>