const chartStatistics = document
    .getElementById("chart-statistics")
    .getContext("2d");
var startDate;
var endDate;
var charAttendances;
const startDateInput = document.getElementById("start-date");
const endDateInput = document.getElementById("end-date");



// Obtener la fecha actual
const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
const fechaFormateada = `${year}-${month}-${day}`;


today.setMonth(today.getMonth() - 10);
const yearPresent = today.getFullYear();
const lastMonth = String(today.getMonth() + 1).padStart(2, "0");
const dayPresent = String(today.getDate()).padStart(2, "0");
const fechForm = `${yearPresent}-${lastMonth}-${dayPresent}`;

generateChart(fechForm, fechaFormateada);

endDateInput.value = fechaFormateada;
startDateInput.value = fechForm;

$("#start-date").change(function () {
    startDate = $("#start-date").val();
    endDate = $("#end-date").val();
    if (endDate == "") {
        endDate = fechaFormateada;
        generateChart();
    } else if (endDate != "") generateChart();
});

$("#end-date").change(function () {
    startDate = $("#start-date").val();
    endDate = $("#end-date").val();
    if (startDate == "") {
        startDate = fechForm;
        generateChart();
    } else if (startDate != "") generateChart();
});

function generateChart(start, end) {
    if (charAttendances) charAttendances.destroy();

    $.ajax({
        url: "/pruebachart/" + studentId,
        type: "GET",
        data: {
            studentId: studentId,
            startDate: startDate || start,
            endDate: endDate || end,
        },

        success: function (response) {
            if (typeof end == 'undefined'){
                end = endDate;
                start = startDate;
            }
            fillAttendanceTable(response, start, end);

            const labels = response.map(item => `${item.year}-${item.month}`);
            const counts = response.map(item => item.total)

            charAttendances = new Chart(chartStatistics, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Asistencias por Mes",
                            data: counts,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                },
                            },
                        ],
                    },
                },
            });
        },
        error: function (error) {
            console.log(error);
        },
    });

}


function fillAttendanceTable(asistenciasPorMes, startDate, endDate) {
    const tableBody = document.getElementById("attendanceTable").querySelector("tbody");
    tableBody.innerHTML = "";

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    // Parsear las fechas de inicio y fin
    const startDateObj = new Date(startDate);
    const startMonth = startDateObj.getMonth();
    const startYear = startDateObj.getFullYear();
    const startDay = startDateObj.getDate();

    const endDateObj = new Date(endDate);
    const endMonth = endDateObj.getMonth();
    const endYear = endDateObj.getFullYear();
    const endDay = endDateObj.getDate();

    // Iterar desde el mes de inicio hasta el mes de corte
    for (let year = startYear; year <= endYear; year++) {

        const start = (year === startYear) ? startMonth : 0;
        const end = (year === endYear) ? endMonth : 11;

        for (let monthIndex = start; monthIndex <= end; monthIndex++) {
            const month = months[monthIndex];

            // Buscar la asistencia para este mes y año
            const attendance = asistenciasPorMes.find(a => a.year === year && a.month === month);

            // Si no existe un registro de asistencia, asignar 0
            const totalAssistance = attendance ? attendance.total : 0;

            // Obtener los días laborables del mes
            let totalDaysInMonth = getWeekdaysInMonth(year, monthIndex + 1); // +1 porque los meses empiezan desde 0

            // Verificar si estamos en el mes de `endDate` y si el día de `endDate` es menor que el número de días laborales
            if (monthIndex === endMonth && endDay < totalDaysInMonth) {
                // Si estamos en el mes de corte y el día de corte es menor que el número de días laborables
                totalDaysInMonth = endDay; // Limitar a los días hasta `endDate`
            }

            // Verificar si estamos en el mes de `startDate` y si el día de `startDate` es mayor que 1
            if (monthIndex === startMonth && startDay > 1) {
                // Limitar los días hasta el día de `startDate`
                totalDaysInMonth -= (startDay - 1);
            }

            // Crear la fila de la tabla
            const row = document.createElement("tr");

            // Crear la celda para el año
            const yearCell = document.createElement("td");
            yearCell.textContent = year;
            yearCell.style.textAlign = 'center';
            row.appendChild(yearCell);

            // Crear la celda para el mes
            const monthCell = document.createElement("td");
            monthCell.textContent = month;
            monthCell.style.textAlign = 'center';
            row.appendChild(monthCell);

            // Crear la celda para el total de asistencias
            const totalCell = document.createElement("td");
            totalCell.textContent = totalAssistance;
            totalCell.style.textAlign = 'center';
            totalCell.style.color = 'green';
            row.appendChild(totalCell);

            // Calcular las inasistencias
            const absences = totalDaysInMonth - totalAssistance;

            // Crear la celda para las inasistencias
            const absencesCell = document.createElement("td");
            absencesCell.textContent = absences;
            absencesCell.style.textAlign = 'center';
            absencesCell.style.color = 'red';
            row.appendChild(absencesCell);

            // Agregar la fila al cuerpo de la tabla
            tableBody.appendChild(row);
        }
    }
}



function getWeekdaysInMonth(year, month) {
    const firstDay = new Date(year, month - 1, 1);
    const lastDay = new Date(year, month, 0);
    let weekdays = 0;

    for (let day = firstDay; day <= lastDay; day.setDate(day.getDate() + 1)) {
        const dayOfWeek = day.getDay();
        if (dayOfWeek >= 1 && dayOfWeek <= 5) {
            weekdays++;
        }
    }

    return weekdays;
}
