<script src="../TPAProyectoIntegrador/js/plugins/jquery-editable-select.min.js"></script>
<script type="text/javascript" src="js/chorarios.js"></script>

<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <form id="frmHorarios" method="POST">
        	<div class="form-group">                        
                <h1>Horario  <span class="label label-default"> Nuevo			
                </span></h1>
         	</div>
            
            <div class="form-group">
                <label class="control-label" for="NoControl">No. Control:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </span>
                    <select name="NoControl" id="NoControl" class="form-control"  >

                    </select>
                </div>
            </div>                        

            <div class="form-group">
                <label class="control-label" for="maestro">Maestro:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
					<select name="maestro" id="maestro" class="form-control"  >
                    	<option value="" disabled="disabled" selected="selected">Selecciona un Maestro</option>                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="materia">Materia:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-book"></i>
                    </span>
                    	<select name="materia" id="materia" class="form-control"  >
	    	                <option value="" disabled="disabled" selected="selected">Selecciona una materia</option>
    	                </select>
                </div>
            </div>          
            
             <div class="form-group">
                <label class="control-label" for="grupo">Grupo:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-education"></i>
                    </span>
                    <select name="grupo" id="grupo" class="form-control"  >
                    <option value="" disabled="disabled" selected="selected">Selecciona un grupo</option>
                    </select>
                </div>
            </div>
                         
	        <div>
                <button type="submit" class="btn btn-success btn-md btn-block"><i class="glyphicon  glyphicon-floppy-disk"></i> Guardar</button>
            </div>
        </form>
    </div>
</div>

<div class="row">&nbsp;</div>

<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table id="tbHorarios">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Maestro</th>
                    <th>Materia</th>
                    <th>Grupo</th>
                    <th>Aula</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="modalHorario" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
	        <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="form-group">                        
                	<h3>Horario  
                    	<span class="label label-warning"> Editando			
                		</span>
                     </h3>
	         	</div>
             </div>             
             <div class="modal-body">     
	             <form class="form-horizontal" id="frmEditHorario" enctype="multipart/form-data">   
                 <input id="idHorario2" name="idHorario2"  type="hidden" />   
                 	
                    <div class="form-group">
        		        <div class="input-group">
	                	    <span class="input-group-addon">
    	                	    <i class="glyphicon glyphicon-book"></i>
                                <label class="control-label" for="materia2">No. Control:</label>
	                   		 </span>
        	            	<input class="form-control" type="text" id="NoControl2" name="NoControl2" placeholder="Ingresa el No. Control del Alumno">
    	            	</div>
            		</div>
                    
                    <div class="form-group">                		
		                <div class="input-group">
            	        	<span class="input-group-addon">
                	        	<i class="glyphicon glyphicon-user"></i>
                                <label class="control-label" for="maestro2">Maestro:</label>
	                	    </span>
        	            	<select name="maestro2" id="maestro2" class="form-control"  >
        		            	<option value="" disabled="disabled" selected="selected">Selecciona un Maestro</option>
		                    </select>
    	            	</div>
		            </div>
                    
                    <div class="form-group">
        		        <div class="input-group">
	                	    <span class="input-group-addon">
    	                	    <i class="glyphicon glyphicon-book"></i>
                                <label class="control-label" for="materia2">Materia:</label>
	                   		 </span>
        	            	<select name="materia2" id="materia2" class="form-control"  >
		    	                <option value="" disabled="disabled" selected="selected">Selecciona una materia</option>
	    	                </select>
    	            	</div>
            		</div>
                                                           
					<div class="form-group">        		        
                		<div class="input-group">
                    		<span class="input-group-addon">
                        		<i class="glyphicon glyphicon-education"></i>
                                <label class="control-label" for="grupo2">Grupo:</label>
                    		</span>
	   		                    <select name="grupo2" id="grupo2" class="form-control" data-live-search="true"></select>
                		</div>
            		</div>            
                    
		            <div class="modal-footer">              
                    	<button  id="btnEditHorario" class="btn btn-warning btn-md btn-block"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </div>
                 </form>
             </div>
    	</div>
	</div>
</div>                    
