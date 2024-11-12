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
            if (typeof end == "undefined") {
                end = endDate;
                start = startDate;
            }
            fillAttendanceTable(response, start, end);

            const labels = response.map((item) => `${item.year}-${item.month}`);
            const counts = response.map((item) => item.total);

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
    const tableBody = document
        .getElementById("attendanceTable")
        .querySelector("tbody");
    tableBody.innerHTML = "";

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const [startYear, startMonth, startDay] = startDate.split("-").map(Number);
    const [endYear, endMonth, endDay] = endDate.split("-").map(Number);

    // Iterar desde inicio hasta el corte
    for (let year = startYear; year <= endYear; year++) {
        const start = year === startYear ? startMonth - 1 : 0;
        const end = year === endYear ? endMonth - 1 : 11;

        for (let monthIndex = start; monthIndex <= end; monthIndex++) {
            const month = months[monthIndex];

            const attendance = asistenciasPorMes.find(
                (a) => a.year === year && a.month === month
            );
            const totalAssistance = attendance ? attendance.total : 0;

            // Calcular el número de días hábiles en el mes completo
            let totalDaysInMonth = getWeekdaysInMonth(year, monthIndex + 1);
            // Ajustar los días si es el mes de inicio parcial
            if (year === startYear && monthIndex + 1 === startMonth) {
                totalDaysInMonth = getWeekdaysUntilDate(year, monthIndex + 1, startDay);
            }
            // Ajustar los días si es el mes de fin parcial
            if (year === endYear && monthIndex + 1 === endMonth) {
                totalDaysInMonth = getWeekdaysUntilEnd(year, monthIndex + 1, endDay);
                flag = true;
            }
            totalDaysInMonth = Math.max(totalDaysInMonth, 0);

            const row = document.createElement("tr");
            // Crear la celda para el año
            const yearCell = document.createElement("td");
            yearCell.textContent = year;
            yearCell.style.textAlign = "center";
            row.appendChild(yearCell);
            // Crear la celda para el mes
            const monthCell = document.createElement("td");
            monthCell.textContent = month;
            monthCell.style.textAlign = "center";
            row.appendChild(monthCell);
            // Crear la celda para el total de asistencias
            const totalCell = document.createElement("td");
            totalCell.textContent = totalAssistance;
            totalCell.style.textAlign = "center";
            totalCell.style.color = "green";
            row.appendChild(totalCell);
            // Calcular las inasistencias
            const absences = totalDaysInMonth - totalAssistance;
            // Crear la celda para las inasistencias
            const absencesCell = document.createElement("td");
            absencesCell.textContent = Math.max(absences, 0);
            absencesCell.style.textAlign = "center";
            absencesCell.style.color = "red";
            row.appendChild(absencesCell);

            tableBody.appendChild(row);
        }
    }
}

// Función para calcular los días hábiles en un mes completo
function getWeekdaysInMonth(year, month) {
    const date = new Date(year, month - 1, 1);
    let weekdays = 0;
    while (date.getMonth() === month - 1) {
        const dayOfWeek = date.getDay();
        if (dayOfWeek !== 0 && dayOfWeek !== 6) {
            weekdays++;
        }
        date.setDate(date.getDate() + 1);
    }
    return weekdays;
}

// Calcular los días hábiles desde un día específico hasta el final del mes
function getWeekdaysUntilDate(year, month, day) {
    const date = new Date(year, month - 1, 1);
    let weekdays = 0;
    for (let d = 1; d <= day; d++) {
        date.setDate(d);
        const dayOfWeek = date.getDay();
        if (dayOfWeek !== 0 && dayOfWeek !== 6) {
            weekdays++;
        }
    }
    return weekdays;
}

// Calcular los días hábiles desde el inicio del mes hasta un día específico
function getWeekdaysUntilEnd(year, month, endDay) {
    const date = new Date(year, month - 1, 1);
    let weekdays = 0;

    while (date.getMonth() === month - 1 && date.getDate() <= endDay) {
        const dayOfWeek = date.getDay();
        if (dayOfWeek !== 0 && dayOfWeek !== 6) {
            weekdays++;
        }
        date.setDate(date.getDate() + 1);
    }
    return weekdays;
}

