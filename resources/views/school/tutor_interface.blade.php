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

                                @foreach($students as $student)

                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->nombre }} {{ $student->apellido_paterno }} {{ $student->apellido_materno }}</td>
                                        <td>{{ $student->group->grado }}{{ $student->group->grupo }}</td>
                                        <td style="text-align: center;">
                                            <div class="form-button-action">
                                                <a href="#"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#calendarModal{{ $student->id }}"
                                                   class="btn btn-link btn-primary btn-lg" data-original-title="View Calendar">
                                                    <i class="fa fa-calendar"></i>
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

    <!-- Modal del Calendario para cada estudiante -->
    @foreach($students as $student)
    <div class="modal fade" id="calendarModal{{ $student->id }}" tabindex="-1" aria-labelledby="calendarModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calendarModalLabel{{ $student->id }}">Calendario de Asistencias - {{ $student->nombre }} {{ $student->apellido_paterno }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="calendar{{ $student->id }}"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<!--   Core JS Files-->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>


<!-- FullCalendar Initialization -->

    <!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($students as $student)
        var calendarEl{{ $student->id }} = document.getElementById('calendar{{ $student->id }}');
        var calendar{{ $student->id }} = new FullCalendar.Calendar(calendarEl{{ $student->id }}, {
            initialView: 'dayGridMonth',
            events: [],
            eventDisplay: 'block',
            displayEventTime: true,
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: 'short'
            }
        });

        $('#calendarModal{{ $student->id }}').on('shown.bs.modal', function () {
            calendar{{ $student->id }}.render();
            loadAttendances({{ $student->id }}, calendar{{ $student->id }});
        });
        @endforeach

        function loadAttendances(studentId, calendar) {
            fetch(`/get-attendances/${studentId}`)
                .then(response => response.json())
                .then(data => {
                    calendar.removeAllEvents();
                    data.forEach(function(attendance) {
                        var eventDate = new Date(`${attendance.fecha}T${attendance.hora}`);
                        var dayOfWeek = eventDate.getDay();
                        var hour = eventDate.getHours();
                        var minutes = eventDate.getMinutes();
                        var time = hour * 60 + minutes;

                        var title, color;

                        if (dayOfWeek === 0 || dayOfWeek === 6) {  // Sábado o Domingo
                            title = "";
                            color = "";
                        } else if (time >= 6 * 60 && time < 7 * 60) {  // Entre 6:00 AM y 6:59 AM
                            title = "Asistió";
                            color = "green";
                        } else if (time >= 7 * 60 && time < 8 * 60) {  // Entre 7:00 AM y 7:59 AM
                            title = "Retardo";
                            color = "yellow";
                        } else {
                            title = "No Asistió";
                            color = "red";
                        }

                        calendar.addEvent({
                            title: title,
                            start: eventDate,
                            allDay: false,
                            backgroundColor: color,
                            borderColor: color,
                            textColor: color === "yellow" ? "black" : "white"  // Para mejor visibilidad en amarillo
                        });
                    });
                });
        }
    });
    </script>



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
