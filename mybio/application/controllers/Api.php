<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    
class Api extends CI_Controller 
{    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model','HM');
		$this->load->library('Authorization_Token');
		$this->load->library('common');
		$this->load->library('email'); 
		$this->load->library('phpmailer_lib');   
	}

	public function verify_token()
	{
		$headers = $this->input->request_headers();
		
		if(array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) 
		{
			$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

			if ($decodedToken['status'] === true) 
			{
				return $decodedToken;
			}
		}

		echo json_encode(array("status" => '0',"message" => 'Token is mismatched !'));
		exit();
	}

	public function push_notification()
	{
		$load = array();

		$a=array();
		$a['title'] = 'Mybio23';
        $a['msg'] = 'Test Message';

        $load['data']['title'] = 'Mybio23';
        $load['data']['is_background'] = false;
        $load['data']['message'] = 'mesage';
        $load['data']['image'] = '';
        $load['data']['payload'] = $a;
        $load['data']['timestamp'] = date('Y-m-d h:i:s');

        $token[] = 'esMKAa0vTv6EvdChL1KNra:APA91bH6MdYoRcuMQQUlqvJ3sQcMcEE823YIcnFeiyBgD4HKo_47HJpO49amJ0fLDNM8WS9DCn_-ixv7jstojPJhNTaxVMjpItwEtkPrMJWZ_6xvaTJnapskABprOdKm9B2Oi-VVvlZH';

        $this->common->android_push($token,$load,'AAAA3lhZSKA:APA91bFWwLlj_YW3M3VRJJvLmzAzatVnGyVKmewnMEwtyXFVXmQYe2YsJ4sZv_ywve9UZNrEQmMG3GtDO0_dJCU2l2Uwx4_u0OGxaKenHEcBBAVs3AncWohZttJipKRUndGbxUkHN_Gp');
        echo json_encode($load);
	}
 
	public function register()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
	 	{
			$register_post = file_get_contents("php://input");
			$decode_post = json_decode($register_post);

			if(count((array)$decode_post)==13)
			{
				if(!empty($decode_post->name) && !empty($decode_post->email) && !empty($decode_post->mobile) && !empty($decode_post->password) && !empty($decode_post->country) && !empty($decode_post->state) && !empty($decode_post->city) && !empty($decode_post->street) && !empty($decode_post->postalcode) && !empty($decode_post->device_id) && !empty($decode_post->firebase_token) && !empty($decode_post->message_key) && !empty($decode_post->language))
				{
					if($decode_post->language=='EN')
					{
						// Check user email address already exist or not
						$this->db->select('*');
						$this->db->where('u_email',$decode_post->email);
						$select1 = $this->db->get('tbl_users_en');
						$num1 = $select1->num_rows(); 

						// Check user mobile number already exist or not
						$this->db->select('*');
						$this->db->where('u_mobile',$decode_post->mobile);
						$select = $this->db->get('tbl_users_en');
						$num = $select->num_rows();

						if($num1==0)
						{
							if($num==0)
							{
								$data = array();
								$data['u_name'] = $decode_post->name;
								$data['u_email'] = $decode_post->email;
								$data['u_mobile'] = $decode_post->mobile;
								$data['u_password'] = sha1($decode_post->password);
								$data['u_decrypt_password'] = $decode_post->password;
								$data['u_country'] = $decode_post->country;
								$data['u_state'] = $decode_post->state;
								$data['u_city'] = $decode_post->city;
								$data['u_street_address'] = $decode_post->street;
								$data['u_postalcode'] = $decode_post->postalcode;
								$data['u_device_id'] = $decode_post->device_id;
								$data['u_firebase_token'] = $decode_post->firebase_token;
								$data['u_type'] = 'API';
								$data['u_message_key'] = $decode_post->message_key;
								$data['u_language'] = $decode_post->language;
								$data['u_verified'] = '0';

								$insert_id = $this->HM->add_user($data,$decode_post->language);

								// Create User Code
								$char = substr($decode_post->mobile, -4);

								$data=array();
								$data['u_user_code'] = strtoupper('MB'.$char.$insert_id);

								$this->HM->update_profile($insert_id,$data,$decode_post->language);

								// Send otp to user mobile number
								$data=array();
								$data['o_user_id'] = $insert_id; 
								$data['o_mobile_number'] = $decode_post->mobile;
								$data['o_otp'] = '1234';
								$data['o_source'] = 'API';
								$data['o_type'] = 'Verify';

								$insert = $this->HM->send_otp($data,$decode_post->language);

								if($insert)
								{
									echo json_encode(array("status" => '1',"message" => 'OTP has been sent to your phone number !'));
								}
								else
								{
									echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'The mobile number is already exist in our database !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'The email address is already exist in our database !'));
						}
					}
					elseif($decode_post->language=='KR')
					{
						// Check user email address already exist or not
						$this->db->select('*');
						$this->db->where('u_kr_email',$decode_post->email);
						$select1 = $this->db->get('tbl_users_kr');
						$num1 = $select1->num_rows(); 

						// Check user mobile number already exist or not
						$this->db->select('*');
						$this->db->where('u_kr_mobile',$decode_post->mobile);
						$select = $this->db->get('tbl_users_kr');
						$num = $select->num_rows();

						if($num1==0)
						{
							if($num==0)
							{
								$data = array();
								$data['u_kr_name'] = $decode_post->name;
								$data['u_kr_email'] = $decode_post->email;
								$data['u_kr_mobile'] = $decode_post->mobile;
								$data['u_kr_password'] = sha1($decode_post->password);
								$data['u_kr_decrypt_password'] = $decode_post->password;
								$data['u_kr_country'] = $decode_post->country;
								$data['u_kr_state'] = $decode_post->state;
								$data['u_kr_city'] = $decode_post->city;
								$data['u_kr_street_address'] = $decode_post->street;
								$data['u_kr_postalcode'] = $decode_post->postalcode;
								$data['u_kr_device_id'] = $decode_post->device_id;
								$data['u_kr_firebase_token'] = $decode_post->firebase_token;
								$data['u_kr_type'] = 'API';
								$data['u_kr_message_key'] = $decode_post->message_key;
								$data['u_kr_language'] = $decode_post->language;
								$data['u_kr_verified'] = '0';

								$insert_id = $this->HM->add_user($data,$decode_post->language);

								// Create User Code
								$char = substr($decode_post->mobile, -4);

								$data=array();
								$data['u_kr_user_code'] = strtoupper('MB'.$char.$insert_id);

								$this->HM->update_profile($insert_id,$data,$decode_post->language);

								// Send otp to user mobile number
								$data=array();
								$data['o_kr_user_id'] = $insert_id; 
								$data['o_kr_mobile_number'] = $decode_post->mobile;
								$data['o_kr_otp'] = '1234';
								$data['o_kr_source'] = 'API';
								$data['o_kr_type'] = 'Verify';

								$insert = $this->HM->send_otp($data,$decode_post->language);

								if($insert)
								{
									echo json_encode(array("status" => '1',"message" => 'OTP has been sent to your phone number !'));
								}
								else
								{
									echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'The mobile number is already exist in our database !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'The email address is already exist in our database !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'Please choose the language between EN and KR !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The name, email, mobile, password, country, state, city, street, device_id, token, language and mesage key are required fileds !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function login()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$login_post = file_get_contents("php://input");
			$decode_post = json_decode($login_post);

			if(count((array)$decode_post)==6)
			{
				if(!empty($decode_post->email) && !empty($decode_post->password) && !empty($decode_post->device_id) && !empty($decode_post->firebase_token) && !empty($decode_post->language)  && !empty($decode_post->message_key))
				{
					if($decode_post->language=='EN')
					{
						$this->db->select('*');
						$this->db->where('u_email',$decode_post->email);
						$select = $this->db->get('tbl_users_en');
						$run = $select->row();
						$num = $select->num_rows();

						if($num==1)
						{
							$this->db->select('*');
							$this->db->where('u_email',$decode_post->email);
							$this->db->where('u_password',sha1($decode_post->password));
							$select = $this->db->get('tbl_users_en');
							$num1 = $select->num_rows();

							if($num1==1)
							{
								$this->db->select('*');
								$this->db->where('u_email',$decode_post->email);
								$this->db->where('u_password',sha1($decode_post->password));
								$this->db->where('u_language',$decode_post->language);
								$select = $this->db->get('tbl_users_en');
								$num2 = $select->num_rows();

								if($num2==1)
								{
									$token=array();
									$token['device_id'] = $run->u_device_id;
									$token['id'] = $run->u_id;
									$token['time'] = time();

									$jwt_token = $this->authorization_token->generateToken($token);					            

						            // Update user detail
									$data=array();
									$data['u_device_id'] = $decode_post->device_id;
									$data['u_firebase_token'] = $decode_post->firebase_token;
									$data['u_token'] = $jwt_token;

									$this->HM->update_profile($run->u_id,$data,$decode_post->language);

									//Get otp detail
									$this->db->select('*');
									$this->db->where('o_mobile_number',$run->u_mobile);
									$select_otp = $this->db->get('tbl_otp');
									$data_otp = $select_otp->row();
							
									if($run->u_verified=='1')
									{
										$token = $jwt_token;
									}
									else
									{
										$token= '';

										// Send otp to user mobile number
										$data=array();
										$data['o_otp'] = '1234';
										$update = $this->HM->update_otp($run->u_mobile,$data,$decode_post->language);
									}
									
									if($run->u_verified=='1')
									{
										echo json_encode(array("status" => '1',"message" => 'Login successfully !',"token"=>$token,"otp_status"=>'1',"user_id"=>$run->u_user_code));
									}
									else
									{
										echo json_encode(array("status" => '1',"message" => 'An OTP has been send on your registered mobile number  !',"otp_status"=>'0'));
									}
								}
								else
								{
									echo json_encode(array("status" => '0',"message"=>'The language is not match with our database !'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'The password you entered is incorrect !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The email you entered is incorrect !'));
						}
					}
					elseif($decode_post->language=='KR')
					{
						$this->db->select('*');
						$this->db->where('u_kr_email',$decode_post->email);
						$select = $this->db->get('tbl_users_kr');
						$run = $select->row();
						$num = $select->num_rows();

						if($num==1)
						{
							$this->db->select('*');
							$this->db->where('u_kr_email',$decode_post->email);
							$this->db->where('u_kr_password',sha1($decode_post->password));
							$select = $this->db->get('tbl_users_kr');
							$num1 = $select->num_rows();

							if($num1==1)
							{
								$this->db->select('*');
								$this->db->where('u_kr_email',$decode_post->email);
								$this->db->where('u_kr_password',sha1($decode_post->password));
								$this->db->where('u_kr_language',$decode_post->language);
								$select = $this->db->get('tbl_users_kr');
								$num2 = $select->num_rows();

								if($num2==1)
								{
									$token=array();
									$token['device_id'] = $run->u_kr_device_id;
									$token['id'] = $run->u_kr_id;
									$token['time'] = time();

									$jwt_token = $this->authorization_token->generateToken($token);					            

						            // Update user detail
									$data=array();
									$data['u_kr_device_id'] = $decode_post->device_id;
									$data['u_kr_firebase_token'] = $decode_post->firebase_token;
									$data['u_kr_token'] = $jwt_token;

									$this->HM->update_profile($run->u_kr_id,$data,$decode_post->language);

									//Get otp detail
									$this->db->select('*');
									$this->db->where('o_kr_mobile_number',$run->u_kr_mobile);
									$select_otp = $this->db->get('tbl_otp_kr');
									$data_otp = $select_otp->row();
							
									if($run->u_kr_verified=='1')
									{
										$token = $jwt_token;
									}
									else
									{
										$token= '';

										// Send otp to user mobile number
										$data=array();
										$data['o_kr_otp'] = '1234';
										$update = $this->HM->update_otp($run->u_kr_mobile,$data,$decode_post->language);
									}
									
									if($run->u_kr_verified=='1')
									{
										echo json_encode(array("status" => '1',"message" => 'Login successfully !',"token"=>$token,"otp_status"=>'1',"user_id"=>$run->u_kr_user_code));
									}
									else
									{
										echo json_encode(array("status" => '1',"message" => 'An OTP has been send on your registered mobile number  !',"otp_status"=>'0'));
									}
								}
								else
								{
									echo json_encode(array("status" => '0',"message"=>'The language is not match with our database !'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'The password you entered is incorrect !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The email you entered is incorrect !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'Please choose the language between EN and KR !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The email, password, device_id, firebase token, language and message key are required fileds !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON!'));
		}
	}

	public function verify_otp()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$otp_post = file_get_contents("php://input");
			$decode_post = json_decode($otp_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->mobile) && !empty($decode_post->otp) && !empty($decode_post->language))
				{
					if($decode_post->language=='EN')
					{
						$this->db->select('*');
						$this->db->order_by('u_id','desc');
						$this->db->where('u_mobile',$decode_post->mobile);
						$this->db->join('tbl_otp_en','tbl_otp_en.o_user_id = tbl_users_en.u_id');
						$select = $this->db->get('tbl_users_en');
						$run = $select->row();
						$num = $select->num_rows();

						if($num>0)
						{
							if($decode_post->otp==$run->o_otp)
							{
								$data['o_status'] = 1;
								$update = $this->HM->verify_otp($run->u_id,$data,$decode_post->language);

								$token=array();
								$token['device_id'] = $run->u_device_id;
								$token['id'] = $run->u_id;
								$token['time'] = time();

								$jwt_token = $this->authorization_token->generateToken($token);		

					            // Update user detail
								$data1=array();
								$data1['u_token'] = $jwt_token;
								$data1['u_verified'] = "1";

								$this->HM->update_profile($run->u_id,$data1,$decode_post->language);

								if(!empty($update))
								{
									echo json_encode(array("status" => '1',"message"=>'Welcome to MYBIO23 .Your Registration has been successful !',"token"=>$jwt_token,"user_id"=>$run->u_user_code));
								}
								else
								{
									echo json_encode(array("status" => '0',"message" => 'Please verify your mobile number.'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'You entered wrong OTP.'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The mobile number is not match with our database '));
						}
					}
					elseif($decode_post->language=='KR')
					{
						$this->db->select('*');
						$this->db->order_by('u_kr_id','desc');
						$this->db->where('u_kr_mobile',$decode_post->mobile);
						$this->db->join('tbl_otp_kr','tbl_otp_kr.o_kr_user_id = tbl_users_kr.u_kr_id');
						$select = $this->db->get('tbl_users_kr');
						$run = $select->row();
						$num = $select->num_rows();

						if($num>0)
						{
							if($decode_post->otp==$run->o_kr_otp)
							{
								$data['o_kr_status'] = 1;
								$update = $this->HM->verify_otp($run->u_kr_id,$data,$decode_post->language);

								$token=array();
								$token['device_id'] = $run->u_kr_device_id;
								$token['id'] = $run->u_kr_id;
								$token['time'] = time();

								$jwt_token = $this->authorization_token->generateToken($token);		

					            // Update user detail
								$data=array();
								$data['u_kr_token'] = $jwt_token;
								$data['u_kr_verified'] = "1";

								$this->HM->update_profile($run->u_kr_id,$data,$decode_post->language);

								if(!empty($update))
								{
									echo json_encode(array("status" => '1',"message"=>'Welcome to MYBIO23 .Your Registration has been successful !',"token"=>$jwt_token,"user_id"=>$run->u_kr_user_code));
								}
								else
								{
									echo json_encode(array("status" => '0',"message" => 'Please verify your mobile number.'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'You entered wrong OTP.'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The mobile number is not match with our database '));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'Please choose the language between EN and KR !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The mobile, otp and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function resend_otp()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$otp_post = file_get_contents("php://input");
			$decode_post = json_decode($otp_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->mobile) && !empty($decode_post->language) && !empty($decode_post->message_key))
				{
					if($decode_post->language=='EN')
					{
						$this->db->select('*');
						$this->db->where('u_mobile',$decode_post->mobile);
						$select = $this->db->get('tbl_users_en');
						$run = $select->row();
						$num = $select->num_rows();
						if($num>0)
						{
							// Send otp to user mobile number
							$data['o_otp'] = '1234';
							$update = $this->HM->update_otp($decode_post->mobile,$data,$decode_post->language);	

							//Update message key in tbl_users table start
							$data1['u_message_key'] = $decode_post->message_key;
							$this->HM->update_profile($run->u_id,$data1,$decode_post->language);

							if($update)
							{
								echo json_encode(array("status" => '1',"message" => 'OTP has been send to your registered mobile number.'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The mobile number is not match with our database.!'));
						}
					}
					elseif($decode_post->language=='KR')
					{
						$this->db->select('*');
						$this->db->where('u_kr_mobile',$decode_post->mobile);
						$select = $this->db->get('tbl_users_kr');
						$run = $select->row();
						$num = $select->num_rows();

						if($num>0)
						{
							// Send otp to user mobile number
							$data=array();
							$data['o_kr_otp'] = '1234';
							$update = $this->HM->update_otp($decode_post->mobile,$data,$decode_post->language);	

							//Update message key in tbl_users table start
							$data=array();
							$data['u_kr_message_key'] = $decode_post->message_key;
							$this->HM->update_profile($run->u_kr_id,$data,$decode_post->language);

							if($update)
							{
								echo json_encode(array("status" => '1',"message" => 'OTP has been send to your registered mobile number.'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The mobile number is not match with our database.!'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'Please choose the language between EN and KR !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The mobile, language and message key are required fields!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function profile()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$profile_post = file_get_contents("php://input");
			$decode_post = json_decode($profile_post);

			if(count((array)$decode_post)==2)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$this->db->where('u_language',$decode_post->language);
					$select = $this->db->get('tbl_users');
					$data = $select->row();
					$num = $select->num_rows();

					if($num==1)
					{
						$user_detail=array();
				        $user_detail['user_id'] = $data->u_id;  
						$user_detail['name'] = $data->u_name;
						$user_detail['email'] = $data->u_email;
						$user_detail['mobile'] = $data->u_mobile;
						$user_detail['country'] = $data->u_country;
						$user_detail['state'] = $data->u_state;
						$user_detail['city'] = $data->u_city;
						$user_detail['street'] = $data->u_street;
						$user_detail['postalcode'] = $data->u_postalcode;
							
						if(!empty($data->u_gender))
						{
							$user_detail['gender'] = $data->u_gender;
						}
						else
						{
							$user_detail['gender'] = '';
						}

						if(!empty($data->u_dob))
						{
							$user_detail['dob'] = $data->u_dob;
						}
						else
						{
							$user_detail['dob'] = '';
						}

						if(!empty($data->u_image))
						{
							$user_detail['image'] = base_url('public/user/').$data->u_image;
						}
						else
						{
							$user_detail['image'] = '';
						}

						if(!empty($user_detail))
						{
							echo json_encode(array("status" => '1',"message" => 'User profile details !',"user_details" => $user_detail));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'The user id is not match with our database or there is no data found !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The user id is required filed !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function update_profile()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$profile_post = file_get_contents("php://input");
			$decode_post = json_decode($profile_post);

			if(count((array)$decode_post)==10)
			{
				if(!empty($decode_post->language) && !empty($decode_post->user_id))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();
 
					if($num==1)
					{
						$data=array();
						$data['u_name'] = $decode_post->name;
						$data['u_dob'] = $decode_post->dob;
						$data['u_gender'] = $decode_post->gender;
						$data['u_language'] = $decode_post->language;
						$data['u_country'] = $decode_post->country;
						$data['u_state'] = $decode_post->state;
						$data['u_city'] = $decode_post->city;
						$data['u_street'] = $decode_post->street;
						$data['u_postalcode'] = $decode_post->postalcode;

						$update = $this->AM->update_profile($run->u_id,$data);

						if($update)
						{
							echo json_encode(array("status" => '1',"message" => 'User details update successfully !'));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'The user id is not match with our database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The user id and language are required filed !'));
				}
			}
			else 
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function change_password()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$change_password_post = file_get_contents("php://input");
			$decode_post = json_decode($change_password_post);

			if(count((array)$decode_post)==5)
			{
				if(!empty($decode_post->old_password) && !empty($decode_post->new_password) && !empty($decode_post->confirm_password) && !empty($decode_post->user_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$num = $select->num_rows();
					$run = $select->row();

					if($num>0)
					{
						if(sha1($decode_post->old_password)==$run->u_password)
						{
							if($decode_post->new_password==$decode_post->confirm_password)
							{
								$data=array();
								$data['u_password'] = sha1($decode_post->new_password);
								$data['u_decrypt_password'] = $decode_post->new_password;
								$data['u_language'] = $decode_post->language;

								$update = $this->AM->change_password($run->u_id,$data);

								if($update)
								{
									echo json_encode(array("status" => '1',"message" => 'Your password changed successfully !'));
								}
								else
								{
									echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
								}
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'Both password does not match !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The old password is not match with our database !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The old password, new password, userid and token are required fileds !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
	}

	public function create_verification_code()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$createcode = file_get_contents("php://input");
			$decode_post = json_decode($createcode);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->code) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num>0)
					{
						$this->db->where('vc_user_id',$run->u_id);
						$query = $this->db->get('tbl_verification_code');
						$num1 = $query->num_rows();

						if($num1==1)
						{
							$data=array();
							$data['vc_user_id'] = $run->u_id;
							$data['vc_code'] = $decode_post->code;
							$data['vc_language'] = $decode_post->language;

							$update = $this->AM->update_verification_code($run->u_id,$data);

							if($update)
							{
								echo json_encode(array("status" => '1',"message" => 'Your verification code reset successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
							}
						}
						else
						{
							$data=array();
							$data['vc_user_id'] = $run->u_id;
							$data['vc_code'] = $decode_post->code;
							$data['vc_language'] = $decode_post->language;

							$insert = $this->AM->create_verification_code($data);

							if($insert)
							{
								echo json_encode(array("status" => '1',"message" => 'Your verification code created successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
							}
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The code, userid and language are required fileds !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
	} 

	public function banner()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$banner_post = file_get_contents("php://input");
			$decode_post = json_decode($banner_post);
			$banner_list = array();

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '' && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('b_order','asc');
					$this->db->where('b_language',$decode_post->language);
					$select = $this->db->get('tbl_banner');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$banner['id'] = $values['b_id'];
							$banner['name'] = $values['b_name'];
							$banner['type'] = $values['b_type'];

							if(!empty($values['b_image']))
							{
								$banner['image'] = base_url('public/banner/').$values['b_image'];
							}
							else
							{
								$banner['image'] = '';
							}

							array_push($banner_list,$banner);
						}

						if($banner_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Banner List !',"banner" => $banner_list));
						}
						else 
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function kit()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$kit_post = file_get_contents("php://input");
			$decode_post = json_decode($kit_post);
			$kit_list = array();

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '')
				{
					if(!empty($decode_post->language))
					{
						$this->db->select('*');
						$this->db->order_by('k_id','desc');
						$this->db->where('k_language',$decode_post->language);
						$select = $this->db->get('tbl_kit');
						$data = $select->result_array();
						$num = $select->num_rows();
						
						if($num>0)
						{
							foreach($data as $values)
							{
								$kit['id'] = $values['k_id'];
								$kit['name'] = $values['k_name'];
								$kit['price'] = $values['k_price']; 
								$kit['description'] = $values['k_description'];
								$kit['user_id'] = "";
								$kit['cart'] = "";

								if(!empty($values['k_image']))
								{
									$kit['image'] = base_url('public/kit/').$values['k_image'];
								}
								else
								{
									$kit['image'] = '';
								}

								array_push($kit_list,$kit);
							}

							if($kit_list)
							{
								echo json_encode(array("status" => '1',"message" => 'Kit List !',"kit" => $kit_list));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
					}
				}
				else
				{
					$authentication = $this->verify_token();
					$user_id = $authentication['data']->id;

					// Check user cart value
					$this->db->where('ca_user_id',$user_id);
					$select = $this->db->get('tbl_cart');
					$num = $select->num_rows();
					$cart = $select->row();

					if($num>0)
					{
						$this->db->select('*');
						$this->db->order_by('k_id','desc');
						$this->db->where('k_language',$decode_post->language);
						$select = $this->db->get('tbl_kit');
						$data = $select->result_array();
						$num = $select->num_rows();
						
						if($num>0)
						{
							foreach($data as $values)
							{
								$kit['id'] = $values['k_id'];
								$kit['name'] = $values['k_name'];
								$kit['price'] = $values['k_price']; 
								$kit['description'] = $values['k_description'];
								$kit['user_id'] = $cart->ca_user_id;
								$kit['cart'] = $cart->ca_qty;

								if(!empty($values['k_image']))
								{
									$kit['image'] = base_url('public/kit/').$values['k_image'];
								}
								else
								{
									$kit['image'] = '';
								}

								array_push($kit_list,$kit);
							}

							if($kit_list)
							{
								echo json_encode(array("status" => '1',"message" => 'Kit List !',"kit" => $kit_list));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
						}
					}
					else
					{
						$this->db->select('*');
						$this->db->order_by('k_id','desc');
						$this->db->where('k_language',$decode_post->language);
						$select = $this->db->get('tbl_kit');
						$data = $select->result_array();
						$num = $select->num_rows();
						
						if($num>0)
						{
							foreach($data as $values)
							{
								$kit['id'] = $values['k_id'];
								$kit['name'] = $values['k_name'];
								$kit['price'] = $values['k_price']; 
								$kit['description'] = $values['k_description'];
								$kit['user_id'] = "";
								$kit['cart'] = "";

								if(!empty($values['k_image']))
								{
									$kit['image'] = base_url('public/kit/').$values['k_image'];
								}
								else
								{
									$kit['image'] = '';
								}

								array_push($kit_list,$kit);
							}

							if($kit_list)
							{
								echo json_encode(array("status" => '1',"message" => 'Kit List !',"kit" => $kit_list));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
						}
					}
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function kit_detail()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$kit_post = file_get_contents("php://input");
			$decode_post = json_decode($kit_post);
			$kit_list = array();

			if(count((array)$decode_post)==3)
			{
				if($decode_post->user_id == '' && !empty($decode_post->kit_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('k_id',$decode_post->kit_id);
					$this->db->where('k_language',$decode_post->language);
					$select = $this->db->get('tbl_kit');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$kit['id'] = $values['k_id'];
							$kit['name'] = $values['k_name'];
							$kit['price'] = $values['k_price']; 
							$kit['description'] = $values['k_description'];

							if(!empty($values['k_image']))
							{
								$kit['image'] = base_url('public/kit/').$values['k_image'];
							}
							else
							{
								$kit['image'] = '';
							}

							array_push($kit_list,$kit);
						}

						if($kit_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Kit List !',"kit" => $kit_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Kit id and language field are required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function test()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$test_post = file_get_contents("php://input");
			$decode_post = json_decode($test_post);
			$test_list = array();

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '' && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('t_id','desc');
					$this->db->where('t_language',$decode_post->language);
					$select = $this->db->get('tbl_test');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$test['id'] = $values['t_id'];
							$test['name'] = $values['t_name'];
							$test['price'] = $values['t_price']; 
							$test['description'] = $values['t_description'];

							if(!empty($values['t_image']))
							{
								$test['image'] = base_url('public/test/').$values['t_image'];
							}
							else
							{
								$test['image'] = '';
							}

							array_push($test_list,$test);
						}

						if($test_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Test List !',"test" => $test_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function test_detail()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$test_post = file_get_contents("php://input");
			$decode_post = json_decode($test_post);
			$test_list = array();

			if(count((array)$decode_post)==3)
			{
				if($decode_post->user_id == '' && !empty($decode_post->test_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('t_id','desc');
					$this->db->where('t_language',$decode_post->language);
					$this->db->where('t_id',$decode_post->test_id);
					$select = $this->db->get('tbl_test');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$test['id'] = $values['t_id'];
							$test['name'] = $values['t_name'];
							$test['price'] = $values['t_price']; 
							$test['description'] = $values['t_description'];

							if(!empty($values['t_image']))
							{
								$test['image'] = base_url('public/test/').$values['t_image'];
							}
							else
							{
								$test['image'] = '';
							}

							array_push($test_list,$test);
						}

						if($test_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Test List !',"test" => $test_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Test id and Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}


	public function product()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$product_post = file_get_contents("php://input");
			$decode_post = json_decode($product_post);
			$product_list = array();

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '' && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('p_id','desc');
					$this->db->where('p_language',$decode_post->language);
					$this->db->join('tbl_category','tbl_category.c_id = tbl_product.p_category_id');
					$select = $this->db->get('tbl_product');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$product['id'] = $values['p_id'];
							$product['name'] = $values['p_name'];
							$product['category'] = $values['c_name']; 
							$product['skucode'] = $values['p_sku_code'];
							$product['price'] = $values['p_price']; 
							$product['description'] = $values['p_description'];

							if(!empty($values['p_image']))
							{
								$product['image'] = base_url('public/product/').$values['p_image'];
							}
							else
							{
								$product['image'] = '';
							}

							array_push($product_list,$product);
						}

						if($product_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Product List !',"product" => $product_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					$authentication = $this->verify_token();
					echo $authentication['data']->id;
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function product_detail()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$product_post = file_get_contents("php://input");
			$decode_post = json_decode($product_post);
			$product_list = array();

			if(count((array)$decode_post)==3)
			{
				if($decode_post->user_id == '' && !empty($decode_post->product_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('p_id','desc');
					$this->db->where('p_id',$decode_post->product_id);
					$this->db->where('p_language',$decode_post->language);
					$this->db->join('tbl_category','tbl_category.c_id = tbl_product.p_category_id');
					$select = $this->db->get('tbl_product');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$product['id'] = $values['p_id'];
							$product['name'] = $values['p_name'];
							$product['category'] = $values['c_name']; 
							$product['skucode'] = $values['p_sku_code'];
							$product['price'] = $values['p_price']; 
							$product['description'] = $values['p_description'];

							if(!empty($values['p_image']))
							{
								$product['image'] = base_url('public/product/').$values['p_image'];
							}
							else
							{
								$product['image'] = '';
							}

							array_push($product_list,$product);
						}

						if($product_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Product List !',"product" => $product_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Product id and Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function location()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$location_post = file_get_contents("php://input");
			$decode_post = json_decode($location_post);
			$location_list = array();

			if(count((array)$decode_post)==2)
			{
				if(!empty($decode_post->country) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('l_country','asc');
					$this->db->where('l_country',$decode_post->country);
					$this->db->where('l_language',$decode_post->language);
					$select = $this->db->get('tbl_location');
					$data = $select->result_array();
					$num = $select->num_rows();
					
					if($num>0)
					{
						foreach($data as $values)
						{
							$location['id'] = $values['l_id'];
							$location['state'] = $values['l_state']; 
							$location['city'] = $values['l_city'];
							$location['postalcode'] = $values['l_postalcode'];
							array_push($location_list,$location);
						}

						if($location_list)
						{
							echo json_encode(array("status" => '1',"message" => 'Location List !',"location" => $location_list));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function logout()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$logout_post = file_get_contents("php://input");
			$decode_post = json_decode($logout_post);

			if(count((array)$decode_post)==0)
			{
				$id = $authentication['data']->id;

				$data=array();
				$data['u_token'] = '';

				$update = $this->AM->update_profile($id,$data);

				if($update)
				{
					echo json_encode(array("status" => '1',"message" => 'You successfully logout !'));
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{  
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function check_verification_code()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$code_post = file_get_contents("php://input");
			$decode_post = json_decode($code_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language) && !empty($decode_post->code))
				{	
					// Check userid 
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$num = $select->num_rows();
					$run = $select->row();

					if($num==1)
					{
						$this->db->where('vc_user_id',$run->u_id);
						$this->db->where('vc_language',$decode_post->language);
						$query = $this->db->get('tbl_verification_code');
						$data = $query->row();
						$num1 = $query->num_rows();

						if($num1==1)
						{
							if($decode_post->code==$data->vc_code)
							{
								echo json_encode(array("status" => '1',"message"=>'The verification code you entered is correct !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message"=>'The verification code you entered is incorrect !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database !'));
					}
				}	
				else
				{
					echo json_encode(array("status" => '0',"message" => 'User Id, Language and Code field are required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}


	public function forgot_verification_code()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$forgot_post = file_get_contents("php://input");
			$decode_post = json_decode($forgot_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language) && !empty($decode_post->message_key))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num==1)
					{
						// Send otp to user mobile number
						$data['o_otp'] = '1234';
						$update = $this->AM->update_otp($run->u_mobile,$data);	

						//Update message key in tbl_users table start
						$data1['u_message_key'] = $decode_post->message_key;
						$this->AM->update_profile($run->u_id,$data1);

						if($update)
						{
							echo json_encode(array("status" => '1',"message" => 'OTP has been send to your registered mobile number.'));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=> 'The user id is not match with our database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The user id, language and message key are required fields!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function verify_forgot_verification_code()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$otp_post = file_get_contents("php://input");
			$decode_post = json_decode($otp_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->otp) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->order_by('u_id','desc');
					$this->db->where('u_user_code',$decode_post->user_id);
					$this->db->join('tbl_otp','tbl_otp.o_user_id = tbl_users.u_id');
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num>0)
					{
						if($decode_post->otp==$run->o_otp)
						{
							$data['o_status'] = 1;
							$update = $this->AM->verify_otp($run->u_id,$data);

				            // Update user detail
							$data1=array();
							$data1['u_verified'] = "1";

							$this->AM->update_profile($run->u_id,$data1);

							if(!empty($update))
							{
								echo json_encode(array("status" => '1',"message"=>'OTP Verified Successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'You entered wrong OTP.'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The mobile, otp and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function update_profile_image()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$user_id = strip_tags($this->input->post('user_id'));
			$upload='';

			if(!empty($user_id))
			{
				$this->db->select('*');
				$this->db->where('u_user_code',$user_id);
				$select = $this->db->get('tbl_users');
				$run = $select->row();
				$num = $select->num_rows();

				if($num==1)
				{
					if(!empty($_FILES['image']['name']))          
			        {
				        $config['upload_path']          = './public/user';
					    $config['allowed_types']        = 'gif|jpg|png|jpeg';
					    $config['max_size']             = "";
					    $config['max_width']            = "";
					    $config['max_height']           = "";

				        $this->load->library('upload',$config); 

						if($this->upload->do_upload('image'))
						{
							$image = $this->upload->data();
							$upload = $image['file_name'];

							$data=array();
							$data['u_image'] = $upload;

							$update = $this->AM->update_profile($run->u_id,$data);

							if(!empty($update))
							{
								echo json_encode(array("status" => '1',"message"=>'Your profile image updated successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !',""));
							}
						}
						else
						{
						    $error = array('error' => $this->upload->display_errors());
						    echo json_encode(array("status" => '0',"message" => 'Image should be gif, jpg, png format !',"error"=>$error));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'The image is required field!'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'The user id is required field !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}
 
	public function add_address()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$add_address_post = file_get_contents("php://input");
			$decode_post = json_decode($add_address_post);

			if(count((array)$decode_post)==8)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language) && !empty($decode_post->flat_no) && !empty($decode_post->street) && !empty($decode_post->area) && !empty($decode_post->landmark) && !empty($decode_post->city) && !empty($decode_post->postalcode))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num>0)
					{
						$data=array();
						$data['ad_user_id'] = $run->u_id;
						$data['ad_flat_no'] = $decode_post->city;
						$data['ad_street'] = $decode_post->street;
						$data['ad_area'] = $decode_post->area;
						$data['ad_landmark'] = $decode_post->landmark;
						$data['ad_city'] = $decode_post->city;
						$data['ad_postalcode'] = $decode_post->postalcode;
						$data['ad_language'] = $decode_post->language;

						$insert = $this->AM->add_address($data);

						if($insert)
						{
							echo json_encode(array("status" => '1',"message" => 'Address added successfully !'));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The flat no, street, area, landmark, city, postalcode, user id and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function address_list()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$address_post = file_get_contents("php://input");
			$decode_post = json_decode($address_post);
			$address_list = array();

			if(count((array)$decode_post)==2)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$query = $this->db->get('tbl_users');
					$num = $query->num_rows();
					$run = $query->row();

					if($num==1)
					{
						$this->db->select('*');
						$this->db->where('ad_user_id',$run->u_id);
						$this->db->where('ad_language',$decode_post->language);
						$query1 = $this->db->get('tbl_address');
						$sql = $query1->result_array();
						$num1 = $query1->num_rows();

						if($num1>0)
						{
							foreach($sql as $values)
							{
								$address['id'] = $values['ad_id'];
								$address['flat_no'] = $values['ad_flat_no'];
								$address['street'] = $values['ad_street'];
								$address['area'] = $values['ad_area'];
								$address['landmark'] = $values['ad_landmark']; 
								$address['city'] = $values['ad_city'];
								$address['postalcode'] = $values['ad_postalcode'];
								array_push($address_list,$address);
							}

							if($address_list)
							{
								echo json_encode(array("status" => '1',"message" => 'Address List !',"list"=>$address_list));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'There is no data found on database !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The address id and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function update_address()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$add_address_post = file_get_contents("php://input");
			$decode_post = json_decode($add_address_post);

			if(count((array)$decode_post)==9)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language) && !empty($decode_post->address_id))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num==1)
					{
						$this->db->select('*');
						$this->db->where('ad_id',$decode_post->address_id);
						$query = $this->db->get('tbl_address');
						$sql = $query->row();
						$num1 = $query->num_rows();

						if($num1==1)
						{
							$data=array();
							$data['ad_user_id'] = $run->u_id;
							$data['ad_language'] = $decode_post->language;

							if(empty($decode_post->flat_no))
							{
								$data['ad_flat_no'] = $sql->ad_flat_no;
							}
							else
							{
								$data['ad_flat_no'] = $decode_post->flat_no;
							}

							if(empty($decode_post->street))
							{
								$data['ad_street'] = $sql->ad_street;
							}
							else
							{
								$data['ad_street'] = $decode_post->street;
							}

							if(empty($decode_post->area))
							{
								$data['ad_area'] = $sql->ad_area;
							}
							else
							{
								$data['ad_area'] = $decode_post->area;
							}

							if(empty($decode_post->landmark))
							{
								$data['ad_landmark'] = $sql->ad_landmark;
							}
							else
							{
								$data['ad_landmark'] = $decode_post->landmark;
							}

							if(empty($decode_post->flat_no))
							{
								$data['ad_flat_no'] = $sql->ad_flat_no;
							}
							else
							{
								$data['ad_flat_no'] = $decode_post->flat_no;
							}

							if(empty($decode_post->city))
							{
								$data['ad_city'] = $sql->ad_city;
							}
							else
							{
								$data['ad_city'] = $decode_post->city;
							}

							if(empty($decode_post->postalcode))
							{
								$data['ad_postalcode'] = $sql->ad_postalcode;
							}
							else
							{
								$data['ad_postalcode'] = $decode_post->postalcode;
							}

							$update = $this->AM->update_address($run->u_id,$data);

							if($update)
							{
								echo json_encode(array("status" => '1',"message" => 'Address updated successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The address id is not match with our database '));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The user id and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function delete_address()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$logout_post = file_get_contents("php://input");
			$decode_post = json_decode($logout_post);

			if(count((array)$decode_post)==3)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->language) && !empty($decode_post->address_id))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num>0)
					{
						$this->db->select('*');
						$this->db->where('ad_id',$decode_post->address_id);
						$query = $this->db->get('tbl_address');
						$num1 = $query->num_rows();

						if($num1==1)
						{
							$delete = $this->AM->delete_address($run->u_id,$decode_post->address_id);

							if($delete)
							{
								echo json_encode(array("status" => '1',"message" => 'Address deleted successfully !'));
							}
							else
							{
								echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
							}
						}
						else
						{
							echo json_encode(array("status" => '0',"message"=>'The address id is not match with our database '));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The user id, address id and language fields are required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{  
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function forgot_password()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$forgot_password_post = file_get_contents("php://input");
			$decode_post = json_decode($forgot_password_post,true);
			$code = rand(1000,9999);

			if(count((array)$decode_post)==1)
			{
				// if(!empty($decode_post->email))
				// {
					$this->db->select('*');
					$this->db->where('u_email',$decode_post->email);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					// if($num==1)
					// {
					    $message="
						<html>
						<head>
						<title>Regarding New Enquiry Comes From Apply Now Page</title>
						</head>
						<body>
						<p>Dear Team,</p>
						<p>Best Wishes !</p>
						<p>This is for your new enquiry have been successfully submitted in <b>Dhani Bazzar Loan</b>.</p>
						<p>Below given are the important details regarding your customer details:</p>
						<p>
						</p>

						<p>
						In case of any discrepancy or any technical fault, please reach out to your admin. <br> 
						</p>

						<p>Warm Regards,</p>
						<p>Team Dhani Bazzar Loan</p>


						</body>
						</html>
						";

	     			 //		$config = array(
					 //    'protocol' => 'smtp',
					 //    'smtp_host' => 'smtp.gmail.com',
					 //    'smtp_port' => 587,
					 //    'smtp_user' => 'akashgarg479@gmail.com',
					 //    'smtp_pass' => 'softwrgrg479shgrg',
					 //    'mailtype'  => 'html', 
					 //    'charset'   => 'iso-8859-1',
						// 'wordwrap'  => TRUE
						// );

						// $this->load->library('email',$config);
						// $this->email->initialize($config);
						// $this->email->set_newline("\r\n");
				  //       $this->email->from('akashgarg479@gmail.com', 'Mybio23'); 
				  //       $this->email->to('akashgarg479@gmail.com');
				  //       $this->email->subject('Reset Request For Password');

				  //       $this->load->library('email',$config);
						// $this->email->set_newline("\r\n");  
				  //       $this->email->from('akashgarg479@gmail.com','Akash Garg');
				  //       $this->email->to($decode_post->email);
				  //       $this->email->subject('Forgot Password');
				        //$this->email->message($message);

				     //    $link="<a href='https://phpstack-659985-2283418.cloudwaysapps.com/email=".$run->u_email."/token=".$code.">Click Here</a>"; 
				       
				   		// $mail_message = 'Dear '.$run->u_name.','."<br>\r\n";
					    // $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Click On Link And Reset Password:<b>'.$link.' '."\r\n";
					    // $mail_message .= '<br>Please Update your password.';
					    // $mail_message .= '<br>Thanks & Regards';
					    // $mail_message .= '<br>Mybio23';		

					     $this->load->library('phpmailer_lib');
				        // PHPMailer object
				        $mail = $this->phpmailer_lib->load();
        				
        				$mail->isSMTP();
				        $mail->Host       = 'smtp.gmail.com';
				        $mail->SMTPAuth   =  true;
				        $mail->Username   = 'akashgarg479@gmail.com';
				        $mail->Password   = 'softwrgrg479shgrg';
				        $mail->SMTPSecure = 'ssl';
				        $mail->Port       =  465;

				        $mail->setFrom('akashgarg479@gmail.com', 'Mybio23');
				        $mail->addReplyTo('akashgarg479@gmail.com', 'Mybio23');
				        
				        // Add a recipient
				        $mail->addAddress('akashgarg479@gmail.com');
				        
				        // Add cc or bcc 
				        // $mail->addCC('cc@example.com');
				        // $mail->addBCC('bcc@example.com');
				        
				        // Email subject
				        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
				        
				        // Set email format to HTML
				        $mail->isHTML(true);
				        
				        // Email body content
				        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
				            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
				        $mail->Body = $mailContent;



					    // $this->email->message($message);

				
				        if($mail->send())
				        {
				        	echo json_encode(array("status" => '1',"message" => 'An email send on your registered email address !'));
				        } 
				        else
				        {
				        	echo $this->email->print_debugger();
				        }
					// }
					// else
					// {
					// 	echo json_encode(array("status" => '0',"message"=>'The email is not match with our database '));
					// }
				// }
				// else
				// {
				// 	echo json_encode(array("status" => '0',"message" => 'The email field is required!'));
				// }
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function terms_condition()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$terms_post = file_get_contents("php://input");
			$decode_post = json_decode($terms_post);

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '' && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('tc_language',$decode_post->language);
					$select = $this->db->get('tbl_terms_conditions');
					$data = $select->row();
					$num = $select->num_rows();
					
					if($num>0)
					{
						if($data)
						{
							echo json_encode(array("status" => '1',"message" => 'Terms & Condition !',"t&c" => strip_tags($data->tc_message)));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function privacy_policy()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$privacy_post = file_get_contents("php://input");
			$decode_post = json_decode($privacy_post);

			if(count((array)$decode_post)==2)
			{
				if($decode_post->user_id == '' && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('pp_language',$decode_post->language);
					$select = $this->db->get('tbl_privacy_policy');
					$data = $select->row();
					$num = $select->num_rows();
					
					if($num>0)
					{
						if($data)
						{
							echo json_encode(array("status" => '1',"message" => 'Privacy & Policy !',"p&p" => strip_tags($data->pp_message)));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something that went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message" => 'There is no data found in database !'));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'Language field is required !'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}

	public function add_to_cart()
	{
		$authentication = $this->verify_token();
		if($this->input->server('REQUEST_METHOD') == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/json')
		{
			$add_cart_post = file_get_contents("php://input");
			$decode_post = json_decode($add_cart_post);

			if(count((array)$decode_post)==5)
			{
				if(!empty($decode_post->user_id) && !empty($decode_post->product_id) && !empty($decode_post->type) && !empty($decode_post->qty) && !empty($decode_post->language))
				{
					$this->db->select('*');
					$this->db->where('u_user_code',$decode_post->user_id);
					$select = $this->db->get('tbl_users');
					$run = $select->row();
					$num = $select->num_rows();

					if($num>0)
					{
						$data=array();
						$data['ca_user_id'] = $run->u_id;
						$data['ca_product_id'] = $decode_post->product_id;
						$data['ca_qty'] = $decode_post->qty;
						$data['ca_type'] = $decode_post->type;
						$data['ca_language'] = $decode_post->language;

						$insert = $this->AM->add_to_cart($data);

						if($insert)
						{
							echo json_encode(array("status" => '1',"message" => 'Item added into cart successfully !'));
						}
						else
						{
							echo json_encode(array("status" => '0',"message" => 'There is something went wrong !'));
						}
					}
					else
					{
						echo json_encode(array("status" => '0',"message"=>'The user id is not match with our database '));
					}
				}
				else
				{
					echo json_encode(array("status" => '0',"message" => 'The flat no, street, area, landmark, city, postalcode, user id and language fields are required!'));
				}
			}
			else
			{
				echo json_encode(array("status" => '0',"message" => 'Bad request !'));
			}
		}
		else
		{
			echo json_encode(array("status" => '0',"message" => 'API method should be POST and content type should be JSON !'));
		}
	}
}
?>