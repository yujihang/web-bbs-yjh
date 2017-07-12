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
	$ip=$_SERVER['REMOTE_ADDR'];
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>发帖成功</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
		<link rel="stylesheet" href="css-yjh/postSucess.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    	<div class="right">
					<span id="username" data-ip="<?php echo $ip; ?>"><?php echo $username; ?></span> <input type="button" value="返回首页" id="back3" onclick="window.location.href='index.php';">    <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content_post">
				<h1><canvas id="canvas"></canvas></h1>
				<input type="button" value="点我返回首页" id="back1" onclick="window.location.href='index.php';">
				<input type="button" value="点我返回首页" id="back2" onclick="window.location.href='index.php';">
								
			</div>
		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="chajian/explode/explode.js"></script>
    		<script>
			var explode = new Explode('#canvas',{
				type: 1,
				width: 700,
				height: 300,
				text: '发帖成功'
			});
		</script>
</html>