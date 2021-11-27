$(function(e) {
    "use strict";

    $.ajax({
        type: 'GET',
        url: url,
        success: function(response) {
            let events = [];
            let endHour = 9;
            let pastDate = null;
            let date = response.response[0].date;

            response.response.forEach(element => {
                let availableHours = 12;
                let sameDates = response.response.filter(object => object.date === element.date);
                sameDates.forEach(object => {
                    availableHours -= object.time;
                })

                if(pastDate != null && new Date(pastDate) < new Date(element.date)) {
                    endHour = 9;
                }

                let object = {};
                let startHour = endHour;
                endHour += element.time;

                let startHourString = startHour < 10 ? "0" + startHour : startHour;
                let endHourString = endHour < 10 ? "0" + endHour : endHour;

                object.id = element.id;
                object.comment = element.comment;
                object.title = element.projectName + " • " + element.time + " hours." + " • " + element.comment + ".";
                object.start = element.date + "T" + startHourString + ":00:00" ;
                object.end = element.date + "T" + endHourString + ":00:00" ;
                object.projectInput = element.projectName;
                object.availableHours = availableHours;

                pastDate = element.date;
                events.push(object);

            });

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
                        buttonText: 'Daily'
                    },
                    listWeek: {
                        buttonText: 'Weekly'
                    },
                    month:{
                        buttonText: 'Calendar'
                    }
                },
                defaultView: 'listWeek',
                defaultDate: '2021-11-22',
                navLinks: false, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: events,
                eventClick: function(info) {
                    //Verify if the time sum is less than 12 hours
                    //Max value will be the difference between both times
                    let time = (new Date(info.end) - new Date(info.start)) / 1000 / 60 / 60 ;
                    $('#myModal').modal('show');
                    $("#time").val(time);
                    $("#id").val(info.id);
                    $("#comment").val(info.comment);
                    $("#project").val(info.projectInput);
                    $("#time").attr({'max': time + info.availableHours});
                }
            });
        }
    });
});


