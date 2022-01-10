<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
date_default_timezone_set('Asia/Kolkata');
    
class Admin extends CI_Controller 
{    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model','AD');
		$this->load->helper('security');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{
		if($this->input->post('login'))
		{
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('password','Password','required|strip_tags|trim|min_length[6]');

			if($this->form_validation->run())
			{
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));

				$this->db->select('*');
				$this->db->where('a_email',$email);
				$this->db->where('a_password',sha1($password));
				$select = $this->db->get('tbl_admin');
				$run = $select->row();
				$num = $select->num_rows();

				if($num==1)
				{
					// Put value into session
					$a_id = $this->session->set_userdata('a_id',$run->a_id);
					$a_name = $this->session->set_userdata('a_name',$run->a_name);

					redirect(base_url('dashboard'));
				}
				else
				{
					$this->session->set_flashdata('danger','The email & password you entered is incorrect !');
					redirect(base_url('mybio23admin'));
				}
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
	}

	public function admin_access()
	{
		if(empty($this->session->userdata('a_id')))
		{
			redirect(base_url('mybio23admin'));
		}
	}

	public function dashboard()
	{
		$this->admin_access();

		// Total Branch
		$select = $this->db->get('tbl_branch_en');
		$num['branch'] = $select->num_rows();

		// Total Banner
		$select = $this->db->get('tbl_banner_en');
		$num['banner'] = $select->num_rows();

		// Total Kit
		$select = $this->db->get('tbl_kit_en');
		$num['kit'] = $select->num_rows();

		// Total Test
		$select = $this->db->get('tbl_test_en');
		$num['test'] = $select->num_rows();

		// Total Product
		$select = $this->db->get('tbl_product_en');
		$num['product'] = $select->num_rows();

		// Total Coupon
		$select = $this->db->get('tbl_coupon');
		$num['coupon'] = $select->num_rows();

		// Total user
		$select = $this->db->get('tbl_users_en');
		$num['user'] = $select->num_rows();

		// Total user query
		$select = $this->db->get('tbl_user_query_en');
		$num['enquiry'] = $select->num_rows();

		// Total appointment
		$select = $this->db->get('tbl_appointments_en');
		$num['appointment'] = $select->num_rows();

		// Total Order
		$select = $this->db->get('tbl_orders_en');
		$num['orders'] = $select->num_rows();

		$this->load->view('admin/dashboard',$num);
	}

	public function logout()
	{
		$this->admin_access();
		$this->session->unset_userdata('a_id');
		$this->session->unset_userdata('a_name');
		redirect(base_url('mybio23admin'));
	}

	public function editprofile()
	{
		$this->admin_access();
		$id = $this->session->userdata('a_id');
		$data['profile'] = $this->AD->edit_profile($id);
		$this->load->view('admin/profile',$data);
	}

	public function updateprofile()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updateprofile'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('mobile','Mobile','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('address','Address','required|strip_tags|trim|alpha_numeric_spaces|max_length[250]');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$mobile = $this->security->xss_clean($this->input->post('mobile'));
				$address = $this->security->xss_clean($this->input->post('address'));

				$data=array();
				$data['a_name'] = $name;
				$data['a_email'] = $email;
				$data['a_mobile'] = $mobile;
				$data['a_address'] = $address;

