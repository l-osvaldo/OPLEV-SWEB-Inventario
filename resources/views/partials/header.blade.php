<!-- Navbar -->
<nav class=" navbar navbar-expand col-sm-12 bg-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" onclick="cerrarMenus();"><i class="fa fa-bars"></i></a>
		</li>
		<style type="text/css"></style>
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="{{ route('catalogos') }}"><b>Inicio</b></a></li>
			<li class="breadcrumb-item active hidden"><b>{{ $tituloEncabezado }}</b></li>
		</ol>
	</ul>
		<ul class="navbar-nav ml-auto float-sm-right">   
			<li class="nav-item">
				<a class="nav-link" ><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
			</li>
		</ul>    
</nav>
<!-- /.navbar -->