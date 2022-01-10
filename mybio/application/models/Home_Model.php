<?php
class Home_Model extends CI_Model 
{
	public function add_user($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_users_en',$data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_users_kr',$data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		else
		{
			echo "";
		}
	}

	public function edit_profile($id)
	{

		$this->db->select('*');
		$this->db->where('u_id',$id);
		$select = $this->db->get('tbl_users_en');
		$data = $select->row();
		return $data;
	}

	public function update_profile($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('u_id',$id);
			$this->db->update('tbl_users_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('u_kr_id',$id);
			$this->db->update('tbl_users_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function send_otp($data,$lang)
	{
		if($lang=='EN')
		{
			$insert = $this->db->insert('tbl_otp_en',$data);
			return $insert;
		}
		elseif($lang=='KR')
		{
			$insert = $this->db->insert('tbl_otp_kr',$data);
			return $insert;
		}
		else
		{
			echo "";
		}
	}

	public function update_otp($mobile,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('o_mobile_number',$mobile);
			$update = $this->db->update('tbl_otp_en',$data);
			return $update;
		}
		elseif($lang=='KR')
		{
			$this->db->where('o_kr_mobile_number',$mobile);
			$update = $this->db->update('tbl_otp_kr',$data);
			return $update;
		}
		else
		{
			echo "";
		}
	}

	public function verify_otp($id,$data,$lang)
	{
		if($lang=='EN')
		{	
			$this->db->where('o_user_id',$id);
			$update = $this->db->update('tbl_otp_en',$data);
			return $update;
		}
		elseif($lang=='KR')
		{	
			$this->db->where('o_kr_user_id',$id);
			$update = $this->db->update('tbl_otp_kr',$data);
			return $update;
		}
		else
		{
			echo "";
		}
	}

	public function forgotpassword($email)
    {
	    $this->db->select('email');
	    $this->db->from('tbl_user');
	    $this->db->where('email', $email);
	    $query=$this->db->get('tbl_users');
	    return $query->row_array();
    }

	public function add_to_cart($data,$lang)
	{	
		if($lang=='EN')
		{
			$this->db->insert('tbl_cart_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_cart_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function update_cart($user_id,$product_id,$data,$lang,$type)
	{
		if($lang=='EN')
		{
			$this->db->where('ca_type',$type);
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_product_id',$product_id);
			$this->db->update('tbl_cart_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('ca_type',$type);
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_product_id',$product_id);
			$this->db->update('tbl_cart_kr',$data);
		}
		else
		{
			echo "";
		}
	}	

	public function manage_cart($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('ca_user_id',$id);
			$select = $this->db->get('tbl_cart_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->where('ca_kr_user_id',$id);
			$select = $this->db->get('tbl_cart_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function add_user_query($data)
	{
		$this->db->insert('tbl_user_query',$data);
	}

	public function change_password($id,$data)
	{
		$this->db->where('u_id',$id);
		$update = $this->db->update('tbl_users',$data);
		return $update;
	}

	public function create_verification_code($data)
	{
		$insert = $this->db->insert('tbl_verification_code',$data);
		return $insert;
	}

	public function update_verification_code($id,$data)
	{
		$this->db->where('vc_user_id',$id);
		$update = $this->db->update('tbl_verification_code',$data);
		return $data;
	}

	public function add_address($data)
	{
		$insert = $this->db->insert('tbl_address',$data);
		return $insert;
	}

	public function update_address($id,$data)
	{
		$this->db->where('ad_id',$id);
		$update = $this->db->update('tbl_address',$data);
		return $update;
	}

	public function delete_address($id,$address_id)
	{
		$this->db->where('ad_id',$address_id);
		$this->db->where('ad_user_id',$id);
		$delete = $this->db->delete('tbl_address');
		return $delete;
	}

	public function test_detail($id)
	{
		$this->db->select('*');
		$this->db->where('t_id',$id);
		$select = $this->db->get('tbl_test_en');
		$data = $select->row();
		return $data;
	}

	public function branch_detail($id)
	{
		$this->db->select('*');
		$this->db->where('b_id',$id);
		$select = $this->db->get('tbl_branch_en');
		$data = $select->row();
		return $data;
	}

	public function product_slug($slug,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('p_slug',$slug);
			$select = $this->db->get('tbl_product_en');
			$product = $select->row();
			return $product;
		}
		elseif($lang=='KR')
		{
			$this->db->where('p_kr_slug',$slug);
			$select = $this->db->get('tbl_product_kr');
			$product = $select->row();
			return $product;
		}
		else
		{
			echo "";
		}
	}

	public function test_slug($slug,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('t_slug',$slug);
			$select = $this->db->get('tbl_test_en');
			$test = $select->row();
			return $test;
		}
		elseif($lang=='KR')
		{
			$this->db->where('t_kr_slug',$slug);
			$select = $this->db->get('tbl_test_kr');
			$test = $select->row();
			return $test;
		}
		else
		{
			echo "";
		}
	}

	public function kit_slug($slug,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('k_slug',$slug);
			$select = $this->db->get('tbl_kit_en');
			$kit = $select->row();
		}
		elseif($lang=='KR')
		{
			$this->db->where('k_kr_slug',$slug);
			$select = $this->db->get('tbl_kit_kr');
			$kit = $select->row();
		}
		else
		{
			echo "";
		}
	}

	public function category_slug($slug,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('c_slug',$slug);
			$select = $this->db->get('tbl_category_en');
			$category = $select->row();
		}
		elseif($lang=='KR')
		{
			$this->db->where('c_kr_slug',$slug);
			$select = $this->db->get('tbl_category_kr');
			$category = $select->row();
		}
		else
		{
			echo "";
		}
	}

	public function check_cart_value($user_id,$lang,$type)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_type',$type);
			$select = $this->db->get('tbl_cart_en');
			$num = $select->num_rows();
			return $num;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_type',$type);
			$select = $this->db->get('tbl_cart_kr');
			$num = $select->num_rows();
			return $num;
		}
		else
		{
			echo "";
		}
	}

	public function check_cart_value_exist($user_id,$type,$lang,$product_id)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_product_id',$product_id);
			$this->db->where('ca_type',$type);
			$select = $this->db->get('tbl_cart_en');
			$cart_exist = $select->num_rows();
			return $cart_exist;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_product_id',$product_id);
			$this->db->where('ca_kr_type',$type);
			$select = $this->db->get('tbl_cart_kr');
			$cart_exist = $select->num_rows();
			return $cart_exist;
		}
		else
		{
			echo "";
		}
	}

	public function get_cart_value($user_id,$type,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('ca_id','desc');
			$this->db->where('ca_user_id',$user_id);
			$this->db->where('ca_type',$type);
			$select = $this->db->get('tbl_cart_en');
			$cart_value = $select->row();
			return $cart_value;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('ca_id','desc');
			$this->db->where('ca_kr_user_id',$user_id);
			$this->db->where('ca_kr_type',$type);
			$select = $this->db->get('tbl_cart_kr');
			$cart_value = $select->row();
			return $cart_value;
		}
		else
		{
			echo "";
		}
	}
}
?>