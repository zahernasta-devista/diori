function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function ($) {
  "use strict"; //accordion-wizard

  var options = {
    mode: 'wizard',
    autoButtonsNextClass: 'btn btn-primary float-left',
    autoButtonsPrevClass: 'btn btn-info',
    stepNumberClass: 'badge badge-pill badge-primary ml-1',
    onSubmit: function onSubmit() {
      alert('Form submitted!');
      return true;
    }
  };
  $("#form").accWizard(options);
})(jQuery);

var color = Chart.helpers.color;

function createConfig(legendPosition, colorName) {
  return {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'My First dataset',
        data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
        backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
        borderColor: window.chartColors[colorName],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: 'bottom'
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Month'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };
}

window.onload = function () {
  [{
    id: 'chart-legend-top',
    legendPosition: 'top',
    color: 'primary'
  }, {
    id: 'chart-legend-right',
    legendPosition: 'right',
    color: 'secondary'
  }, {
    id: 'chart-legend-bottom',
    legendPosition: 'bottom',
    color: 'success'
  }, {
    id: 'chart-legend-left',
    legendPosition: 'left',
    color: 'info'
  }].forEach(function (details) {
    var ctx = document.getElementById(details.id).getContext('2d');
    var config = createConfig(details.legendPosition, details.color);
    new Chart(ctx, config);
    ctx.shadowColor = 'rgba(119, 119, 142, 0.2)';
    ctx.shadowBlur = 10;
    ctx.shadowOffsetX = 8;
    ctx.shadowOffsetY = 8;
  });
};

(function ($) {
  "use strict";
  /*chart-employment*/

  var chart = c3.generate({
    bindto: '#chart-employment',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 9, 4, 9, 11, 15, 17], ['data2', 7, 17, 13, 17, 25, 28], ['data3', 18, 19, 22, 21, 32, 28]],
      type: 'line',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d',
        data3: '#ffcc29'
      },
      names: {
        // name of each serie
        'data1': 'May',
        'data2': 'June',
        'data3': 'July'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['2013', '2014', '2015', '2016', '2017', '2018']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-temperature*/

  var chart = c3.generate({
    bindto: '#chart-temperature',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 8.0, 7.9, 10.5, 15.5, 19.4, 22.5, 26.2, 27.5, 24.3, 19.3, 14.9, 10.6], ['data2', 4.9, 5.2, 6.7, 9.5, 12.9, 16.2, 18.0, 17.6, 15.2, 11.3, 7.6, 5.8]],
      labels: true,
      type: 'line',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'India',
        'data2': 'USA'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-area*/

  var chart = c3.generate({
    bindto: '#chart-area',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 12, 8, 16, 19, 20, 18], ['data2', 12, 5, 6, 8, 10, 13]],
      type: 'area',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-area-spline*/

  var chart = c3.generate({
    bindto: '#chart-area-spline',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 10, 8, 10, 12, 20, 18], ['data2', 8, 12, 8, 20, 10, 13]],
      type: 'area-spline',
      // default type of chart
      colors: {
        data1: '#d43f8d',
        data2: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'data1',
        'data2': 'data2'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-area-spline-sracked*/

  var chart = c3.generate({
    bindto: '#chart-area-spline-sracked',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 12, 9, 16, 19, 20, 18], ['data2', 8, 8, 6, 8, 10, 13]],
      type: 'area-spline',
      // default type of chart
      groups: [['data1', 'data2']],
      colors: {
        data1: '#d43f8d',
        data2: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-area-spline-sracked*/

  var chart = c3.generate({
    bindto: '#chart-sracked',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 0, 9, 16, 19, 30, 25, 19, 12, 0]],
      type: 'area-spline',
      // default type of chart
      groups: [['data1', 'data2']],
      colors: {
        data1: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-spline*/

  var chart = c3.generate({
    bindto: '#chart-spline',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 0, 0, 0.2, 0.5, 0.6, 1.2, 2.5, 2.9, 4.5, 4.9, 5.2, 5.8, 6.5, 6.7, 7.4, 4.9, 6.4, 5.4, 10.8, 6.8, 5.2, 11.9], ['data2', 0, 0, 0, 0, 0.3, 0.2, 0.5, 0.6, 1.5, 1.8, 1.9, 2.5, 1.6, 3.8, 3.9, 3.6, 1.8, 1.8, 1.9, 2.8, 5.4, 7.8, 10.9]],
      labels: true,
      type: 'spline',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'USA',
        'data2': 'India'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-spline-rotated*/

  var chart = c3.generate({
    bindto: '#chart-spline-rotated',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 12, 7, 8, 6, 8, 9, 12], ['data2', 8, 10, 10, 9, 7, 10, 8]],
      type: 'spline',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
      },
      rotated: true
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-step*/

  var chart = c3.generate({
    bindto: '#chart-step',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 10, 15, 10, 18, 19, 15], ['data2', 7, 7, 5, 7, 9, 12]],
      type: 'step',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-area-step*/

  var chart = c3.generate({
    bindto: '#chart-area-step',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 15, 14, 18, 19, 20, 18], ['data2', 10, 10, 12, 14, 15, 13]],
      type: 'area-step',
      // default type of chart
      colors: {
        'data1': '#d43f8d',
        'data2': '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'June', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-bar*/

  var chart = c3.generate({
    bindto: '#chart-bar',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 15, 18, 19, 17], ['data2', 7, 7, 5, 7, 9, 12]],
      type: 'bar',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
      }
    },
    bar: {
      width: 16
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-bar*/

  var chart = c3.generate({
    bindto: '#chart-monthly',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 35, 18, 19, 17, 33, 39, 48, 57, 39, 63]],
      type: 'bar',
      // default type of chart
      colors: {
        data1: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    },
    bar: {
      width: 30
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-bar-rotated*/

  var chart = c3.generate({
    bindto: '#chart-bar-rotated',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 15, 18, 19, 17], ['data2', 7, 7, 5, 7, 9, 12]],
      type: 'bar',
      // default type of chart
      colors: {
        data1: '#d43f8d',
        data2: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
      },
      rotated: true
    },
    bar: {
      width: 15
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-bar-stacked*/

  var chart = c3.generate({
    bindto: '#chart-bar-stacked',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 15, 18, 19, 17, 20, 25, 32, 20, 14, 20], ['data2', 7, 7, 5, 7, 9, 12, 4, 6, 2, 5, 2, 8]],
      type: 'bar',
      // default type of chart
      groups: [['data1', 'data2']],
      colors: {
        data1: '#d43f8d',
        data2: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    },
    bar: {
      width: 16
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-pie*/

  var chart = c3.generate({
    bindto: '#chart-pie',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 63], ['data2', 44], ['data3', 12], ['data4', 14]],
      type: 'pie',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d',
        data3: '#0774f8',
        data4: '#09ad95'
      },
      names: {
        // name of each serie
        'data1': 'A',
        'data2': 'B',
        'data3': 'C',
        'data4': 'D'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-pie*/

  var chart = c3.generate({
    bindto: '#chart-pie2',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 63], ['data2', 40], ['data3', 12], ['data4', 14], ['data5', 20], ['data6', 29]],
      type: 'pie',
      // default type of chart
      colors: {
        'data1': '#0774f8',
        'data2': '#d43f8d',
        'data3': '#09ad95',
        'data4': '#0774f8',
        'data5': '#f5334f',
        'data6': '#f7b731'
      },
      names: {
        // name of each serie
        'data1': 'A',
        'data2': 'B',
        'data3': 'C',
        'data4': 'D',
        'data5': 'E',
        'data6': 'F'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-pie*/

  var chart = c3.generate({
    bindto: '#chart-pie3',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 63], ['data2', 44], ['data3', 28]],
      type: 'pie',
      // default type of chart
      colors: {
        'data1': '#0774f8',
        'data2': '#d43f8d',
        'data3': '#09ad95'
      },
      names: {
        // name of each serie
        'data1': 'A',
        'data2': 'B',
        'data3': 'C'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-pie*/

  var chart = c3.generate({
    bindto: '#chart-pie4',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 58], ['data2', 45], ['data3', 20], ['data4', 14]],
      type: 'pie',
      // default type of chart
      colors: {
        'data1': '#0774f8',
        'data2': '#d43f8d',
        'data3': '#09ad95',
        'data4': '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'A',
        'data2': 'B',
        'data3': 'C',
        'data4': 'D'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-donut*/

  var chart = c3.generate({
    bindto: '#chart-donut',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 78], ['data2', 95], ['data3', 25]],
      type: 'donut',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d',
        data3: '#09ad95'
      },
      names: {
        // name of each serie
        'data1': 'sales1',
        'data2': 'sales2',
        'data3': 'sales3'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-donut*/

  var chart = c3.generate({
    bindto: '#chart-donut2',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 78], ['data2', 95], ['data3', 25], ['data4', 45], ['data5', 75], ['data6', 25]],
      type: 'donut',
      // default type of chart
      colors: {
        'data1': '#0774f8',
        'data2': '#d43f8d',
        'data3': '#09ad95',
        'data4': '#0774f8',
        'data5': '#f5334f',
        'data6': '#f7b731'
      },
      names: {
        // name of each serie
        'data1': 'sales1',
        'data2': 'sales2',
        'data3': 'sales3',
        'data4': 'sales4',
        'data5': 'sales5',
        'data6': 'sales6'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-donut*/

  var chart = c3.generate({
    bindto: '#chart-donut3',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 78], ['data2', 95]],
      type: 'donut',
      // default type of chart
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d'
      },
      names: {
        // name of each serie
        'data1': 'sales1',
        'data2': 'sales2'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-donut*/

  var chart = c3.generate({
    bindto: '#chart-donut4',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 78], ['data2', 95], ['data3', 25], ['data4', 45]],
      type: 'donut',
      // default type of chart
      colors: {
        'data1': '#0774f8',
        'data2': '#d43f8d',
        'data3': '#09ad95',
        'data4': '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'sales1',
        'data2': 'sales2',
        'data3': 'sales3',
        'data4': 'sales4'
      }
    },
    axis: {},
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-scatter*/

  var chart = c3.generate({
    bindto: '#chart-scatter',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 15, 18, 19, 17], ['data2', 7, 7, 5, 7, 9, 12]],
      type: 'scatter',
      // default type of chart
      colors: {
        data1: 'green',
        data2: 'red'
      },
      names: {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['May', 'Jun', 'July', 'Aug', 'Sep', 'Oct']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-combination*/

  var chart = c3.generate({
    bindto: '#chart-combination',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 100, 130, 150, 240, 130, 220], ['data2', 250, 200, 220, 400, 250, 350], ['data3', 100, 130, 150, 240, 130, 220]],
      type: 'bar',
      // default type of chart
      types: {
        'data1': "line",
        'data2': "spline"
      },
      groups: [['data3']],
      colors: {
        data1: '#09ad95',
        data2: '#d43f8d',
        data3: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Marketing',
        'data2': 'Development',
        'data3': 'Sales'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['2007-20082008', '2009-2010', '2011-2012', '2013-2014', '2015-2016', '2017-2018']
      }
    },
    bar: {
      width: 50
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-wrapper*/

  var chart = c3.generate({
    bindto: '#chart-wrapper',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6], ['data2', 3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]],
      labels: true,
      type: 'line',
      // default type of chart
      colors: {
        data1: 'purple',
        data2: 'pink'
      },
      names: {
        // name of each serie
        'data1': 'Tokyo',
        'data2': 'London'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
})(jQuery);

jQuery(document).ready(function ($) {
  $('.color1').on({
    'click': function click() {
      $('#change-image').attr('src', '../../assets/images/brand/logo-3.png');
    }
  });
  $('.color2').on({
    'click': function click() {
      $('#change-image').attr('src', '../../assets/images/brand/logo-red.png');
    }
  });
  $('.color3').on({
    'click': function click() {
      $('#change-image').attr('src', '../../assets/images/brand/logo-green.png');
    }
  });
  $('.color4').on({
    'click': function click() {
      $('#change-image').attr('src', '../../assets/images/brand/logo-blue.png');
    }
  });
  $('.color5').on({
    'click': function click() {
      $('#change-image').attr('src', '../../assets/images/brand/logo-orange.png');
    }
  });
});
$(function (e) {
  var myDate = new Date();
  myDate.setDate(myDate.getDate() + 2);
  $("#countdown").countdown(myDate, function (event) {
    $(this).html(event.strftime('<div class="timer-wrapper"><div class="time">%D</div><span class="text">days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">hrs</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">mins</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">sec</span></div>'));
  });
});

(function ($) {
  "use strict"; //Color-Theme

  $(document).on("click", "a[data-theme]", function () {
    $("head link#theme").attr("href", $(this).data("theme"));
    $(this).toggleClass('active').siblings().removeClass('active');
  }); // ______________Full screen

  $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
    $('html').addClass('fullscreenie');

    if (document.fullScreenElement !== undefined && document.fullScreenElement === null || document.msFullscreenElement !== undefined && document.msFullscreenElement === null || document.mozFullScreen !== undefined && !document.mozFullScreen || document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      }
    } else {
      $('html').removeClass('fullscreenie');

      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
  }); // ______________ PAGE LOADING

  $(window).on("load", function (e) {
    $("#global-loader").fadeOut("slow");
  }); // ______________ BACK TO TOP BUTTON

  $(window).on("scroll", function (e) {
    if ($(this).scrollTop() > 0) {
      $('#back-to-top').fadeIn('slow');
    } else {
      $('#back-to-top').fadeOut('slow');
    }
  });
  $(document).on("click", "#back-to-top", function (e) {
    $("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  }); // ______________ COVER IMAGE

  $(".cover-image").each(function () {
    var attr = $(this).attr('data-image-src');

    if (_typeof(attr) !== (typeof undefined === "undefined" ? "undefined" : _typeof(undefined)) && attr !== false) {
      $(this).css('background', 'url(' + attr + ') center center');
    }
  }); //Increment & Decrement

  var quantitiy = 0;
  $('.quantity-right-plus').on('click', function (e) {
    e.preventDefault();
    var quantity = parseInt($('.quantity').val());
    $('.quantity').val(quantity + 1);
  });
  $('.quantity-left-minus').on('click', function (e) {
    e.preventDefault();
    var quantity = parseInt($('.quantity').val());

    if (quantity > 0) {
      $('.quantity').val(quantity - 1);
    }
  }); // ______________Chart-circle

  if ($('.chart-circle').length) {
    $('.chart-circle').each(function () {
      var $this = $(this);
      $this.circleProgress({
        fill: {
          color: $this.attr('data-color')
        },
        size: $this.height(),
        startAngle: -Math.PI / 4 * 2,
        emptyFill: 'rgba(119, 119, 142, 0.2)',
        lineCap: 'round'
      });
    });
  } // ______________ CARD


  var DIV_CARD = 'div.card'; // ______________ TOOLTIP

  $('[data-toggle="tooltip"]').tooltip(); // ______________ POPOVER

  $('[data-toggle="popover"]').popover({
    html: true
  }); // ______________ FUNCTION FOR REMOVE CARD

  $(document).on('click', '[data-toggle="card-remove"]', function (e) {
    var $card = $(this).closest(DIV_CARD);
    $card.remove();
    e.preventDefault();
    return false;
  }); // ______________ FUNCTIONS FOR COLLAPSED CARD

  $(document).on('click', '[data-toggle="card-collapse"]', function (e) {
    var $card = $(this).closest(DIV_CARD);
    $card.toggleClass('card-collapsed');
    e.preventDefault();
    return false;
  }); // ______________ CARD FULL SCREEN

  $(document).on('click', '[data-toggle="card-fullscreen"]', function (e) {
    var $card = $(this).closest(DIV_CARD);
    $card.toggleClass('card-fullscreen').removeClass('card-collapsed');
    e.preventDefault();
    return false;
  }); // ______________ SWITCHER-toggle ______________//

  /*Skin modes*/

  $(document).on("click", '#myonoffswitch16', function () {
    if (this.checked) {
      $('body').addClass('dark-mode');
      $('body').removeClass('light-mode');
      $('body').removeClass('transparent-mode');
      localStorage.setItem("dark-mode", "True");
    } else {
      $('body').removeClass('dark-mode');
      localStorage.setItem("dark-mode", "false");
    }
  });
  $(document).on("click", '#myonoffswitch3', function () {
    if (this.checked) {
      $('body').addClass('light-mode');
      $('body').removeClass('dark-mode');
      $('body').removeClass('transparent-mode');
      localStorage.setItem("light-mode", "True");
    } else {
      $('body').removeClass('light-mode');
      localStorage.setItem("light-mode", "false");
    }
  });
  $(document).on("click", '#myonoffswitch4', function () {
    if (this.checked) {
      $('body').addClass('transparent-mode');
      $('body').removeClass('dark-mode');
      $('body').removeClass('light-mode');
      localStorage.setItem("transparent-mode", "True");
    } else {
      $('body').removeClass('transparent-mode');
      localStorage.setItem("transparent-mode", "false");
    }
  });
  /*-- Horizonatal Versions---*/

  $('#myonoffswitch13').click(function () {
    if (this.checked) {
      $('body').addClass('default');
      $('body').removeClass('boxed');
      localStorage.setItem("default", "True");
    } else {
      $('body').removeClass('default');
      localStorage.setItem("default", "false");
    }
  });
  $('#myonoffswitch14').click(function () {
    if (this.checked) {
      $('body').addClass('boxed');
      $('body').removeClass('default');
      localStorage.setItem("boxed", "True");
    } else {
      $('body').removeClass('boxed');
      localStorage.setItem("boxed", "false");
    }
  });
  /*------ Horizonatal-menu-------*/

  /*Header Style*/

  $(document).on("click", '#myonoffswitch10', function () {
    if (this.checked) {
      $('body').addClass('light-hor-header');
      $('body').removeClass('color-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('dark-hor-menu');
      localStorage.setItem("default-hor-header", "True");
    } else {
      $('body').removeClass('light-hor-header');
      localStorage.setItem("light-hor-header", "false");
    }
  });
  $(document).on("click", '#myonoffswitch11', function () {
    if (this.checked) {
      $('body').addClass('color-hor-header');
      $('body').removeClass('light-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('dark-hor-menu');
      localStorage.setItem("color-hor-header", "True");
    } else {
      $('body').removeClass('color-hor-header');
      localStorage.setItem("color-hor-header", "false");
    }
  });
  $(document).on("click", '#myonoffswitch12', function () {
    if (this.checked) {
      $('body').addClass('gradient-hor-header');
      $('body').removeClass('color-hor-header');
      $('body').removeClass('light-hor-header');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('dark-hor-menu');
      localStorage.setItem("gradient-hor-header", "True");
    } else {
      $('body').removeClass('gradient-hor-header');
      localStorage.setItem("gradient-hor-header", "false");
    }
  });
  /*Menu Style*/

  $(document).on("click", '#myonoffswitch6', function () {
    if (this.checked) {
      $('body').addClass('color-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('dark-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('light-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('color-hor-header');
      localStorage.setItem("color-hor-menu", "True");
    } else {
      $('body').removeClass('color-hor-menu');
      localStorage.setItem("color-hor-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch7', function () {
    if (this.checked) {
      $('body').addClass('light-hor-menu');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('dark-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('color-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('light-hor-header');
      localStorage.setItem("light-hor-menu", "True");
    } else {
      $('body').removeClass('light-hor-menu');
      localStorage.setItem("light-hor-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch8', function () {
    if (this.checked) {
      $('body').addClass('dark-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('gradient-hor-menu');
      $('body').removeClass('color-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('light-hor-header');
      localStorage.setItem("dark-hor-menu", "True");
    } else {
      $('body').removeClass('dark-hor-menu');
      localStorage.setItem("dark-hor-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch9', function () {
    if (this.checked) {
      $('body').addClass('gradient-hor-menu');
      $('body').removeClass('color-hor-menu');
      $('body').removeClass('light-hor-menu');
      $('body').removeClass('dark-hor-menu');
      $('body').removeClass('color-hor-header');
      $('body').removeClass('gradient-hor-header');
      $('body').removeClass('light-hor-header');
      localStorage.setItem("gradient-hor-menu", "True");
    } else {
      $('body').removeClass('gradient-hor-menu');
      localStorage.setItem("gradient-hor-menu", "false");
    }
  });
  /*Left-menu Background Image*/

  $(document).on("click", '#myonoffswitch-1', function () {
    if (this.checked) {
      $('body').addClass('sidemenu-bgimage');
      localStorage.setItem("sidemenu-bgimage", "True");
    } else {
      $('body').removeClass('sidemenu-bgimage');
      localStorage.setItem("sidemenu-bgimage", "false");
    }
  });
  /*Left-menu Style1*/

  $(document).on("click", '#myonoffswitch', function () {
    if (this.checked) {
      $('body').addClass('color-menu');
      $('body').removeClass('light-menu');
      $('body').removeClass('dark-menu');
      $('body').removeClass('gradient-menu');
      localStorage.setItem("color-menu", "True");
    } else {
      $('body').removeClass('color-menu');
      localStorage.setItem("color-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch1', function () {
    if (this.checked) {
      $('body').addClass('light-menu');
      $('body').removeClass('color-menu');
      $('body').removeClass('dark-menu');
      $('body').removeClass('gradient-menu');
      localStorage.setItem("light-menu", "True");
    } else {
      $('body').removeClass('light-menu');
      localStorage.setItem("light-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch2', function () {
    if (this.checked) {
      $('body').addClass('dark-menu');
      $('body').removeClass('color-menu');
      $('body').removeClass('light-menu');
      $('body').removeClass('gradient-menu');
      localStorage.setItem("dark-menu", "True");
    } else {
      $('body').removeClass('dark-menu');
      localStorage.setItem("dark-menu", "false");
    }
  });
  $(document).on("click", '#myonoffswitch5', function () {
    if (this.checked) {
      $('body').addClass('gradient-menu');
      $('body').removeClass('color-menu');
      $('body').removeClass('light-menu');
      $('body').removeClass('dark-menu');
      localStorage.setItem("gradient-menu", "True");
    } else {
      $('body').removeClass('gradient-menu');
      localStorage.setItem("gradient-menu", "false");
    }
  });
  /*-- Left-menu Versions---*/

  $('#myonoffswitch15').click(function () {
    if (this.checked) {
      $('body').addClass('default');
      $('body').removeClass('boxed');
      localStorage.setItem("default", "True");
    } else {
      $('body').removeClass('default');
      localStorage.setItem("default", "false");
    }
  });
  $('#myonoffswitch17').click(function () {
    if (this.checked) {
      $('body').addClass('boxed');
      $('body').removeClass('default');
      localStorage.setItem("boxed", "True");
    } else {
      $('body').removeClass('boxed');
      localStorage.setItem("boxed", "false");
    }
  }); // ______________ Styles ______________//
  //$('body').addClass('transparent-mode');//
  //$('body').addClass('sidemenu-bgimage');//
  //$('body').addClass('color-menu');//
  //$('body').addClass('light-menu');//
  //$('body').addClass('dark-menu');//
  //$('body').addClass('gradient-menu');//
  //$('body').addClass('light-hor-header');//
  //$('body').addClass('color-hor-header');//
  //$('body').addClass('gradient-hor-header');//
  //$('body').addClass('color-hor-menu');//
  //$('body').addClass('light-hor-menu');//
  //$('body').addClass('gradient-hor-menu');//
  //$('body').addClass('dark-hor-menu');//
})(jQuery);

$(function (e) {
  'use strict';

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page'
    }
  });
  $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  }); // Select2

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });
});
$(function (e) {
  'use strict';
  /*-----echart2-----*/

  var chartdata = [{
    name: 'sales',
    type: 'bar',
    data: [10, 15, 9, 18, 10, 15]
  }, {
    name: 'profit',
    type: 'line',
    smooth: true,
    data: [8, 5, 25, 10, 10]
  }, {
    name: 'growth',
    type: 'bar',
    data: [10, 14, 10, 15, 9, 25]
  }];
  var chart = document.getElementById('echart1');
  var barChart = echarts.init(chart);
  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer: {
        label: {
          show: false
        }
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata,
    color: ['#0774f8', '#09ad95', '#d43f8d']
  };
  barChart.setOption(option);
  /*-----echart1-----*/

  var chartdata2 = [{
    name: 'sales',
    type: 'line',
    smooth: true,
    data: [12, 25, 12, 35, 12, 38],
    color: ['#0774f8']
  }, {
    name: 'Profit',
    type: 'line',
    smooth: true,
    size: 10,
    data: [8, 12, 28, 10, 10, 12],
    color: ['#d43f8d']
  }];
  var chart2 = document.getElementById('echart2');
  var barChart2 = echarts.init(chart2);
  var option2 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata2
  };
  barChart2.setOption(option2);
  /*-----echart3-----*/

  var option3 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '32'
    },
    xAxis: {
      type: 'value',
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      type: 'category',
      data: ['2014', '2015', '2016', '2017', '2018'],
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: '#c0dfd8'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata,
    color: ['#0774f8', '#09ad95', '#d43f8d']
  };
  var chart3 = document.getElementById('echart3');
  var barChart3 = echarts.init(chart3);
  barChart3.setOption(option3);
  /*-----echart4-----*/

  var option4 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '32'
    },
    xAxis: {
      type: 'value',
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      type: 'category',
      data: ['2014', '2015', '2016', '2017', '2018'],
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata2,
    color: ['#0774f8', '#d43f8d', '#09ad95']
  };
  var chart4 = document.getElementById('echart4');
  var barChart4 = echarts.init(chart4);
  barChart4.setOption(option4);
  /*-----echart5-----*/

  var chartdata3 = [{
    name: 'sales',
    type: 'bar',
    stack: 'Stack',
    data: [14, 18, 20, 14, 29, 21, 25, 14, 24]
  }, {
    name: 'Profit',
    type: 'bar',
    stack: 'Stack',
    data: [12, 14, 15, 50, 24, 24, 10, 20, 30]
  }];
  var option5 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata3,
    color: ['#0774f8', '#d43f8d']
  };
  var chart5 = document.getElementById('echart5');
  var barChart5 = echarts.init(chart5);
  barChart5.setOption(option5);
  /*-----echart6-----*/

  var option6 = {
    grid: {
      top: '6',
      right: '10',
      bottom: '17',
      left: '32'
    },
    xAxis: {
      type: 'value',
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      type: 'category',
      data: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata3,
    color: ['#0774f8', '#d43f8d']
  };
  var chart6 = document.getElementById('echart6');
  var barChart6 = echarts.init(chart6);
  barChart6.setOption(option6);
  /*-----echart7-----*/

  var chartdata4 = [{
    name: 'data',
    type: 'line',
    data: [20, 20, 36, 18, 15, 20, 25, 20]
  }];
  var option7 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata4,
    color: ['#0774f8']
  };
  var chart7 = document.getElementById('echart7');
  var lineChart = echarts.init(chart7);
  lineChart.setOption(option7);
  /*-----echart8-----*/

  var chartdata5 = [{
    name: 'data',
    type: 'line',
    smooth: true,
    data: [20, 20, 36, 18, 15, 20, 25, 20]
  }];
  var option8 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata5,
    color: ['#d43f8d']
  };
  var chart8 = document.getElementById('echart8');
  var lineChart2 = echarts.init(chart8);
  lineChart2.setOption(option8);
});
/*---- placeholder1----*/

$(function () {
  var sin = [],
      cos = [];

  for (var i = 0; i < 14; i += 0.1) {
    sin.push([i, Math.sin(i)]);
    cos.push([i, Math.cos(i)]);
  }

  plot = $.plot("#placeholder1", [{
    data: sin
  }, {
    data: cos
  }], {
    series: {
      lines: {
        show: true
      }
    },
    lines: {
      show: true,
      fill: true,
      fillColor: {
        colors: [{
          opacity: 0.7
        }, {
          opacity: 0.7
        }]
      }
    },
    crosshair: {
      mode: "x"
    },
    grid: {
      hoverable: false,
      autoHighlight: false,
      borderColor: "rgba(119, 119, 142, 0.2)",
      verticalLines: false,
      horizontalLines: false
    },
    colors: ['#0774f8', '#d43f8d'],
    yaxis: {
      min: -1.2,
      max: 1.2,
      tickLength: 0
    },
    xaxis: {
      tickLength: 0
    }
  });
});
/*---- placeholder2----*/

$(function () {
  var sin = [],
      cos = [];

  for (var i = 0; i < 14; i += 0.5) {
    sin.push([i, Math.sin(i)]);
    cos.push([i, Math.cos(i)]);
  }

  var plot = $.plot("#placeholder2", [{
    data: sin,
    label: "data1"
  }, {
    data: cos,
    label: "data2"
  }], {
    series: {
      lines: {
        show: true
      },
      points: {
        show: true
      }
    },
    grid: {
      hoverable: true,
      clickable: true,
      borderColor: "rgba(119, 119, 142, 0.2)",
      verticalLines: false,
      horizontalLines: false
    },
    colors: ['#0774f8', '#d43f8d'],
    yaxis: {
      min: -1.2,
      max: 1.2,
      tickLength: 0
    },
    xaxis: {
      tickLength: 0
    }
  });
});
/*---- placeholder3----*/

$(function () {
  var males = {
    "15%": [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6], [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9], [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]],
    "90%": [[2, 96.8], [3, 105.2], [4, 113.9], [5, 120.8], [6, 127.0], [7, 133.1], [8, 139.1], [9, 143.9], [10, 151.3], [11, 161.1], [12, 164.8], [13, 173.5], [14, 179.0], [15, 182.0], [16, 186.9], [17, 185.2], [18, 186.3], [19, 186.6]],
    "25%": [[2, 89.2], [3, 94.9], [4, 104.4], [5, 111.4], [6, 117.5], [7, 120.2], [8, 127.1], [9, 132.9], [10, 136.8], [11, 144.4], [12, 149.5], [13, 154.1], [14, 163.1], [15, 169.2], [16, 170.4], [17, 171.2], [18, 172.4], [19, 170.8]],
    "10%": [[2, 86.9], [3, 92.6], [4, 99.9], [5, 107.0], [6, 114.0], [7, 113.5], [8, 123.6], [9, 129.2], [10, 133.0], [11, 140.6], [12, 145.2], [13, 149.7], [14, 158.4], [15, 163.5], [16, 166.9], [17, 167.5], [18, 167.1], [19, 165.3]],
    "mean": [[2, 91.9], [3, 98.5], [4, 107.1], [5, 114.4], [6, 120.6], [7, 124.7], [8, 131.1], [9, 136.8], [10, 142.3], [11, 150.0], [12, 154.7], [13, 161.9], [14, 168.7], [15, 173.6], [16, 175.9], [17, 176.6], [18, 176.8], [19, 176.7]],
    "75%": [[2, 94.5], [3, 102.1], [4, 110.8], [5, 117.9], [6, 124.0], [7, 129.3], [8, 134.6], [9, 141.4], [10, 147.0], [11, 156.1], [12, 160.3], [13, 168.3], [14, 174.7], [15, 178.0], [16, 180.2], [17, 181.7], [18, 181.3], [19, 182.5]],
    "85%": [[2, 96.2], [3, 103.8], [4, 111.8], [5, 119.6], [6, 125.6], [7, 131.5], [8, 138.0], [9, 143.3], [10, 149.3], [11, 159.8], [12, 162.5], [13, 171.3], [14, 177.5], [15, 180.2], [16, 183.8], [17, 183.4], [18, 183.5], [19, 185.5]],
    "50%": [[2, 91.9], [3, 98.2], [4, 106.8], [5, 114.6], [6, 120.8], [7, 125.2], [8, 130.3], [9, 137.1], [10, 141.5], [11, 149.4], [12, 153.9], [13, 162.2], [14, 169.0], [15, 174.8], [16, 176.0], [17, 176.8], [18, 176.4], [19, 177.4]]
  };
  var females = {
    "15%": [[2, 84.8], [3, 93.7], [4, 100.6], [5, 105.8], [6, 113.3], [7, 119.3], [8, 124.3], [9, 131.4], [10, 136.9], [11, 143.8], [12, 149.4], [13, 151.2], [14, 152.3], [15, 155.9], [16, 154.7], [17, 157.0], [18, 156.1], [19, 155.4]],
    "90%": [[2, 95.6], [3, 104.1], [4, 111.9], [5, 119.6], [6, 127.6], [7, 133.1], [8, 138.7], [9, 147.1], [10, 152.8], [11, 161.3], [12, 166.6], [13, 167.9], [14, 169.3], [15, 170.1], [16, 172.4], [17, 169.2], [18, 171.1], [19, 172.4]],
    "25%": [[2, 87.2], [3, 95.9], [4, 101.9], [5, 107.4], [6, 114.8], [7, 121.4], [8, 126.8], [9, 133.4], [10, 138.6], [11, 146.2], [12, 152.0], [13, 153.8], [14, 155.7], [15, 158.4], [16, 157.0], [17, 158.5], [18, 158.4], [19, 158.1]],
    "10%": [[2, 84.0], [3, 91.9], [4, 99.2], [5, 105.2], [6, 112.7], [7, 118.0], [8, 123.3], [9, 130.2], [10, 135.0], [11, 141.1], [12, 148.3], [13, 150.0], [14, 150.7], [15, 154.3], [16, 153.6], [17, 155.6], [18, 154.7], [19, 153.1]],
    "mean": [[2, 90.2], [3, 98.3], [4, 105.2], [5, 112.2], [6, 119.0], [7, 125.8], [8, 131.3], [9, 138.6], [10, 144.2], [11, 151.3], [12, 156.7], [13, 158.6], [14, 160.5], [15, 162.1], [16, 162.9], [17, 162.2], [18, 163.0], [19, 163.1]],
    "75%": [[2, 93.2], [3, 101.5], [4, 107.9], [5, 116.6], [6, 122.8], [7, 129.3], [8, 135.2], [9, 143.7], [10, 148.7], [11, 156.9], [12, 160.8], [13, 163.0], [14, 165.0], [15, 165.8], [16, 168.7], [17, 166.2], [18, 167.6], [19, 168.0]],
    "85%": [[2, 94.5], [3, 102.8], [4, 110.4], [5, 119.0], [6, 125.7], [7, 131.5], [8, 137.9], [9, 146.0], [10, 151.3], [11, 159.9], [12, 164.0], [13, 166.5], [14, 167.5], [15, 168.5], [16, 171.5], [17, 168.0], [18, 169.8], [19, 170.3]],
    "50%": [[2, 90.2], [3, 98.1], [4, 105.2], [5, 111.7], [6, 118.2], [7, 125.6], [8, 130.5], [9, 138.3], [10, 143.7], [11, 151.4], [12, 156.7], [13, 157.7], [14, 161.0], [15, 162.0], [16, 162.8], [17, 162.2], [18, 162.8], [19, 163.3]]
  };
  var dataset = [{
    label: "Female mean",
    data: females["mean"],
    lines: {
      show: true
    },
    color: "#0774f8"
  }, {
    id: "f15%",
    data: females["15%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: false
    },
    color: "#0774f8"
  }, {
    id: "f25%",
    data: females["25%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.2
    },
    color: "#0774f8",
    fillBetween: "f15%"
  }, {
    id: "f50%",
    data: females["50%"],
    lines: {
      show: true,
      lineWidth: 0.5,
      fill: 0.4,
      shadowSize: 0
    },
    color: "#0774f8",
    fillBetween: "f25%"
  }, {
    id: "f75%",
    data: females["75%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.4
    },
    color: "#0774f8",
    fillBetween: "f50%"
  }, {
    id: "f85%",
    data: females["85%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.2
    },
    color: "#0774f8",
    fillBetween: "f75%"
  }, {
    label: "Male mean",
    data: males["mean"],
    lines: {
      show: true
    },
    color: "rgba(251, 141, 52)"
  }, {
    id: "m15%",
    data: males["15%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: false
    },
    color: "rgba(251, 141, 52)"
  }, {
    id: "m25%",
    data: males["25%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.2
    },
    color: "rgba(251, 141, 52)",
    fillBetween: "m15%"
  }, {
    id: "m50%",
    data: males["50%"],
    lines: {
      show: true,
      lineWidth: 0.5,
      fill: 0.4,
      shadowSize: 0
    },
    color: "rgba(251, 141, 52)",
    fillBetween: "m25%"
  }, {
    id: "m75%",
    data: males["75%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.4
    },
    color: "rgba(251, 141, 52)",
    fillBetween: "m50%"
  }, {
    id: "m85%",
    data: males["85%"],
    lines: {
      show: true,
      lineWidth: 0,
      fill: 0.2
    },
    color: "rgb(23,183,148",
    fillBetween: "m75%"
  }];
  $.plot($("#placeholder3"), dataset, {
    grid: {
      borderColor: "rgba(119, 119, 142, 0.2)"
    },
    xaxis: {
      tickDecimals: 0,
      tickLength: 0
    },
    yaxis: {
      tickLength: 0,
      tickFormatter: function tickFormatter(v) {
        return v + " cm";
      }
    },
    legend: {
      position: "se"
    }
  });
});
/*---- placeholder4----*/

$(function () {
  // We use an inline data source in the example, usually data would
  // be fetched from a server
  var data = [],
      totalPoints = 300;

  function getRandomData() {
    if (data.length > 0) data = data.slice(1); // Do a random walk

    while (data.length < totalPoints) {
      var prev = data.length > 0 ? data[data.length - 1] : 50,
          y = prev + Math.random() * 10 - 5;

      if (y < 0) {
        y = 0;
      } else if (y > 100) {
        y = 100;
      }

      data.push(y);
    }

    var res = [];

    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]]);
    }

    return res;
  }

  var updateInterval = 30;
  $("#updateInterval").val(updateInterval).change(function () {
    var v = $(this).val();

    if (v && !isNaN(+v)) {
      updateInterval = +v;

      if (updateInterval < 1) {
        updateInterval = 1;
      } else if (updateInterval > 2000) {
        updateInterval = 2000;
      }

      $(this).val("" + updateInterval);
    }
  });
  var plot = $.plot("#placeholder4", [getRandomData()], {
    series: {
      shadowSize: 0 // Drawing is faster without shadows

    },
    grid: {
      borderColor: "rgba(119, 119, 142, 0.2)"
    },
    colors: ["#0774f8"],
    yaxis: {
      min: 0,
      max: 100,
      tickLength: 0
    },
    xaxis: {
      tickLength: 0,
      show: false
    }
  });

  function update() {
    plot.setData([getRandomData()]);
    plot.draw();
    setTimeout(update, updateInterval);
  }

  update();
});
/*---- placeholder5----*/

$(function () {
  var d1 = [];

  for (var i = 0; i < 14; i += 0.5) {
    d1.push([i, Math.sin(i)]);
  }

  var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
  var d3 = [];

  for (var i = 0; i < 14; i += 0.5) {
    d3.push([i, Math.cos(i)]);
  }

  var d4 = [];

  for (var i = 0; i < 14; i += 0.1) {
    d4.push([i, Math.sqrt(i * 10)]);
  }

  var d5 = [];

  for (var i = 0; i < 14; i += 0.5) {
    d5.push([i, Math.sqrt(i)]);
  }

  var d6 = [];

  for (var i = 0; i < 14; i += 0.5 + Math.random()) {
    d6.push([i, Math.sqrt(2 * i + Math.sin(i) + 5)]);
  }

  $.plot("#placeholder5", [{
    data: d1,
    lines: {
      show: true,
      fill: true
    }
  }, {
    data: d2,
    bars: {
      show: true
    }
  }, {
    data: d3,
    points: {
      show: true
    }
  }, {
    data: d4,
    lines: {
      show: true
    }
  }, {
    data: d5,
    lines: {
      show: true
    },
    points: {
      show: true
    }
  }, {
    data: d6,
    lines: {
      show: true,
      steps: true
    }
  }]);
});
/*---- placeholder6----*/

$(function () {
  var d1 = [];

  for (var i = 0; i <= 10; i += 1) {
    d1.push([i, parseInt(Math.random() * 30)]);
  }

  var d2 = [];

  for (var i = 0; i <= 10; i += 1) {
    d2.push([i, parseInt(Math.random() * 30)]);
  }

  var d3 = [];

  for (var i = 0; i <= 10; i += 1) {
    d3.push([i, parseInt(Math.random() * 30)]);
  }

  var stack = 0,
      bars = true,
      lines = false,
      steps = false;

  function plotWithOptions() {
    $.plot("#placeholder6", [d1, d2, d3], {
      series: {
        stack: stack,
        lines: {
          show: lines,
          fill: true,
          steps: steps
        },
        bars: {
          show: bars,
          barWidth: 0.6
        }
      },
      grid: {
        borderColor: "rgba(119, 119, 142, 0.2)"
      },
      colors: ['#0774f8', '#d43f8d'],
      yaxis: {
        tickLength: 0
      },
      xaxis: {
        tickLength: 0,
        show: false
      }
    });
  }

  plotWithOptions();
  $(".stackControls button").click(function (e) {
    e.preventDefault();
    stack = $(this).text() == "With stacking" ? true : null;
    plotWithOptions();
  });
  $(".graphControls button").click(function (e) {
    e.preventDefault();
    bars = $(this).text().indexOf("Bars") != -1;
    lines = $(this).text().indexOf("Lines") != -1;
    steps = $(this).text().indexOf("steps") != -1;
    plotWithOptions();
  });
});
$(function () {
  var data = [],
      series = Math.floor(Math.random() * 4) + 3;

  for (var i = 0; i < series; i++) {
    data[i] = {
      label: "Series" + (i + 1),
      data: Math.floor(Math.random() * 100) + 1
    };
  }

  var placeholder = $("#placeholder");
  $("#example-1").click(function () {
    placeholder.unbind();
    $("#title").text("Default pie chart");
    $("#description").text("The default pie chart with no options set.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91']
    });
  });
  $("#example-2").click(function () {
    placeholder.unbind();
    $("#title").text("Default without legend");
    $("#description").text("The default pie chart when the legend is disabled. Since the labels would normally be outside the container, the chart is resized to fit.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-3").click(function () {
    placeholder.unbind();
    $("#title").text("Custom Label Formatter");
    $("#description").text("Added a semi-transparent background to the labels and a custom labelFormatter function.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 1,
          label: {
            show: true,
            radius: 1,
            formatter: labelFormatter,
            background: {
              opacity: 0.8
            }
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-4").click(function () {
    placeholder.unbind();
    $("#title").text("Label Radius");
    $("#description").text("Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 1,
          label: {
            show: true,
            radius: 3 / 4,
            formatter: labelFormatter,
            background: {
              opacity: 0.5
            }
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#64E572'],
      legend: {
        show: false
      }
    });
  });
  $("#example-5").click(function () {
    placeholder.unbind();
    $("#title").text("Label Styles #1");
    $("#description").text("Semi-transparent, black-colored label background.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 1,
          label: {
            show: true,
            radius: 3 / 4,
            formatter: labelFormatter,
            background: {
              opacity: 0.5,
              color: "#000"
            }
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-6").click(function () {
    placeholder.unbind();
    $("#title").text("Label Styles #2");
    $("#description").text("Semi-transparent, black-colored label background placed at pie edge.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 3 / 4,
          label: {
            show: true,
            radius: 3 / 4,
            formatter: labelFormatter,
            background: {
              opacity: 0.5,
              color: "#000"
            }
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-7").click(function () {
    placeholder.unbind();
    $("#title").text("Hidden Labels");
    $("#description").text("Labels can be hidden if the slice is less than a given percentage of the pie (10% in this case).");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 1,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-8").click(function () {
    placeholder.unbind();
    $("#title").text("Combined Slice");
    $("#description").text("Multiple slices less than a given percentage (5% in this case) of the pie can be combined into a single, larger slice.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          combine: {
            color: "#999",
            threshold: 0.05
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-9").click(function () {
    placeholder.unbind();
    $("#title").text("Rectangular Pie");
    $("#description").text("The radius can also be set to a specific size (even larger than the container itself).");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 500,
          label: {
            show: true,
            formatter: labelFormatter,
            threshold: 0.1
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-10").click(function () {
    placeholder.unbind();
    $("#title").text("Tilted Pie");
    $("#description").text("The pie can be tilted at an angle.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          radius: 1,
          tilt: 0.5,
          label: {
            show: true,
            radius: 1,
            formatter: labelFormatter,
            background: {
              opacity: 0.8
            }
          },
          combine: {
            color: "#999",
            threshold: 0.1
          }
        }
      },
      colors: ['#0774f8', '#d43f8d', '#45aaf2', '#ecb403', '#e86a91'],
      legend: {
        show: false
      }
    });
  });
  $("#example-11").click(function () {
    placeholder.unbind();
    $("#title").text("Donut Hole");
    $("#description").text("A donut hole can be added.");
    $.plot(placeholder, data, {
      series: {
        pie: {
          innerRadius: 0.5,
          show: true
        }
      }
    });
  });
  $("#example-1").click();
}); // A custom label formatter used by several of the plots

function labelFormatter(label, series) {
  return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
} //


function setCode(lines) {
  $("#code").text(lines.join("\n"));
}

$(function (e) {
  'use strict'; // Toggles

  $('.toggle').toggles({
    on: true,
    height: 26
  }); // Input Masks

  $('#dateMask').mask('99/99/9999');
  $('#phoneMask').mask('(999) 999-9999');
  $('#ssnMask').mask('999-99-9999'); // Time Picker

  $('#tpBasic').timepicker();
  $('#tp2').timepicker({
    'scrollDefault': 'now'
  });
  $('#tp3').timepicker();
  $(document).on('click', '#setTimeButton', function () {
    $('#tp3').timepicker('setTime', new Date());
  }); // Color picker

  $('#colorpicker').spectrum({
    color: '#0061da'
  });
  $('#showAlpha').spectrum({
    color: 'rgba(0, 97, 218, 0.5)',
    showAlpha: true
  });
  $('#showPaletteOnly').spectrum({
    showPaletteOnly: true,
    showPalette: true,
    color: '#DC3545',
    palette: [['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'], ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']]
  }); //Date range picker

  $('#reservation').daterangepicker(); // Datepicker

  $('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
  });
  $('#datepickerNoOfMonths').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  }); // Select2

  $('.select2').select2({
    minimumResultsForSearch: Infinity
  }); // Select2 by showing the search

  $('.select2-show-search').select2({
    minimumResultsForSearch: ''
  });
});

(function ($) {
  "use strict";

  if ($("#elm1").length > 0) {
    tinymce.init({
      selector: "textarea#elm1",
      theme: "modern",
      height: 300,
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });
  }
})(jQuery);

$(function (e) {
  "use strict";

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'listDay,listWeek,month'
    },
    // customize the button names,
    // otherwise they'd all just say "list"
    views: {
      listDay: {
        buttonText: 'list day'
      },
      listWeek: {
        buttonText: 'list week'
      }
    },
    defaultView: 'listWeek',
    defaultDate: '2019-11-12',
    navLinks: true,
    // can click day/week names to navigate views
    editable: true,
    eventLimit: true,
    // allow "more" link when too many events
    events: [{
      id: 999,
      title: 'Repeating Event',
      start: '2019-11-09T16:00:00'
    }, {
      id: 999,
      title: 'Repeating Event',
      start: '2019-11-16T16:00:00'
    }, {
      title: 'Conference',
      start: '2019-11-11',
      end: '2019-11-13'
    }, {
      title: 'Meeting',
      start: '2019-11-12T10:30:00',
      end: '2019-11-12T12:30:00'
    }, {
      title: 'Lunch',
      start: '2019-11-12T12:00:00'
    }, {
      title: 'Meeting',
      start: '2019-11-12T14:30:00'
    }, {
      title: 'Happy Hour',
      start: '2019-11-12T17:30:00'
    }, {
      title: 'Dinner',
      start: '2019-11-12T20:00:00'
    }, {
      title: 'Birthday Party',
      start: '2019-11-13T07:00:00'
    }, {
      title: 'Click for Google',
      url: 'http://google.com/',
      start: '2019-11-28'
    }]
  });
});

(function ($) {
  "use strict";

  var chart = c3.generate({
    bindto: '#chart-area-spline2',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 0, 8, 10, 12, 20, 18, 15, 10, 18, 10, 20, 10], ['data2', 0, 12, 8, 20, 10, 13, 10, 20, 10, 19, 8, 19]],
      type: 'area-spline',
      // default type of chart
      colors: {
        data1: '#5797fc',
        data2: '#26eda2'
      },
      names: {
        // name of each serie
        'data1': 'Profit',
        'data2': 'Sales'
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    legend: {
      position: 'inset',
      padding: 0,
      inset: {
        anchor: 'top-left',
        x: 20,
        y: 8,
        step: 10
      }
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    padding: {
      bottom: 0,
      left: -1,
      right: -1
    },
    point: {
      show: false
    }
  });
  var chart = c3.generate({
    bindto: '#chart-area-spline1',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 0, 8, 10, 12, 20, 18, 15, 10, 18, 10, 20, 10], ['data2', 0, 12, 8, 20, 10, 13, 10, 20, 10, 19, 8, 19]],
      type: 'area-spline',
      // default type of chart
      colors: {
        data1: '#4ecc48',
        data2: '#5797fc'
      },
      names: {
        // name of each serie
        'data1': 'data1',
        'data2': 'data2'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  var chart = c3.generate({
    bindto: '#chart-visitors',
    padding: {
      bottom: 24
    },
    data: {
      x: 'x',
      names: {
        data1: 'views',
        data2: 'Sales',
        data3: 'Users'
      },
      columns: [['x', '2018-08-02', '2018-05-09', '2018-05-12', '2018-05-18', '2018-05-21', '2018-05-25', '2018-06-08', '2018-06-11', '2018-06-19', '2018-06-22', '2018-07-12'], ['data1', 22, 28, 21, 46, 48, 38, 48, 52, 28, 57, 32], ['data2', 50, 61, 75, 104, 110, 76, 74, 98, 78, 96, 144], ['data3', 155, 100, 96, 132, 154, 141, 158, 142, 132, 146, 186]],
      types: {
        data1: 'area'
      }
    },
    point: {
      show: false
    },
    legend: {
      position: 'top',
      padding: 16
    },
    transition: {
      duration: 0
    },
    axis: {
      y: {
        tick: {
          fit: true
        }
      },
      x: {
        type: 'timeseries',
        tick: {
          format: '%d %b'
        },
        padding: {
          top: 10,
          bottom: 0
        }
      }
    },
    grid: {
      y: {
        show: true
      }
    },
    color: {
      pattern: ['#c21a1a', '#4ecc48', '#867efc']
    }
  });
  var chart = c3.generate({
    bindto: '#chart-tasks',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 0, 0, 1, 2, 21, 9, 12, 10, 31, 13, 65, 10, 12, 6, 4, 3, 0], ['data2', 0, 0, 1, 2, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 2, 2, 0], ['data3', 0, 0, 1, 0, 2, 0, 1, 0, 2, 3, 0, 2, 3, 2, 1, 0, 0]],
      classes: {
        data1: 'filled',
        data2: 'filled',
        data3: 'filled'
      },
      type: 'area-spline',
      // default type of chart
      groups: [['data1', 'data2', 'data3']],
      colors: {
        data1: '#0774f8',
        data2: '#d43f8d ',
        data3: '#09ad95'
      },
      names: {
        // name of each serie
        'data1': 'Profit',
        'data2': 'Sales',
        'data3': 'Gain'
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    legend: {
      position: 'inset',
      padding: 0,
      inset: {
        anchor: 'top-left',
        x: 20,
        y: 8,
        step: 10
      }
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    padding: {
      bottom: 0,
      left: -1,
      right: -1
    },
    point: {
      show: false
    }
  });
  /*chart-donut*/

  var chart = c3.generate({
    bindto: '#chart-donut',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 78], ['data2', 95], ['data3', 25]],
      type: 'donut',
      // default type of chart
      colors: {
        data1: '#6574cd',
        data2: '#2bcbba',
        data3: '#f66d9b'
      },
      names: {
        // name of each serie
        'data1': 'sales1',
        'data2': 'sales2',
        'data3': 'sales3'
      }
    },
    axis: {},
    legend: {
      show: true
    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-pie*/

  var chart = c3.generate({
    bindto: '#chart-pie',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 98], ['data2', 76], ['data3', 45]],
      type: 'pie',
      // default type of chart
      colors: {
        data1: '#ffcc29',
        data2: '#17a2b8',
        data3: '#ff7088'
      },
      names: {
        // name of each serie
        'data1': 'profit1',
        'data2': 'profit2',
        'data3': 'profit3'
      }
    },
    axis: {},
    legend: {
      show: true //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*chart-bg-users-1*/

  var chart = c3.generate({
    bindto: '#chart-bg-users-1',
    padding: {
      bottom: -10,
      left: -1,
      right: -1
    },
    size: {
      height: 64
    },
    data: {
      names: {
        data1: 'Visitors online'
      },
      columns: [['data1', 10, 50, 100, 50, 40, 35, 70]],
      type: 'area-spline'
    },
    legend: {
      show: false
    },
    transition: {
      duration: 0
    },
    point: {
      show: false
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    color: {
      pattern: ['#8543f6']
    }
  });
  /*chart-bg-users-2*/

  var chart = c3.generate({
    bindto: '#chart-bg-users-2',
    padding: {
      bottom: -10,
      left: -1,
      right: -1
    },
    size: {
      height: 64
    },
    data: {
      names: {
        data1: 'Total Sales'
      },
      columns: [['data1', 10, 30, 20, 60, 70, 85, 75]],
      type: 'area-spline'
    },
    legend: {
      show: false
    },
    transition: {
      duration: 0
    },
    point: {
      show: false
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    color: {
      pattern: ['#ff7088']
    }
  });
  /*chart-bg-users-3*/

  var chart = c3.generate({
    bindto: '#chart-bg-users-3',
    padding: {
      bottom: -10,
      left: -1,
      right: -1
    },
    size: {
      height: 64
    },
    data: {
      names: {
        data1: 'Total Projects'
      },
      columns: [['data1', 40, 40, 50, 70, 100, 85, 80]],
      type: 'area-spline'
    },
    legend: {
      show: false
    },
    transition: {
      duration: 0
    },
    point: {
      show: false
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    color: {
      pattern: ['#fc7303']
    }
  });
  /*chart-bg-users-4*/

  var chart = c3.generate({
    bindto: '#chart-bg-users-4',
    padding: {
      bottom: -10,
      left: -1,
      right: -1
    },
    size: {
      height: 64
    },
    data: {
      names: {
        data1: 'Today Income'
      },
      columns: [['data1', 300, 800, 300, 600, 300, 650, 1000]],
      type: 'area-spline'
    },
    legend: {
      show: false
    },
    transition: {
      duration: 0
    },
    point: {
      show: false
    },
    tooltip: {
      format: {
        title: function title(x) {
          return '';
        }
      }
    },
    axis: {
      y: {
        padding: {
          bottom: 0
        },
        show: false,
        tick: {
          outer: false
        }
      },
      x: {
        padding: {
          left: 0,
          right: 0
        },
        show: false
      }
    },
    color: {
      pattern: ['#4ecc48']
    }
  });
  /*chart-browsers*/

  var chart = c3.generate({
    bindto: '#chart-browsers',
    data: {
      columns: [['Chrome', 36], ['Firefox', 15], ['Safari', 9], ['Edge', 10], ['Opera', 30]],
      colors: {
        Chrome: '#17a2b8',
        Firefox: '#fc7303',
        Safari: '#7ea5dd',
        Edge: '#f999b9',
        Opera: '#c21a1a'
      },
      type: 'donut'
    },
    legend: {
      show: true
    }
  });
  /*chart-emails*/

  var chart = c3.generate({
    bindto: '#chart-emails',
    padding: {
      bottom: 24,
      top: 0
    },
    data: {
      type: 'donut',
      names: {
        data1: 'Open',
        data2: 'Bounce',
        data3: 'Unsubscribe'
      },
      columns: [['data1', 30], ['data2', 50], ['data3', 25]],
      colors: {
        data1: 'blue',
        data2: 'red',
        data3: 'yellow'
      }
    },
    donut: {
      label: {
        show: false
      }
    },
    legend: {
      show: true
    }
  });
  $('.resp-tabs-list .home-hogo').addClass('active');
  $('.second-sidemenu .home-hogo').addClass('resp-tab-content-active');
})(jQuery);

$(function (e) {
  /*-----echart1-----*/
  var chartdata = [{
    name: 'sales',
    type: 'bar',
    data: [10, 15, 9, 18, 10, 15]
  }, {
    name: 'profit',
    type: 'line',
    smooth: true,
    data: [8, 5, 25, 10, 10]
  }, {
    name: 'growth',
    type: 'bar',
    data: [10, 14, 10, 15, 9, 25]
  }];
  var chart = document.getElementById('echart1');
  var barChart = echarts.init(chart);
  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer: {
        label: {
          show: false
        }
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata,
    color: ['#0774f8', '#09ad95', '#d43f8d']
  };
  barChart.setOption(option);
  /* Sparkelline bar chart*/

  $(".sparkline_bar1").sparkline([2, 4, 3, 4, 5, 4, 5, 0], {
    type: 'bar',
    height: 78,
    width: 250,
    barWidth: 4,
    barSpacing: 7,
    colorMap: {
      '9': '#a1a1a1'
    },
    barColor: '#d43f8d'
  });
  /* Sparkelline bar chart closed */

  /*-----AreaChart Echart-----*/

  var ctx = document.getElementById("widgetChart1");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      type: 'line',
      datasets: [{
        data: [24, 30, 20, 28, 39, 22, 40],
        label: '',
        backgroundColor: 'rgba(7, 116, 248,0.6)',
        borderColor: '#0774f8'
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 0,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /*-----AreaChart Echart-----*/

  var ctx = document.getElementById("widgetChart2");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      type: 'line',
      datasets: [{
        data: [24, 30, 20, 28, 39, 22, 40],
        label: '',
        backgroundColor: 'rgba(212, 63, 141,0.6)',
        borderColor: '#d43f8d'
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 0,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /*-----AreaChart Echart-----*/

  var ctx = document.getElementById("widgetChart3");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      type: 'line',
      datasets: [{
        data: [24, 30, 20, 28, 39, 22, 40],
        label: '',
        backgroundColor: 'rgba(19, 191, 166,0.6)',
        borderColor: '#09ad95'
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 0,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /*---- Apex Chart -----*/

  var randomizeArray = function randomizeArray(arg) {
    var array = arg.slice();
    var currentIndex = array.length,
        temporaryValue,
        randomIndex;

    while (0 !== currentIndex) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  };

  var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46]; //Spark1

  var spark1 = {
    chart: {
      type: 'area',
      height: 50,
      sparkline: {
        enabled: true
      }
    },
    stroke: {
      curve: 'smooth',
      width: 2
    },
    fill: {
      opacity: 0.3,
      gradient: {
        enabled: false
      }
    },
    series: [{
      name: 'Production Volume',
      data: randomizeArray(sparklineData)
    }],
    yaxis: {
      min: 0
    },
    colors: ['#0774f8']
  };
  var spark1 = new ApexCharts(document.querySelector("#spark1"), spark1);
  spark1.render(); //Spark2

  var spark2 = {
    chart: {
      type: 'area',
      height: 50,
      sparkline: {
        enabled: true
      }
    },
    stroke: {
      curve: 'smooth',
      width: 2
    },
    fill: {
      opacity: 0.3,
      gradient: {
        enabled: false
      }
    },
    series: [{
      name: 'Sales Revenue',
      data: randomizeArray(sparklineData)
    }],
    yaxis: {
      min: 0
    },
    colors: ['#d43f8d']
  };
  var spark2 = new ApexCharts(document.querySelector("#spark2"), spark2);
  spark2.render(); //Spark3

  var spark3 = {
    chart: {
      type: 'area',
      height: 50,
      sparkline: {
        enabled: true
      }
    },
    stroke: {
      curve: 'smooth',
      width: 2
    },
    fill: {
      opacity: 0.3,
      gradient: {
        enabled: false
      }
    },
    series: [{
      name: 'Total Orders',
      data: randomizeArray(sparklineData)
    }],
    yaxis: {
      min: 0
    },
    colors: ['#09ad95']
  };
  var spark3 = new ApexCharts(document.querySelector("#spark3"), spark3);
  spark3.render(); //Spark4

  var spark4 = {
    chart: {
      type: 'area',
      height: 50,
      sparkline: {
        enabled: true
      }
    },
    stroke: {
      curve: 'smooth',
      width: 2
    },
    fill: {
      opacity: 0.3,
      gradient: {
        enabled: false
      }
    },
    series: [{
      name: 'Total profit',
      data: randomizeArray(sparklineData)
    }],
    yaxis: {
      min: 0
    },
    colors: ['#f82649']
  };
  var spark4 = new ApexCharts(document.querySelector("#spark4"), spark4);
  spark4.render();
});
$(function (e) {
  /* Chartjs (#total-customers) */
  var myCanvas = document.getElementById("deals");
  myCanvas.height = "225";
  var myCanvasContext = myCanvas.getContext("2d");
  var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
  gradientStroke1.addColorStop(0, '#09ad95');
  gradientStroke1.addColorStop(1, '#09ad95');
  var myChart = new Chart(myCanvas, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Aug", "Sep"],
      datasets: [{
        label: 'Current Deals',
        data: [16, 14, 12, 14, 16, 15, 12, 14, 18, 10],
        backgroundColor: gradientStroke1,
        hoverBackgroundColor: gradientStroke1,
        hoverBorderWidth: 2,
        hoverBorderColor: 'gradientStroke1'
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 3,
        intersect: false
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true
        }
      },
      scales: {
        xAxes: [{
          barPercentage: 0.3,
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month',
            fontColor: '#77778e'
          }
        }],
        yAxes: [{
          ticks: {
            fontColor: "transparent"
          },
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'sales',
            fontColor: 'transparent'
          }
        }]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }
  });
  /* Chartjs (#total-customers) closed */

  /* Chartjs (#total-coversations) */

  var ctx = document.getElementById('total-coversations').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Total-Transactions",
        borderColor: '#0774f8',
        borderWidth: 4,
        backgroundColor: 'transparent',
        data: [0, 50, 0, 100, 50, 130, 100, 140, 50, 0, 100, 50, 130, 100, 140]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 3,
        intersect: false
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true
        }
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: true,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month',
            fontColor: 'rgba(0,0,0,0.8)'
          }
        }],
        yAxes: [{
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: false,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'sales',
            fontColor: 'transparent'
          }
        }]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }
  });
  /* Chartjs (#total-coversations) closed */

  /*---- morrisBar8----*/

  new Morris.Donut({
    element: 'morrisBar8',
    data: [{
      value: 23,
      label: 'Excellent'
    }, {
      value: 16,
      label: 'Good'
    }, {
      value: 10,
      label: 'Average'
    }, {
      value: 15,
      label: 'Bad'
    }],
    backgroundColor: 'rgba(119, 119, 142, 0.2)',
    labelColor: '#77778e',
    colors: ['#0774f8', '#d43f8d', '#09ad95', '#f5334f'],
    formatter: function formatter(x) {
      return x + "%";
    }
  }).on('click', function (i, row) {
    console.log(i, row);
  });
  /* Chartjs (#revenue) */

  var myCanvas = document.getElementById("revenue");
  myCanvas.height = "300";
  var myCanvasContext = myCanvas.getContext("2d");
  var myChart = new Chart(myCanvas, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
        label: 'total profit',
        data: [15, 18, 12, 14, 10, 15, 7, 14],
        backgroundColor: '#d43f8d',
        hoverBackgroundColor: '#d43f8d',
        hoverBorderWidth: 2,
        hoverBorderColor: '#d43f8d'
      }, {
        label: 'Total sales',
        data: [10, 14, 10, 15, 9, 14, 15, 20],
        backgroundColor: '#0774f8',
        hoverBackgroundColor: '#0774f8',
        hoverBorderWidth: 2,
        hoverBorderColor: '#0774f8'
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 3,
        intersect: false
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true,
          fontFamily: 'Montserrat'
        }
      },
      scales: {
        xAxes: [{
          barPercentage: 0.5,
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: true,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month',
            fontColor: 'rgba(0,0,0,0.8)'
          }
        }],
        yAxes: [{
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: true,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'sales',
            fontColor: 'rgba(0,0,0,0.81)'
          }
        }]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }
  });
  /* Chartjs (#revenue) closed */

  /* Chartjs (#areaChart1) */

  var ctx = document.getElementById('areaChart1').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Market value',
        data: [30, 70, 30, 100, 50, 130, 100, 140],
        backgroundColor: 'transparent',
        borderColor: '#d43f8d',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#d43f8d',
        pointBorderColor: '#d43f8d',
        pointHoverBorderColor: '#d43f8d',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart1) closed */

  /* Chartjs (#areaChart2) */

  var ctx = document.getElementById('areaChart2').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Total Revenue',
        data: [24, 18, 28, 21, 32, 28, 30],
        backgroundColor: 'transparent',
        borderColor: '#09ad95',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#09ad95',
        pointBorderColor: '#09ad95',
        pointHoverBorderColor: '#09ad95',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart2) closed */
});
$(function (e) {
  /*chart-bar*/
  var chart = c3.generate({
    bindto: '#chart-monthly',
    // id of chart wrapper
    data: {
      columns: [// each columns data
      ['data1', 11, 8, 35, 18, 19, 17, 33, 39, 48, 57, 39, 63]],
      type: 'bar',
      // default type of chart
      colors: {
        data1: '#0774f8'
      },
      names: {
        // name of each serie
        'data1': 'Maximum'
      }
    },
    axis: {
      x: {
        type: 'category',
        // name of each category
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    },
    bar: {
      width: 30
    },
    legend: {
      show: false //hide legend

    },
    padding: {
      bottom: 0,
      top: 0
    }
  });
  /*-----DoughutChart-----*/

  var ctx = document.getElementById("doughutChart");
  ctx.height = 257;
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [45, 25, 20],
        backgroundColor: ['#0774f8', '#d43f8d', '#09ad95'],
        hoverBackgroundColor: ['#436bf1', '#d43f8d', '#09ad95']
      }],
      labels: ["Very Satisfied", "satisfied", "Unsatisfied"]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
  /*-----DoughutChart closed-----*/

  /* Chartjs (#revenue) */

  var myCanvas = document.getElementById("revenue");
  myCanvas.height = "330";
  var myCanvasContext = myCanvas.getContext("2d");
  var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
  gradientStroke1.addColorStop(0, '#d43f8d');
  gradientStroke1.addColorStop(1, '#d43f8d');
  var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 300);
  gradientStroke2.addColorStop(0, '#0774f8');
  gradientStroke2.addColorStop(1, '#0774f8');
  var myChart = new Chart(myCanvas, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: 'Total Revenue',
        data: [15, 18, 12, 14, 10, 15, 7, 14, 18, 12, 14, 10],
        backgroundColor: gradientStroke1,
        hoverBackgroundColor: gradientStroke1,
        hoverBorderWidth: 2,
        hoverBorderColor: 'gradientStroke1'
      }, {
        label: 'Total Cost',
        data: [10, 14, 10, 15, 9, 14, 15, 19, 14, 10, 15, 9],
        backgroundColor: gradientStroke2,
        hoverBackgroundColor: gradientStroke2,
        hoverBorderWidth: 2,
        hoverBorderColor: 'gradientStroke2'
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        cornerRadius: 3,
        intersect: false
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true,
          fontFamily: 'Montserrat'
        }
      },
      scales: {
        xAxes: [{
          barPercentage: 0.5,
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: true,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month',
            fontColor: 'rgba(0,0,0,0.8)'
          }
        }],
        yAxes: [{
          ticks: {
            fontColor: "#77778e"
          },
          display: true,
          gridLines: {
            display: true,
            color: 'rgba(119, 119, 142, 0.2)',
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'sales',
            fontColor: '#77778e'
          }
        }]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }
  });
  /* Chartjs (#revenue) closed */
});
$(function (e) {
  'use strict'; // MORRIS LINECHART

  var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
    data: [{
      y: '2011 Q1',
      item1: 2666,
      item2: 2666
    }, {
      y: '2011 Q2',
      item1: 2778,
      item2: 2294
    }, {
      y: '2011 Q3',
      item1: 4912,
      item2: 1969
    }, {
      y: '2011 Q4',
      item1: 3767,
      item2: 13597
    }, {
      y: '2012 Q1',
      item1: 6810,
      item2: 1914
    }, {
      y: '2012 Q2',
      item1: 15670,
      item2: 4293
    }, {
      y: '2012 Q3',
      item1: 4820,
      item2: 3795
    }, {
      y: '2012 Q4',
      item1: 15073,
      item2: 5967
    }, {
      y: '2013 Q1',
      item1: 10687,
      item2: 4460
    }, {
      y: '2013 Q2',
      item1: 8432,
      item2: 5713
    }],
    xkey: 'y',
    ykeys: ['item1', 'item2'],
    labels: ['Income', 'Outcome'],
    lineColors: ['#0774f8', '#d43f8d'],
    pointRadius: 0,
    hideHover: 'auto'
  });
  /* Chartjs (#areaChart1) */

  var ctx = document.getElementById('areaChart1').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Total Quantity',
        data: [30, 70, 30, 100, 50, 130, 100, 140],
        backgroundColor: 'transparent',
        borderColor: '#0774f8',
        pointBackgroundColor: '#0774f8',
        pointHoverBackgroundColor: '#0774f8',
        pointBorderColor: '#0774f8',
        pointHoverBorderColor: '#0774f8',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 2,
        borderWidth: 3
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart1) closed */

  /* Chartjs (#areaChart2) */

  var ctx = document.getElementById('areaChart2').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Total Cost',
        data: [24, 18, 28, 21, 32, 28, 30],
        backgroundColor: 'transparent',
        borderColor: '#d43f8d',
        pointBackgroundColor: '#d43f8d',
        pointHoverBackgroundColor: '#d43f8d',
        pointBorderColor: '#d43f8d',
        pointHoverBorderColor: '#d43f8d',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 2,
        borderWidth: 3
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart2) closed */

  /* Chartjs (#areaChart3) */

  var ctx = document.getElementById('areaChart3').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Total Revenue',
        data: [30, 70, 30, 100, 50, 130, 100, 140],
        backgroundColor: 'transparent',
        borderColor: '#09ad95',
        pointBackgroundColor: '#09ad95',
        pointHoverBackgroundColor: '#09ad95',
        pointBorderColor: '#09ad95',
        pointHoverBorderColor: '#09ad95',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 2,
        borderWidth: 3
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart3) closed */

  /* Chartjs (#areaChart4) */

  var ctx = document.getElementById('areaChart4').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Total Profit',
        data: [24, 18, 28, 21, 32, 28, 30],
        backgroundColor: 'transparent',
        borderColor: '#f7b731',
        pointBackgroundColor: '#f7b731',
        pointHoverBackgroundColor: '#f7b731',
        pointBorderColor: '#f7b731',
        pointHoverBorderColor: '#f7b731',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 2,
        borderWidth: 3
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart4) closed */

  /*----BarChartEchart----*/

  var echartBar = echarts.init(document.getElementById('index'), {
    color: ['#0774f8', '#d43f8d'],
    categoryAxis: {
      axisLine: {
        lineStyle: {
          color: '#77778e'
        }
      },
      splitLine: {
        lineStyle: {
          color: ['rgba(119, 119, 142, 0.2)']
        }
      }
    },
    grid: {
      x: 40,
      y: 20,
      x2: 40,
      y2: 20
    },
    valueAxis: {
      axisLine: {
        lineStyle: {
          color: '#77778e'
        }
      },
      splitArea: {
        show: false,
        areaStyle: {
          color: ['rgba(255,255,255,0.1)']
        }
      },
      splitLine: {
        lineStyle: {
          color: ['rgba(119, 119, 142, 0.2)']
        }
      }
    }
  });
  echartBar.setOption({
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['Revenue', 'Expenses']
    },
    toolbox: {
      show: false
    },
    calculable: false,
    xAxis: [{
      type: 'category',
      data: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    }],
    yAxis: [{
      type: 'value'
    }],
    series: [{
      name: '',
      type: 'bar',
      data: [30.0, 42.3, 60.2, 70.3, 60.8, 19.8, 27.8, 85.63, 52.63, 14.25, 63.25, 12.32],
      markPoint: {
        data: [{
          type: 'max',
          name: ''
        }, {
          type: 'min',
          name: ''
        }]
      },
      markLine: {
        data: [{
          type: 'average',
          name: ''
        }]
      }
    }, {
      name: ' Expenses',
      type: 'bar',
      data: [16.6, 40.9, 50.0, 16.4, 28.7, 80.7, 178.6, 188.2, 48.7, 18.8, 6.0, 2.3],
      markPoint: {
        data: [{
          name: 'Purchased Price',
          value: 182.2,
          xAxis: 7,
          yAxis: 183
        }, {
          name: 'Purchased Price',
          value: 2.3,
          xAxis: 11,
          yAxis: 3
        }]
      },
      markLine: {
        data: [{
          type: 'average',
          name: ''
        }]
      }
    }]
  });
  /*---- MorrisDonutChart----*/

  new Morris.Donut({
    element: 'morrisBar8',
    data: [{
      value: 50,
      label: 'Technology'
    }, {
      value: 25,
      label: 'Furniture'
    }, {
      value: 15,
      label: 'Office Suppliers'
    }],
    backgroundColor: 'rgba(119, 119, 142, 0.2)',
    labelColor: '#77778e',
    colors: ['#0774f8', '#d43f8d', '#09ad95'],
    formatter: function formatter(x) {
      return x + "%";
    }
  }).on('click', function (i, row) {
    console.log(i, row);
  });
  var chartdata = [{
    name: 'sales',
    type: 'bar',
    data: [10, 15, 9, 18, 10, 15]
  }, {
    name: 'profit',
    type: 'line',
    smooth: true,
    data: [8, 5, 25, 10, 10]
  }, {
    name: 'growth',
    type: 'bar',
    data: [10, 14, 10, 15, 9, 25]
  }];
});
$(function (e) {
  'use strict';
  /*-----echart8-----*/

  var chartdata5 = [{
    name: 'Budget',
    type: 'line',
    smooth: true,
    data: [20, 20, 36, 18, 15, 20, 25, 20, 40]
  }];
  var option8 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer: {
        label: {
          show: false
        }
      }
    },
    xAxis: {
      data: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'transparent'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata5,
    color: ['#d43f8d']
  };
  var chart8 = document.getElementById('echart8');
  var lineChart2 = echarts.init(chart8);
  lineChart2.setOption(option8);
  /*-----Barchart-----*/

  var chartdata = [{
    name: 'Total Budget',
    type: 'bar',
    data: [10, 15, 9, 18, 10, 15, 7, 14],
    symbolSize: 10,
    itemStyle: {
      normal: {
        barBorderRadius: [0, 0, 0, 0],
        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
          offset: 0,
          color: '#d43f8d'
        }, {
          offset: 1,
          color: '#d43f8d'
        }])
      }
    }
  }, {
    name: 'Total Amount',
    type: 'bar',
    data: [10, 14, 10, 15, 9, 25, 15, 18],
    symbolSize: 10,
    itemStyle: {
      normal: {
        barBorderRadius: [0, 0, 0, 0],
        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
          offset: 0,
          color: '#0774f8'
        }, {
          offset: 1,
          color: '#0774f8'
        }])
      }
    }
  }];
  var chart = document.getElementById('echart');
  var barChart = echarts.init(chart);
  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25'
    },
    xAxis: {
      data: ['2014', '2015', '2016', '2017', '2018'],
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    tooltip: {
      show: true,
      showContent: true,
      alwaysShowContent: true,
      triggerOn: 'mousemove',
      trigger: 'axis',
      axisPointer: {
        label: {
          show: false
        }
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(119, 119, 142, 0.2)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#77778e'
      }
    },
    series: chartdata,
    color: ['#ff685c', '#32cafe']
  };
  barChart.setOption(option);
  /*-----AreaChart Echart-----*/

  /*sparkline*/

  var randomizeArray = function randomizeArray(arg) {
    var array = arg.slice();
    var currentIndex = array.length,
        temporaryValue,
        randomIndex;

    while (0 !== currentIndex) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  };

  var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41]; //Spark1

  var spark1 = {
    chart: {
      type: 'area',
      height: 100,
      width: '100%',
      lineWidth: 0.1,
      borderWidth: 1,
      sparkline: {
        enabled: true
      }
    },
    stroke: {
      curve: 'smooth',
      width: 2
    },
    fill: {
      opacity: 0.3,
      gradient: {
        enabled: false
      }
    },
    series: [{
      name: 'Work Progress %',
      data: randomizeArray(sparklineData)
    }],
    yaxis: {
      min: 0
    },
    colors: ['#0774f8']
  };
  var spark1 = new ApexCharts(document.querySelector("#spark1"), spark1);
  spark1.render();
});

