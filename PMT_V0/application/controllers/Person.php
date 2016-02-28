<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Person extends CI_Controller {
 
    function changeuserstatus(){
        $id = $_REQUEST['id1'];
        $state = $_REQUEST['state1'];
           $data = array(
                'state' => $state,
            );
        $this->person->update(array('id' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    private function _get_datatables_query(){
         
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column as $item){ // loop column
            if($_POST['search']['value']){ // if datatable send POST for search
                 
                if($i===0){ // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
     function getpeople(){
        
        $p = $this->db->query("select * from pusers");
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'count' => count($p->result_array()),
                    'data' => $p->result_array()
            )));
        
    }
    
    public function __construct(){
        parent::__construct();
        $this->load->model('person_model','person');
    }
 
    public function index(){
        $this->load->helper('url');
        $this->load->view('person_view_member');
    }
    
    public function adminindex(){
        $this->load->helper('url');
        $this->load->view('person_view');
    }
    
    public function adminlogs(){
        $this->load->helper('url');
        $this->load->view('person_view_logs');
    }
   
    public function ajax_list(){
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->username;
            $row[] = $person->password;
            $row[] = $person->first_name;
            $row[] = $person->last_name;
            $row[] = $person->email;
            $row[] = $person->type;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id){
        $data = $this->person->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add(){
        $this->_validate();
        $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                //'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'type' => $this->input->post('type'),
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update(){
        $this->_validate();
        $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'type' => $this->input->post('type'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_update_member(){
        $this->_validatemember();
        $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id){
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == ''){
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'user name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('password') == ''){
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'password is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('first_name') == ''){
            $data['inputerror'][] = 'first_name';
            $data['error_string'][] = 'first name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('last_name') == ''){
            $data['inputerror'][] = 'last_name';
            $data['error_string'][] = 'last name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('email') == ''){
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('type') == ''){
            $data['inputerror'][] = 'type';
            $data['error_string'][] = 'select type';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }
    
    
    private function _validatemember(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == ''){
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'user name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('password') == ''){
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'password is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('first_name') == ''){
            $data['inputerror'][] = 'first_name';
            $data['error_string'][] = 'first name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('last_name') == ''){
            $data['inputerror'][] = 'last_name';
            $data['error_string'][] = 'last name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('email') == ''){
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email is required';
            $data['status'] = FALSE;
        }
        
         
        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }
 
}
