
$(function(){

	$('#cUsuario').trigger('click');

	$.ajax({
        url: 'http://localhost/TPAProyectoIntegrador/model/roles/getRoles.php',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){
        console.log("Codigo json: "+json.code);
        if(json.code===200)
        $.each(json.msg, function(i,row){
            console.log(row.rolename);
           $('<option></option>', {text: row.rolename}).attr('value',row.roleid).appendTo('#cbRoles'); 
        });
    });



    $('#frmUser').validate({
       rules:{
           username:{
               minlength: 3,
               maxlength: 20,
               required: true
           },
           password:{
           		minlength: 3,
               maxlength: 20,
               required: true
           }
       },
       messages:{
           username:{
               minlength: "Introduzca al menos tres caracteres",
               maxlength: "Introdusca menos de 20 caracteres",
               required: "Capture el nombre de usuario"
           },
           password:{
               minlength: "Introduzca al menos tres caracteres",
               maxlength: "Introdusca menos de 20 caracteres",
               required: "Capture una contraseña"
           }
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
           newUser();
           return false;
       }
   });



    $('#tbUsers').DataTable({
    	responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
          url:"http://localhost/TPAProyectoIntegrador/model/usuario/getUsers.php"  ,
          dataSrc:function(json){
              
              return json['msg'];
          }
        },
        columns:[
            {
           		data:"usuarioid"
            },
            {
            	data:"usuarioname"   
            },
            {
                data:"password"
            },
            {
                data:function(row){
                	srt = "";
                	if(row["roleid"] === "1"){
                		srt = "Administrador";
    				}else if(row["roleid"] === "2"){
						srt = "Maestro";
    				}else{
    					srt = "Alumno";
    				}
                	return srt;
                }
            },
            {

            	data:function(row){
        			srt = "";
                	if(row["status"] === "a"){
                		srt = "Activo";
    				}else{
						srt = "Inactivo";
    				}
                	return srt;
                }   
            },
            {
            	data: function(row){
                  str="<div align='center'>";
                  str+="<button id='btnBorrar' class='btn btn-danger btn-xs' onclick='deleteRole("+row["usuarioid"]+")'><i class='glyphicon glyphicon-trash'></i></button>";
                  str+= "&nbsp;<button id='btnEditar' class = 'btn btn-success btn-xs' onClick = 'showRole("+row['roleid']+",\""+row['rolename']+"\")'><i class='glyphicon glyphicon-edit'></i></button>";
                  str+="<div>";
                  return str;
              }  
            }
        ]
            
        
    });
});



function newUser(){
    $.ajax({
        url: "http://localhost/TPAProyectoIntegrador/model/usuario/newUser.php",
        type: "post",
        data: {username : $('#username').val(),
               password : $('#password').val(),
               roleid: $('#cbRoles').val()}
    }).done(
        function(data){
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
				$('#tbUsers').dataTable().api().ajax.reload();
                $('#username').val('');
                $('#password').val('');
            }
            else{
                $.growl.error({ message: data.msg });
            }
            
        }
    ).fail(
        function(){
            $.growl.error({ message: "No hay mensaje que mostrar" });
        }
    );
}


