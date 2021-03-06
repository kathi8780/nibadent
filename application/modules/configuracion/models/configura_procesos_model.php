<?php

class configura_procesos_model extends CI_Model 
{

    public function __construct() {
        $this->load->database();
    }
	public function ActualizaProcesoTecnico($data, $id)
    {
        $this->db->where('tecnico_proceso.ID_TECNICO_PROCESO', $id);
        $this->db->update('tecnico_proceso', $data);

    }
   	//Trae las Pruebas Por Laboratorio
	public function PruebasPorLaboratorio($laboratorio)
    {
   
		 $select=array("pl.ID_PRUEBA_LABORATORIO","l.NOMBRE_LABORATORIO as laboratorio","tp.NOMBRE_PRUEBA prueba","pl.ESTADO as estado");
		 $this->db->select($select);
         $this->db->from("pruebas_laboratorio pl");
		 $this->db->join("laboratorio l",'l.ID_LABORATORIO=pl.ID_LABORATORIO');
		 $this->db->join("tipo_prueba tp",'tp.ID_TIPO_PRUEBA= pl.ID_TIPO_PRUEBA');
		 
		 if($laboratorio!= ""){
			 
             $this->db->where("pl.ID_LABORATORIO=", $laboratorio);  
         }
		 
         $consulta = $this->db->get();
         $resultado = $consulta->result_array();
         return $resultado;
				
    }
	//Trae los productos por Laboratorio
	public function ConfiguraProducto($laboratorio,$idproducto)
    {
   
		 $select=array("pl.ID_PRODUCTO_LABORATORIO","pl.PROD_COD_PROD as producto", "l.NOMBRE_LABORATORIO as laboratorio","pl.PRINCIPAL as principal","pl.COMISION as comision","pl.CONFIGURACION_INCENTIVO as insentivo","pl.ID_LABORATORIO as id_laboratorio");
		 $this->db->select($select);
         $this->db->from("producto_laboratorio as pl");
		 $this->db->join("laboratorio as l",'l.ID_LABORATORIO=pl.ID_LABORATORIO');
		 $this->db->order_by("l.ID_LABORATORIO ASC");
		 
		 if($laboratorio!= ""){
			 
             $this->db->where("pl.ID_LABORATORIO=", $laboratorio);  
         }
		 if($idproducto!=""){

		 	$this->db->where("pl.ID_PRODUCTO_LABORATORIO=", $idproducto); 

		 }
         $consulta = $this->db->get();
         $resultado = $consulta->result_array();
         return $resultado;
				
    }
    public function actualizarConfiguraProducto($data,$id){

    	$this->db->where('producto_laboratorio.ID_PRODUCTO_LABORATORIO', $id);
        $this->db->update('producto_laboratorio', $data);

    }

