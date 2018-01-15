@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  @if(Entrust::hasRole('admin'))
      <div class="row">
        <div class="col-sm-7">
          <div>
            <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Llamadas Atendidas por Agentes</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr style="background: #999">
                      <th>Fecha</th>
                      <th>Recibidas</th>
                      <th>Atendiendo</th>
                      <th>Nivel de Servicio</th>
                      <th>Abandono</th>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">10 de Marzo</td>
                      <td>21.657</td>
                      <td>21.419</td>
                      <td>97,03%</td>
                      <td>1,10%</td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">11 de Marzo</td>
                      <td>17.736</td>
                      <td>17.208</td>
                      <td>92,19%</td>
                      <td>2,98%</td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">12 de Marzo</td>
                      <td>13.731</td>
                      <td>13.652</td>
                      <td>98,33%</td>
                      <td>0,58%</td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">Acumulado Marzo</td>
                      <td>246.018</td>
                      <td>238.381</td>
                      <td>90,69%</td>
                      <td>3,10%</td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">Acumulado 2017</td>
                      <td>1.593.308</td>
                      <td>1.479.050</td>
                      <td>83,37%</td>
                      <td style="color: red; font-weight: bold;">7,17%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                <!-- /.box-body -->

              </div>
            <!-- /.box -->
          </div>
          <div>
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs pull-right">
                <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="true">Historícos</a></li>
                <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">EPSD</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Vocem</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Mercadeo Emotivo</a></li>
                <li class="pull-left header"></i>Fallas del día</li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                  <p>Nivel de Servicio</p>
                  <table class="table table-hover">
                    <tbody>
                      <tr style="background: #999">
                        <th>Año</th>
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Ago</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dic</th>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">2017</td>
                        <td>79,02%</td>
                        <td>85,13%</td>
                        <td>90,69%</td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">2016</td>
                        <td>82,62%</td>
                        <td>89,42%</td>
                        <td>65,93%</td>
                        <td>72,65%</td>
                        <td>68,88%</td>
                        <td>80,11%</td>
                        <td>83,96%</td>
                        <td>69,00%</td>
                        <td>76,79%</td>
                        <td>77,26%</td>
                        <td>40,70%</td>
                        <td>84,82%</td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">2015</td>
                        <td>13.731</td>
                        <td>13.652</td>
                        <td>98,33%</td>
                        <td>0,58%</td>
                      </tr>
                    </tbody>
                  </table>


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                  <div id="chart-container">FusionCharts XT will load here!</div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
        </div>
          <div class="col-md-5">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">EPSD</a></li>
                <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Vocem</a></li>
                <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">Mercadeo Emotivo</a></li>
                <li class="pull-left header"></i>Fallas del día</li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                  <ul>
                    <li>Ticket INC000001000973: Falla Inicializar MMD, Fecha Inicio: 22/05/2016 Hora Inicio: 01:22p.m. En curso.</li>
                    <li>Ticket INC000000720274: Líneas prepago CDMA EVDO que poseen intermitencia en la navegación., Fecha Inicio: 08/05/2016 Hora Inicio: 11:30p.m. En curso.</li>
                    <li>Ticket INC000000999559: Falla Retraso en cobro de renta GSM,  Fecha Inicio: 15/10/2016 Hora Inicio: 09:18p.m. En Curso.</li>
                    <li>Ticket INC000001057134: Tarjetas únicas no reflejadas CDMA, Fecha Inicio: 27/10/2016 Hora Inicio: 08:05p.m. En Curso.</li>
                    <li>Ticket INC000001002015: Falla en la Intranet Operativa (IO) al momento de inicializar clave en Insight (MCY, BTO, PTO), no existe procedimientos de inicialización de movilmensaje, inicialización de clave y eliminación de buzón de voz mediante la IO para los apoyos PTO, BTO y MCY. Fecha Inicio: 30/10/2016 Hora Inicio: 02:42p.m. En Curso.</li>
                    <li>Ticket INC000001072939: Tarjetas únicas no reflejadas GSM 06/12/2016, Soporte  de Averías notifica llevar consolidado de tarjetas GSM bajo el único ticket en mención. Fecha Inicio:07/12/2016 Hora Inicio:</li>
                    <li>Ticket INC000001080802: Falla Sinapsis, Falla aleatoria de ingreso a la GUI y falla de sincronización de roles entre el USM y LDAP. Fecha Inicio: 20/12/2016 Hora Inicio: 08:00a.m. En Curso</li>
                    <li>Ticket INC000001090383: Inconsistencia de Saldo, No recibe bono de promoción navidad 2016, Fecha Inicio: 18/02/2017 Hora Inicio: 05:00p.m En Curso.</li>
                    <li>Ticket INC000001104189: Error al suspender líneas CDMA, Fecha Inicio: 05/03/2017 Hora Inicio 12:00p.m. En Curso.</li>
                    <li>Ticket INC000001107236: Falla envió de SMS Líneas CDMA, Fecha Inicio: 12/03/2017 Hora Inicio: 05:00p.m. En Curso.</li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                  <ul>
                    <li>
                      no presentaron fallas para ese día (se recibió bitácora hasta el día 11-03-2017)
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-2">
                  <ul>
                    <li>
                      no se ha recibido bitácora de fallas.
                    </li>
                  </ul>

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endif
@endsection

