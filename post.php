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


/*
	if(empty($_SESSION['uid'])) {
	    $_SESSION['fromURL'] = $_SERVER['REQUEST_URI'];
	    header("Location: login.php");
	}
	else {
	    $user = new User($_SESSION['uid']);
	    if(!$user->m_enabled) {
	        echo '对不起，您无权发贴！';
	        exit;
	    }
	}

	// 构造版面列表
	$board = new BoardList();
	// 取当前版面
	$bid = isset($_GET['bid']) ? $_GET['bid'] : 1;
	$cur_board = $board->getBoard($bid);
	// 取贴子ID
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	// 构造贴子'
	$article = new Article($id);

	//------------------------------------------
	$title      = $_POST['title'];
	$content    = $_POST['content'];
	if(!empty($title)) {
	    $article->m_board_id    = $bid;
	    $article->m_parent_id   = $id;
	    $article->m_title       = $title;
	    $article->m_content     = $content;
	    $article->m_picture     = upload('picture', UPLOAD_IMGS_PATH); 
	    
	    if($article->post()) {
	        header("Location: default.php?bid={$bid}#{$id}");
	    }
	}
	*/
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>帖子发布页</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
		<link rel="stylesheet" href="css-yjh/post.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    	<div class="right">
					<span id="username" data-ip="<?php echo $ip; ?>"><?php echo $username; ?></span>     <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content_post">
				<h1 class="center">发布帖子</h1>
				<p id="notice"></p>
				<div class="content_title">
					<p>题目：</p>
					<input id="title"  name="username" type="text" placeholder="">
				</div>
				<div id="editor">
							<!-- 加载编辑器的容器 -->
				    <script id="container" name="content" type="text/plain">
				        
				    </script>
				    <!-- 配置文件 -->
				    <script type="text/javascript" src="js/utf8-php/ueditor.config.js"></script>
				    <!-- 编辑器源码文件 -->
				    <script type="text/javascript" src="js/utf8-php/ueditor.all.js"></script>
				    <!-- 实例化编辑器 -->
				    <script type="text/javascript">
				        var ue = UE.getEditor('container');
				    </script>
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
	<script src="js/post.js"></script>
</html>
