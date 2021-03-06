<?php

class Pedidos extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('pedidos_model');
        $this->load->model('Rutas_model');
    }
	public function prueba($nro_pedido, $proceso, $tproceso){

		$pedidos = $this->pedidos_model->validaProcesoCreado($nro_pedido, $proceso, $tproceso);
        echo json_encode($pedidos);
		
	}
	public function ObtenerTecnicosPedido(){
			
		$nro_pedido   = trim($this->input->post('nro_pedido'));
		$result = $this->pedidos_model->ObtenerTecnicosPedido($nro_pedido);
        echo json_encode($result);
		
	}
	public function ObtenerColor(){
		
		$laboratorio   = trim($this->input->post('categoria'));
		$color = $this->pedidos_model->ObtenerColor($laboratorio);
        echo json_encode($color);
		
	}	
	public function TrackingCreado()
	{
		if ($this->session->userdata('loggeado')) 
        {
            $nro_pedido = trim($this->input->post('nro_pedido'));
            $proceso    = trim($this->input->post('proceso'));
            $tproceso   = trim($this->input->post('tproceso'));

            $pedidos = $this->pedidos_model->TrackingCreado($nro_pedido, $proceso, $tproceso);
            echo json_encode($pedidos);
			
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
	}
	public function AgendaProduccion(){
			
		if ($this->session->userdata('loggeado')) 
        {
			
			$this->load->view('templates/header');
			$this->load->view('index');
			$this->load->view('templates/footer');
			
		}
        else 
        {
          redirect('admin/login', 'refresh');
        }
				
	}
	public function validaProcesoCreado()
	{
		if ($this->session->userdata('loggeado')) 
        {
            $nro_pedido = trim($this->input->post('nro_pedido'));
            $proceso    = trim($this->input->post('proceso'));
            $tproceso   = trim($this->input->post('tproceso'));

            $pedidos = $this->pedidos_model->validaProcesoCreado($nro_pedido, $proceso, $tproceso);
            echo json_encode($pedidos);
			
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
	}
	public function mostrarFormularioTrackingProceso() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
			$datos['tecnico'] = $this->pedidos_model->obtenerTecnico();

            $this->load->view('templates/header');
            $this->load->view('tracking_tecnicos', $datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function mostrarFormularioTracking() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
			$datos['pedidos_procesos'] = $this->pedidos_model->obtenerProcesosPorTecnico();

            $this->load->view('templates/header');
            $this->load->view('tracking', $datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function ProcesosRealizadosPorTecnicos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $tecnico = trim($this->input->post('tecnico'));
            $f_inicio = trim($this->input->post('f_inicio'));
            $f_fin = trim($this->input->post('f_fin'));
        
            $pedidos = $this->pedidos_model->obtenerProcesosRealizadosPorTecnicos($tecnico, $f_inicio, $f_fin);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 	
    public function mostrarFormularioPedido($tipo) 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['productos'] = $this->pedidos_model->obtenerProductos(); 
            $datos['pruebas'] = $this->pedidos_model->obtenerPruebas();
            $datos['inventario'] = $this->pedidos_model->obtenerInventarios();
			$datos['tipo'] = $tipo; 

            $this->load->view('templates/header');
            $this->load->view('Nuevo_pedido', $datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioEditarPedido($numped) 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['numero_de_pedido'] = $numped; 
            $datos['productos'] = $this->pedidos_model->obtenerProductos(); 
            $datos['pruebas'] = $this->pedidos_model->obtenerPruebas();
            $datos['inventario'] = $this->pedidos_model->obtenerInventarios();

            $datos['data_cliente_pedido'] = $this->pedidos_model->obtenerClteInvRecFechas($numped);
            $datos['data_pruebas_pedido'] = $this->pedidos_model->obtenerPruebasDeUnPedido($numped);
            $datos['data_productos_pedido'] = $this->pedidos_model->obtenerProductosDeUnPedido($numped);          
            
            $this->load->view('templates/header');
            $this->load->view('editar_pedido', $datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioProduccionSuspendida() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['pedidos_suspendidos'] = $this->pedidos_model->obtenerPedidosSuspendidos(); 
            
            $this->load->view('templates/header');
            $this->load->view('produccion_suspendida',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function mostrarFormularioProduccion() 
    {
        if ($this->session->userdata('loggeado')) 
        {    

            $datos['pedido_produccion'] = $this->pedidos_model->obtenerPedidoProduccion(); 
            
            $this->load->view('templates/header');
            $this->load->view('pedido_produccion',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
    public function mostrarFormularioProduccionAtrasada() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos['pedido_produccion'] = $this->pedidos_model->obtenerPedidosAtrasadosEnProduccion(); 
            
            $this->load->view('templates/header');
            $this->load->view('pedido_produccion',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioProduccionAtrasadaCliente() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();
            $datos['pedidos_empacados'] = $this->pedidos_model->obtenerPedidosAtrasadosEnEntrega();

            $this->load->view('templates/header');
            $this->load->view('produccion_atrasada_entregar',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function mostrarFormularioControlCalidad() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
			$datos['pedidos_prepedido'] = $this->pedidos_model->ObtenerPedidosControlCalidad();            
            
			$this->load->view('templates/header');
            $this->load->view('Control_Calidad',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
    public function mostrarFormularioPedidosTransito($rango_dias_atrazados="") 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();
            $datos['pedidos_transito'] = $this->pedidos_model->obtenerPedidosEnTransito($rango_dias_atrazados); 

            $this->load->view('templates/header');
            $this->load->view('pedidos_transito',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioRutaMotorizados() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();

            $datos['pedidos_ruta'] = $this->pedidos_model->obtenerPedidosEnRuta(); //RUTA DE ENTREGA
            $datos['retiros_asignados'] = $this->pedidos_model->obtenerRetirosAsignados(); //RUTA DE RETIRO

            $this->load->view('templates/header');
            $this->load->view('pedidos_ruta',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioPedidosEmpacados() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();
            $datos['pedidos_empacados'] = $this->pedidos_model->obtenerPedidosEmpacados(); 
            $datos['mensajeros'] = $this->pedidos_model->obtenerMensajerosActivos();
            $datos['courier'] = $this->pedidos_model->obtenerCourier();

            $this->load->view('templates/header');
            $this->load->view('pedidos_empacados',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }


    public function consultarPedidos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $estados = $this->pedidos_model->obtenerEstadosParaConsultaPedido();  
            
            $this->load->view('templates/header');
            $this->load->view('Consultar_pedidos',array('estados' => $estados
                                                 ));
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 
	 public function consultarPrePedidos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
			$datos['pedidos_prepedido'] = $this->pedidos_model->obtenerPedidosPrePedido();            
            
			$this->load->view('templates/header');
            $this->load->view('Consultar_prepedidos',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function ConsultarPedidosAG($fechaI='', $fechaF='',$NumPed='',$cliente='') 
    {
        if ($this->session->userdata('loggeado')) 
        {

            $datos=array();

            $datos['fechai']= $fechaI; 
            $datos['fechaf']= $fechaF;
            $datos['numped']= $NumPed;
			$datos['cliente']= $cliente;
            
            $this->load->view('templates/header');
            $this->load->view('ConsultarPedidos',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 	

    public function buscarEnAgendaProduccion($fechaI='', $fechaF='',$NumPed='') 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $estados = $this->pedidos_model->obtenerEstadosParaConsultaPedido(); 

            $datos=array();
            $datos['estados']= $estados;
            $datos['fechai']= $fechaI; 
            $datos['fechaf']= $fechaF;
            $datos['numped']= $NumPed;
            
            $this->load->view('templates/header');
            $this->load->view('buscarAgendaProduccion',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function consultarPedidosFacturados() 
    {
        if ($this->session->userdata('loggeado')) 
        {            
            $this->load->view('templates/header');
            $this->load->view('Consultar_pedidos_facturados');
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function consultarPedidosEntregados() 
    {
        if ($this->session->userdata('loggeado')) 
        {            
			$datos=array();
			$datos['courier'] = $this->pedidos_model->obtenerCourier(); 
			$datos['mensajeros'] = $this->pedidos_model->obtenerMensajerosActivos();
			
			$this->load->view('templates/header');
            $this->load->view('Consultar_pedidos_entregados',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
	public function ObtenerConsultarPedidos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $numped   = trim($this->input->post('numped'));
            $f_inicio = trim($this->input->post('f_inicio'));
            $f_fin    = trim($this->input->post('f_fin'));
			$cliente  = trim($this->input->post('cliente'));
			$activo   = trim($this->input->post('activo'));

            $pedidos = $this->pedidos_model->ObtenerConsultarPedidos($f_inicio, $f_fin,$numped,$cliente,$activo);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }
    public function obtenerPedidos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $estado = trim($this->input->post('estado'));
            $f_inicio = trim($this->input->post('f_inicio'));
            $f_fin = trim($this->input->post('f_fin'));

            $pedidos = $this->pedidos_model->obtenerPedidos($estado, $f_inicio, $f_fin);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function buscarPedidosAgProd() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $estado = trim($this->input->post('estado'));
            $f_inicio = trim($this->input->post('f_inicio'));
            $f_fin = trim($this->input->post('f_fin'));
            $numped = trim($this->input->post('numped'));

            $pedidos = $this->pedidos_model->buscarPedidosAgProd($estado, $f_inicio, $f_fin, $numped);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function obtenerPedidosFacturados() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $f_inicio = trim($this->input->post('f_inicio'));
            $f_fin = trim($this->input->post('f_fin'));

            $pedidos = $this->pedidos_model->obtenerPedidosFacturados($f_inicio, $f_fin);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function obtenerPedidosEntregados() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $f_inicio  = trim($this->input->post('f_inicio'));
            $f_fin     = trim($this->input->post('f_fin'));
			$cliente   = trim($this->input->post('cliente'));
			$mensajero = trim($this->input->post('mensajero'));
			$courier   = trim($this->input->post('courier'));

            $pedidos = $this->pedidos_model->obtenerPedidosEntregados($f_inicio,$f_fin,$cliente,$mensajero,$courier);
            echo json_encode($pedidos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 
	public function pruebasDetallePedido() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $nro_pedido = trim($this->input->post('nro_pedido'));

            $pruebas = $this->pedidos_model->pruebasDetallePedido($nro_pedido);


            echo json_encode($pruebas);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 
    public function pruebasGeneralPedido() 
    {
        if ($this->session->userdata('loggeado')) 
        {
			$f_inicio = trim($this->input->post('f_inicio'));
            $f_fin = trim($this->input->post('f_fin'));
			$numped = trim($this->input->post('numped'));

			$pruebas = $this->pedidos_model->pruebasGeneralPedido($f_inicio,$f_fin,$numped);

            echo json_encode($pruebas);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 
    public function procesosDetallePedido() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $nro_pedido = trim($this->input->post('nro_pedido'));

            $procesos = $this->pedidos_model->procesosDetallePedido($nro_pedido);
            echo json_encode($procesos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function procesarPedido($tipo)
    {
        if($this->session->userdata('loggeado'))
        {
            $persona = array();

            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;       
        
            $data = $this->input->post('formulario_pedido');

            //TOMO LOS DATOS DEL PEDIDO
            $id_foto=null;
            $cliente = strtoupper($data["CLIENTE"]);
            $nombre_pac = strtoupper($data["NOMBREPACIENTE"]);
            $apellido_pac = strtoupper($data["APELLIDOPACIENTE"]);
            $medico_tra = strtoupper($data["MEDICOTRATANTE"]);
            $prioridad = strtoupper($data["PRIORIDAD"]);

            $fecha_recepcion =  $data["FECHA_RECEPCION"];
            $fecha_produccion =  $data["FECHA_PRODUCCION"];
            $fecha_entrega =  $data["FECHA_ENTREGA"];
            $fecha_cita =  $data["FECHA_CITA"];
            $inventario_reibido= $data["INVENTARIO"];
			$estado=$tipo;


            // si se logro cargar la imagen temporal en el servidor, entonces la muevo hacia donde estan las fotos cargadas
            if(isset($_FILES['formulario_pedido']['error']['FOTOPACIENTE']) && $_FILES['formulario_pedido']['error']['FOTOPACIENTE']==1)
            {
                $this->session->set_flashdata('mostrarMensajeErrorAlCargar', TRUE); 
                redirect('pedido/pedidos/mostrarFormularioPedido/', 'refresh');
                exit();                
            }
            else
            { 
                $nombreUnicofotografia = sha1(uniqid(mt_rand(), true)); // le genero un nombre unico a la fotografia
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/nibadent/assets/uploads/fotografias/';
                $cod_error = $_FILES['formulario_pedido']['error'];
                $nombreActual = $_FILES['formulario_pedido']['name']['FOTOPACIENTE']; 
                $arrayNombreActual = explode('.', $nombreActual);
                $ext = $arrayNombreActual[count($arrayNombreActual) - 1];
                $uploaddirFotografiaActual = $uploaddir . $nombreUnicofotografia . '.' . $ext;


                if (move_uploaded_file($_FILES['formulario_pedido']['tmp_name']['FOTOPACIENTE'], $uploaddirFotografiaActual))
                {
                    $data['FOTOGRAFIA'] = $nombreUnicofotografia . '.' . $ext;

                    //inserto foto de paciente
                    $data_foto = array();
                    $data_foto['FOTO_PACIENTE']= $nombreUnicofotografia.'.'.$ext;
                    $id_foto = $this->pedidos_model->insertarFoto($data_foto);
                }
            }   

            //inserto paciente
            $data_paciente = array();
            $data_paciente['ID_FOTOS']=$id_foto;
            $data_paciente['NOMBRE_PACIENTE']=$nombre_pac;
            $data_paciente['APELLIDO_PACIENTE']=$apellido_pac;
            $data_paciente['NOMBRE_APELLIDO']=$nombre_pac." ".$apellido_pac;
            $id_paciente = $this->pedidos_model->insertarPaciente($data_paciente);


            //insertar pedido
			
            $id_usuario = $this->session->userdata['loggeado']['ID_USUARIO'];
            $numero_pedido="00".(intval($this->pedidos_model->obtenerUltimoNumPedido())+1);

            $data_pedido = array();
            $data_pedido['PEDF_NUM_PREIMP']=$numero_pedido;
            $data_pedido['EMPR_COD_EMPR']=1;
            $data_pedido['ID_PACIENTE']=$id_paciente;
            $data_pedido['FECHA_COTIZACION']=$fecha_recepcion;
            $data_pedido['FECHA_VENCIMIENTO']=$fecha_produccion;
            $data_pedido['FECHA_ENTREGA']=$fecha_entrega;
            $data_pedido['FECHA_CITA']=$fecha_cita;
            //$data_pedido['COLOR']=;
            //$data_pedido['OBSERVACIONES']=;
            $data_pedido['ID_ESTADOS']=$estado; //PRODUCCION
            $data_pedido['USUARIO_ID']=$id_usuario;
            $data_pedido['FECHA_MODIFICAR']=$fecha_recepcion;
            $data_pedido['PRIORIDAD']=$prioridad;
            $data_pedido['MEDICO_TRATANTE']=$medico_tra;
            $id_pedido = $this->pedidos_model->insertarPedido($data_pedido);
			
			//$mes= explode($fecha_produccion);
			//$mes[1]; // imprimiría el mes 
			
			//$ano= explode($fecha_produccion);
			//$ano[2];

            //inserto el pedido en la agenda de produccion
            //$data_agenda_prod = array();
            //$data_agenda_prod['title']=$numero_pedido;
            //$data_agenda_prod['body']=$numero_pedido;
            //$data_agenda_prod['`start`']=$fecha_produccion;
            //$data_agenda_prod['`end`']=$fecha_produccion;
			//$data_agenda_prod['`ano`']=$ano[2];
			//$data_agenda_prod['`mes`']=$mes[1];
			
            //$this->pedidos_model->insertarPedidoEnAgendaProd($data_agenda_prod);

            //inserto inventario recibido
            $data_inventario_recibido = array();
            foreach($inventario_reibido as $id_inv=>$cant)
            {
               if($cant=="0")
               {
                    unset($inventario_reibido[$id_inv]);
               }
               else
               {
                    $data_inventario_recibido_aux = array();
                    $data_inventario_recibido_aux['ID_PEDIDO']= $id_pedido;
                    $data_inventario_recibido_aux['id_inventario']= $id_inv;
                    $data_inventario_recibido_aux['DESCRIPCION_INVENTARIO']= $cant;
                    array_push($data_inventario_recibido, $data_inventario_recibido_aux);
                   ;                    
               }
            }
            if(count($data_inventario_recibido)>0)
                $this->pedidos_model->insertarInventarioRecibido($data_inventario_recibido,$id_pedido);

            //inserto las pruebas
            $arreglo_pruebas=array();
            $cadena_pruebas = $data["PRUEBAS"];  
            $arreglo_cadena_pruebas = explode("&&&", $cadena_pruebas); 
            for ($i=0; $i < count($arreglo_cadena_pruebas); $i++) 
            { 
                $arreglo_aux_pruebas = explode("|||", $arreglo_cadena_pruebas[$i]);
                $arreglo_pruebas_actual=array();
                $arreglo_pruebas_actual['ID_PEDIDO']=$id_pedido;
                $arreglo_pruebas_actual['PEDF_NUM_PREIMP']=$numero_pedido;
                //$arreglo_pruebas_actual['PRUEBA']=$arreglo_aux_pruebas[0];
                //$arreglo_pruebas_actual['DIAS']=$arreglo_aux_pruebas[1];
                $arreglo_pruebas_actual['FECHA_SALIDA']=$arreglo_aux_pruebas[2];//esta fecha se actualiza cuando la prueba sale de badent
                $arreglo_pruebas_actual['FECHA_SALIDA_PRODUCCION']=$arreglo_aux_pruebas[2];//fecha salida de produccion, added
                $arreglo_pruebas_actual['ID_TIPO_PRUEBA']=$arreglo_aux_pruebas[3];
                $arreglo_pruebas_actual['FECHA_ENTREGA_CLIENTE']=$arreglo_aux_pruebas[4];//fecha entrega al cliente, added
                $arreglo_pruebas_actual['ID_ESTADOS']=3;

                array_push($arreglo_pruebas, $arreglo_pruebas_actual);
            }
            if(count($arreglo_pruebas)>0)
                $this->pedidos_model->insertarPruebas($arreglo_pruebas,$id_pedido);

            //inserto los productos y los procesos
            $cadena_productos = $data["PRODUCTOS"];  
            $arreglo_cadena_productos = explode("&&&", $cadena_productos); 
            for ($i=0; $i < count($arreglo_cadena_productos); $i++) 
            { 
                $arreglo_aux_productos = explode("|||", $arreglo_cadena_productos[$i]);
                $arreglo_productos_actual=array();

                 $arreglo_productos_actual['ID_PEDIDO']=$id_pedido;
                 $arreglo_productos_actual['PROD_COD_PROD']='LPFCI004';//$arreglo_aux_productos[2]; //TODO: 
                 $arreglo_productos_actual['PROD_NOM_PROD']='CORONA YTRIO ZIRCONIO  Zfx MAS PORCELANA (ESTRATIFICADO)';
                 $arreglo_productos_actual['UNID_COD_UNID']=1;
                 $arreglo_productos_actual['CANTIDAD']=$arreglo_aux_productos[6];
                 $arreglo_productos_actual['ID_ESTADOS']=3;
                 $arreglo_productos_actual['DETALLE']=$arreglo_aux_productos[1];//dientes

                 //busco el id_producto_laboratorio, los ID_PROCESOS, si comisiona el producto, si comisiona el proceso
                 $datos_auxiliares = $this->pedidos_model->obtenerProcesosDeProducto($arreglo_productos_actual['PROD_COD_PROD']);

                 $arreglo_productos_actual['ID_PRODUCTO_LABORATORIO']=$datos_auxiliares[0]['ID_PRODUCTO_LABORATORIO'];
                 $arreglo_productos_actual['COMISION']=$datos_auxiliares[0]['PRODUCTO_COMISIONA'];

                 //campos nuevos adicionados
                 $arreglo_productos_actual['CATEGORIA']=$arreglo_aux_productos[0]; 
                 $arreglo_productos_actual['OBSERVACIONES']=$arreglo_aux_productos[5];
                 $arreglo_productos_actual['GUIACOLORES']=$arreglo_aux_productos[3];
                 $arreglo_productos_actual['COLORES']=$arreglo_aux_productos[4];
				 //$arreglo_productos_actual['PONTICO']=$arreglo_aux_productos[7];
				 //$arreglo_productos_actual['FERULIZADO']=$arreglo_aux_productos[8];

                 //inserto el producto
                     $id_pedido_descripcion = $this->pedidos_model->insertarProducto($arreglo_productos_actual);

                     //inserto en proceso pedido
                     $data_proceso_pedido=array();
                     for ($w=0; $w < count($datos_auxiliares); $w++) 
                     { 
                        $data_proceso_pedido_actual=array(); 
                        $data_proceso_pedido_actual['ID_PEDIDO_DESCRIPCION']=$id_pedido_descripcion;
                        $data_proceso_pedido_actual['ID_PROCESOS']=$datos_auxiliares[$w]['ID_PROCESOS'];
                        $data_proceso_pedido_actual['PROD_COD_PROD']=$arreglo_productos_actual['PROD_COD_PROD'];
                        $data_proceso_pedido_actual['COMISION']=$datos_auxiliares[$w]['PROCESO_COMISIONA'];;
                        $data_proceso_pedido_actual['ID_ESTADOS']=3;
                        array_push($data_proceso_pedido, $data_proceso_pedido_actual);
                     }
                     $this->pedidos_model->insertarProcesoPedido($data_proceso_pedido);

            }
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            redirect('pedido/pedidos/mostrarFormularioPedido/mostrarFormularioPedido', 'refresh'); 
        }
        else
        {
            //If no session, redirect to login page
          redirect('admin/login', 'refresh');
        }
    }

    public function procesarEdicionPedido($numped) // 0025838
    {
        if($this->session->userdata('loggeado'))
        {
            $persona = array();

            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;       
        
            $data = $this->input->post('formulario_pedido');

            //TOMO LOS DATOS DEL PEDIDO
            $id_foto=null;
            $cliente = strtoupper($data["CLIENTE"]);
            $nombre_pac = strtoupper($data["NOMBREPACIENTE"]);
            $apellido_pac = strtoupper($data["APELLIDOPACIENTE"]);
            $medico_tra = strtoupper($data["MEDICOTRATANTE"]);
            $prioridad = strtoupper($data["PRIORIDAD"]);

            $fecha_recepcion =  $data["FECHA_RECEPCION"];
            $fecha_produccion =  $data["FECHA_PRODUCCION"];
            $fecha_entrega =  $data["FECHA_ENTREGA"];
            $fecha_cita =  $data["FECHA_CITA"];
            $inventario_reibido= $data["INVENTARIO"];


            // si se logro cargar la imagen temporal en el servidor, entonces la muevo hacia donde estan las fotos cargadas
            if(isset($_FILES['formulario_pedido']['error']['FOTOPACIENTE']) && $_FILES['formulario_pedido']['error']['FOTOPACIENTE']==1)
            {
                $this->session->set_flashdata('mostrarMensajeErrorAlCargar', TRUE); 
                redirect('pedido/pedidos/mostrarFormularioPedido/', 'refresh');                
            }
            else
            { 
                $nombreUnicofotografia = sha1(uniqid(mt_rand(), true)); // le genero un nombre unico a la fotografia
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/nibadent/assets/uploads/fotografias/';
                $cod_error = $_FILES['formulario_pedido']['error'];
                $nombreActual = $_FILES['formulario_pedido']['name']['FOTOPACIENTE']; 
                $arrayNombreActual = explode('.', $nombreActual);
                $ext = $arrayNombreActual[count($arrayNombreActual) - 1];
                $uploaddirFotografiaActual = $uploaddir . $nombreUnicofotografia . '.' . $ext;


                if (move_uploaded_file($_FILES['formulario_pedido']['tmp_name']['FOTOPACIENTE'], $uploaddirFotografiaActual))
                {
                    $data['FOTOGRAFIA'] = $nombreUnicofotografia . '.' . $ext;

                    //inserto foto de paciente
                    $data_foto = array();
                    $data_foto['FOTO_PACIENTE']= $nombreUnicofotografia.'.'.$ext;
                    $id_foto = $this->pedidos_model->insertarFoto($data_foto);
                }
            }   


            //actualizo paciente
            $id_paciente = $this->pedidos_model->getIdPaciente($numped);
            $data_paciente = array();
            if(is_null($id_foto)==false)
                $data_paciente['ID_FOTOS']=$id_foto;
            $data_paciente['NOMBRE_PACIENTE']=$nombre_pac;
            $data_paciente['APELLIDO_PACIENTE']=$apellido_pac;
            $data_paciente['NOMBRE_APELLIDO']=$nombre_pac." ".$apellido_pac;
            $this->pedidos_model->actualizarPaciente($data_paciente,$id_paciente);


            //actualizo pedido
            //$data_sesion = $this->session->userdata()['loggeado'];
            $id_usuario = $this->session->userdata['loggeado']['ID_USUARIO'];

            $data_pedido = array();
            $data_pedido['PEDF_NUM_PREIMP']=$numped;
            $data_pedido['EMPR_COD_EMPR']=1;
            $data_pedido['ID_PACIENTE']=$id_paciente;
            $data_pedido['FECHA_COTIZACION']=$fecha_recepcion;
            $data_pedido['FECHA_VENCIMIENTO']=$fecha_produccion;
            $data_pedido['FECHA_ENTREGA']=$fecha_entrega;
            $data_pedido['FECHA_CITA']=$fecha_cita;
            //$data_pedido['COLOR']=;
            //$data_pedido['OBSERVACIONES']=;
            $data_pedido['ID_ESTADOS']=2; //PRODUCCION
            $data_pedido['USUARIO_ID']=$id_usuario;
            $data_pedido['FECHA_MODIFICAR']=$fecha_recepcion;
            $data_pedido['PRIORIDAD']=$prioridad;
            $data_pedido['MEDICO_TRATANTE']=$medico_tra;
            $id_pedido = $this->pedidos_model->actualizarPedido($data_pedido,$numped);

            //inserto el pedido en la agenda de produccion
            $data_agenda_prod = array();
            $data_agenda_prod['title']=$numped;
            $data_agenda_prod['body']=$numped;
            $data_agenda_prod['`start`']=$fecha_produccion;
            $data_agenda_prod['`end`']=$fecha_produccion;
            $this->pedidos_model->insertarPedidoEnAgendaProd($data_agenda_prod);

            //inserto inventario recibido
            $data_inventario_recibido = array();
            foreach($inventario_reibido as $id_inv=>$cant)
            {
               if($cant=="0")
               {
                    unset($inventario_reibido[$id_inv]);
               }
               else
               {
                    $data_inventario_recibido_aux = array();
                    $data_inventario_recibido_aux['ID_PEDIDO']= $id_pedido;
                    $data_inventario_recibido_aux['id_inventario']= $id_inv;
                    $data_inventario_recibido_aux['DESCRIPCION_INVENTARIO']= $cant;
                    array_push($data_inventario_recibido, $data_inventario_recibido_aux);
                   ;                    
               }
            }
            if(count($data_inventario_recibido)>0)
                $this->pedidos_model->insertarInventarioRecibido($data_inventario_recibido,$id_pedido);

            //inserto las pruebas
            $arreglo_pruebas=array();
            $cadena_pruebas = $data["PRUEBAS"];  
            $arreglo_cadena_pruebas = explode("&&&", $cadena_pruebas); 
            for ($i=0; $i < count($arreglo_cadena_pruebas); $i++) 
            { 
                $arreglo_aux_pruebas = explode("|||", $arreglo_cadena_pruebas[$i]);
                $arreglo_pruebas_actual=array();
                $arreglo_pruebas_actual['ID_PEDIDO']=$id_pedido;
                $arreglo_pruebas_actual['PEDF_NUM_PREIMP']=$numped;
                //$arreglo_pruebas_actual['PRUEBA']=$arreglo_aux_pruebas[0];
                //$arreglo_pruebas_actual['DIAS']=$arreglo_aux_pruebas[1];
                $arreglo_pruebas_actual['FECHA_SALIDA']=$arreglo_aux_pruebas[2];//esta fecha se actualiza cuando la prueba sale de badent
                $arreglo_pruebas_actual['FECHA_SALIDA_PRODUCCION']=$arreglo_aux_pruebas[2];//fecha salida de produccion, added
                $arreglo_pruebas_actual['ID_TIPO_PRUEBA']=$arreglo_aux_pruebas[3];
                $arreglo_pruebas_actual['FECHA_ENTREGA_CLIENTE']=$arreglo_aux_pruebas[4];//fecha entrega al cliente, added
                $arreglo_pruebas_actual['ID_ESTADOS']=3;

                array_push($arreglo_pruebas, $arreglo_pruebas_actual);
            }
            if(count($arreglo_pruebas)>0)
                $this->pedidos_model->insertarPruebas($arreglo_pruebas,$id_pedido);

            //inserto los productos y los procesos
            $this->pedidos_model->eliminarProductosyProcesos($id_pedido);
            $cadena_productos = $data["PRODUCTOS"];  
            $arreglo_cadena_productos = explode("&&&", $cadena_productos); 
            for ($i=0; $i < count($arreglo_cadena_productos); $i++) 
            { 
                $arreglo_aux_productos = explode("|||", $arreglo_cadena_productos[$i]);
                $arreglo_productos_actual=array();

                 $arreglo_productos_actual['ID_PEDIDO']=$id_pedido;
                 $arreglo_productos_actual['PROD_COD_PROD']='LPFCI004';//$arreglo_aux_productos[2]; //TODO: 
                 $arreglo_productos_actual['PROD_NOM_PROD']='CORONA YTRIO ZIRCONIO  Zfx MAS PORCELANA (ESTRATIFICADO)';
                 $arreglo_productos_actual['UNID_COD_UNID']=1;
                 $arreglo_productos_actual['CANTIDAD']=$arreglo_aux_productos[6];
                 $arreglo_productos_actual['ID_ESTADOS']=3;
                 $arreglo_productos_actual['DETALLE']=$arreglo_aux_productos[1];//dientes

                 //busco el id_producto_laboratorio, los ID_PROCESOS, si comisiona el producto, si comisiona el proceso
                 $datos_auxiliares = $this->pedidos_model->obtenerProcesosDeProducto($arreglo_productos_actual['PROD_COD_PROD']);

                 $arreglo_productos_actual['ID_PRODUCTO_LABORATORIO']=$datos_auxiliares[0]['ID_PRODUCTO_LABORATORIO'];
                 $arreglo_productos_actual['COMISION']=$datos_auxiliares[0]['PRODUCTO_COMISIONA'];

                 //campos nuevos adicionados
                 $arreglo_productos_actual['CATEGORIA']=$arreglo_aux_productos[0]; 
                 $arreglo_productos_actual['OBSERVACIONES']=$arreglo_aux_productos[5];
                 $arreglo_productos_actual['GUIACOLORES']=$arreglo_aux_productos[3];
                 $arreglo_productos_actual['COLORES']=$arreglo_aux_productos[4];

                 //inserto el producto
                     $id_pedido_descripcion = $this->pedidos_model->insertarProducto($arreglo_productos_actual);

                     //inserto en proceso pedido
                     $data_proceso_pedido=array();
                     for ($w=0; $w < count($datos_auxiliares); $w++) 
                     { 
                        $data_proceso_pedido_actual=array(); 
                        $data_proceso_pedido_actual['ID_PEDIDO_DESCRIPCION']=$id_pedido_descripcion;
                        $data_proceso_pedido_actual['ID_PROCESOS']=$datos_auxiliares[$w]['ID_PROCESOS'];
                        $data_proceso_pedido_actual['PROD_COD_PROD']=$arreglo_productos_actual['PROD_COD_PROD'];
                        $data_proceso_pedido_actual['COMISION']=$datos_auxiliares[$w]['PROCESO_COMISIONA'];;
                        $data_proceso_pedido_actual['ID_ESTADOS']=3;
                        array_push($data_proceso_pedido, $data_proceso_pedido_actual);
                     }
                     $this->pedidos_model->insertarProcesoPedido($data_proceso_pedido);

            }
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            redirect('pedido/pedidos/mostrarFormularioPedido/mostrarFormularioPedido', 'refresh'); 
        }
        else
        {
            //If no session, redirect to login page
          redirect('admin/login', 'refresh');
        }
    }
    public function getIndicadores() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos = array();

            $cant_suspendidos = $this->pedidos_model->cantidadPedidosSuspendidos();
            $cant_atrasados_produccion = $this->pedidos_model->cantidadPedidosAtrasadosEnProduccion();
            $cant_atrasados_entrega_cliente = $this->pedidos_model->cantidadPedidosAtrasadosEnEntrega();
            $cant_pedidos_transito = $this->pedidos_model->cantidadPedidosEnTransito();
            $cant_pedidos_ruta = $this->pedidos_model->cantidadPedidosEnRuta();
            $cant_pedidos_empacados = $this->pedidos_model->cantidadPedidosEmpacados();
            $cant_pedidos_facturados = $this->pedidos_model->cantidadPedidosFacturados();
            $cant_pedidos_entregados = $this->pedidos_model->cantidadPedidosEntregados();
            $cant_retiros_pendientes = $this->pedidos_model->cantidadRetirosPendientes();
            $cant_retiros_asignados = $this->pedidos_model->cantidadRetirosAsignados();
			$cant_control_calidad = $this->pedidos_model->cantidadControlCalidad();
			////$cant_control_calidad = 2;
			$cant_pre_pedido= $this->pedidos_model->cantidadPrePedido();
			$cant_ped_produccion= $this->pedidos_model->cantidadPedProduccion();
			
            $datos['cant_suspendidos'] = $cant_suspendidos;
            $datos['cant_atrasados_produccion'] = $cant_atrasados_produccion;
			//$datos['cant_retiros_asignados']  = $cant_retiros_asignados;
            $datos['cant_atrasados_entrega_cliente'] = $cant_atrasados_entrega_cliente;
            $datos['cant_pedidos_transito'] = $cant_pedidos_transito;
            $datos['cant_pedidos_ruta'] = $cant_pedidos_ruta;
            $datos['cant_pedidos_empacados'] = $cant_pedidos_empacados;
            $datos['cant_pedidos_facturados'] = $cant_pedidos_facturados;
            $datos['cant_pedidos_entregados'] = $cant_pedidos_entregados;
            $datos['cant_retiros_pendientes'] = $cant_retiros_pendientes;
			$datos['cant_control_calidad']    = $cant_control_calidad;
			$datos['cant_pre_pedido']         = $cant_pre_pedido;
			$datos['cant_ped_produccion']     = $cant_ped_produccion;
			
            //obtengo los pacientes y los pedidos para el autocompletar de la busqueda en la vista
            //$datos['pacientes'] = $this->pedidos_model->obtenerPacientes();
            //$datos['pedidos'] = $this->pedidos_model->obtenerNumPedidos();

            echo json_encode($datos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    } 

    public function obtenerPacientes() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $datos['pacientes'] = $this->pedidos_model->obtenerPacientes();

             echo json_encode($datos); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioAdministrarPedidos() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $datos['pedidos'] = $this->pedidos_model->obtenerNumPedidos(2);
            $datos['pruebas'] = $this->pedidos_model->obtenerPruebas();
          
            //var_dump( $datos['pruebas'] );
            
            $this->load->view('templates/header');
            $this->load->view('administrar_pedidos', $datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarFormularioLogistica(){

     if ($this->session->userdata('loggeado')) 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;

            $datos=array();
            //$datos['retiros_pendientes'] = $this->pedidos_model->obtenerRetiros();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();
            //$datos['pedidos_empacados'] = $this->pedidos_model->obtenerPedidosEmpacados(); 
            $datos['mensajeros'] = $this->pedidos_model->obtenerMensajerosActivos();
            $datos['courier'] = $this->pedidos_model->obtenerCourier();
            $datos['estados'] = $this->pedidos_model->obtenerEstadosTmp();
            //$datos['pedidos_ruta'] = $this->pedidos_model->obtenerPedidosEnRuta(); //RUTA DE ENTREGA
            //$datos['retiros_asignados'] = $this->pedidos_model->obtenerPedidosEnRuta2(); //RUTA DE RETIRO
            $datos['pedidos_ruta']=$this->pedidos_model->obtenerPedidosEnRuta2();
            $datos['contador_cordinacion']=$this->pedidos_model->contarTotalCoordinacion();
            $datos['contador_r_p']=$this->pedidos_model->contarRetirosPendientes();
            $datos['rutas_sin_asignar'] = $this->pedidos_model->rutasSinAsignar();
            $datos['clientes']=$this->pedidos_model->idClientesPedidosEmpacadosRetiros();
            //$datos['clientesRetiros']=$this->pedidos_model->obtenerClientesRetiro();
            $datos['rutas']=$this->Rutas_model->obteneRutas();
            $datos['entregas_retiros']=$this->pedidos_model->obtenerRetirosEntregasPendientes();
            
            
            //$datos['retirosSinAsignar']=$this->Rutas_model->obtenerRetirosSinAsignar();

            
            
            $this->load->view('templates/header');
            $this->load->view('administrar_logistica',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }   
    }



    public function eliminarPrueba() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $idPrueba = trim($this->input->post('idPrueba'));
            $this->pedidos_model->eliminar_Prueba($idPrueba); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function getdatosDetallePrueba() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $idPrueba = trim($this->input->post('idPrueba'));

            $datos = $this->pedidos_model->datosDetallePrueba($idPrueba);
            echo json_encode($datos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function getdatosImprimirDespacho() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $idPrueba = trim($this->input->post('idPrueba'));

            $datos = $this->pedidos_model->datosImprimirDespacho($idPrueba);
            echo json_encode($datos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarImprimirPedido($idPedido) 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            //$datos['productos'] = $this->pedidos_model->obtenerProductos(); 
            $datos['pruebas'] = $this->pedidos_model->obtenerPruebas();

            var_dump($idPedido);

            $this->load->view('imprimir_Pedido', $datos);

        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function adicionarPruebaAlPedido()
    {
        if ($this->session->userdata('loggeado')) 
        {        
            $arreglo_pruebas = array();
            $arreglo_pruebas['ID_PEDIDO']=trim($this->input->post('idPedido')); 
            $arreglo_pruebas['PEDF_NUM_PREIMP']=trim($this->input->post('pedf_num_preimp')); 
            $arreglo_pruebas['FECHA_SALIDA']=trim($this->input->post('fecha_salida')); 
            $arreglo_pruebas['FECHA_SALIDA_PRODUCCION']=trim($this->input->post('fecha_salida_produccion')); 
            $arreglo_pruebas['ID_TIPO_PRUEBA']=trim($this->input->post('id_tipo_prueba')); 
            $arreglo_pruebas['FECHA_ENTREGA_CLIENTE']=trim($this->input->post('fecha_entrega_cliente')); 
            $arreglo_pruebas['ID_ESTADOS']=trim($this->input->post('id_estados')); 

            $id_generado = $this->pedidos_model->insertarPrueba($arreglo_pruebas,trim($this->input->post('idPedido')));

            echo json_encode($id_generado); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }

    }

    public function actualizarPrueba()
    {    
        if ($this->session->userdata('loggeado')) 
        {
            $arreglo_pruebas_actual=array();
            $arreglo_pruebas_actual['OBSERVACIONES']=trim($this->input->post('obs')); 

            if( trim($this->input->post('fecha_retorno'))!="" )
                $arreglo_pruebas_actual['FECHA_REGRESO']=trim($this->input->post('fecha_retorno')); 

            if( trim($this->input->post('estado'))!="" )
                $arreglo_pruebas_actual['ID_ESTADOS']=trim($this->input->post('estado')); 

            //si se devolvió inventario entonces debo eliminarolo del inventario recibido
            if( trim($this->input->post('cadena_id_inv_devuelto'))!="" )
            {
                $arreglo_id_inventarios=explode("&&",$this->input->post('cadena_id_inv_devuelto'));
                for ($i=0; $i < count($arreglo_id_inventarios); $i++) 
                { 
                    $id_inv_actual = $arreglo_id_inventarios[$i];
                    $this->pedidos_model->eliminar_Inventario_Recibido($id_inv_actual);
                }
            }

            $this->pedidos_model->actualizarPrueba($arreglo_pruebas_actual,trim($this->input->post('idPrueba')));
             echo 1;
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function obtenerInventarioDePedido()
    {
        if ($this->session->userdata('loggeado'))        
        {
            $idPedido=$this->input->post('idPedido'); 
            $inventarios = $this->pedidos_model->obtenerInventarioPedido($idPedido);
            echo json_encode($inventarios); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function getDataCabeceraPedido()
    {
        if ($this->session->userdata('loggeado'))        
        {
            $nro_pedido=$this->input->post('nro_pedido'); 
            $data_cab_pedido = $this->pedidos_model->obtener_DatosCabeceraPedido($nro_pedido);
            echo json_encode($data_cab_pedido); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function suspenderPedido()
    {
        if ($this->session->userdata('loggeado'))        
        {
            $idPedido=$this->input->post('idPedido'); 
            $motivo=$this->input->post('motivo'); 
            $this->pedidos_model->suspenderPedido($idPedido,$motivo);

            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            echo 1;
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function reanudarPedidos()
    {
        if ($this->session->userdata('loggeado'))        
        {
            $cadena =$this->input->post('cadena_nros_pedidos'); 
            $arreglo=explode("&&", $cadena); 

            $this->pedidos_model->reanudarPedidos($arreglo);

            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            echo 1;
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarPedidosEnProduccion() 
    {
        if ($this->session->userdata('loggeado')) 
        {        
            $this->load->view('templates/header');
            $this->load->view('pedidos_en_produccion');
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function getPedidosEnProduccion() 
    {
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $datos['pedidos'] = $this->pedidos_model->obtenerPedidosEnProduccion();           

            echo json_encode($datos['pedidos']); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function mostrarConfiguracionProcesos() 
    {
        if ($this->session->userdata('loggeado')) 
        {        
            $datos=array();
            $datos['pedidos'] = $this->pedidos_model->obtenerProcesosNombre();

            var_dump( $datos['pedidos']);

            $this->load->view('templates/header');
            $this->load->view('configurarProcesos',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function despacharPruebas()
    {
        if ($this->session->userdata('loggeado')) 
        {        
            $cadena = trim($this->input->post('cadena'));
            $courier = trim($this->input->post('courier'));
            $recibe = trim($this->input->post('recibe'));
            $flete = trim($this->input->post('flete'));
            $mensajero = trim($this->input->post('mensajero'));
            //$idusmen=array();
            //$idusmen['USUARIO_ID']=$mensajero;
            $men=array();
            $men['ID_USUARIO_MENSAJERO']=$mensajero;
            $men['FECHA_RUTA']=date("Y-m-d H:i:s");
            $tipoMensajeria = trim($this->input->post('tipoMensajeria'));
            $arreglo_ids_pruebas = explode("&&", $cadena);
            //$cedulaMensajero=$this->pedidos_model->obtenerCedulaMensajero($mensajero);
            $ruta=$this->pedidos_model->insertarRuta($men);

            $this->pedidos_model->despacharPruebas($arreglo_ids_pruebas, $courier, $recibe, $flete, $mensajero, $tipoMensajeria,$ruta);
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            echo 1; 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }

    public function mostrarGestionRetiros() 
    {
        if ($this->session->userdata('loggeado')) 
        {        
            $datos=array();
            $datos['retiros_pendientes'] = $this->pedidos_model->obtenerRetiros();

            $datos['pedidos_online']= $this->pedidos_model->obtenerPedidosClienteOnline();//por reslizar
            $datos['pruebas_sinretorno']=$this->pedidos_model->obtenerPruebasSinRetorno();//por realizar
            $datos['clientes']=$this->pedidos_model->obtenerClientes();
            $datos['mensajeros'] = $this->pedidos_model->obtenerMensajerosActivos();



            $this->load->view('templates/header');
            $this->load->view('gestionRetiros',$datos);
            $this->load->view('templates/footer');
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
    }

    public function insertarRetiro()
    {
        if ($this->session->userdata('loggeado')) 
        {      
            //$data_sesion = $this->session->userdata()['loggeado'];
            $id_usuario = $this->session->userdata['loggeado']['ID_USUARIO'];
            $id=trim($this->input->post('dato'));
            $id_pd=$this->pedidos_model->obtenerPedidoPrueba($id);
            $data_retiro = array();
            $data_retiro['CLIENTE']=trim($this->input->post('cliente'));
            $data_retiro['TELEFONO']=trim($this->input->post('telefono'));
            $data_retiro['CONTACTO']=trim($this->input->post('contacto'));
            $data_retiro['DIRECCION_RETIRO']=trim($this->input->post('direccion'));
            $data_retiro['CIUDAD']=trim($this->input->post('ciudad'));
            $data_retiro['FECHA']=date("Y-m-d H:i:s");
            $data_retiro['ID_PRUEBA']=trim($this->input->post('dato'));
            $data_retiro['ID_PEDIDO']=$id_pd->ID_PEDIDO;
            $data_retiro['USUARIO_SESION']=$id_usuario;       

           
            $usuario_datos = $this->pedidos_model->insertarRetiro($data_retiro);

            echo json_encode($usuario_datos);   
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }

    public function asignarRetiroMensajero()
    {
        if ($this->session->userdata('loggeado')) 
        {      
            //$data_sesion = $this->session->userdata()['loggeado'];
            $id_usuario = $this->session->userdata['loggeado']['ID_USUARIO'];

            $id_retiro = trim($this->input->post('id_retiro_a_asignar'));
            $id_mensajero = trim($this->input->post('id_mensajero'));

            $data_asignacion = array();
            $data_asignacion['ID_USUARIO_ASIGNA']=$id_usuario;
            $data_asignacion['ID_USUARIO_MENSAJERO']=$id_mensajero;
            $data_asignacion['FECHA_FUE_ASIGNADO']=date("Y-m-d H:i:s");
            $data_asignacion['ASIGNADO']=1;     

            $this->pedidos_model->actualizarRetiro($data_asignacion,$id_retiro);

            echo 1; 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }
    public function editarRetiro(){

        if ($this->session->userdata('loggeado')) 
        {    
              
           

            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;       
        
            $data = $this->input->post('formulario_retiro');

            //TOMO LOS DATOS DEL PEDIDO
            $id_foto=null;
            $id = strtoupper($data["IDRECIBE"]);
            $nombrerecibe = strtoupper($data["NOMBRERECIBE"]);
            if(isset($_FILES['formulario_retiro']['error']['FOTORECIBE']) && $_FILES['formulario_retiro']['error']['FOTORECIBE']==1)
            {
                $this->session->set_flashdata('mostrarMensajeErrorAlCargar', TRUE); 
                redirect('pedido/pedidos/mostrarFormularioLogistica/', 'refresh');
                exit();                
            }
           else
            { 
                $nombreUnicofotografia = sha1(uniqid(mt_rand(), true)); // le genero un nombre unico a la fotografia
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/nibadent/assets/uploads/fotografias/';
                $cod_error = $_FILES['formulario_retiro']['error'];
                $nombreActual = $_FILES['formulario_retiro']['name']['FOTORECIBE']; 
                $arrayNombreActual = explode('.', $nombreActual);
                $ext = $arrayNombreActual[count($arrayNombreActual) - 1];
                $uploaddirFotografiaActual = $uploaddir . $nombreUnicofotografia . '.' . $ext;


                if (move_uploaded_file($_FILES['formulario_retiro']['tmp_name']['FOTORECIBE'], $uploaddirFotografiaActual))
                {
                    $data['FOTOGRAFIA'] = $nombreUnicofotografia . '.' . $ext;

                    //inserto foto de paciente
                    $data_foto = array();
                    $data_foto['FOTO_PACIENTE']= $nombreUnicofotografia.'.'.$ext;
                    $id_foto = $this->pedidos_model->insertarFoto($data_foto);
                }
            } 

            $m['datos']=$this->pedidos_model->validadIdPrueba($id);
            if(count($m['datos'])>0){

                $data_entrega = array();
                //$data_retiro['FECHA_RETIRO']=date("Y-m-d H:i:s");
                $data_entrega['PERSO_RECIBE']=$nombrerecibe;
                $data_entrega['ENTREGADO']='S'; 
                $data_entrega['ID_ESTADOS']='8'; 
                $data_entrega['DESPACHADO']='S';  
                $data_entrega['ID_FOTOS']=$id_foto;    
                $retiros = $this->pedidos_model->ingresarEntrega($data_entrega,$id);
            }  
            else{

                
                $data_retiro = array();
                $data_retiro['FECHA_RETIRO']=date("Y-m-d H:i:s");
                $data_retiro['RECIBE_CONFORME']=$nombrerecibe;
                $data_retiro['RETIRADO']='1';  
                $data_retiro['ID_FOTOS']=$id_foto;    
                $retiro = $this->pedidos_model->ingresarRetiroRecibido($data_retiro,$id);
            }
            
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            redirect('pedido/pedidos/mostrarFormularioLogistica', 'refresh'); 
              
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 


    }
    public function editarEntregaPedido(){

        if ($this->session->userdata('loggeado')) 
        {    
            
            $this->load->helper('form');
            $this->load->library('form_validation');       
            $this->form_validation->CI =& $this;       
        
            $data = $this->input->post('formulario_entrega');

            //TOMO LOS DATOS DEL PEDIDO
            $id_foto=null;
            $id = strtoupper($data["IDRECIBE"]);
            $nombrerecibe = strtoupper($data["NOMBRERECIBE"]);
            if(isset($_FILES['formulario_entrega']['error']['FOTORECIBE']) && $_FILES['formulario_entrega']['error']['FOTORECIBE']==1)
            {
                $this->session->set_flashdata('mostrarMensajeErrorAlCargar', TRUE); 
                redirect('pedido/pedidos/mostrarFormularioRutaMotorizados/', 'refresh');
                exit();                
            }
            else
            { 
                $nombreUnicofotografia = sha1(uniqid(mt_rand(), true)); // le genero un nombre unico a la fotografia
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/nibadent/assets/uploads/fotografias/';
                $cod_error = $_FILES['formulario_entrega']['error'];
                $nombreActual = $_FILES['formulario_entrega']['name']['FOTORECIBE']; 
                $arrayNombreActual = explode('.', $nombreActual);
                $ext = $arrayNombreActual[count($arrayNombreActual) - 1];
                $uploaddirFotografiaActual = $uploaddir . $nombreUnicofotografia . '.' . $ext;


                if (move_uploaded_file($_FILES['formulario_entrega']['tmp_name']['FOTORECIBE'], $uploaddirFotografiaActual))
                {
                    $data['FOTOGRAFIA'] = $nombreUnicofotografia . '.' . $ext;

                    //inserto foto de paciente
                    $data_foto = array();
                    $data_foto['FOTO_PACIENTE']= $nombreUnicofotografia.'.'.$ext;
                    $id_foto = $this->pedidos_model->insertarFoto($data_foto);
                }
            }   
            $data_pedido = array();
            //$data_pedido['RECIBE_CONFORME']=$nombrerecibe;  
            $data_pedido['ID_FOTOS']=$id_foto;  
            $data_pedido['FECHA_ENTREGA']=$this->load->helper('date');
            $data_prueba=array();
            $data_prueba['ENTREGADO']='S';
            $retiros = $this->pedidos_model->ingresarPedidoEntregado($data_prueba,$data_pedido,$id);
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE); 
            redirect('pedido/pedidos/mostrarFormularioRutaMotorizados', 'refresh'); 
              
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 


    }
    public function obtenerPacientesPruebas(){
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $cliente= trim($this->input->post('cliente'));
            $datos = $this->pedidos_model->obtenerNombrePacientePrueba($cliente);


             echo json_encode($datos); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }


    }

    public function obtenerPedidosOnLineCliente(){
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $cliente= trim($this->input->post('cliente'));
            $datos = $this->pedidos_model->obtenerPedidosOnLineCliente($cliente);


             echo json_encode($datos); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }

    }
    public function obtenerPruebasPorPaciente(){
        if ($this->session->userdata('loggeado')) 
        {
            $datos=array();
            $paciente= trim($this->input->post('paciente'));
            $datos = $this->pedidos_model->obtenerPruebasPorPaciente($paciente);


             echo json_encode($datos); 
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }


    } 
    public function obtenerValoresPrueba(){
         if ($this->session->userdata('loggeado'))
         {
            $USUARIO_ID=trim($this->input->post('USUARIO_ID'));
            $result=$this->usuarios_model->editarUsuario($USUARIO_ID);          
            echo json_encode($result);               
         }    
    }   
}