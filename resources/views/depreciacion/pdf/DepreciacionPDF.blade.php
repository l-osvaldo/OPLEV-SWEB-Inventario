<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Bienes por Partida | OPLE Veracruz</title>
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
    </style>
  </head>
  <body>
  	<table>
	    <tr>		    	
	      <td style="width: 120px;vertical-align: text-top"><img class="logo" src="{{ public_path('images/logoople.png') }}" alt=""></td>
	      <td style="width: calc(100% - 240px);">
	          <h2>
	            <small>
	              ORGANISMO PÚBLICO LOCAL ELECTORAL 
	              <br>
	              Dirección Ejecutiva de Administración 
	              <small>
	                <br>
	                SUBDIRECCION EJECUTIVA					
	              </small>
	            </small>
	            <br>
	            <small>DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES</small>
	          </h2>   
	      </td>
	    </tr>
  	</table>

  	<label><strong>CONCENTRADO DE MOVIMIENTOS DE ACTIVO FIJO DEL 1 AL {{ $totalDiasMes }} DE {{ $nombreMes }} {{ $anio }} </strong></label>
  	<br>
  	<div style="height: 570px">
		  	<table style="margin-top: 15px;">
			  <thead>
			    <tr style="background-color: #ccc; border: solid 1px #000;">
			      <th style="text-align: left; padding: 15px">PARTIDA</th>
			      <th style="text-align: left; padding: 15px">REGISTROS {{ $mesAnterior }} </th>
			      <th style="text-align: left; padding: 15px">DEPRECIACIÓN </th>
			      <th style="text-align: left; padding: 15px">TOTAL</th>						          
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($partidas as $partida)
		  			<tr>
	                	<td style="text-align: left; padding: 2px 12px" class="border">{{ $partida['descpartida'] }}</td>
			          	<td style="text-align: left; padding: 2px 12px" class="border"> {{-- {{ $partida->aniosvida }} --}}  </td>
			          	<td style="text-align: left; padding: 2px 12px" class="border"></td>
			          	<td style="text-align: left; padding: 2px 12px" class="border"></td>             
	                </tr>
			  	@endforeach
			  		<tr>
			  			<td></td>
			  			<td></td>
			  			<td></td>
			  			<td></td>
			  		</tr>
			  		<tr>
			  			<td style="text-align: left; padding: 2px 12px; background-color: #ccc; text-align: center;" class="border"><strong>TOTAL</strong></td>
			          	<td style="text-align: left; padding: 2px 12px; background-color: #ccc;" class="border"></td>
			          	<td style="text-align: left; padding: 2px 12px; background-color: #ccc;" class="border"></td>
			          	<td style="text-align: left; padding: 2px 12px; background-color: #ccc;" class="border"></td>
			  		</tr>
			  </tbody>
		  	</table>  		
	  	</div>
  </body>
</html>