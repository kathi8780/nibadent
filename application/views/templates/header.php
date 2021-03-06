<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?= base_url('assets/librerias/images/favicon.png') ?>" type="image/gif">

        <link href="<?= base_url('assets/librerias/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/librerias/css/bootstrap-theme.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/librerias/css/select2.css') ?>"  rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/librerias/css/font-awesome.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/librerias/css/style-is-loading.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/librerias/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/librerias/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet" type="text/css"/>
        
        <link href="<?= base_url('assets/librerias/css/prettify.css') ?>" rel="stylesheet" type="text/css"/> 
        <link href="<?= base_url('assets/librerias/css/jquery.notific8.min.css') ?>" rel="stylesheet" type="text/css"/>
        
		<link href="<?= base_url('assets/librerias/tabletools/2.2.4/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/librerias/tabletools/2.2.4/css/dataTables.tableTools.min.css')?>" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url('assets/librerias/toggle/bootstrap-toggle.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/dientes/dientes.css') ?>" rel="stylesheet" type="text/css"/>

        <style type="text/css">
            
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                background-color: #fff;
                opacity: 1;
            }
            
            .detalles .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            /*border-color: #fff #fff transparent;*/
            color: #35aa47;
            border-top: green 3px solid;
            border-radius: 0;
            }
            .navbar-default {
                background-image: none;
                background-repeat: no-repeat;
                box-shadow: none;
                background-color:inherit;
                border: none;
            }
            .navbar-default .navbar-nav > li > a {
                color: #527A00;  /*#2E6DA4*/              
                font-size: 16px;
            }
            
            .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .active > a {
                background-image:none;
                background-repeat: no-repeat;
                box-shadow: none;
            }
            .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
                background-color: #fff;
                color: #006600; /*#2E6DA4*/
                font-weight: 700;
            }
            
            .navbar-default .navbar-nav li>a:focus, .navbar-default .navbar-nav li>a:hover
            {
                background-color: #fff;
                color: #006600; /*#2E6DA4*/
                font-weight: 700;
            }
            
            .dropdown-menu li>a:focus, .dropdown-menu li>a:hover
            {
                background-image: none;
                background-color: #fff;
                color: #006600;
                font-weight: 700;
            }
            
            
            .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
                background-color: #fff;
                color: #006600;/*#2E6DA4*/
                font-weight: 700;
            }
            .image-itca-vector{
                background-image:url("<?= base_url('assets/librerias/images/fondo-academos.jpg') ?>");
                background-position: center top;
                background-size: 1170px 700px;
                max-width: 1170px; 
                height: 700px; 
                margin: 0 auto;
            }
/*            .row{
                margin: 0;
            }*/
             #contenido{                
                max-width: 1170px;
                margin: 0 auto;
            }            
            nav{
                max-width: 1300px;
                margin: 0 auto;
            } 
            .shadow-gris{
                
               box-shadow: 3px 3px 12px #333;
            }
            
         
            div.opciones a{
                display: block;
                line-height: 1.5 em;
            }
            input,textarea{
                text-transform:uppercase;
            }  
            input[type=email]{
                text-transform:lowercase !important;
            }

            .pull-right *
            {
                display: inline-block;
            }
            
            span.required{
                color: #a94442;
                font-weight: 700;
            }
            
            .tab-pane {
                margin: 10px;
            }
            
            
            /*TRABAJO CON FORMULARIOA*/
            
            /*para las secciones de los formularios*/
            .form-section {
                border-bottom: 1px solid #298A08;
                margin: 30px 0 25px;
                padding-bottom: 5px;                
                font-weight: 500;
                color:#38610B;
            }
            /*para q los widgets no sean tan grandes*/
            
          
           
            span.input-group-addon.left{
                border-right: 0px;
                color: grey;
            }
            span.input-group-addon.left + input{
                border-left: 0px;
            }        

            label {
                font-weight: 300;
            }
            .progress{
                height: 5px;
            }


            form li a {
                background-color: #fff;  
            }
            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                background-color: white;
                color: black;
            }
            .step .number {
                background-color: #eee;
                border-radius: 50% !important;
                display: inline-block;
                font-size: 16px;
                font-weight: 300;
                height: 30px;
                margin-right: 10px;
                padding: 5px;
                text-align: center !important;
                width: 30px;
            }

            .active .step .number {
                background-color: #35aa47;
                color: #fff;
            }
            .done .step .number {
                background-color: #f2ae43;
                color: #fff;
            }
            .done .step span.glyphicon-ok {            
                color: #f2ae43;
                display: inline-block !important;
            }

            
            .confirmation-tab-value{
                text-transform: uppercase;
            }
            .confirmation-tab-label{
                text-transform: none !important;
            }
            .jquery-notific8-notification{
                border-radius: 10px 10px 10px 10px
            }
            
            /*datatable styles*/   
        #resultadoBusqueda_wrapper>div:first-child {
            /*background-color: #f5f5f5;*/
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            padding: 5px 5px;
            /*display: none;*/
        }
   
        #resultadoBusqueda_wrapper>div:last-child {
            background-color: #f5f5f5;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            padding: 5px 5px;
        }
        .pagination > li > a, .pagination > li > span {
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    
}

