<!--ventana modal para editar proceso-->
        <div class="modal fade" id="modal-editar-laboratorio">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">MODIFICAR LABORATORIO</h4>
                    </div>
                    <div class="modal-body" id="cuerpo-modal-asignar-mensajero">
            <div class="table-responsive">
              <table class="table table-condensed table-striped table-bordered">
                <tr style="font-weight: bold">
                  <td colspan="2" class="bg-primary" style="text-align: center">
                    EDITAR
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col-md-9 col-sm-2 col-xs-12">
					<div class="form-group form-group-sm">                
						<label class="control-label required" for="">Nombre Proceso<span class="required"> * </span></label> 
						<input type='hidden' value="" id="id_laboratorio"/>
						<input type="text" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"  value="" id="nlaboratorio"/>
					</div>
					</div>
				  </td>
				</tr>
              </table>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="ModificarLaboratorio()">
                            <span class="glyphicon glyphicon-pencil"></span> Actualizar
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!--fin ventana modal para editar proceso-->

<div class="panel panel-primary" >
    <div class="panel-heading">ADICIONAR  NUEVO LABORATORIO</div>

  <div class="container">
    <div class="row">
          <!-- campo cliente -->
          <div class="col-md-7 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">                
                  <label class="control-label required" for="">Nuevo Laboratorio<span class="required"> * </span></label> 
                  <input type="text" id="c_nuevo_laboratorio" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"/>
              </div>
          </div>
          <!-- campo activo -->
          <div class="col-md-3 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">                
                  <label class="control-label required" for="">Activo<span class="required"> * </span></label> 
                  <input type="text" value="S" min="0" max="31" id="c_activo" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"/>
              </div>
          </div>		  
          <!-- btn adicionar -->
          <div class="col-md-2 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">     
                  <label class="control-label required" for=""> &nbsp</label>           
                        <button type="button" class="btn btn-primary btn-sm form-control" onclick="crearLaboratorio();">
                            <span class="glyphicon glyphicon-"></span> Crear Laboratorio
                        </button>
              </div>
          </div>  
    </div>    
  </div>
</div>

<div class="panel panel-primary" >
    <div class="panel-heading">LABORATORIOS REGISTRADOS</div></div>
    <div class="container">
      <div class="table-responsive">
        <table id="tablaGenerada" class="table table-condensed table-hover table-striped tablaGenerada">
              <thead>
                        <tr style="font-weight: bold" >
                            <th>
                              Nº
                            </th>
                            <th>
                                LABORATORIO
                            </th>
							<th>
                                ACTIVO
                            </th>
                            <th style="text-align:center">
                              MODIFICAR
                            </th>
                            <th style="text-align:center">
                              ELIMINAR
                            </th>
							<th style="text-align:center">
                              ESTADO
                            </th>
                        </tr>
              </thead>
                        <?php 
                          $cliente_iteracion_anterior="";
                          for ($i=0; $i < count($laboratorio); $i++) 
                          { 
                            
                         ?>
                          <tr id="<?php echo  'r'.$laboratorio[$i]['id_laboratorio']; ?>" >
                              <td>
                                  <?php echo $i+1; ?>
                              </td>
                              <td>
                                  <?php echo $laboratorio[$i]['nombre_laboratorio'];  ?>
                              </td>
                              <td>
                                  <?php echo $laboratorio[$i]['activo']; ?>
                              </td>
                              
                              <td style="text-align:center">
                                  <center>
                                    <button id="<?php echo $laboratorio[$i]['id_laboratorio']; ?>" type="button" class="btn btn-primary btn-sm" style="width:50px" onclick="editarLaboratorio(this.id)">
                                          <span class="glyphicon glyphicon-pencil"></span>
                                      </button>
                                  </center>
                              </td>
						      <td style="text-align:center">
                                  <center>
                                    <button id="<?php echo $laboratorio[$i]['id_laboratorio']; ?>" type="button" class="btn btn-danger btn-sm" style="width:50px" onclick="eliminarLaboratorio(this.id)">
                                          <span class="glyphicon glyphicon-trash"></span>
                                      </button>
                                  </center>
                              </td>
                              <td style="text-align:center">
							  <?php
								
								if($laboratorio[$i]['activo']=='S')
									$class='btn btn-success btn-sm';
								else
									$class='btn btn-danger btn-sm';
							  ?>
                                  <center>
                                    <button id="<?php echo $laboratorio[$i]['id_laboratorio']; ?>" class="<?php echo $class ?>" type="button" style="width:50px" onclick="ModificarEstado(this.id)">
                                          <span class="glyphicon glyphicon-ok"></span>
                                      </button>
                                  </center>
                              </td>
                          </tr>
                        <?php     
                          }
                ?>
        </table>
      </div>
    </div>
