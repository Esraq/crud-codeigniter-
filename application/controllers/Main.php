<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();
		$this->load->model("main_model");
		$data["fetch_data"] = $this->main_model->fetch_data();
		$this->load->view("main_view",$data);
		
		 
		
	}
	public function form_validation(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("first_name", "First Name", 'required|alpha');
		$this->form_validation->set_rules("last_name", "Last Name", 'required|alpha');
		
		if($this->form_validation->run()){
			
			$this->load->model('main_model');
			$data=array(
			 "first_name" =>$this->input->post("first_name"),
			  "last_name" =>$this->input->post("last_name"),
			  );
			  $this->main_model->insert_data($data);
			  redirect(base_url() . "main/inserted");
			 
		}
		else
		{
           $this->index();


		}	
		
	}
	public function inserted(){
		
		$this->index();
		
	}
    public function delete_data()
	{
		
		$first_name=$this->uri->segment(3);
		$this->load->model("main_model");
		$this->main_model->delete_data($first_name);
		redirect(base_url(). "main/deleted");
		
	}
	public function deleted(){
		
		
		$this->index();
		
	}
}
?>