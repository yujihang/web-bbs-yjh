(function() {
	window.Particle = function(container, params) {
		params = params || {};
		var options = {
			point: 300,
			minDis: 100,
			mouseDis: 200,
			effect: 'line'  // zoom | line
		};
		var originParams = {};
		for(var param in params) {
			if(typeof params[param] === 'object') {
				originParams[param] = {};
				for(var defPa in params[param]) {
					originParams[param][defPa] = params[param][defPa];
				};
			} else {
				originParams[param] = params[param];
			};
		};
		for(var opt in options) {
			if(typeof params[opt] === 'object') {
				for(var depOpt in options[opt]) {
					if(typeof params[opt][depOpt] === 'undefined') {
						params[opt][depOpt] = options[opt][depOpt];
					};
				};
			} else if(typeof params[opt] === 'undefined') {
				params[opt] = options[opt];
			};
		};
		var p = this;
		p.originParams = originParams;
		p.params = params;
		p.innerWidth = window.innerWidth;//页面视图区大小
		p.innerHeight = window.innerHeight;
		
		/*p.innerHeight=p.innerHeight-100;*///结合实际情况减去header和footer
		
		p.points = [];
		p.pageXY = {pageX:p.innerWidth/2,pageY:p.innerHeight/2};
		if(container[0] === '#') {
			p.container = container.split('#')[1];
		};
		//获取canvas元素
		p.canvas = document.getElementById(p.container);
		//创建context对象
		p.ctx = p.canvas.getContext('2d');
		//初始化
		p.init = function() {
			p.canvas.width = p.innerWidth;
			p.canvas.height = p.innerHeight;
			p.drawBackground();
			p.addOverlap();
			p.initDrawPoint();
			p.animation();
			p.mouseEvent();
			p.windowResize();
		};
		p.addOverlap=function(){
			p.overlap=document.createElement('div');
			p.overlap.style.width=p.innerWidth+'px';
			p.overlap.style.height=p.innerHeight+'px';
			p.overlap.style.position='absolute';
			p.overlap.style.top='0px';
			p.overlap.style.left='0px';
			p.overlap.style.zIndex='100';
			if(p.canvas.nextElementSibling){//？？
				p.canvas.parentNode.insertBefore(p.overlap,p.canvas.nextElementSibling);//insertBefore接收要插入的节点和作为参考的节点
			}else{
				p.canvas.parentNode.appendChild(p.overlap);
			};
		};
		//粒子颜色
		p.color = function() {
			function random() {
				return Math.round(Math.random() * 255);
			};
			this.r = random();
			this.g = random();
			this.b = random();//分别调用三次取随机值
			this.a = random(1, 0.8);
			this.rgba = 'rgba(' + this.r + ',' + this.g + ',' + this.b + ',' + this.a + ')';
			return this;
		};
		//获取随机数
		p.random = function(max, min) {
			var min = arguments[1] || 0;
			return Math.floor(Math.random() * (max - min + 1) + min);
		};
		//绘制背景图
		p.drawBackground = function() {
			if(!p.canvas) return;
			p.ctx.fillStyle = '#000';
			p.ctx.fillRect(0, 0, p.innerWidth, p.innerHeight);
		};
		//粒子
		p.point = function() {//每个粒子包括颜色，坐标、半径
			this.color = new p.color();
			this.x = Math.random() * p.innerWidth;//随机坐标
			this.y = Math.random() * p.innerHeight;
			this.vx = p.random(10, -10) / 40;//步进，调用p.random
			this.vy = p.random(10, -10) / 40;
			this.r = p.random(3, 1);//半径，调用p.random，半径最大为3，最小为1，在这个范围内波动
			this.scale = 1;//放大倍数
		};
		//初始化点
		p.initDrawPoint = function() {
			for(var i = 0; i < p.params.point; i++) {//所有点
				var point = new p.point();
				p.points.push(point);
				p.ctx.beginPath();
				p.ctx.fillStyle = point.color.rgba;
				p.ctx.arc(point.x, point.y, point.r * point.scale, 0, Math.PI * 2, true);
				p.ctx.fill();
			};
			p.ctx.closePath();
		};
		//点点连线
		p.connect = function() {
			function lineColor(p1, p2) {
				var linear = p.ctx.createLinearGradient(p1.x, p1.y, p2.x, p2.y);//起点终点坐标
				linear.addColorStop(0, p1.color.rgba);//开始的颜色
				linear.addColorStop(1, p2.color.rgba);//结束的颜色
				return linear;
			};
			for(var i = 0; i < p.params.point; i++) {
				for(var j = 0; j < p.params.point; j++) {
					var p1 = p.points[i];
					var p2 = p.points[j];
					if(Math.abs(p2.x - p1.x) < p.params.minDis && Math.abs(p2.y - p1.y) < p.params.minDis) {//两点之间距离小于一定程度才连线

						p.ctx.beginPath();
						p.ctx.lineWidth = 0.2;
						p.ctx.strokeStyle = lineColor(p1, p2);//采用渐变，描边样式
						p.ctx.moveTo(p1.x, p1.y);
						p.ctx.lineTo(p2.x, p2.y);
						p.ctx.stroke();//描边，使用的是strokeStyle
						p.ctx.closePath();
					};
				};
			};
		};
		p.lineto = function() {//和鼠标位置有关
			function isInView(point) {
				return Math.abs(point.x - p.pageXY.pageX) < p.params.mouseDis && Math.abs(point.y - p.pageXY.pageY) < p.params.mouseDis;
			};
			(function line() {
				function lineColor(p1, p2) {
					var linear = p.ctx.createLinearGradient(p1.x, p1.y, p2.x, p2.y);
					linear.addColorStop(0, p1.color.rgba);
					linear.addColorStop(1, p2.color.rgba);
					return linear;
				};
				for(var i = 0; i < p.params.point; i++) {
					for(var j = 0; j < p.params.point; j++) {
						if(i != j) {
							var p1 = p.points[i];
							var p2 = p.points[j];
							if(isInView(p1) && isInView(p2)) {
								if(Math.abs(p2.x - p1.x) < p.params.minDis && Math.abs(p2.y - p1.y) < p.params.minDis) {
									p.ctx.beginPath();
									p.ctx.lineWidth = 0.2;
									p.ctx.strokeStyle = lineColor(p1, p2);
									p.ctx.moveTo(p1.x, p1.y);
									p.ctx.lineTo(p2.x, p2.y);
									p.ctx.stroke();
									p.ctx.closePath();
								};
							};
						};
					};
				};
			})();
		};
		//无限循环动画
		p.animation = function() {
			p.ctx.clearRect(0, 0, p.innerWidth, p.innerHeight);
			p.drawBackground();
			for(var i = 0; i < p.params.point; i++) {
				var point = p.points[i];
				if(point.x < 0 || point.x > p.innerWidth) {//当小圆球碰到矩形壁以后反弹
					point.vx = -point.vx;
				};
				if(point.y < 0 || point.y > p.innerHeight) {
					point.vy = -point.vy;
				};
				p.ctx.beginPath();
				p.ctx.fillStyle = point.color.rgba;
				point.x += point.vx;  //小圆球不断移动
				point.y += point.vy;
				p.ctx.arc(point.x, point.y, point.r * point.scale, 0, Math.PI * 2, true);
				p.ctx.fill();
			};
			if(p.params.effect == 'zoom') {
				p.connect();//将小球与小球用线连接，鼠标移动事件定义在mouseEvent中
			} else if(p.params.effect == 'line') {
				p.lineto();//该函数与鼠标位置有关，通过鼠标事件传入鼠标位置，在该位置附近连线
			};
			requestAnimationFrame(p.animation);
		};
		//鼠标事件
		p.mouseEvent = function() {
			p.overlap.addEventListener('mousemove', function(e) {//鼠标指针移动时触发div中的事件
				var e = e || window.event;
				var pageX = (e.clientX + document.body.scrollLeft || e.pageX) - this.offsetLeft;//offsetLeft指div到边框？？
				var pageY = (e.clientY + document.body.scrollTop || e.pageY) - this.offsetTop;
				if(p.params.effect == 'zoom'){
					for(var t = 0; t < p.params.point; t++) {
						var point = p.points[t];
						if(Math.abs(point.x - p.pageXY.pageX) < p.params.minDis && Math.abs(point.y - p.pageXY.pageY) < p.params.minDis) {//鼠标附近的点
							point.scale = 5;
						} else {
							point.scale = 1;
						};
					};
				};
				p.pageXY.pageX = pageX;
				p.pageXY.pageY = pageY;
			});
			p.overlap.addEventListener('mouseout', function(e) {//鼠标指针位于一个元素上方，然后用户将其移入另一个元素时触发
				if(p.params.effect == 'zoom'){//zoom鼠标移出div都变为原来的比例
					for(var i = 0; i < p.params.point; i++) {
						var point = p.points[i];
						if(point.scale != 1) {
							point.scale = 1;
						};
					};
				}else{
					p.pageXY.pageX=p.innerWidth/2;//line方式鼠标移出div自动定位到中心
					p.pageXY.pageY=p.innerHeight/2;
				};
			});
		};
		p.windowResize = function() {
			window.addEventListener('resize', p.init);
		};
		p.init();
		return p;
	};
	//兼容requestAnimFrame
	window.requestAnimationFrame = (function() {//requestAnimationFrame？？
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			function(callback) {//前面三个都不支持则采用该函数
				window.setTimeout(callback, 1000 / 60);
			};
	})();
})();