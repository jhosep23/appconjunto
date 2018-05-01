@extends('layouts.navLayout')

@section('contentCss')
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/jquery-confirm.min.css">
@endsection
@section('content')

@foreach($noticia as $n)
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<h3 style="margin: 4%" class="text-center text-muted">
						{{$n->titulo}}
					</h3><img style="width: 100%;height: 300px" alt="Bootstrap Image Preview" 
					src="http://localhost:81/appConjunto/storage/app/public/{{$n->imagen}}" class="rounded" />
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin: 6%">
		<div class="col-md-3">
			<address>
				 <strong>fecha {{$n->fecha}}</strong>
				 <br /> Punto de encuentro : {{$n->punto}}
				 <br />
				 <abbr title="Phone">P:</abbr> (123) 456-7890
			</address>
		</div>
		<div class="col-md-8">
			<p class="text-left">
				{{$n->cuerpo_noticia}}
			</p>
		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>
<center ><button style="margin-bottom: 2%" class="btn btn-success">enviar</button> <button style="margin-bottom: 2%" class="btn btn-danger">eliminar</button></center>
@endforeach

@endsection

@section('contentScripts')
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
    <script src="../js/myScript.js"></script>
@endsection