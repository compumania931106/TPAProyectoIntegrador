$(function(){
	$.ajax({
        url: '../TPAProyectoIntegrador/model/aplicacionen/getNoEncuestas.php',
        type: 'GET',
        dataType: 'json'
    }).done(
		function (json){	
		console.log(json.code);		
			if(json.code===200) 			
			VarHtml="";		
			cont=1;		
				$.each(json.msg, function(i,row){
					if(row.statusEncuesta==="0"){ 
						VarHtml+="<button id='btnResponder' class='btn btn-success btn-lg btn-block' onClick ='mostrarModal("+row["idhorario"]+")';><i class='glyphicon  glyphicon-question-sign'></i>"+row.materia+".- Encuesta Pendiente</button>";
						//$("#frmEncuesta").append(generarModal(row.idhorario));	
						cont=0;							
					}else{
						VarHtml+="<button id='btnYaRes' class='btn btn-danger btn-lg btn-block' disabled='disabled' ><i class='glyphicon  glyphicon-question-sign'></i>"+row.materia+" .- Encuesta ya realizada<i class='glyphicon glyphicon-ok-sign'></i></button>";								
					}
										
						
				
    	});			console.log(cont);
		if(cont===1){
			$('#frmAplicacion2').show();
			$('#frmAplicacion').hide();
		}else{	
			$('#frmAplicacion').append(VarHtml);
			
		}
	});	
	
	
	$.ajax({
        url: '../TPAProyectoIntegrador/model/aplicacionen/getPreguntas.php',
        type: 'GET',
        dataType: 'json'
    }).done(
		function (json){    						
			$.each(json.msg, function(i,row){   cont++; 
//            	console.log(row.pregunta);	
				varH="<div class='form-group'>";		
				varH+="<label class='control-label' for='pregunta'"+(1+i)+">Pregunta No."+(1+i)+" ¿"+row.pregunta+"?</label>";				
				if(row.tipoPregunta==="1"){
					varH+="<div class='input-group'>";
        	        varH+="<span class='input-group-addon'>";
    	            varH+="<i class='glyphicon glyphicon-pencil'></i>";
	                varH+="</span>";
					varH+="<input class='form-control' type='text' id='pregunta"+(i+1)+"' name='pregunta"+(i+1)+"' placeholder='Responde con honestidad'>";
					varH+="</div>";
				}
				else{
					varH+="<div class='input-group'>";
					varH+="<div class='btn-group '>";
					varH+="<label class='btn btn-default'>";
    				varH+="<input type='radio' name='pregunta"+(i+1)+"' id='pregunta"+(i+1)+"' class='' value='1'>NO</label>";
					varH+="<label class='btn btn-default'>";
    				varH+="<input type='radio' name='pregunta"+(i+1)+"' id='pregunta"+(i+1)+"' class='' value='2'>SI</label>";
					varH+="</div>";
					varH+="</div>";
				}
				varH+="</div>";				
				$('#frmEncuesta').append(varH);
		});
		$('#frmEncuesta').append("<div class='modal-footer'> <button id='btnFinalizar' class='btn btn-success btn-md btn-block'><i class='glyphicon  glyphicon-floppy-disk'></i> ENVIAR</button></div>");
	});		
	
	
	$('#frmAplicacion').validate({
       rules:{
       },
       messages:{        		  
       },
       highlight: function (element){
           $(element).closest('.form-group').addClass('has-error');
       },
       unhighlight: function (element){
           $(element).closest('.form-group').removeClass('has-error');
       },
       errorElement: 'span',
       errorClass: 'help-block',
       errorPlacement: function(error, element){
           if(element.parent('.input-group').length){
               error.insertAfter(element.parent());
           }else{
               error.insertAfter(element);
           }
       },
       submitHandler: function(form){          
           return false;
       }
});
	
		$('#frmEncuesta').validate({
       rules:{
       },
       messages:{        		  
       },
       highlight: function (element){
           $(element).closest('.form-group').addClass('has-error');
       },
       unhighlight: function (element){
           $(element).closest('.form-group').removeClass('has-error');
       },
       errorElement: 'span',
       errorClass: 'help-block',
       errorPlacement: function(error, element){
           if(element.parent('.input-group').length){
               error.insertAfter(element.parent());
           }else{
               error.insertAfter(element);
           }
       },
       submitHandler: function(form){          
			$('#btnFinalizar').on('click', function () {
        		$('#frmEncuesta').submit();
				console.log("pase clci");
				updateStatus();
			});
           return false;
       }
   });
	
});

function updateStatus(){
	console.log("paso udate");
	 $.ajax({
  		url: "../TPAProyectoIntegrador/model/aplicacionen/updateStatus.php",
		type: "post",
		data:  $('#frmEncuesta').serialize()
	}).done(
		function(data){
		  if(data.code === 200){
		    $("#modalAplica").modal("hide");
		    $.growl.notice({message: data.msg});
			location.reload();
		  }
	  else{
    	$.growl.error({ message: data.msg });
	  }
	}	
	).fail(
		function(){
		  $.growl.error({ message: "Error en la modificacion" });
		}
	);

}




function mostrarModal(idhorario){
	$("#modalAplica").modal("show");
	$("#idHorario2").val(idhorario);
	
}