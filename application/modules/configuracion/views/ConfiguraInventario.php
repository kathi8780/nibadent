<!--ventana modal para editar proceso-->

        <div class="modal fade" id="modal-editar-inventario">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">MODIFICAR INVENTARIO</h4>
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
                  <label  class="control-label required" for="">Nombre Inventario<span class="required"> * </span></label> 
                  <input type='hidden' id="id" value=""/>
                  <input type="text" id="c_inventario" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control" value=""/>
              </div>
          </div>
          <div class="col-md-3 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">                
                  <label class="control-label required" for="">Estado<span class="required"> * </span></label> 
                  <input type="text" id="c_nuevo" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"/>
              </div>
          </div>
                </tr>
              </table>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="realizarEdicion()">
                            <span class="glyphicon glyphicon-pencil"></span> Actualizar
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!--fin ventana modal para editar proceso-->


<!--inicio ventana modal para eliminar proceso-->

<div class="modal fade" id="modal-eliminar-proceso">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">ELIMINAR PROCESO</h4>
                    </div>
                    <div class="modal-body" id="cuerpo-modal-asignar-mensajero">
            <div class="table-responsive">
              <table class="table table-condensed table-striped table-bordered">
                <tr style="font-weight: bold">
                  <td colspan="2" class="bg-primary" style="text-align: center">
                    Esta seguro que desea eliminar el proceso..?
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col-md-9 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">                
                  <label class="control-label required" for="">Nombre Proceso<span class="required"> * </span></label> 
                  <input type="text" id="c_nuevo" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"/>
              </div>
          </div>
                  
                </tr>
              </table>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="realizarEliminacion()">
                            <span class="glyphicon glyphicon-trash"></span> Eliminar
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!--fin ventana modal para eliminar proceso-->


<div class="panel panel-primary" >
    <div class="panel-heading">ADICIONAR  NUEVO INVENTARIO</div>

  <div class="container">
    <div class="row">
          <!-- campo cliente -->
          <div class="col-md-7 col-sm-2 col-xs-12">
              <div class="form-group form-group-sm">                
                  <label class="control-label required" for="">Nuevo Inventario<span class="required"> * </span></label> 
                  <input type="text" id="c_nuevo_inventario" autocomplete="off" mayusculas="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$" maxlength="50" class="form-control"/>
              </div>
          </div>    

          <!-- campo telefono -->
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
                        <button type="button" class="btn btn-primary btn-sm form-control" onclick="crearInventario();">
                            <span class="glyphicon glyphicon-"></span> Crear Inventario
                        </button>
              </div>
          </div>  
    </div>    
  </div>
</div>


