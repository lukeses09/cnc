	populate_table_main();




  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/breed/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
		populate_species_dropdown(); // function populate dropdown

	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],
	        '<button data-toggle="tooltip" onclick="client_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="client_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //


function populate_species_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/species/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_speciesname').empty();
      $('#f_speciesname').html('<option selected="selected" value="none">--SEARCH SPECIES--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_speciesname').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} //


function reset(){
	$('#btn_save').val('create');
	$('#f_name').val('');
	$('#f_contact').val('');
	$('#f_bdate').val('');
	$('#f_gender').val('none');
	$('#f_mstatus').val('single');
	$('#f_address').val('');
	$('#f_job').val('');
	$('#f_spouse').val('');
	$('#f_dependents').val('');

	$('#f_name_div').removeClass('has-error');     
	$('#f_contact_div').removeClass('has-error');     
	$('#f_bdate_div').removeClass('has-error');     
	$('#f_gender_div').removeClass('has-error');
	$('#f_mstatus_div').removeClass('has-error');  
	$('#f_address_div').removeClass('has-error');     
	$('#f_job_div').removeClass('has-error');     
	$('#f_spouse_div').removeClass('has-error');     
	$('#f_dependents_div').removeClass('has-error');     

	$('#spouse_div').css('display','none');
}

function validate_form(){
	err = false;



	if($('#f_breedname').val()==''){
		err = true;
		$('#f_breedname_div').addClass('has-error');
	}
	else
		$('#f_breedname_div').removeClass('has-error');	

	if($('#f_speciesname').val()=='' || $('#f_speciesname').val()=='none'){
		err = true;
		$('#f_speciesname_div').addClass('has-error');
	}
	else
		$('#f_speciesname_div').removeClass('has-error');		

	/*if($('#f_contact').val()==''){
		err = true;
		$('#f_contact_div').addClass('has-error');
	}
	else
		$('#f_contact_div').removeClass('has-error');	

	if($('#f_bdate').val()==''){
		err = true;
		$('#f_bdate_div').addClass('has-error');
	}
	else if($('#f_bdate').val()!=''){
		var today = new Date();
		var today = today.getFullYear();
		var f_bdate = $('#f_bdate').val().slice(0,4);
		if( (today-f_bdate) < 18){
			err = true;
			$('#f_bdate_div').addClass('has-error');
			alert('Must be 18 or Above');
		}
	}
	else
		$('#f_bdate_div').removeClass('has-error');	

	if($('#f_gender').val()=='none'){
		err = true;
		$('#f_gender_div').addClass('has-error');
	}
	else
		$('#f_gender_div').removeClass('has-error');	

	if($('#f_address').val()==''){
		err = true;
		$('#f_address_div').addClass('has-error');
	}
	else
		$('#f_address_div').removeClass('has-error');	

	if($('#f_job').val()==''){
		err = true;
		$('#f_job_div').addClass('has-error');
	}
	else
		$('#f_job_div').removeClass('has-error');	

	if( $('#f_mstatus').val()=='married' ){
		if($('#f_spouse').val()==''){
			err = true;
			$('#f_spouse_div').addClass('has-error');
		}
		else
			$('#f_spouse_div').removeClass('has-error');	

		if($('#f_dependents').val()=='' || $('#f_dependents').val()<0){
			err = true;
			$('#f_dependents_div').addClass('has-error');
		}
		else
			$('#f_dependents_div').removeClass('has-error');	

	}
*/


	return err;				
}

function showSpouse(get){
	$('#f_spouse_div').removeClass('has-error');     
	$('#f_dependents_div').removeClass('has-error');  	
	if(get=='married'){$('#spouse_div').css('display','block');}
	else{ $('#spouse_div').css('display','none'); }
}

function client_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/breed/delete.php",
			  data: 'id='+id,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){	}  
			}); 
		  	alert('Success: Deleted ');
		  	reset();
		  	populate_table_main();			
  }		
}

function client_row_view(id){
	reset();
		//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/breed/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_breedname').val(s[0][0]);	 // fetch name to breedname
			  			  		
	    $('#opt'+s[0][1]).prop('selected',true); //selected dropdown
  			  		
	  	
	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var breed_name = $('#f_breedname').val();
		var species_id = $('#f_speciesname').val();

		var dataString = 'breed_name='+breed_name+'&species_id='+species_id;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/breed/create.php",
			  data: dataString,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end  
		  	alert('Saved');
		  	reset();
		  	populate_table_main();			
		}
		else{ //UPDATE MODE
			var id = this.value;
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/breed/update.php",
			  data: dataString+'&id='+id,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end  
		  	alert('Updated');
		  	reset();
		  	populate_table_main();						
		}
	}

})
