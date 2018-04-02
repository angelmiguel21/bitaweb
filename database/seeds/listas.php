<?php

use Illuminate\Database\Seeder;

class listas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//poblado tabla de incidencias
      $incidencias = [
        'Eventos Externos',
        'Eventos Informativos',
        'Herramientas y Aplicaciones',
        'Plataforma de Atención',
        'Servicios',
        'Ventanas de Mantenimiento'
      ];

      foreach ($incidencias as $incidencia) {
        DB::table('incidencias')->insert([
          'inci_desc' => $incidencia,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin del poblado de tabla incidencias
      //poblado de tabla de eventos
      $eventos = [
        [1,'Absentismo'],
        [1,'Corte de Fibra'],
        [1,'Falla Electrica a nivel Nacional'],
        [1,'Falla Electrica a nivel Regional'],
        [1,'Falla Electrica en el centro de llamadas'],
        [1,'Falla Electrica en la zona'],
        [1,'Falta personal'],
        [1,'Fenómenos Naturales (Terremotos, Sismos, Inundación)'],
        [1,'Gases Tóxicos en los centros de llamadas'],
        [1,'Incendio en el centro de llamadas'],
        [2,'Mensaje Masivo Cobranza'],
        [2,'Otros(Especifique en las observaciones)'],
        [2,'Promociones planificadas de productos y servicios'],
        [2,'SMS Proactivo'],
        [3,'Caída avaya IP Agent'],
        [3,'Congestión'],
        [3,'F/S Detalle Operativo'],
        [3,'F/S Plataforma Prepago'],
        [3,'F/S RBS'],
        [3,'F/S SDF (Consulta de factura Digital)'],
        [3,'Falla Aplicación Sawer'],
        [3,'Falla Celular Virtual'],
        [3,'Falla Con HLR'],
        [3,'Falla con HLR (Facturación)'],
        [3,'Falla con Intranet Movilnet'],
        [3,'Falla con LDAP Autogestion'],
        [3,'Falla con Ubica Tu Carro'],
        [3,'Falla de Activación'],
        [3,'Falla de Activación NSE'],
        [3,'Falla de Asterisk'],
        [3,'Falla de Prepago en Línea Training'],
        [3,'Falla de Segmentación'],
        [3,'Falla en Aplicaciones Corporativas'],
        [3,'Falla en Estaciones'],
        [3,'Falla en Prepago en Línea y Swac'],
        [3,'Falla en SICIS WEB'],
        [3,'Falla en Swac Training'],
        [3,'Falla Inconcert Supervisor'],
        [3,'Falla MCP'],
        [3,'Falla OVAM'],
        [3,'Falla para inicializar MMD'],
        [3,'Falla Problema de Red'],
        [3,'Falla RTB'],
        [3,'Falla SISE WORKFLOW'],
        [3,'Falla SWAC'],
        [3,'Fallas con OVAM'],
        [3,'Fallas con Prepago en Línea'],
        [3,'Fallas con REcarga Virtual'],
        [3,'Fallas con X-pert'],
        [3,'Fallas Sinapsis'],
        [3,'Fallas en aplicación Club Plan'],
        [3,'Fallas en Tienda Virtual'],
        [3,'Fallas Punto de Venta'],
        [3,'Fuera de Servicio Roaming INternacional'],
        [3,'Falla de aplicación de emergencias *1'],
        [4,'Alto tráfico de llamadas por desborde'],
        [4,'Alto tráfico de llamadas por rellamadas'],
        [4,'Baja afluencia de llamadas'],
        [4,'Bloqueo de Canales Asterisk-Inconcert'],
        [4,'cierre de Canales'],
        [4,'Congestión'],
        [4,'Falla ABA'],
        [4,'falla de Inconcert Agente'],
        [4,'Falla de Intranet Operacional'],
        [4,'Falla de recepción de llamadas *611'],
        [4,'Falla de segmentación'],
        [4,'Falla emisión de llamadas'],
        [4,'falla en avaya'],
        [4,'Falla en CTI Connector'],
        [4,'Falla en Inconcert Agente'],
        [4,'Falla en IVR'],
        [4,'falla en mercados'],
        [4,'Falla Energía Electrica'],
        [4,'Falla IVR'],
        [4,'Falla Problema de red'],
        [4,'Falla Tono Ocupado'],
        [4,'Fallas con Enrutamiento de Llamadas'],
        [4,'Fallas de SMS'],
        [4,'Incumplimiento de adhesión'],
        [4,'Llamadas caídas'],
        [4,'Llamadas mudas'],
        [4,'Problemas con Jphone'],
        [4,'Reinicio de Servidores'],
        [5,'ACT:Lista Negra SMS CDMA'],
        [5,'Cobro Errado de Llamadas'],
        [5,'Cobro errado de Planes y Servicios'],
        [5,'Cobro errado de SMS'],
        [5,'Cobro errado SMS'],
        [5,'Congestión'],
        [5,'Congestión de llamadas'],
        [5,'F/S A Tono Contigo'],
        [5,'F/S AGL'],
        [5,'F/S Celdas'],
        [5,'F/S Chat'],
        [5,'F/S EVDO'],
        [5,'F/S Página www.movilnet.com.ve'],
        [5,'F/S Servicio Compra Tu Saldo'],
        [5,'F/S Servicio Wap / Brew'],
        [5,'F/S Servicio Wap/Brew'],
        [5,'F/S Transferencia de Saldo'],
        [5,'Falla *101'],
        [5,'Falla *21'],
        [5,'Falla *5'],
        [5,'Falla *Compras'],
        [5,'Falla ABA'],
        [5,'Falla ABA movil Inalambrico'],
        [5,'Falla con *9'],
        [5,'Falla de Cobertura'],
        [5,'Falla de Emisión de llamadas'],
        [5,'Falla de Emisión/Recepción de Llamadas'],
        [5,'Falla de recepción de llamadas'],
        [5,'Falla Donde Estas?'],
        [5,'Falla MMS'],
        [5,'Falla recepción SMS LIBRE / PCM'],
        [5,'Falla Roaming Global'],
        [5,'Falla SMS'],
        [5,'Fallas con Servicio Control'],
        [5,'Fallas de Servicio Blackberry'],
        [5,'Fallas Servicio Quien Me Llamo'],
        [5,'Fallas Servicio Quien Me Llamó'],
        [5,'Inconsistencia de Saldo'],
        [5,'Llamadas Caídas'],
        [5,'Mensaje Masivo Cobranza'],
        [5,'Promociones Planificadas de Productos y Servicios'],
        [5,'SMS Proactivo'],
        [5,'Transacciones no procesadas'],
        [5,'Transferencia de Saldo'],
        [6,'Ventana de Mantenimiento']
      ];

      foreach ($eventos as $evento) {
        DB::table('eventos')->insert([
          'id_inci' => $evento[0],
          'even_desc' => $evento[1],
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
      }
      // fin del poblado de la tabla de los eventos
      //poblado de tabla de unidades
      $unidades=[
        'Atevir',
        'Activaciones',
        'Alto_consumo',
        'Emergencias',
        'Pospago',
        'Prepago',
        'Reclamos',
        'Roaming',
        'Suspenciones',
        '2do_nivel'
      ];

      foreach ($unidades as $unidad) {
        DB::table('unidad')->insert([
         'unidad' =>$unidad,
         'created_at' => date("Y-m-d H:i:s"),
         'updated_at' => date("Y-m-d H:i:s")
        ]);
      } // fin del foreach
      //fin de poblado de tabla de unidades
      
      // poblado de tabla responsables
      $responsables =[
        'Movilnet',
        'Proveedor'
      ];
      foreach ($responsables as $responsable) {
        DB::table('responsables')->insert([
          'resp_desc' => $responsable,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin poblado de tabla responsables

      //poblado de tabla reportados
      $reportados = [
        'Movilnet',
        'Proveedor'
      ];

      foreach ($reportados as $reportado) {
        DB::table('reportados')->insert([
          'repor_desc' => $reportado,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin de poblado de tabla reportados

      //poblado de tabla estatus
      $estatus = [
        'Abierto',
        'Cerrado'
      ];

      foreach ($estatus as $estatu) {
        DB::table('estatus')->insert([
          'est_desc' => $estatu,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin de poblado de tabla estatus

      //poblado de tabla impacto
      $impactos = [
        'Bajo',
        'Medio',
        'Alto'
      ];

      foreach ($impactos as $impacto) {
        DB::table('impactos')->insert([
          'impac_desc' => $impacto,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin de poblado de tabla impacto

      //poblado de tabla escalamiento
      $escalamientos = [
        'Coordinación',
        'Dirección',
        'Gerencia',
        'Supervisión Senior',
        'Soporte Averías',
        'Supervisores Operativos',
        'Vicepresidencia'
      ];

      foreach ($escalamientos as $escalamiento) {
        DB::table('escalamientos')->insert([
          'esca_desc' => $escalamiento,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin de poblado de tabla escalamiento

      //poblado de tabla proveedor
      $proveedores = [
        'EPSDC',
        'Directa Group',
        'Vocem'
      ];

      foreach ($proveedores as $proveedor) {
        DB::table('proveedores')->insert([
          'prove_desc' => $proveedor,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }
      //fin de poblado de tabla proveedor
    }
}
