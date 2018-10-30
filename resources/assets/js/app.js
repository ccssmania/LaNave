
$(document).ready(function(){
	$(".textarea").summernote();
	$('.date').datepicker({
        autoclose: true,
        format: "yy-mm-dd"
    });
    $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : '/events'
        });
})