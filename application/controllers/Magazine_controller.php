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
        $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
        $config['max_size'] = '200000';
        $config['file_name'] = substr(md5($_FILES['image']['name']),15);
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
        	$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'));
        	$data['error'] = $this->upload->display_errors();    
        	echo "<script type='text/javascript'>
                          alert('Add News Failed !');</script>";
            $this->session->set_flashdata('data',$data);
            redirect(base_url('Magazine_controller/add_magz_page/'),'refresh');
		/*	$this->load->view('HeaderView');
			$this->load->view('LeftSidebarView');
			$this->load->view('AddMagzView',$data);*/   
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
			'date' => date('Y-m-d H:i:s'));

        	$this->Magazine_model->add_magz($data);
            $id = $this->db->insert_id();
/*
			$data['magz'] = $this->Magazine_model->get_where_magz($id);
			$data['id_magazine'] = $id_magazine;
*/
			echo "<script type='text/javascript'>
                          alert('Add Magazine Success !');</script>";
           // $this->session->set_flashdata('data',$data);
        	redirect(base_url('Magazine_controller/edit_magz_page/' . $id),'refresh');
	    }
	}



	function add_hal_page($id_magazine) {
		/*$recent = $this->Magazine_model->get_recent_add($id);
		echo $recent->title;*/
		$data['id_magazine'] = $id_magazine;
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('AddPageView', $data);	
	}

	function add_hal($id_magazine)
	{
		$config['upload_path']          = './uploads/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
	    $config['max_size'] = '200000';
	    //$config['file_name'] = md5(implode('', $_FILES['image_page']['name']));
	    $this->load->library('upload', $config);
	    $files = $_FILES;
		$count = count($_FILES['image_page']['name']);

		$upload_error = array();

		for($i=0 ; $i < $count ; $i++)
		{
			$_FILES['image_page[]']['name']= $files['image_page']['name'][$i];
        	$_FILES['image_page[]']['type']= $files['image_page']['type'][$i];
       		$_FILES['image_page[]']['tmp_name']= $files['image_page']['tmp_name'][$i];
       		$_FILES['image_page[]']['error']= $files['image_page']['error'][$i];
        	$_FILES['image_page[]']['size']= $files['image_page']['size'][$i];    

	        if ( ! $this->upload->do_upload('image_page[]'))
	        {
	        	$data_error[$i] = array('error' => $this->upload->display_errors()); 
	        	/*echo "<script type='text/javascript'>
	                          alert('Add News Failed !');</script>";*/
	           /* $this->session->set_flashdata('data',$data);
	            redirect(base_url('Magazine_controller/add_magz_page/'),'refresh');*/
				//echo "salah";
	        }
	        else
	        {
	        	$data = array('upload_data' => $this->upload->data());
	        	$file_name =  $this->upload->data('file_name');

	           echo $file_name;
	/*
				$data['magz'] = $this->Magazine_model->get_where_magz($id);
				$data['id_magazine'] = $id_magazine;
	*/
				//echo "<script type='text/javascript'>
	               //           alert('Add Magazine Success !');</script>";
	         /*   $this->session->set_flashdata('data',$data);
	        	redirect(base_url('Magazine_controller/edit_magz_page/' . $id),'refresh');*/
		    }		
		}

		if (!empty($upload_error)) {
			echo $upload_error;
		}

		
	}

	function coba($id_magazine)
	{
		  $this->load->library('upload');
  
      //Configure upload.
          $this->upload->initialize(array(
             	"allowed_types" => "gif|jpg|png|jpeg",
                 "upload_path"   => "./uploads/"
             ));
        
             //Perform upload.
             if($this->upload->do_upload("image_page")) {
                 $uploaded = $this->upload->data();
                 echo '<pre>';
			   var_export($uploaded);
			   echo '</pre>';
			             }else{
			   die('GAGAL UPLOAD');
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
		$data['magz_detail'] = $this->Magazine_model->get_magz_detail($id_magazine);
		
		$this->load->view('HeaderView');
		$this->load->view('LeftSidebarView');
		$this->load->view('EditMagzView',$data);
	}

	function edit_magz($id_magazine)
	{
		if (empty($_FILES['image']['name']))
		{
			$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'));

			$this->Magazine_model->edit_magz($data,$id_magazine);
			echo "<script type='text/javascript'>
                          alert('Edit Magazine Success null !');</script>";
        	redirect(base_url('Magazine_controller/Magazine_view'),'refresh');	

		}
		else
		{

			$config['upload_path']   = './uploads/';
	        $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
	        $config['max_size'] = '200000';
	        $config['file_name'] = substr(md5($_FILES['image']['name']),15);
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
				
	        	unlink("uploads/". $this->input->post('current_image'));
	        	$this->Magazine_model->edit_magz($data,$id_magazine);
				echo "<script type='text/javascript'>
	                          alert('Edit Magazine Success !');</script>";
	        	redirect(base_url('Magazine_controller/magazine_view'),'refresh');
		    }
		}
	}
}