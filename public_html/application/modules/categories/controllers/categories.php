<?php if(!defined("BASEPATH")) exit("No Direct Script Access");
/**
 * Categories
 * 
 * @package CI
 * @subpackage Controller
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Categories extends MX_Controller{
    /**
     * Loads parent and other required components.
     * @return void This function returns nothing.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("categories_model", "ctm");
    }
    /**
     * Loads a form to add new category.
     * @return void Prints the form. Doesn't return anything.
     */
    public function admin_add(){
        $data = ["option" => $this->ctm->getCatParent()];
        $content = $this->load->view("categories/categories_form",$data,true);
        echo Modules::run("template/load_admin", "Add New Categories", $content);
    }
    /**
     * Loads Edit Form.
     * @param int $Categories_ID The id of which category to edit.
     * @return void Prints the form with value. Doesn't return anything.
     */
    public function admin_edit($Categories_ID){
        if(!empty($Categories_ID)){
            $data = $this->ctm->get_category($Categories_ID);
            $data["option"] = $this->ctm->getCatParent(0, "-", $data["Categories_parent"]);
            if($data != FALSE){
                $content = $this->load->view("categories/categories_form", $data, TRUE);
                echo Modules::run("template/load_admin", "Edit Categories".$data["Categories_name"], $content);
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
            $this->ctm->insert();
        }else if(is_numeric($this->input->post('source'))){
            $this->ctm->update();
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Didn't Understand Your Request! Please Try Again from controller");
        }
    }
    /**
     * Loads categories detail and available actions.
     * @return void Loads DataTable structure. Doesn't return anything.
     */
    public function admin_view(){
        echo Modules::run('template/load_admin', 'View Categories', $this->load->view('categories/categories_view', '', TRUE),'','',array('themes/admin/vendor/datatable/jquery.dataTables.min.js', 'themes/admin/vendor/datatable/dataTables.bootstrap.js'));
    }
    /**
     * Process DataTable Ajax requests.
     * @return void Pushes JASON encoded data through Ajax. Doesn't return anything.
     */
    public function admin_get_categories(){
        $limit = $this->input->get('length');
        $offset = $this->input->get('start');
        $search = $this->input->get('search')['value'];
        echo $this->ctm->get_categories($limit, $offset, $search);
    }
    /**
     * Switch category status to active/inactive.
     * @param string $switchTo Either active or inactive. Defines what category's status should change into.
     * @param int $Categories_ID The category id of which category's status would be flipped.
     * @return void Redirects to view after switching the status. Doesn't return anything.
     */
    public function admin_switch_status($switchTo, $Categories_ID){
        if(!empty($switchTo) && !empty($Categories_ID)){
            $this->db->where("Categories_ID", $Categories_ID)->update("categories", array("Categories_status" => $switchTo));
        }
        redirect("admincm/modules/categories/view");
    }
    /**
     * Deletes data from database.
     * @param int $Categories_ID The id of the which category would be deleted.
     * @return void Redirects to view after deleting the category. Doesn't return anything.
     */
    public function admin_delete($Categories_ID){
        if(!empty($Categories_ID)){
            $this->db->where("Categories_ID", $Categories_ID)->delete("categories");
        }
        redirect("admincm/modules/categories/view");
    }
}