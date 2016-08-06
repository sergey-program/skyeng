$(function () {
    //Better to construct options first and then pass it as a parameter
    var options = {
        zoomEnabled: true,
        animationEnabled: true,
        axisX: {
            title: 'Шаг (время)',
            valueFormatString: "MM.DD.YY"
        },
        axisY: {
            title: 'Кол. пользователей'
        },
        data: [
            {
                type: "area",
                xValueType: "dateTime",
                dataPoints: dataPointArray
            }
        ]
    };

    $("#chartContainer").CanvasJSChart(options);
});