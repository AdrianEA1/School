// import { jsPDF } from "jspdf";

// import { default as jsPDF } from "jspdf";


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.addEventListener("DOMContentLoaded", function () {
    var table; // Definición de la variable `table` en el ámbito más amplio
    const editButtons = document.querySelectorAll(".edit-button");

    $(document).ready(function () {
        table = $("#tblReportes").DataTable({
            responsive: true,
            paging: false, // Desactiva la paginación
            //searching: false, // Desactiva el campo de búsqueda
           // ordering: false, // Desactiva la capacidad de ordenar
            info: false, // Desactiva el texto informativo ("Mostrando X a Y de Z entradas")
            lengthChange: false, // Desactiva la opción de cambiar cuántas filas se muestran
            language: {
                emptyTable: "No hay datos disponibles",
                zeroRecords: "No se encontraron registros coincidentes",
                processing: "Cargando...",
                search: "Buscar:",
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
                {
                    data: "tipo", width: "25%", className: "text-center",
                    render: function (data, type, row) {
                        if (data.toLowerCase() === "conducta positiva") {
                            return `<span style="color: green;">
                                        <i class="fa fa-arrow-up"></i> Positiva
                                    </span>`;
                        } else {
                            return `<span style="color: red;">
                                        <i class="fa fa-arrow-down"></i> Negativa
                                    </span>`;
                        }
                    }
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    width: "10%",
                    className: "text-center",
                    render: function (data, type, row) {
                        return `
                        <div class="form-button-action">
                            <button id="btnMakePDF" onclick="generateReportPDF()" type="button"  data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" >
                                <i class="fa  fas fa-file-pdf" style="color: red;"></i>
                            </button>
                        </div>`;
                    },
                },
            ],
        });
    });


    $(window).on("resize", function () {
        table.responsive.recalc(); // Recalcular la responsividad de la tabla
    });
});


const generateReportPDF = () => {
        // const img = $('#imgLogo').attr('src');
        // console.log(img);
        var name = $('#studentName').text();
        // console.log(name);
        var studentName = name.replace("Alumno: ", "")
        $.ajax({
            url: "/report/list/" + studentId,
            type: "GET",
            success: function(student){
                console.log(student);
;                $.ajax({
                    url: "/make_report",
                    type: "post",
                    data: {datos: student.data[0], studentName: studentName },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(res){
                        // console.log(res);
                        const url = URL.createObjectURL(res);
                        const a = document.createElement('a');
                        a.href = url;
                        a.target = '_blank';
                        a.click();
                        URL.revokeObjectURL(url);
                        // console.log(res);
                    },
                    error: function(e){
                        console.log(e);
                    }
                })
            }
        })


}
