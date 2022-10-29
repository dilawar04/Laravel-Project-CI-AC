<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product_review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_review_model', 'product_review');
		if (! $this->session->userdata('is_logged_in')) redirect('/admin','refresh');
	}

	public function index()
	{
		
		$config['base_url'] = base_url() . 'admin/product_review/index';
		$config['total_rows'] = $this->product_review->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);

		if ($this->input->get('q')) {
			$this->db->like('name', $this->input->get('q'), 'BOTH');
		}

		$data['product_reviews'] = $this->product_review->get_all($config['per_page'] , $this->uri->segment(4));
		$data['title'] = 'Manage Product review';
		$data['mainContent'] = '/admin/product_review/index';
		$this->load->view('/admin/layout/master', $data);
	}
	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('create_date','Date','required');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','email','required');

			if ($this->form_validation->run() == TRUE)
			{
			$options = [
				'create_date' => $this->input->post('create_date'),
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'comment' => $this->input->post('comment')
			];
			$this->product_review->create($options);
			redirect('/admin/product_review','refresh');
			}
		}
		$data['title'] = 'Create Product review';
		$data['mainContent'] = '/admin/product_review/add';
		$this->load->view('/admin/layout/master', $data);
	}
	public function edit($product_review_id)
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$options = [
				'create_date' => $this->input->post('create_date'),
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'comment' => $this->input->post('comment')
			];
			$this->product_review->update($product_review_id,$options);
			redirect('/admin/product_review','refresh');
		}
		$data['product_review'] = $this->product_review->get_by($product_review_id);
		$data['title'] = 'Edit Product review';
		$data['mainContent'] = '/admin/product_review/edit';
		$this->load->view('/admin/layout/master', $data);
	}
	public function status($product_review_id)
	{
		sleep(1);
		$rows = $this->product_review->get_by($product_review_id);
		$newStatus = ($rows->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = ['status' => $newStatus];
		$this->product_review->update($product_review_id,$options);
		echo $newStatus;
	}
	public function delete($product_review_id)
	{
		$this->product_review->remove($product_review_id);
		//redirect('/admin/product_review','refresh');
		echo true;
	}
	public function active_all_status()
	{
		$checkAll = $this->input->post('checkAll');
		$options = ['status' => 'ACTIVE'];
		foreach ($checkAll as $id) {
		   		echo $this->product_review->update($id, $options);
		}
	}
	public function deactive_all_status()
	{
		$checkAll = $this->input->post('checkAll');
		$options = ['status' => 'DEACTIVE'];
		foreach ($checkAll as $id) {
		   		echo $this->product_review->update($id, $options);
		}
	}
	public function delete_all()
	{
		$checkAll = $this->input->post('checkAll');
		foreach ($checkAll as $id) {
			echo $this->delete($id);
		}
	}
	public function product_review_seed()
	{
		$faker = Faker\Factory::create();
		for ($i=0; $i < 50 ; $i++) {
		$title = $faker->name; 
		$options = [
			'create_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'product_id' => $faker->paragraph,
			'name' => $faker->name,
			'email' => $faker->email,
			'website' => $faker->company,
			'comment' => $faker->text
		];
			$this->product_review->create($options);
		}
			redirect('/admin/product_review','refresh');
	}
}
