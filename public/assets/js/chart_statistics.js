const chartStatistics = document.getElementById("chart-statistics").getContext('2d');
var startDate
var endDate
var charAttendances
const startDateInput = document.getElementById("start-date");
const endDateInput = document.getElementById("end-date");
// Obtener la fecha actual
const today = new Date()
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const fechaFormateada = `${year}-${month}-${day}`;

//Obtener una fecha con meses anteriores
// const lastDate = new Date()
today.setMonth(today.getMonth() - 3)
const yearPresent = today.getFullYear();
const lastMonth = String(today.getMonth() + 1).padStart(2, '0');
const dayPresent = String(today.getDate()).padStart(2, '0');
const fechForm = `${yearPresent}-${lastMonth}-${dayPresent}`;

//Generar la gráfica sin espificar los tiempos
generateChart(fechForm, fechaFormateada)

endDateInput.value = fechaFormateada;
startDateInput.value = fechForm;

$("#start-date").change(function() {
    startDate = $('#start-date').val()
    endDate = $('#end-date').val()
    // console.log(startDate + " startdate")
    // console.log(endDate + " enddate")
    if(endDate == ''){
        // console.log('this is startdate')
        endDate = fechaFormateada;
        generateChart()
    }else if (endDate != '')
        generateChart()

})

$("#end-date").change(function() {

    startDate = $('#start-date').val()
    endDate = $('#end-date').val()
    // console.log(startDate + " startdate")
    // console.log(endDate + " enddate")
    if(startDate == ''){
        // console.log('this is end date')
        startDate = fechForm
        generateChart()
    }else if(startDate != '')
        generateChart()
})

function generateChart(start, end){

    // chartStatistics.clearRect(0,0, chartStatistics.width, chartStatistics.height);
    if(charAttendances)
        charAttendances.destroy()

    $.ajax({
        url: '/group_statistics_interface/get_attendances/' + groupId,
        type: 'GET',
        data: {groupId: groupId, startDate: startDate || start, endDate: endDate || end},

        success: function(response){
            console.log(response)
            const labels = response.map(item => `${item.year}-${item.month}`);
            const counts = response.map(item => item.total)

            charAttendances = new Chart(chartStatistics, {
                type: 'bar', // Puedes cambiar a 'line' si prefieres
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Asistencias por Mes',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        },
        error: function(error){
            console.log(error)
        }
    })
}
