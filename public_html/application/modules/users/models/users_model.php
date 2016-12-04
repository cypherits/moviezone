<?php if(!defined("BASEPATH")) exit ("No Direct Script Access");
/**
 * Users Model
 * 
 * @package CI
 * @subpackage Model
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Users_Model extends CI_Model{
    
    /**
     * Loads model parent construct.
     * @return void Doesn't return anything.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Insert a user into the database.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function insert(){
        $data = (array) $this->input->post();
        unset($data["source"]);
        $data["Users_passwords"] = md5($data["Users_passwords"]);
        if($this->db->insert('users', $data)){
            redirect("admincm/modules/users/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    
    /**
     * Updates the users row based on user id.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function update(){
        $data = (array) $this->input->post();
        $Users_ID = $data["source"];
        unset($data["source"]);
        if(!empty($data["Users_passwords"])){
            $data["Users_passwords"] = md5($data["Users_passwords"]);
        }else{
            unset($data["Users_passwords"]);
        }
        if($this->db->where("Users_ID", $Users_ID)->update("Users", $data)){
            redirect("admincm/modules/users/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }

    /**
     * Loads the users rows for DataTable.
     * @param int $limit Number of rows to return
     * @param int $offset Number of rows to skip from bigging.
     * @param string $query Search string to match in query.
     * @return string Array of rows encoded in JASON string.
     */
    public function get_users($limit, $offset, $query){
        if(!empty($query)){
            $this->db->like('Users_name', $query);
            $this->db->or_like('Users_username', $query);
            $this->db->or_like('Users_email', $query);
            $this->db->or_like('Users_role', $query);
            $this->db->or_like('Users_status', $query);
        }
        $queryData = $this->db->limit($limit, $offset)->get('users');
        $data = array();
        foreach ($queryData->result() as $rows){
            $data[] = array($rows->Users_name,
                $rows->Users_username,
                $rows->Users_email,
                $rows->Users_role,
                $rows->Users_status,
                $this->load->view("users/users_action", $rows, TRUE)
                );
        }
        $output['draw'] = $this->input->get('draw');
        $output['recordsTotal'] = $this->db->count_all_results('users');
        $output['recordsFiltered'] = $queryData->num_rows();
        $output['data'] = $data;
        return json_encode($output);
    }
    
    /**
     * Gets a single user for update form.
     * @param int $Users_ID The id of the user to return.
     * @return array The array of the users row if exist.
     * @return false If no such user exist.
     */
    public function get_user($Users_ID){
        $data = $this->db->where("Users_ID", $Users_ID)->get("Users");
        if($data->num_rows() == 1){
            return (array)$data->row();
        }else{
            return FALSE;
        }
    }
}
