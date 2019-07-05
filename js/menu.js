function jsUcfirst(string) 
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function menu_content_1(obj, i){
	var active = '';
	//if(ctr == 0)
	//	active = "active";

	var	tab_content = '<div class="tab-pane fade show '+ active +'" id="'+i+'" role="tabpanel" aria-labelledby="'+i+'-tab">';
	tab_content += '<div class="row">';

	for(j in obj) {
		// submenu
		tab_content += '<div class="col-md-4 text-center">';
			tab_content += '<div class="menu-wrap">';
				tab_content += '<img class="menu-img img mb-4 zm" src = "images/pizza-1.jpg">';
				tab_content += '<div class="text">';
					tab_content += '<h3>'+ obj[j].name +'</h3>';
					tab_content += '<p>'+ jsUcfirst(obj[j].desc.toLowerCase()) +'</p>';
					tab_content += '<p class="price"><span>'+ obj[j].price +'</span></p>';
					tab_content += '<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>';
				tab_content += '</div>';
			tab_content += '</div>';
		tab_content += '</div>';	
		//
		// console.log(obj[j].name);
	}

	
	tab_content += '</div>';
	tab_content += '</div>';

	$('#menu-content').append(tab_content);
}

function menu_content(obj, i, id){
	var	content = '';

	if(i == 0) content += '<div class="tab-pane fade show active" id="'+id+'" role="tabpanel" aria-labelledby="'+id+'-tab">';
	else content += '<div class="tab-pane fade show" id="'+id+'" role="tabpanel" aria-labelledby="'+id+'-tab">';

	content += '<div class="row no-gutters d-flex">';
	
	var tab_content = '';
	for(j in obj) {

		tab_content += '<div class="col-lg-4 d-flex ftco-animate">';
			tab_content += '<div class="services-wrap d-flex">';
				tab_content += '<img style="background-image: url(images/pizza-1.jpg);" class="img zm" alt="">';
				tab_content += '<div class="text p-4">';
					tab_content += '<h3>'+ obj[j].name +'</h3>';
					tab_content += '<p>'+ jsUcfirst(obj[j].desc.toLowerCase()) +'</p>';
					tab_content += '<p class="price"><span>'+ obj[j].price +'</span></p>';
				tab_content += '</div>';
			tab_content += '</div>';
		tab_content += '</div>';	
	}
	
	content += tab_content;
    content += '</div>';
    content += '</div>';


    $('#v-pills-tabContent').append(content);
}

function insert(obj, i){

	for(j in obj) {
		var sql = "INSERT INTO menu(cat_id, name, des, price, src) VALUES("+i+", '"+obj[j].name+"', '"+obj[j].desc+"','"+obj[j].price+"', '"+obj[j].src+"')";
		console.log(sql)
	}
}

$(document).ready( function() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var json_obj = JSON.parse(this.responseText);

			for(i in json_obj){
				//console.log(i);
				var id = json_obj[i].id;
				var dis = json_obj[i].display;
				var menu_tab = '';
				if(i == 0)
					menu_tab = '<a class="nav-link active" id="'+ id +'-tab" data-toggle="pill" href="#'+id+'" role="tab" aria-controls="'+id+'" aria-selected="true">'+dis+'</a>';
				else
					menu_tab = '<a class="nav-link" id="'+ id +'-tab" data-toggle="pill" href="#'+id+'" role="tab" aria-controls="'+id+'" aria-selected="true">'+dis+'</a>';

				$("#menu-tab").append(menu_tab);

				// display dishes per category
				// menu_content(json_obj[i].data, i, id);
				
				// insert(json_obj[i].data, parseInt(i)+1);
			}

		}
	};
	
	xhttp.open("POST", "menu.json", true);
	xhttp.send();
});