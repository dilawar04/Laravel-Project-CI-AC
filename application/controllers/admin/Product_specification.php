<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_specification extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('product_specification_model', 'product_specification');
		if (! $this->session->userdata('is_logged_in')) redirect('/admin','refresh');

	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('product_id','product_id','required');
			$this->form_validation->set_rules('processor_type','processor_type','required');
			$this->form_validation->set_rules('processor_speed','processor_speed','required');

			if ($this->form_validation->run() == TRUE) 
			{
			$options = [
				'product_id' => $this->input->post('product_id'),
				'processor_type' => $this->input->post('processor_type'),
				'processor_speed' => $this->input->post('processor_speed'),
				'hard_drive_size' => $this->input->post('hard_drive_size'),
				'installed_ram' => $this->input->post('installed_ram'),
				'screen_size' => $this->input->post('screen_size'),
				'camera' => $this->input->post('camera'),
				'color' => $this->input->post('color'),
				'operating_system' => $this->input->post('operating_system'),
				'bluetooth' => $this->input->post('bluetooth'),
				'wifi' => $this->input->post('wifi'),
				'lan' => $this->input->post('lan')
			];
			$this->product_specification->create($options);
			redirect('/admin/product','refresh');
			}
		}
		$data['title'] = 'Create Product specification';
		$data['mainContent'] = '/admin/product_specification/add';
		$this->load->view('/admin/layout/master', $data);
	}
	public function edit()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$options = [
				'product_id' => $this->input->post('product_id'),
				'processor_type' => $this->input->post('processor_type'),
				'processor_speed' => $this->input->post('processor_speed'),
				'hard_drive_size' => $this->input->post('hard_drive_size'),
				'installed_ram' => $this->input->post('installed_ram'),
				'screen_size' => $this->input->post('screen_size'),
				'camera' => $this->input->post('camera'),
				'color' => $this->input->post('color'),
				'operating_system' => $this->input->post('operating_system'),
				'bluetooth' => $this->input->post('bluetooth'),
				'wifi' => $this->input->post('wifi'),
				'lan' => $this->input->post('lan')
			];
			$this->product_specification->update($options);
			redirect('/admin/product','refresh');
		}
		$data['product_specification'] = $this->product_specification->get_by($product_specification_id);
		$data['title'] = 'Edit Product specification';
		$data['mainContent'] = '/admin/product_specification/edit';
		$this->load->view('/admin/layout/master', $data);
	}
}
