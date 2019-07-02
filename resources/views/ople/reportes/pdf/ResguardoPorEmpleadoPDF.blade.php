<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Resguardo Por Empleado | OPLE Veracruz</title>
    <link rel="stylesheet" type="text/css" src="css/normalize.css">

    <style type="text/css" media="all">
      *{
      font-family: Arial, Helvetica, sans-serif;
      }
      body {
        font-size: 12px;
      }
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      .column {
        float: left;
        width: 50%;
      }
      table{
        width: 100%;
        margin: 0 0 20px 0;
        border-spacing: 0;
      }
      td { 
        border: none;
        text-align: center;
        height: 25px;
      }
      td.border {
        border-bottom: solid 1px #ccc;
      }
      .logo {
        width: 120px;
      }
      .text-center {
        text-align: center;
      }

      .page-break {
        page-break-after: always;
      }

      .margen {
      	margin-bottom: 1px;
      }
    </style>
  </head>
  <body>
  	@php
  		$bloques = 10;
  		$inicioBloque = 0;
  		$contadorBloques = 1;
  		$pagina = 1;
  		$tope = 0;
  	@endphp

  	@foreach ($articulos as $element)
  		@if ($loop->index == ($bloques - 1) )
  		@php
  			$contadorBloques += 1;
  			$bloques += 10;
  		@endphp
  			
  		@endif
  	@endforeach

  	@php
  		$bloques = 10;
  	@endphp

  	@for ($i = 0; $i < $contadorBloques; $i++)	
  	
		<table>
		    <tr>
		      <td style="width: 120px;vertical-align: text-top"><img class="logo" src="{{ asset('images/logoople.png') }}" alt=""></td>
		      <td style="width: calc(100% - 240px);">
		          <h2>
		            <small>
		              ORGANISMO PÚBLICO LOCAL ELECTORAL 
		              <br>
		              Dirección Ejecutiva de Administración 
		              <small>
		                <br>
		                DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES
		              </small>
		            </small>
		          </h2>  
		        </span>   
		      </td>
		      <td style="width: 120px; color:#fff">...</td>
		    </tr>
	  	</table>

	  	@foreach ($datosEmpleado as $datos)

		  	<table>
		  		<tr>
		  			<td style="text-align: left; padding: 15px" width="25%">
		  				<strong> ÁREA: </strong> 
		  			</td>
		  			<td style="text-align: left;" >
		  				 {{ $datos->nombredepto }}
		  			</td>
		  			<td style="text-align: left;">
		  				<strong>RESGUARDO DE VIENES</strong>
		  			</td>
		  		</tr>
		  		<tr>
		  			<td style="text-align: left; padding: 15px" >
		  				<strong> NOMBRE DEL EMPLEADO: </strong> 
		  			</td>
		  			<td style="text-align: left;" >
		  				{{ $datos->nombre }}
		  			</td>
		  			<td style="text-align: left;">
		  				<strong>No. DE EMPLEADO:</strong>  &nbsp;&nbsp; {{ $datos->numemple }}
		  			</td>
		  		</tr>
		  		<tr>
		  			<td style="text-align: left; padding: 15px" >
		  				<strong> FECHA DE IMPRESIÓN: </strong> 
		  			</td>
		  			<td style="text-align: left;" >
		  				{{ $fecha }}
		  			</td>
		  			<td style="text-align: left;">
		  				<strong>TOTAL DE BIENES: </strong> &nbsp;&nbsp;
		  				@foreach ($totalArticulos as $total)
		  					{{ $total->total }}
		  				@endforeach
		  			</td>
		  		</tr>
		  	</table>
	  	@endforeach

	  	
	  	<div style="height: 420px">
		  	<table style="margin-top: 15px;">
			  <thead>
			    <tr style="background-color: #ccc; border: solid 1px #000;">
			      <th style="text-align: left; padding: 15px" width="14%">No. DE INVENTARIO</th>
			      <th style="text-align: left; padding: 15px">DESCRIPCIÓN DEL BIEN</th>
			      <th style="text-align: left; padding: 15px">NÚMERO DE SERIE</th>
			      <th style="text-align: left; padding: 15px">IMPORTE</th>						          
			    </tr>
			  </thead> 
			  <tbody>
			  	@foreach ($articulos as $bien)
		            @if ( $inicioBloque <= $loop->index and $bloques > $loop->index)
			  			<tr>
		                	<td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->numeroinv }}</td>
				          	<td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->concepto }}</td>
				          	<td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->numserie }}</td>
				          	<td style="text-align: left; padding: 2px 12px" class="border">$ {{ $bien->importe }}</td>             
		                </tr>
			  		@endif

			  		@if ($loop->index > $bloques)
			  			@break
			  		@endif

			  		@if ($loop->last)
			  			@php
			  				$tope = 1;
			  			@endphp
			  			
			  		@endif
			  	@endforeach

			  	@php
			  		$inicioBloque = $bloques;
			  		$bloques += 10;
			  	@endphp

			  	<tr>
			  		<td colspan="9">
			  			&nbsp;
			  		</td>
			  	</tr>
			  	@if ($tope == 1)
				  	<tr>
				  		<td style="text-align: right; padding: 15px" colspan="9">
				  			<strong>
				  				TOTAL DEL IMPORTE: $ {{ $totalImporte }}
						 	</strong> 
				  		</td>
				  	</tr>
			  	@endif
			  </tbody>
		  	</table>  		
	  	</div>
	  	<div class="row">
		    <table style="margin-top: 15px;">
		      <thead>
		        <tr>
		          <td align="center">
		            <strong>ELABORÓ</strong>
		          </td>
		          <td align="center">
		            <strong>REVISO</strong>
		          </td>
		          <td align="center">
		            <strong>Vo. Bo.</strong>
		          </td>
		          <td align="center">
		            <strong>RECIBIÓ</strong>
		          </td>
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td align="center">
		            ________________________________________
		          </td>
		          <td align="center">
		            ________________________________________
		          </td>
		          <td align="center">
		            ________________________________________
		          </td>
		          <td align="center">
		            ________________________________________
		          </td>
		        </tr>
		        <tr>
		          <td>
		            <strong>FELIX SALCEDO DEL ÁNGEL</strong>
		          </td>
		          <td>
		            <strong>MTRA. ERIKA CAROLINA MALPICA ALCÁNTARA</strong>
		          </td>
		          <td>
		            <strong>LIC. JOSÉ LAURO VILLAS RIVAS</strong>
		          </td>
		          <td>
		            <strong>
			            @foreach ($datosEmpleado as $datos)
			            	{{ $datos->nombre }}
			            @endforeach	
		            </strong>
		          </td>		          
		        </tr>
		        <tr>
		          <td>
		            <strong>TÉCNICO C</strong>
		          </td>
		          <td>
		            <strong>JEFA DEL DEPARTAMENTO DE RECURSOS </strong>
		            <br>
		            <strong>MATERIALES Y SERVICIOS GENERALES</strong>
		          </td>
		          <td>
		            <strong>DIRECTOR EJECUTIVO DE ADMINISTRACIÓN</strong>
		          </td>
		          <td>
		            <strong>
		            	@foreach ($datosEmpleado as $datos)
			            	{{ $datos->cargo }}
			            @endforeach	
		            </strong>
		          </td>
		        </tr>
		      </tbody>
		    </table>
		</div>
		<div class="row" align="right">
		    <label>Página:   {{ $pagina }} </label>
		    @php
		      $pagina += 1;
		    @endphp
		</div>

	@endfor
  </body>
</html>