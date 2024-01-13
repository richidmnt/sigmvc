<?php
  class Hospital extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }
    //Insertar nuevos hospitales
    function insertar($datos){
        $respuesta=$this->db->insert("hospital",$datos);
        return $respuesta;
    }
    //consulta de datos
    function consultarTodo(){
        $hospitales=$this->db->get("hospital");
        if($hospitales->num_rows()>0){
            return $hospitales->result();
        }else{
            return false;
        }
    }
    //eliminacion de hospital por ID
    function eliminar($id){
        $this->db->where("id_hos",$id);
        return $this->db->delete("hospital");
    }
    
  }//Fin de la clase
?>