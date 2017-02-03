$(function () {
    var json_grafica = new Array();
    
    $.ajax({
        url: '/TPAProyectoIntegrador/model/reporte_maestro_materia/getMaestrosMateriasgraficapastel.php',
        type: 'GET',
        dataType: 'JSON'
    }).done(function (json) {
       $.each(json.msg, function(i, row) {
         json_grafica.push([row.name,Number(row.y)]);
        
    });
       console.log(json_grafica);
       console.log(json);
        graficar(json_grafica);
    });
});//function

function graficar(json){
    Highcharts.chart('barras', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Cantidad de materias impartidas por maestro'
        },
        tooltip: {
            pointFormat: '{series.name}: {point.y} (<b>{point.percentage:.1f})%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Materias',
            colorByPoint: true,
            data: json
        }]
    });
};
