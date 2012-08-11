<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
		<?php if(isset($_SESSION['id'])):?>
		<form action="search.php" method="GET" class="navbar-search">
			<input type="text" name="q" class="search-query typeahead span6" placeholder="Search..."/>
		</form>
		<?php else:?>
		<ul class="nav">
			<li><a href="login.php">Start using Tartey</a></li>
		</ul>
		<?php endif;?>
        <h1 class="pull-right"><a class="brand" href="/" title="Go To Home Page">Tartey</a></h1>
		</div>
	</div>
</div>