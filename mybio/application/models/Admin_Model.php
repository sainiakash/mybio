<?php
class Admin_Model extends CI_Model 
{
	public function edit_profile($id)
	{
		$this->db->select('*');
		$this->db->where('a_id',$id);
		$select = $this->db->get('tbl_admin');
		$data = $select->row();
		return $data;
	}

	public function update_profile($id,$data)
	{
		$this->db->where('a_id',$id);
		$this->db->update('tbl_admin',$data);
	}

	public function change_password($id,$data1)
	{
		$this->db->where('a_id',$id);
		$this->db->update('tbl_admin',$data1);
	}

	public function add_banner($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_banner_en',$data);
    	}
    	elseif($lang=='KR')
    	{
    		$this->db->insert('tbl_banner_kr',$data);
    	}
    	else
    	{
    		echo "";
    	}
	}

	public function manage_banner($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('b_id','desc');
			$select = $this->db->get('tbl_banner_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('b_kr_id','desc');
			$select = $this->db->get('tbl_banner_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('b_id','desc');
			$select = $this->db->get('tbl_banner_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_banner($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('b_id',$id);
			$select = $this->db->get('tbl_banner_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('b_kr_id',$id);
			$select = $this->db->get('tbl_banner_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_banner($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('b_id',$id);
			$this->db->update('tbl_banner_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('b_kr_id',$id);
			$this->db->update('tbl_banner_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_banner($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('b_id',$id);
			$this->db->delete('tbl_banner_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('b_kr_id',$id);
			$this->db->delete('tbl_banner_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_kit($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_kit_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_kit_kr',$data);
		}
		else
		{
			echo "";
		}	
	}

	public function manage_kit($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('k_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_kit_en.k_category_id');
			$select = $this->db->get('tbl_kit_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('k_kr_id','desc');
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_kit_kr.k_kr_category_id');
			$select = $this->db->get('tbl_kit_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('k_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_kit_en.k_category_id');
			$select = $this->db->get('tbl_kit_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_kit($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('k_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_kit_en.k_category_id');
			$select = $this->db->get('tbl_kit_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('k_kr_id',$id);
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_kit_kr.k_kr_category_id');
			$select = $this->db->get('tbl_kit_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->where('k_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_kit_en.k_category_id');
			$select = $this->db->get('tbl_kit_en');
			$data = $select->row();
			return $data;
		}
	}

	public function update_kit($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('k_id',$id);
			$this->db->update('tbl_kit_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('k_kr_id',$id);
			$this->db->update('tbl_kit_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_kit($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('k_id',$id);
			$this->db->delete('tbl_kit_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('k_kr_id',$id);
			$this->db->delete('tbl_kit_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_product($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_product_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_product_kr',$data);
		}
		else
		{
			echo "";
		}	
	}

	public function manage_product($lang)
	{	
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('p_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_product_en.p_category_id');
			$select = $this->db->get('tbl_product_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('p_kr_id','desc');
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_product_kr.p_kr_category_id');
			$select = $this->db->get('tbl_product_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('p_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_product_en.p_category_id');
			$select = $this->db->get('tbl_product_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function view_product($id,$lang)
	{
		$this->db->select('*');
		$this->db->where('p_id',$id);
		$this->db->join('tbl_category','tbl_category.c_id = tbl_product.p_category_id');
		$select = $this->db->get('tbl_product');
		$data = $select->row();
		return $data;
	}

	public function edit_product($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('p_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_product_en.p_category_id');
			$select = $this->db->get('tbl_product_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('p_kr_id',$id);
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_product_kr.p_kr_category_id');
			$select = $this->db->get('tbl_product_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_product($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('p_id',$id);
			$this->db->update('tbl_product_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('p_kr_id',$id);
			$this->db->update('tbl_product_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_product($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('p_id',$id);
			$this->db->delete('tbl_product_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('p_kr_id',$id);
			$this->db->delete('tbl_product_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_test($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_test_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_test_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_test($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('t_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_test_en.t_category_id');
			$select = $this->db->get('tbl_test_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('t_kr_id','desc');
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_test_kr.t_kr_category_id');
			$select = $this->db->get('tbl_test_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('t_id','desc');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_test_en.t_category_id');
			$select = $this->db->get('tbl_test_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_test($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('t_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_test_en.t_category_id');
			$select = $this->db->get('tbl_test_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('t_kr_id',$id);
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_test_kr.t_kr_category_id');
			$select = $this->db->get('tbl_test_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->where('t_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_test_en.t_category_id');
			$select = $this->db->get('tbl_test_en');
			$data = $select->row();
			return $data;
		}
	}

	public function update_test($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('t_id',$id);
			$this->db->update('tbl_test_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('t_kr_id',$id);
			$this->db->update('tbl_test_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_test($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('t_id',$id);
			$this->db->delete('tbl_test_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('t_kr_id',$id);
			$this->db->delete('tbl_test_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_branch($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_branch_en',$data);
    	}
    	elseif($lang=='KR')
    	{
    		$this->db->insert('tbl_branch_kr',$data);
    	}
    	else
    	{
    		echo "";
    	}
	}

	public function manage_branch($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('b_id','desc');
			$select = $this->db->get('tbl_branch_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('b_kr_id','desc');
			$select = $this->db->get('tbl_branch_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('b_id','desc');
			$select = $this->db->get('tbl_branch_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_branch($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('b_id',$id);
			$select = $this->db->get('tbl_branch_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('b_kr_id',$id);
			$select = $this->db->get('tbl_branch_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_branch($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('b_id',$id);
			$this->db->update('tbl_branch_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('b_kr_id',$id);
			$this->db->update('tbl_branch_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_branch($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('b_id',$id);
			$this->db->delete('tbl_branch_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('b_kr_id',$id);
			$this->db->delete('tbl_branch_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_coupon($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_coupon_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_coupon_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_coupon($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('co_id','desc');
			$select = $this->db->get('tbl_coupon_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('co_kr_id','desc');
			$select = $this->db->get('tbl_coupon_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('co_id','desc');
			$select = $this->db->get('tbl_coupon_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_coupon($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('co_id',$id);
			$select = $this->db->get('tbl_coupon_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('co_kr_id',$id);
			$select = $this->db->get('tbl_coupon_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->where('co_id',$id);
			$select = $this->db->get('tbl_coupon_en');
			$data = $select->row();
			return $data;
		}	
	}

	public function update_coupon($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('co_id',$id);
			$this->db->update('tbl_coupon_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('co_kr_id',$id);
			$this->db->update('tbl_coupon_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_coupon($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('co_id',$id);
			$this->db->delete('tbl_coupon_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('co_kr_id',$id);
			$this->db->delete('tbl_coupon_kr');
		}
		else
		{
			echo "";
		}
	}

	public function edit_privacy_policy()
	{
		$this->db->select('*');
		$select = $this->db->get('tbl_privacy_policy');
		$data = $select->row();
		return $data;
	}

	public function update_privacy_policy($id,$data)
	{	
		$this->db->where('pp_id',$id);
		$this->db->update('tbl_privacy_policy',$data);
	}

	public function edit_terms_condition()
	{
		$this->db->select('*');
		$select = $this->db->get('tbl_terms_conditions');
		$data = $select->row();
		return $data;
	}

	public function update_terms_condition($id,$data)
	{	
		$this->db->where('tc_id',$id);
		$this->db->update('tbl_terms_conditions',$data);
	}

	public function add_category($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_category_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_category_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_category($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('c_id','desc');
			$select = $this->db->get('tbl_category_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('c_kr_id','desc');
			$select = $this->db->get('tbl_category_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('c_id','desc');
			$select = $this->db->get('tbl_category_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_category($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('c_id',$id);
			$select = $this->db->get('tbl_category_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('c_kr_id',$id);
			$select = $this->db->get('tbl_category_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_category($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('c_id',$id);
			$this->db->update('tbl_category_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('c_kr_id',$id);
			$this->db->update('tbl_category_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_category($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('c_id',$id);
			$this->db->delete('tbl_category_en');
		}
		elseif($lang=='KR')
		{
			
			$this->db->where('c_kr_id',$id);
			$this->db->delete('tbl_category_kr');
		}
		else
		{
			echo "";
		}
	}

	public function get_category($status)
	{
		$this->db->select('*');
		$this->db->where('c_type',$status);
		$select = $this->db->get('tbl_category_en');
		$data = $select->result_array();
		return $data;
	}

	public function registered_user($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('u_id','desc');
			$select = $this->db->get('tbl_users_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('u_kr_id','desc');
			$select = $this->db->get('tbl_users_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('u_id','desc');
			$select = $this->db->get('tbl_users_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function view_user($id)
	{
		$this->db->select('*');
		$this->db->where('u_id',$id);
		$select = $this->db->get('tbl_users');
		$data = $select->row();
		return $data;
	}

	public function manage_enquiry()
	{
		$this->db->select('*');
		$this->db->order_by('uq_id','desc');
		$select = $this->db->get('tbl_user_query');
		$data = $select->result_array();
		return $data;
	}

	public function appointment_history($id)
	{
		if($id=='1')
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->where('ap_status','1');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='2')
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->where('ap_status','2');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='3')
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->where('ap_status','3');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='4')
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->where('ap_status','4');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='0')
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->where('ap_status','0');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select();
			$this->db->order_by('ap_id','desc');
			$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
			$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
			$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
			$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	        $select = $this->db->get('tbl_appointments');  
			$data = $select->result_array();
			return $data;
		}
	}

	public function appointment_status($id)
	{
		$this->db->where('ap_id',$id);
		$select = $this->db->get('tbl_appointments');
		$data = $select->row();
		return $data;
	}

	public function order_report($id)
	{
		if($id=='0')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','0');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='1')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','1');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='2')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','2');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='3')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','3');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='4')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','4');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='5')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','5');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		elseif($id=='6')
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->where('o_status','6');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('o_id','desc');
			$this->db->join('tbl_delivery_address', 'tbl_delivery_address.d_id = tbl_orders.o_delivery_address_id');
			$this->db->join('tbl_kit', 'tbl_kit.k_id = tbl_orders.o_product_id');
			$this->db->join('tbl_users', 'tbl_users.u_id = tbl_orders.o_user_id');
			$select = $this->db->get('tbl_orders');
			$data = $select->result_array();
			return $data;
		}
	}

	public function view_appointment_history($id)
	{
		$this->db->select();
		$this->db->where('ap_id',$id);
		$this->db->join('tbl_users','tbl_users.u_id = tbl_appointments.ap_user_id');
		$this->db->join('tbl_branch','tbl_branch.b_id = tbl_appointments.ap_lab_id');
		$this->db->join('tbl_test','tbl_test.t_id = tbl_appointments.ap_test_id');
		$this->db->join('tbl_category','tbl_category.c_id = tbl_appointments.ap_lab_category_id');
	    $select = $this->db->get('tbl_appointments');  
		$data = $select->row();
		return $data;
	}

	public function add_news($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_news_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_news_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function edit_news($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('n_id',$id);
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_news_en.n_id');
			$select = $this->db->get('tbl_news_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('n_kr_id',$id);
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_news_kr.n_kr_id');
			$select = $this->db->get('tbl_news_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function manage_news($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_news_en.n_category_id');
			$select = $this->db->get('tbl_news_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_news_kr.n_kr_category_id');
			$select = $this->db->get('tbl_news_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_news_en.n_category_id');
			$select = $this->db->get('tbl_news_en');
			$data = $select->result_array();
			return $data;
		}		
	}
	
	public function update_news($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('n_id',$id);
			$this->db->update('tbl_news_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('n_kr_id',$id);
			$this->db->update('tbl_news_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_news($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('n_id',$id);
			$this->db->delete('tbl_news_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('n_kr_id',$id);
			$this->db->delete('tbl_news_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_location($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_location_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_location_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_location($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('l_country','asc');
			$select = $this->db->get('tbl_location_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('l_kr_country','asc');
			$select = $this->db->get('tbl_location_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('l_country','asc');
			$select = $this->db->get('tbl_location_en');
			$data = $select->result_array();
			return $data;
		}
	}

	public function edit_location($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('l_id',$id);
			$select = $this->db->get('tbl_location_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('l_kr_id',$id);
			$select = $this->db->get('tbl_location_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}
	
	public function update_location($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('l_id',$id);
			$this->db->update('tbl_location_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('l_kr_id',$id);
			$this->db->update('tbl_location_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_location($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('l_id',$id);
			$this->db->delete('tbl_location_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('l_kr_id',$id);
			$this->db->delete('tbl_location_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_testimonial($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_testimonial_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_testimonial_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_testimonial($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('tm_id','desc');
			$select = $this->db->get('tbl_testimonial_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('tm_kr_id','desc');
			$select = $this->db->get('tbl_testimonial_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('tm_id','desc');
			$select = $this->db->get('tbl_testimonial_en');
			$data = $select->result_array();
			return $data;
		}	
	}

	public function edit_testimonial($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('tm_id',$id);
			$select = $this->db->get('tbl_testimonial_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('tm_kr_id',$id);
			$select = $this->db->get('tbl_testimonial_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}
	
	public function update_testimonial($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('tm_id',$id);
			$this->db->update('tbl_testimonial_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('tm_kr_id',$id);
			$this->db->update('tbl_testimonial_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_testimonial($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('tm_id',$id);
			$this->db->delete('tbl_testimonial_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('tm_kr_id',$id);
			$this->db->delete('tbl_testimonial_kr');
		}
		else
		{
			echo "";
		}
	}

	public function change_active_status($id,$data,$name,$lang)
	{ 
		if($name=='User')
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
		}
		elseif($name=='Branch')
		{
			if($lang=='EN')
			{
				$this->db->where('b_id',$id);
				$this->db->update('tbl_branch_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('b_kr_id',$id);
				$this->db->update('tbl_branch_kr',$data);
			}
		}
		elseif($name=='Location')
		{ 
			if($lang=='EN')
			{
				$this->db->where('l_id',$id);
				$this->db->update('tbl_location_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('l_kr_id',$id);
				$this->db->update('tbl_location_kr',$data);
			}
		}
		elseif($name=='Product')
		{ 
			if($lang=='EN')
			{
				$this->db->where('p_id',$id);
				$this->db->update('tbl_product_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('p_kr_id',$id);
				$this->db->update('tbl_product_kr',$data);
			}
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$this->db->where('t_id',$id);
				$this->db->update('tbl_test_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('t_kr_id',$id);
				$this->db->update('tbl_test_kr',$data);
			}
		}
		elseif($name=='Kit')
		{ 
			if($lang=='EN')
			{
				$this->db->where('k_id',$id);
				$this->db->update('tbl_kit_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('k_kr_id',$id);
				$this->db->update('tbl_kit_kr',$data);
			}
		}
		elseif($name=='Banner')
		{ 
			if($lang=='EN')
			{
				$this->db->where('b_id',$id);
				$this->db->update('tbl_banner_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('b_kr_id',$id);
				$this->db->update('tbl_banner_kr',$data);
			}
			
		}
		elseif($name=='Category')
		{ 
			if($lang=='EN')
			{
				$this->db->where('c_id',$id);
				$this->db->update('tbl_category_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('c_kr_id',$id);
				$this->db->update('tbl_category_kr',$data);
			}
		}
		elseif($name=='News')
		{ 
			if($lang=='EN')
			{
				$this->db->where('n_id',$id);
				$this->db->update('tbl_news_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('n_kr_id',$id);
				$this->db->update('tbl_news_kr',$data);
			}
		}
		elseif($name=='Testimonial')
		{ 
			if($lang=='EN')
			{
				$this->db->where('tm_id',$id);
				$this->db->update('tbl_testimonial_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('tm_kr_id',$id);
				$this->db->update('tbl_testimonial_kr',$data);
			}
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$this->db->where('t_id',$id);
				$this->db->update('tbl_test_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('t_kr_id',$id);
				$this->db->update('tbl_test_kr',$data);
			}
		}
		elseif($name=='Coupon')
		{ 
			if($lang=='EN')
			{
				$this->db->where('co_id',$id);
				$this->db->update('tbl_coupon_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('co_kr_id',$id);
				$this->db->update('tbl_coupon_kr',$data);
			}
		}
		elseif($name=='Subscription')
		{ 
			if($lang=='EN')
			{
				$this->db->where('sp_id',$id);
				$this->db->update('tbl_subscription_plan_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('sp_kr_id',$id);
				$this->db->update('tbl_subscription_plan_kr',$data);
			}
		}
		else
		{
			echo "";
		}
	}

	public function change_inactive_status($id,$data,$name,$lang)
	{
		if($name=='User')
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
		}
		elseif($name=='Branch')
		{
			if($lang=='EN')
			{
				$this->db->where('b_id',$id);
				$this->db->update('tbl_branch_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('b_kr_id',$id);
				$this->db->update('tbl_branch_kr',$data);
			} 
		}
		elseif($name=='Location')
		{ 
			if($lang=='EN')
			{
				$this->db->where('l_id',$id);
				$this->db->update('tbl_location_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('l_kr_id',$id);
				$this->db->update('tbl_location_kr',$data);
			}
		}
		elseif($name=='Product')
		{ 
			if($lang=='EN')
			{
				$this->db->where('p_id',$id);
				$this->db->update('tbl_product_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('p_kr_id',$id);
				$this->db->update('tbl_product_kr',$data);
			}
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$this->db->where('t_id',$id);
				$this->db->update('tbl_test_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('t_kr_id',$id);
				$this->db->update('tbl_test_kr',$data);
			}
		}
		elseif($name=='Kit')
		{ 
			if($lang=='EN')
			{
				$this->db->where('k_id',$id);
				$this->db->update('tbl_kit_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('k_kr_id',$id);
				$this->db->update('tbl_kit_kr',$data);
			}
		}
		elseif($name=='Banner')
		{ 
			if($lang=='EN')
			{
				$this->db->where('b_id',$id);
				$this->db->update('tbl_banner_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('b_kr_id',$id);
				$this->db->update('tbl_banner_kr',$data);
			}
			
		}
		elseif($name=='Category')
		{ 
			if($lang=='EN')
			{
				$this->db->where('c_id',$id);
				$this->db->update('tbl_category_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('c_kr_id',$id);
				$this->db->update('tbl_category_kr',$data);
			}
		}
		elseif($name=='News')
		{ 
			if($lang=='EN')
			{
				$this->db->where('n_id',$id);
				$this->db->update('tbl_news_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('n_kr_id',$id);
				$this->db->update('tbl_news_kr',$data);
			}
		}
		elseif($name=='Testimonial')
		{ 
			if($lang=='EN')
			{
				$this->db->where('tm_id',$id);
				$this->db->update('tbl_testimonial_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('tm_kr_id',$id);
				$this->db->update('tbl_testimonial_kr',$data);
			}
		}
		elseif($name=='Test')
		{ 
			if($lang=='EN')
			{
				$this->db->where('t_id',$id);
				$this->db->update('tbl_test_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('t_kr_id',$id);
				$this->db->update('tbl_test_kr',$data);
			}
		}
		elseif($name=='Coupon')
		{ 
			if($lang=='EN')
			{
				$this->db->where('co_id',$id);
				$this->db->update('tbl_coupon_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('co_kr_id',$id);
				$this->db->update('tbl_coupon_kr',$data);
			}
		}
		elseif($name=='Subscription')
		{ 
			if($lang=='EN')
			{
				$this->db->where('sp_id',$id);
				$this->db->update('tbl_subscription_plan_en',$data);
			}
			elseif($lang=='KR')
			{
				$this->db->where('sp_kr_id',$id);
				$this->db->update('tbl_subscription_plan_kr',$data);
			}
		}
		else
		{
			echo "";
		}
	}

	public function add_subscription($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_subscription_plan_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_subscription_plan_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_subscription($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('sp_id','desc');
			$select = $this->db->get('tbl_subscription_plan_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('sp_kr_id','desc');
			$select = $this->db->get('tbl_subscription_plan_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('sp_id','desc');
			$select = $this->db->get('tbl_subscription_plan_en');
			$data = $select->result_array();
			return $data;
		}	
	}

	public function edit_subscription($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('sp_id',$id);
			$select = $this->db->get('tbl_subscription_plan_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('sp_kr_id',$id);
			$select = $this->db->get('tbl_subscription_plan_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}
	
	public function update_subscription($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('sp_id',$id);
			$this->db->update('tbl_subscription_plan_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('sp_kr_id',$id);
			$this->db->update('tbl_subscription_plan_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_subscription($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('sp_id',$id);
			$this->db->delete('tbl_subscription_plan_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('sp_kr_id',$id);
			$this->db->delete('tbl_subscription_plan_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_reward($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_reward_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_reward_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_reward($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('re_id','desc');
			$select = $this->db->get('tbl_reward_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('re_kr_id','desc');
			$select = $this->db->get('tbl_reward_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('re_id','desc');
			$select = $this->db->get('tbl_reward_en');
			$data = $select->result_array();
			return $data;
		}	
	}

	public function edit_reward($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('re_id',$id);
			$select = $this->db->get('tbl_reward_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('re_kr_id',$id);
			$select = $this->db->get('tbl_reward_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}
	
	public function update_reward($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('re_id',$id);
			$this->db->update('tbl_reward_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('re_kr_id',$id);
			$this->db->update('tbl_reward_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_reward($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('re_id',$id);
			$this->db->delete('tbl_reward_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('re_kr_id',$id);
			$this->db->delete('tbl_reward_kr');
		}
		else
		{
			echo "";
		}
	}

	public function manage_timeslot($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('ts_id','desc');
			$select = $this->db->get('tbl_time_slot_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('ts_kr_id','desc');
			$select = $this->db->get('tbl_time_slot_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			$this->db->select('*');
			$this->db->order_by('ts_id','desc');
			$select = $this->db->get('tbl_time_slot_en');
			$data = $select->result_array();
			return $data;
		}
	}
}
?>