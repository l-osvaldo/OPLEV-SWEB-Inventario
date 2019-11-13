<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte | Importe de bienes por año de adquisición | OPLE Veracruz</title>
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
        height: 23px;
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
              <small>Importe de Bienes Calendarizados por Año de Adquisición</small>
            </h2>
          </td>
        </tr>
      </table>

      <label><strong>Fecha de Impresión: </strong></label>
      <table>
        <thead>
          <tr>
            <th colspan="15">
              Año de Adquisición {{ $anioAdquisicion->anioAdquisicion }}
            </th>
          </tr>
          <tr style="background-color: #ccc; border: solid 1px #000;">
              <th style="text-align: center; padding: 15px">Partida</th>
              <th style="text-align: center; padding: 15px" width="35%">Clasificación del bien</th>
              <th style="text-align: center; padding: 15px">Ene</th>
              <th style="text-align: center; padding: 15px">Feb</th>
              <th style="text-align: center; padding: 15px">Mar</th>
              <th style="text-align: center; padding: 15px">Abr</th>
              <th style="text-align: center; padding: 15px">May</th>
              <th style="text-align: center; padding: 15px">Jun</th>
              <th style="text-align: center; padding: 15px">Jul</th>
              <th style="text-align: center; padding: 15px">Ago</th>
              <th style="text-align: center; padding: 15px">Sep</th>
              <th style="text-align: center; padding: 15px">Oct</th>
              <th style="text-align: center; padding: 15px">Nov</th>
              <th style="text-align: center; padding: 15px">Dic</th>
              <th style="text-align: center; padding: 15px">Totales</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($partidas as $partida)
            <tr>
              <td  style="text-align: left; padding: 2px 12px" > {{ $partida->partida }}</td>
              <td  style="text-align: left; padding: 2px 12px" > {{ $partida->descpartida }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[0] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[1] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[2] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[3] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[4] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[5] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[6] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[7] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[8] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[9] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[10] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->meses[11] }}</td>
              <td  style="text-align: right; padding: 2px 12px" > {{ $partida->total }}</td>               
            </tr>
          @endforeach
        </tbody>
      </table>
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
      <div style="page-break-after:auto;"></div>
  </body>
</html>