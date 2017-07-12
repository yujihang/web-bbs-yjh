
  <meta charset="utf-8">
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
      <script type="text/javascript">/*根据js监控页面的窗口大小 然后响应改变所有 font-size的大小*/
        (function () {
            function remSize() {
                let sw = document.documentElement.clientWidth;
                document.documentElement.style.fontSize = Math.floor(sw /4.14) + 'px'; 
                }   /*4.14，设计稿的横向分辨率（iPhone7 plus）414/100得来*/
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

