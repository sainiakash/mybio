<?php
class Api_Model extends CI_Model 
{
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

	public function add_to_cart($data)
	{
		$insert = $this->db->insert('tbl_cart',$data);
		return $insert;
	}
}
?>