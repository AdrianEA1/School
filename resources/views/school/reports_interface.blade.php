@extends('layouts.school')

@section('content')
    <script>
        document.querySelector('body').style.overflow = 'auto';
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
                            [Nombre del usuario]
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
                    <div class="table-responsive">
                        <table id="tblTutor" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align: center;">ID</th>
                                    <th style="width: 20%; text-align: center;">FECHA</th>
                                    <th style="width: 35%; text-align: center;">MOTIVO</th>
                                    <th style="width: 20%; text-align: center;">MAESTRO</th>
                                    <th style="width: 25%; text-align: center;">TIPO</th>
                                    <th style="width: 10%; text-align: center;">
                                        <div class="form-button-action">
                                            <button
                                                type="button"
                                                data-bs-toggle="tooltip"
                                                title=""
                                                class="btn btn-link btn-success btn-lg"
                                                data-original-title="Add Task"
                                            >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">

                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">

                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">

                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">

                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">

                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>


                                </td>
                            </tr>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
<!--   Core JS Files-->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>


<!-- FullCalendar Initialization -->

    <!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>





<!-- Datatables-->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<script>
$(document).ready(function () {
    $("#tblTutor").DataTable({
        paging: false,       // Desactiva la paginación
        searching: false,    // Desactiva el campo de búsqueda
        ordering: false,     // Desactiva la capacidad de ordenar
        info: false,         // Desactiva el texto informativo ("Mostrando X a Y de Z entradas")
        lengthChange: false, // Desactiva la opción de cambiar cuántas filas se muestran
        language: {
            emptyTable: "No hay datos disponibles" // Puedes personalizar el mensaje de tabla vacía
        }
    });
});
</script>

@endsection
