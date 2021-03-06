<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Inventario de la bodega | OPLE Veracruz</title>
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
      $bloques = 12;
      $inicioBloque = 0;
      $contadorBloques = 1;
      $pagina = 1;
      $tope = 0;
    @endphp

    @foreach ($articulos as $element)
      @if ($loop->index == ($bloques - 1) )
      @php
        $contadorBloques += 1;
        $bloques += 12;
      @endphp
        
      @endif
    @endforeach

    @php
      $bloques = 12;
    @endphp

    @for ($i = 0; $i < $contadorBloques; $i++)  
    
    <table>
        <tr>          
          <td style="width: 120px;vertical-align: text-top"><img class="logo" src="{{ public_path('images/logoople.png') }}" alt=""></td>
          <td style="width: calc(100% - 240px);">
              <h2>
                <small>
                  ORGANISMO PÚBLICO LOCAL ELECTORAL 
                  <br>
                  Dirección Ejecutiva de Administración 
                </small>
              </h2>    
          </td>
        </tr>
      </table>

      <label><strong>INVENTARIO DE LA BODEGA:</strong></label> 

      <div style="height: 565px">
        <table style="margin-top: 15px;">
        <thead>
          <tr style="background-color: #ccc; border: solid 1px #000;">
            <th style="text-align: left; padding: 15px" width="14%">No. DE INVENTARIO</th>
            <th style="text-align: left; padding: 15px">DESCRIPCIÓN DEL BIEN</th>
            <th style="text-align: left; padding: 15px">NÚMERO DE SERIE</th>
            <th style="text-align: left; padding: 15px">MARCA</th>
            <th style="text-align: left; padding: 15px">MODELO</th>
            <th style="text-align: left; padding: 15px">MEDIDAS</th>
            <th style="text-align: left; padding: 15px">No. DE FACTURA</th>
            <th style="text-align: left; padding: 15px">IMPORTE DE ADQUISICIÓN</th>
            <th style="text-align: left; padding: 15px">ESTADO DEL BIEN</th>                      
          </tr>
        </thead>
        <tbody>
          @foreach ($articulos as $bien)
                @if ( $inicioBloque <= $loop->index and $bloques > $loop->index)
              <tr>
                      <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->numeroinv }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->concepto }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->numserie }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->marca }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->modelo }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->medidas }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->factura }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">$ {{ $bien->importe }}</td>
                    <td style="text-align: left; padding: 2px 12px" class="border">{{ $bien->estado }} </td>               
                    </tr>
            @endif

            @if ($loop->index >= $bloques)
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
            $bloques += 12;
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
                  TOTAL DE BIENES:  {{ $totalBienes }}
              </strong> 
              </td>
            </tr>
            <tr>
              <td style="text-align: right; padding: 15px" colspan="9">
                <strong>
                  TOTAL DEL IMPORTE: $  {{ $totalImporte }}
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
                <strong>FORMULÓ</strong>
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
              <td><br></td>
              <td><br></td>
              <td><br></td>
            </tr>
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
                <strong>LIC. JOSÉ LUIS OSORIO RODRÍGUEZ</strong>
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
                <strong>JEFE DEL DEPARTAMENTO DE RECURSOS </strong>
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
    <div class="row" align="right">
        <label>Página:   {{ $pagina }} </label>
        @php
          $pagina += 1;
        @endphp
    </div>
    <div style="page-break-after:auto;"></div>
  @endfor
  </body>
</html>