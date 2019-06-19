<head>
   
	<style type="text/css" media="all">
		.cabeceraTable{
			background-color: #ECE7E4;
		}

		.table{
			border-collapse: separate;
		}

		.letrabienes{
			font-size: 10px;
		}

		.letratitulo{
			font-size: 14px;
		} 
    </style>
</head>

<body>
	<table width="100%">
	    <tr>
	      <td style="width: 20%;vertical-align: text-top" align="center"><img class="logo" src="{{ asset('images/logoople.png') }}" alt="" height="130px"></td>
	      <td style="width: 80%" align="center" >
	          <h2>
	            <small>
	            <strong>ORGANISMO PÚBLICO LOCAL ELECTORAL </strong><small style="font-weight:lighter;"><br> <strong>DIRECCIÓN EJECUTIVA DE ADMINISTRACIÓN </strong> <small style="font-weight:lighter;"><br>INVENTARIO DE ACTIVO FIJO</small> </small></small>
	          </h2>   
	      </td>
	      
	    </tr>
	</table>
	<br>
	<label><strong>INVENTARIO POR PARTIDA</strong></label>
	<br>
	<label><strong>CLASIFICACIÓN:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} {{ $partida->nombrePartida }} </i></label>
	<table class="table">
		<thead >
			<tr class="cabeceraTable letratitulo" align="center">
				<th>No. DE INVENTARIO</th>
				<th>DESCRIPCIÓN DEL BIEN</th>
				<th>NÚMERO DE SERIE</th>
				<th>MARCA</th>
				<th>MODELO</th>
				<th>NOMBRE DEL RESPONSABLE</th>
				<th>No. DE FACTURA</th>
				<th>IMPORTE DE ADQUISICIÓN</th>
				<th>ESTADO DEL BIEN</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($bienesPartida as $bien)
		        <tr class="letrabienes">
		        	<td>{{ $bien->numeroinv }}</td>
		          	<td>{{ $bien->concepto }}</td>
		          	<td>{{ $bien->numserie }}</td>
		          	<td>{{ $bien->marca }}</td>
		          	<td>{{ $bien->modelo }}</td>
		          	<td>{{ $bien->nombreemple }}</td>
		          	<td>{{ $bien->factura }}</td>
		          	<td>${{ $bien->importe }}</td>
		          	<td>{{ $bien->estado }}</td>
		        </tr>
	        @endforeach
	    </tbody>
		
	</table>
</body>