<?php
class Branch_Model extends CI_Model 
{
	public function edit_profile($id,$lang)
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

	public function update_profile($id,$data,$lang)
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

	public function change_password($id,$data1,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('b_id',$id);
			$this->db->update('tbl_branch',$data1);
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

	public function add_staff($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_staff_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_staff_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_staff($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('st_id','desc');
			$select = $this->db->get('tbl_staff_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('st_kr_id','desc');
			$select = $this->db->get('tbl_staff_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function edit_staff($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('st_id',$id);
			$select = $this->db->get('tbl_staff_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('st_kr_id',$id);
			$select = $this->db->get('tbl_staff_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}

	}

	public function update_staff($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('st_id',$id);
			$this->db->update('tbl_staff_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('st_id',$id);
			$this->db->update('tbl_staff_en',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_staff($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('st_id',$id);
			$this->db->delete('tbl_staff_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('st_kr_id',$id);
			$this->db->delete('tbl_staff_kr');	
		}
		else
		{
			echo "";
		}
	}

	public function add_timeslot($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_time_slot_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_time_slot_kr',$data);
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
			echo "";
		}
	}

	public function edit_timeslot($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('ts_id',$id);
			$select = $this->db->get('tbl_time_slot_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('ts_kr_id',$id);
			$select = $this->db->get('tbl_time_slot_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_timeslot($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('ts_id',$id);
			$this->db->update('tbl_time_slot_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('ts_kr_id',$id);
			$this->db->update('tbl_time_slot_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_timeslot($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('ts_id',$id);
			$this->db->delete('tbl_time_slot_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('ts_kr_id',$id);
			$this->db->delete('tbl_time_slot_kr');
		}
		else
		{
			echo "";
		}
	}

	public function add_ticket($data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->insert('tbl_help_support_en',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->insert('tbl_help_support_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function manage_ticket($lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->order_by('hs_id','desc');
			$select = $this->db->get('tbl_help_support_en');
			$data = $select->result_array();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->order_by('hs_kr_id','desc');
			$select = $this->db->get('tbl_help_support_kr');
			$data = $select->result_array();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function edit_ticket($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->select('*');
			$this->db->where('hs_id',$id);
			$select = $this->db->get('tbl_help_support_en');
			$data = $select->row();
			return $data;
		}
		elseif($lang=='KR')
		{
			$this->db->select('*');
			$this->db->where('hs_kr_id',$id);
			$select = $this->db->get('tbl_help_support_kr');
			$data = $select->row();
			return $data;
		}
		else
		{
			echo "";
		}
	}

	public function update_ticket($id,$data,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('hs_id',$id);
			$this->db->update('tbl_help_support',$data);
		}
		elseif($lang=='KR')
		{
			$this->db->where('hs_kr_id',$id);
			$this->db->update('tbl_help_support_kr',$data);
		}
		else
		{
			echo "";
		}
	}

	public function delete_ticket($id,$lang)
	{
		if($lang=='EN')
		{
			$this->db->where('hs_id',$id);
			$this->db->delete('tbl_help_support_en');
		}
		elseif($lang=='KR')
		{
			$this->db->where('hs_kr_id',$id);
			$this->db->delete('tbl_help_support_kr');
		}
		else
		{
			echo "";
		}
	}

	public function appointment_history($id,$lang)
	{
		if($id=='0')
		{
			if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->where('ap_status','0');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->where('ap_kr_status','0');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
	    elseif($id=='1')
		{
		    if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->where('ap_status','1');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->where('ap_kr_status','1');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
	    elseif($id=='2')
		{
		    if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->where('ap_status','2');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->where('ap_kr_status','2');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
	    elseif($id=='3')
		{
		    if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->where('ap_status','3');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->where('ap_kr_status','3');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
	    elseif($id=='4')
		{
		    if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->where('ap_status','4');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->where('ap_kr_status','4');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
	    else
		{
		   if($lang=='EN')
			{
			    $this->db->select('*');
			    $this->db->order_by('ap_id','desc');
			    $this->db->join('tbl_users_en','tbl_users_en.u_id = tbl_appointments_en.ap_user_id');
			    $this->db->join('tbl_branch_en','tbl_branch_en.b_id = tbl_appointments_en.ap_lab_id');
			    $this->db->join('tbl_test_en','tbl_test_en.t_id = tbl_appointments_en.ap_test_id');
			    $this->db->join('tbl_category_en','tbl_category_en.c_id = tbl_appointments_en.ap_lab_category_id');
			    $select = $this->db->get('tbl_appointments_en');
			    $data = $select->result_array();
			    return $data;
			}
			elseif($lang=='KR')
			{
				$this->db->select('*');
			    $this->db->order_by('ap_kr_id','desc');
			    $this->db->join('tbl_users_kr','tbl_users_kr.u_kr_id = tbl_appointments_kr.ap_kr_user_id');
			    $this->db->join('tbl_branch_kr','tbl_branch_kr.b_kr_id = tbl_appointments_kr.ap_kr_lab_id');
			    $this->db->join('tbl_test_kr','tbl_test_kr.t_kr_id = tbl_appointments_kr.ap_kr_test_id');
			    $this->db->join('tbl_category_kr','tbl_category_kr.c_kr_id = tbl_appointments_kr.ap_kr_lab_category_id');
			    $select = $this->db->get('tbl_appointments_kr');
			    $data = $select->result_array();
			    return $data;
			}
			else
			{
				echo "";
			}
	    }
    }
    public function appointment_status($id,$lang)
	{
		$this->db->where('ap_id',$id);
		$select = $this->db->get('tbl_appointments');
		$data = $select->row();
		return $data;
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
			echo "";
		}
	}

	public function view_product($id,$lang)
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
			echo "";
		}
	}
}
?>