	//Trae los procesos por producto
	public function ProcesosPorProducto($producto,$procesos_producto)
    {
   
		 $select=array("p.ID_PROCESO_NOMBRE as pronom","p.ID_PRODUCTO_LABORATORIO as id","p.ID_PROCESOS","pl.PROD_COD_PROD as producto", "l.NOMBRE_LABORATORIO as laboratorio","pl.PRINCIPAL as principal","pl.COMISION as comision","p.ORDEN as orden", "pn.NOMBRE_PROCESO as proceso");
		 $this->db->select($select);
         $this->db->from("producto_laboratorio as pl");
		 $this->db->join("procesos as p",'pl.ID_PRODUCTO_LABORATORIO=p.ID_PRODUCTO_LABORATORIO');
		 $this->db->join("procesos_nombre as pn",'pn.ID_PROCESO_NOMBRE=p.ID_PROCESO_NOMBRE');
		 $this->db->join("laboratorio as l",'l.ID_LABORATORIO=pl.ID_LABORATORIO');
		 $this->db->order_by("pl.PROD_COD_PROD ASC,p.ORDEN ASC");
		 
		 if($producto!= ""){
			 
             $this->db->where("pl.PROD_COD_PROD=", $producto);  
         }
		 
		 if($procesos_producto!=""){
		 	$this->db->where("p.ID_PROCESOS",$procesos_producto);

		 }
         $consulta = $this->db->get();
         $resultado = $consulta->result_array();
         return $resultado;
				
    }
    public function actualizarProcesoPorProducto($data,$id){

    	$this->db->where('procesos.ID_PROCESOS', $id);
        $this->db->update('procesos', $data);

    }
	public function ObtenerProcesosPorTecnico($id)
    {
 
		 $this->db->select("*");
         $this->db->from("tecnico_proceso T0");
		 
		 //if($id!= ""){
			 
             $this->db->where("T0.ID_TECNICO_PROCESO=", $id);  
         //}
		 
         $consulta = $this->db->get();
         $resultado = $consulta->result_array();
         return $resultado;
				
    }
	//Trae los procesos por tecnico
	public function ProcesosPorTecnico($tecnico)
    {
   
		 $select=array("T0.ACTIVO","T0.ID_TECNICO_PROCESO","T1.CEDULA as cedula","CONCAT(T1.APELLIDO_TECNICO,T1.NOMBRE_TECNICO)AS tecnico", "T1.DIRECCION as direccion","T2.NOMBRE_PROCESO as proceso","T3.NOMBRE_CATEGORIA as categoria", "T3.SIGLAS_CATEGORIA as siglas");
		 $this->db->select($select);
         $this->db->from("tecnico_proceso T0");
		 $this->db->join("tecnico T1",'T0.ID_TECNICO=T1.ID_TECNICO');
		 $this->db->join("procesos_nombre T2",'T0.ID_PROCESO_NOMBRE=T2.ID_PROCESO_NOMBRE');
		 $this->db->join("categoria T3",'T0.ID_CATEGORIA=T3.ID_CATEGORIA');
		 $this->db->order_by("T1.ID_TECNICO","DESC");
		 
		 if($tecnico!= ""){
			 
             $this->db->where("T0.ID_TECNICO=", $tecnico);  
         }
		 
         $consulta = $this->db->get();
         $resultado = $consulta->result_array();
         return $resultado;
				
    }
	public function obtenerProductoSap()
    {
		
		$array=array("pl.PROD_COD_PROD");
		$this->db->select($array);
		$this->db->from("producto_laboratorio AS pl");
		$this->db->group_by("pl.PROD_COD_PROD");
		$this->db->order_by("pl.PROD_COD_PROD","ASC");
								
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerProducto()
    {
		
		$array=array("pl.ID_PRODUCTO_LABORATORIO","pl.PROD_COD_PROD");
		$this->db->select($array);
		$this->db->from("producto_laboratorio AS pl");
		$this->db->group_by("pl.PROD_COD_PROD");
		$this->db->order_by("pl.PROD_COD_PROD","ASC");
								
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerTecnico()
    {
		
		$array=array("t.ID_TECNICO","CONCAT_WS(' ',t.APELLIDO_TECNICO,t.NOMBRE_TECNICO) AS TECNICO");
		$this->db->select($array);
		$this->db->from("tecnico AS t");
		$this->db->order_by("t.APELLIDO_TECNICO","ASC");
						
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerProcesos()
    {
           	
		$array=array("pn.ID_PROCESO_NOMBRE", "pn.NOMBRE_PROCESO");
		$this->db->select($array);
		$this->db->from("procesos_nombre AS pn");
		$this->db->order_by("pn.NOMBRE_PROCESO","ASC");
						
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerPruebas()
    {
           	
		$array=array("p.ID_TIPO_PRUEBA","p.NOMBRE_PRUEBA");
		$this->db->select($array);
		$this->db->from("tipo_prueba AS p");
		$this->db->order_by("p.NOMBRE_PRUEBA","ASC");
		
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerLaboratorio()
    {
           	
		$array=array("l.ID_LABORATORIO", "l.NOMBRE_LABORATORIO");
		$this->db->select($array);
		$this->db->from("laboratorio AS l");
		$this->db->order_by("l.NOMBRE_LABORATORIO","ASC");
		
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
				
    }
	public function obtenerCategoria()
    {	
		$array=array("c.ID_CATEGORIA","c.SIGLAS_CATEGORIA");
		$this->db->select($array);
		$this->db->from("categoria AS c");
		$this->db->order_by("c.SIGLAS_CATEGORIA","ASC");
						
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;				
    }
	public function EstadoProcesosPorTecnico($data,$id)
	{
		$this->db->query("UPDATE tecnico_proceso SET activo=if(ACTIVO='S','N','S') WHERE ID_TECNICO_PROCESO=$id");

	}

	public function actualizarEstadoProcesoPorLaboratorio($id){
		$this->db->query("UPDATE pruebas_laboratorio SET ESTADO=if(ESTADO='S','N','S') WHERE ID_PRUEBA_LABORATORIO=$id");

	}
	public function InsertarConfiguraProducto($data)
    {
        $this->db->insert('producto_laboratorio', $data);
        return $this->db->insert_id();
    }
	public function InsertarProductoPorLaboratorio($data)
    {
        $this->db->insert('procesos', $data);
        return $this->db->insert_id();
    }
	public function InsertarPruebasPorLaboratorio($data)
    {
        $this->db->insert('pruebas_laboratorio', $data);
        return $this->db->insert_id();
    }	
	public function InsertarProcesosPorTecnico($data)
    {
        $this->db->insert('tecnico_proceso', $data);
        return $this->db->insert_id();
    }
	public function EliminarConfiguraProducto($id)
    { 
		$query =$this->db->query("SELECT COUNT(*)cant FROM procesos  a where a.ID_PRODUCTO_LABORATORIO='$id'");
		
		if ($query->num_rows() > 0)
		{
				$row = $query->row_array();
				
				if($row['cant']==0){
					$this->db->where('ID_PRODUCTO_LABORATORIO', $id);
					$this->db->delete('producto_laboratorio');
					$resultado='Proceso Eliminado con Exito';
				}else{
					$resultado='Producto con Procesos Asociados no puede ser Eliminado';
				}
		}
		
		return $resultado;
		
    }
	public function EliminarPruebasPorLaboratorio($id)
    {
        $this->db->where('ID_PRUEBA_LABORATORIO', $id);
        $this->db->delete('pruebas_laboratorio'); 
    }
	public function EliminarProcesosPorTecnico($id)
    {
        $this->db->where('ID_TECNICO_PROCESO', $id);
        $this->db->delete('tecnico_proceso'); 
    }
	public function EliminarProcesosPorProducto($id)
    {
        $query =$this->db->query("SELECT COUNT(*)cant FROM proceso_pedido a where a.ID_PROCESOS='$id'");
		
		if ($query->num_rows() > 0)
		{
				$row = $query->row_array();
				
				if($row['cant']==0){
					$this->db->where('ID_PROCESOS', $id);
					$this->db->delete('procesos');
					$resultado='Proceso Eliminado con Exito';
				}else{
					$resultado='Proceso con Movimientos en Pedidos no puede ser Eliminado';
				}
		}
		return $resultado;	
    }
}