(function ($) {
  "use strict"; // ______________Active Class

  $(".app-sidebar li a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];

    if (this.href == pageUrl) {
      $(this).addClass("active");
      $(this).parent().addClass("active"); // add active to li of the current link

      $(this).parent().parent().prev().addClass("active"); // add active class to an anchor

      $(this).parent().parent().prev().click(); // click the item to make it drop
    }
  }); //Active Class

  $(".app-sidebar li a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];

    if (this.href == pageUrl) {
      $(this).addClass("active");
      $(this).parent().addClass("active"); // add active to li of the current link

      $(this).parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link

      $(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor

      $(this).parent().parent().parent().prev().click(); // click the item to make it drop
    }
  });
  $(".submenu-list li a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];

    if (this.href == pageUrl) {
      $(this).addClass("active");
      $(this).parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link

      $(this).parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link

      $(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor

      $(this).parent().parent().parent().prev().click(); // click the item to make it drop
    }
  });
  $(document).ready(function () {
    if ($('.home-volgh.active').hasClass('active')) $('li.home-volgh').addClass('active');
    if ($('.componet-volgh.active').hasClass('active')) $('li.componet-volgh').addClass('active');
    if ($('.widget-volgh.active').hasClass('active')) $('li.widget-volgh').addClass('active');
    if ($('.charts-volgh.active').hasClass('active')) $('li.charts-volgh').addClass('active');
    if ($('.elements-volgh.active').hasClass('active')) $('li.elements-volgh').addClass('active');
    if ($('.advancedelemnets-volgh.active').hasClass('active')) $('li.advanced elemnets-volgh').addClass('active');
    if ($('.forms-volgh.active').hasClass('active')) $('li.forms-volgh').addClass('active');
    if ($('.icons-volgh.active').hasClass('active')) $('li.icons-volgh').addClass('active');
    if ($('.tables-volgh.active').hasClass('active')) $('li.tables-volgh').addClass('active');
    if ($('.pages-volgh.active').hasClass('active')) $('li.pages-volgh').addClass('active');
    if ($('.ecommerce-volgh.active').hasClass('active')) $('li.e-commerce-volgh').addClass('active');
    if ($('.custom-volgh.active').hasClass('active')) $('li.custom-volgh').addClass('active');
    if ($('.errorpages-volgh.active').hasClass('active')) $('li.errorpages-volgh').addClass('active');
  }); // VerticalTab

  $('#parentVerticalTab').easyResponsiveTabs({
    type: 'vertical',
    width: 'auto',
    fit: true,
    closed: 'accordion',
    tabidentify: 'hor_1',
    activate: function activate(event) {
      var $tab = $(this);
      var $info = $('#nested-tabInfo2');
      var $name = $('span', $info);
      $name.text($tab.text());
      $info.show();
    }
  });
  var ps5 = new PerfectScrollbar('.first-sidemenu', {
    useBothWheelAxes: true,
    suppressScrollX: true
  });
  var ps6 = new PerfectScrollbar('.second-sidemenu', {
    useBothWheelAxes: true,
    suppressScrollX: true
  });
})(jQuery);
/*---- morrisBar2----*/