@section('script')
<script type="text/javascript" src="{{asset('plugins/fusioncharts/js/fusioncharts.js')}}"></script>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'mscombidy2d',
    renderAt: 'chart-container',
    width: '640',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Prepago EPSD",
            "subCaption": "12 de Marzo 2017",
            "xAxisname": "Intervalos del Día",
            "pYAxisName": "Cantidad de llamadas",
            "sYAxisName": "Porcentajes",
            "numberPrefix": "",
            "sNumberSuffix": "%",
            "sYAxisMaxValue": "100",
            "theme": "fint"
        }, // configuración del grafico
        "categories": [{
            "category": [{
                "label": "8:00 am"
            }, {
                "label": "8:30 am"
            }, {
                "label": "9:00 am"
            }, {
                "label": "9:30 am"
            }, {
                "label": "10:00 am"
            }, {
                "label": "10:30 am"
            }, {
                "label": "11:00 am"
            }, {
                "label": "11:30 am"
            }, {
                "label": "12:00 pm"
            }, {
                "label": "12:30 pm"
            }, {
                "label": "01:00 pm"
            }, {
                "label": "01:30 pm"
            }, {
                "label": "2:00 pm"
            }, {
                "label": "2:30 pm"
            }, {
                "label": "3:00 pm"
            }, {
                "label": "3:30 pm"
            }, {
                "label": "4:00 pm"
            }, {
                "label": "4:30 pm"
            }, {
                "label": "5:00 pm"
            }, {
                "label": "5:30 pm"
            }, {
                "label": "06:00 pm"
            }, {
                "label": "06:30 pm"
            }, {
                "label": "07:00 pm"
            }, {
                "label": "07:30 pm"
            }]
        }], //categorias
        "dataset": [{
            "seriesName": "Atendidas",
            "data": [{
                "value": "300"
            }, {
                "value": "410"
            }, {
                "value": "425"
            }, {
                "value": "450"
            }, {
                "value": "550"
            }, {
                "value": "600"
            }, {
                "value": "540"
            }, {
                "value": "600"
            }, {
                "value": "550"
            }, {
                "value": "540"
            }, {
                "value": "550"
            }, {
                "value": "540"
            }, {
                "value": "500"
            }, {
                "value": "490"
            }, {
                "value": "480"
            }, {
                "value": "420"
            }, {
                "value": "430"
            }, {
                "value": "440"
            }, {
                "value": "500"
            }, {
                "value": "490"
            }, {
                "value": "430"
            }, {
                "value": "420"
            }, {
                "value": "500"
            }, {
                "value": "390"
            }, ]
        }, {
            "seriesName": "Atendidas",
            "data": [{
                "value": "300"
            }, {
                "value": "410"
            }, {
                "value": "425"
            }, {
                "value": "450"
            }, {
                "value": "550"
            }, {
                "value": "600"
            }, {
                "value": "540"
            }, {
                "value": "600"
            }, {
                "value": "550"
            }, {
                "value": "540"
            }, {
                "value": "550"
            }, {
                "value": "540"
            }, {
                "value": "500"
            }, {
                "value": "490"
            }, {
                "value": "480"
            }, {
                "value": "420"
            }, {
                "value": "430"
            }, {
                "value": "440"
            }, {
                "value": "500"
            }, {
                "value": "490"
            }, {
                "value": "430"
            }, {
                "value": "420"
            }, {
                "value": "500"
            }, {
                "value": "390"
            }, ]
        }, //barras
        {
          "seriesName": "Pronóstico",
          "renderAs": "area",
          "showValues": "0",
          "data": [{
              "value": "850"
          }, {
              "value": "900"
          }, {
              "value": "1000"
          }, {
              "value": "1100"
          }, {
              "value": "1120"
          }, {
              "value": "1130"
          }, {
              "value": "1140"
          }, {
              "value": "1150"
          }, {
              "value": "1140"
          }, {
              "value": "1130"
          }, {
              "value": "1120"
          }, {
              "value": "1100"
          }, {
              "value": "1130"
          }, {
              "value": "1000"
          }, {
              "value": "990"
          }, {
              "value": "980"
          }, {
              "value": "950"
          }, {
              "value": "960"
          }, {
              "value": "970"
          }, {
              "value": "970"
          }, {
              "value": "980"
          }, {
              "value": "900"
          }, {
              "value": "850"
          }, {
              "value": "750"
          }
          ] // area
        }, {
            "seriesName": "Nivel de Servicio",
            "parentYAxis": "S",
            "renderAs": "line",
            "showValues": "0",
            "data": [{
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "96%"
            }, {
                "value": "100%"
            }, {
                "value": "97%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "100%"
            }, {
                "value": "82%"
            }, {
                "value": "96%"
            }, {
                "value": "99%"
            }, {
                "value": "100%"
            }]
        }, {
            "seriesName": "Abandono",
            "parentYAxis": "S",
            "renderAs": "line",
            "showValues": "0",
            "data": [{
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "1"
            }, {
                "value": "0"
            }, {
                "value": "1"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "0"
            }, {
                "value": "5"
            }, {
                "value": "1"
            }, {
                "value": "1"
            }, {
                "value": "0"
            }]
        }]
    }
}
);
    fusioncharts.render();
});
</script>

@endsection
