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

	//dataTable
	$('#table').DataTable({
		order: [[1,'desc']],
	});

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
	$('.dateStart').datetimepicker({format: 'YYYY-MM-DD h:mm:ss',
		minDate: $.now(),
		icons: icons,
	});
	
	$('.dateStart').click(function(){
		$('.dateEnd').prop('disabled', false);
		$('.dateEnd').datetimepicker({format: 'YYYY-MM-DD h:mm:ss',
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
			var tday = new Date();
			var eventDate = new Date(event.date);
			var bool = (tday.toDateString() === eventDate.toDateString());
			if (bool) {
				element.css('background-color','red');
			}
			if(tday.getTime() > eventDate.getTime() && tday.getDate() > eventDate.getDate()){
				element.css('background-color','#28a745')
			}
			element.append( "<a href='#' class='removebtn'><span >X</span></a>" );
	        element.find(".removebtn").click(function() {
	          element.qtip('hide');
	          swal({
			      title: "Esta Seguro?",
			      text: 'Esta seguro de eliminar esta tarea',
			      type: "error",
			      showCancelButton: true,
			      confirmButtonText: "Si, Eliminar",
			      cancelButtonText: "No, cancelar!",
			      closeOnConfirm: false,
			      closeOnCancel: false
			    }, function(isConfirm) {
			      if (isConfirm) {
			        $.ajaxSetup({
			          headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			          }
			        });
			        $.ajax({
			           type:'POST',
			           url: '/task/'+event.id+'/delete',
			           success:function(data){
			            swal({title: "Eliminado!", text: "Ha sido eliminado correctamente.", type: "success"},function(){
			              $('#calendar').fullCalendar('removeEvents',event._id);
			            });
			             
			           },
			           onerror:function(e){
			          console.log(e);
			          swal("Algo salio mal!", "No se pudo eliminar, por favor contactar la división de sistemas.", "error");
			           }
			        });
			      } else {
			        swal("Cancelado", "El proceso fue cancelado correctamente", "error");
			      }
			    });
	        });
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

	//open reserve modal
	$('.productReserve').click(function(){
		$('#reserve').modal('show');
		$('#portfolioModal_'+this.rel).modal('hide');
		$('#product_id option[value='+this.rel+']').prop('selected',true);
	})

	//get Price
	$('#reserve').on('shown.bs.modal',function(){
		setPrice();
	});
	$('.product').change(function(){
		setPrice();
	});
	$('#reserve').on('hidden.bs.modal',function(){
		$('.category').hide();
		$('.category').prop('required',false);
	});
	//ordering
	$('#reserveForm').submit(function(e){
		e.preventDefault();

		var $form = $(this);
		$.ajax({
			url: $form.attr("action"),
			method: $form.attr("method"),
			data: $form.serialize(),
			success: function(data){
				swal({title: "Enviado!", text: "La petición fue enviada correctamente, te enviaremos un correo de confirmación en las próximas horas.", type: "success"},function(){
	              $('#reserve').modal('hide');
	            });
			},
			error: function(err){
				console.log(err);
			}

			});

		return false;

	});

	//clear all the fields after modal close
	$('#reserve').on('hidden.bs.modal', function (e) {
	  $(this)
	    .find("input,textarea,select")
	       .val('')
	       .end()
	    .find("input[type=checkbox], input[type=radio]")
	       .prop("checked", "")
	       .end();
	});

	if($('#task_product') && $('#task_product').val() != "" ){
		$('.category').show();
		$('#task_category').prop('required',true);
	}
	checkCategory();
	$('#task_product').change(function(){
		checkCategory();
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

function checkCategory(){
	if($('#task_product') && $('#task_product').val() != "" ){
				$.ajax({
			url: '/reserve/'+$('#task_product').val()+'/',
			method: 'GET',
			success: function(data){
				if(data == 'OK'){
					$('.category').hide();
					$('.category').prop('required',false);
					$('.category').prop('value','');
				}
				if(data == 'error'){
					$('.category').show();
					$('.category').prop('required',true);
				}
			},
			error: function(e){
				console.log(e);
			}
		});
		return false;
	}
}
function setPrice(){
	if( $('.product').val()){
		$.ajax({
			url: '/reserve/'+$('.product').val()+'/',
			method: 'GET',
			success: function(data){
				if(data == 'OK'){
					$('.category').hide();
					$('.category').prop('required',false);
					$('.category').prop('value','');
				}
				if(data == 'error'){
					$('.category').show();
					$('.category').prop('required',true);
				}
			},
			error: function(e){
				console.log(e);
			}
		});
		return false;
	}
}