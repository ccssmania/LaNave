$(document).ready(function(){
	$('#calendar_order').fullCalendar({
			selectable : true,
			select: function(start, end, allDay,view) {
				if(view.name == 'agendaDay'){
					_start=moment(start).format('YYYY-MM-DD H:mm:ss');
   					_end=moment(end).format('YYYY-MM-DD H:mm:ss');
   					$('#date').val(_start);
   					$('#end').val(_end);

   					console.log(_start,_end, $('#end').val());
			    	$('.modal').modal();
				}
		    },
			header: { center: 'month,agendaWeek,agendaDay' },
			dayClick: function(date, jsEvent, view) {
				if(view.name == 'month' || view.name == 'basicWeek'){
					$('#calendar_order').fullCalendar('changeView', 'agendaDay');
					$('#calendar_order').fullCalendar('gotoDate', date);
				}
			},

            events : '/events',
            eventRender: function(event, element) {
            	element.qtip({
            		content: event.description,
            		position: {
			           my: 'bottom center',
			           at: 'top center'
			       },
            	});
            },

            

        });

	$('#myModal').on('shown.bs.modal', function () {
	   $("#calendar_order").fullCalendar('today');
	   $("#calendar_order").fullCalendar('render');
	});
})