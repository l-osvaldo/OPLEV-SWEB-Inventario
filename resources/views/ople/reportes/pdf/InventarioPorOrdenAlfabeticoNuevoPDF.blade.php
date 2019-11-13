<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Inventario por Orden Alfabético Nuevo | OPLE Veracruz</title>
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
    @php
      $pagina = 1;
    @endphp 
  	@foreach ($partidas as $partida)
      @php
        $corte = 20;
        $inicioBloque = 0;
        $contador = 0;        
      @endphp

      @while ($contador < $partida->numeroArticulos)
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
                      INVENTARIO DE ACTIVO FIJO
                    </small>
                  </small>
                </h2>  
              </span>   
            </td>
            <td style="width: 120px; color:#fff">...</td>
          </tr>
        </table>
        <label>PARTIDA: {{ $partida->descpartida }}</label>        
      

    		<div style="height: 700px">
  		  	<table style="margin-top: 15px;">
    			  <thead>
    			    <tr style="background-color: #ccc; border: solid 1px #000;">
    			      <th style="text-align: left; padding: 15px" width="16%">No. DE INVENTARIO</th>
    			      <th style="text-align: left; padding: 15px">DESCRIPCIÓN DEL BIEN</th>
    			      <th style="text-align: left; padding: 15px">NÚMERO DE SERIE</th>
    			      <th style="text-align: left; padding: 15px">MARCA</th>
    			      <th style="text-align: left; padding: 15px">MODELO</th>
    			      <th style="text-align: left; padding: 15px">No. DE FACTURA</th>
    			      <th style="text-align: left; padding: 15px" width="10%">IMPORTE DE ADQUISICIÓN</th>					          
    			    </tr>
    			  </thead>
    			  <tbody>
    			  	@foreach ($partida->articulos as $articulo)
                @if ( $inicioBloque <= $loop->index and $loop->index < $corte)                  
                  <tr>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->numeroinv }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->concepto }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->numserie }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->marca }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->modelo }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $articulo->factura }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">$ {{ $articulo->importe }}</td>           
                  </tr>
                  @php
                   $contador ++; 
                  @endphp
                @endif
              @endforeach
              @php
                $inicioBloque = $corte;
                $corte +=20;                  
              @endphp
              @if ($contador == $partida->numeroArticulos)
                <tr>
                  <td style="text-align: right; padding: 15px" colspan="7">
                    <strong>
                      TOTAL DEL IMPORTE POR PARTIDA: $ {{ $partida->totalImportePartida }}
                  </strong> 
                  </td>
                </tr>
              @endif
    			  </tbody> 
    			</table>
    		</div>
        <br>
        <br>
        <br>
        <br>
        <div class="row" align="right">
          <label>Página:   {{ $pagina }} </label>
          @php
            $pagina += 1;
          @endphp
        </div>
        <div style="page-break-after:always;"></div>
      @endwhile  	  
  	@endforeach
  </body>
</html>