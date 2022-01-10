<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
    
class Branch extends CI_Controller 
{    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Branch_Model','BM');
		$this->load->helper('security');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('branch/login');
	}

	public function login()
	{
		if($this->input->post('login'))
		{
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('password','Password','required|strip_tags|trim|min_length[6]');
            $this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$language = $this->security->xss_clean($this->input->post('language'));

				if($language=='EN')
				{
					$this->db->select('*');
					$this->db->where('b_email',$email);
					$this->db->where('b_password',sha1($password));
					$select = $this->db->get('tbl_branch_en');
					$run = $select->row();
					$num = $select->num_rows();

					if($num==1)
					{
						// Put value into session
						$b_id = $this->session->set_userdata('b_id',$run->b_id);
						$b_name = $this->session->set_userdata('b_name',$run->b_name);
						$b_language = $this->session->set_userdata('language',$run->b_language);

						if($run->b_status==1)
						{
							redirect(base_url('branch-dashboard'));
						}
						else
						{
							$this->session->set_flashdata('danger','Account blocked, Please contact to adminstrator !');
							redirect(base_url('mybio23branch'));
						}
					}
					else
					{
						$this->session->set_flashdata('danger','The email & password you entered is incorrect !');
						redirect(base_url('mybio23branch'));
					}
				}
				elseif($language=='KR')
				{
					$this->db->select('*');
					$this->db->where('b_kr_email',$email);
					$this->db->where('b_kr_password',sha1($password));
					$select = $this->db->get('tbl_branch_kr');
					$run = $select->row();
					$num = $select->num_rows();

					if($num==1)
					{
						// Put value into session
						$b_kr_id = $this->session->set_userdata('b_kr_id',$run->b_kr_id);
						$b_kr_name = $this->session->set_userdata('b_kr_name',$run->b_kr_name);
						$b_kr_language = $this->session->set_userdata('language',$run->b_kr_language);

						if($run->b_kr_status==1)
						{
							redirect(base_url('branch-dashboard'));
						}
						else
						{
							$this->session->set_flashdata('danger','Account blocked, Please contact to adminstrator !');
							redirect(base_url('mybio23branch'));
						}
					}
					else
					{
						$this->session->set_flashdata('danger','The email & password you entered is incorrect !');
						redirect(base_url('mybio23branch'));
					}
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('mybio23branch'));
				}
			}
			else
			{
				redirect(base_url('branch-login'));
			}
		}
	}

	public function branch_access()
	{
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			if(empty($this->session->userdata('b_id')))
			{
				redirect(base_url('mybio23branch'));
			}
		}
		elseif($lang=='KR')
		{
			if(empty($this->session->userdata('b_kr_id')))
			{
				redirect(base_url('mybio23branch'));
			}
		}
	}

	public function dashboard()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		// Total Kit
		$select = $this->db->get('tbl_kit');
		$num['kit'] = $select->num_rows();

		// Total Test
		$select = $this->db->get('tbl_test');
		$num['test'] = $select->num_rows();

		// Total Product
		$select = $this->db->get('tbl_product');
		$num['product'] = $select->num_rows();

		$select = $this->db->get('tbl_staff');
		$num['staff'] = $select->num_rows();

		$select = $this->db->get('tbl_help_support');
		$num['ticket'] = $select->num_rows();

		$select = $this->db->get('tbl_users');
		$num['user'] = $select->num_rows();

		$select = $this->db->get('tbl_time_slot');
		$num['timeslot'] = $select->num_rows();

		if($lang=='EN')
		{
			$this->load->view('branch/dashboard',$num);
		}
		elseif($lang=='KR')
		{
			$this->load->view('krbranch/dashboard',$num);
		}
		else
		{
			$this->session->set_flashdata('danger','Please select language between English or South Korea !');
			redirect(base_url('mybio23branch'));
		}
	}

	public function logout()
	{
		$this->branch_access();
		$this->session->unset_userdata('b_id');
		$this->session->unset_userdata('b_name');
		$this->session->unset_userdata('b_language');
		redirect(base_url('mybio23branch'));
	}

	public function profile()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			$id = $this->session->userdata('b_id');
			$data['profile'] = $this->BM->edit_profile($id,$lang);
			$this->load->view('branch/profile',$data);
		}
		elseif($lang=='KR')
		{
			$id = $this->session->userdata('b_id'); 
			$data['profile'] = $this->BM->edit_profile($id,$lang);
			$this->load->view('krbranch/profile',$data);			
		}
		else
		{
			$this->session->set_flashdata('danger','Please select language between English or South Korea !');
			redirect(base_url('mybio23branch'));
		}
	} 

	public function updateprofile()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		$id = $this->uri->segment('2');
		if($this->input->post('updateprofile'))
		{
			$this->form_validation->set_rules('name','Name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('street','Street','required|strip_tags|trim|max_length[100]');
			$this->form_validation->set_rules('city','City','required|strip_tags|trim');
			$this->form_validation->set_rules('state','State','required|strip_tags|trim');
			$this->form_validation->set_rules('country','Country','required|strip_tags|trim');
			$this->form_validation->set_rules('postalcode','Postal code','required|strip_tags|trim|alpha_numeric');
			$this->form_validation->set_rules('ssn','SSN','required|strip_tags|trim|max_length[11]|min_length[11]|alpha_dash');
			$this->form_validation->set_rules('telephone','Telephone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('account_number','Account Number','required|strip_tags|trim|numeric|max_length[12]|min_length[10]|greater_than_equal_to[10]');
			$this->form_validation->set_rules('routing_number','Routing Number','required|strip_tags|trim|numeric|max_length[9]|min_length[9]');
			$this->form_validation->set_rules('account_name','Account Name','required|strip_tags|trim|alpha_numeric_spaces|max_length[50]');
			$this->form_validation->set_rules('account_mobile_number','Account Mobile Number','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$street = $this->security->xss_clean($this->input->post('street'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$country = $this->security->xss_clean($this->input->post('country'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$ssn = $this->security->xss_clean($this->input->post('ssn'));
				$telephone = $this->security->xss_clean($this->input->post('telephone'));
				$account_number = $this->security->xss_clean($this->input->post('account_number'));
				$routing_number = $this->security->xss_clean($this->input->post('routing_number'));
				$account_name = $this->security->xss_clean($this->input->post('account_name'));
				$account_mobile_number = $this->security->xss_clean($this->input->post('account_mobile_number'));
				$upload="";
				$upload1="";

				// Upload Images
				$config['upload_path'] = './public/branch';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 5000;
				$config['max_width'] = "";
				$config['max_height'] = "";

				$this->load->library('upload',$config); 

				if(!empty($_FILES['ssn_image']['name']))
				{
					if(!$this->upload->do_upload('ssn_image'))
					{
						$error = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image = $this->upload->data();
						$upload = $image['file_name'];
					}
				}
				else
				{
					$upload = $this->input->post('ssn_image');
				}

				if(!empty($_FILES['profile']['name']))
				{
					if(!$this->upload->do_upload('profile'))
					{
						$error1 = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image1 = $this->upload->data();
						$upload1 = $image1['file_name'];
					}
				}
				else
				{
					$upload1 = $this->input->post('profile');
				}

				$data=array();
				$data['b_name'] = $name;
				$data['b_email'] = $email;
				$data['b_street'] = $street;
				$data['b_city'] = $city;
				$data['b_state'] = $state;
				$data['b_country'] = $country;
				$data['b_postalcode'] = $postalcode;
				$data['b_ssn'] = $ssn;
				$data['b_ssn_image'] = $upload;
				$data['b_image'] = $upload1;
				$data['b_telephone'] = $telephone;
				$data['b_account_number'] = $account_number;
				$data['b_routing_number'] = $routing_number;
				$data['b_account_name'] = $account_name;
				$data['b_account_mobile_number'] = $account_mobile_number;

				$this->BM->update_profile($id,$data,$lang);
				$this->session->set_flashdata('success','Profile updated successfully !');
				redirect(base_url('branch-profile'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$id = $this->session->userdata('b_id');
					$data['profile'] = $this->BM->edit_profile($id);
					$this->load->view('branch/profile',$data);
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$id = $this->session->userdata('b_id');
					$data['profile'] = $this->BM->edit_profile($id);
					$this->load->view('krbranch/profile',$data);		
				}
				else
				{
						
					$this->session->set_flashdata('danger','Please select language between English or South Korea !');
					redirect(base_url('mybio23branch'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function alpha_dash($ssn)
	{
	    if (!preg_match('/^[\d]{3}[-]?[\d]{2}[-]?[\d]{4}$/',$ssn)) 
	    {
	        $this->form_validation->set_message('alpha_dash', 'The SSN field may only contain Special characters & numeric');
	        return FALSE;
	    } 
	    else 
	    {
	        return TRUE;
	    }
 	}

	public function password()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$id = $this->session->userdata('b_id');
			$data['profile'] = $this->BM->edit_profile($id,$lang);
			$this->load->view('branch/changepassword',$data);
		}
		elseif($lang=='KR')
		{
			$id = $this->session->userdata('b_id');
			$data['profile'] = $this->BM->edit_profile($id,$lang);
			$this->load->view('krbranch/changepassword',$data);	
		}
		else
		{		
			$this->session->set_flashdata('danger','Please select language between English or South Korea !');
			redirect(base_url('mybio23branch'));
		}
	}

	public function changepassword()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		$id = $this->uri->segment('2');

		if($this->input->post('changepassword'))
		{
			$this->form_validation->set_rules('old','Old Password','required|strip_tags|trim|min_length[6]');
			$this->form_validation->set_rules('new','New Password','required|strip_tags|trim|min_length[6]');
			$this->form_validation->set_rules('confirm','Confirm Password','required|strip_tags|trim|min_length[6]|matches[new]');

			if($this->form_validation->run())
			{
				$oldpassword =  $this->security->xss_clean($this->input->post('old'));
				$newpassword =  $this->security->xss_clean($this->input->post('new'));
				$confirmpassword = $this->security->xss_clean($this->input->post('confirm'));
				
				$data = $this->BM->edit_profile($id,$lang);

				if(sha1($oldpassword)==$data->b_password)
				{
					$data1=array();
					$data1['b_password'] = sha1($newpassword);
					$data1['b_decrypt_password'] = $newpassword;

					$this->BM->change_password($id,$data1,$lang);
					$this->session->set_flashdata('success','Your password changed successfully !');
					redirect(base_url('branch-password'));
				}
				else
				{
					$this->session->set_flashdata('warning','Your entered wrong password !');
					redirect(base_url('branch-password'));
				}
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['profile'] = $this->BM->edit_profile($id,$lang);
					$this->load->view('branch/changepassword',$data);
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['profile'] = $this->BM->edit_profile($id,$lang);
					$this->load->view('krbranch/changepassword',$data);	
				}
				else
				{			
					$this->session->set_flashdata('danger','Please select language between English or South Korea !');
					redirect(base_url('mybio23branch'));
				}
			}
		}
		else 
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function forgotpassword()
	{
		$this->load->view('branch/forgotpassword');
	}

	public function sendotp()
	{
		if($this->input->post('forgot'))
		{
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');

			if($this->form_validation->run())
			{
				$email = $this->security->xss_clean($this->input->post('email'));
				$otp = rand(1000,9999);
				$from_email = "akashgarg479@gmail.com";

				// check branch email exist or not
				$this->db->select('*');
				$this->db->where('b_email',$email);
				$select = $this->db->get('tbl_branch');
				$num = $select->num_rows();
				$data = $select->row();

				if($num>0)
				{
					$message='Hello "'.$data->b_name.'",

					As per your request for forgot password. We send you an code is "'.$otp.'".
					Enter this code to continue to change your password. 
					"';
			    	$config = array(
					    'protocol' => 'smtp',
					    'smtp_host' => 'ssl://smtp.gmail.com',
					    'smtp_port' => 587,
					    'smtp_user' => 'akashgarg479@gmail.com',
					    'smtp_pass' => '',
					    'mailtype'  => 'html', 
					    'charset'   => 'iso-8859-1'
					);

					$this->load->library('email',$config);
			        $this->email->from($from_email, 'Akash Garg');
			        $this->email->to($email);
			        $this->email->subject('Forgot Password');
			        $this->email->message($message);

			        if($this->email->send())
			        {
			            $this->session->set_flashdata("success","An Email send on your registered email id");
			        }
			        else
			        {
			            $this->session->set_flashdata("danger","You have encountered an error");
			        }
				}
				else
				{
					$this->session->set_flashdata('danger','The email address is not exist in our database !');
					redirect(base_url('branch/forgotpassword'));
				}
			}
			else
			{
				$this->load->view('branch/forgotpassword');
			}
		}
	}

	public function staff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			$this->load->view('branch/addstaff');
		}
		elseif($lang=='KR')
		{
			$this->load->view('krbranch/addstaff');
		}
		else
		{
			$this->session->set_flashdata('danger','Please select language between English or South Korea !');
			redirect(base_url('mybio23branch'));
		}
	}

	public function addstaff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		if($this->input->post('addstaff'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('staff_id','Staff Id','required|strip_tags|trim|max_length[30]');
			$this->form_validation->set_rules('name','Name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('phone','Phone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('dob','Date of Birth','required|strip_tags|trim');
			$this->form_validation->set_rules('position','Position','required|strip_tags|trim|max_length[100]');
			$this->form_validation->set_rules('ssn','SSN','required|strip_tags|trim|alpha_dash|max_length[11]|min_length[11]');
			$this->form_validation->set_rules('experience','Experience','required|strip_tags|trim|numeric|max_length[75]');
			$this->form_validation->set_rules('degree','Degree','required|strip_tags|trim|max_length[50]');

			if($this->form_validation->run())
			{
				$language = $this->security->xss_clean($this->input->post('language'));
				$staff_id = $this->security->xss_clean($this->input->post('staff_id'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$ssn = $this->security->xss_clean($this->input->post('ssn'));
				$phone = $this->security->xss_clean($this->input->post('phone'));
				$dob = $this->security->xss_clean($this->input->post('dob'));
				$position = $this->security->xss_clean($this->input->post('position'));
				$degree = $this->security->xss_clean($this->input->post('degree'));
				$experience = $this->security->xss_clean($this->input->post('experience'));
				$upload="";
				$upload1="";

				// Upload Images
				$config['upload_path'] = './public/staff';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 5000;
				$config['max_width'] = "";
				$config['max_height'] = "";

				$this->load->library('upload',$config); 

				if(!empty($_FILES['degree_image']['name']))
				{
					if(!$this->upload->do_upload('degree_image'))
					{
						$error = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image = $this->upload->data();
						$upload = $image['file_name'];
					}
				}

				if(!empty($_FILES['image']['name']))
				{
					if(!$this->upload->do_upload('image'))
					{
						$error1 = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image1 = $this->upload->data();
						$upload1 = $image1['file_name'];
					}
				}

				if($lang=='EN')
				{
					$data=array();
					$data['st_language'] = $language;
					$data['st_staff_id'] = $staff_id;
					$data['st_name'] = $name;
					$data['st_email'] = $email;
					$data['st_phone'] = $phone;
					$data['st_dob'] = $dob;
					$data['st_position'] = $position;
					$data['st_degree'] = $degree;
					$data['st_image'] = $upload1;
					$data['st_experience'] = $experience;
					$data['st_ssn'] = $ssn;
					$data['st_degree_photo'] = $upload;
					$data['st_parent_id'] = $this->session->userdata('b_id');
				}
				elseif($lang=='KR')
				{

					$data=array();
					// $data['st_kr_language'] = $language;
					$data['st_kr_staff_id'] = $staff_id;
					$data['st_kr_name'] = $name;
					$data['st_kr_email'] = $email;
					$data['st_kr_phone'] = $phone;
					$data['st_kr_dob'] = $dob;
					$data['st_kr_position'] = $position;
					$data['st_kr_degree'] = $degree;
					$data['st_kr_image'] = $upload1;
					$data['st_kr_experience'] = $experience;
					$data['st_kr_ssn'] = $ssn;
					$data['st_kr_degree_photo'] = $upload;
					$data['st_kr_parent_id'] = $this->session->userdata('b_kr_id');
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-staff'));
				}

				$this->BM->add_staff($data,$lang);
				$this->session->set_flashdata('success','Staff added successfully !');
				redirect(base_url('branch-staff'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$this->load->view('branch/addstaff');
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$this->load->view('krbranch/addstaff');
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function managestaff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			$data['staff'] = $this->BM->manage_staff($lang);
			$this->load->view('branch/managestaff',$data);
		}
		elseif($lang=='KR')
		{
			$data['staff'] = $this->BM->manage_staff($lang);
			$this->load->view('krbranch/managestaff',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function editstaff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			$id = $this->uri->segment('2');
			$data['staff'] = $this->BM->edit_staff($id,$lang);
			$this->load->view('branch/editstaff',$data);
		}
		elseif($lang=='KR')
		{
			$id = $this->uri->segment('2');
			$data['staff'] = $this->BM->edit_staff($id,$lang);
			$this->load->view('krbranch/editstaff',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function updatestaff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		$id = $this->uri->segment('2');
		if($this->input->post('updatestaff'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('staff_id','Staff Id','required|strip_tags|trim|max_length[30]');
			$this->form_validation->set_rules('name','Name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('phone','Phone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('dob','Date of Birth','required|strip_tags|trim');
			$this->form_validation->set_rules('position','Position','required|strip_tags|trim|max_length[100]');
			$this->form_validation->set_rules('ssn','SSN','required|strip_tags|trim|alpha_dash|max_length[11]|min_length[11]');
			$this->form_validation->set_rules('experience','Experience','required|strip_tags|trim|max_length[75]');
			$this->form_validation->set_rules('degree','Degree','required|strip_tags|trim|max_length[50]');

			if($this->form_validation->run())
			{
				$language = $this->security->xss_clean($this->input->post('language'));
				$staff_id = $this->security->xss_clean($this->input->post('staff_id'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$ssn = $this->security->xss_clean($this->input->post('ssn'));
				$phone = $this->security->xss_clean($this->input->post('phone'));
				$dob = $this->security->xss_clean($this->input->post('dob'));
				$position = $this->security->xss_clean($this->input->post('position'));
				$degree = $this->security->xss_clean($this->input->post('degree'));
				$experience = $this->security->xss_clean($this->input->post('experience'));
				$upload="";
				$upload1="";

				// Upload Images
				$config['upload_path'] = './public/staff';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 5000;
				$config['max_width'] = "";
				$config['max_height'] = "";

				$this->load->library('upload',$config); 

				if(!empty($_FILES['degree_image']['name']))
				{
					if(!$this->upload->do_upload('degree_image'))
					{
						$error = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image = $this->upload->data();
						$upload = $image['file_name'];
					}
				}
				else
				{
					$upload1 = $this->input->post('degree_image');
				}

				if(!empty($_FILES['image']['name']))
				{
					if(!$this->upload->do_upload('image'))
					{
						$error1 = array('error1' => $this->upload->display_errors()); 
					}   
					else
					{
						$image1 = $this->upload->data();
						$upload1 = $image1['file_name'];
					}
				}
				else
				{
					$upload1 = $this->input->post('image');
				}

				$data=array();
				$data['st_staff_id'] = $staff_id;
				$data['st_name'] = $name;
				$data['st_email'] = $email;
				$data['st_phone'] = $phone;
				$data['st_dob'] = $dob;
				$data['st_position'] = $position;
				$data['st_degree'] = $degree;
				$data['st_image'] = $upload1;
				$data['st_experience'] = $experience;
				$data['st_ssn'] = $ssn;
				$data['st_degree_photo'] = $upload;
				$data['st_language'] = $language;
				$data['st_parent_id'] = $this->session->userdata('u_id');

				$this->BM->update_staff($id,$data,$lang);
				$this->session->set_flashdata('success','Staff updated successfully !');
				redirect(base_url('branch-manage-staff'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['staff'] = $this->BM->edit_staff($id,$lang);
					$this->load->view('branch/editstaff',$data);
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['staff'] = $this->BM->edit_staff($id,$lang);
					$this->load->view('krbranch/editstaff',$data);
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function deletestaff()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		$id = $this->uri->segment('2');
		$this->BM->delete_staff($id,$lang);
		$this->session->set_flashdata('success','Staff delete successfully !');
		redirect(base_url('branch-manage-staff'));
	}

	public function timeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			
			$this->load->view('branch/addtimeslot');
		}
		elseif($lang=='KR')
		{
		
			$this->load->view('krbranch/addtimeslot');
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function addtimeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		if($this->input->post('addtimeslot'))
		{
			$this->form_validation->set_rules('language','Language','required|trim|strip_tags');
			$this->form_validation->set_rules('start_day','Start Days','required|trim|strip_tags');
			$this->form_validation->set_rules('end_day','End Days','required|trim|strip_tags');
			$this->form_validation->set_rules('start_time','Start Time','required|strip_tags|trim');
			$this->form_validation->set_rules('end_time','End Time','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$language = $this->security->xss_clean($this->input->post('language'));
				$start_day = $this->security->xss_clean($this->input->post('start_day'));
				$end_day = $this->security->xss_clean($this->input->post('end_day'));
				$start_time = $this->security->xss_clean($this->input->post('start_time'));
				$end_time = $this->security->xss_clean($this->input->post('end_time'));

				if($lang=='EN')
				{
					$data=array();
					$data['ts_language'] = $language;
					$data['ts_start_day'] = $start_day;
					$data['ts_end_day'] = $end_day;
					$data['ts_start_time'] = $start_time;
					$data['ts_end_time'] = $end_time;
				}
				elseif($lang=='KR')
				{
					$data=array();
					$data['ts_kr_language'] = $language;
					$data['ts_kr_start_day'] = $start_day;
					$data['ts_kr_end_day'] = $end_day;
					$data['ts_kr_start_time'] = $start_time;
					$data['ts_kr_end_time'] = $end_time;
				}
				else
				{
					$this->session->set_flashdata('danger','Enter Valid inputs');
				redirect(base_url('branch-timeslot'));
				}
				

				$this->BM->add_timeslot($data,$lang);
				$this->session->set_flashdata('success','Time Slot added successfully !');
				redirect(base_url('branch-timeslot'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$this->load->view('branch/addtimeslot');
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$this->load->view('krbranch/addtimeslot');
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function managetimeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		if($lang=='EN')
		{
			$data['timeslot'] = $this->BM->manage_timeslot($lang);
			$this->load->view('branch/managetimeslot',$data);
		}
		elseif($lang=='KR')
		{
			$data['timeslot'] = $this->BM->manage_timeslot($lang);
			$this->load->view('krbranch/managetimeslot',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function edittimeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$id = $this->uri->segment('2');
			$data['timeslot'] = $this->BM->edit_timeslot($id,$lang);
			$this->load->view('branch/edittimeslot',$data);
		}
		elseif($lang=='KR')
		{
			$id = $this->uri->segment('2');
			$data['timeslot'] = $this->BM->edit_timeslot($id,$lang);
			$this->load->view('krbranch/edittimeslot',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function updatetimeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		$id = $this->uri->segment('2');
		if($this->input->post('updatetimeslot'))
		{
			$this->form_validation->set_rules('language','Language','required|trim|strip_tags');
			$this->form_validation->set_rules('start_day','Start Days','required|trim|strip_tags');
			$this->form_validation->set_rules('end_day','End Days','required|trim|strip_tags');
			$this->form_validation->set_rules('start_time','Start Time','required|strip_tags|trim');
			$this->form_validation->set_rules('end_time','End Time','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$languages = $this->security->xss_clean($this->input->post('language'));
				$start_day = $this->security->xss_clean($this->input->post('start_day'));
				$end_day = $this->security->xss_clean($this->input->post('end_day'));
				$start_time = $this->security->xss_clean($this->input->post('start_time'));
				$end_time = $this->security->xss_clean($this->input->post('end_time'));

				if($lang=='EN')
				{
					$data=array();
					$data['ts_language'] = $language;
					$data['ts_start_day'] = $start_day;
					$data['ts_start_time'] = $start_time;
					$data['ts_end_day'] = $end_day;
					$data['ts_end_time'] = $end_time;
				}
				elseif($lang=='KR')
				{
					$data=array();
					$data['ts_kr_language'] = $language;
					$data['ts_kr_start_day'] = $start_day;
					$data['ts_kr_start_time'] = $start_time;
					$data['ts_kr_end_day'] = $end_day;
					$data['ts_kr_end_time'] = $end_time;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select the language !');
				redirect(base_url('branch-manage-timeslot'));
				}
				

				$this->BM->update_timeslot($id,$data,$lang);
				$this->session->set_flashdata('success','Time Slot updated successfully !');
				redirect(base_url('branch-manage-timeslot'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['timeslot'] = $this->BM->edit_timeslot($id,$lang);
					$this->load->view('branch/edittimeslot',$data);
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$id = $this->uri->segment('2');
					$data['timeslot'] = $this->BM->edit_timeslot($id,$lang);
					$this->load->view('krbranch/edittimeslot',$data);
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function deletetimeslot()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		$id = $this->uri->segment('2');
		$this->BM->delete_timeslot($id,$lang);
		$this->session->set_flashdata('success','Timeslot delete successfully !');
		redirect(base_url('branch-manage-timeslot'));
	}

	public function ticket()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$this->load->view('branch/addticket');
		}
		elseif($lang=='KR')
		{
			$this->load->view('krbranch/addticket');
		}
		else
		{
            $this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function addticket()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		if($this->input->post('addticket'))
		{
			$this->form_validation->set_rules('title','Title','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('name','Name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('phone','Phone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('message','Message','required|trim|strip_tags');
			
			if($this->form_validation->run())
			{
				$title = $this->security->xss_clean($this->input->post('title'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$phone = $this->security->xss_clean($this->input->post('phone'));
				$message = $this->security->xss_clean($this->input->post('message'));

				$data=array();
				$data['hs_branch_id'] = $this->session->userdata('b_id');
				$data['hs_title'] = $title;
				$data['hs_name'] = $name;
				$data['hs_email'] = $email;
				$data['hs_phone'] = $phone;
				$data['hs_message'] = $message;

				$this->BM->add_ticket($data,$lang);
				$this->session->set_flashdata('success','Ticket added successfully !');
				redirect(base_url('branch-ticket'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
					$this->load->view('branch/addticket');
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$this->load->view('krbranch/addticket');
				}
				else
				{
		            $this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function manageticket()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$data['ticket'] = $this->BM->manage_ticket($lang);
			$this->load->view('branch/manageticket',$data);
		}
		elseif($lang=='KR')
		{
			$data['ticket'] = $this->BM->manage_ticket($lang);
			$this->load->view('krbranch/manageticket',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function editticket()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$id = $this->uri->segment('2');
			$data['ticket'] = $this->BM->edit_ticket($id,$lang);
			$this->load->view('branch/editticket',$data);
		}
		elseif($lang=='KR')
		{
			$id = $this->uri->segment('2');
			$data['ticket'] = $this->BM->edit_ticket($id,$lang);
			$this->load->view('krbranch/editticket',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function updateticket()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		if($this->input->post('updateticket'))
		{
			$this->form_validation->set_rules('start_time','Start Time','required|strip_tags|trim');
			$this->form_validation->set_rules('end_time','End Time','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$start_time = $this->security->xss_clean($this->input->post('start_time'));
				$end_time = $this->security->xss_clean($this->input->post('end_time'));

				$data=array();
				$data['ts_start_time'] = $start_time;
				$data['tsd_time'] = $end_time;

				$this->BM->update_ticket($id,$data,$lang);
				$this->session->set_flashdata('success','Time Slot updated successfully !');
				redirect(base_url('branch-edit-ticket'));
			}
			else
			{
				if($lang=='EN')
				{
					$this->branch_access();
				    $this->load->view('branch/editticket');
				}
				elseif($lang=='KR')
				{
					$this->branch_access();
					$this->load->view('krbranch/editticket');
				}
				else
				{
					$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
					redirect(base_url('branch-dashboard'));
				}
			}
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function deleteticket()
	{
		$this->branch_access();
		$id = $this->uri->segment('2');
		$lang = $this->session->userdata('language');
		$this->BM->delete_ticket($id,$lang);
		$this->session->set_flashdata('success','ticket delete successfully !');
		redirect(base_url('branch-manage-ticket'));
	}
	public function appointmenthistory()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$id = $this->uri->segment('2');
	 		$data['appointment'] = $this->BM->appointment_history($id,$lang);
			$this->load->view('branch/appointmenthistory',$data);
		}
		elseif($lang=='KR')
		{
	        $id = $this->uri->segment('2');
	 		$data['appointment'] = $this->BM->appointment_history($id,$lang);
			$this->load->view('krbranch/appointmenthistory',$data);
      	}
      	else
      	{
      		$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
      	}
	}

	public function change_appointment_status()
 	{
 		$this->branch_access();
 		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$id = $this->uri->segment('2');
	 		$data['appointment'] = $this->BM->appointment_status($id,$lang);
	 		$this->load->view('branch/change_appointment_status',$data);
		}
		elseif($lang=='KR')
		{
	        $id = $this->uri->segment('2');
	 		$data['appointment'] = $this->BM->appointment_status($id,$lang);
	 		$this->load->view('krbranch/change_appointment_status',$data);      	
	 	}
      	else
      	{
      		$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));

      	}
 	}

 	public function changeappointmentstatus()
	{
		$this->branch_access();
		$id = $this->uri->segment('2');

		if($this->input->post('changeappointmentstatus'))
		{
			$status = strip_tags($this->input->post('status'));

			if($status==1) // Order Processing
			{
				$data = array();
				$data['ap_status'] = 1;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointments',$data);
		 	
				redirect(base_url('branch/appointmenthistory'));
			}
			elseif($status==2) // Order Failed
			{
				$data = array();
				$data['ap_status'] = 2;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointments',$data);	

				redirect(base_url('branch/appointmenthistory'));
			}
			elseif($status==3) // Order Completed
			{
				$data = array();
				$data['ap_status'] = 3;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointments',$data);	

				redirect(base_url('branch/appointmenthistory'));
			}
			elseif($status==4) // Order Completed
			{
				$data = array();
				$data['ap_status'] = 4;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointments',$data);	

				redirect(base_url('branch/appointmenthistory'));
			}
			else
			{
				echo "";
			}
		}
		else
		{
			$this->branch_access();
	 		$id = $this->uri->segment('2');
	 		$data['appointment'] = $this->BM->appointment_status($id);
	 		$this->load->view('branch/change_appointment_status',$data);
		}
	}

	public function managetest()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');
		
		if($lang=='EN')
		{
			$data['test'] = $this->BM->manage_test($lang);
			$this->load->view('branch/managetest',$data);
		}
		elseif($lang=='KR')
		{
			$data['test'] = $this->BM->manage_test($lang);
			$this->load->view('krbranch/managetest',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
		
	}

	public function managekit()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$data['kit'] = $this->BM->manage_kit($lang);
			$this->load->view('branch/managekit',$data);
		}
		elseif($lang=='KR')
		{
			$data['kit'] = $this->BM->manage_kit($lang);
			$this->load->view('krbranch/managekit',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function managecategory()
	{
        $this->branch_access();
        $lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$data['category'] = $this->BM->manage_category($lang);
        	$this->load->view('branch/managecategory',$data);
		}
		elseif($lang=='KR')
		{
			$data['category'] = $this->BM->manage_category($lang);
        	$this->load->view('krbranch/managecategory',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		} 
	}

	public function manageproduct()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$data['product'] = $this->BM->manage_product($lang);
			$this->load->view('branch/manageproduct',$data);
		}
		elseif($lang=='KR')
		{
			$data['product'] = $this->BM->manage_product($lang);
			$this->load->view('krbranch/manageproduct',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function viewproduct()
	{
		$this->branch_access();
		$id = $this->uri->segment('2');
		$lang = $this->session->userdata('language');
		$data['product'] = $this->BM->view_product($id,$lang);
		$this->load->view('branch/viewproduct',$data);
	}

	public function registereduser()
	{
		$this->branch_access();
		$lang = $this->session->userdata('language');

		if($lang=='EN')
		{
			$data['user'] = $this->BM->registered_user($lang);
			$this->load->view('branch/registereduser',$data);
		}
		elseif($lang=='KR')
		{
			$data['user'] = $this->BM->registered_user($lang);
			$this->load->view('krbranch/registereduser',$data);
		}
		else
		{
			$this->session->set_flashdata('danger','No Data found Please select language between English or South Korea !');
			redirect(base_url('branch-dashboard'));
		}
	}

	public function change_active_status()
	{
		$this->branch_access();
		$id = $this->uri->segment('3');
		$name = $this->uri->segment('4');

		if($name=='Timeslot')
		{
			$data=array();
			$data['ts_status'] = '1';

			$this->db->where('ts_id',$id);
			$this->db->update('tbl_time_slot',$data);
			$this->session->set_flashdata('success','Timeslot status updated successfully !');
			redirect(base_url('branch-manage-timeslot'));
		}
		elseif($name=='Staff')
		{
			$data=array();
			$data['st_status'] = '1';

			$this->db->where('st_id',$id);
			$this->db->update('tbl_staff',$data);
			$this->session->set_flashdata('success','Staff status updated successfully !');
			redirect(base_url('branch-manage-staff'));
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}

	public function change_inactive_status()
	{
		$this->branch_access();
		$id = $this->uri->segment('3');
		$name = $this->uri->segment('4');

		if($name=='Timeslot')
		{
			$data=array();
			$data['ts_status'] = '2';

			$this->db->where('ts_id',$id);
			$this->db->update('tbl_time_slot',$data);
			$this->session->set_flashdata('success','Timeslot status updated successfully !');
			redirect(base_url('branch-manage-timeslot'));
		}
		elseif($name=='Staff')
		{
			$data=array();
			$data['st_status'] = '2';

			$this->db->where('st_id',$id);
			$this->db->update('tbl_staff',$data);
			$this->session->set_flashdata('success','Staff status updated successfully !');
			redirect(base_url('branch-manage-staff'));
		}
		else
		{
			redirect(base_url('branch-dashboard'));
		}
	}
}
?>