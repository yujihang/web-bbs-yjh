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
		<title>新增讨论区</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
		<link rel="stylesheet" href="css-yjh/addBoard.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔后台管理系统
	    	</div>
	    	<div class="right">
					<span id="username" data-ip="<?php echo $ip; ?>"><?php echo $username; ?></span>     <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content_addBoard">
				<h1 class="center">新增讨论区板块</h1>
				<p id="notice"></p>
				<div class="content_title">
					<p>讨论区名称：</p>
					<input id="title"  name="username" type="text" placeholder="">
				</div>
				<div class="content_contain">
						<p>描述：</p>
						<textarea id="contain"></textarea>					    
				</div>		
				<div class="anniu">
					<input type="button" value="返回" id="back">
					<input type="button" id="submit" value="提交" >
				</div>				
			</div>
		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
    <script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/addBoard.js"></script>
</html>
