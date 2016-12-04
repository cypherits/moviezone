<?php if(!defined("BASEPATH")) exit ("No Direct Access");
/**
 * Genres Model
 * 
 * @package CI
 * @subpackage Model
 * @author Azim Uddin<webcypherbd@gmail.com>
 */
class Genres_Model extends CI_Model{
    /**
     * Loads model parent construct.
     * @return void Doesn't return anything.
     */
    public function __construct() {
        parent::__construct();
    }
    /**
     * Insert a genre into the database.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function insert(){
        $data = (array) $this->input->post();
        unset($data["source"]);
        if($this->db->insert('genres', $data)){
            redirect("admincm/modules/genres/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    /**
     * Updates the Genre row based on genre id.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function update(){
        $data = (array) $this->input->post();
        $Genres_ID = $data["source"];
        unset($data["source"]);
        if($this->db->where("Genres_ID", $Genres_ID)->update("genres", $data)){
            redirect("admincm/modules/genres/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    /**
     * Loads the genres rows for DataTable.
     * @param int $limit Number of rows to return
     * @param int $offset Number of rows to skip from bigging.
     * @param string $query Search string to match in query.
     * @return string Array of rows encoded in JASON string.
     */
    public function get_genres($limit, $offset, $query){
        if(!empty($query)){
            $this->db->like('Genres_name', $query);
            $this->db->or_like('Genres_alias', $query);
            $this->db->or_like('Genres_status', $query);
        }
        $queryData = $this->db->limit($limit, $offset)->get('genres');
        $data = array();
        foreach ($queryData->result() as $rows){
            $data[] = array($rows->Genres_name,
                $rows->Genres_alias,
                $rows->Genres_status,
                $this->load->view("genres/genres_action", $rows, TRUE)
                );
        }
        $output['draw'] = $this->input->get('draw');
        $output['recordsTotal'] = $this->db->count_all_results('genres');
        $output['recordsFiltered'] = $queryData->num_rows();
        $output['data'] = $data;
        return json_encode($output);
    }
    /**
     * Gets a single genre for update form.
     * @param int $Genres_ID The id of the genre to return.
     * @return array The array of the genre row if exist.
     * @return false If no such genre exist.
     */
    public function get_genre($Genres_ID){
        $data = $this->db->where("Genres_ID", $Genres_ID)->get("genres");
        if($data->num_rows() == 1){
            return (array)$data->row();
        }else{
            return FALSE;
        }
    }
}

