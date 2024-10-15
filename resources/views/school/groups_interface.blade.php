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
                        <img height="60px" src="{{asset('assets/img/beePresent.png')}}">
                        &nbsp;
                        <h4 class="card-title">Escuela Secundaria Monte de las Ideas</h4>
                        <h5
                            class="ms-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#addRowModal"
                        >

                            [Aquí va el nombre del prefecto]
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

                    <h3>Lista de Alumnos Grado: [X] Grupo: [N]</h3>
                    <hr>

                    <div class="table-responsive">
                        <table id="tblGroup" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 60%">Nombre</th>
                                    <th style="width: 40%">Asistencias</th>
                                    <th style="width: 10%; text-align: center; ">Reportes</th>
                                    <th style="width: 10%; text-align: center; ">Nuevo Reporte</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1[Aquí va el nombre del alumno]</td>
                                    <td>2[Aquí van las asistencias del alumno]</td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2[Aquí va el nombre del alumno]</td>
                                    <td>2[Aquí van las asistencias del alumno]</td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>[Aquí va el nombre del alumno]</td>
                                    <td>[Aquí van las asistencias del alumno]</td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>[Aquí va el nombre del alumno]</td>
                                    <td>[Aquí van las asistencias del alumno]</td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>[Aquí va el nombre del alumno]</td>
                                    <td>[Aquí van las asistencias del alumno]</td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
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

<script src="{{ asset('assets/js/data_tables_groups.js')}}"></script>

@endsection

