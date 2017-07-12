    <div class="bbs-header">
    	<div class="left">
    		清水河畔
    	</div>
    	<div class="right">
    		<?php
				if (!empty($old_user)) {
				  if ($result_dest)  {
				    
				    echo '已退出';
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