$(function (e) {
  'use strict';

  new Morris.Area({
    element: 'morrisBar2',
    data: [{
      x: '2010 Q4',
      y: 3,
      z: 7
    }, {
      x: '2011 Q1',
      y: 3,
      z: 4
    }, {
      x: '2011 Q2',
      y: null,
      z: 1
    }, {
      x: '2011 Q3',
      y: 2,
      z: 5
    }, {
      x: '2011 Q4',
      y: 8,
      z: 2
    }, {
      x: '2012 Q1',
      y: 4,
      z: 4
    }],
    xkey: 'x',
    ykeys: ['y', 'z'],
    lineColors: ['#d43f8d', '#0774f8'],
    labels: ['Y', 'Z']
  }).on('click', function (i, row) {
    console.log(i, row);
  });
  /*---- morrisBar3----*/

  new Morris.Area({
    element: 'morrisBar3',
    behaveLikeLine: true,
    data: [{
      x: '2011 Q1',
      y: 3,
      z: 3
    }, {
      x: '2011 Q2',
      y: 2,
      z: 1
    }, {
      x: '2011 Q3',
      y: 2,
      z: 4
    }, {
      x: '2011 Q4',
      y: 3,
      z: 3
    }],
    xkey: 'x',
    ykeys: ['y', 'z'],
    lineColors: ['#d43f8d', '#0774f8'],
    labels: ['Y', 'Z']
  });
  /*---- morrisBar4----*/

  new Morris.Bar({
    element: 'morrisBar4',
    data: [{
      x: '2011 Q1',
      y: 0
    }, {
      x: '2011 Q2',
      y: 1
    }, {
      x: '2011 Q3',
      y: 2
    }, {
      x: '2011 Q4',
      y: 3
    }, {
      x: '2012 Q1',
      y: 4
    }, {
      x: '2012 Q2',
      y: 5
    }, {
      x: '2012 Q3',
      y: 6
    }, {
      x: '2012 Q4',
      y: 7
    }, {
      x: '2013 Q1',
      y: 8
    }],
    xkey: 'x',
    ykeys: ['y'],
    labels: ['Y'],
    barColors: function barColors(row, series, type) {
      if (type === 'bar') {
        var red = Math.ceil(0 * row.y / this.ymax);
        return '#0774f8';
      } else {
        return '#000';
      }
    }
  });
  var day_data = [{
    "period": "Jan",
    "licensed": 3407,
    "sorned": 660
  }, {
    "period": "Feb",
    "licensed": 3351,
    "sorned": 629
  }, {
    "period": "Mar",
    "licensed": 3269,
    "sorned": 618
  }, {
    "period": "Apr",
    "licensed": 3246,
    "sorned": 661
  }, {
    "period": "May",
    "licensed": 3257,
    "sorned": 667
  }, {
    "period": "June",
    "licensed": 3248,
    "sorned": 627
  }, {
    "period": "July",
    "licensed": 3171,
    "sorned": 660
  }, {
    "period": "Aug",
    "licensed": 3171,
    "sorned": 676
  }, {
    "period": "Sept",
    "licensed": 3201,
    "sorned": 656
  }, {
    "period": "Oct",
    "licensed": 3215,
    "sorned": 622
  }];
  /*---- morrisBar5----*/

  new Morris.Bar({
    element: 'morrisBar5',
    data: day_data,
    xkey: 'period',
    ykeys: ['licensed', 'sorned'],
    labels: ['Licensed', 'SORN'],
    barColors: ['#d43f8d', '#0774f8'],
    xLabelAngle: 0
  });
  var nReloads = 0;

  function data(offset) {
    var ret = [];

    for (var x = 0; x <= 360; x += 10) {
      var v = (offset + x) % 360;
      ret.push({
        x: x,
        y: Math.sin(Math.PI * v / 180).toFixed(4),
        z: Math.cos(Math.PI * v / 180).toFixed(4)
      });
    }

    return ret;
  }
  /*---- morrisBar6----*/


  var graph = Morris.Line({
    element: 'morrisBar6',
    data: data(0),
    xkey: 'x',
    ykeys: ['y', 'z'],
    labels: ['data1', 'data2'],
    lineColors: ['#d43f8d', '#0774f8'],
    parseTime: false,
    ymin: -1.0,
    ymax: 1.0,
    hideHover: true
  });

  function update() {
    nReloads++;
    graph.setData(data(5 * nReloads));
    $('#reloadStatus').text(nReloads + ' reloads');
  }

  setInterval(update, 100);
  /*---- morrisBar7----*/

  var day_data = [{
    "period": "2012-10-01",
    "licensed": 3407,
    "sorned": 660
  }, {
    "period": "2012-09-30",
    "licensed": 3351,
    "sorned": 629
  }, {
    "period": "2012-09-29",
    "licensed": 3269,
    "sorned": 618
  }, {
    "period": "2012-09-20",
    "licensed": 3246,
    "sorned": 661
  }, {
    "period": "2012-09-19",
    "licensed": 3257,
    "sorned": 667
  }, {
    "period": "2012-09-18",
    "licensed": 3248,
    "sorned": 627
  }, {
    "period": "2012-09-17",
    "licensed": 3171,
    "sorned": 660
  }, {
    "period": "2012-09-16",
    "licensed": 3171,
    "sorned": 676
  }, {
    "period": "2012-09-15",
    "licensed": 3201,
    "sorned": 656
  }, {
    "period": "2012-09-10",
    "licensed": 3215,
    "sorned": 622
  }];
  new Morris.Line({
    element: 'morrisBar7',
    data: day_data,
    xkey: 'period',
    ykeys: ['licensed', 'sorned'],
    labels: ['Licensed', 'SORN'],
    lineColors: ['#d43f8d', '#0774f8']
  });
  /*---- morrisBar8----*/

  new Morris.Donut({
    element: 'morrisBar8',
    data: [{
      value: 50,
      label: 'data1'
    }, {
      value: 35,
      label: 'data2'
    }, {
      value: 10,
      label: 'data3'
    }],
    backgroundColor: 'rgba(119, 119, 142, 0.2)',
    labelColor: '#77778e',
    colors: ['#0774f8', '#d43f8d', '#09ad95'],
    formatter: function formatter(x) {
      return x + "%";
    }
  }).on('click', function (i, row) {
    console.log(i, row);
  });
  /*---- morrisBar9----*/

  new Morris.Donut({
    element: 'morrisBar9',
    data: [{
      value: 35,
      label: 'data1'
    }, {
      value: 25,
      label: 'data2'
    }, {
      value: 15,
      label: 'data3'
    }, {
      value: 15,
      label: 'data4'
    }, {
      value: 10,
      label: 'data5'
    }, {
      value: 10,
      label: 'data6'
    }],
    backgroundColor: 'rgba(119, 119, 142, 0.2)',
    labelColor: '#77778e',
    colors: ['#0774f8', '#d43f8d', '#f5334f', '#0774f8', '#64E572', '#f7b731'],
    formatter: function formatter(x) {
      return x + "%";
    }
  });
});
/*-----nvd3-chart1-----*/

