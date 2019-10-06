(function ($, window, document, undefined) {
    'use strict';
    function sumOfDataVal(dataArray) {
          return dataArray['datasets'][0]['data'].reduce(function (sum, value) {
              return sum + value;
          }, 0);
      }
  
      var dataResponse = {
          datasets: [{
              data: [10, 20, 30, 55, 75],
              backgroundColor: [
                  '#2b92d8',
                  '#2ab96a',
                  '#e9c061',
                  '#d95d6b',
                  '#9173d8'
              ],
              borderColor: '#25272f',
              borderWidth: 3,
              hoverBackgroundColor: [
                  '#2b92d8',
                  '#2ab96a',
                  '#e9c061',
                  '#d95d6b',
                  '#9173d8'
              ],
              hoverBorderColor: '#25272f',
              hoverBorderWidth: 3
          }],
  
          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
              'Blue',
              'Green',
              'Yellow',
              'Red',
              'Violet'
          ]
      };
  
  
      Chart.defaults.global.tooltips.custom = function (tooltip) {
          // Tooltip Element
  
  
          var tooltipEl = document.getElementById('chartjs-tooltip');
  
          // Hide if no tooltip
          if (tooltip.opacity === 0) {
              tooltipEl.style.color = "#464950";
              $("#chartjs-tooltip div p").text("100%");
  
              tooltipEl.style.opacity = 0;
              return;
          }
  
  
          // Set caret Position
          tooltipEl.classList.remove('above', 'below', 'no-transform');
          if (tooltip.yAlign) {
              tooltipEl.classList.add(tooltip.yAlign);
          } else {
              tooltipEl.classList.add('no-transform');
          }
  
          function getBody(bodyItem) {
              return bodyItem.lines;
          }
  
          // Set Text
          if (tooltip.body) {
              var bodyLines = tooltip.body.map(getBody);
              var innerHtml = '<p>';
              bodyLines.forEach(function (body, i) {
                  var dataNumber = body[i].split(":");
                  var dataValNum = parseInt(dataNumber[1].trim());
                  var dataToPercent = (dataValNum / sumOfDataVal(dataResponse) * 100).toFixed(2) + '%';
                  innerHtml += dataToPercent;
              });
  
              innerHtml += '</p>';
  
              var tableRoot = tooltipEl.querySelector('div');
              tableRoot.innerHTML = innerHtml;
          }
  
  
          tooltipEl.style.opacity = 1;
          tooltipEl.style.color = "#FFF";
      };
  
  
      var ctx = document.getElementById('myChart').getContext('2d');
      var myDoughnutChart = new Chart(ctx, {
          type: 'doughnut',
          data: dataResponse,
          options: {
              legend: {
                  display: false
              },
              cutoutPercentage: 73,
              circumference: 2 * Math.PI,
              maintainAspectRatio: false,
              animation: {
                  animateRotate: false,
                  animateScale: true
              },
              tooltips: {
                  enabled: false
              }
          }
      });
  })(jQuery, window, document);