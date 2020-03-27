function ipLookUp () {
    $.ajax('http://ip-api.com/json')
        .then(
            function success(response) {
                localStorage.setItem("coronaStatisticsCountry", response.country);
            },
            function fail(data, status) {
                localStorage.setItem("coronaStatisticsCountry", "Romania");
            }
        );
}

if (!localStorage.getItem("coronaStatisticsCountry")){
    ipLookUp();
}
new Chartist.Bar('.ct-chart', {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    series: [
        [5, 4, 3, 7, 5, 10, 3],
        [3, 2, 9, 5, 4, 6, 4]
    ]
}, {
    seriesBarDistance: 10,
    reverseData: true,
    horizontalBars: true,
    axisY: {
        offset: 70
    }
});