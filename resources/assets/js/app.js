
$(document).ready(function(){
	$(".textarea").summernote();
	$('.dateStart').datetimepicker({format: 'YYYY-MM-DD h:mm',
		minDate: $.now(),
	});
	$('.dateStart').click(function(){
		$('.dateEnd').prop('disabled', false);
		$('.dateEnd').datetimepicker({format: 'YYYY-MM-DD h:mm',
			minDate: $('.dateStart').val(),
		});
	});
	$('.dateFilter').datetimepicker({format: 'YYYY-MM-DD h:mm',
	});
	$('.dateFilter').click(function(){
		$('.dateEnd').prop('disabled', false);
		$('.dateEnd').datetimepicker({format: 'YYYY-MM-DD h:mm',
			minDate: $('.dateFilter').val(),
		});
	});
	$('.dateEnd').click(function(){
		update();
	});
	$('#calendar').fullCalendar({
		editable: true,

		header: { center: 'month,agendaWeek,agendaDay' },
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
		dayClick: function(date, jsEvent, view) {
			if(view.name == 'month' || view.name == 'basicWeek'){
				$('#calendar').fullCalendar('changeView', 'agendaDay');
				$('#calendar').fullCalendar('gotoDate', date);
			}
		},

		events: function(start, end, timezone, callback) {
		    _start=moment(start).format('YYYY-MM-DD H:mm:ss');
			_end=moment(end).format('YYYY-MM-DD H:mm:ss');
		    $.ajax({
		      url: '/events',
		      data: {
		        // our hypothetical feed requires UNIX timestamps
		        start: _start,
		        end: _end
		      },
		      success: function(doc) {
		        var events = JSON.parse(doc);
		        
		        callback(events);
		      },

		    });
		},
		
		eventRender: function(event, element) {
			element.qtip({
				content: event.description,
				position: {
					my: 'bottom center',
					at: 'top center'
				},
			});
			
		},

		eventResize: function( event, delta, revertFunc, jsEvent, ui, view){

			if (!confirm("esta seguro?")) {
				revertFunc();
			}else{
				changeDate(event);
			}
		},
		eventDrop: function( event, delta, revertFunc, jsEvent, ui, view){

			if (!confirm("esta seguro?")) {
				revertFunc();
			}else{
				changeDate(event);
			}
		},

	});

	$(".deleteE").click(function(){
		deleteEmploye($(".deleteE").attr('name'));
	});

})



function changeDate(event){
	start=moment(event.start).format('YYYY-MM-DD H:mm:ss');
	end=moment(event.end).format('YYYY-MM-DD H:mm:ss');
	$.ajax({
		url: '/calendar/changeDate',
		method: 'POST',
		data: {date:start, end:end, id:event.id},
		error: function(err){
			console.log(err);
		}

	});

	return false;
}
function update(){
	$('.dateEnd').data('DateTimePicker').minDate($('.dateStart').val());
}

function deleteEmploye(id){
	if(confirm("Esta seguro de eliminarlo?")){
		$.ajax({
			url: '/perfil/employe/delete/'+id,
			method: 'GET',
			success: function(){
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		});
		return false;
	}
}