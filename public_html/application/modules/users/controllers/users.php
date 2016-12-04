<?php if(!defined("BASEPATH")) exit ("No Direct Script Access");

/**
 * Users
 * 
 * @package CI
 * @subpackage Controller
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Users extends MX_Controller{
    
    /**
     * Loads parent and other required components.
     * @return void This function returns nothing.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('users/users_model', 'usm', true);
    }
    
    /**
     * Loads a form to add new users.
     * @return void Prints the form. Doesn't return anything.
     */
    public function admin_add(){
        $content = $this->load->view("users/users_form","",true);
        echo Modules::run("template/load_admin", "Add New User", $content);
    }
    
    /**
     * Loads Edit Form.
     * @param int $Users_ID The id of which user to edit.
     * @return void Prints the form with value. Doesn't return anything.
     */
    public function admin_edit($Users_ID){
        if(!empty($Users_ID)){
            $data = $this->usm->get_user($Users_ID);
            if($data != FALSE){
                $content = $this->load->view("users/users_form", $data, TRUE);
                echo Modules::run("template/load_admin", "Edit User".$data["Users_name"], $content);
            }else{
                echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
            }
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Didn't Understand Your Request! Please Try Again");
        }
    }
    
    /**
     * Process the submitted forms.
     * @return void Processes data and redirects to view. Doesn't return anything.
     */
    public function admin_submit(){
        if($this->input->post('source') === 'insert'){
            $this->usm->insert();
        }else if(is_numeric($this->input->post('source'))){
            $this->usm->update();
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Didn't Understand Your Request! Please Try Again from controller");
        }
    }
    
    /**
     * Loads users detail and available actions.
     * @return void Loads DataTable structure. Doesn't return anything.
     */
    public function admin_view(){
        echo Modules::run('template/load_admin', 'View Users', $this->load->view('users/users_view', '', TRUE),'','',array('themes/admin/vendor/datatable/jquery.dataTables.min.js', 'themes/admin/vendor/datatable/dataTables.bootstrap.js'));
    }
    
    /**
     * Process DataTable Ajax requests.
     * @return void Pushes JASON encoded data through Ajax. Doesn't return anything.
     */
    public function admin_get_users(){
        $limit = $this->input->get('length');
        $offset = $this->input->get('start');
        $search = $this->input->get('search')['value'];
        echo $this->usm->get_users($limit, $offset, $search);
    }
    
    /**
     * Switch users status to active/inactive.
     * @param string $switchTo Either active or inactive. Defines what user's status should change into.
     * @param int $Users_ID The users id of which user's status would be flipped.
     * @return void Redirects to view after switching the status. Doesn't return anything.
     */
    public function admin_switch_status($switchTo, $Users_ID){
        if(!empty($switchTo) && !empty($Users_ID)){
            $this->db->where("Users_ID", $Users_ID)->update("Users", array("Users_status" => $switchTo));
        }
        redirect("admincm/modules/users/view");
    }
    
    /**
     * Deletes data from database.
     * @param int $Users_ID The id of the which user would be deleted.
     * @return void Redirects to view after deleting the user. Doesn't return anything.
     */
    public function admin_delete($Users_ID){
        if(!empty($Users_ID)){
            $this->db->where("Users_ID", $Users_ID)->delete("users");
        }
        redirect("admincm/modules/users/view");
    }
    
    /**
     *Username and email validation checkup.
     * @return void Push valid or invalid after check in database. Doesn't return anything.
     */
    public function admin_checkup(){
        if($this->input->post("username") !== null){
            $this->db->where("Users_username", $this->input->post("username"));
        }else if($this->input->post("email") !== null){
            $this->db->where("Users_email", $this->input->post("email"));
        }else{
            echo "invalid";
            die();
        }
        $data = $this->db->get("Users");
        if($data->num_rows() == 0){
            echo "valid";
        }else{
            echo "invalid";
        }
    }
}