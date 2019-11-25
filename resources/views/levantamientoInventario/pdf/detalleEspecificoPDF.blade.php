<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Detalle específico | OPLE Veracruz</title>
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
      $corte = 15;
      $inicioBloque = 0;
      $contador = 0;  
    @endphp
    @while ($contador < $numeroArticulos)
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
                    DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES
                  </small>
                </small>
              </h2>   
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <label><strong>Lote Específico</strong></label>
          </td>
        </tr>
      </table>
       <table>
        <tbody>      
          <tr>
            <td style="text-align: left; padding: 2px 12px" width="70%" >
              <strong> ÁREA:  </strong> {{ $empleado[0]->nombrearea }}
            </td>
          </tr>
          <tr>
            <td style="text-align: left; padding: 2px 12px"  >
              <strong> NOMBRE DEL EMPLEADO:  </strong> {{ $empleado[0]->nombre }}
            </td>
            <td style="text-align: left; padding: 2px 12px" >
              <strong>No. DE EMPLEADO: </strong> {{ $empleado[0]->numemple }}
            </td>
          </tr>
          <tr>
            <td style="text-align: left; padding: 2px 12px" c>
              <strong> FECHA DE IMPRESIÓN:  </strong> {{ $fecha }}
            </td>
            <td style="text-align: left; padding: 2px 12px" >
              <strong>TOTAL DE BIENES:  </strong> &nbsp;&nbsp; {{ $numeroArticulos }}           
            </td>
          </tr>
        </tbody>
      </table>
     <div style="height: 700px">
        <table style="margin-top: 15px;">
          <thead>
            <tr style="background-color: #ccc; border: solid 1px #000;">
              <th style="text-align: left; padding: 15px" width="10%">Tipo del bien</th>
              <th style="text-align: left; padding: 15px">Nùmero de inventario</th>
              <th style="text-align: left; padding: 15px">Concepto</th>
              <th style="text-align: left; padding: 15px">Importe</th>
              <th style="text-align: left; padding: 15px">Asignado</th>                    
            </tr>
          </thead>
          <tbody>
            @foreach ($bitacoralotes as $bitacoralote)
              @if ( $inicioBloque <= $loop->index and $loop->index < $corte)
                @php
                  switch ($bitacoralote->semaforo) {
                    case 'si':
                      $semaforo = '<div align="center"><i class="fa fa-check" aria-hidden="true"></i></div> ';
                      break;
                    case 'no':
                      $semaforo = '<div align="center"><i class="fa fa-times" aria-hidden="true"></i></div>';
                      break;
                    case '?':
                      $semaforo = '<div align="center"><i class="fa fa-question" aria-hidden="true"></i></div>';
                      break;
                  } 
                @endphp                  
                <tr>
                  <td style="text-align: left; padding: 2px 12px" class="border">{{ $bitacoralote->tipo }}</td>
                  <td style="text-align: left; padding: 2px 12px" class="border">{{ $bitacoralote->numeroinventario }}</td>
                  <td style="text-align: left; padding: 2px 12px" class="border">{{ $bitacoralote->concepto }}</td>
                  <td style="text-align: left; padding: 2px 12px" class="border"> {{$bitacoralote->importe }}</td>
                  <td style="text-align: left; padding: 2px 12px" class="border">{{ $bitacoralote->nombreemple }}</td>            
                </tr>
                @php
                 $contador ++; 
                @endphp
              @endif
            @endforeach
            @php
              $inicioBloque = $corte;
              $corte +=15;                  
            @endphp
            @if ($contador == $numeroArticulos)
              <tr>
                <td style="text-align: right; padding: 15px" colspan="7">
                  <strong>
                    IMPORTE TOTAL: $ {{ $totalImporte }}
                </strong> 
                </td>
              </tr>
            @endif
          </tbody> 
        </table>
      </div>
      @php
                 $contador ++; 
                @endphp
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
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <div class="row" align="right">
        <label>Página:   {{ $pagina }} </label>
        @php
          $pagina += 1;
        @endphp
      </div>
      @if ($contador < $numeroArticulos)
        <div style="page-break-after:always;"></div>
      @else
        <div style="page-break-after:auto;"></div>
      @endif
      
    @endwhile
  </body>
</html>