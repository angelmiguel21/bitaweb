@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Reporte</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                   <div class="box-body">
                      <div class="form-group" align="right">
                      <label for="tipo_incidencia" class="control-label col-md-3" >Gráfico:</label>
                        <div class="col-md-4" >
                          <select class="form-control" name="graph" id="graph" required>
                            <option value="">Seleccione</option>
                            <option value="incidencias">Total de Eventos</option>
                            <option value="fallas">Total de incidencias</option>
                             <option value="estatus">Estatus Incidencias</option>
                          </select>
                        </div>
                    
                      <div class="col-sm-3">
                          <a href="{{URL('excel/bitacora')}}" type="button" class="btn btn-primary">Exportar Data</a>
                      </div>
                    </div>
                    <div id="chartContainer" align="center"></div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">

                  </div>
                  <!-- /.box-footer-->
                </div>
                     <!-- Default box -->

			</div>
		</div>
	</div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('plugins/fusioncharts/js/fusioncharts.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#graph').change(function(event) {
        /* Act on the event */
        grafico = $(this).val()
          if (grafico === "incidencias") {
            var evento = $.get("{{URL('/incidencias')}}")
              evento.always(function(data){
                FusionCharts.ready(function(){
                  var revenueChart = new FusionCharts({
                    "type": "column3d",
                    "renderAt": "chartContainer",
                    "width": "1000",
                    "height": "600",
                    "dataFormat": "json",
                    "dataSource": {
                      "chart": {
                          "caption": "Total de Eventos",
                          "subCaption": "2017",
                          "xAxisName": "Incidencias",
                          "yAxisName": "Cantidad",
                          "theme": "fint"
                       },
                      "data":data
                    } //cierra el data source
                  });
                    revenueChart.render();
                  }); // cierre de fusion charts
            }) //cierre de la consulta a la db
          } //cierra el if de grafico de incidencias

          if (grafico === "fallas") {
            var evento = $.get("{{URL('/fallas  ')}}")
              evento.always(function(data){
                FusionCharts.ready(function(){
                  var revenueChart = new FusionCharts({
                    "type": "column3d",
                    "renderAt": "chartContainer",
                    "width": "1000",
                    "height": "600",
                    "dataFormat": "json",
                    "dataSource": {
                      "chart": {
                          "caption": "Total de Incidencias",
                          "subCaption": "2017",
                          "xAxisName": "Incidencias",
                          "yAxisName": "Cantidad",
                          "theme": "fint"
                       },
                      "data":data
                    } //cierra el data source
                  });
                    revenueChart.render();
                  }); // cierre de fusion charts
            }) //cierre de la consulta a la db
          }// cierra el if del grafico de eventos

          if (grafico === "estatus") {
            var evento = $.get("{{URL('/estatus')}}")
              evento.always(function(data){
                FusionCharts.ready(function(){
                  var revenueChart = new FusionCharts({
                    "type": "pie3d",
                    "renderAt": "chartContainer",
                    "width": "1000",
                    "height": "600",
                    "dataFormat": "json",
                    "dataSource": {
                      "chart": {
                          "caption": "Estatus de Incidencias",
                          "subCaption": "2017",
                          "xAxisName": "Incidencias",
                          "yAxisName": "Cantidad",
                          "theme": "fint"
                       },
                      "data":data
                    } //cierra el data source
                  });
                    revenueChart.render();
                  }); // cierre de fusion charts
            }) //cierre de la consulta a la db
          }// cierra el if del grafico de  estatus


      }); // cierra el .change graph
    }); //Cierra jquery
  </script>
@endsection