historicalBarChart = [{
  key: "Cumulative Return",
  values: [{
    "label": "A",
    "value": 24,
    "color": "#0774f8"
  }, {
    "label": "B",
    "value": 10,
    "color": "#d43f8d"
  }, {
    "label": "C",
    "value": 35,
    "color": "#09ad95"
  }, {
    "label": "D",
    "value": 150,
    "color": "#0774f8"
  }, {
    "label": "E",
    "value": 120,
    "color": "#2bcbba"
  }, {
    "label": "F",
    "value": 95,
    "color": "#fc7303"
  }, {
    "label": "G",
    "value": 13,
    "color": "#17a2b8"
  }, {
    "label": "H",
    "value": 5,
    "color": "#ecb403"
  }]
}];
nv.addGraph(function () {
  var chart = nv.models.discreteBarChart().x(function (d) {
    return d.label;
  }).y(function (d) {
    return d.value;
  }).staggerLabels(true) //.staggerLabels(historicalBarChart[0].values.length > 8)
  .showValues(true).duration(250);
  d3.select('#nvd3-chart1 svg').datum(historicalBarChart).call(chart);
  nv.utils.windowResize(chart.update);
  return chart;
});
/*-----nvd3-chart2-----*/

var chart;
nv.addGraph(function () {
  chart = nv.models.historicalBarChart();
  chart.margin({
    left: 50,
    bottom: 50
  }).useInteractiveGuideline(true).duration(250); // chart sub-models (ie. xAxis, yAxis, etc) when accessed directly, return themselves, not the parent chart, so need to chain separately

  chart.xAxis.axisLabel("").tickFormat(d3.format(',.1f'));
  chart.yAxis.axisLabel('').tickFormat(d3.format(',.2f'));
  chart.showXAxis(true);
  d3.select('#nvd3-chart2').datum(sinData()).transition().call(chart);
  nv.utils.windowResize(chart.update);
  chart.dispatch.on('stateChange', function (e) {
    nv.log('New State:', JSON.stringify(e));
  });
  return chart;
}); //Simple test data generators
// function sinAndCos() {
// 	var sin = [],
// 		cos = [];
// 	for (var i = 0; i < 10; i++) {
// 		sin.push({
// 			x: i,
// 			y: Math.sin(i / 10)
// 		});
// 		cos.push({
// 			x: i,
// 			y: .5 * Math.cos(i / 10)
// 		});
// 	}
// 	return [{
// 		values: sin,
// 		key: "Sine Wave",
// 		color: "#0774f8"
// 	}, {
// 		values: cos,
// 		key: "Cosine Wave",
// 		color: "#0774f8"
// 	}];
// }

