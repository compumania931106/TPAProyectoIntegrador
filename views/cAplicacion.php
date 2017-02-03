<script type="text/javascript" src="js/caplicacion.js"></script>


<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form id="frmAplicacion" method="POST" >
        	<div class="form-group" >                        
                <h1 id="titulo1">Tus  <span class="label label-default"> Encuestas
                </span></h1>
                <hr />
         	</div> 
         </form>   
         <form id="frmAplicacion2" hidden="true">        
         <h1>Todas tus encuestas estan  <span class="label label-danger">Realizadas</span></h1>
            <div class="row">
                    <div id="content" class="col-lg-12">                   
                        <div align="center">
                            <img src="/../TPAProyectoIntegrador/image/gracias.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>                                                      
        </form>
    </div>
</div>

<div id="modalAplica" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
	        <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="form-group">                        
                	<h3>Respondiendo 
                    	<span class="label label-warning"> Encuesta			
                		</span>
                     </h3>
	         	</div>
             </div>             
             <div  class="modal-body">     
  				<form class='form-horizontal' id='frmEncuesta' enctype='multipart/form-data' > 
                	<input id="idHorario2" name="idHorario2"  type="hidden" />   

              </form>
             </div>
    	</div>
	</div>
</div>            