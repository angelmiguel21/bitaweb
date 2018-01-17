@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

                  <!-- Default box -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Casos registrados</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <table id="example" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Estatus</th>
                            <th>Ticket</th>
                            <th>Evento</th>
                            <th>Escalado</th>
                            <th>Certificar</th>
                          </tr>
                        </thead>

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <!-- Incluior el texto en caso de querer agregar alguna información en el footer-->
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!-- /.box -->

			</div>
		</div>
	</div>
@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/DataTables/dataTables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/css/buttons.dataTables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/dataTables.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/dataTables.buttons.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/buttons.html5.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/buttons.print.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/JSZip-2.5.0/jszip.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/pdfmake-0.1.32/pdfmake.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/pdfmake-0.1.32/vfs_fonts.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/DataTables/idiomadatatable.js') }}"></script>

    <script type="text/javascript">
                  $(document).ready(function() {

                   //console.log(idioma);
                $("#example").dataTable({
                    "language": español,
                   /* "dom": 'Bfrtip',
                    "buttons": [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                    ],*/
                    "ajax": "{{URL('/tabla/bitacora')}}",
                    "columns": [
                      { data: "id"},
                      { data: "estatu.est_desc"},
                      { data: "ticket",},
                      { name: "evento", data: "bita_evento", render: "[, ].evento.even_desc" },
                      { data: "escalamientos.esca_desc" },
                      //{ data: "certificado", name: "certificacions.certificado" },
                      { data: "action", orderable: false, searchable:false}
                    ]

                })

            } );
    </script>

@endsection