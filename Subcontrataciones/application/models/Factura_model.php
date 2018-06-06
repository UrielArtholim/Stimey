<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Factura_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

    //// FACTURAS

	function get_facturas ()
	{
		return $this->db->query("SELECT * FROM Factura")->result_array();
	}

	function get_factura_by_id ($id)
	{
		return $this->db->query("SELECT * FROM Factura WHERE id = $id")->result_array()[0];
	}

	function get_facturas_by_desc ($descripcion)
	{
		return $this->db->query("SELECT * FROM Factura WHERE descripcion LIKE '%$descripcion%'")->result_array();
	}

	function get_facturas_by_fecha ($fecha)
	{
		return $this->db->query("SELECT * FROM Factura WHERE fecha_emision BETWEEN '".$fecha."0101' AND '".$fecha."1231'")->result_array();
	}

	function get_media_facturas()
	{
		return $this->db->query("SELECT avg(importe_impuesto) FROM Factura")->result_array()[0]['avg(importe_impuesto)'];
	}

	function set_factura ($nueva_factura)
    {
        $this->db->query("INSERT INTO Factura(id_usuario, identificacion, descripcion, nombre_emisor, NIF_emisor, denom_social_emisor, usuario, domicilio, fecha_emision, fecha_pago, importe, impuesto, importe_impuesto, esta_verificada, comentario) VALUES (
        	$nueva_factura[id_usuario], \"$nueva_factura[identificacion]\", \"$nueva_factura[descripcion]\", \"$nueva_factura[nombre_emisor]\", \"$nueva_factura[NIF_emisor]\", \"$nueva_factura[denom_social_emisor]\", \"$nueva_factura[usuario]\", \"$nueva_factura[domicilio]\", \"$nueva_factura[fecha_emision]\", \"$nueva_factura[fecha_pago]\", $nueva_factura[importe], $nueva_factura[impuesto], $nueva_factura[importe_impuesto], $nueva_factura[esta_verificada], \"$nueva_factura[comentario]\")");
    }

    function modificar_factura($nuevo_cambio, $id)
    {
        $this->db->query("UPDATE Factura SET id_usuario = $nuevo_cambio[id_usuario], identificacion = \"$nuevo_cambio[identificacion]\", descripcion = \"$nuevo_cambio[descripcion]\", nombre_emisor = \"$nuevo_cambio[nombre_emisor]\", NIF_emisor = \"$nuevo_cambio[NIF_emisor]\", denom_social_emisor = \"$nuevo_cambio[denom_social_emisor]\", usuario = \"$nuevo_cambio[usuario]\", domicilio = \"$nuevo_cambio[domicilio]\", fecha_emision = \"$nuevo_cambio[fecha_emision]\", fecha_pago = \"$nuevo_cambio[fecha_pago]\", importe = $nuevo_cambio[importe], impuesto = $nuevo_cambio[impuesto], importe_impuesto = $nuevo_cambio[importe_impuesto], esta_verificada = $nuevo_cambio[esta_verificada], comentario = \"$nuevo_cambio[comentario]\" WHERE id = $id");
    }

    function borrar_factura($id)
    {
    	$this->db->query("DELETE FROM Factura WHERE id = $id");
    }

    //// FILES

    function get_archivos_factura($id)
    {
        return $this->db->query("SELECT * 
                                FROM Factura, Archivo
                                WHERE Factura.id = Archivo.id_factura
                                AND Factura.id = $id")->result_array();
    }

    function insert_files ($data = array())
    {    
        $insert = $this->db->insert_batch('Archivo', $data);
        return $insert?true:false;
    }

    function delete_files ($id_factura)
    {    
        $archivos = $this->get_archivos_factura($id_factura);
        foreach ($archivos as $archivo) {
        	unlink(".".$archivo['ruta']);
        }
        
        $this->db->query("DELETE FROM Archivo WHERE id_factura = $id_factura");
    }

    //// TESTS

    function get_tests_by_id_factura ($id)
    {
        return $this->db->query("SELECT * FROM Test WHERE id_factura = $id")->result_array();
    }

    function set_test ($nuevo_test)
    {
    	$this->db->query("INSERT INTO Test(id_factura, id_test, esta_verificado, comentario) VALUES (
    		$nuevo_test[id_factura],
    		\"$nuevo_test[id_test]\",
    		$nuevo_test[esta_verificado],
    		\"$nuevo_test[comentario]\")");
    }

    function borrar_tests ($id)
    {
        $this->db->query("DELETE FROM Test WHERE id_factura = $id");
    }

}