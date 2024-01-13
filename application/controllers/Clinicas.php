<?php
    class Clinicas extends CI_Controller
    {
        function __construct(){
            parent :: __construct();
            $this->load->model("Clinica");
        }
        //renderizacion de la vista hospitales.
        public function index(){//Mision de renderizar una pagina.
            $data["listadoClinicas"]=$this->Clinica->consultarTodo();
            $this->load->view('header');
            $this->load->view('clinicas/index',$data);//pasamos los datos
            $this->load->view('footer');

        }
        //eliminacion de hospitales recibiendo id
        public function borrar($id_rc){
            $this->Clinica->eliminar($id_rc);
            $this->session->set_flashdata("confirmacion","Clinica eliminada exitosamente");

            redirect("clinicas/index");
        }

        public function nuevo(){
          $this->load->view("header");
          $this->load->view("clinicas/nuevo");
          $this->load->view("footer");
        }
        //Capturando datos e insetando en Hospital
        public function guardarClinica(){
            $datosNuevosClinica=array("nombre_rc"=>$this->input->post("nombre_rc"),"ruc_rc"=>$this->input->post("ruc_rc"),"propietario_rc"=>$this->input->post("propietario_rc"),"fecha_fundacion_rc"=>$this->input->post("fecha_fundacion_rc"),"latitud_rc"=>$this->input->post("latitud_rc"),"longitud_rc"=>$this->input->post("longitud_rc"));
            $this->Clinica->insertar($datosNuevosClinica);
            $this->session->set_flashdata("confirmacion","Clinica guardado exitosamente");

            redirect('clinicas/index');
        }

    }
?>
