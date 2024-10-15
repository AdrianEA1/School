$(document).ready(function () {
    $("#tblGroup").DataTable({
        pageLength: 10,
        lengthChange: false,
        language: {
            paginate: {
                first: "Primera",    
                last: "Última",      
                next: "Siguiente",   
                previous: "Anterior" 
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ alumnos",
            infoFiltered: "(filtrado de _MAX_ entradas totales)",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            search: "Buscar:",
            zeroRecords: "No se encontraron resultados" 
        },
        columnDefs: [
            { orderable: true, targets: [0, 1] }, 
            { orderable: false, targets: '_all' } 
        ]

    });
});
