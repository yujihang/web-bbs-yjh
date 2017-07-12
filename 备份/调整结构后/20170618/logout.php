<?php

session_start();
$old_user = isset($_SESSION['valid_user']) ? $_SESSION['valid_user']:"";

unset($_SESSION['valid_user']);
$result_dest = session_destroy();


?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
      <script src="chajian/slide/slide3D-1.2.1.js"></script>
      <script type="text/javascript">/*根据js监控页面的窗口大小 然后响应改变所有 font-size的大小*/
        (function () {
            function remSize() {
                let sw = document.documentElement.clientWidth;
                document.documentElement.style.fontSize = Math.floor(sw /4.14) + 'px';    /*4.14，设计稿的横向分辨率（iPhone7 plus）414/100得来*/
						    /*轮播图自适应开始*/
						    let width = document.documentElement.clientWidth;
						    let height =document.documentElement.clientHeight/2.6;
						    if(width>=415){
						    	width = document.documentElement.clientWidth/1.1;
						    }
							var mySlide5 = new Slide3D('.fragment', {
								width: width,
								height:height,
								effect: 'fragment',  // flip | turn | slide | flat | fragment
								sources: ['img/donghu.png',
								'img/tushuguan.png',
								'img/zhulou.png',
								'img/donghu.png',
								'img/tushuguan.png'],
								box:{
									rows: 10,  // 切割行
									cols: 5  // 切割列
								},
								pagination: true,  // 是否添加分页器
								paginationClickable: true,
								autoplay: 2000,
								autoplayDisableOnInteraction : false
							}); 
							 /*轮播图自适应结束*/                     
            }
            window.onresize = remSize;/*onresize 事件会在窗口或框架被调整大小时发生*/
            window.onload = remSize;
            window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
                let sw = document.documentElement.clientWidth;
                var angle = window.screen.orientation.angle || window.orientation;
                if (sw < 769 && (angle === 90 || angle === -90)) {
                    alert("竖屏浏览体验更佳，亦可使用PC");
                }
            });/*移动端的浏览器一般都支持window.orientation这个参数，通过这个参数可以判断出手机旋转角度*/
        })();
    </script>
  <!--<link href="css/post.css?ver=1312" rel="stylesheet" />-->
  <link rel="stylesheet" href="css-yjh/reset.css" />
  <link rel="stylesheet" href="css-yjh/logout.css" />
  
  <link rel="stylesheet" type="text/css" href="chajian/slide/slide3D-1.2.1.css"/>
  <link rel="stylesheet" href="chajian/marquee/marquee1.css" />
  <link rel="stylesheet" type="text/css" href="chajian/hightlight/highlight.css"/>
</head>
<body>
	<!--canvas画粒子背景图-->
<!--	<div class="beijing">
    	<canvas id="particles">
    	</canvas>
  </div>  --> 	
  <div class="bgcolor">
    <!--<h1 class="pcenter">退出页面</h1>-->
    <!--顶部栏-->
    <div class="bbs-header">
    	<div class="left">
    		清水河畔
    	</div>
    	<div class="right">
    		<?php
				if (!empty($old_user)) {
				  if ($result_dest)  {
				    
				    echo '退出';
				    echo '<a href="login.php">登入</a>';
				  } else {
				   
				    echo '不能退出';
				  }
				} else {
				  
				  echo '你未登入，请先登入';
				  echo '<a href="login.php">登入</a>';
				}
				?>
    	</div>
    </div>
    <!--内容区-->
    <div class="bbs-content" id='bbs-content'>
    	<!--图片滚动-->
		    		<div class="content1">
		    				<div id="content">
										<div class="container3D fragment">    <!--采用fragment方式-->
											<div class="wrapper3D">
												
											</div>
											<div class="slide3D-pagination"></div>
											<div class="slide3D-prev-button"></div>
											<div class="slide3D-next-button"></div>
										</div>
								</div>
		    		</div>    	
    	<!--一系列图片（小游戏、音乐、在线字典、todolist、淘宝）及链接（学校官网、友情链接）-->
    	<div class="content2">

				<div class="game highlight-box mask" data-title='小游戏'>
    			<a href="http://www.4399.com/" target="_blank"><img src="img/img/feature/01.503c5483.jpg"/></a>	
				</div>
    		<div class="music img-hover mask" data-title='音乐'>
    			<a href="https://y.qq.com/" target="_blank"><img src="img/img/feature/07.2f43931e.jpg" alt="" /></a>
    		</div>
    		<div class="dictionary img-hover mask" data-title='在线字典'>
    			<a href="http://www.iciba.com/" target="_blank"><img src="img/img/feature/05.0357cd0d.jpg" alt="" /></a>
    		</div>
    		<div class="todolist img-hover mask" data-title='todolist'>
    			<a href="http://www.iciba.com/" target="_blank"><img src="img/img/feature/04.106fc8c0.jpg" alt="" /></a>
    		</div>
    		<div class="taobao img-hover mask" data-title='淘宝'>
    			<a href="https://www.taobao.com/" target="_blank"><img src="img/img/feature/09.1f0f38a3.jpg" alt="" /></a>
    		</div>
    		<div class="lianjie">
    			<p>友情链接</p>
    					<div class="marquee-box1">
									<div class="marquee-inner1">
										<ul>
											<li><a href="http://www.uestc.edu.cn/" target="_blank">电子科技大学官网电子科技大学官网电子科技大学官网电子科技大学官网</a></li>
											<li><a href="http://yz.uestc.edu.cn/" target="_blank">电子科大学研招网电子科大学研招网电子科大学研招网</a></li>
											<li><a href="http://gms.uestc.edu.cn/gms_sso/login" target="_blank">研究生管理系统电子科大学研招网电子科大学研招网</a></li>
											<li><a href="http://cwjf.uestc.edu.cn/payment/" target="_blank">电子科技大学缴费平台电子科大学研招网</a></li>
											<li><a href="http://idas.uestc.edu.cn/authserver/login" target="_blank">电子科技大学选课系统电子科大学研招网</a></li>
											<li><a href="http://bbs.uestc.edu.cn/forum.php" target="_blank">正版清水河畔电子科大学研招网</a></li>
											<li><a href="http://www.uestc.edu.cn/" target="_blank">电子科技大学官网电子科大学研招网</a></li>
											<li><a href="http://gms.uestc.edu.cn/gms_sso/login" target="_blank">研究生管理系统</a></li>
											<li><a href="http://cwjf.uestc.edu.cn/payment/" target="_blank">电子科技大学缴费平台</a></li>
											<li><a href="http://idas.uestc.edu.cn/authserver/login" target="_blank">电子科技大学选课系统</a></li>
											<li><a href="http://bbs.uestc.edu.cn/forum.php" target="_blank">正版清水河畔</a></li>
											<li><a href="http://www.uestc.edu.cn/" target="_blank">电子科技大学官网</a></li>
										</ul>
									</div>
							</div>

    		</div>
    	</div>
    </div>
    <!--底部栏-->
    <div class="bbs-footer">Copyright©2017 &nbsp;&nbsp;&nbsp;All Rights Reserved &nbsp;&nbsp;&nbsp;Designed by yjh</div>
		</div>

		<script>
			if(document.documentElement.clientWidth>=415){
				document.write("<script src='chajian/marquee/marquee1.js'><\/script>");
			}
		</script>
		
</body>