@extends('layouts.school')

@section('content')
    <script>
        document.querySelector('body').style.overflow = 'auto';
    </script>

    <div class="d-flex align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <img height="60px" src="{{ asset('assets/img/beePresent.png') }}">
                        &nbsp;
                        <h4 class="card-title">Escuela Secundaria Monte de las Ideas</h4>
                        <h5 class="ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">

                            {{ $user->nombre . ' ' . $user->apellido_paterno . ' ' . $user->apellido_paterno }}
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
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>GRADO</th>
                                    <th>GRUPO</th>
                                    <th style="width: 10%">DETALLE</th>
                                    <th style="width: 10%">Estadísticas</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->grado }}</td>
                                        <td>{{ $group->grupo }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('group_details_interface', $group->id) }}"
                                                    data-bs-toggle="tooltip" class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('group_statistics_interface', $group->id) }}"
                                                   data-bs-toggle="tooltip" class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Edit Task">
                                                    <i class="fa fa-chart-bar"></i>
                                                </a>
                                            </div>

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
@endsection
