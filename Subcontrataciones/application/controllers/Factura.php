<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {
	function __construct() {
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->model('Factura_model');
			$this->load->model('Usuario_model');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio.');
			$this->form_validation->set_message('is_unique', 'El campo %s no es único.');
			$this->form_validation->set_message('integer', 'El campo %s debe ser elegido.');
			$this->form_validation->set_message('numeric', 'El campo %s debe ser numérico.');
	}
	
	public function index()
	{
		$datos['facturas'] = $this->Factura_model->get_facturas();
		$datos['media'] = $this->Factura_model->get_media_facturas();

		$this->load->view('list_factura', $datos);
	}

	function listar_factura()
	{
		if($this->input->post('concepto') != null) {
			$datos['facturas'] = $this->Factura_model->get_facturas_by_desc($this->input->post('concepto'));
		} elseif ($this->input->post('fecha') != null) {
			$datos['facturas'] = $this->Factura_model->get_facturas_by_fecha($this->input->post('fecha'));
		} else {
			$datos['facturas'] = $this->Factura_model->get_facturas();
		}

		$datos['media'] = $this->Factura_model->get_media_facturas();

		$this->load->view('list_factura', $datos);
	}

	function listar_test($id_factura)
	{
		$datos['tests'] = $this->Factura_model->get_tests_by_id_factura($id_factura);
		$datos['factura'] = $this->Factura_model->get_factura_by_id($id_factura);

		$this->load->view('list_test', $datos);
	}

	function nueva_factura()
	{
		$datos['usuarios'] = $this->Usuario_model->get_usuarios();
		$this->load->view('form_factura', $datos);
	}

	function crear_factura() {
		switch ($this->input->post('check')) {
			case 'true':
				$verificacion = 'true';
				break;
			case 'false':
				$verificacion = 'false';
				break;
			case 'null':
				$verificacion = 'NULL';
				break;
			default:
				$verificacion = 'NULL';
				break;
		}

		$nueva_factura = array(	'id_usuario'	=> $this->input->post('id_usuario'),
								'identificacion' => $this->input->post('identificacion'),
								'descripcion' => $this->input->post('descripcion'),
								'nombre_emisor' => $this->input->post('nombre_emisor'),
								'NIF_emisor' => $this->input->post('NIF_emisor'),
								'denom_social_emisor' => $this->input->post('denom_social_emisor'),
								'usuario' => $this->input->post('usuario'),
                            	'domicilio'		=> $this->input->post('domicilio'),
                            	'fecha_emision'	=> $this->input->post('fecha_emision'),
                            	'fecha_pago'	=> $this->input->post('fecha_pago'),
                            	'importe'    => $this->input->post('importe'),
                            	'impuesto' => $this->input->post('impuesto'),
                            	'importe_impuesto' => $this->input->post('importe_impuesto'),
                            	'esta_verificada' => $verificacion,
                            	'comentario' => $this->input->post('comentario')
                           	);   			

		$this->form_validation->set_rules('id_usuario', 'Usuario', 'integer');
		$this->form_validation->set_rules('identificacion', 'Identificación', 'required|is_unique[Factura.identificacion]');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
		$this->form_validation->set_rules('nombre_emisor', 'Nombre del Emisor', 'required');
		$this->form_validation->set_rules('NIF_emisor', 'NIF del Emisor', 'required');
		$this->form_validation->set_rules('denom_social_emisor', 'Denom. Social Emisor', 'required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
		$this->form_validation->set_rules('fecha_emision', 'Fecha Emisión', 'required');
		$this->form_validation->set_rules('fecha_pago', 'Fecha Pago', 'required');
		$this->form_validation->set_rules('importe', 'Importe', 'required|numeric');
		$this->form_validation->set_rules('impuesto', 'Impuesto', 'required|integer');
		$this->form_validation->set_rules('importe_impuesto', 'Importe + Impuesto', 'required');

		if($this->form_validation->run()){ // Comprueba si las validaciones son correctas
			$this->Factura_model->set_factura($nueva_factura);
            redirect('Factura/listar_factura', 'refresh');
        } else {
        	if($nueva_factura['esta_verificada'] == 'NULL') $nueva_factura['esta_verificada'] = null;
        	$datos['usuarios'] = $this->Usuario_model->get_usuarios();
			$datos['factura'] = $nueva_factura;
			$this->load->view('form_factura', $datos);
        }       	
	}

	function modificar_factura($id)
	{
		$datos['factura'] = $this->Factura_model->get_factura_by_id($id);
		$datos['usuarios'] = $this->Usuario_model->get_usuarios();
		$datos['id'] = $id;
		$this->load->view('form_factura', $datos);
	}

	function cambiar_factura($id)
	{
		switch ($this->input->post('check')) {
			case 'true':
				$verificacion = 'true';
				break;
			case 'false':
				$verificacion = 'false';
				break;
			case 'null':
				$verificacion = 'NULL';
				break;
			default:
				$verificacion = 'NULL';
				break;
		}

		$nueva_factura = array(	'id_usuario'	=> $this->input->post('id_usuario'),
								'identificacion' => $this->input->post('identificacion'),
								'descripcion' => $this->input->post('descripcion'),
								'nombre_emisor' => $this->input->post('nombre_emisor'),
								'NIF_emisor' => $this->input->post('NIF_emisor'),
								'denom_social_emisor' => $this->input->post('denom_social_emisor'),
								'usuario' => $this->input->post('usuario'),
                            	'domicilio'		=> $this->input->post('domicilio'),
                            	'fecha_emision'	=> $this->input->post('fecha_emision'),
                            	'fecha_pago'	=> $this->input->post('fecha_pago'),
                            	'importe'    => $this->input->post('importe'),
                            	'impuesto' => $this->input->post('impuesto'),
                            	'importe_impuesto' => $this->input->post('importe_impuesto'),
                            	'esta_verificada' => $verificacion,
                            	'comentario' => $this->input->post('comentario')
                           	);   			

		$this->form_validation->set_rules('id_usuario', 'Usuario', 'integer');
		$this->form_validation->set_rules('identificacion', 'Identificación', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
		$this->form_validation->set_rules('nombre_emisor', 'Nombre del Emisor', 'required');
		$this->form_validation->set_rules('NIF_emisor', 'NIF del Emisor', 'required');
		$this->form_validation->set_rules('denom_social_emisor', 'Denom. Social Emisor', 'required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
		$this->form_validation->set_rules('fecha_emision', 'Fecha Emisión', 'required');
		$this->form_validation->set_rules('fecha_pago', 'Fecha Pago', 'required');
		$this->form_validation->set_rules('importe', 'Importe', 'required|numeric');
		$this->form_validation->set_rules('impuesto', 'Impuesto', 'required|integer');
		$this->form_validation->set_rules('importe_impuesto', 'Importe + Impuesto', 'required');

		if($this->form_validation->run()){ // Comprueba si las validaciones son correctas
			$this->Factura_model->modificar_factura($nueva_factura, $id);
            redirect('Factura/listar_factura', 'refresh');
        } else {
        	if($nueva_factura['esta_verificada'] == 'NULL') $nueva_factura['esta_verificada'] = null;
        	$datos['usuarios'] = $this->Usuario_model->get_usuarios();
			$datos['factura'] = $nueva_factura;
			$datos['id'] = $id;
			$this->load->view('form_factura', $datos);
        }       	
	}

	function eliminar_factura($id)
	{
		$this->Factura_model->delete_files($id);
		$this->Factura_model->borrar_tests($id);
		$this->Factura_model->borrar_factura($id);

		redirect('Factura/listar_factura', 'refresh');
	}

	function insert_files($id)
	{
        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'assets/files';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf|doc|docx|jpg|png|jpeg|bmp';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_factura'] = $id;
                    $uploadData[$i]['ruta'] = "/assets/files/".$fileData['file_name'];
                }
            }
    
            if(!empty($uploadData)){
                $insert = $this->Factura_model->insert_files($uploadData);
                $statusMsg = $insert?'Los archivos se han subido correctamente.':'Ha ocurrido un problema, por favor inténtalo de nuevo.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }

		$datos['files'] = $this->Factura_model->get_archivos_factura($id);
		$datos['factura'] = $this->Factura_model->get_factura_by_id($id);

		$this->load->view('insert_files', $datos);
	}

	function prueba07($id)
	{
		$datos['id'] = $id;
		$this->load->view('prueba07', $datos);
	}

	function prueba09($id)
	{
		$datos['id'] = $id;
		$this->load->view('prueba09', $datos);
	}

	function prueba11($id)
	{
		$datos['id'] = $id;
		$this->load->view('prueba11', $datos);
	}

	function test($id_test, $id)
	{
		$datos['id_test'] = $id_test;
		$datos['id'] = $id;
		$this->load->view('form_test', $datos);
	}

	function check_prueba($id_test, $id)
	{
		switch ($this->input->post('check')) {
			case 'true':
				$verificacion = 1;
				break;
			case 'false':
				$verificacion = 0;
				break;
			case 'null':
				$verificacion = 'NULL';
				break;
			default:
				$verificacion = 'NULL';
				break;
		}

		$nuevo_test = array(	'id_factura'	=> $id,
								'id_test' => $id_test,
                            	'esta_verificado' => $verificacion,
                            	'comentario' => $this->input->post('comentario')
                           	);

        $this->Factura_model->set_test($nuevo_test);
        redirect('Factura/listar_factura', 'refresh');
	}

}