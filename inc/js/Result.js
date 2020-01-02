var ctx = document.getElementById('myResultLine').getContext("2d");

var myResultLine = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["1st Term", "2nd Term", "3rd Term"],
        datasets: [{
            label: "Data",
            borderColor:               'green',
            pointBorderColor:          'green',
            pointBackgroundColor:      'green',
            pointHoverBackgroundColor: 'green',
            pointHoverBorderColor:     'green',
            pointBorderWidth: 10,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: .1,
            fill: false,
            borderWidth: 4,
            data: [670, 798, 859]
        }]
    },
    options: {
        legend: {
            position: "bottom"
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 10
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }
}],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
},
                ticks: {
                    padding: 10,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }]
        }
    }
});

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var ctx = document.getElementById("myResultBar").getContext('2d');

Chart.defaults.global.animation.duration= 2000;

var myResultBar = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["2014", "2015", "2016", "2017", "2018", "2019"],
    datasets: [{
      label: 'Year Perfomance',
      data: [142090, 497985, 317612, 461600, 472047, 354245],
      backgroundColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 0
    }]
  },
  options: {
    
    title: {
      display:true,
      text: ['Year Perfomance'],
      position: 'bottom',
      fontSize: 16
    },
    cutOutPercentage: {
      
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawOnChartArea: false
        },
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});



