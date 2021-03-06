<?php
class configura_procesos extends MX_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('configura_procesos_model');
    }
	public function ActualizaProcesoTecnico(){

        if ($this->session->userdata('loggeado')) 
        {      
            $id=trim($this->input->post('ID_TECNICO_PROCESO'));
            $data = array();
            $data['ID_CATEGORIA']=trim($this->input->post('ID_CATEGORIA'));
            $actualiza=$this->configura_procesos_model->ActualizaProcesoTecnico($data,$id);
			echo json_encode($actualiza);
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }
	public function EstadoProcesosPorTecnico(){
		
		if ($this->session->userdata('loggeado'))
		{	
			$id = trim($this->input->post('id'));
			$data['ACTIVO'] =$id;
			
			$resultado = $this->configura_procesos_model->EstadoProcesosPorTecnico($data,$id);
            echo json_encode($resultado);  	
		}	
	}

	public function estadoProcesosPorLaboratorio(){

		if ($this->session->userdata('loggeado'))
		{	
			$id = trim($this->input->post('id'));
			$data['ESTADO'] =$id;
			
			$resultado = $this->configura_procesos_model->actualizarEstadoProcesoPorLaboratorio($id);
            echo json_encode($resultado);  	
		}	

	}
	public function ConfiguraProducto(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$datos=array();
			$datos['producto']    = $this->configura_procesos_model->obtenerProductoSap();
			$datos['laboratorio']= $this->configura_procesos_model->obtenerLaboratorio();
						
			$this->load->view('templates/header');
            $this->load->view('ConfiguraProducto', $datos);
            $this->load->view('templates/footer');
						 
		 }
		
	}
	public function PruebasPorLaboratorio(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$datos=array();
			
			$datos['pruebas']    = $this->configura_procesos_model->obtenerPruebas();
			$datos['laboratorio']= $this->configura_procesos_model->obtenerLaboratorio();
						
			$this->load->view('templates/header');
            $this->load->view('PruebasPorLaboratorio', $datos);
            $this->load->view('templates/footer');
						 
		 }	
	}
	public function ProcesosPorProducto(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$datos=array();
			$datos['producto']    = $this->configura_procesos_model->obtenerProducto();
			$datos['proceso']    = $this->configura_procesos_model->obtenerProcesos();
			$datos['laboratorio']= $this->configura_procesos_model->obtenerLaboratorio();
						
			$this->load->view('templates/header');
            $this->load->view('ProcesosPorProducto', $datos);
            $this->load->view('templates/footer');
						 
		 }
		
	}
	public function BuscarConfiguraProducto(){
		
		if ($this->session->userdata('loggeado')) 
        {
        	$producto="";
            $laboratorio = trim($this->input->post('laboratorio'));
			$resultado = $datos['producto_laboratorio']  = $this->configura_procesos_model->ConfiguraProducto($laboratorio,$producto);
            echo json_encode($resultado);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
		
	}
// metodo para recuperar datos de un solo registro(EDITAR)
	public function obtenerConfiguraProductoUnico(){

		if ($this->session->userdata('loggeado')) 
        {
        	$laboratorio="";
            $producto = trim($this->input->post('id_producto'));
			$datos= $this->configura_procesos_model->ConfiguraProducto($laboratorio,$producto);
            echo json_encode($datos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
	}

	public function editarConfiguraProducto(){
		if($this->session->userdata('loggeado')) 
        {
            $id=trim($this->input->post('id_producto'));
            $producto   = trim($this->input->post('producto'));
			$laboratorio= trim($this->input->post('laboratorio'));
			$comision   = trim($this->input->post('comision'));
			$principal = trim($this->input->post('principal'));
			$insentivo  = trim($this->input->post('insentivo'));
			
			//Inserto Producto Por Laboratorio 
            $data = array();

            $data['PROD_COD_PROD']  =$producto;
            $data['ID_LABORATORIO'] =$laboratorio;
			$data['COMISION']       =$comision;
			$data['CONFIGURACION_INCENTIVO'] =$insentivo;
			$data['PRINCIPAL']      =$principal;
						
            $actualizar=$this->configura_procesos_model->actualizarConfiguraProducto($data,$id);
			echo json_encode($actualizar);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }

	}

	public function BuscarPruebasPorLaboratorio(){
		
		if ($this->session->userdata('loggeado')) 
        {
            $laboratorio = trim($this->input->post('laboratorio'));
			$resultado = $datos['pruebas_laboratorio']  = $this->configura_procesos_model->PruebasPorLaboratorio($laboratorio);
            echo json_encode($resultado);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
		
	}

	public function buscarEstadoPruebasPorLaboratorio(){

		if ($this->session->userdata('loggeado')) 
        {
            $laboratorio = trim($this->input->post('laboratorio'));
			$resultado = $datos['pruebas_laboratorio']  = $this->configura_procesos_model->PruebasPorLaboratorio($laboratorio);
            echo json_encode($resultado);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }

	}
	public function BuscarProcesosPorProducto(){
		
		if ($this->session->userdata('loggeado')) 
        {
            $producto = trim($this->input->post('producto'));
            $procesos_producto="";
			$resultado = $datos['procesos_producto']  = $this->configura_procesos_model->ProcesosPorProducto($producto,$procesos_producto);
            echo json_encode($resultado);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
		
	}

	public function buscarProcesosPorProductoUnico(){
		if ($this->session->userdata('loggeado')) 
        {
            $producto = "";
            $procesos_producto=trim($this->input->post('id_procesos'));
			$datos= $this->configura_procesos_model->ProcesosPorProducto($producto,$procesos_producto);
            echo json_encode($datos);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
	}

	public function editarProcesoPorProducto(){
		
		if($this->session->userdata('loggeado')) 
        {
            $id=trim($this->input->post('id_procesos'));
            $producto   = trim($this->input->post('producto'));
			$proceso= trim($this->input->post('proceso'));
			$comision   = trim($this->input->post('comision'));
			$orden = trim($this->input->post('orden'));
			
			//Inserto Producto Por Laboratorio 
            $data = array();

            $data['ID_PRODUCTO_LABORATORIO']=$producto;
            $data['ID_PROCESO_NOMBRE']      =$proceso;
			$data['COMISION_PROCESO']       =$comision;
			$data['ORDEN']                  =$orden;
						
            $actualizar=$this->configura_procesos_model->actualizarProcesoPorProducto($data,$id);
			echo json_encode($actualizar);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }

	}
	public function ProcesosPorTecnico(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$datos=array();
			$datos['tecnico']   = $this->configura_procesos_model->obtenerTecnico();
			$datos['proceso']   = $this->configura_procesos_model->obtenerProcesos();
			$datos['categoria'] = $this->configura_procesos_model->obtenerCategoria();
			
			
			$this->load->view('templates/header');
            $this->load->view('ProcesosPorTecnico', $datos);
            $this->load->view('templates/footer');
						 
		 }
		
	}
	public function ObtenerProcesosPorTecnico(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$id = trim($this->input->post('ID_TECNICO_PROCESO'));
			$datos=array();
			//$datos['tecnico']   = $this->configura_procesos_model->obtenerTecnico();
			//$datos['proceso']   = $this->configura_procesos_model->obtenerProcesos();
			//$datos['categoria'] = $this->configura_procesos_model->obtenerCategoria();
			$datos['procesos_tecnicos']  = $this->configura_procesos_model->ObtenerProcesosPorTecnico($id);
			
            echo json_encode($datos);             
						 
		 }
		
	}
	public function BuscarProcesosPorTecnico(){
		
		if ($this->session->userdata('loggeado')) 
        {
            $tecnico = trim($this->input->post('tecnico'));
			$resultado = $datos['procesos_tecnicos']  = $this->configura_procesos_model->ProcesosPorTecnico($tecnico);
            echo json_encode($resultado);             
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }
		
	}
	public function InsertarConfiguraProducto(){
		
		if($this->session->userdata('loggeado')) 
        {
            $producto   = trim($this->input->post('producto'));
			$laboratorio= trim($this->input->post('laboratorio'));
			$comision   = trim($this->input->post('comision'));
			$pprincipal = trim($this->input->post('pprincipal'));
			$insentivo  = trim($this->input->post('insentivo'));
			
			//Inserto Producto Por Laboratorio 
            $data = array();

            $data['PROD_COD_PROD']  =$producto;
            $data['ID_LABORATORIO'] =$laboratorio;
			$data['COMISION']       =$comision;
			$data['CONFIGURACION_INCENTIVO'] =$comision;
			$data['PRINCIPAL']      =$pprincipal;
						
            $this->configura_procesos_model->InsertarConfiguraProducto($data);
			echo json_encode($data);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function InsertarProductoPorLaboratorio(){
		
		if($this->session->userdata('loggeado')) 
        {
            $producto   = trim($this->input->post('producto'));
			$IDlaboratorio= trim($this->input->post('IDlaboratorio'));
			$comision   = trim($this->input->post('comision'));
			$proceso    = trim($this->input->post('proceso'));
			$orden      = trim($this->input->post('orden'));
			
			//Inserto Producto Por Laboratorio 
            $data = array();

            $data['ID_PRODUCTO_LABORATORIO']=$IDlaboratorio;
            $data['ID_PROCESO_NOMBRE']      =$proceso;
			$data['COMISION_PROCESO']       =$comision;
			$data['ORDEN']                  =$orden;
						
            $this->configura_procesos_model->InsertarProductoPorLaboratorio($data);
			echo json_encode($data);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function InsertarPruebasPorLaboratorio(){
		
		if ($this->session->userdata('loggeado')) 
        {
            $prueba      = trim($this->input->post('prueba'));
			$laboratorio = trim($this->input->post('laboratorio'));
			
			//Inserto Proceso Por Tecnico 
            $data = array();
            $data['ID_TIPO_PRUEBA']=$prueba;
            $data['ID_LABORATORIO']=$laboratorio;
			
            $this->configura_procesos_model->InsertarPruebasPorLaboratorio($data);
			echo json_encode($data);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function InsertarProcesosPorTecnico(){
		
		if ($this->session->userdata('loggeado')) 
        {
            $tecnico   = trim($this->input->post('tecnico'));
			$proceso   = trim($this->input->post('proceso'));
			$categoria = trim($this->input->post('categoria'));
			
			//Inserto Proceso Por Tecnico 
            $data = array();
            $data['ID_TECNICO']=$tecnico;
            $data['ID_PROCESO_NOMBRE']=$proceso;
            $data['ID_CATEGORIA']=$categoria;
			
            $this->configura_procesos_model->InsertarProcesosPorTecnico($data);
			echo json_encode($data);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function EliminarConfiguraProducto(){
		
		if ($this->session->userdata('loggeado')) 
        {			
            $id = trim($this->input->post('id'));
			$resultado=$this->configura_procesos_model->EliminarConfiguraProducto($id);
			echo json_encode($resultado);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function EliminarPruebasPorLaboratorio(){
		
		if ($this->session->userdata('loggeado')) 
        {			
            $id = trim($this->input->post('id'));
			$this->configura_procesos_model->EliminarPruebasPorLaboratorio($id);
			echo json_encode($id);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function EliminarProcesosPorTecnico(){
		
		if ($this->session->userdata('loggeado')) 
        {			
            $id = trim($this->input->post('id'));
			$this->configura_procesos_model->EliminarProcesosPorTecnico($id);
			echo json_encode($id);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function EliminarProcesosPorProducto(){
		
		if ($this->session->userdata('loggeado')) 
        {			
            $id = trim($this->input->post('id'));
			$resultado=$this->configura_procesos_model->EliminarProcesosPorProducto($id);
			echo json_encode($resultado);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
}  