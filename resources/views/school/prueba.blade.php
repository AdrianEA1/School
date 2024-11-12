@extends('layouts.school')

@section('content')
    <script>
        document.querySelector('body').style.overflow = 'auto';
        var studentId = "{{ $attendances[0]->student_id }}";
    </script>
    <?php
    $temp = $attendances;
    ?>
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
                                {{ $temp[0]->student->user->nombre }}
                                {{ $temp[0]->student->user->apellido_paterno }}
                                {{ $temp[0]->student->user->apellido_materno }}
                            </h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 20px">
                            <h3 style="display: inline-block">Alumno:
                                {{ $attendances[0]->student->nombre }}
                                {{ $attendances[0]->student->apellido_paterno }}
                                {{ $attendances[0]->student->apellido_materno }}</h3>
                            <div style="width: auto" class="form-group form-group-default ">
                                <label>Fecha inicial</label>
                                <input id="start-date" type="date" class="form-control" />
                            </div>
                            <div style="width: auto" class="form-group form-group-default ">
                                <label>Fecha final</label>
                                <input id="end-date" type="date" class="form-control" />
                            </div>
                        </div>

                        <hr>

                        <div style="height: 400px; align-content: center; text-align: center">
                            <canvas id="chart-statistics" width="400" height="200"></canvas>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="attendanceTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 20%; text-align: center;">Año</th>
                                        <th style="width: 20%; text-align: center;">Mes</th>
                                        <th style="width: 60%; text-align: center; color: green;">Total de Asistencias  <i class="fa fa-calendar"></i> </th>
                                        <th style="width: 60%; text-align: center; color: red;">Total de Inacistencias  <i class="fa fa-calendar"></i> </th>

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
    </div>


    <!--   Core JS Files-->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

    <!-- Datatables-->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/data_tables_groups.js') }}"></script>

    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/studentChart/chart_statistics.js') }}"></script>
    <script>
                $(document).ready(function() {
            $('#attendanceTable').DataTable({
                "paging": false,
                "searching": false,
                "ordering": false,
                "info": false,
            });
        });
    </script>
@endsection
