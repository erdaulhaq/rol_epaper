<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('Homeview');
	}

	function magazine_view()
	{
		$data['magz'] = $this->Magazine_model->show_magazine();
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('MagzView',$data);
	}

	function add_magz_page()
	{
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('AddMagzView');	
	}

	function add_magazine()
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
        	$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'));
        	$data['error'] = $this->upload->display_errors();    
        	echo "<script type='text/javascript'>
                          alert('Add News Failed !');</script>";
			$this->load->view('HeaderView');
			$this->load->view('LeftSidebarView');
			$this->load->view('AddMagzView',$data);   
            /*echo $this->upload->display_errors();
            echo "gagal";*/
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
            $file_name =  $this->upload->data('file_name');
        	$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'image' => $file_name,
			'date' => date('Y-m-d '));

        	$this->Magazine_model->add_magz($data);
			echo "<script type='text/javascript'>
                          alert('Add Magazine Success !');</script>";
        	redirect(base_url('Magazine_controller/add_magz_page'),'refresh');
	    }
	}

	function delete_magz($id_magazine)
	{
		$this->Magazine_model->delete_magz($id_magazine);
		echo "<script type='text/javascript'>
                          alert('DELETE Success !');</script>";
        redirect(base_url('Magazine_controller/magazine_view'),'refresh');
	}

	function edit_magz_page($id_magazine)
	{
		$data['magz'] = $this->Magazine_model->get_where_magz($id_magazine);
		$data['id_magazine'] = $id_magazine;
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('EditMagzView',$data);
	}

	function edit_magz($id_magazine)
	{

		if ($this->input->post('image') == '')
		{
			$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'image' =>  $this->input->post('current_image'));
		}

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
        	$data['error'] = $this->upload->display_errors();    
        	echo "<script type='text/javascript'>
                          alert('Edit Magazine Failed !');</script>";
            $this->session->set_flashdata($data);
			redirect(base_url('Magazine_controller/edit_magz_page/' . $id_magazine),'refresh');
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
            $file_name =  $this->upload->data('file_name');
        	$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'image' => $file_name);

        	$this->Magazine_model->add_magz($data);
			echo "<script type='text/javascript'>
                          alert('Add Magazine Success !');</script>";
        	redirect(base_url('Magazine_controller/add_magz_page'),'refresh');
	    }	
	}

}