<script src="<?php echo base_url() ?>assets/librerias/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/librerias/tabletools/2.2.4/js/dataTables.tableTools.min.js"/></script>
<script type="text/javascript">

    //INICIALIZO DATEPICKER
    $('.dp').datepicker({format: "yyyy-mm-dd",
            language: 'es',
            autoclose: true,
            forceParse: true,
               zIndexOffset: 1040 
    });

    //CONFIGURO EL ALERT
    var data=null;
    var params = 
    {                
       onInit: function(data) {},
       onCreate: function(notification, data) {},
       onClose: function(notification, data) {}
    };                                
     
    params.heading = 'Notificación';     
    params.theme = 'ruby';      
    params.life = '4000';//4segundos

    function crearLaboratorio()
    {
      var laboratorio = $("#c_nuevo_laboratorio").val().trim();
      var activo =$("#c_activo").val().trim();
    

      if(laboratorio=="")
      {
            var text = 'Falta campo NUEVO INVENTARIO';
            $.notific8(text, params); 
            return;
      }
      else if(activo=="")
      {
            var text = 'Falta campo ACTIVOVO';
            $.notific8(text, params); 
            return;
      } 

        $.isLoading({
                    text: "Cargando",
                    position: "overlay"
                });


                $.ajax({
                         type: 'POST',
                         async:false,
                         dataType: 'json',
                         data: {laboratorio:laboratorio,activo:activo},
                         url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/insertarConfiguraLaboratorio',
                         success: function (data) 
                         {    
								alert(data);
								$.isLoading("hide"); 
								location.reload();
								tablaReload();  
      
                   
                          
                         }
                }); 
    }
    function aplicarPaginado(){
          
          var table = $('.tablaGenerada').dataTable(
          {
              language: {
                  processing: "Procesando...",
                  search: "Filtro",
                  lengthMenu: "Mostrar _MENU_ registros",
                  info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                  infoFiltered: "(filtrado de un total de _MAX_ registros)",
                  infoPostFix: "",
                  loadingRecords: "Cargando...",
                  zeroRecords: "No se encontraron resultados",
                  emptyTable: "Ningún dato disponible en esta tabla",
                  paginate: {
                      first: "Primero",
                      previous: "Anterior",
                      next: "Siguiente",
                      last: "&uacute;ltimo"
                  }
              },
              aLengthMenu: [
                            [20, 100, 200, -1],    //valor q utilizo en la propiedad iDisplayLength para asociar a una opcion
                            [20, 100, 200, "Todo"]  //opciones del select para la cant de registros a mostrar
                            ],
              iDisplayLength: 20,
              "bSort": true, //habilito el ordenar para todas las columnas
              "order": [],  //para que no ordene la primera columna por default
              "columnDefs": [{
                                    "targets"  : 'no-sort',
                                    "orderable": false,
                            }],


              "aoColumnDefs": [  //habilito la opcion de ordenar en la columna deseada
                                { "aTargets": [ 0 ],"bSortable": true },
                                { "aTargets": [ 1 ],"bSortable": true },
                                { "aTargets": [ 2 ],"bSortable": true },
                                { "aTargets": [ 3 ],"bSortable": true },
                                { "aTargets": [ 4 ],"bSortable": true }

                                
                              ] 
          });

            var tableTools = new $.fn.dataTable.TableTools(table, {
                'aButtons': [
                    {
                        'sExtends': 'xls',
                        'sButtonText': 'Exportar a Excel',
                        'sFileName': 'Reporte de Retiros Pendientes.xls'
                    }/*,
                    {
                        'sExtends': 'print',
                        'bShowAll': true,
                        'sButtonText': 'Imprimir'
                    }*/,
                    {
                        'sExtends': 'pdf',
                        'bFooter': false,
                        'sButtonText': 'Imprimir desde PDF',
                        'sFileName': 'Reporte de Retiros Pendientes.pdf'
                    }
                ],
                'sSwfPath': '<?php echo base_url() ?>assets/librerias/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf'
            });
            $(tableTools.fnContainer()).insertBefore('#tablaGenerada_wrapper');
    }

    //var id_editar_laboratorio="";
    function editarLaboratorio(id_laboratorio)
    {
	  
	   $.ajax({
                type: 'POST',
                async:false,
                dataType: 'json',
                data: {id_laboratorio:id_laboratorio},
                url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/obtenerLaboratorio',
                success: function (data) 
                {  

					var nombre_laboratorio = data[0]['nombre_laboratorio'];			
					$("#id_laboratorio").val(id_laboratorio);
					$("#nlaboratorio").val(nombre_laboratorio);
                }

       });
	  
	   $("#modal-editar-laboratorio").modal('show');
    }
	function ModificarEstado(id_laboratorio){
			
				$.isLoading({
                      text: "Cargando",
                      position: "overlay"
                });
					  
			    $.ajax({
			             type: 'POST',
			             async:false,
			             dataType: 'json',
			             data: {id_laboratorio:id_laboratorio},
					     url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/EstadoConfiguraLaboratorio',
			             success: function (data) 
			             {     
								$.isLoading("hide");  
								location.reload();
								//tablaReload();                    
			             }

			    });
			
			
	}
	function ModificarLaboratorio()
    {
	  
	   
	  var id_laboratorio = $("#id_laboratorio").val().trim();
      var nombre_laboratorio =$("#nlaboratorio").val().trim(); 
	   
	   $.ajax({
                type: 'POST',
                async:false,
                dataType: 'json',
                data: {id_laboratorio:id_laboratorio,nombre_laboratorio:nombre_laboratorio},
                url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/ActualizaLaboratorio',
                success: function (data) 
                {  
					
					location.reload();
                }
       });
	  
	   $("#modal-editar-laboratorio").modal('hide');
    }
    //abrir eliminar proceso
    function eliminarLaboratorio(id){

      $.isLoading({
                      text: "Cargando",
                      position: "overlay"
                });
       
       $.ajax({
                type: 'POST',
                async:false,
                dataType: 'json',
                data: {id:id},
                url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/eliminarConfiguraLaboratorio',
                success: function (data) 
                {     
                    alert(data);
					$.isLoading("hide");  
					location.reload();
                    tablaReload();
                }
       });
    }
	function tablaReload(){

	var usuario = data['NOMBRE_PROCESO'];
                    var id_laboratorio = data['id_laboratorio'];
                    //ADICIONO UNA LINEA DE PRUEBA
                    var cadena_html='<tr class="fila-retiro" id="r'+id_laboratorio+'" >'
                                        +'<td>'
                                            +laboratorio
                                        +'</td>'
                                        +'<td>'
                                            +activo
                                        +'</td>'
                                        +'<td>'
                                            +'<center><button type="button" class="btn btn-primary btn-sm" id="'+id_laboratorio+'" style="width:50px" onclick="editarLaboratorio(this.id)" >'
                                                  +'<span class="glyphicon glyphicon-pencil"></span>'
                                            +'</button></center>'
                                        +'</td>'
                                        +'<td>'
                                            +'<center><button type="button" class="btn btn-primary btn-sm" id="'+id_laboratorio+'" style="width:50px" onclick="eliminarLaboratorio(this.id)" >'
                                                  +'<span class="glyphicon glyphicon-trash"></span>'
                                            +'</button></center>'
                                        +'</td>'
                                    +'</tr>';

                    $( ".dataTables_empty" ).parent().remove();


                    $("#tablaGenerada").append(cadena_html); 

                $("#c_nuevo_proceso").val("");
                $("#c_minutos").val(""); 


                return cadena_html;
	}
    window.onload= function alcargar()
    {
      aplicarPaginado();
    }
</script>