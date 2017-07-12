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
	<link rel="stylesheet" href="jiegou/all.css" />
	<link rel="stylesheet" href="jiegou/header.css" />
	<link rel="stylesheet" href="jiegou/content.css" />
	<link rel="stylesheet" href="jiegou/footer.css" />
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
	<?php
		require './jiegou/header.php'
	?>
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
					<?php
						require './jiegou/content2.php';
						?>
    </div>
   				 <!--底部栏-->
   					<?php
						require './jiegou/footer.php';
						?>
		</div>

		<script>
			if(document.documentElement.clientWidth>=415){
				document.write("<script src='chajian/marquee/marquee1.js'><\/script>");
			}
		</script>
		
</body>