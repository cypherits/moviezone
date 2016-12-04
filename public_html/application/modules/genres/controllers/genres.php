<?php if(!defined("BASEPATH")) exit("No Direct Script Access");
/**
 * Genres
 * 
 * @package CI
 * @subpackage Controller
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Genres extends MX_Controller{
    /**
     * Loads parent and other required components.
     * @return void This function returns nothing.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("genres_model", "gnm");
    }
    /**
     * Loads a form to add new genre.
     * @return void Prints the form. Doesn't return anything.
     */
    public function admin_add(){
        $content = $this->load->view("genres/genres_form","",true);
        echo Modules::run("template/load_admin", "Add New Genre", $content);
    }
    /**
     * Loads Edit Form.
     * @param int $Genres_ID The id of which genre to edit.
     * @return void Prints the form with value. Doesn't return anything.
     */
    public function admin_edit($Genres_ID){
        if(!empty($Genres_ID)){
            $data = $this->gnm->get_genre($Genres_ID);
            if($data != FALSE){
                $content = $this->load->view("genres/genres_form", $data, TRUE);
                echo Modules::run("template/load_admin", "Edit Genres ".$data["Genres_name"], $content);
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
            $this->gnm->insert();
        }else if(is_numeric($this->input->post('source'))){
            $this->gnm->update();
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Didn't Understand Your Request! Please Try Again from controller");
        }
    }
    /**
     * Loads genres detail and available actions.
     * @return void Loads DataTable structure. Doesn't return anything.
     */
    public function admin_view(){
        echo Modules::run('template/load_admin', 'View Genre', $this->load->view('genres/genres_view', '', TRUE),'','',array('themes/admin/vendor/datatable/jquery.dataTables.min.js', 'themes/admin/vendor/datatable/dataTables.bootstrap.js'));
    }
    /**
     * Process DataTable Ajax requests.
     * @return void Pushes JASON encoded data through Ajax. Doesn't return anything.
     */
    public function admin_get_genres(){
        $limit = $this->input->get('length');
        $offset = $this->input->get('start');
        $search = $this->input->get('search')['value'];
        echo $this->gnm->get_genres($limit, $offset, $search);
    }
    /**
     * Switch genre status to active/inactive.
     * @param string $switchTo Either active or inactive. Defines what genre's status should change into.
     * @param int $Genres_ID The genre id of which genre's status would be flipped.
     * @return void Redirects to view after switching the status. Doesn't return anything.
     */
    public function admin_switch_status($switchTo, $Genres_ID){
        if(!empty($switchTo) && !empty($Genres_ID)){
            $this->db->where("Genres_ID", $Genres_ID)->update("genres", array("Genres_status" => $switchTo));
        }
        redirect("admincm/modules/genres/view");
    }
    /**
     * Deletes data from database.
     * @param int $Genres_ID The id of the which category would be deleted.
     * @return void Redirects to view after deleting the genre. Doesn't return anything.
     */
    public function admin_delete($Genres_ID){
        if(!empty($Genres_ID)){
            $this->db->where("Genres_ID", $Genres_ID)->delete("genres");
        }
        redirect("admincm/modules/genres/view");
    }
}