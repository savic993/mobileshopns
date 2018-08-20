$(document).ready(function(){

	$.ajax({
		type : 'GET',
			url : rootSajta + '/ajax/korpa',
			success: function(data){
				$('.broj').html(data);
			},
			error:function(error){
				console.log(error);
			}
	});

	$('.btn').click(function(){
		var uneto = $('input[name="tbSearch"]').val();

		$.ajax({
			type: 'GET',
			url: rootSajta + '/ajax/search',
			data:
			{
				uneto : uneto
			},
			dataType: 'JSON',
			success: function(data)
			{
				filter(data);
			},
			error: function(error){
				console.log(error);
			}
		});
	});

	$('body').on('click', '.page-link', function(event){
		event.preventDefault();

		var offset = $(this).data('id');

		$.ajax({
			type : 'GET',
			url : rootSajta + '/ajax/ajaxTelefoni/' + offset,
			success: function(data){
				$('#telefoni').hide();
				$('#paginacija').html(data).show();
			},
			error:function(error){
				console.log(error);
			}
		});

	});

	$('.glasaj').click(function(){
		var id_odgovor = $('input[name="rbOdgovor"]:checked').val();
		var id_anketa = $('input[name="idAnketa"]').val();

		$.ajax({
			type:'POST',
			url: rootSajta + '/ajax/anketa',
			data: 
			{
				id_odgovor : id_odgovor,
				id_anketa : id_anketa,
				_token : token
			},
			dataType: 'JSON',
			success: function(data){
				rezultati(data);
			},
			error:function(error){
				console.log(error);
			}
		});
	});

	$('.btnFilter').click(function(){
		var model = $('#ddlModeli option:selected').val();
		var proizvodjac = $('#ddlProizvodjac option:selected').val();

		$.ajax({
			type:'POST',
			url: rootSajta + '/ajax/filter',
			data: 
			{
				model : model,
				proizvodjac : proizvodjac,
				_token : token
			},
			dataType: 'JSON',
			success: function(data){
				filter(data);
			},
			error:function(error){
				console.log(error);
			}
		});
	});

});


function filter(data)
{

	var html = "";
	$.each(data,function(key,value){
		html += '<div class="col-md-4 text-center">'+
					'<div class="product">'+
						'<div class="product-grid" style="background-image:url(' + rootSajta + '/' + value.putanja + ');">';
						
						html += '</div>'+
						'<div class="desc">'+
							'<h3><a href="#">' + value.naziv_proizvodjac + ' ' + value.naziv_model + '</a></h3>'+
							'<span class="price">' + value.cena + '&euro;</span>'+
						'</div>'+
					'</div>'+
				'</div>';
	});
	
	if (data == "") 
	{
		html += "Nema telefona po zadatom kriterijumu";
	}
	
	$("#telefoni").hide();
	$("#paginacija").hide();
	$(".pagination").hide();
	$("#filter").html(html);
}

function rezultati(data)
{
	var html = "Vas glas je uspesno unet<br/>";
	$.each(data,function(key,value)
	{
		html += 'Broj glasova telefona za koji ste glasali je:' + value.rezultat + "<br/>";
	});
	$(".rezultati").html(html);
}