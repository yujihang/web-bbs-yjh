<?php
    $ip=$_SERVER['REMOTE_ADDR'];
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
		<link rel="stylesheet" href="chajian/marquee/marquee1.css" />
  		<link rel="stylesheet" type="text/css" href="chajian/hightlight/highlight.css"/>
  		<link rel="stylesheet" href="css-yjh/login1.css" />
  		<link rel="stylesheet" href="css-yjh/register.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    	<div class="right">
	    		 <p><a href="login.php">回到登入页面</a></p>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content1">
				<div class="content1_register">
					<!--注册-->
					<div class="content1_register_table">
							    <div class="center"><h1>用户注册</h1></div>
							   	<p class="center"><label><input name="username" data-ip="<?php echo $ip;?>" type="text" id="username" placeholder="用户名："></label></p>
							   	<p class="center"><label><input name="pwd" type="password" id="pwd" placeholder="密码："></label></p>
							   	<p class="center"><label><input name="repeat_pwd" type="password" id="repeat_pwd" placeholder="重复密码："></label></p>
							   	<p class="center"><label><input name="name" type="text" id="name" placeholder="姓名："></label></p>
							   	<p class="center"><label><input name="email" type="text" id="email" placeholder="Email："></label></p>
							    <p class="center">
							    	<input type="button" name="submit" id="submit"  value="提交" />
							        <input type="reset" id="reset" name="reset" value="重置" />	
							    </p>       						    
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
    <script src="js/register.js"></script>
		<script>
			if(document.documentElement.clientWidth>=415){
				document.write("<script src='chajian/marquee/marquee1.js'><\/script>");
			}
		</script>
</html>

