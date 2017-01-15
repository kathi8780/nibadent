<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
    }
	public function eliminarConfiguraUsuario(){
		
		if ($this->session->userdata('loggeado')) 
        {			
            $USUARIO_ID = trim($this->input->post('USUARIO_ID'));
			$resul=$this->usuarios_model->eliminarConfiguraUsuario($USUARIO_ID);
			echo json_encode($resul);    
                         
        }
        else 
        {
          redirect('admin/login', 'refresh');
        }	
	}
	public function editarUsuario(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$USUARIO_ID=trim($this->input->post('USUARIO_ID'));
			$result=$this->usuarios_model->editarUsuario($USUARIO_ID);			
			echo json_encode($result);   			 
		 }
		
	}
	public function ActualizaUsuario(){

        if ($this->session->userdata('loggeado')) 
        {      
            $USUARIO_ID=trim($this->input->post('USUARIO_ID'));
			
            $data = array();		
			$data['USUARIO_ID']=trim($this->input->post('USUARIO_ID')); 
			$data['USUARIO_NOMBRE']=trim($this->input->post('USUARIO_NOMBRE')); 
			$data['USUARIO_APELLIDO']=trim($this->input->post('USUARIO_APELLIDO')); 
			$data['USUARIO_ACTIVO']=trim($this->input->post('USUARIO_ACTIVO')); 
			$data['USUARIO_FECHA_REGISTRO']=trim($this->input->post('USUARIO_FECHA_REGISTRO')); 
			$data['USUARIO_MOVIL']=trim($this->input->post('USUARIO_MOVIL')); 
			$data['USUARIO_TELEFONO']=trim($this->input->post('USUARIO_TELEFONO')); 
			$data['USUARIO_EMAIL']=trim($this->input->post('USUARIO_EMAIL')); 
			$data['USUARIO_FECHA_CADUCA']=trim($this->input->post('USUARIO_FECHA_CADUCA')); 
			$data['USUARIO_TIEMPO_SESION']=trim($this->input->post('USUARIO_TIEMPO_SESION')); 
			$data['USUARIO_USER']=trim($this->input->post('USUARIO_USER'));
			
            $actualiza=$this->usuarios_model->ActualizaUsuario($data,$USUARIO_ID);
			echo json_encode($actualiza);
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }
	public function EstadoConfiguraUsuario(){
		
		if ($this->session->userdata('loggeado'))
		{	
			$USUARIO_ID = trim($this->input->post('USUARIO_ID'));			
			$resultado = $this->usuarios_model->EstadoConfiguraUsuario($USUARIO_ID);
            echo json_encode($resultado);  	
		}	
	}
    public function MostrarFormularioUsuario(){
		
		 if ($this->session->userdata('loggeado'))
		 {
			$datos=array();
			$datos['perfil']  = $this->usuarios_model->obtenerPerfil();
			$datos['usuarios']= $this->usuarios_model->obtenerUsuarios();
			
						
			$this->load->view('templates/header');
            $this->load->view('GestionUsuarios', $datos);
            $this->load->view('templates/footer');
						 
		 }
		
	}
    public function insertarUsuario(){

    	if ($this->session->userdata('loggeado')) 
        {      
			
            $data = array();		
			$data['PERFIL_ID']=trim($this->input->post('PERFIL_ID')); 
			$data['USUARIO_NOMBRE']=trim($this->input->post('USUARIO_NOMBRE')); 
			$data['USUARIO_APELLIDO']=trim($this->input->post('USUARIO_APELLIDO')); 
			$data['USUARIO_ACTIVO']=trim($this->input->post('USUARIO_ACTIVO')); 
			$data['USUARIO_FECHA_REGISTRO']=trim($this->input->post('USUARIO_FECHA_REGISTRO')); 
			$data['USUARIO_MOVIL']=trim($this->input->post('USUARIO_MOVIL')); 
			$data['USUARIO_TELEFONO']=trim($this->input->post('USUARIO_TELEFONO')); 
			$data['USUARIO_EMAIL']=trim($this->input->post('USUARIO_EMAIL')); 
			$data['USUARIO_FECHA_CADUCA']=trim($this->input->post('USUARIO_FECHA_CADUCA')); 
			$data['USUARIO_TIEMPO_SESION']=trim($this->input->post('USUARIO_TIEMPO_SESION')); 
			$data['USUARIO_USER']=trim($this->input->post('USUARIO_USER')); 
			$USUARIO_USER=trim($this->input->post('USUARIO_USER'));
			
            $result = $this->usuarios_model->insertarUsuario($data,$USUARIO_USER);

            echo json_encode($result);   
        }
        else 
        {
          redirect('admin/login', 'refresh');
        } 
    }
}
