<?php

use Illuminate\Database\Seeder;
use App\areas;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new areas();
        $area->idarea = '01';
        $area->nombrearea = 'PRESIDENCIA DEL CONSEJO GENERAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '02';
        $area->nombrearea = 'CONSEJEROS ELECTORALES';
        $area->save();
        
        $area = new areas();
        $area->idarea = '03';
        $area->nombrearea = 'SECRETARÍA EJECUTIVA';
        $area->save();
        
        $area = new areas();
        $area->idarea = '04';
        $area->nombrearea = 'ORGANO INTERNO DE CONTROL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '05';
        $area->nombrearea = 'D. E. DE PRERROGATIVAS Y PARTIDOS POLÍTICOS';
        $area->save();
        
        $area = new areas();
        $area->idarea = '06';
        $area->nombrearea = 'D. E. DE ORGANIZACIÓN ELECTORAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '07';
        $area->nombrearea = 'D. E. DE CAPACITACIÓN ELECTORAL Y EDUCACIÓN CÍVICA';
        $area->save();
        
        $area = new areas();
        $area->idarea = '08';
        $area->nombrearea = 'D. E. DE ADMINISTRACIÓN';
        $area->save();
        
        $area = new areas();
        $area->idarea = '09';
        $area->nombrearea = 'D. E. DEL SERVICIO PROFESIONAL ELECTORAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '10';
        $area->nombrearea = 'D. E. DE ASUNTOS JURÍDICOS';
        $area->save();
        
        $area = new areas();
        $area->idarea = '11';
        $area->nombrearea = 'UNIDAD TÉCNICA DE COMUNICACIÓN SOCIAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '12';
        $area->nombrearea = 'UNIDAD TÉCNICA DE SERVICIOS INFORMÁTICOS';
        $area->save();
        
        $area = new areas();
        $area->idarea = '13';
        $area->nombrearea = 'UNIDAD TÉCNICA DE PLANEACIÓN';
        $area->save();
        
        $area = new areas();
        $area->idarea = '14';
        $area->nombrearea = 'UNIDAD TECNICA EDITORIAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '15';
        $area->nombrearea = 'BODEGA';
        $area->save();
        
        $area = new areas();
        $area->idarea = '16';
        $area->nombrearea = 'UNIDAD DE FISCALIZACIÓN';
        $area->save();
        
        $area = new areas();
        $area->idarea = '17';
        $area->nombrearea = 'UNIDAD TÉCNICA DE TRANSPARENCIA';
        $area->save();
        
        $area = new areas();
        $area->idarea = '18';
        $area->nombrearea = 'CONSEJO DISTRITAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '19';
        $area->nombrearea = 'UNIDAD TÉCNICA DE OFICIALÍA ELECTORAL';
        $area->save();
        
        $area = new areas();
        $area->idarea = '20';
        $area->nombrearea = 'UNIDAD TÉCNICA DEL SECRETARIADO';
        $area->save();
        
        $area = new areas();
        $area->idarea = '21';
        $area->nombrearea = 'UNIDAD TÉCNICA DE IGUALDAD DE GENERO E INCLUSIÓN';
        $area->save();
        
        $area = new areas();
        $area->idarea = '22';
        $area->nombrearea = 'UNIDAD TÉCNICA DEL CENTRO DE  FORMACIÓN Y DESARROLLO';
        $area->save();
        
        $area = new areas();
        $area->idarea = '23';
        $area->nombrearea = 'UNIDAD TECNICA DE VINCULACIÓN CON LOS ORG. DESC.';
        $area->save();
    }
}
