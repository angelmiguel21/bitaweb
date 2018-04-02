@extends('adminlte::page')

@section('htmlheader_title')
	Registrar
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Registro de Bitácora <span id="idticket"></span></h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <form action=" {{url('/bitacora')}} " method="post" class="form-horizontal">
                                                        {{ csrf_field() }}
                    <div class="form-group">
                      <label for="proveedor" class="control-label col-md-3" >Usuario:</label>
                        <div class="col-md-3">
                        <input type="hidden" name="usuario_id" id="usuario_id" value=" {{ Auth::user()->id }} ">
                        <input class="form-control" readonly="readonly" name="usuario" id="usuario" value=" {{ Auth::user()->name }} ">
                        </div>
                        <label for="proveedor" class="control-label col-md-3" >Unidad Afectada:</label>
                        <div class="col-md-3">
                          <select class="form-control multiple" name="proveedor[]" id="proveedor" multiple="multiple" required></select>
                        </div>
                    </div>

                    <div class="form-group" >
                      <label for="detectado" class="control-label col-md-3">Detectado por:</label>
                        <div class="col-md-3">
                        <input class="form-control" id="detectado" name="detectado" required>
                        </div>
                      <label for="telefono" class="control-label col-md-3" >Teléfono:</label>
                        <div class="col-md-3" >
                        <input class="form-control" name="telefono" id="telefono" >
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="responsable" class="control-label col-md-3">Responsable:</label>
                        <div class="col-md-3">
                        <select class="form-control" type="text" id="responsable" name="responsable" required>
                            <option value="" disabled="disabled" selected="selected">Seleccione</option>
                        </select>
                        </div>

                      <label for="ticket" class="control-label col-md-3">Nivel de Impacto:</label>
                        <div class="col-md-3">
                        <Select class="form-control" type="text" id="nivel" name="nivel" >
                          <option value="" disabled="disabled" selected="selected">Seleccione</option>
                        </Select>
                        </div>
                    </div>

                    <div class="form-group" >
                      <label for="reportado" class="control-label col-md-3">Reportado a:</label>
                        <div class="col-md-3">
                        <select class="form-control" id="reportado" name="reportado" required>
                          <option value="" disabled="disabled" selected="selected">Seleccione</option>
                        </select>

                        </div>
                      <label for="esca_nivel" class="control-label col-md-3" >Nivel del Escalamiento:</label>
                        <div class="col-md-3">
                        <select class="form-control" name="esca_nivel" id="esca_nivel" required>
                          <option value="" disabled="disabled" selected="selected">Seleccione</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group" >
                      <label for="estatus" class="control-label col-md-3">Estatus:</label>
                        <div class="col-md-3">
                        <select class="form-control" id="estatus" name="estatus" required>
                          <option value="" disabled="disabled" selected="selected">Seleccione</option>
                        </select>
                        </div>

                    <div class="col-sm-3 col-sm-offset-3">
                      <button type="button" class="btn btn-warning btn-block" aria-hidden="true" id="aña_evento">Añadir / Consultar Eventros</button>
                    </div>

                    </div>

                    <div class="form-group" >
                      <label for="origeninc" class="control-label col-md-3">Origen de la Incidencia:</label>
                        <div class="col-md-9">
                        <textarea class="form-control" type="text" id="origeninc" name="origeninc" required></textarea>
                        </div>
                    </div>
                    <div class="form-group" >
                      <label class="control-label col-md-3" for="sintoma">Sintoma:</label>
                        <div class="col-md-9">
                        <textarea class="form-control" type="text" id="sintoma" name="sintoma" required></textarea>
                        </div>
                    </div>
                    <div class="form-group" >
                      <label class="control-label col-md-3" for="sintoma">Observaciones:</label>
                        <div class="col-md-9">
                        <textarea class="form-control" type="text" id="observacion" name="observacion" required></textarea>
                        </div>
                    </div>

                    <input type="text" hidden="hidden" id="selecevento" name="selecevento[]" value="">
                    <input type="text" hidden="hidden" id="numeroticket" name="numeroticket" value="">
                    <div class="form-group">
                      <div class="col-md-1 col-md-offset-4">
                        <button class="btn btn-warning" type="submit">Registrar</button>
                      </div>
                      <div class="col-md-5 col-md-offset-2">
                        <button class="btn btn-warning" type="reset">Reiniciar</button>
                      </div>
                    </div>

                  </form>
                </div>

                <!-- /.modal para redireccion actualización de ticket -->
                <div class="modal fade" id="existe">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button style="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Oppps!!!</h4>
                      </div>
                      <div class="modal-body">
                        <p>
                          El Número de ticket ingresado se encuentra registrado
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                        <button type="button" class="btn btn-warning" aria-hidden="true" id="actualiza">Actualizar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.modal para redireccion actualización de ticket -->


                <!-- /.modal para creación  de eventos -->
                <div class="modal fade" id="modalEventos">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button style="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Ingrese los Eventos</h4>
                      </div>
                      <div class="modal-body">
                        <form action="" class="form-horizontal">

                          <div class="form-group" >
                            <label for="ticket" class="control-label col-md-4">Ticket:</label>
                              <div class="col-md-6">
                                <select class="form-control" type="text" id="ticket" name="ticket" required>
                                  <option value="">Seleccione</option>
                                  <option value="n/a">No aplica</option>
                                  <option value="aplica">Aplica</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group" id="hticket">
                            <label for="nticket" class="control-label col-sm-4">Número de Ticket:</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" id="nticket" name="nticket" placeholder="INCXXXXXXXXX" >
                              </div>
                          </div>

                          <div class="form-group" >
                            <label for="tipo_incidencia" class="control-label col-md-4" >Tipo de Incidencia:</label>
                              <div class="col-md-6" >
                                <select class="form-control" name="incidencia" id="incidencia" required>
                                  <option value="">Seleccione</option>
                                </select>

                              </div>
                          </div>

                          <div class="form-group">
                            <label for="nomb_evento" class="control-label col-md-4" >Nombre del Evento:</label>
                              <div class="col-md-6" >
                                <select class="form-control" name="evento[]" id="evento" required></select>
                              </div>
                          </div>

                          <div class="form-group" >
                            <label for="detecta" class="control-label col-md-4" >Fecha y hora de detección:</label>
                              <div class="col-md-6" >
                                <input class="form-control form_datetime" type="text" id="detecta" name="detecta" placeholder="{{date('d-m-Y H:i')}}" required>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="reporta" class="control-label col-md-4" >Fecha y hora Reportado:</label>
                              <div class="col-md-6" >
                                <input class="form-control form_datetime" type="text" id="reporta" name="reporta" placeholder="{{date('d-m-Y H:i')}}" required>
                              </div>
                          </div>

                          <div class="form-group" >
                            <label for="initicket" class="control-label col-md-4" >Fecha y hora de Inicio:</label>
                              <div class="col-md-6" >
                                <input class="form-control form_datetime" type="text" id="initicket" name="initicket" placeholder="{{date('d-m-Y H:i')}}" required="required">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="culmina" class="control-label col-md-4">Fecha de Solución:</label>
                              <div class="col-md-6">
                                <input class="form-control form_datetime" type="text" id="culmina" name="culmina" placeholder="{{date('d-m-Y H:i')}}">
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-1 col-md-offset-5">
                              <button class="btn btn-warning" id="agregar" type="submit">Añadir</button>
                            </div>
                          </div>

                        </form>
                      </div>

                      <div class="modal-footer">
                      <div>
                        <table class="table table-hover" id="tablaEventos">
                          <thead >
                            <tr>
                              <th>Incidencia</th>
                              <th>Evento</th>
                              <th>Detectado</th>
                              <th>Reportado</th>
                              <th>Fecha del Ticket</th>
                              <th>Culminado</th>
                            </tr>
                          </thead>
                          <tbody id="tebody">

                          </tbody>

                        </table>
                      </div>

                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="finaliza" aria-hidden="true">Finalizar</button>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /.modal para creación  de eventos -->

                <!-- /.box-body -->
                <div class="box-footer">
                  Footer
                </div>
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->

			</div>
		</div>
	</div>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('plugins/datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" href=" {{asset('plugins/select2.min.css')}} "  />
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('plugins/datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('plugins/datetimepicker/js/locales/bootstrap-datetimepicker.es.js')}}"></script>
  <script type="text/javascript" src="{{asset('plugins/select2.min.js')}}"></script>


  <script type="text/javascript">
    $(document).ready(function() {

      $('#hticket').hide();
      $('#tablaEventos').hide();
      $('#modalEventos').modal({backdrop:'static', keyboard:false, show:true});
      $('#aña_evento').click(function(){
        $('#modalEventos').modal({backdrop:'static', keyboard:false, show:true});
      });

      $.get( "{{URL('/unidades')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#proveedor").append('<option value="'+data[i].id+'">'+data[i].unidad+'</option>');
        }
      });// cierra el get de las unidad

      $.get( "{{URL('/responsables')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#responsable").append('<option value="'+data[i].id+'">'+data[i].resp_desc+'</option>');
        }
      });// cierra el get de las responsables

      $.get( "{{URL('/reportados')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#reportado").append('<option value="'+data[i].id+'">'+data[i].repor_desc+'</option>');
        }
      });// cierra el get de las reportado

      $.get( "{{URL('/bita_estatus')}}",function(data){
        console.log(data)
        for(var i=0; i<data.length; i++){
          $("#estatus").append('<option value="'+data[i].id+'">'+data[i].est_desc+'</option>');
        }
      });// cierra el get de las estatus

      $.get( "{{URL('/impactos')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#nivel").append('<option value="'+data[i].id+'">'+data[i].impac_desc+'</option>');
        }
      });// cierra el get de las nivel de impacto

      $.get( "{{URL('/escalamientos')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#esca_nivel").append('<option value="'+data[i].id+'">'+data[i].esca_desc+'</option>');
        }
      });// cierra el get de las escalados


      $.get( "{{URL('/incidencia')}}",function(data){
        console.log(data)
        for(var i=0; i<data.length; i++){
          $("#incidencia").append('<option value="'+data[i].id+'">'+data[i].inci_desc+'</option>');
        }
      });// cierra el get de las incidencias

      $('#incidencia').change(function(){
         $("#evento").empty()
        id_inci = $('#incidencia').val()
        $.get("{{URL('/evento')}}"+"/"+id_inci,function(data){
            for(var i=0; data.length; i++){
              $("#evento").append('<option value="'+data[i].id+'">'+data[i].even_desc+'</option>');
            }// for
        });//fin del desplegable Modelo
      });// cierre .change

      //datetimepicker
      $(".form_datetime").datetimepicker({
        format: 'dd-mm-yyyy hh:ii',
        language:'es',
        inline: true,
        sideBySide: true
      });
      //cierre datetimepicker
      //
      //select2
        $(".multiple").select2();
      // cierre de select2

        $('#nticket').focusout(function() {
          var ticket = $('#nticket').val();
          $.get("{{URL('/ticket')}}"+"/"+ticket, function(data) {
            for (var i = 0; i < data.length; i++) {
              id = data[i].id;
            }
           if (id > 0) {
              $('#modalEventos').modal('hide');
              $('#existe').modal({backdrop:'static', keyboard:false, show:true});
              $('#actualiza').click(function(){
                window.location.href = "{{URL('/bitacora')}}"+"/"+id+"/edit"
              })
           } else {
              // que hacer si no existe
           }
          });
        }); // cierra el modal que verifica lsi un ticket esta duplicado.

        $('#ticket').change(function() {
          var seleccion = $('#ticket').val();
          if (seleccion == "aplica") {
            $('#hticket').show('slow');
        } // cierra el if
        else {
          $('#hticket').hide('fast');
        }
        }); // cierra el .change

        $('#agregar').click(function(e){
          e.preventDefault();

          var incidencia = $('#incidencia').val();
          var inci_text = $('#incidencia option:selected').text();
          var evento = $('#evento').val();
          var even_text = $('#evento option:selected').text();
          var detecta = $('#detecta').val();
          var reporta = $('#reporta').val();
          var initicket =  $('#initicket').val();
          var culmina = $('#culmina').val();
          var ticket = $('#nticket').val();

          $('#idticket').append('Ticket: '+ticket);
          $('#numeroticket').val(ticket);

          if (incidencia != "" && evento != "" && detecta != "" && reporta != "" && initicket != "" ) {

            $('#tablaEventos').show('fast');

            var row = '<tr><td>'+inci_text+'</td><td>'+even_text+'</td><td>'+detecta+'</td><td>'+reporta+'</td><td>'+initicket+'</td><td>'+culmina+'</td><td style="display:none;">'+incidencia+'</td><td style="display:none;">'+evento+'</td></tr>'

              $('#tebody').append(row);
              $('#incidencia').val('');
              $('#evento').val('');
              $(ticket).prop('disabled', true)
            } // cierra el if de la validacion de los campos llenos
          else {
            alert("Complete los campos vacios para continuar")
          }
        }); //cierra la funcion de agregar elementos a la tabla modalEvent

        // prueba de creacion de array desde table
        //

        $('#finaliza').click(function() {

        var even = $('#tebody tr').map(function (i, row) {
          return {
            'incidencia': row.cells[0].textContent,
            'evento': row.cells[1].textContent,
            'fechadetect': row.cells[2].textContent,
            'fecharepor': row.cells[3].textContent,
            'fechainicio': row.cells[4].textContent,
            'fechaculmina': row.cells[5].textContent,
            'inci_id': row.cells[6].textContent,
            'even_id': row.cells[7].textContent,
          }

      }).get();
        console.log(even)
        var seleccion = JSON.stringify(even);
        $('#selecevento').val(seleccion);
        }) // cierra .click que convierte tabla en array

    }); //Cierra jquery


  </script>
@endsection