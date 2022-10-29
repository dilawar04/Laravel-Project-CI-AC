<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_gallery_model', 'product_gallery');
		if (! $this->session->userdata('is_logged_in')) redirect('/admin','refresh');
	}

	public function index()
	{
		$data['title'] = 'Manage Product gallery';
		$data['mainContent'] = '/admin/Product_gallery/index';
		$this->load->view('/admin/layout/master', $data);
	}
	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('product_id','Product','required');

			if ($this->form_validation->run() == TRUE) 
			{
				$fileUpload = [];
				$hasFileUploaded = FALSE;

				$filePreference = [

					'upload_path' => './uploads/',
					'allowed_types' => 'jpg|jpeg|png|gif',
					'encrypt_name' => TRUE
				];

				$this->upload->initialize($filePreference);

				if (! $this->upload->do_upload('gallery_img')) {
					$data['error'] = $this->upload->display_errors();
				}
				else {
					$fileUpload = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) 
				{
			$options = [
				'product_id' => $this->input->post('product_id'),
				'gallery_img' => $this->input->post('gallery_img'),
			];
			$this->product_gallery->create($options);
			redirect('/admin/product','refresh');
				}
			}
		}
		$data['title'] = 'Create Product gallery';
		$data['mainContent'] = '/admin/Product_gallery/add';
		$this->load->view('/admin/layout/master', $data);
	}
	// public function edit()
	// {
	// 	$data['title'] = 'Edit Product gallery';
	// 	$data['mainContent'] = '/admin/Product_gallery/edit';
	// 	$this->load->view('/admin/layout/master', $data);
	// }
}
