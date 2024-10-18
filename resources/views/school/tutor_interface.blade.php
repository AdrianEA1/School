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
                            [Aquí va el nombre del tutor]
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
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 60%">NOMBRE</th>
                                    <th style="width: 40%">GRUPO</th>
                                    <th style="width: 10%">ASISTENCIAS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <div class="form-button-action">
                                            <a href="#" data-bs-toggle="tooltip"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <div class="form-button-action">
                                            <a href="#" data-bs-toggle="tooltip"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <div class="form-button-action">
                                            <a href="#" data-bs-toggle="tooltip"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <div class="form-button-action" >
                                            <a href="#" data-bs-toggle="tooltip"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <div class="form-button-action">
                                            <a href="#" data-bs-toggle="tooltip"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
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
