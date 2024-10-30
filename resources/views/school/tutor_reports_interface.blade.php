@extends('layouts.school')

@section('content')
    <script>
        document.querySelector('body').style.overflow = 'auto';
        var studentId = "{{ $reports[0]->student->id }}";
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
                                {{ $reports[0]->student->user->nombre }} {{ $reports[0]->student->user->apellido_paterno }}
                                {{ $reports[0]->student->user->apellido_materno }}
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
                        <h3>Alumno: {{ $reports[0]->student->nombre }} {{ $reports[0]->student->apellido_paterno }}
                            {{ $reports[0]->student->apellido_materno }}</h3>
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
                                        <th style="width: 25%; text-align: center;">PDF</th>
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



        <!--   Core JS Files-->
        <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>


        <!-- Datatables-->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Formulario-->
        <script src="{{ asset('assets/js/reports/tutor_reports.js') }}"></script>
    @endsection

