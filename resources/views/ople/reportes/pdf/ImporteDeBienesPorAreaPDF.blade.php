<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Importe de bienes por área | OPLE Veracruz<title>
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
    </style>
  </head>
  <body>

  <table>
    <tr>
      <td style="width: 120px;vertical-align: text-top"><img class="logo" src="{{ asset('images/logoople.png') }}" alt=""></td>
      <td style="width: calc(100% - 240px);">
          <h2>
            <small>
            ORGANISMO PÚBLICO LOCAL ELECTORAL <br>
            Dirección Ejecutiva de Administración <small style="font-weight:lighter;"><br><br>Departamento de Recursos Materiales</small></small>
          </h2>  
        </span>   
      </td>
      <td style="width: 120px; color:#fff">...</td>
    </tr>
  </table>
  
  <div class="row">
    <strong> <i> Fecha de Impresión: &nbsp;  </i> </strong> <br>
  </div>
  

  {{-- <div class="row">
    <table style="margin-top: 15px;">
      <thead>
        <tr style="background-color: #ccc; border: solid 1px #000;">
          <th style="text-align: left; padding: 15px">Nombre del Destinatario</th>
          <th style="text-align: center; padding: 15px">Correspondencia en el mes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($areas as $area)
          <tr>
            <td style="text-align: left; padding: 2px 12px" class="border"> {{ mb_strtoupper($area->nombre) }} </td>
            <td style="text-align: center" class="border"> {{ $oficialias->where('destinatario', $area->id)->count() }} </td>                                                
          </tr>
        @endforeach
          <tr>
            <td style="text-align: right; padding: 20px 0"> <strong> Total de Correspondencia </strong> </td>
            <td style="text-align: center"> <strong> {{ $oficialias->count() }} </strong> </td>                                                
          </tr>
      </tbody>
    </table>
  </div> --}}

  </body>
</html>