				$this->AD->update_profile($id,$data);
				$this->session->set_flashdata('success','Your profile updated successfully !');
				redirect(base_url('editprofile'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$data['profile'] = $this->AD->edit_profile($id);
				$this->load->view('admin/profile',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));

		}
	}

	public function password()
	{
		$this->admin_access();
		$id = $this->session->userdata('a_id');
		$data['profile'] = $this->AD->edit_profile($id);
		$this->load->view('admin/changepassword',$data);
	}

	public function changepassword()
	{
		$this->admin_access();
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
				
				$data = $this->AD->edit_profile($id);

				if(sha1($oldpassword)==$data->a_password)
				{
					$data1=array();
					$data1['a_password'] = sha1($newpassword);
					$data1['a_decrypt_password'] = $newpassword;

					$this->AD->change_password($id,$data1);
					$this->session->set_flashdata('success','Your password changed successfully !');
					redirect(base_url('changepassword'));
				}
				else
				{
					$this->session->set_flashdata('warning','Your entered wrong password !');
					redirect(base_url('changepassword'));
				}
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$data['profile'] = $this->AD->edit_profile($id);
				$this->load->view('admin/changepassword',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));
		}
	}

	public function banner()
	{
		$this->admin_access();
		$this->load->view('admin/addbanner');
	}

	public function addbanner()
	{
		$this->admin_access();
		if($this->input->post('addbanner'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|max_length[150]');
			$this->form_validation->set_rules('type','Type','required|strip_tags|trim|max_length[20]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->input->post('language')=='EN')
			{
				$this->form_validation->set_rules('order','Order','required|strip_tags|trim|numeric|min_length[1]|max_length[5]|is_unique[tbl_banner_en.b_order]');
			}
			elseif($this->input->post('language')=='KR')
			{
				$this->form_validation->set_rules('order','Order','required|strip_tags|trim|numeric|min_length[1]|max_length[5]|is_unique[tbl_banner_kr.b_kr_order]');
			}
			else
			{
				$this->session->set_flashdata('danger','Please select language from given parameters !');
				redirect(base_url('banner'));
			}

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$order = $this->security->xss_clean($this->input->post('order')); 
				$type = $this->security->xss_clean($this->input->post('type'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/banner';
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

				if($this->input->post('language')=='EN')
				{
					$data=array();
					$data['b_name'] = $name;
					$data['b_order']= $order;
					$data['b_image'] = $upload1;
					$data['b_type'] = $type;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data=array();
					$data['b_kr_name'] = $name;
					$data['b_kr_order']= $order;
					$data['b_kr_image'] = $upload1;
					$data['b_kr_type'] = $type;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('banner'));
				}

				$this->AD->add_banner($data,$lang);
				$this->session->set_flashdata('success','Banner added successfully !');
				redirect(base_url('banner'));
			}
			else
			{
				$this->admin_access();
				$this->load->view('admin/addbanner');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managebanner()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['banner'] = $this->AD->manage_banner($lang);
				$this->load->view('admin/managebanner',$data);
			}
			else
			{
				$data['banner'] = $this->AD->manage_banner($lang);
				$this->load->view('admin/managebanner',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['banner'] = $this->AD->manage_banner($lang);
			$this->load->view('admin/managebanner',$data);
		}
	}

	public function editbanner()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['banner'] = $this->AD->edit_banner($id,$lang);
		$this->load->view('admin/editbanner',$data);
	}

	public function updatebanner()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatebanner'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|max_length[150]');
			$this->form_validation->set_rules('order','Order','required|strip_tags|trim|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('type','Type','required|strip_tags|trim|max_length[20]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$order = $this->security->xss_clean($this->input->post('order')); 
				$type = $this->security->xss_clean($this->input->post('type'));
				$lang = $this->security->xss_clean($this->input->post('language'));      
				$upload1='';

				$config['upload_path'] = './public/banner';
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

				if($lang=='EN')
				{
					$data=array();
					$data['b_name'] = $name;
					$data['b_order']= $order;
					$data['b_image'] = $upload1;
					$data['b_type'] = $type;
				}
				elseif($lang=='KR')
				{
					$data=array();
					$data['b_kr_name'] = $name;
					$data['b_kr_order']= $order;
					$data['b_kr_image'] = $upload1;
					$data['b_kr_type'] = $type;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select the language from given parameters');
					redirect(base_url('editbanner'));
				}

				$this->AD->update_banner($id,$data,$lang);
				$this->session->set_flashdata('success','Banner updated successfully !');
				redirect(base_url('managebanner'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['banner'] = $this->AD->edit_banner($id,$lang);
				$this->load->view('admin/editbanner',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletebanner()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_banner($id,$lang);
		$this->session->set_flashdata('success','Banner deleted successfully !');
		redirect(base_url('managebanner'));
	}

	public function product()
	{
		$this->admin_access();
		$data['category'] = $this->AD->get_category('Product');
		$this->load->view('admin/addproduct',$data);
	}

	public function addproduct()
	{
		$this->admin_access();
		if($this->input->post('addproduct'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]');
			$this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('sku_code','sku code','required|trim|strip_tags|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('expiry_date','Expiry Date','required|trim|strip_tags');
			$this->form_validation->set_rules('suggested_use','Suggested Use','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('ingredients','Other Ingredents','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('disclaimer','Disclaimer','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('warnings','Warnings','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('quantity','Quantity','required|trim|strip_tags|numeric|greater_than[0]');

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$sku_code = $this->security->xss_clean($this->input->post('sku_code'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$quantity = $this->security->xss_clean($this->input->post('quantity'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));
				$suggested_use = $this->security->xss_clean($this->input->post('suggested_use'));
				$ingredients = $this->security->xss_clean($this->input->post('ingredients'));
				$disclaimer = $this->security->xss_clean($this->input->post('disclaimer'));
				$warnings = $this->security->xss_clean($this->input->post('warnings'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/product';
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
						$this->load->view('admin/addproduct');
					}   
					else
					{
						$image1 = $this->upload->data();
						$upload1 = $image1['file_name'];
					}
				}

				// Product Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['p_name'] = $name;
					$data['p_category_id'] = $category;
					$data['p_price'] = $price;
					$data['p_description'] = $description;
					$data['p_sku_code'] = $sku_code;
					$data['p_expiry_date'] = $expiry_date;
					$data['p_suggested_use'] = $suggested_use;
					$data['p_other_ingredents'] = $ingredients;
					$data['p_warnings'] = $warnings;
					$data['p_disclaimer'] = $disclaimer;
					$data['p_mrp'] = $mrp;
					$data['p_image'] = $upload1;
					$data['p_quantity'] = $quantity;
					$data['p_slug'] = $slug;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['p_kr_name'] = $name;
					$data['p_kr_category_id'] = $category;
					$data['p_kr_price'] = $price;
					$data['p_kr_description'] = $description;
					$data['p_kr_sku_code'] = $sku_code;
					$data['p_kr_expiry_date'] = $expiry_date;
					$data['p_kr_suggested_use'] = $suggested_use;
					$data['p_kr_other_ingredents'] = $ingredients;
					$data['p_kr_warnings'] = $warnings;
					$data['p_kr_disclaimer'] = $disclaimer;
					$data['p_kr_mrp'] = $mrp;
					$data['p_kr_image'] = $upload1;
					$data['p_kr_quantity'] = $quantity;
					$data['p_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select the language from given parameters');
					redirect(base_url('product'));
				}

				$this->AD->add_product($data,$lang);
				$this->session->set_flashdata('success','Product added successfully !');
				redirect(base_url('product'));
			}
			else
			{
				$data['category'] = $this->AD->get_category('Product');
				$this->load->view('admin/addproduct',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function manageproduct()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['product'] = $this->AD->manage_product($lang);
				$this->load->view('admin/manageproduct',$data);
			}
			else
			{
				$data['product'] = $this->AD->manage_product($lang);
				$this->load->view('admin/manageproduct',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['product'] = $this->AD->manage_product($lang);
			$this->load->view('admin/manageproduct',$data);
		}
	}

	public function viewproduct()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$data['product'] = $this->AD->view_product($id);
		$this->load->view('admin/viewproduct',$data);
	}

	public function editproduct()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['product'] = $this->AD->edit_product($id,$lang);
		$data['category'] = $this->AD->get_category('Product');
		$this->load->view('admin/editproduct',$data);
	}

	public function updateproduct()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updateproduct'))
		{
			$this->form_validation->set_rules('update_name','name','required|trim|strip_tags|max_length[100]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('sku_code','sku code','required|trim|strip_tags|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('expiry_date','Expiry Date','required|trim|strip_tags');
			$this->form_validation->set_rules('suggested_use','Suggested Use','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('ingredients','Other Ingredents','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('disclaimer','Disclaimer','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('warnings','Warnings','required|trim|strip_tags|max_length[1000]');
			$this->form_validation->set_rules('quantity','Quantity','required|trim|strip_tags|numeric|greater_than[0]');

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('update_name'));
				$sku_code = $this->security->xss_clean($this->input->post('sku_code'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$quantity = $this->security->xss_clean($this->input->post('quantity'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$lang = $this->security->xss_clean($this->input->post('language'));
				$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));
				$suggested_use = $this->security->xss_clean($this->input->post('suggested_use'));
				$ingredients = $this->security->xss_clean($this->input->post('ingredients'));
				$disclaimer = $this->security->xss_clean($this->input->post('disclaimer'));
				$warnings = $this->security->xss_clean($this->input->post('warnings'));   
				$upload1='';

				$config['upload_path'] = './public/product';
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

				// Product Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['p_name'] = $name;
					$data['p_category_id'] = $category;
					$data['p_price'] = $price;
					$data['p_description'] = $description;
					$data['p_sku_code'] = $sku_code;
					$data['p_expiry_date'] = $expiry_date;
					$data['p_suggested_use'] = $suggested_use;
					$data['p_other_ingredents'] = $ingredients;
					$data['p_warnings'] = $warnings;
					$data['p_disclaimer'] = $disclaimer;
					$data['p_mrp'] = $mrp;
					$data['p_image'] = $upload1;
					$data['p_quantity'] = $quantity;
					$data['p_slug'] = $slug;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['p_kr_name'] = $name;
					$data['p_kr_category_id'] = $category;
					$data['p_kr_price'] = $price;
					$data['p_kr_description'] = $description;
					$data['p_kr_sku_code'] = $sku_code;
					$data['p_kr_expiry_date'] = $expiry_date;
					$data['p_kr_suggested_use'] = $suggested_use;
					$data['p_kr_other_ingredents'] = $ingredients;
					$data['p_kr_warnings'] = $warnings;
					$data['p_kr_disclaimer'] = $disclaimer;
					$data['p_kr_mrp'] = $mrp;
					$data['p_kr_image'] = $upload1;
					$data['p_kr_quantity'] = $quantity;
					$data['p_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select the language from given parameters');
					redirect(base_url('editproduct'));
				}
				
				$this->AD->update_product($id,$data,$lang);
				$this->session->set_flashdata('success','Product updated successfully !');
				redirect(base_url('manageproduct'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['product'] = $this->AD->edit_product($id,$lang);
				$data['category'] = $this->AD->get_category('Product');
				$this->load->view('admin/editproduct',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deleteproduct()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_product($id,$lang);
		$this->session->set_flashdata('success','Product delete successfully !');
		redirect(base_url('manageproduct'));
	}

	public function test()
	{
		$this->admin_access();
		$data['category'] = $this->AD->get_category('Test');
		$this->load->view('admin/addtest',$data);
	}

	public function addtest()
	{
		$this->admin_access();
		if($this->input->post('addtest'))
		{
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|max_length[30]');
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]|is_unique[tbl_test.t_name]');
            $this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('preparation','Preparation','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('test_result','Test Result','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$code = $this->security->xss_clean($this->input->post('code'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$preparation = $this->security->xss_clean($this->input->post('preparation'));
				$test_result = $this->security->xss_clean($this->input->post('test_result'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/test';
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

				// Test Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['t_code'] = $code;
					$data['t_name'] = $name;
					$data['t_category_id'] = $category;
					$data['t_price'] = $price;
					$data['t_description'] = $description;
					$data['t_preparation'] = $preparation;
					$data['t_test_result'] = $test_result;
					$data['t_mrp'] = $mrp;
					$data['t_image'] = $upload1;
					$data['t_slug'] = $slug;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['t_kr_code'] = $code;
					$data['t_kr_name'] = $name;
					$data['t_kr_category_id'] = $category;
					$data['t_kr_price'] = $price;
					$data['t_kr_description'] = $description;
					$data['t_kr_preparation'] = $preparation;
					$data['t_kr_test_result'] = $test_result;
					$data['t_kr_mrp'] = $mrp;
					$data['t_kr_image'] = $upload1;
					$data['t_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('test'));
				}
				
				$this->AD->add_test($data,$lang);
				$this->session->set_flashdata('success','Test added successfully !');
				redirect(base_url('test'));
			}
			else
			{
				$this->admin_access();
				$data['category'] = $this->AD->get_category('Test');
				$this->load->view('admin/addtest',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managetest()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['test'] = $this->AD->manage_test($lang);
				$this->load->view('admin/managetest',$data);
			}
			else
			{
				$data['test'] = $this->AD->manage_test($lang);
				$this->load->view('admin/managetest',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['test'] = $this->AD->manage_test($lang);
			$this->load->view('admin/managetest',$data);
		}
	}

	public function edittest()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['test'] = $this->AD->edit_test($id,$lang);
		$data['category'] = $this->AD->get_category('Test');
		$this->load->view('admin/edittest',$data);
	}

	public function updatetest()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatetest'))
		{
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|max_length[30]');
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]');
            $this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('preparation','Preparation','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('test_result','Test Result','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$code = $this->security->xss_clean($this->input->post('code'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$preparation = $this->security->xss_clean($this->input->post('preparation'));
				$test_result = $this->security->xss_clean($this->input->post('test_result'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/test';
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

				// Test Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['t_code'] = $code;
					$data['t_name'] = $name;
					$data['t_category_id'] = $category;
					$data['t_price'] = $price;
					$data['t_description'] = $description;
					$data['t_preparation'] = $preparation;
					$data['t_test_result'] = $test_result;
					$data['t_mrp'] = $mrp;
					$data['t_image'] = $upload1;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['t_kr_code'] = $code;
					$data['t_kr_name'] = $name;
					$data['t_kr_category_id'] = $category;
					$data['t_kr_price'] = $price;
					$data['t_kr_description'] = $description;
					$data['t_kr_preparation'] = $preparation;
					$data['t_kr_test_result'] = $test_result;
					$data['t_kr_mrp'] = $mrp;
					$data['t_kr_image'] = $upload1;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('edittest'));
				}
				
				$this->AD->update_test($id,$data,$lang);
				$this->session->set_flashdata('success','Test updated successfully !');
				redirect(base_url('managetest'));
			}
			else
			{
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['test'] = $this->AD->edit_test($id,$lang);
				$data['category'] = $this->AD->get_category('Test');
				$this->load->view('admin/edittest',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletetest()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_test($id,$lang);
		$this->session->set_flashdata('success','Test delete successfully !');
		redirect(base_url('managetest'));
	}

	public function kit()
	{
		$this->admin_access();
		$data['category'] = $this->AD->get_category('Kit');
		$this->load->view('admin/addkit',$data);
	}

	public function addkit()
	{
		$this->admin_access();
		if($this->input->post('addkit'))
		{
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|max_length[30]');
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]|is_unique[tbl_test.t_name]');
            $this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('preparation','Preparation','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('test_result','Test Result','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$code = $this->security->xss_clean($this->input->post('code'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$preparation = $this->security->xss_clean($this->input->post('preparation'));
				$test_result = $this->security->xss_clean($this->input->post('test_result'));
				$lang = $this->security->xss_clean($this->input->post('language')); 
				$upload1='';

				$config['upload_path'] = './public/kit';
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

				// Kit Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['k_code'] = $code;
					$data['k_name'] = $name;
					$data['k_category_id'] = $category;
					$data['k_price'] = $price;
					$data['k_description'] = $description;
					$data['k_preparation'] = $preparation;
					$data['k_test_result'] = $test_result;
					$data['k_mrp'] = $mrp;
					$data['k_image'] = $upload1;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['k_kr_code'] = $code;
					$data['k_kr_name'] = $name;
					$data['k_kr_category_id'] = $category;
					$data['k_kr_price'] = $price;
					$data['k_kr_description'] = $description;
					$data['k_kr_preparation'] = $preparation;
					$data['k_kr_test_result'] = $test_result;
					$data['k_kr_mrp'] = $mrp;
					$data['k_kr_image'] = $upload1;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('kit'));
				}

				$this->AD->add_kit($data,$lang);
				$this->session->set_flashdata('success','kit added successfully !');
				redirect(base_url('kit'));
			}
			else
			{
				$this->admin_access();
				$data['category'] = $this->AD->get_category('Kit');
				$this->load->view('admin/addkit',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managekit()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['kit'] = $this->AD->manage_kit($lang);
				$this->load->view('admin/managekit',$data);
			}
			else
			{
				$data['kit'] = $this->AD->manage_kit($lang);
				$this->load->view('admin/managekit',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['kit'] = $this->AD->manage_kit($lang);
			$this->load->view('admin/managekit',$data);
		}
	}

	public function editkit()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['kit'] = $this->AD->edit_kit($id,$lang);
		$data['category'] = $this->AD->get_category('Kit');		
		$this->load->view('admin/editkit',$data);
	}

	public function updatekit()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatekit'))
		{
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|max_length[30]');
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]|is_unique[tbl_test.t_name]');
            $this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('price','Price','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('mrp','MRP','required|trim|strip_tags|numeric|greater_than[0]');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('preparation','Preparation','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('test_result','Test Result','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$code = $this->security->xss_clean($this->input->post('code'));
				$name = $this->security->xss_clean($this->input->post('name'));
				$category = $this->security->xss_clean($this->input->post('category'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$mrp = $this->security->xss_clean($this->input->post('mrp'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$preparation = $this->security->xss_clean($this->input->post('preparation'));
				$test_result = $this->security->xss_clean($this->input->post('test_result'));
				$lang = $this->security->xss_clean($this->input->post('language'));  
				$upload1='';

				$config['upload_path'] = './public/kit';
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

				// Kit Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data = array();
					$data['k_code'] = $code;
					$data['k_name'] = $name;
					$data['k_category_id'] = $category;
					$data['k_price'] = $price;
					$data['k_description'] = $description;
					$data['k_preparation'] = $preparation;
					$data['k_test_result'] = $test_result;
					$data['k_mrp'] = $mrp;
					$data['k_image'] = $upload1;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data = array();
					$data['k_kr_code'] = $code;
					$data['k_kr_name'] = $name;
					$data['k_kr_category_id'] = $category;
					$data['k_kr_price'] = $price;
					$data['k_kr_description'] = $description;
					$data['k_kr_preparation'] = $preparation;
					$data['k_kr_test_result'] = $test_result;
					$data['k_kr_mrp'] = $mrp;
					$data['k_kr_image'] = $upload1;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('editkit'));
				}
				
				$this->AD->update_kit($id,$data,$lang);
				$this->session->set_flashdata('success','Kit updated successfully !');
				redirect(base_url('managekit'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['kit'] = $this->AD->edit_kit($id,$lang);
				$data['category'] = $this->AD->get_category('Kit');		
				$this->load->view('admin/editkit',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletekit()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_kit($id,$lang);
		$this->session->set_flashdata('success','kit delete successfully !');
		redirect(base_url('managekit'));
	}

	public function branch()
	{
		$this->admin_access();
		$this->load->view('admin/addbranch');
	}

	public function addbranch()
	{
		$this->admin_access();
		if($this->input->post('addbranch'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('password','Password','required|strip_tags|trim|min_length[6]');
			$this->form_validation->set_rules('ssn','SSN','required|strip_tags|trim|alpha_dash|max_length[11]|min_length[11]');
			$this->form_validation->set_rules('telephone','Telephone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('account_number','Account Number','required|strip_tags|trim|numeric|max_length[12]|min_length[10]|greater_than_equal_to[10]');
			$this->form_validation->set_rules('routing_number','Routing Number','required|strip_tags|trim|numeric|max_length[9]|min_length[9]');
			$this->form_validation->set_rules('account_name','Account name','required|strip_tags|trim|alpha_numeric_spaces|max_length[50]');
			$this->form_validation->set_rules('account_mobile_number','Account Mobile Number','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('country','Country','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('state','State','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('city','City','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('postalcode','Postal Code','trim|min_length[5]|max_length[10]|strip_tags|required|numeric');
			$this->form_validation->set_rules('street','Street','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$ssn = $this->security->xss_clean($this->input->post('ssn'));
				$telephone = $this->security->xss_clean($this->input->post('telephone'));
				$account_number = $this->security->xss_clean($this->input->post('account_number'));
				$routing_number = $this->security->xss_clean($this->input->post('routing_number'));
				$account_name = $this->security->xss_clean($this->input->post('account_name'));
				$account_mobile_number = $this->security->xss_clean($this->input->post('account_mobile_number'));
				$lang = $this->security->xss_clean($this->input->post('language'));
				$country = $this->security->xss_clean($this->input->post('country'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$street = $this->security->xss_clean($this->input->post('street'));   
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

				// Branch Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data=array();
					$data['b_name'] = $name;
					$data['b_email'] = $email;
					$data['b_password'] = sha1($password);
					$data['b_decrypt_password'] = $password;
					$data['b_ssn'] = $ssn;
					$data['b_ssn_image'] = $upload;
					$data['b_image'] = $upload1;
					$data['b_telephone'] = $telephone;
					$data['b_account_number'] = $account_number;
					$data['b_routing_number'] = $routing_number;
					$data['b_account_name'] = $account_name;
					$data['b_account_mobile_number'] = $account_mobile_number;
					$data['b_country'] = $country;
					$data['b_state'] = $state;
					$data['b_city'] = $city;
					$data['b_postalcode'] = $postalcode;
					$data['b_street'] = $street;
					$data['b_slug'] = $slug;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data=array();
					$data['b_kr_name'] = $name;
					$data['b_kr_email'] = $email;
					$data['b_kr_password'] = sha1($password);
					$data['b_kr_decrypt_password'] = $password;
					$data['b_kr_ssn'] = $ssn;
					$data['b_kr_ssn_image'] = $upload;
					$data['b_kr_image'] = $upload1;
					$data['b_kr_telephone'] = $telephone;
					$data['b_kr_account_number'] = $account_number;
					$data['b_kr_routing_number'] = $routing_number;
					$data['b_kr_account_name'] = $account_name;
					$data['b_kr_account_mobile_number'] = $account_mobile_number;
					$data['b_kr_country'] = $country;
					$data['b_kr_state'] = $state;
					$data['b_kr_city'] = $city;
					$data['b_kr_postalcode'] = $postalcode;
					$data['b_kr_street'] = $street;
					$data['b_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from parameter !');
					redirect(base_url('branch'));
				}
			
				$this->AD->add_branch($data,$lang);
				$this->session->set_flashdata('success','Branch added successfully !');
				redirect(base_url('branch'));
			}
			else
			{
				$this->admin_access();
				$this->load->view('admin/addbranch');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
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

	public function managebranch()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');

				$data['branch'] = $this->AD->manage_branch($lang);
				$this->load->view('admin/managebranch',$data);
			}
			else
			{
				$data['branch'] = $this->AD->manage_branch($lang);
				$this->load->view('admin/managebranch',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['branch'] = $this->AD->manage_branch($lang);
			$this->load->view('admin/managebranch',$data);
		}
	}

	public function editbranch()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['branch'] = $this->AD->edit_branch($id,$lang);
		$this->load->view('admin/editbranch',$data);
	}

	public function updatebranch()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatebranch'))
		{
			$this->form_validation->set_rules('name','name','required|strip_tags|trim|alpha_numeric_spaces|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|strip_tags|trim|valid_email');
			$this->form_validation->set_rules('ssn','SSN','required|strip_tags|trim|alpha_dash|max_length[11]|min_length[11]');
			$this->form_validation->set_rules('telephone','Telephone','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('account_number','Account Number','required|strip_tags|trim|numeric|max_length[12]|min_length[10]|greater_than_equal_to[10]');
			$this->form_validation->set_rules('routing_number','Routing Number','required|strip_tags|trim|numeric|max_length[9]|min_length[9]');
			$this->form_validation->set_rules('account_name','Account name','required|strip_tags|trim|alpha_numeric_spaces|max_length[50]');
			$this->form_validation->set_rules('account_mobile_number','Account Mobile Number','required|strip_tags|trim|numeric|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			$this->form_validation->set_rules('country','Country','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('state','State','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('city','City','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('postalcode','Postal Code','trim|min_length[5]|max_length[10]|strip_tags|required|numeric');
			$this->form_validation->set_rules('street','Street','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$ssn = $this->security->xss_clean($this->input->post('ssn'));
				$telephone = $this->security->xss_clean($this->input->post('telephone'));
				$account_number = $this->security->xss_clean($this->input->post('account_number'));
				$routing_number = $this->security->xss_clean($this->input->post('routing_number'));
				$account_name = $this->security->xss_clean($this->input->post('account_name'));
				$account_mobile_number = $this->security->xss_clean($this->input->post('account_mobile_number'));
				$lang = $this->security->xss_clean($this->input->post('language'));
				$country = $this->security->xss_clean($this->input->post('country'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$street = $this->security->xss_clean($this->input->post('street'));     
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

				// Branch Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($this->input->post('language')=='EN')
				{
					$data=array();
					$data['b_name'] = $name;
					$data['b_email'] = $email;
					$data['b_ssn'] = $ssn;
					$data['b_ssn_image'] = $upload;
					$data['b_image'] = $upload1;
					$data['b_telephone'] = $telephone;
					$data['b_account_number'] = $account_number;
					$data['b_routing_number'] = $routing_number;
					$data['b_account_name'] = $account_name;
					$data['b_account_mobile_number'] = $account_mobile_number;
					$data['b_country'] = $country;
					$data['b_state'] = $state;
					$data['b_city'] = $city;
					$data['b_postalcode'] = $postalcode;
					$data['b_street'] = $street;
					$data['b_slug'] = $slug;
				}
				elseif($this->input->post('language')=='KR')
				{
					$data=array();
					$data['b_kr_name'] = $name;
					$data['b_kr_email'] = $email;
					$data['b_kr_ssn'] = $ssn;
					$data['b_kr_ssn_image'] = $upload;
					$data['b_kr_image'] = $upload1;
					$data['b_kr_telephone'] = $telephone;
					$data['b_kr_account_number'] = $account_number;
					$data['b_kr_routing_number'] = $routing_number;
					$data['b_kr_account_name'] = $account_name;
					$data['b_kr_account_mobile_number'] = $account_mobile_number;
					$data['b_kr_country'] = $country;
					$data['b_kr_state'] = $state;
					$data['b_kr_city'] = $city;
					$data['b_kr_postalcode'] = $postalcode;
					$data['b_kr_street'] = $street;
					$data['b_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from parameter !');
					redirect(base_url('branch'));
				}

				$this->AD->update_branch($id,$data,$lang);
				$this->session->set_flashdata('success','Branch updated successfully !');
				redirect(base_url('managebranch'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['branch'] = $this->AD->edit_branch($id,$lang);
				$this->load->view('admin/editbranch',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletebranch()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_branch($id,$lang);
		$this->session->set_flashdata('success','Branch delete successfully !');
		redirect(base_url('managebranch'));
	}

	public function coupon()
	{
		$this->admin_access();
		$this->load->view('admin/addcoupon');
	}

	public function addcoupon()
	{
		$this->admin_access();
		if($this->input->post('addcoupon'))
		{
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]|alpha_numeric_spaces');
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|alpha_numeric_spaces|max_length[20]');
			$this->form_validation->set_rules('coupon_type','Coupon Type','required|trim|strip_tags');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('start_date','Start Date','required|trim|strip_tags');
			$this->form_validation->set_rules('expiry_date','Expiry Date','required|trim|strip_tags');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$code = $this->security->xss_clean($this->input->post('code'));
				$coupon_type = $this->security->xss_clean($this->input->post('coupon_type'));
				$start_date = $this->security->xss_clean($this->input->post('start_date'));
				$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['co_name'] = $name;
					$data['co_code'] = $code;
					$data['co_coupon_type'] = $coupon_type;
					$data['co_description'] = $description;
					$data['co_start_date'] = $start_date;
					$data['co_expiry_date'] = $expiry_date;
					$data['co_language'] = $lang;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['co_kr_name'] = $name;
					$data['co_kr_code'] = $code;
					$data['co_kr_coupon_type'] = $coupon_type;
					$data['co_kr_description'] = $description;
					$data['co_kr_start_date'] = $start_date;
					$data['co_kr_expiry_date'] = $expiry_date;
					$data['co_kr_language'] = $lang;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from parameter !');
					redirect(base_url('coupon'));
				}
				
				$this->AD->add_coupon($data,$lang);
				$this->session->set_flashdata('success','Coupon added successfully !');
				redirect(base_url('coupon'));
			}
			else
			{
				$this->load->view('admin/addcoupon');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managecoupon()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['coupon'] = $this->AD->manage_coupon($lang);
				$this->load->view('admin/managecoupon',$data);
			}
			else
			{
				$data['coupon'] = $this->AD->manage_coupon($lang);
				$this->load->view('admin/managecoupon',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['coupon'] = $this->AD->manage_coupon($lang);
			$this->load->view('admin/managecoupon',$data);
		}
	}

	public function editcoupon()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['coupon'] = $this->AD->edit_coupon($id,$lang);
		$this->load->view('admin/editcoupon',$data);
	}

	public function updatecoupon()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatecoupon'))
		{
			$this->form_validation->set_rules('name','name','required|trim|strip_tags|max_length[100]|alpha_numeric_spaces');
			$this->form_validation->set_rules('code','Code','required|trim|strip_tags|alpha_numeric_spaces|max_length[20]');
			$this->form_validation->set_rules('coupon_type','Coupon Type','required|trim|strip_tags');
			$this->form_validation->set_rules('description','Description','required|trim|strip_tags|max_length[500]');
			$this->form_validation->set_rules('start_date','Start Date','required|trim|strip_tags');
			$this->form_validation->set_rules('expiry_date','Expiry Date','required|trim|strip_tags');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$code = $this->security->xss_clean($this->input->post('code'));
				$coupon_type = $this->security->xss_clean($this->input->post('coupon_type'));
				$start_date = $this->security->xss_clean($this->input->post('start_date'));
				$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['co_name'] = $name;
					$data['co_code'] = $code;
					$data['co_coupon_type'] = $coupon_type;
					$data['co_description'] = $description;
					$data['co_start_date'] = $start_date;
					$data['co_expiry_date'] = $expiry_date;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['co_kr_name'] = $name;
					$data['co_kr_code'] = $code;
					$data['co_kr_coupon_type'] = $coupon_type;
					$data['co_kr_description'] = $description;
					$data['co_kr_start_date'] = $start_date;
					$data['co_kr_expiry_date'] = $expiry_date;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from parameter !');
					redirect(base_url('editcoupon'));
				}
				
				$this->AD->update_coupon($id,$data,$lang);
				$this->session->set_flashdata('success','Coupon updated successfully !');
				redirect(base_url('managecoupon'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['coupon'] = $this->AD->edit_coupon($id,$lang);
				$this->load->view('admin/editcoupon',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletecoupon()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_coupon($id,$lang);
		$this->session->set_flashdata('success','Coupon delete successfully !');
		redirect(base_url('managecoupon'));
	}

	public function privacypolicy()
	{
		$this->admin_access();
		$data['privacy'] = $this->AD->edit_privacy_policy();
		$this->load->view('admin/privacypolicy',$data);
	}

	public function updateprivacypolicy()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updateprivacypolicy'))
		{
			$this->form_validation->set_rules('message','Message','required|trim');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$message = $this->security->xss_clean($this->input->post('message'));
				$language = $this->security->xss_clean($this->input->post('language'));   

				$data = array();
				$data['pp_message'] = $message;
				$data['pp_language'] = $language;
				
				$this->AD->update_privacy_policy($id,$data);
				$this->session->set_flashdata('success','Privacy Policy updated successfully !');
				redirect(base_url('privacypolicy'));
			}
			else
			{
				$this->admin_access();
				$data['privacy'] = $this->AD->edit_privacy_policy();
				$this->load->view('admin/privacypolicy',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function termsconditions()
	{
		$this->admin_access();
		$data['terms'] = $this->AD->edit_terms_condition();
		$this->load->view('admin/termscondition',$data);
	}

	public function updatetermscondition()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatetermscondition'))
		{
			$this->form_validation->set_rules('message','Message','required|trim');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$message = $this->security->xss_clean($this->input->post('message'));
				$language = $this->security->xss_clean($this->input->post('language'));   

				$data = array();
				$data['tc_message'] = $message;
				$data['tc_language'] = $language;
				
				$this->AD->update_terms_condition($id,$data);
				$this->session->set_flashdata('success','Terms condition updated successfully !');
				redirect(base_url('termsconditions'));
			}
			else
			{
				$this->admin_access();
				$data['terms'] = $this->AD->edit_terms_condition();
				$this->load->view('admin/termscondition',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function category()
	{
		$this->admin_access(); 
		$this->load->view('admin/addcategory');
	}

	public function addcategory()
	{
		$this->admin_access();
		if($this->input->post('addcategory'))
		{
			$this->form_validation->set_rules('name','name','trim|min_length[1]|max_length[20]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('order','Order','strip_tags|trim|numeric|min_length[1]|max_length[5]|is_unique[tbl_category.c_order]');
			$this->form_validation->set_rules('type','Type','trim|strip_tags|required');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$order = $this->security->xss_clean($this->input->post('order'));
				$type = $this->security->xss_clean($this->input->post('type'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/category';
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
						$this->load->view('admin/addcategory');
					}   
					else
					{
						$image1 = $this->upload->data();
						$upload1 = $image1['file_name'];
					}
				}

				// Category Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');

				if($lang=='EN')
				{
					$data = array();
					$data['c_name'] = $name;
					$data['c_order'] = $order;
					$data['c_type'] = $type;
					$data['c_image'] = $upload1;
					$data['c_slug'] = $slug;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['c_kr_name'] = $name;
					$data['c_kr_order'] = $order;
					$data['c_kr_type'] = $type;
					$data['c_kr_image'] = $upload1;
					$data['c_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('category'));
				}

				$this->AD->add_category($data,$lang);
				$this->session->set_flashdata('success','Category added successfully !');
				redirect(base_url('category'));
			}
			else
			{
				$this->load->view('admin/addcategory');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}
 
	public function managecategory()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['category'] = $this->AD->manage_category($lang);
				$this->load->view('admin/managecategory',$data);
			}
			else
			{
				$data['category'] = $this->AD->manage_category($lang);
				$this->load->view('admin/managecategory',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['category'] = $this->AD->manage_category($lang);
			$this->load->view('admin/managecategory',$data);
		}
	}

	public function editcategory()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['category'] = $this->AD->edit_category($id,$lang);
		$this->load->view('admin/editcategory',$data);
	}

	public function updatecategory()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatecategory'))
		{
			$this->form_validation->set_rules('name','name','trim|min_length[1]|max_length[20]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('order','Order','strip_tags|trim|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('type','Type','trim|strip_tags|required');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$order = $this->security->xss_clean($this->input->post('order'));
				$type = $this->security->xss_clean($this->input->post('type'));
				$lang = $this->security->xss_clean($this->input->post('language'));   
				$upload1='';

				$config['upload_path'] = './public/category';
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
						$this->load->view('admin/editcategory');
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

				// Category Slug
				$slug=strToLower(str_replace(" ","-",str_replace(str_split('\/:.()*?"<>!=_|$%^&*#{}[],+`~@'), '',$name)));
				$slug = preg_replace('/-+/', '-', $slug);
				$slug= trim($slug,'-');
	 			
	 			if($lang=='EN')
	 			{
					$data = array();
					$data['c_name'] = $name;
					$data['c_order'] = $order;
					$data['c_type'] = $type;
					$data['c_image'] = $upload1;
					$data['c_slug'] = $slug;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['c_kr_name'] = $name;
					$data['c_kr_order'] = $order;
					$data['c_kr_type'] = $type;
					$data['c_kr_image'] = $upload1;
					$data['c_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('editcategory'));
				}

				$this->AD->update_category($id,$data,$lang);
				$this->session->set_flashdata('success','Category updated successfully !');
				redirect(base_url('managecategory'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['category'] = $this->AD->edit_category($id,$lang);
				$this->load->view('admin/editcategory',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletecategory()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_category($id,$lang);
		$this->session->set_flashdata('danger','Category deleted successfully !');
		redirect(base_url('managecategory'));
	}

	public function testimonial()
	{
		$this->admin_access(); 
		$this->load->view('admin/addtestimonial');
	}

	public function addtestimonial()
	{
		$this->admin_access();
		if($this->input->post('addtestimonial'))
		{
			$this->form_validation->set_rules('name','name','trim|min_length[1]|max_length[20]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('message','Message','trim|strip_tags|required');
			$this->form_validation->set_rules('order','Order','strip_tags|trim|numeric|min_length[1]|max_length[5]|is_unique[tbl_testimonial.tm_order]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$message = $this->security->xss_clean($this->input->post('message'));
				$order = $this->security->xss_clean($this->input->post('order'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['tm_name'] = $name;
					$data['tm_message'] = $message;
					$data['tm_order'] = $order;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['tm_kr_name'] = $name;
					$data['tm_kr_message'] = $message;
					$data['tm_kr_order'] = $order;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('testimonial'));
				}

				$this->AD->add_testimonial($data,$lang);
				$this->session->set_flashdata('success','Testimonial added successfully !');
				redirect(base_url('testimonial'));
			}
			else
			{
				$this->load->view('admin/addtestimonial');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}
 
	public function managetestimonial()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['testimonial'] = $this->AD->manage_testimonial($lang);
				$this->load->view('admin/managetestimonial',$data);
			}
			else
			{
				$data['testimonial'] = $this->AD->manage_testimonial($lang);
				$this->load->view('admin/managetestimonial',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['testimonial'] = $this->AD->manage_testimonial($lang);
			$this->load->view('admin/managetestimonial',$data);
		}
	}

	public function edittestimonial()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['testimonial'] = $this->AD->edit_testimonial($id,$lang);
		$this->load->view('admin/edittestimonial',$data);
	}

	public function updatetestimonial()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatetestimonial'))
		{
			$this->form_validation->set_rules('name','name','trim|min_length[1]|max_length[20]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('message','Message','trim|strip_tags|required');
			$this->form_validation->set_rules('order','Order','strip_tags|trim|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$message = $this->security->xss_clean($this->input->post('message'));
				$order = $this->security->xss_clean($this->input->post('order'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['tm_name'] = $name;
					$data['tm_message'] = $message;
					$data['tm_order'] = $order;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['tm_kr_name'] = $name;
					$data['tm_kr_message'] = $message;
					$data['tm_kr_order'] = $order;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('edittestimonial'));
				}

				$this->AD->update_testimonial($id,$data,$lang);
				$this->session->set_flashdata('success','Testimonial updated successfully !');
				redirect(base_url('managetestimonial'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['testimonial'] = $this->AD->edit_testimonial($id,$lang);
				$this->load->view('admin/edittestimonial',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletetestimonial()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_testimonial($id,$lang);
		$this->session->set_flashdata('danger','Testimonial deleted successfully !');
		redirect(base_url('managetestimonial'));
	}

	public function registereduser()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['user'] = $this->AD->registered_user($lang);
				$this->load->view('admin/registeredusers',$data);
			}
			else
			{
				$data['user'] = $this->AD->registered_user($lang);
				$this->load->view('admin/registeredusers',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['user'] = $this->AD->registered_user($lang);
			$this->load->view('admin/registeredusers',$data);
		}
	}

	public function viewuser()
	{
		$this->admin_access();
		$id = $this->uri->segment('2'); 
		$data['user'] = $this->AD->view_user($id);
		$this->load->view('admin/viewusers',$data);
	}

	public function deleteuser()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_user($id,$lang);
		redirect(base_url('admin/registereduser'));
	}

	public function manageenquiry()
	{
		$this->admin_access();
		$data['enquiry'] = $this->AD->manage_enquiry();
		$this->load->view('admin/manageenquiry',$data);
 	}

 	public function appointmenthistory()
 	{
 		$this->admin_access();
 		$id = $this->uri->segment('2');
 		$data['appointment'] = $this->AD->appointment_history($id);
 		$this->load->view('admin/appointmenthistory',$data);
 	}

 	public function change_appointment_status()
 	{
 		$this->admin_access();
 		$id = $this->uri->segment('2');
 		$data['appointment'] = $this->AD->appointment_status($id);
 		$this->load->view('admin/change_appointment_status',$data);
 	}

	public function changeappointmentstatus()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');

		if($this->input->post('changeappointmentstatus'))
		{
			$status = strip_tags($this->input->post('status'));

			if($status==1) // Order Processing
			{
				$data = array();
				$data['ap_status'] = 1;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointment',$data);	

				redirect(base_url('admin/order_history'));
			}
			elseif($status==2) // Order Failed
			{
				$data = array();
				$data['ap_status'] = 2;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointment',$data);	

				redirect(base_url('admin/order_history'));
			}
			elseif($status==3) // Order Completed
			{
				$data = array();
				$data['ap_status'] = 3;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointment',$data);	

				redirect(base_url('admin/order_history'));
			}
			elseif($status==4) // Order Completed
			{
				$data = array();
				$data['ap_status'] = 4;

		 		$this->db->where('ap_id',$id);
		 		$this->db->update('tbl_appointment',$data);	

				redirect(base_url('admin/order_history'));
			}
			else
			{
				echo "";
			}
		}
		else
		{
			$this->admin_access();
	 		$id = $this->uri->segment('2');
	 		$data['appointment'] = $this->AD->appointment_status($id);
	 		$this->load->view('admin/change_appointment_status',$data);
		}
	}

	public function order_history()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$data['order_history'] = $this->AD->order_report($id);
		$this->load->view('admin/order_history',$data);
	}
	
	public function generate_invoice()
	{
		$this->admin_access();
		$this->load->view('admin/invoice');
	}

	public function change_order_status()
	{
		$this->admin_access();
		$id = $this->uri->segment('3'); 

		if($this->input->post('change_order_status'))
		{
			$status = strip_tags($this->input->post('status'));

			if($status==0) // Order Pending
			{
				$data = array();
				$data['o_status'] = 0;

				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			elseif($status==1) // Order Confirmed
			{
				$data = array();
				$data['o_status'] = 1;

				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			elseif($status==2) // Order Processing
			{
				$data = array();
				$data['o_status'] = 2;
				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}

			if($status==3) // Order Shipped
			{
				$data = array();
				$data['o_status'] = 3;

				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			elseif($status==4) // Order Delivered
			{
				$data = array();
				$data['o_status'] = 4;

				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			elseif($status==5) // Order Cancelled
			{
				$data = array();
				$data['o_status'] = 5;
				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			elseif($status==6) // Order Cancelled
			{
				$data = array();
				$data['o_status'] = 6;
				$this->db->where('o_id',$id);
				$this->db->update('tbl_orders',$data);
				redirect(base_url('admin/order_history'));
			}
			else
			{
				echo "";
			}
		}
		else
		{
			$id = $this->uri->segment('2');

			$this->db->select('*');
			$this->db->where('o_id',$id);
			$select = $this->db->get('tbl_orders');
			$data['order'] = $select->row();

			$this->load->view('admin/change_order_status',$data);
		}
	}

	public function payment()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang="EN";

		if($id=='Lab')
		{
			if($this->input->post('search'))
			{
				$this->form_validation->set_rules('from_date','From Date','required|trim|strip_tags');
				$this->form_validation->set_rules('to_date','To Date','required|trim|strip_tags');
				$this->form_validation->set_rules('lab','Lab','required|trim|strip_tags');

				if($this->form_validation->run())
				{
					$from_date = $this->security->xss_clean($this->input->post('from_date'));
					$to_date = $this->security->xss_clean($this->input->post('to_date'));
					$lab = $this->security->xss_clean($this->input->post('lab'));

					$this->db->order_by('ps_id','desc');
					$this->db->where("ps_created_at BETWEEN '{$from_date}' AND '{$to_date}'");
					$this->db->where('ps_product_id',$lab);	
					$this->db->where('ps_status','Lab');
					$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
					$this->db->join('tbl_branch','tbl_branch.b_id = tbl_payments.ps_product_id');
					$select = $this->db->get('tbl_payments');
					$data['payment'] = $select->result_array();

					$data['branch'] = $this->AD->manage_branch($lang);
					$this->load->view('admin/payment_lab',$data);
				} 
				else
				{
					$this->db->order_by('ps_id','desc');
					$this->db->where('ps_status','Lab');
					$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
					$this->db->join('tbl_branch','tbl_branch.b_id = tbl_payments.ps_product_id');
					$select = $this->db->get('tbl_payments');
					$data['payment'] = $select->result_array();

					$data['branch'] = $this->AD->manage_branch($lang);
					$this->load->view('admin/payment_lab',$data);
				}
			}
			else
			{
				$lang="EN";

				$this->db->order_by('ps_id','desc'); 
				$this->db->where('ps_status','Lab');
				$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
				$this->db->join('tbl_branch','tbl_branch.b_id = tbl_payments.ps_product_id');
				$select = $this->db->get('tbl_payments');
				$data['payment'] = $select->result_array();

				$data['branch'] = $this->AD->manage_branch($lang);
				$this->load->view('admin/payment_lab',$data);
			}
		} 
		elseif($id=='Home')
		{
			if($this->input->post('search'))
			{
				$this->form_validation->set_rules('from_date','From Date','required|trim|strip_tags');
				$this->form_validation->set_rules('to_date','To Date','required|trim|strip_tags');
				$this->form_validation->set_rules('search','Search','required|trim|strip_tags');

				if($this->form_validation->run())
				{
					$from_date = $this->security->xss_clean($this->input->post('from_date'));
					$to_date = $this->security->xss_clean($this->input->post('to_date'));
					$search = $this->security->xss_clean($this->input->post('search'));

					if(!empty($search))
					{
						$this->db->order_by('ps_id','desc');
						$this->db->where('ps_order_id',$search);
						$this->db->or_where("ps_created_at BETWEEN '{$from_date}' AND '{$to_date}'");	
						$this->db->where('ps_status','Home');
						$this->db->join('tbl_kit','tbl_kit.k_id = tbl_payments.ps_product_id');
						$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
						$select = $this->db->get('tbl_payments');
						$data['payment'] = $select->result_array();

						$this->load->view('admin/payment_home',$data);
					}
					else
					{
						$this->db->order_by('ps_id','desc');
						$this->db->where("ps_created_at BETWEEN '{$from_date}' AND '{$to_date}'");	
						$this->db->where('ps_status','Home');
						$this->db->join('tbl_kit','tbl_kit.k_id = tbl_payments.ps_product_id');
						$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
						$select = $this->db->get('tbl_payments');
						$data['payment'] = $select->result_array();

						$this->load->view('admin/payment_home',$data);
					}
				}
				else
				{
					$this->db->order_by('ps_id','desc');
					$this->db->where('ps_status','Home');
					$this->db->join('tbl_kit','tbl_kit.k_id = tbl_payments.ps_product_id');
					$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
					$select = $this->db->get('tbl_payments');
					$data['payment'] = $select->result_array();

					$this->load->view('admin/payment_home',$data);
				}
			}
			else
			{
				$this->db->order_by('ps_id','desc');
				$this->db->where('ps_status','Home');
				$this->db->join('tbl_kit','tbl_kit.k_id = tbl_payments.ps_product_id');
				$this->db->join('tbl_users','tbl_users.u_id = tbl_payments.ps_user_id');
				$select = $this->db->get('tbl_payments');
				$data['payment'] = $select->result_array();

				$this->load->view('admin/payment_home',$data);
			}
		}
		else
		{
			redirect(base_url('dashboard'));
		}
	}

	public function viewappointment()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$data['appointment'] = $this->AD->view_appointment_history($id);
		$this->load->view('admin/viewappointment',$data);
	}

	public function news()
	{
		$this->admin_access();
		$data['category'] = $this->AD->get_category('News');
		$this->load->view('admin/addnews',$data);
	}

	public function addnews()
	{
		$this->admin_access();
		if($this->input->post('addnews'))
		{
			$this->form_validation->set_rules('name','Name','required|max_length[150]|trim|strip_tags');
			$this->form_validation->set_rules('longdescription','Long description','required|trim');
			$this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('shortdescription','Short description','required|trim');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
			
			if($this->form_validation->run())
			{
				$name = $this->security->xss_clean($this->input->post('name'));
				$category =$this->security->xss_clean($this->input->post('category'));
				$shortdescription = $this->security->xss_clean($this->input->post('shortdescription'));
				$longdescription = $this->security->xss_clean($this->input->post('longdescription'));
				$lang = $this->security->xss_clean($this->input->post('language'));
				$upload='';

				$config['upload_path'] = './public/news';
				$config['allowed_type'] = 'jpg|jpeg|png';
				$config['max_size'] = 6000;
				$config['max_width'] = "";
				$config['max_height'] = "";

				$this->load->library('upload',$config);

				if(!empty($_FILES['image']['name']))
				{
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
					}
					else
					{
						$image = $this->upload->data();
						$upload = $image['file_name'];

					}
				}
				else
				{
					$upload  = $this->input->post('image');
				}

				if($lang=='EN')
				{
					$data = array();
					$data['n_name'] = $name;
					$data['n_category_id'] = $category;
					$data['n_short_description'] = $shortdescription;
					$data['n_long_description'] = $longdescription;
					$data['n_image'] = $upload;
					$data['n_slug'] = $slug;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['n_kr_name'] = $name;
					$data['n_kr_category_id'] = $category;
					$data['n_kr_short_description'] = $shortdescription;
					$data['n_kr_long_description'] = $longdescription;
					$data['n_kr_image'] = $upload;
					$data['n_kr_slug'] = $slug;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('news'));
				}

				$this->AD->add_news($data,$lang);
				$this->session->set_flashdata('success','News added successfully !');
				redirect(base_url('news'));
			}
			else
			{
				$this->admin_access();
				$data['category'] = $this->AD->get_category('News'); 
				$this->load->view('admin/addnews',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managenews()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['category'] = $this->AD->manage_category($lang);
				$data['news'] = $this->AD->manage_news($lang);
				$this->load->view('admin/managenews',$data);
			}
			else
			{
				$data['category'] = $this->AD->manage_category($lang);
				$data['news'] = $this->AD->manage_news($lang);
				$this->load->view('admin/managenews',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['category'] = $this->AD->manage_category($lang);
			$data['news'] = $this->AD->manage_news($lang);
			$this->load->view('admin/managenews',$data);
		}
	}

	public function editnews()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['category'] = $this->AD->get_category('News'); 
		$data['news'] = $this->AD->edit_news($id,$lang);
		$this->load->view('admin/editnews',$data);
	}

	public function updatenews()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatenews'))
		{
			$this->form_validation->set_rules('name','Name','required|strip_tags|trim');
			$this->form_validation->set_rules('category','Category','required|trim|strip_tags');
			$this->form_validation->set_rules('shortdescription','Short Description','required|trim');
			$this->form_validation->set_rules('longdescription','Long description','required|trim');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
               	$name = $this->security->xss_clean($this->input->post('name'));
			   	$category =$this->security->xss_clean($this->input->post('category'));
			   	$shortdescription = $this->security->xss_clean($this->input->post('shortdescription'));
			   	$longdescription = $this->security->xss_clean($this->input->post('longdescription'));
			   	$lang = $this->security->xss_clean($this->input->post('language'));
               	$upload = '';	

			   	$config['upload_path'] = './public/news';
			   	$config['allowed_type'] = 'jpg|jpeg|png';
			   	$config['max_size'] = '6000';
			   	$config['max_height'] = "";
			   	$config['max_width'] = "";
			   
			   	$this->load->library('upload',$config);

			   	if(!empty($_FILES['image']['name']))
			   	{
				   	if(!$this->upload->do_upload('image'))
				   	{
						$error = array('error' => $this->upload->display_errors());
				   	}
				   	else
				   	{
					   	$image = $this->upload->data();
					   	$upload = $image['file_name'];
				   	}
			   	}
			   	else
			   	{
				   	$upload = $this->input->post('image');
			   	}

			   	if($lang=='EN')
				{
					$data = array();
					$data['n_name'] = $name;
					$data['n_category_id'] = $category;
					$data['n_short_description'] = $shortdescription;
					$data['n_long_description'] = $longdescription;
					$data['n_image'] = $upload;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['n_kr_name'] = $name;
					$data['n_kr_category_id'] = $category;
					$data['n_kr_short_description'] = $shortdescription;
					$data['n_kr_long_description'] = $longdescription;
					$data['n_kr_image'] = $upload;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('editnews'));
				}

			   $this->AD->update_news($id,$data,$lang);
			   $this->session->set_flashdata('Success','News Updated Successfully');
			   redirect(base_url('managenews'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['category'] = $this->AD->get_category('News'); 
				$data['news'] = $this->AD->edit_news($id,$lang);
				$this->load->view('admin/editnews',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));
		}
	}

	public function deletenews()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_news($id,$lang);
		$this->session->set_flashdata('success','News deleted Successfully !');
		redirect(base_url('managenews'));
	}

	public function location()
	{
		$this->admin_access(); 
		$this->load->view('admin/addlocation');
	}

	public function addlocation()
	{
		$this->admin_access();
		if($this->input->post('addlocation'))
		{
			$this->form_validation->set_rules('country','Country','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('state','State','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('city','City','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('postalcode','Postal Code','trim|min_length[5]|max_length[10]|strip_tags|required|numeric');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$country = $this->security->xss_clean($this->input->post('country'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['l_country'] = $country;
					$data['l_state'] = $state;
					$data['l_city'] = $city;
					$data['l_postalcode'] = $postalcode;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['l_kr_country'] = $country;
					$data['l_kr_state'] = $state;
					$data['l_kr_city'] = $city;
					$data['l_kr_postalcode'] = $postalcode;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('location'));
				}	

				$this->AD->add_location($data,$lang);
				$this->session->set_flashdata('success','Location added successfully !');
				redirect(base_url('location'));
			}
			else
			{
				$this->load->view('admin/addlocation');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}
 
	public function managelocation()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['location'] = $this->AD->manage_location($lang);
				$this->load->view('admin/managelocation',$data);
			}
			else
			{
				$data['location'] = $this->AD->manage_location($lang);
				$this->load->view('admin/managelocation',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['location'] = $this->AD->manage_location($lang);
			$this->load->view('admin/managelocation',$data);
		}
	}

	public function editlocation()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['location'] = $this->AD->edit_location($id,$lang);
		$this->load->view('admin/editlocation',$data);
	}

	public function updatelocation()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatelocation'))
		{
			$this->form_validation->set_rules('country','Country','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('state','State','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('city','City','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('postalcode','Postal Code','trim|min_length[5]|max_length[10]|strip_tags|required|numeric');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$country = $this->security->xss_clean($this->input->post('country'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$postalcode = $this->security->xss_clean($this->input->post('postalcode'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['l_country'] = $country;
					$data['l_state'] = $state;
					$data['l_city'] = $city;
					$data['l_postalcode'] = $postalcode;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['l_kr_country'] = $country;
					$data['l_kr_state'] = $state;
					$data['l_kr_city'] = $city;
					$data['l_kr_postalcode'] = $postalcode;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('editlocation'));
				}

				$this->AD->update_location($id,$data,$lang);
				$this->session->set_flashdata('success','Location update successfully !');
				redirect(base_url('managelocation'));
			}
			else
			{
				$this->admin_access();
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['location'] = $this->AD->edit_location($id,$lang);
				$this->load->view('admin/editlocation',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletelocation()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_location($id,$lang);
		$this->session->set_flashdata('danger','Location deleted successfully !');
		redirect(base_url('managelocation'));
	}

	public function changeactivestatus()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$name = $this->uri->segment('3');
		$lang = $this->uri->segment('4');

		if($name=='User')
		{
			if($lang=='EN')
			{
				$data=array();
				$data['u_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['u_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','User status updated successfully !');
			redirect(base_url('registereduser'));
		}
		elseif($name=='Branch')
		{
			if($lang=='EN')
			{
				$data=array();
				$data['b_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['b_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Branch status updated successfully !');
			redirect(base_url('managebranch'));
		}
		elseif($name=='Location')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['l_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['l_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Location status updated successfully !');
			redirect(base_url('managelocation'));
		}
		elseif($name=='Product')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['p_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['p_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Product status updated Successfully !');
			redirect(base_url('manageproduct'));
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['t_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['t_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Test status updated Successfully !');
			redirect(base_url('managetest'));
		}
		elseif($name=='Kit')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['k_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['k_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Kit status updated Successfully !');
			redirect(base_url('managekit'));
		}
		elseif($name=='Banner')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['b_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['b_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Banner status updated Successfully !');
			redirect(base_url('managebanner'));
		}
		elseif($name=='Category')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['c_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['c_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Category status updated Successfully !');
			redirect(base_url('managecategory'));
		}
		elseif($name=='News')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['n_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['n_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','News status updated Successfully !');
			redirect(base_url('managenews'));
		}
		elseif($name=='Testimonial')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['tm_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['tm_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Testimonial status updated Successfully !');
			redirect(base_url('managetestimonial'));
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['t_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['t_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Test status updated Successfully !');
			redirect(base_url('managetest'));
		}
		elseif($name=='Coupon')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['co_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['co_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Coupon status updated Successfully !');
			redirect(base_url('managecoupon'));
		}

		elseif($name=='Subscription')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['sp_status'] = '1';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['sp_kr_status'] = '1';
			}

			$this->AD->change_active_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Subscription status updated Successfully !');
			redirect(base_url('managesubscription'));
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}

	public function changeinactivestatus()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$name = $this->uri->segment('3');
		$lang = $this->uri->segment('4');

		if($name=='User')
		{
			if($lang=='EN')
			{
				$data=array();
				$data['u_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['u_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','User status updated successfully !');
			redirect(base_url('registereduser'));
		}
		elseif($name=='Branch')
		{
			if($lang=='EN')
			{
				$data=array();
				$data['b_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['b_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Branch status updated successfully !');
			redirect(base_url('managebranch'));
		}
		elseif($name=='Location')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['l_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['l_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Location status updated successfully !');
			redirect(base_url('managelocation'));
		}
		elseif($name=='Product')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['p_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['p_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Product status updated Successfully !');
			redirect(base_url('manageproduct'));
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['t_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['t_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Test status updated Successfully !');
			redirect(base_url('managetest'));
		}
		elseif($name=='Kit')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['k_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['k_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Kit status updated Successfully !');
			redirect(base_url('managekit'));
		}
		elseif($name=='Banner')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['b_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['b_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Banner status updated Successfully !');
			redirect(base_url('managebanner'));
		}
		elseif($name=='Category')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['c_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['c_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Category status updated Successfully !');
			redirect(base_url('managecategory'));
		}
		elseif($name=='News')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['n_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['n_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','News status updated Successfully !');
			redirect(base_url('managenews'));
		}
		elseif($name=='Testimonial')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['tm_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['tm_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Testimonial status updated Successfully !');
			redirect(base_url('managetestimonial'));
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['t_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['t_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Test status updated Successfully !');
			redirect(base_url('managetest'));
		}
		elseif($name=='Coupon')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['co_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['co_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Coupon status updated Successfully !');
			redirect(base_url('managecoupon'));
		}
		elseif($name=='Subscription')
		{ 
			if($lang=='EN')
			{
				$data=array();
				$data['sp_status'] = '2';
			}
			elseif($lang=='KR')
			{
				$data=array();
				$data['sp_kr_status'] = '2';
			}

			$this->AD->change_inactive_status($id,$data,$name,$lang);
			$this->session->set_flashdata('success','Subscription status updated Successfully !');
			redirect(base_url('managesubscription'));
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}

	public function subscription()
	{
		$this->admin_access();
		$this->load->view('admin/addsubscription');
	}

	public function addsubscription()
	{
		$this->admin_access();
		if($this->input->post('addsubscription'))
		{
			$this->form_validation->set_rules('type','Type','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('price','Price','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('description','Description','trim|min_length[50]|strip_tags|required');
			$this->form_validation->set_rules('order','Order','trim|strip_tags|required|numeric');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$type = $this->security->xss_clean($this->input->post('type'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$status = $this->security->xss_clean($this->input->post('status'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$lang = $this->security->xss_clean($this->input->post('language'));
				$order = $this->security->xss_clean($this->input->post('order'));      

				if($lang=='EN')
				{
					$data = array();
					$data['sp_type'] = $type;
					$data['sp_price'] = $price;
					$data['sp_description'] = $description;
					$data['sp_language'] = $lang;
					$data['sp_order'] = $order;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['sp_kr_type'] = $type;
					$data['sp_kr_price'] = $price;
					$data['sp_kr_description'] = $description;
					$data['sp_kr_language'] = $lang;
					$data['sp_kr_order'] = $order;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('subscription'));
				}	

				$this->AD->add_subscription($data,$lang);
				$this->session->set_flashdata('success','Subscription plan added successfully !');
				redirect(base_url('subscription'));
			}
			else
			{
				$this->load->view('admin/addsubscription');
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function managesubscription()
	{
		$this->admin_access();
		if($this->input->post('search'))
		{
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');

			if($this->form_validation->run())
			{
				$lang = $this->input->post('language');
				$data['subscription'] = $this->AD->manage_subscription($lang);
				$this->load->view('admin/managesubscription',$data);
			}
			else
			{
				$data['subscription'] = $this->AD->manage_subscription($lang);
				$this->load->view('admin/managesubscription',$data);
			}
		}
		else
		{
			$lang = $this->input->post('language');
			$data['subscription'] = $this->AD->manage_subscription($lang);
			$this->load->view('admin/managesubscription',$data);
		}
	}

	public function editsubscription()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$data['subscription'] = $this->AD->edit_subscription($id,$lang);
		$this->load->view('admin/editsubscription',$data);
	}

	public function updatesubscription()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		if($this->input->post('updatesubscription'))
		{
			$this->form_validation->set_rules('type','Type','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('price','Price','trim|min_length[1]|max_length[50]|strip_tags|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('description','Description','trim|min_length[50]|strip_tags|required');
			$this->form_validation->set_rules('order','Order','trim|strip_tags|required|numeric');
			$this->form_validation->set_rules('language','Language','required|strip_tags|trim');
	
			if($this->form_validation->run())
			{
				$type = $this->security->xss_clean($this->input->post('type'));
				$price = $this->security->xss_clean($this->input->post('price'));
				$status = $this->security->xss_clean($this->input->post('status'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$lang = $this->security->xss_clean($this->input->post('language'));   

				if($lang=='EN')
				{
					$data = array();
					$data['sp_type'] = $type;
					$data['sp_price'] = $price;
					$data['sp_description'] = $description;
					$data['sp_language'] = $lang;
				}
				elseif($lang=='KR')
				{
					$data = array();
					$data['sp_kr_type'] = $type;
					$data['sp_kr_price'] = $price;
					$data['sp_kr_description'] = $description;
					$data['sp_kr_language'] = $lang;
				}
				else
				{
					$this->session->set_flashdata('danger','Please select language from given parameters !');
					redirect(base_url('editsubscription'));
				}	

				$this->AD->update_subscription($id,$data,$lang);
				$this->session->set_flashdata('success','Subscription plan updated successfully !');
				redirect(base_url('managesubscription'));
			}
			else
			{
				$id = $this->uri->segment('2');
				$lang = $this->uri->segment('3');
				$data['subscription'] = $this->AD->edit_subscription($id,$lang);
				$this->load->view('admin/editsubscription',$data);
			}
		}
		else
		{
			$this->admin_access();
			redirect(base_url('dashboard'));		
		}
	}

	public function deletesubscription()
	{
		$this->admin_access();
		$id = $this->uri->segment('2');
		$lang = $this->uri->segment('3');
		$this->AD->delete_subscription($id,$lang);
		$this->session->set_flashdata('danger','Subscription deleted successfully !');
		redirect(base_url('managesubscription'));
	}

	public function reward()
	{
		$this->admin_access();
		$this->load->view('admin/addreward');
	}

	public function branchtimeslot()
	{
		$this->admin_access();
		$lang = $this->session->userdata('language');
		if($lang=='EN')
		{
			$data['timeslot'] = $this->AD->manage_timeslot($lang);
			$this->load->view('admin/branchtimeslot',$data);
		}
		elseif($lang=='KR')
		{
			$data['timeslot'] = $this->AD->manage_timeslot($lang);
			$this->load->view('admin/branchtimeslot',$data);
		}
		else
		{
			$data['timeslot'] = $this->AD->manage_timeslot($lang);
			$this->load->view('admin/branchtimeslot',$data);
		}
	}
}
?>