*::after, *::before {
    box-sizing: border-box;
}
*::after, *::before {
    box-sizing: border-box;
}
.pagination > li:first-child > a, .pagination > li:first-child > span {
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    margin-left: 0;
}
.pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
    background-color: #f5f5f5;
}
       
        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
            background-color: #3e8f3e;
            border-color: #3e8f3e;
            color: #fff;
            cursor: default;
            z-index: 2;
        }
       .form-control:not(textarea) {
           height: 25px;
       }
          
       div.checkbox{
           margin-top:21px ;
       }
       
    
    .bs-callout {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #eee;
        border-image: none;
        border-radius: 3px;
        border-style: solid;
        border-width: 1px 1px 1px 5px;
        margin: 20px 0;
        padding: 10px;
        overflow: hidden;
    }
    .bs-callout-green {
    border-left-color: #002E00 !important;
    }
    .bs-callout-green span.confirmation-tab-label {
    color: #002E00;
    }
    .bs-callout-green h4 {
        margin-bottom: 5px;
        margin-top: 0;
        color:#002E00;
    }
    
    .bs-callout-orange {
    border-left-color: #298A08 !important;
    }
    .bs-callout-orange span.confirmation-tab-label {
    color: #f0ad4e;
    }
    .bs-callout-orange h4 {
        margin-bottom: 5px;
        margin-top: 0;
        color:#f0ad4e;
    }
    
    .planes-table > thead > tr > th {
    border-bottom: 2px solid #B18904;
    vertical-align: bottom;
    }
    
    /*GESTION DE ROLES CSS*/
    .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
        background-image: linear-gradient(to bottom, #088A08 0%, #0B610B 100%);
    }
    .list-group-item {
    border: 1px solid #fff;
    }
            /*  bhoechie tab */
            div.bhoechie-tab-container{
              z-index: 10;
              background-color: #ffffff;
              padding: 0 !important;
              border-radius: 4px;
              -moz-border-radius: 4px;
              border:1px solid #ddd;
              margin-top: 20px;
              margin-left: 15px;
              /*-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
              /*box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
              /*-moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
              background-clip: padding-box;
              opacity: 0.97;
              filter: alpha(opacity=97);
            }
            div.bhoechie-tab-menu{
              padding-right: 0;
              padding-left: 0;
              padding-bottom: 0;
            }
            div.bhoechie-tab-menu div.list-group{
              margin-bottom: 0;
            }
            div.bhoechie-tab-menu div.list-group>a{
              margin-bottom: 0;
            }
            div.bhoechie-tab-menu div.list-group>a .glyphicon,
            div.bhoechie-tab-menu div.list-group>a .fa {
              color: #0B610B;
            }
            div.bhoechie-tab-menu div.list-group>a:first-child{
              border-top-right-radius: 0;
              -moz-border-top-right-radius: 0;
            }
            div.bhoechie-tab-menu div.list-group>a:last-child{
              border-bottom-right-radius: 0;
              -moz-border-bottom-right-radius: 0;
            }
            div.bhoechie-tab-menu div.list-group>a.active,
            div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
            div.bhoechie-tab-menu div.list-group>a.active .fa{
              background-color: #0B610B;
              background-image: #0B610B;
              color: #ffffff;
            }
            div.bhoechie-tab-menu div.list-group>a.active:after{
              content: '';
              position: absolute;
              left: 100%;
              top: 50%;
              margin-top: -13px;
              border-left: 0;
              border-bottom: 13px solid transparent;
              border-top: 13px solid transparent;
              border-left: 10px solid #0B610B;
            }

            div.bhoechie-tab-content{
              background-color: #ffffff;
              /* border: 1px solid #eeeeee; */
              padding-left: 20px;
              padding-top: 10px;
            }

            div.bhoechie-tab div.bhoechie-tab-content:not(.active){
              display: none;
            }
            
            div.forma-pago input.form-control, div.forma-pago select.form-control{
                padding: 2px 6px !important;
                height: 26px !important;
                font-size: 12px !important;
            }
            
            #reciboCajaModal , #reciboCajaModal .modal-dialog{
                width: 90%;
            }

            textarea
            {
                resize: none;
            }
        </style>

        <script src="<?= base_url('assets/librerias/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.isloading.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/additional-methods.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/idiomas/jqueryValidator/messages_es.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/idiomas/jqueryValidator/methods_es_CL.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.mask.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/bootstrap-datepicker.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/idiomas/datepicker/bootstrap-datepicker.es.min.js') ?>"  charset="UTF-8" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.bootstrap.wizard.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/prettify.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.notific8.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/js/dataTables.bootstrap.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/librerias/toggle/bootstrap-toggle.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/dientes/snap.svg.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/dientes/additional.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/dientes/script.js') ?>" type="text/javascript"></script>

    </head>
	<?php

	$usuario=$this->session->userdata['loggeado']['ID_USUARIO'];
	
	$query=$this->db->query("SELECT PERFIL_ID, CONCAT(USUARIO_NOMBRE, ' ',USUARIO_APELLIDO)NOMBRE FROM usuario WHERE USUARIO_ID='$usuario'");
    $ds = $query->row_array();
    $perfil  = $ds['PERFIL_ID'];
	$usuario = $ds['NOMBRE'];
	
	$sql="SELECT a.men_cod,men_titulo 	
	FROM menuni AS a                                                                 
	JOIN accesosni AS b ON a.men_cod=b.men_cod
	WHERE usu_login='$perfil' AND
	men_mostrar='N'AND a.men_cod<999
	GROUP BY a.men_titulo
	ORDER BY a.men_cod";
	
	$mSQL_1=$this->db->query($sql);	
	$panel =$mSQL_1->result();
	
	
	?>	
    <body>    
            <nav class="navbar navbar-default" role="navigation">