function sinData() {
  var sin = [];

  for (var i = 0; i < 10; i++) {
    sin.push({
      x: i,
      y: Math.sin(i / 10) * Math.random() * 10
    });
  }

  return [{
    values: sin,
    key: "Sine Wave",
    color: "#0774f8"
  }];
}
/*-----nvd3-chart3-----*/


nv.addGraph(function () {
  var chart = nv.models.lineChart();
  var fitScreen = false;
  var width = 600;
  var height = 300;
  var zoom = 1;
  chart.useInteractiveGuideline(true);
  chart.xAxis.tickFormat(d3.format(',r'));
  chart.lines.dispatch.on("elementClick", function (evt) {
    console.log(evt);
  });
  chart.yAxis.axisLabel('Voltage (v)').tickFormat(d3.format(',.2f'));
  d3.select('#nvd3-chart3 svg').attr('perserveAspectRatio', 'xMinYMid').attr('width', width).attr('height', height).datum(sinAndCos());
  setChartViewBox();
  resizeChart();
  nv.utils.windowResize(resizeChart);
  d3.select('#zoomIn').on('click', zoomIn);
  d3.select('#zoomOut').on('click', zoomOut);

  function setChartViewBox() {
    var w = width * zoom,
        h = height * zoom;
    chart.width(w).height(h);
    d3.select('#nvd3-chart3 svg').attr('viewBox', '0 0 ' + w + ' ' + h).transition().duration(500).call(chart);
  }

  function zoomOut() {
    zoom += .25;
    setChartViewBox();
  }

  function zoomIn() {
    if (zoom <= .5) return;
    zoom -= .25;
    setChartViewBox();
  } // This resize simply sets the SVG's dimensions, without a need to recall the chart code
  // Resizing because of the viewbox and perserveAspectRatio settings
  // This scales the interior of the chart unlike the above


  function resizeChart() {
    var container = d3.select('#nvd3-chart3');
    var svg = container.select('svg');

    if (fitScreen) {
      // resize based on container's width AND HEIGHT
      var windowSize = nv.utils.windowSize();
      svg.attr("width", windowSize.width);
      svg.attr("height", windowSize.height);
    } else {
      // resize based on container's width
      var aspect = chart.width() / chart.height();
      var targetWidth = parseInt(container.style('width'));
      svg.attr("width", targetWidth);
      svg.attr("height", Math.round(targetWidth / aspect));
    }
  }

  return chart;
});

