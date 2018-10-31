
$(document).ready(function(){
	$(".textarea").summernote();
	$('.dateStart').datetimepicker({format: 'YYYY-MM-DD H:mm:ss',
		minDate: $.now(),
	});
	$('.dateStart').click(function(){
		$('.dateEnd').prop('disabled', false);
		$('.dateEnd').datetimepicker({format: 'YYYY-MM-DD H:mm:ss',
			minDate: $('.dateStart').val(),
		});
	});
	$('.dateEnd').click(function(){
		update();
	});
	$('#calendar').fullCalendar({
            // put your options and callbacks here
            events : '/events'
        });
})

function update(){
	console.log($('.dateStart').val());
	$('.dateEnd').data('DateTimePicker').minDate($('.dateStart').val());
}