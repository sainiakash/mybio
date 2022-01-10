<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model','HM');
		$this->load->model('Admin_Model','AD');
		$this->load->model('Api_Model','AM');
		$this->load->library('Authorization_Token');
		$this->load->library('common');
	}

	public function index()
	{
		$lang='EN';
		$data['test'] = $this->AD->manage_test($lang);
		$data['category'] = $this->AD->manage_category($lang);
		$data['product'] = $this->AD->manage_product($lang);
	    $this->load->view('home/index',$data);
	}
	
	public function signin()
	{
		$this->load->view('home/sign_in');
	}

	public function signin_post()
	{
		if($this->input->post('signin'))
		{
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('password','Password','required|strip_tags|trim|min_length[6]');

			if($this->form_validation->run())
			{
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));

				$this->db->select('*');
				$this->db->where('u_email',$email);
				$this->db->where('u_password',sha1($password));
				$select = $this->db->get('tbl_users_en');
				$run = $select->row();
				$num = $select->num_rows();

				if($num==1)
				{
					if($run->u_status==1)
					{
						// Put value into session
						$u_id = $this->session->set_userdata('u_id',$run->u_id);
						$u_name = $this->session->set_userdata('u_name',$run->u_name);
						$u_language = $this->session->set_userdata('u_language',$run->u_language);

						// Generate JWT Token
						$token=array();
						$token['device_id'] = $run->u_device_id;
						$token['id'] = $run->u_id;
						$token['time'] = time();

						$jwt_token = $this->authorization_token->generateToken($token);					            

						// Update user detail
						$data=array();
						$data['u_device_id'] = $run->u_device_id;
						$data['u_firebase_token'] = $run->u_firebase_token;
						$data['u_token'] = $jwt_token;

						$this->HM->update_profile($run->u_id,$data,$run->u_language);
						redirect(base_url('user-dashboard'));
					}
					else
					{
						$this->session->set_flashdata('danger','Account blocked, Please contact to adminstrator !');
						redirect(base_url('signin'));
					}
				}
				else
				{
					$this->session->set_flashdata('danger','The email or password are incorrect !');
					redirect(base_url('signin'));
				}
			}
			else
			{
				$this->load->view('home/sign_in');
			}
		}
	}

	public function register()
	{
		$this->load->view('home/register');
	}

	public function register_post()
	{
		if($this->input->post('register'))
		{
			$this->form_validation->set_rules('name','Name','required|trim|strip_tags|min_length[2]|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('password','Password','required|strip_tags|trim|min_length[6]|max_length[100]');
			$this->form_validation->set_rules('street_address','Street Address','required|strip_tags|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('city','city','required|strip_tags|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('state','State','required|strip_tags|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('country','Country','required|strip_tags|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('code','Postal Code','required|strip_tags|trim|min_length[5]|max_length[10]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->input->post('language')=='EN')
			{
				$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email|is_unique[tbl_users_en.u_email]|max_length[100]');
				$this->form_validation->set_rules('phone','Phone Number','required|strip_tags|trim|min_length[10]|max_length[10]|numeric|is_unique[tbl_users_en.u_mobile]');
			}

			if($this->input->post('language')=='KR')
			{
				$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email|is_unique[tbl_users_kr.u_kr_email]|max_length[100]');
				$this->form_validation->set_rules('phone','Phone Number','required|strip_tags|trim|min_length[10]|max_length[10]|numeric|is_unique[tbl_users_kr.u_kr_mobile]');
			}

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$phone = $this->security->xss_clean($this->input->post('phone'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$street_address = $this->security->xss_clean($this->input->post('street_address'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$country = $this->security->xss_clean($this->input->post('country'));
				$code = $this->security->xss_clean($this->input->post('code'));
				$lang = $this->security->xss_clean($this->input->post('language'));

				if($lang=='EN')
				{
					$data=array();
					$data['u_language'] = $lang;
					$data['u_name'] = $name;
					$data['u_email']= $email;
					$data['u_mobile'] = $phone;
					$data['u_password'] = sha1($password);
					$data['u_decrypt_password'] = $password;
					$data['u_street_address'] = $street_address;
					$data['u_city'] = $city;
					$data['u_state'] = $state;
					$data['u_country'] = $country;
					$data['u_postalcode'] = $code;
					$data['u_language'] = 'EN';
					$data['u_type'] = 'WEB';
					$data['u_verified'] = '0';	
				}
				elseif($lang=='KR')
				{
					$data=array();
					$data['u_kr_language'] = $lang;
					$data['u_kr_name'] = $name;
					$data['u_kr_email']= $email;
					$data['u_kr_mobile'] = $phone;
					$data['u_kr_password'] = sha1($password);
					$data['u_kr_decrypt_password'] = $password;
					$data['u_kr_street_address'] = $street_address;
					$data['u_kr_city'] = $city;
					$data['u_kr_state'] = $state;
					$data['u_kr_country'] = $country;
					$data['u_kr_postalcode'] = $code;
					$data['u_kr_language'] = 'EN';
					$data['u_kr_type'] = 'WEB';
					$data['u_kr_verified'] = '0';
				}

				$insert_id = $this->HM->add_user($data,$lang);

				// Create User Code
				$char = substr($phone, -4);
				$char1 = substr($name,-4);

				$data=array();
				$data['u_message_key'] = strtoupper('MB'.$char1.$insert_id);
				$data['u_user_code'] = strtoupper('MB'.$char.$insert_id);
				$this->HM->update_profile($insert_id,$data,$lang);
				redirect(base_url('signin'));
			}
			else
			{
				$this->load->view('home/register');
			}
		}
	}

	public function user_access()
	{
		if(empty($this->session->userdata('u_id')))
		{
			redirect(base_url('signin'));
		}
	}

	public function forgotpassword()
	{
		$this->load->view('home/forgotpassword');
	}

	public function plan()
	{
		$this->user_access();
		$this->load->view('home/plan');
	}

	public function shop()
	{
		$data['product'] = $this->AD->manage_product();
		$this->load->view('home/shop',$data);
	}

	public function addtocart()
	{
		if(!empty($this->session->userdata('u_id')))
		{
			$slug = $this->uri->segment('2');
			$type = $this->uri->segment('3');
			$lang = $this->uri->segment('4');
			$user_id = $this->session->userdata('u_id');
			$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);		

			if($type=='T')
			{
				if($lang=='EN')
				{
					$test = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$test->t_id);

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->update_cart($user_id,$test->t_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
				elseif($lang=='KR')
				{
					$test = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$test->t_id);
					$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);				

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->update_cart($user_id,$test->t_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
			}
			elseif($type=='P')
			{
				if($lang=='EN')
				{
					$product = $this->HM->product_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$product->p_id);

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->update_cart($user_id,$product->p_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
				elseif($lang=='KR')
				{
					$product = $this->HM->product_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$product->p_id);
					$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);				

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->update_cart($user_id,$product->p_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
			}
			elseif($type=='K')
			{
				if($lang=='EN')
				{
					$kit = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$kit->k_id);

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $kit->k_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'K';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $kit->k_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'K';

						$this->HM->update_cart($user_id,$kit->k_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
				elseif($lang=='KR')
				{
					$kit = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$kit->k_id);
					$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);				

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $kit->k_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'K';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $kit->k_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'K';

						$this->HM->update_cart($user_id,$kit->k_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
			}
			else
			{
				echo "";
			}
		}
		else
		{
			redirect(base_url('signin'));
		}
	}

	public function cart()
	{
		$this->user_access();
		$id = $this->session->userdata('u_id');
		$user = $this->HM->edit_profile($id);
		$data['cart'] = $this->HM->manage_cart($id,$user->u_language);

		$this->load->view('home/cart',$data);
	}

	public function updatecartproduct()
	{
		$product_id = $this->input->post('product_id');
		$qty = $this->input->post('quantity');
		$user_id = $this->session->userdata('u_id');
		$user = $this->HM->edit_profile($user_id);

		$data=array();
		$data['ca_qty'] = $qty;

		if($user->u_language=='EN')
		{
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_product_id',$product_id);
			$update = $this->db->update('tbl_cart_en',$data);

			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_product_id',$product_id);
			$query = $this->db->get('tbl_cart_en');
			$num = $query->num_rows();
			echo $num;
		}
		elseif($user->u_language=='KR')
		{
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_product_id',$product_id);
			$update = $this->db->update('tbl_cart_kr',$data);

			$this->db->where('ca_kr_user_id',$id);
			$this->db->where('ca_kr_product_id',$product_id);
			$query = $this->db->get('tbl_cart_kr');
			$num = $query->num_rows();
			echo $num;
		}
		else
		{
			echo "";
		}
	}

	public function removecartproduct()
	{
		$this->user_access();
		$user_id = $this->session->userdata('u_id');
		$product_id = $this->input->post('product_id');
		$user = $this->HM->edit_profile($user_id);

		if($user->u_language=='EN')
		{
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_product_id',$product_id);
			$delete = $this->db->delete('tbl_cart_en');
			echo $delete;
		}
		elseif($user->u_language=='KR')
		{
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_product_id',$product_id);
			$delete = $this->db->delete('tbl_cart_kr');
			echo $delete;
		}
		else
		{
			echo "";
		}
	}

	public function replacecartitem()
	{
		$this->user_access();
		$slug = $this->uri->segment('2');
		$type = $this->uri->segment('3');
		$lang = $this->uri->segment('4');
		$user_id = $this->session->userdata('u_id');

		if($type=='P' && $lang=='EN')
		{
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_type','T');
			$this->db->delete('tbl_cart_en');
	
			if($type=='P')
			{
				if($lang=='EN')
				{
					$product = $this->HM->product_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$product->p_id);

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->update_cart($user_id,$product->p_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
				elseif($lang=='KR')
				{
					$product = $this->HM->product_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$product->p_id);
					$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);				

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $product->p_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'P';

						$this->HM->update_cart($user_id,$product->p_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
			}
		}
		elseif($type=='T' && $lang=='EN')
		{
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_type','P');
			$delete = $this->db->delete('tbl_cart_en');

			if($type=='T')
			{
				if($lang=='EN')
				{
					$test = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$test->t_id);

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->update_cart($user_id,$test->t_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
				elseif($lang=='KR')
				{
					$test = $this->HM->test_slug($slug,$lang);
					$cart_exist = $this->HM->check_cart_value_exist($user_id,$type,$lang,$test->t_id);
					$cart_value = $this->HM->get_cart_value($user_id,$type,$lang);				

					if($cart_exist==0)
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = '1';
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->add_to_cart($data,$lang);
						redirect(base_url('cart'));
					}
					else
					{
						$data = array();
						$data['ca_product_id'] = $test->t_id;
						$data['ca_qty'] = $cart_value->ca_qty+1;
						$data['ca_user_id'] = $this->session->userdata('u_id');
						$data['ca_type'] = 'T';

						$this->HM->update_cart($user_id,$test->t_id,$data,$lang,$type);
						redirect(base_url('cart'));
					}
				}
			}
		}
	}

	public function testdetail()
	{
		$id = $this->uri->segment('2');
		$data['test'] = $this->HM->test_detail($id);
		$this->load->view('home/test-detail',$data);
	}

	public function lab()
	{
		$lang = 'EN';
        $data['lab'] = $this->AD->manage_branch($lang);
		$this->load->view('home/lab',$data);
	}

	public function branchdetail()
	{
		$lang = 'EN';
		$id = $this->uri->segment('2');
		$data['test'] = $this->AD->manage_test($lang);
        $data['lab'] = $this->HM->branch_detail($id);
		$this->load->view('home/lab-detail',$data);
	}

	public function branchcategory()
	{
		$lang = 'EN';
		
		$this->db->where('c_type','Test');
		$select = $this->db->get('tbl_category_en');
		$data['category'] = $select->result_array();
		
		$this->load->view('home/lab-category',$data);
	}

	public function branch_test()
	{
		// $this->user_access();
		$lang = 'EN';
        $data['test'] = $this->AD->manage_test($lang);
		$this->load->view('home/lab-test',$data);
	}

	public function testcategory()
	{
		$lang = 'EN';

		$id = $this->uri->segment('3');

		$this->db->where('c_slug',$id);
		$select = $this->db->get('tbl_category_en');
		$cate = $select->row();

		$this->db->where('t_category_id',$cate->c_id);
		$select1 = $this->db->get('tbl_test_en');
		$data['test'] = $select1->result_array();

		$this->load->view('home/test-category',$data);
	}

	public function home_test()
	{
		$data['kit'] = $this->AD->manage_kit();
		$this->load->view('home/home-test',$data);
	}

	public function contact()
	{
		$this->load->view('home/contact'); 
	}

	public function contact_post()
	{
		if($this->input->post('send'))
		{
			$this->form_validation->set_rules('first_name','First Name','required|trim|strip_tags|min_length[2]|max_length[50]|alpha');
			$this->form_validation->set_rules('last_name','Last Name','required|trim|strip_tags|min_length[2]|max_length[50]|alpha');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email|max_length[50]');
			$this->form_validation->set_rules('mobile','Mobile Number','required|strip_tags|trim|min_length[10]|max_length[10]|numeric');
			$this->form_validation->set_rules('message','Message','required|strip_tags|trim|min_length[20]|max_length[250]');

			if($this->form_validation->run())
			{
				$first_name = $this->security->xss_clean($this->input->post('first_name'));
				$last_name = $this->security->xss_clean($this->input->post('last_name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$mobile = $this->security->xss_clean($this->input->post('mobile'));
				$message = $this->security->xss_clean($this->input->post('message'));

				$data=array();
				$data['uq_first_name'] = $first_name;
				$data['uq_last_name'] = $last_name;
				$data['uq_email'] = $email;
				$data['uq_mobile'] = $mobile;
				$data['uq_message'] = $message;

				$this->HM->add_user_query($data);
				$this->session->set_flashdata('success','Thanks for Contacting with Us !');
				redirect(base_url('contact-us'));
			}
			else
			{
				$this->load->view('home/contact'); 
			}
		}
	}

	public function about()
	{
		$this->load->view('home/about');
	}

	public function privacypolicy()
	{
		$data['privacy'] = $this->AD->edit_privacy_policy();
		$this->load->view('home/privacy-policy',$data);
	}

	public function termsconditions()
	{
		$data['terms'] = $this->AD->edit_terms_condition();
		$this->load->view('home/term-condition',$data);
	}

	public function checkout()
	{
		$this->user_access();
		$this->load->view('home/payment');
	}

	public function services()
	{
		$data['test'] = $this->AD->manage_test();
		$this->load->view('home/services',$data);
	}

	public function latestnews()
	{
		$this->load->view('home/latestnews');
	}

	// User Dashboard
	public function dashboard()
	{
		$this->user_access();
		$id = $this->session->userdata('u_id');
		$data['profile'] = $this->HM->edit_profile($id);
		$this->load->view('home/dashboard',$data);
	}

	public function logout()
	{
		$this->user_access();
		$u_id = $this->session->unset_userdata('u_id');
		$u_name = $this->session->unset_userdata('u_name');
		redirect(base_url('signin'));
	}

	public function profile()
	{
		$this->user_access();
		$id = $this->session->userdata('u_id');
		$data['profile'] = $this->HM->edit_profile($id);
		$this->load->view('home/editprofile',$data);
	}

	public function editprofile()
	{
		$this->user_access();
		$id = $this->session->userdata('u_id');
		$data['profile'] = $this->HM->edit_profile($id);
		$this->load->view('home/profile',$data);
	}

	public function updateprofile()
	{
		$this->user_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updateprofile'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('dob','D.O.B','required|strip_tags|trim');
			$this->form_validation->set_rules('gender','address','required|strip_tags|trim');
			$this->form_validation->set_rules('country','Country','trim|min_length[1]|max_length[50]|strip_tags|required');
			$this->form_validation->set_rules('street','Street','trim|min_length[1]|max_length[50]|strip_tags|required');
			$this->form_validation->set_rules('state','State','trim|min_length[1]|max_length[50]|strip_tags|required');
			$this->form_validation->set_rules('city','City','trim|min_length[1]|max_length[50]|strip_tags|required');
			$this->form_validation->set_rules('postalcode','Postal Code','trim|min_length[5]|max_length[10]|strip_tags|required');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$dob = $this->security->xss_clean($this->input->post('dob'));
				$gender = $this->security->xss_clean($this->input->post('gender'));
				$country = $this->security->xss_clean($this->input->post('country'));
				$street = $this->security->xss_clean($this->input->post('street'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$upload1='';

				$config['upload_path'] = './public/user';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 5000;
				$config['max_width'] = "";
				$config['max_height'] = "";

				$this->load->library('upload',$config); 

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
				$data['u_name'] = $name;
				$data['u_dob'] = $dob;
				$data['u_gender'] = $gender;
				$data['u_country'] = $country;
				$data['u_street_address'] = $street;
				$data['u_city'] = $city;
				$data['u_state'] = $state;
				$data['u_postal_code'] = $postalcode;
				$data['u_image'] = $upload1;

				$this->db->where('u_id',$id);
				$this->db->update('tbl_users',$data);
				$this->session->set_flashdata('success','Your profile updated successfully !');
				redirect(base_url('user-edit-profile/'.$id));
			}
			else
			{
				$this->user_access();
				$id = $this->session->userdata('u_id');
				$data['profile'] = $this->HM->edit_profile($id);
				$this->load->view('home/editprofile',$data);
			}
		}
		else
		{
			$this->user_access();
			redirect(base_url('user-dashboard'));
		}
	}

	public function changepassword()
	{
		$this->user_access();
		$id = $this->session->userdata('u_id');
		$data['profile'] = $this->HM->edit_profile($id);
		$this->load->view('home/changepassword',$data);
	}

	public function changepasswordpost()
	{
		$this->user_access();
		$id = $this->uri->segment('2');
		if($this->input->post('changepassword'))
		{
			$this->form_validation->set_rules('current','Current Password','required|strip_tags|trim|min_length[6]');
			$this->form_validation->set_rules('new','New Password','required|strip_tags|trim|min_length[6]');
			$this->form_validation->set_rules('confirm','Confirm Password','required|strip_tags|trim|min_length[6]|matches[new]');

			if($this->form_validation->run())
			{
				$oldpassword =  $this->security->xss_clean($this->input->post('current'));
				$newpassword =  $this->security->xss_clean($this->input->post('new'));
				$confirmpassword = $this->security->xss_clean($this->input->post('confirm'));
				
				$data = $this->HM->edit_profile($id);

				if(sha1($oldpassword)==$data->u_password)
				{
					$data1=array();
					$data1['u_password'] = sha1($newpassword);
					$data1['u_decrypt_password'] = $newpassword;

					$this->HM->change_password($id,$data1);
					$this->session->set_flashdata('success','Your password changed successfully !');
					redirect(base_url('user-change-password/'.$id));
				}
				else
				{
					$this->session->set_flashdata('warning','Your entered wrong password !');
					redirect(base_url('user-change-password/'.$id));
				}
			}
			else
			{
				$this->user_access();
				$id = $this->uri->segment('2');
				$data['profile'] = $this->HM->edit_profile($id);
				$this->load->view('home/changepassword',$data);
			}
		}
		else
		{
			$id = $this->session->userdata('u_id');
			$data['profile'] = $this->HM->edit_profile($id);
			$this->load->view('home/changepassword',$data);
		}
	}

    public function createverificationcode()
    {
    	$this->user_access();
    	$id = $this->uri->segment('2');
    	$data['profile'] = $this->HM->edit_profile($id);
       	$this->load->view('home/createverificationcode',$data);
    }

    public function createverificationcodepost()
    {
    	$this->user_access();
		$id = $this->uri->segment('2');
		if($this->input->post('createcode'))
		{
			$this->form_validation->set_rules('new','New Code','required|strip_tags|trim|min_length[4]');
			$this->form_validation->set_rules('confirm','Confirm Code','required|strip_tags|trim|min_length[4]|matches[new]');

			if($this->form_validation->run())
			{
				$new =  $this->security->xss_clean($this->input->post('new'));
				$confirm = $this->security->xss_clean($this->input->post('confirm'));
				
				$data1=array();
				$data1['vc_code'] = $new;
				$data1['vc_user_id'] = $id;
				$data1['vc_language'] = 'EN';

				$this->HM->create_verification_code($data1);
				$this->session->set_flashdata('success','Your verification code create successfully !');
				redirect(base_url('user-create-verification-code/'.$id));
			}
			else
			{
				$this->user_access();
    			$id = $this->uri->segment('2');
    			$data['profile'] = $this->HM->edit_profile($id);
       			$this->load->view('home/createverificationcode',$data);
			}
		}
		else
		{
			$this->user_access();
    		$id = $this->uri->segment('2');
    		$data['profile'] = $this->HM->edit_profile($id);
       		$this->load->view('home/createverificationcode',$data);
		}
    } 

    public function changeverificationcode()
    {
    	$this->user_access();
    	$id = $this->uri->segment('2');
    	$data['profile'] = $this->HM->edit_profile($id);
       	$this->load->view('home/changeverificationcode',$data);
    }

    public function changeverificationcodepost()
    {
    	$this->user_access();
		$id = $this->uri->segment('2');
		if($this->input->post('changecode'))
		{
			$this->form_validation->set_rules('current','Current Code','required|strip_tags|trim|min_length[4]|max_length[4]');
			$this->form_validation->set_rules('new','New Code','required|strip_tags|trim|min_length[4]|max_length[4]');
			$this->form_validation->set_rules('confirm','Confirm Code','required|strip_tags|trim|min_length[4]|matches[new]|max_length[4]');

			if($this->form_validation->run())
			{
				$current =  $this->security->xss_clean($this->input->post('current'));
				$new =  $this->security->xss_clean($this->input->post('new'));
				$confirm = $this->security->xss_clean($this->input->post('confirm'));
				
				$data1=array();
				$data1['vc_code'] = $new;
				$data1['vc_user_id'] = $id;
				$data1['vc_language'] = 'EN';

				$this->HM->update_verification_code($id,$data1);
				$this->session->set_flashdata('success','Your verification code update successfully !');
				redirect(base_url('user-change-verification-code/'.$id));
			}
			else
			{
				$this->user_access();
    			$id = $this->uri->segment('2');
    			$data['profile'] = $this->HM->edit_profile($id);
       			$this->load->view('home/changeverificationcode',$data);
			}
		}
		else
		{
			$this->user_access();
    		$id = $this->uri->segment('2');
    		$data['profile'] = $this->HM->edit_profile($id);
       		$this->load->view('home/changeverificationcode',$data);
		}
    } 

	public function appointment()
	{
		$this->user_access();
		$this->load->view('home/appointment');
	}
	public function order()
	{
		$this->user_access();
		$this->load->view('home/order');
	}
	public function order_history()
	{
		$this->user_access();
		$this->load->view('home/order-history');
	}
	public function order_tracking()
	{
		$this->user_access();
		$this->load->view('home/order-tracking');
	}
	public function reward()
	{
		$this->user_access();
		$this->load->view('home/reward');
	}
	public function reward_history()
	{
		$this->user_access();
		$this->load->view('home/reward-history');
	}

	public function kitdetail()
	{
		$this->load->view('home/kit-detail');
	}

	public function productdetail()
	{
		$id = $this->uri->segment('2');
		$lang= 'EN';
		$product = $this->HM->product_slug($id,$lang);
		$data['product'] = $this->AD->edit_product($product->p_id,$lang);
		$this->load->view('home/product-detail',$data);
	}

	public function offers()
	{
		$this->load->view('home/offers');
	}

	public function newsdetail()
	{
		$this->load->view('home/news-detail');
	}
}
?>
