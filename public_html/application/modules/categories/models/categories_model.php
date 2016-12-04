<?php if(!defined("BASEPATH"))exit("No Direct Script Access");
/**
 * Categories Model
 * 
 * @package CI
 * @subpackage Model
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Categories_Model extends CI_Model{
    /**
     * Loads model parent construct.
     * @return void Doesn't return anything.
     */
    public function __construct() {
        parent::__construct();
    }
    /**
     * Prepares parent options for insert and update form.
     * @param int $Categories_ID Parent ID to begin iteration.
     * @param char $extend A character to structure parent child formation.
     * @param int $selected An id to be mark as selected.
     * @return string The HTML of parent option.
     */
    public function getCatParent($Categories_ID = 0, $extend = "-", $selected = 0){
        $options = "";
        if($Categories_ID == 0){
            $select = ($selected == 0)?"selected":"";
            $options .= "<option value=\"0\" $select>Parent</option>";
        }
        $data = $this->db->where("Categories_parent", $Categories_ID)->get("categories");
        if($data->num_rows() > 0){
            foreach ($data->result() as $rows){
                $select = ($selected == $rows->Categories_ID)?"selected":"";
                $options .= "<option value=\"$rows->Categories_ID\" $select>$extend $rows->Categories_name</option>";
                $child = $this->db->where("Categories_parent", $rows->Categories_ID)->count_all_results("categories");
                if($child > 0){
                    $options .= $this->getCatParent($rows->Categories_ID, $extend."-", $selected);
                }
            }
        }
        return $options;
    }
    /**
     * Insert a category into the database.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function insert(){
        $data = (array) $this->input->post();
        unset($data["source"]);
        if($this->db->insert('categories', $data)){
            redirect("admincm/modules/categories/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    /**
     * Updates the category row based on category id.
     * @return void Redirects to view on success. Loads error on fail. Doesn't return anything.
     */
    public function update(){
        $data = (array) $this->input->post();
        $Categories_ID = $data["source"];
        unset($data["source"]);
        if($this->db->where("Categories_ID", $Categories_ID)->update("Categories", $data)){
            redirect("admincm/modules/categories/view");
        }else{
            echo Modules::run("template/load_admin","Somthing Went Wrong!", "Server Couldn't Process Your Request! Please Try Again");
        }
    }
    /**
     * Loads the categories rows for DataTable.
     * @param int $limit Number of rows to return
     * @param int $offset Number of rows to skip from bigging.
     * @param string $query Search string to match in query.
     * @return string Array of rows encoded in JASON string.
     */
    public function get_categories($limit, $offset, $query){
        if(!empty($query)){
            $this->db->like('Categories_name', $query);
            $this->db->or_like('Categories_alias', $query);
            $this->db->or_like('Categories_status', $query);
        }
        $queryData = $this->db->limit($limit, $offset)->get('categories');
        $data = array();
        foreach ($queryData->result() as $rows){
            if($rows->Categories_parent != 0){
                $parent = $this->db->where("Categories_ID", $rows->Categories_parent)->get("categories");
                $parentRow = $parent->row();
                $parentName = $parentRow->Categories_name;
            }else{
                $parentName = "Parent";
            }
            $data[] = array($rows->Categories_name,
                $rows->Categories_alias,
                $parentName,
                $rows->Categories_status,
                $this->load->view("categories/categories_action", $rows, TRUE)
                );
        }
        $output['draw'] = $this->input->get('draw');
        $output['recordsTotal'] = $this->db->count_all_results('categories');
        $output['recordsFiltered'] = $queryData->num_rows();
        $output['data'] = $data;
        return json_encode($output);
    }
    /**
     * Gets a single category for update form.
     * @param int $Categories_ID The id of the category to return.
     * @return array The array of the category row if exist.
     * @return false If no such category exist.
     */
    public function get_category($Categories_ID){
        $data = $this->db->where("Categories_ID", $Categories_ID)->get("categories");
        if($data->num_rows() == 1){
            return (array)$data->row();
        }else{
            return FALSE;
        }
    }
}