<div class="panel panel-primary" >
    <div class="panel-heading">INVENTARIOS REGISTRADOS</div></div>
    <div class="container">
      <div class="table-responsive">
        <table id="tablaGenerada" class="table table-condensed table-hover table-striped tablaGenerada">
              <thead>
                        <tr style="font-weight: bold" >
                            <th>
                              Nº
                            </th>
                            <th>
                                INVENTARIO
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
                        </tr>
              </thead>
                        <?php 
                          $cliente_iteracion_anterior="";
                          for ($i=0; $i < count($inventario); $i++) 
                          { 
                            
                         ?>
                          <tr id="<?php echo  'r'.$inventario[$i]['id_inventario']; ?>" >
                              <td>
                                  <?php echo $i+1; ?>
                              </td>
                              <td>
                                  <?php echo $inventario[$i]['nombre_inventario'];  ?>
                              </td>
                              <td>
                                  <?php echo $inventario[$i]['estado']; ?>
                              </td>
                              
                              <td style="text-align:center">
                                  <center>
                                    <button id="<?php echo $inventario[$i]['id_inventario']; ?>" type="button" class="btn btn-primary btn-sm" style="width:50px" onclick="editarInventario(this.id)">
                                          <span class="glyphicon glyphicon-pencil"></span>
                                      </button>
                                  </center>
                              </td>
                              <td style="text-align:center">
                                  <center>
                                    <button id="<?php echo $inventario[$i]['id_inventario']; ?>" type="button" class="btn btn-danger btn-sm" style="width:50px" onclick="eliminarInventario(this.id)">
                                          <span class="glyphicon glyphicon-trash"></span>
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


    function crearInventario()
    {
      var inventario = $("#c_nuevo_inventario").val().trim();
      var activo =$("#c_activo").val().trim();
    

      if(inventario=="")
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
                         data: {inventario:inventario,activo:activo},
                         url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/insertarInventario',
                         success: function (data) 
                         {    
                           var text = 'Falta campo ACTIVOVO';
                          $.notific8(text, params); 

                     alert(data);
               $.isLoading("hide"); 
               location.reload();
               
                tablaReload();  
      
                   
                          
                         }
                }); 
    }

        function aplicarPaginado() 
        {
          
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

    var id_editar_proceso="";
    function editarInventario(id_inventario)
    {
     
      id=id_inventario;  
                   // $("#modal-editar-proceso").modal('show');
        
                $.ajax({
                         type: 'POST',
                         async:false,
                         dataType: 'json',
                         data: {id:id},
                         url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/obtenerInventario',
                         success: function (data) 
                         {    

                          var inventario=data[0]['nombre_inventario'];
                          var estado=data[0]['estado'];
                          $("#id").val(id_inventario);
                          $("#c_inventario").val(inventario);
                          $("#c_nuevo").val(estado);
                         }
                }); 

                $("#modal-editar-inventario").modal('show');
                   
       


    }
    function realizarEdicion(){


    var id_inventario = $("#id").val().trim();
    var inventario =$("#c_inventario").val().trim(); 
    var estado=$("#c_nuevo").val().trim();
     
     $.ajax({

                type: 'POST',
                async:false,
                dataType: 'json',
                data: {id_inventario:id_inventario,inventario:inventario,estado:estado},
                url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/editarInventario',
                success: function (data) 
                {  
                  
                  location.reload(); 
                  tablaReload();
                }
       });
    
     $("#modal-editar-prueba").modal('hide');



    }
    //abrir eliminar proceso
    function eliminarInventario(id){

      $.isLoading({
                      text: "Cargando",
                      position: "overlay"
                });
       
       $.ajax({
                type: 'POST',
                async:false,
                dataType: 'json',
                data: {id:id},
                url: '<?php echo base_url(); ?>index.php/configuracion/configura_maestro/eliminarInventario',
                success: function (data) 
                {     
                   alert(data);
       $.isLoading("hide"); 
       //constultarPedidos(); 
       location.reload();
                           //alert(data['USUARIO_NOMBRE']);  
      
                           tablaReload();
                }

       });

    }
function tablaReload(){


  var usuario = data['NOMBRE_PROCESO'];
                           var id_proceso = data['id_inventario'];
                    //ADICIONO UNA LINEA DE PRUEBA
                    var cadena_html='<tr class="fila-retiro" id="r'+id_proceso+'" >'
                                        +'<td>'
                                            +inventario
                                        +'</td>'
                                        +'<td>'
                                            +activo
                                        +'</td>'
                                        +'<td>'
                                            +'<center><button type="button" class="btn btn-primary btn-sm" id="'+id_proceso+'" style="width:50px" onclick="editarInventario(this.id)" >'
                                                  +'<span class="glyphicon glyphicon-pencil"></span>'
                                            +'</button></center>'
                                        +'</td>'
                                        +'<td>'
                                            +'<center><button type="button" class="btn btn-primary btn-sm" id="'+id_proceso+'" style="width:50px" onclick="eliminarInventario(this.id)" >'
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

    function realizarAsignacion()
    {
        var id_mensajero = $("#s_mensajeros").val().trim();
        if(id_mensajero=="")
        {
            var text = 'Seleccione un MENSAJERO';
            $.notific8(text, params); 
            return;
        }
        else
        {
          //ACTUALIZO EL RETIRO
            $.isLoading({
                        text: "Cargando",
                        position: "overlay"
                    });


                    $.ajax({
                             type: 'POST',
                             async:false,
                             dataType: 'json',
                             data: {id_retiro_a_asignar:id_retiro_a_asignar, id_mensajero:id_mensajero},
                             url: '<?php echo base_url(); ?>index.php/pedido/pedidos/asignarRetiroMensajero',
                             success: function (data) 
                             {    
                              $("#r"+id_retiro_a_asignar).remove();
                              $('#modal-asignar-mensajero').modal('hide');
                              $.isLoading("hide") ;  
                             }
                    }); 
        }
    }

    $("#modal-asignar-mensajero").on('hidden.bs.modal', function () 
    {
        $("#s_mensajeros option[value='']").prop('selected', true);
    });

</script>