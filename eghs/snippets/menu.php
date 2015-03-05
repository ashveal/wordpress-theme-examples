<nav class="navbar navbar-inverse" role="navigation">
	
	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        	<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php wp_nav_menu(array('theme_location'=>'primary','menu_class'=>'nav nav-justified main-menu','depth'=>1)); ?>	
		<div class="clear"></div>
	</div><!-- /.navbar-collapse -->
	
</nav>