<!--                 El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="margin-top: -15px" href="<?php echo base_url(); ?>index.php/index/index"><img src="<?= base_url('assets/librerias/images/logo-academos-menu.png') ?>"></a>
                </div>
<!--
                 Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">                            
                            <a href="<?php echo base_url(); ?>index.php/pedido/pedidos/AgendaProduccion"><span class="glyphicon glyphicon-home"></span> INICIO</a>
                        </li>   
						<?php foreach ($panel AS $principal){?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($principal->men_titulo=='Usuario'){ echo $usuario;}else{ echo $principal->men_titulo;} ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
							<?php 
							
								$mSQL=$this->db->query("SELECT men_ejecutar,men_titulo  	
								FROM menuni AS a                                                                 
								JOIN accesosni AS b ON a.men_cod=b.men_cod
								WHERE a.men_cod LIKE '$principal->men_cod%' AND men_mostrar='S' AND b.acceso='S' AND usu_login='$perfil'
								GROUP BY men_panel ORDER BY a.men_cod ");
								$result =$mSQL->result();	
							?>
							<?php foreach ($result AS $items){?> 
                                <li><a href="<?php echo base_url(); echo $items->men_ejecutar;?>"><?php echo $items->men_titulo; ?></a></li>           
                            <?php 
								}
							?>
							</ul>
                        </li>
						<?php 
						}
						?>					
                    </ul>
                </div>
            </nav>
        <div id="contenido" class="shadow-gris">
           
<script type="text/javascript">  
            $(function(){            
            var params = {
                
                onInit: function(data) {
                },
                onCreate: function(notification, data) {
                },
                onClose: function(notification, data) {
                }
                };
               <?php if($this->session->flashdata('mostrarMensajeConfirmacion') && $this->session->flashdata('mostrarMensajeConfirmacion')) {?>
                var text = 'La operación ha sido realizada con éxito.';
                params.heading = 'Confirmación';
                params.theme = 'lime';
                // show notification
                $.notific8(text, params);
                <?php } ?>
                <?php if(isset($mostrarMensajeErrorValidacion)) {?>
                var text = 'Hay algunos campos de entrada con errores. Por favor rectífiquelos.';
                params.heading = 'Error';
                params.theme = 'ruby';
                // show notification
                $.notific8(text, params);
                <?php } ?>
            });


            $(function(){            
            var params = {
                
                onInit: function(data) {
                },
                onCreate: function(notification, data) {
                },
                onClose: function(notification, data) {
                }
                };
               <?php if($this->session->flashdata('mostrarMensajeErrorAlCargar') && $this->session->flashdata('mostrarMensajeErrorAlCargar')) {?>
                var text = 'No se pudo cargar el archivo.';
                params.heading = 'Atención';
                params.theme = 'ruby';
                // show notification
                $.notific8(text, params);
                <?php } ?>
            });




            
           function get_idusuario_loggeado()
           {
               var id="";
                               $.ajax({
                type: 'POST',
                async:false,
                dataType: 'json',
                url: '<?php echo base_url(); ?>index.php/facturacion/facturacion/get_usuario_sesion',
                success: function (data) 
                {     
                    id=data.id;
                }
             });
             return id;               
           }         

</script>