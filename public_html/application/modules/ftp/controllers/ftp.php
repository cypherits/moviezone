<?php if(!defined("BASEPATH")) exit("No Direct Script Access");

/**
 * FTP
 * 
 * @package CI
 * @subpackage Controller
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Ftp extends MX_Controller{
    
    /**
     * Loads parent and other required components.
     * @return void This function returns nothing.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("ftp/ftp_model", "ftpm");
    }
    
    /**
     * Loads a form to add new FTP host.
     * @return void Prints the form. Doesn't return anything.
     */
    public function admin_add(){
        $content = $this->load->view("ftp/ftp_form","",true);
        echo Modules::run("template/load_admin", "Add New Host", $content);
    }
    
    /**
     * Loads Edit Form.
     * @param int $Ftp_ID The id of which user to edit.
     * @return void Prints the form with value. Doesn't return anything.
     */
    public function admin_edit($Ftp_ID){
        if(!empty($Ftp_ID)){
            $data = $this->ftpm->get_host($Ftp_ID);
            if($data != FALSE){
                $data["Ftp_password"] = decipher($data["Ftp_password"]);
                $content = $this->load->view("ftp/ftp_form", $data, TRUE);
                echo Modules::run("template/load_admin", "Edit Host".$data["Ftp_name"], $content);
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
            $this->ftpm->insert();
        }else if(is_numeric($this->input->post('source'))){
            $this->ftpm->update();
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Didn't Understand Your Request! Please Try Again from controller");
        }
    }
    
    /**
     * Loads host detail and available actions.
     * @return void Loads DataTable structure. Doesn't return anything.
     */
    public function admin_view(){
        echo Modules::run('template/load_admin', 'View All Hosts', $this->load->view('ftp/ftp_view', '', TRUE),'','',array('themes/admin/vendor/datatable/jquery.dataTables.min.js', 'themes/admin/vendor/datatable/dataTables.bootstrap.js'));
    }
    
    /**
     * Process DataTable Ajax requests.
     * @return void Pushes JASON encoded data through Ajax. Doesn't return anything.
     */
    public function admin_get_ftp(){
        $limit = $this->input->get('length');
        $offset = $this->input->get('start');
        $search = $this->input->get('search')['value'];
        echo $this->ftpm->get_ftp($limit, $offset, $search);
    }
    
    /**
     * Deletes data from database.
     * @param int $Ftp_ID The id of the which host would be deleted.
     * @return void Redirects to view after deleting the host. Doesn't return anything.
     */
    public function admin_delete($Ftp_ID){
        if(!empty($Ftp_ID)){
            $this->db->where("Ftp_ID", $Ftp_ID)->delete("ftp");
        }
        redirect("admincm/modules/ftp/view");
    }
}