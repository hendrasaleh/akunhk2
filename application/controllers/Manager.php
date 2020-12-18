<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index($id=1)
	{
		$data['title'] = 'Report List';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['group'] = $this->db->get_where('user_group', ['id' => $id])->row_array();

		$this->db->select('*');
		$this->db->from('student');
		$this->db->join('file', 'file.student_id = student.id');
		$this->db->where('student.group_id', $id);
		$this->db->order_by('student.group_name');
		$this->db->order_by('student.full_name');
		$data['file'] = $this->db->get()->result_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('file', '','callback_file_check');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('manager/index', $data);
			$this->load->view('templates/footer');
		} else {
			
			$upload_file = $_FILES['file']['name'];
			$pecah = explode(".", $upload_file);
			$file_type = $pecah[1];

			if ($upload_file) {
				$config['allowed_types'] = 'doc|xls|ppt|docx|xlsx|pptx|pdf';
				$config['max_size']      = '5120';
				$config['upload_path']   = './assets/files/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$name = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
				'date' => time(),
				'user_email' => $this->input->post('email'),
				'file_type' => $file_type,
				'name' => $name
			];

			$this->db->insert('file', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> File berhasil diupload!</div>');
			redirect('manager/index');
		}
	}

	public function users()
	{
		$data['title'] = 'User Assignment';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// $this->db->where('role_id >', 2);
		$this->db->order_by('id', 'ASC');
		$data['users'] = $this->db->get('user')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manager/users', $data);
		$this->load->view('templates/footer');
		
	}

	public function assignuser($id)
	{
		$data['title'] = 'User Assignment';
		$data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
		
		
		$this->db->order_by('id', 'ASC');
		$data['group'] = $this->db->get('user_group')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manager/assign-user', $data);
		$this->load->view('templates/footer');
		
	}

	public function addgroup()
	{
		$user_id = $this->input->post('userId');
		$group_id = $this->input->post('groupId');

		$data = [
			'group_id' => $group_id,
			'user_id' => $user_id
		];

		$result = $this->db->get_where('user_to_group', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_to_group', $data);
		} else {
			$this->db->delete('user_to_group', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Assignment success!</div>');
	}

}
