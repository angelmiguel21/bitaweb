@extends('adminlte::page')

@section('htmlheader_title')
	Actualizar
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de la incidencia</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          @foreach ($bitacora as $bit)
            <form action=" {{url('/bitacora/')}}/{{$bit->id}}" method="POST" class="form-horizontal" onsubmit="return confirm('Certificar los cambios y guardar?') ">
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="_method" value="put" />
                  <input type="hidden" value=" {{$bit->id}} " id="id">
                  <input type="hidden" value=" {{$bit->proveedor}} " id="prove">
                  <div class="form-group">
                      <label for="proveedor" class="control-label col-md-3" >Usuario:</label>
                      <div class="col-md-3">
                          <input class="form-control" readonly="readonly" name="usuario" id="usuario" value=" {{$bit->usuario->name}} " required>
                      </div>
                      <label for="proveedor" class="control-label col-md-3" >Unidad Afectada:</label>
                      <div class="col-md-3">
                        <select class="form-control multiple" name="proveedor[]" id="proveedor" multiple="multiple" required>
                            @foreach($bit->bita_unidad as $uni)
                                  <option value="{{$uni->unidad->id}}" id="{{$uni->unidad->unidad}}"> {{$uni->unidad->unidad}} </option>
                              @endforeach
                        </select>
                      </div>
                  </div>
              <div class="form-group" >
                <label for="detectado" class="control-label col-md-3">Detectado por:</label>
                  <div class="col-md-3">
                   <input class="form-control" id="detectado" name="detectado" value="{{$bit->detectado}}" required readonly="readonly">
                  </div>
                <label for="telefono" class="control-label col-md-3" >Teléfono:</label>
                  <div class="col-md-3" >
                  <input class="form-control" name="telefono" id="telefono" value="{{$bit->telrepor}}" required readonly="readonly">
                  </div>
              </div>
              <div class="form-group">
                <label for="responsable" class="control-label col-md-3">Responsable:</label>
                  <div class="col-md-3">
                    <select id="responsable" name="responsable" readonly="readonly" class="form-control">
                      <option value="{{$bit->responsables->id}}" selected="selected">{{$bit->responsables->resp_desc}}</option>
                    </select>                  
                  </div>
                <label for="ticket" class="control-label col-md-3">Nivel de Impacto:</label>
                  <div class="col-md-3">
                      <Select class="form-control" type="text" readonly="readonly" id="nivel" name="nivel">
                           <option value="{{$bit->impactos->id}}">{{$bit->impactos->impac_desc}}</option>
                      </Select>
                  </div>
              </div>
              <div class="form-group" >
                <label for="reportado" class="control-label col-md-3">Reportado a:</label>
                     <div class="col-md-3">
                      <select id="reportado" name="reportado" readonly="readonly" class="form-control">
                        <option value="{{$bit->reportados->id}}" selected="selected">{{$bit->reportados->repor_desc}}</option>
                      </select>                          
                      </div>
                <label for="esca_nivel" class="control-label col-md-3" >Nivel del Escalamiento:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="esca_nivel" id="esca_nivel" required readonly="readonly"> 
                            <option value="{{$bit->escalamientos->id}}" selected="selected" >{{$bit->escalamientos->esca_desc}}</option>
                          </select>
                      </div>
              </div>
              <div class="form-group" >
                <label for="ticket" class="control-label col-md-3">No. de Ticket:</label>
                  <div class="col-md-3">
                    <input class="form-control" type="text" id="ticket" name="ticket" value="{{$bit->ticket}}" >
                  </div>
                <label for="ticket" class="control-label col-md-3">Ticket Raíz:</label>
                  <div class="col-md-3">
                    <input class="form-control" type="text" id="ticketraiz" name="ticketraiz" value="{{$bit->ticket_raiz}}" >
                  </div>
              </div>
              <div class="form-group" >
                <label for="estatus" class="control-label col-md-3">Estatus:</label>
                  <div class="col-md-3">
                  <select class="form-control" id="estatus" name="estatus" required>
                    <option value="{{$bit->estatu->id}}" id="{{$bit->estatu->est_desc}}" selected="selected">{{$bit->estatu->est_desc}}</option>
                  </select>
                  </div>
              </div>
              <div class="form-group" >
                <label for="origeninc" class="control-label col-md-3">Origen de la Incidencia:</label>
                  <div class="col-md-9">
                  <textarea class="form-control" type="text" id="origeninc" name="origeninc" required> {{$bit->origen}} </textarea>
                  </div>
              </div>
              <div class="form-group" >
                <label class="control-label col-md-3" for="sintoma">Sintoma:</label>
                  <div class="col-md-9">
                  <textarea class="form-control" type="text" id="sintoma" name="sintoma" required> {{$bit->sintoma}} </textarea>
                  </div>
              </div>
              <div class="form-group" >
                <label class="control-label col-md-3" for="sintoma">Observaciones:</label>
                  <div class="col-md-9">
                  <textarea class="form-control" type="text" id="observacion" name="observacion" required> {{$bit->observacion}} </textarea>
                  </div>
              </div>              
            
             
              @if($bit->certificacion->certificado == "Si")
                  <div class="form-group">
                    <label for="certificado" class="control-label col-md-3" >Certificado:</label>
                      <div class="col-md-3">
                        <input class="form-control" value="{{$bit->certificacion->certificado}}" disabled required >
                        <input type="text" id="certificado" name="certificado" hidden="hidden" value="{{$bit->certificacion->certificado}}">
                      </div>
                    <label for="usuario" class="control-label col-md-3" >Certificado Por:</label>
                      <div class="col-md-3">
                      <input class="form-control" readonly="readonly" name="certificadopor" id="certificadopor" value=" {{Auth::user()->name}}" disabled>

                      </div>
                  </div>
                @else
                @if (Entrust::hasRole(['supervisor','admin']))
                  <div class="form-group">
                    <label for="certificado" class="control-label col-md-3" >Certificado:</label>
                      <div class="col-md-3">
                        <select class="form-control" name="certificado" id="certificado" required>
                          <option value="Si">Si</option>
                          <option value="No" selected="selected">No</option>
                        </select>
                      </div>
                    <label for="usuario" class="control-label col-md-3" >Certificado Por:</label>
                      <div class="col-md-3">
                      <input class="form-control" readonly="readonly"  id="certificadopor" value=" {{Auth::user()->name}} " required>
                      <input type="text" hidden="hidden" value="{{Auth::user()->id}}" name="certificadopor">
                      </div>
                  </div>
                @endif
              @endif
            
              <div class="form-group">
                <div class="col-md-1 col-md-offset-4">
                  <button class="btn btn-warning id" id="aña_evento">Añadir Evento</button>
                </div>
                <div class="col-md-1 col-md-offset-1">
                  <button class="btn btn-warning" type="submit">Guardar Cambios</button>
                </div>
              </div>
            </form>
          @endforeach <!-- /.*************************************************************************** -->        
        </div>
        <!-- /.box-body -->        
      </div>
      <!-- /.box -->

    
      <!-- Incidencias / eventos -->
    @foreach($bitacora as $bit)
      @foreach ($bit->bita_evento as $be)      
    {{--dd($be)--}}
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$be->evento->even_desc}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" class="form-horizontal actual" value="{{$be->evento->id}}">
            <input type="text" hidden="hidden" class="id_evento" id="id_evento" value="{{$be->evento->id}}" >
            <input type="text" hidden="hidden" name="token" id="token" value="{{csrf_token()}}">
            <div class="form-group" >
              <label for="tipo_incidencia" class="control-label col-md-3" >Tipo de Incidencia:</label>
                <div class="col-md-3" >
                  <input class="form-control" readonly="readonly" name="tipo_incidencia" id="tipo_incidencia" value="{{$be->evento->incidencia->inci_desc}}" required>                    
                </div>
                <label for="nomb_evento" class="control-label col-md-3" >Nombre del Evento:</label>
                  <div class="col-md-3" >
                    <input class="form-control" readonly="readonly" name="evento" id="ev_evento" value="{{$be->evento->even_desc}}" required>
                      <!-- Eventos-->                    
                  </div>
            </div>
            <div class="form-group" >
              <label for="fechaini" class="control-label col-md-3" >Fecha y hora de Inicio:</label>
                <div class="col-md-3" >
                <input class="form-control form_datetime" type="text" id="fechaini" name="fechaini" value="{{$be->fec_detect}}" required>
                </div>

              <label for="fecrepor" class="control-label col-md-3" >Fecha y hora de Escalamiento:</label>
                <div class="col-md-3" >
                <input class="form-control form_datetime" type="text" id="fecrepor" name="fecrepor" value="{{$be->fec_repor}}" required>
                </div>
            </div>
            <div class="form-group" >
              <label for="fecticket" class="control-label col-md-3">Fecha Inicio del ticket:</label>
                <div class="col-md-3">
                  <input class="form-control form_datetime" type="text" id="fecticket" name="fecticket" value="{{$be->fec_initicket}}">
                </div>
              <label for="feculmina" class="control-label col-md-3">Fecha de Culminación:</label>
                <div class="col-md-3">
                  <input class="form-control form_datetime" type="text" id="feculmina" name="feculmina" value="{{$be->fec_culmina}}">
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-1 col-md-offset-5">
                <button class="btn btn-warning id" type="submit">Actualizar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /Incidencias / eventos  -->
      @endforeach
  @endforeach


        <!-- /.modal para redireccion actualización de ticket -->
        <div class="modal fade" id="modalPregunta">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button style="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Confirmación!!!</h4>
              </div>
              <div class="modal-body" align="center">
                <h4><strong>Desea actualizar el evento?</strong></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-right" aria-hidden="true" id="botonactualiza">Actualizar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-hidden="true" style="margin-right: 10px">No</button>                
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
                <form action="" class="form-horizontal" id="añadir">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="text" id="id_bita" hidden="hidden" value="{{$bit->id}}">
                  <div class="form-group" id="hticket">
                    <label for="nticket" class="control-label col-sm-4">Número de Ticket:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="nticket" name="nticket" disabled="disabled" value="{{$bit->ticket}}" >
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
                        <select class="form-control" name="evento" id="evento" required></select>
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
            </div>
          </div>
        </div>
        <!-- /.modal para creación  de eventos -->

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
  <script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>

