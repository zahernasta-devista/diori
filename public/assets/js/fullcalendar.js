/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/assets/js/fullcalendar.js ***!
  \*********************************************/
$(function (e) {
  "use strict";

  $.ajax({
    type: 'GET',
    url: url,
    success: function success(response) {
      var responseData = response.response;
      var events = [];
      var time = {
        endHour: 9,
        pastDate: null
      };
      responseData.forEach(function (element) {
        var object = createCalendarElements(responseData, element, time);
        events.push(object);
      });
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'listDay,listWeek,month'
        },
        views: {
          listDay: {
            buttonText: 'Daily'
          },
          listWeek: {
            buttonText: 'Weekly'
          },
          month: {
            buttonText: 'Monthly'
          }
        },
        defaultView: 'listWeek',
        defaultDate: '2021-11-22',
        navLinks: false,
        // can click day/week names to navigate views
        editable: true,
        eventLimit: true,
        // allow "more" link when too many events
        events: events,
        eventClick: function eventClick(info) {
          //Verify if the time sum is less than 12 hours
          //Max value will be the difference between both times
          var time = (new Date(info.end) - new Date(info.start)) / 1000 / 60 / 60;
          var maxHours = time + info.availableHours;
          $('#myModal').modal('show');
          $("#time").val(time);
          $("#id").val(info.id);
          $("#comment").val(info.comment);
          $("#project").val(info.projectInput);
          $("#time").attr({
            'max': maxHours
          });
          $("#time").keydown(function () {
            if (!$(this).val() || parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1) {
              $(this).data("old", $(this).val());
            }
          });
          $("#time").keyup(function () {
            if (!$(this).val() || parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1) ;else {
              $(this).val($(this).data("old"));
            }
          });
        }
      });
    }
  });
});
document.querySelector('#editTimeLog').addEventListener('click', function (e) {
  e.preventDefault();
  var time = $('#time').val();
  var comment = $('#comment').val();
  var id = $('#id').val();
  $.ajax({
    type: 'POST',
    url: editUrl,
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    data: {
      time: time,
      id: id,
      comment: comment
    },
    success: function success(response) {
      location.reload();
    },
    error: function error(_error) {
      console.log(_error);
    }
  });
}, false);
document.querySelector('#deleteTimeLog').addEventListener('click', function (e) {
  e.preventDefault();
  var id = $('#id').val();
  $.ajax({
    type: 'POST',
    url: deleteUrl,
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    data: {
      id: id
    },
    success: function success(response) {
      location.reload();
    },
    error: function error(_error2) {
      console.log(_error2);
    }
  });
}, false);

function createCalendarElements(responseData, element, time, date) {
  var availableHours = getAvailableHours(responseData, element);

  if (time.pastDate != null && new Date(time.pastDate) < new Date(element.date)) {
    time.endHour = 9;
  }

  var startHour = time.endHour; //Passed by reference to keep the modifications inside the function

  time.endHour += element.time;
  var startHourString = generateHourString(startHour);
  var endHourString = generateHourString(time.endHour); //Passed by reference to keep the modifications inside the function

  time.pastDate = element.date;
  return createCalendarObject(element, startHourString, endHourString, availableHours);
}

function getAvailableHours(responseData, element) {
  var availableHours = 12;
  var sameDates = responseData.filter(function (object) {
    return object.date === element.date;
  });
  sameDates.forEach(function (object) {
    availableHours -= object.time;
  });
  return availableHours;
}

function createCalendarObject(element, startHourString, endHourString, availableHours) {
  var object = {};
  object.id = element.id;
  object.comment = element.comment;
  object.title = element.projectName + " • " + element.time + " hours." + " • " + element.comment + ".";
  object.start = element.date + "T" + startHourString + ":00:00";
  object.end = element.date + "T" + endHourString + ":00:00";
  object.projectInput = element.projectName;
  object.availableHours = availableHours;
  return object;
}

function generateHourString(hour) {
  return hour < 10 ? "0" + hour : hour;
}
/******/ })()
;