function sinAndCos() {
  var sin = [],
      cos = [];

  for (var i = 0; i < 100; i++) {
    sin.push({
      x: i,
      y: Math.sin(i / 10)
    });
    cos.push({
      x: i,
      y: .5 * Math.cos(i / 10)
    });
  }

  return [{
    values: sin,
    key: "Sine Wave",
    color: "#0774f8"
  }, {
    values: cos,
    key: "Cosine Wave",
    color: "#d43f8d"
  }];
}

jQuery(function (e) {
  'use strict'; // Initialize popover

  $('[data-toggle="popover"]').popover();
  $('[data-popover-color="head-primary"]').popover({
    template: '<div class="popover popover-head-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-success"]').popover({
    template: '<div class="popover popover-head-success" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-warning"]').popover({
    template: '<div class="popover popover-head-warning" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-danger"]').popover({
    template: '<div class="popover popover-head-danger" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-info"]').popover({
    template: '<div class="popover popover-head-info" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-teal"]').popover({
    template: '<div class="popover popover-head-teal" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-indigo"]').popover({
    template: '<div class="popover popover-head-indigo" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-purple"]').popover({
    template: '<div class="popover popover-head-purple" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-pink"]').popover({
    template: '<div class="popover popover-head-pink" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-orange"]').popover({
    template: '<div class="popover popover-head-orange" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="head-dark"]').popover({
    template: '<div class="popover popover-head-dark" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="primary"]').popover({
    template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="success"]').popover({
    template: '<div class="popover popover-success" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="warning"]').popover({
    template: '<div class="popover popover-warning" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="danger"]').popover({
    template: '<div class="popover popover-danger" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="info"]').popover({
    template: '<div class="popover popover-info" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="teal"]').popover({
    template: '<div class="popover popover-teal" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="indigo"]').popover({
    template: '<div class="popover popover-indigo" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="purple"]').popover({
    template: '<div class="popover popover-purple" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="orange"]').popover({
    template: '<div class="popover popover-orange" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  });
  $('[data-popover-color="pink"]').popover({
    template: '<div class="popover popover-pink" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
  }); // By default, Bootstrap doesn't auto close popover after appearing in the page
  // resulting other popover overlap each other. Doing this will auto dismiss a popover
  // when clicking anywhere outside of it

  $(document).on('click', function (e) {
    $('[data-toggle="popover"],[data-original-title]').each(function () {
      //the 'is' for buttons that trigger popups
      //the 'has' for icons within a button that triggers a popup
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        (($(this).popover('hide').data('bs.popover') || {}).inState || {}).click = false; // fix for BS 3.3.6
      }
    });
  });
});
$("#range").ionRangeSlider({
  hide_min_max: true,
  keyboard: true,
  min: -5000,
  max: -0,
  from: -4000,
  to: -1000,
  type: 'double',
  step: -1,
  prefix: "$",
  grid: true
});
$("#range_25").ionRangeSlider({
  type: "double",
  min: -2000000,
  max: -1000000,
  grid: true
});
$("#range_27").ionRangeSlider({
  type: "double",
  min: -2000000,
  max: -1000000,
  grid: true,
  force_edges: true
});
$("#range_26").ionRangeSlider({
  type: "double",
  min: -10000,
  max: -0,
  step: 500,
  grid: true,
  grid_snap: true
});
$("#range_31").ionRangeSlider({
  type: "double",
  min: -100,
  max: -0,
  from: -70,
  to: -30,
  from_fixed: true
});
$(".range_min_max").ionRangeSlider({
  type: "double",
  min: -100,
  max: -0,
  from: -30,
  to: -70,
  max_interval: -50
});
$(".range_time24").ionRangeSlider({
  min: +moment().subtract(12, "hours").format("X"),
  max: +moment().format("X"),
  from: +moment().subtract(6, "hours").format("X"),
  grid: true,
  force_edges: true,
  prettify: function prettify(num) {
    var m = moment(num, "X");
    return m.format("Do MMMM, HH:mm");
  }
});
/*
===============================================================

Hi! Welcome to my little playground!

My name is Tobias Bogliolo. 'Open source' by default and always 'responsive',
I'm a publicist, visual designer and frontend developer based in Barcelona. 

Here you will find some of my personal experiments. Sometimes usefull,
sometimes simply for fun. You are free to use them for whatever you want 
but I would appreciate an attribution from my work. I hope you enjoy it.

===============================================================
*/

$(document).ready(function () {
  var stickyElement = $(".sticky"),
      stickyClass = "sticky-pin",
      stickyPos = stickyElement.offset().top,
      //Distance from the top of the window.
  stickyHeight; //Create a negative margin to prevent content 'jumps':

  stickyElement.after('<div class="jumps-prevent"></div>');

  function jumpsPrevent() {
    stickyHeight = stickyElement.innerHeight();
    stickyElement.css({
      "margin-bottom": "-" + stickyHeight + "px"
    });
    stickyElement.next().css({
      "padding-top": +stickyHeight + "px"
    });
  }

  ;
  jumpsPrevent(); //Run.
  //Function trigger:

  $(window).resize(function () {
    jumpsPrevent();
  }); //Sticker function:

  function stickerFn() {
    var winTop = $(this).scrollTop(); //Check element position:

    winTop >= stickyPos ? stickyElement.addClass(stickyClass) : stickyElement.removeClass(stickyClass); //Boolean class switcher.
  }

  ;
  stickerFn(); //Run.
  //Function trigger:

  $(window).scroll(function () {
    stickerFn();
  });
  /*Header*/

  $(window).scroll(function (e) {
    if ($(window).scrollTop() >= 1) {
      $('body').addClass('stiky-menu');
    } else {
      $('body').removeClass('stiky-menu');
    }
  });
});
$(function (e) {
  $('#summernote').summernote({
    placeholder: 'Hello bootstrap 4',
    tabsize: 3,
    height: 300
  });
});
$(function (e) {
  // Message
  $(document).on("click", "#but1", function (e) {
    $('body').removeClass('timer-alert');
    var message = $("#message").val();

    if (message == "") {
      message = "Your message";
    }

    swal(message);
  }); // With message and title

  $(document).on("click", "#but2", function (e) {
    $('body').removeClass('timer-alert');
    var message = $("#message").val();
    var title = $("#title").val();

    if (message == "") {
      message = "Your message";
    }

    if (title == "") {
      title = "Your message";
    }

    swal(title, message);
  }); // Show image

  $(document).on("click", "#but3", function (e) {
    $('body').removeClass('timer-alert');
    var message = $("#message").val();
    var title = $("#title").val();

    if (message == "") {
      message = "Your message";
    }

    if (title == "") {
      title = "Your message";
    }

    swal({
      title: title,
      text: message,
      imageUrl: '../../assets/images/brand/logo-3.png'
    });
  }); // Timer

  $(document).on("click", "#but4", function (e) {
    $('body').addClass('timer-alert');
    var message = $("#message").val();
    var title = $("#title").val();

    if (message == "") {
      message = "Your message";
    }

    if (title == "") {
      title = "Your message";
    }

    message += "(close after 2 seconds)";
    swal({
      title: title,
      text: message,
      timer: 2000,
      showConfirmButton: false
    });
  }); //

  $(document).on("click", "#click", function (e) {
    $('body').removeClass('timer-alert');
    var type = $("#type").val();
    swal({
      title: "Title",
      text: "Your message",
      type: type
    });
  }); // Prompt

  $(document).on("click", "#prompt", function (e) {
    $('body').removeClass('timer-alert');
    swal({
      title: "Add",
      text: "Enter your message",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      inputPlaceholder: "Your message"
    }, function (inputValue) {
      if (inputValue != "") {
        swal("Input", "You have entered : " + inputValue);
      }
    });
  }); // Confirm

  $(document).on("click", "#confirm", function (e) {
    $('body').removeClass('timer-alert');
    swal({
      title: "Alert",
      text: "Are you really want to exit",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: 'Exit',
      cancelButtonText: 'Stay on the page'
    });
  });
  $(document).on("click", "#click", function (e) {
    swal('Congratulations!', 'Your message has been succesfully sent', 'success');
  });
  $(document).on("click", "#click1", function (e) {
    $('body').removeClass('timer-alert');
    swal({
      title: "Alert",
      text: "Waring alert",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: 'Exit',
      cancelButtonText: 'Stay on the page'
    });
  });
  $(document).on("click", "#click2", function (e) {
    $('body').removeClass('timer-alert');
    swal({
      title: "Alert",
      text: "Danger alert",
      type: "error",
      showCancelButton: true,
      confirmButtonText: 'Exit',
      cancelButtonText: 'Stay on the page'
    });
  });
});
$(function () {
  /* Circle-progress */
  $('#circle').circleProgress({
    value: 0.85,
    size: 70,
    fill: {
      color: ["#d43f8d"]
    }
  });
  /* Circle-progress closed */

  /* Circle-progress-1 */

  $('#circle-1').circleProgress({
    value: 0.64,
    size: 70,
    fill: {
      color: ["#09ad95"]
    }
  });
  /* Circle-progress-1 closed */

  /* Circle-progress-2 */

  $('#circle-2').circleProgress({
    value: 0.74,
    size: 70,
    fill: {
      color: ["#f7b731"]
    }
  });
  /* Circle-progress-2 closed */

  /* Circle-progress-3 */

  $('#circle-3').circleProgress({
    value: 0.55,
    size: 70,
    fill: {
      gradient: ["#f5334f"]
    }
  });
  /* Circle-progress-3 closed */

  /* Chartjs (#areaChart1) */

  var ctx = document.getElementById('areaChart1').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Market value',
        data: [30, 70, 30, 100, 50, 130, 100, 140],
        backgroundColor: 'transparent',
        borderColor: '#0774f8',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#0774f8',
        pointBorderColor: '#0774f8',
        pointHoverBorderColor: '#0774f8',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart1) closed */

  /* Chartjs (#areaChart2) */

  var ctx = document.getElementById('areaChart2').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Market value',
        data: [24, 18, 28, 21, 32, 28, 30],
        backgroundColor: 'transparent',
        borderColor: '#1fc874',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#1fc874',
        pointBorderColor: '#1fc874',
        pointHoverBorderColor: '#1fc874',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart2) closed */

  /* Chartjs (#areaChart3) */

  var ctx = document.getElementById('areaChart3').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Market value',
        data: [30, 70, 30, 100, 50, 130, 100, 140],
        backgroundColor: 'transparent',
        borderColor: '#f7b731',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#f7b731',
        pointBorderColor: '#f7b731',
        pointHoverBorderColor: '#f7b731',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart3) closed */

  /* Chartjs (#areaChart4) */

  var ctx = document.getElementById('areaChart4').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      type: 'line',
      datasets: [{
        label: 'Market value',
        data: [24, 18, 28, 21, 32, 28, 30],
        backgroundColor: 'transparent',
        borderColor: '#f5334f',
        pointBackgroundColor: '#fff',
        pointHoverBackgroundColor: '#f5334f',
        pointBorderColor: '#f5334f',
        pointHoverBorderColor: '#f5334f',
        pointBorderWidth: 2,
        pointRadius: 2,
        pointHoverRadius: 2,
        borderWidth: 4
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#6b6f80',
        bodyFontColor: '#6b6f80',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          }
        }]
      },
      title: {
        display: false
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  /* Chartjs (#areaChart4) closed */
});
