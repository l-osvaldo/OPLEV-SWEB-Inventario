<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Importe de bienes por Partida | OPLE Veracruz</title>
    <link rel="stylesheet" type="text/css" src="css/normalize.css">

    <style type="text/css" media="all">
      *{
      font-family: Arial, Helvetica, sans-serif;
      }
      body {
        font-size: 11px;
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
        height: 20px;
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
    $signoPesos = 1;
    $pagina = 1;
  @endphp

  <table>
    <tr>
      <td style="width: 120px;vertical-align: text-top"><img class="logo" src="{{ public_path('images/logoople.png') }}" alt=""></td>
      <td style="width: calc(100% - 240px);">
          <h2>
            <small>
              ORGANISMO PÚBLICO LOCAL ELECTORAL 
              <br>
              Dirección Ejecutiva de Administración 
              <small style="font-weight:lighter;">
                <br>
                Departamento de Recursos Materiales
              </small>
            </small>
          </h2>  
        </span>   
      </td>
      <td style="width: 120px; color:#fff">...</td>
    </tr>
    <tr>
      <td colspan="3">
        <h2>
          <small>Concentrado de Importes por Partida</small>
        </h2>
      </td>
    </tr>
  </table>
  
  <div>    
      <strong> <i> Fecha de Impresión: &nbsp; {{ $fecha }} </i> </strong> <br>    
  </div>

  <div class="row">
    <table style="margin-top: 15px;">
      <thead>
        <tr style="background-color: #ccc; border: solid 1px #000;">
          <th style="text-align: left; padding: 15px">Partida</th>
          <th style="text-align: center; padding: 15px">Clasificación del Bien</th>
          <th style="border: solid 1px #ccc;"></th>
          <th style="text-align: center; padding: 15px">Importe de Bienes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($partidaAndImporteTotal as $partida)

          <tr>
            <td style="text-align: left; padding: 2px 12px" class="border">            
              {{ mb_strtoupper($partida->partida) }}              
            </td>
            <td style="text-align: left; padding: 2px 12px" class="border">            
              {{ mb_strtoupper($partida->descpartida) }}              
            </td>
            <td class="border">
              @if ($signoPesos == 1)
                <label style="text-align: right;">$</label>
              @endif
              
              @php
                $signoPesos = 0
              @endphp  
            </td>
            <td style="text-align: right; padding-right: 15px;" class="border"> {{ $partida->importeTotalPartida }} </td>                                                
          </tr>
        @endforeach
        <tr>
          <td colspan="4">
            &nbsp;
          </td>
        </tr>
        <tr>
          <td colspan="4" style="text-align: right; padding-right: 15px;">
            <strong>Total del Importe: $ {{ $totalImporte }} </strong> 
          </td>
        </tr>      
      </tbody>
    </table>
  </div>

  <div class="row">
    <table>
      <tbody>
        <tr>
          <td style="text-align: center;">
            <label style="font-weight:lighter; text-align: center;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN DEL REPORTE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</label>
          </td>
        </tr>  
        
      </tbody>
    </table>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <table>
      <thead>
        <tr>
          <td align="center">
            <strong>Vo. Bo.</strong>
          </td>
          <td align="center">
            <strong>REVISO</strong>
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
        </tr>
        <tr>
          <td>
            <strong>LIC. JOSÉ LAURO VILLAS RIVAS</strong>
          </td>
          <td>
            <strong>MTRA. ERIKA CAROLINA MALPICA ALCÁNTARA</strong>
          </td>
        </tr>
        <tr>
          <td>
            <strong>DIRECTOR EJECUTIVO DE ADMINISTRACIÓN</strong>
          </td>
          <td>
            <strong>JEFA DEL DEPARTAMENTO DE RECURSOS </strong>
            <br>
            <strong>MATERIALES Y SERVICIOS GENERALES</strong>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <strong>FORMULÓ</strong>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            ________________________________________
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <strong>FELIX SALCEDO DEL ÁNGEL</strong>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <strong>TÉCNICO C</strong>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br>
  <br>
  <br>
  <div class="row" align="right">
    <label>Página:   {{ $pagina }} </label>
  </div>
  </body>
</html>