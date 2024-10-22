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

                            {{ $group->user->nombre }} {{ $group->user->apellido_paterno }} {{ $group->user->apellido_materno }}

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

                    <h3>Lista de Alumnos Grado: {{ $group->grado }} Grupo: {{ $group->grupo }}</h3>
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

                                @foreach( $group->students as $student )

                                    <tr>
                                        <td>{{ $student->nombre }} {{ $student->apellido_paterno }} {{ $student->apellido_materno }}</td>
                                        <td>{{ count($student->attendances) }}</td>
                                        <td style="text-align: center; ">
                                            <button type="button" class="btn btn-icon btn-link "><i class="fa fa-link"></i></button>
                                        </td>
                                        <td style="text-align: center; ">
                                            <button type="button" class="btn btn-icon btn-round btn-warning"><i class="fa fa-exclamation-circle"></i></button>
                                        </td>
                                    </tr>

                                @endforeach


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

