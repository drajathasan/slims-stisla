"use strict";

async function getData(path, callback)
{
  try {
    let request = await fetch(path)
    callback(await request.json())
  } catch (error) {
    
  }
}

if (document.getElementById("myChart")) {

  // collection
  getData('?p=api/collections', (response) => {
    let labels = Object.keys(response.data)
    let values = Object.values(response.data)

    labels.forEach((value,index) => {
      document.querySelector(`#${value}`).innerHTML = values[index].toLocaleString()
    })
  })
  // end collection

  var dateNow = document.querySelector('html').dataset.date
  getData('../?p=api/loan/getdate/' + dateNow, (response) => {
    let chartLabels = response.raw

    getData('../?p=api/loan/summary/'  + dateNow, (summaryResponse) => {
      var ctx = document.getElementById("myChart")?.getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartLabels,
          datasets: [{
            label: 'Loan',
            data: summaryResponse.data.loan,
            borderWidth: 5,
            backgroundColor: '#eab308',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
          },
          {
            label: 'Return',
            data: summaryResponse.data.return,
            borderWidth: 5,
            backgroundColor: '#0ea5e9',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
          },
          {
            label: 'Extend',
            data: summaryResponse.data.extend,
            borderWidth: 5,
            backgroundColor: '#22c55e',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                stepSize: 5
              }
            }],
            xAxes: [{
              gridLines: {
                color: '#fbfbfb',
                lineWidth: 2
              }
            }]
          },
        }
      });
    })
  })

  var balance_chart = document.getElementById("balance-chart").getContext('2d');
  var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
  balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
  balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

  getData('?p=api/fines', (response) => {

    document.querySelector('#fines').innerHTML = response.data.total.toLocaleString()

    var myChart = new Chart(balance_chart, {
      type: 'line',
      data: {
        labels: Object.keys(response.data.chart),
        datasets: [{
          label: 'Balance',
          data: Object.values(response.data.chart),
          backgroundColor: balance_chart_bg_color,
          borderWidth: 3,
          borderColor: 'rgba(63,82,227,1)',
          pointBorderWidth: 0,
          pointBorderColor: 'transparent',
          pointRadius: 3,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
      },
      options: {
        layout: {
          padding: {
            bottom: -1,
            left: -1
          }
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              beginAtZero: true,
              display: false
            }
          }],
          xAxes: [{
            gridLines: {
              drawBorder: false,
              display: false,
            },
            ticks: {
              display: false
            }
          }]
        },
      }
    });
  })

  var sales_chart = document.getElementById("sales-chart").getContext('2d');

  var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
  balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
  balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

  let uidSLiMS = document.querySelector('html').dataset.uid
  getData('?p=api/activities&uid=' + uidSLiMS, (response) => {
    document.querySelector('#activities').innerHTML = response.data.total.toLocaleString()
    var myChart = new Chart(sales_chart, {
      type: 'line',
      data: {
        labels: Object.keys(response.data.chart),
        datasets: [{
          label: 'Sales',
          data: Object.values(response.data.chart),
          borderWidth: 2,
          backgroundColor: balance_chart_bg_color,
          borderWidth: 3,
          borderColor: 'rgba(63,82,227,1)',
          pointBorderWidth: 0,
          pointBorderColor: 'transparent',
          pointRadius: 3,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
      },
      options: {
        layout: {
          padding: {
            bottom: -1,
            left: -1
          }
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              beginAtZero: true,
              display: false
            }
          }],
          xAxes: [{
            gridLines: {
              drawBorder: false,
              display: false,
            },
            ticks: {
              display: false
            }
          }]
        },
      }
    });
  })


getData('?p=api/member/top', (response) => {
  var template = `<li class="media">
    <img class="mr-3 rounded" width="55" src="{image_src}" alt="product">
    <div class="media-body">
        <div class="float-right">
            <div class="font-weight-600 text-muted text-small">{total}</div>
        </div>
        <div class="media-title">{name}</div>
        <div class="mt-1">
            <div class="budget-price">
                <div class="budget-price-square bg-primary" data-width="64%"></div>
                <div class="budget-price-label">{loan}</div>
            </div>
            <div class="budget-price">
                <div class="budget-price-square bg-danger" data-width="43%"></div>
                <div class="budget-price-label">{title}</div>
            </div>
        </div>
    </div>
  </li>`

  var html = ''
  response.data.forEach((item) => {
    html += template
            .replace('{image_src}', item.image)
            .replace('{name}', item.name)
            .replace('{loan}', item.total)
            .replace('{title}', item.total_title)
            .replace('{total}', item.order)
  })

  document.querySelector('#members').innerHTML = html
})
}