<script type ="">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
  });
  
</script>
  <script type="text/javascript">
    

    $(document).ready(function() {
      $.get( "{{URL('/unidades')}}",function(data){
        for(var i=0; i<data.length; i++){
          var uni = data[i].unidad
          if ($("#"+uni+"").length == 1) {
            $("#"+uni+"").prop('selected', 'true')
          } else {
            $("#proveedor").append('<option id="'+data[i].unidad+'" value="'+data[i].id+'" >'+data[i].unidad+'</option>');
          }

        }
          //select2
            $(".multiple").select2();
          // cierre de select2
      });// cierra el get de las unidades

      $.get("{{URL('/bita_estatus')}}", function(data){
        for (var i=0; i<data.length; i++) {
          var estatus = data[i].est_desc
          if ($("#"+estatus).length == 1) {
            $("#"+estatus).prop('selected', 'true')
          } else {
            $("#estatus").append('<option id="'+data[i].est_desc+'" value="'+data[i].id+'" >'+data[i].est_desc+'</option>');
          }
        }
      });


      $.get( "{{URL('/incidencia')}}",function(data){
        for(var i=0; i<data.length; i++){
          $("#incidencia").append('<option value="'+data[i].id+'">'+data[i].inci_desc+'</option>');
        }
      });// cierra el get de las incidencias

      $('#incidencia').change(function(){
        id_inci = $('#incidencia').val()
        $.get( "{{URL('/evento')}}"+"/"+id_inci,function(data){
            for(var i=0; data.length; i++){
              $("#evento").append('<option value="'+data[i].id+'">'+data[i].even_desc+'</option>');
            }// for
        });//fin del desplegable Modelo
      });// cierre .change

      //datetimepicker
      $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:'es'
      });
      //cierre datetimepicker

      // Actualizar eventos

      $('.actual').submit(function(e){
        e.preventDefault();
        id = $(this).find(".id_evento").val();
        console.log(id)
        $('#modalPregunta').modal('show');
           data = $(this).serializeArray()
           console.log(data)
        $('#botonactualiza').click(function(){  
            console.log(data)       
          var array = ['id " : "' + id]
          for (var i = 0; i < data.length; i++) {
            var name = data[i].name
            var valor = data[i].value
            array.push(name +'" : "'+ valor)
          }
          $.ajax({
            method: "POST",
            url: "{{URL('/ajax/evento')}}"+"/"+id,
            data: data,
            dataType: "JSON",
          })
          .done(function(data){
            alert('Evento Actualizado')
          })
          $('#modalPregunta').modal('hide');
        //        window.location.href = "{{URL('/bitacora')}}"+"/"+id+"/edit"
        }) // cierra el click al boton actualizar
      })//cierre el .submit actualizar erventos

        $('#aña_evento').click(function(e){
            e.preventDefault();
            $('#modalEventos').modal({backdrop:'static', keyboard:false, show:true});
        });

      // añade evento nuevo
        $('#añadir').submit(function(e){
          $('#modalEventos').modal('hide')
          e.preventDefault();
            id_bita = $('#id_bita').val();
            data = $(this).serializeArray()
          $.ajax({
            method: "POST",
            url: "{{URL('/ajax/añadir/evento')}}"+"/"+id_bita,
            data: data,
            dataType: "JSON",
          })
            .done(function(data){ /// continuar este desarrollo de esta funcionalidad.
              location.reload(true);
              alert('Evento agregado');
          }) //cierra ajax
        }); //Finaliza la funcion .click

      //


    }); //Cierra jquery


  </script>
@endsection