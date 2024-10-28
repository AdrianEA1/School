document.addEventListener("DOMContentLoaded", function () {
    var table; // Definición de la variable `table` en el ámbito más amplio
    const editButtons = document.querySelectorAll(".edit-button");

    $(document).ready(function () {
        table = $("#tblReportes").DataTable({
            responsive: true,
            paging: false, // Desactiva la paginación
            searching: false, // Desactiva el campo de búsqueda
            ordering: false, // Desactiva la capacidad de ordenar
            info: false, // Desactiva el texto informativo ("Mostrando X a Y de Z entradas")
            lengthChange: false, // Desactiva la opción de cambiar cuántas filas se muestran
            language: {
                emptyTable: "No hay datos disponibles",
                zeroRecords: "No se encontraron registros coincidentes",
                processing: "Cargando...",
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "/report/list/" + studentId,
                type: "GET",
            },
            columns: [
                { data: "id", width: "10%", className: "text-center" },
                { data: "fecha", width: "20%", className: "text-center" },
                { data: "motivo", width: "35%", className: "text-center" },
                { data: "maestro", width: "20%", className: "text-center" },
                { data: "tipo", width: "25%", className: "text-center" },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    width: "10%",
                    className: "text-center",
                    render: function (data, type, row) {
                        return `
                        <div class="form-button-action">
                            <a data-bs-toggle="modal" data-bs-target="#formModal" class="btn btn-link btn-primary btn-lg edit-button"
                                data-id="${row.id}" data-fecha="${row.fecha}" data-motivo="${row.motivo}"
                                data-maestro="${row.maestro}" data-tipo="${row.tipo}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-link btn-danger delete-report" data-id="${row.id}">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>`;
                    },
                },
            ],
        });
    });

    // Configurar el token CSRF para las solicitudes AJAX
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Evento para abrir el modal con los datos del reporte seleccionado
    $(document).on("click", ".edit-button", function () {
        // Obtener los datos del botón
        const id = $(this).data("id");
        const fecha = $(this).data("fecha");
        const motivo = $(this).data("motivo");
        const maestro = $(this).data("maestro");
        const tipo = $(this).data("tipo");

        // Asignar los valores a los campos del modal
        $("#Id").val(id);
        $("#Fecha").val(fecha);
        $("#Motivo").val(motivo);
        $("#Maestro").val(maestro);
        $("#Tipo").val(tipo);
    });

    // Guardar cambios al hacer clic en el botón de guardar del modal
    $("#saveChangesButton").on("click", function () {
        let id = $("#Id").val();
        let fecha = $("#Fecha").val();
        let motivo = $("#Motivo").val();
        let maestro = $("#Maestro").val();
        let tipo = $("#Tipo").val();
        let confirmacion = $("#confirmacion").val();
        let alumno = $("#alumno").val();

        // Definir si es un registro nuevo o una edición
        let url = id ? "/report/update" : "/report/store";

        $.ajax({
            url: url,
            method: "POST",
            data: {
                id: id,
                fecha: fecha,
                motivo: motivo,
                maestro: maestro,
                tipo: tipo,
                confirmacion: confirmacion,
                student_id: alumno,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $("#formModal").modal("hide");
                $("#successModal").modal("show"); 
                table.ajax.reload(null, false);
            },
            error: function (error) {
                $("#errorModal").modal("show"); // Mostrar el modal de error
            },
        });
    });

    // Eliminar un reporte al hacer clic en el botón de eliminar
    $(document).on("click", ".delete-report", function (e) {
        e.preventDefault();

        let reportId = $(this).data("id");
        // Guardamos el ID del reporte a eliminar en el botón de confirmación
        $("#confirmDeleteButton").data("id", reportId);
        // Mostramos el modal de confirmación
        $("#confirmDeleteModal").modal("show");
    });

    // Evento para confirmar la eliminación
    $("#confirmDeleteButton").on("click", function () {
        let reportId = $(this).data("id");

        $.ajax({
            url: "/report/delete",
            method: "POST",
            data: {
                id: reportId,
                _token: $('meta[name="csrf-token"]').attr("content"), // token CSRF
            },
            success: function (response) {
                table.ajax.reload(null, false);
                $("#confirmDeleteModal").modal("hide");
                $("#successModal").modal("show");
            },
            error: function (error) {
                $("#errorModal").modal("show");
            },
        });
    });

    function clearForm() {
        $("#Id").val('');
        $("#Fecha").val('');
        $("#Motivo").val('');
        $("#Maestro").val('');
        $("#Tipo").val('');
        $("#confirmacion").val('');
        $("#alumno").val('');
    }
    $("#formModal").on("show.bs.modal", function () {
        clearForm(); // Llama a clearForm cuando el modal se está mostrando
    });

    $(window).on("resize", function () {
        table.responsive.recalc(); // Recalcular la responsividad de la tabla
    });
});
