/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});

$(document).ready(function(){
	var icons = {
	      time: 'far fa-clock',
	      date: 'far fa-calendar',
	      up: 'fas fa-arrow-up',
	      down: 'fas fa-arrow-down',
	      previous: 'fas fa-chevron-left',
	      next: 'fas fa-chevron-right',
	      today: 'fas fa-calendar-check',
	      clear: 'far fa-trash-alt',
	      close: 'far fa-times-circle'
	    };
	//just for change the image in the form when is uploaded
	$('input[type=file]').change(function() {
		readURL(this);
	});
	$('#textarea').summernote({
        placeholder: $('#textarea').attr('placeholder'),
        tabsize: 10,
        height: 200
      });
	$('#textarea-details').summernote({
        placeholder: $('#textarea-details').attr('placeholder'),
        tabsize: 10,
        height: 200
      });

	//dataTable
	$('#table').DataTable();

	//prices
	$('#price').change(function(){
		if($(this).is(":checked")){
			$(".prices").hide();
			$(".price").show();
			$("#prices").prop('checked',false);
		}
		else if($(this).is(":not(:checked)")){
            $(".price").hide();
        }
	});
	$('#prices').change(function(){
		if($(this).is(":checked")){
			$(".prices").show();
			$(".price").hide();
			$("#price").prop('checked',false);
		}
		else if($(this).is(":not(:checked)")){
            $(".prices").hide();
        }
	});
	$(".textarea").summernote();
	$('.dateStart').datetimepicker({format: 'YYYY-MM-DD h:mm',
		minDate: $.now(),
		icons: icons,
	});
	
	$('.dateStart').click(function(){
		$('.dateEnd').prop('disabled', false);
		$('.dateEnd').datetimepicker({format: 'YYYY-MM-DD h:mm',
			icons: icons,
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
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('.'+input.name).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}