@extends('layouts.school')

@section('content')
    <script>
        document.querySelector('body').style.overflow = 'auto';
        var studentId = "{{ $student->id }}";
        var nuevo = "{{ $nuevo }}";
    </script>
    <div class="wrapper" style="overflow: visible">

        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <img height="60px" src="{{ asset('assets/img/beePresent.png') }}">
                            &nbsp;
                            <h4 class="card-title">Escuela Secundaria Monte de las Ideas</h4>
                            <h5 class="ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                {{ $student->group->user->nombre }} {{ $student->group->user->apellido_paterno }}
                                {{ $student->group->user->apellido_materno }}
                            </h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h3>Alumno: {{ $student->nombre }} {{ $student->apellido_paterno }}
                            {{ $student->apellido_materno }}</h3>
                        <hr>
                        <div class="table-responsive">
                            <table id="tblReportes" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center;">ID</th>
                                        <th style="width: 20%; text-align: center;">FECHA</th>
                                        <th style="width: 35%; text-align: center;">MOTIVO</th>
                                        <th style="width: 20%; text-align: center;">MAESTRO</th>
                                        <th style="width: 25%; text-align: center;">TIPO</th>
                                        <th style="width: 10%; text-align: center;">
                                            <div class="form-button-action">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#formModal"
                                                    class="btn btn-link btn-success btn-lg new-button" >
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal del Formulario -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="calendarModalLabel">Reporte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario donde se editarán los datos -->
                        <form id="editReportForm">
                            <div class="mb-3">
                                <label for="editId" class="form-label">ID</label>
                                <input type="text" class="form-control" id="Id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editFecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="Fecha" required>
                            </div>
                            <div class="mb-3">
                                <label for="editMotivo" class="form-label">Motivo</label>
                                <input type="text" class="form-control" id="Motivo">
                            </div>
                            <div class="mb-3">
                                <label for="editMaestro" class="form-label">Maestro</label>
                                <input type="text" class="form-control" id="Maestro">
                            </div>
                            <div class="mb-3">
                                <label for="editTipo" class="form-label">Tipo</label>
                                <select class="form-control" id="Tipo" required>
                                    <option value="" disabled selected>Selecciona el tipo de conducta</option>
                                    <option value="Conducta Positiva">Conducta Positiva</option>
                                    <option value="Conducta Negativa">Conducta Negativa</option>
                                </select>
                            </div>
                            <input type="hidden" id="confirmacion" value="0">
                            <input type="hidden" id="alumno" value="{{ $student->id }}">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Botón para cerrar el modal sin guardar -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Botón para guardar los cambios -->
                        <button type="button" class="btn btn-secondary" id="saveChangesButton">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Confirmación -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este reporte?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Éxito -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Operación realizada con éxito.
                    </div>
                    <div class="modal-footer">
                        <button type="button"ass="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Error -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Hubo un error al procesar la solicitud.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>





        <!--   Core JS Files-->
        <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>


        <!-- Datatables-->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Formulario-->
        <script src="{{ asset('assets/js/reports/reports.js') }}"></script>
    @endsection

