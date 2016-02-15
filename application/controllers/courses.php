<?php
class Courses extends CI_Controller {
	public function index() {
		redirect('success');
	}

	public function add() {
		$this->load->model("Course");
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Full Name", "trim|required|min_length[15]");

		if ($this->form_validation->run() === false)
		{
			redirect('success');
		}
		else if ($this->form_validation->run() === true)
		{
			$course_details = array(
				"name" => "{$this->input->post('name')}",
				"description" => "{$this->input->post('desc')}"
			);
			$add_course = $this->Course->add_course($course_details);
			redirect('success');
		}
		
	}

	public function success() {
		$this->load->model("Course");
		$my_courses = $this->Course->get_all_courses();
		$this->load->view('main', array("my_courses" => $my_courses));
	}

	public function delete() {
		$course_id = $this->input->post('action');
		$this->load->model("Course");
		$this->Course->delete_course_by_id($course_id);
		redirect('success');
	}
}








?>