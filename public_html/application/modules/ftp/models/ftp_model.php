<?php if(!defined("BASEPATH")) exit ("No Direct Script Access");
/**
 * Users Model
 * 
 * @package CI
 * @subpackage Model
 * @author Azim Uddin <webcypherbd@gmail.com>
 */

class Ftp_Model extends CI_Model{
    
    /**
     * Loads model parent construct.
     * @return void Doesn't return anything.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Insert a host into the database.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function insert(){
        $data = (array) $this->input->post();
        unset($data["source"]);
        $data["Ftp_password"] = cipher($data["Ftp_password"]);
        if($this->db->insert('ftp', $data)){
            redirect("admincm/modules/ftp/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    
    /**
     * Updates the host row based on host id.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function update(){
        $data = (array) $this->input->post();
        $Ftp_ID = $data["source"];
        unset($data["source"]);
        $data["Ftp_password"] = cipher($data["Ftp_password"]);
        if($this->db->where("Ftp_ID", $Ftp_ID)->update("ftp", $data)){
            redirect("admincm/modules/ftp/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    
    /**
     * Loads the ftp rows for DataTable.
     * @param int $limit Number of rows to return
     * @param int $offset Number of rows to skip from bigging.
     * @param string $query Search string to match in query.
     * @return string Array of rows encoded in JASON string.
     */
    public function get_ftp($limit, $offset, $query){
        if(!empty($query)){
            $this->db->like('Ftp_name', $query);
            $this->db->or_like('Ftp_username', $query);
            $this->db->or_like('Ftp_host', $query);
        }
        $queryData = $this->db->limit($limit, $offset)->get('ftp');
        $data = array();
        foreach ($queryData->result() as $rows){
            $data[] = array($rows->Ftp_name,
                $rows->Ftp_host,
                $rows->Ftp_username,
                decipher($rows->Ftp_password),
                $this->load->view("ftp/ftp_action", $rows, TRUE)
                );
        }
        $output['draw'] = $this->input->get('draw');
        $output['recordsTotal'] = $this->db->count_all_results('ftp');
        $output['recordsFiltered'] = $queryData->num_rows();
        $output['data'] = $data;
        return json_encode($output);
    }
    
    /**
     * Gets a single host for update form.
     * @param int $Ftp_ID The id of the host to return.
     * @return array The array of the host row if exist.
     * @return false If no such host exist.
     */
    public function get_host($Ftp_ID){
        $data = $this->db->where("Ftp_ID", $Ftp_ID)->get("ftp");
        if($data->num_rows() == 1){
            return (array)$data->row();
        }else{
            return FALSE;
        }
    }
}