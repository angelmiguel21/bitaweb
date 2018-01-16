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
                  <h3 class="box-title">Title</h3>

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
                        <th>Nombre</th>
                        <th>Usuario </th>
                        <th>Correo</th>
                        <th>Perfil</th>
                      </tr>
                    </thead>

                    </table>
                </div>
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

@section('script')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/jquery.dataTables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ URL::asset('plugins/jquery.dataTables.js') }}"></script>
    <script type="text/javascript">
                  $(document).ready(function() {
                $("#example").dataTable({
                    "ajax": "{{URL('/tabla/usuario')}}",
                    "columns": [
                    { data: "id"},
                    { data: "name"},
                    { data: "usuario" },
                    { data: "email" },
                    { data: "unidad" },
                ]
                })

            } );
    </script>
@endsection