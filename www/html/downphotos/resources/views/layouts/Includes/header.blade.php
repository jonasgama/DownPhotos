<!-- header -->
	<div class="header" id="home">
		<div class="container">
			<div class="w3l_header_left">
				<ul>
					@if (Auth::check())
					<!--<a href="#" data-toggle="popover" data-placement="right" data-content="{{ Auth::user()->email }}" title="{{ Auth::user()->sobrenome }}"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->nome }}</li></a>-->
					<a href="#"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->nome }}</li></a>
					<a href="sair"><li><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Sair</li></a>
					<a href="envio"><li><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>Envio</li></a>
					@else
					<a href="usuario"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Entrar</li></a>
					<a href="registro"><li><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Criar Conta</li></a>	
					@endif	
				</ul>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<a href="/">
						<span>Down Photos</span>
						<span class="glyphicon glyphicon-cloud-download"></span>
						<span class="glyphicon glyphicon-film"></span>						
					</a>
					</div>
					
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="/" class="scroll hvr-bounce-to-bottom"><span class="glyphicon glyphicon-home"></span></a></li>
							<li><a href="galeria" class="scroll hvr-bounce-to-bottom">Galeria</a></li>
							<li><a href="#about" class="scroll hvr-bounce-to-bottom">About</a></li>
							<li><a href="#team" class="scroll hvr-bounce-to-bottom">Team</a></li>
							<li><a href="#services" class="scroll hvr-bounce-to-bottom">Services</a></li>
							<li><a href="#video" class="scroll hvr-bounce-to-bottom">Videos</a></li>
							<li><a href="#contact" class="scroll hvr-bounce-to-bottom">Contact Us</a></li>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			<div class="w3ls_search">
				<div class="cd-main-header">
					<ul class="cd-header-buttons">
						<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
					</ul> <!-- cd-header-buttons -->
				</div>
				<div id="cd-search" class="cd-search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Pesquisar...">
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- //header -->

