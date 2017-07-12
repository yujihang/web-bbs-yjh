<?php
	require_once ('data_valid.php');
	require_once ('user_valid.php');
	session_start();

	//获取数据
	$username = isset( $_POST['username'])?$_POST['username']:"";
	$passwd = isset($_POST['passwd'])?$_POST['passwd']:"";

	echo $username;
	echo $passwd;
	//$result =login($username,$passwd);
	//echo $result[0];

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
		<link rel="stylesheet" href="chajian/marquee/marquee1.css" />
  		<link rel="stylesheet" type="text/css" href="chajian/hightlight/highlight.css"/>
  		<link rel="stylesheet" href="css-yjh/login.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content1">
				<div class="content1_login">
					<!--登陆-->
					<div class="content1_login_form">
						<div class="center"><h1>论坛登陆</h1></div>
						<form method="post" action="login.php">
						<p class="center"><label>姓名：<input id="username" name="username" type="text" placeholder=""></label></p>
			
						<p class="center"><label>密码：<input id="passwd" name="passwd" type="password" placeholder="" value=""></label></p>
						
						<p class="center">
							<label id="label_checkbox"><input type="checkbox" id="checkbox">&nbsp;管理员</label><input type="button" id="submit" value="登入" onclick="submitfn()">
							<input type="button" value="注册" id="register">
						</p>	
						</form>
					<p class="center"><a href="#">忘了密码</a></p>	
					</div>
				</div>

			</div>	
		<?php
			require './jiegou/content2.php';	
		?>	

		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
	
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/login.js"></script>
		<script>
			if(document.documentElement.clientWidth>=415){
				document.write("<script src='chajian/marquee/marquee1.js'><\/script>");
			}
		</script>
</html>





