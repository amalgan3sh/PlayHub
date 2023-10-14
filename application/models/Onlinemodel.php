<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onlinemodel extends CI_Model {

	public function loginCheck(){
		$response = $this->db->query('select * from login');
        return $response->result_array()[0];
	}
	public function adminAddTurf($data){
		$response = $this->db->insert('turf',$data);
        return $response;
	}
	public function getTurf(){
		$response = $this->db->query('select * from turf');
        return $response;
	}
	public function ResetPassword($phonenumber,$confirmpassword){
		$response = $this->db->query("UPDATE `user` SET `password`='$confirmpassword' WHERE `phone` = '$phonenumber'");
        return $response;
	}
	public function userAddFeedback($user_id,$feedback){
		$response = $this->db->query("INSERT INTO `feedback` (`user_id`,`description`,`datetime`)VALUES('$user_id','$feedback',CURDATE())");
        return $response;
	}
	public function adminUpdateTurf($id,$data){
		$this->db->where('turf_id', $id);
		$response=$this->db->update('turf', $data);
		return $response;
	}
	public function adminDeleteTurf($id){
		$this -> db -> where('turf_id', $id);
		$response = $this -> db -> delete('turf');
		return $response;
	}
	public function getUserFeedback($id){
		$this -> db -> where('user_id', $id);
		$response = $this->db->get('feedback');	
		return $response;
	}
	public function userGetChallengeRequest($user_id)
	{
		$response = $this->db->query("SELECT *,CONCAT(first_name,' ',last_name) AS challenger_name,challenge.status as challenge_status FROM `challenge` INNER JOIN `user` ON `challenge`.`from_user_id` = `user`.user_id WHERE to_user_id=$user_id");	
		return $response;
	}
	public function adminDeleteFeedback($feedback_id){
		$response = $this->db->query("DELETE FROM feedback WHERE `feedback_id`='$feedback_id'");
        return $response;
	}
	public function userAcceptChallenge($challenge_id){
		$response = $this->db->query("UPDATE `challenge` SET `status`='accepted' WHERE challenge_id = $challenge_id");
        return $response;
	}
	public function adminViewFeedback(){
		$response = $this->db->get('feedback');	
		return $response;
	}
	public function userCancelBooking($booking_id){
		$response = $this->db->query("UPDATE `bookings` SET `status` = 'cancelled' WHERE booking_id = $booking_id");
        return $response;
	}
	public function adminLogin($username , $password){
		$this->db->from('login');
		$this->db->where('username', $username );
		$this->db->where('password', $password );
		$response = $this->db->get();
		if ( $response->num_rows() > 0 )
	    {
	        return true;
	    }
	    else{
	    	return false;
	    }
	}
	public function getUserChallengers($user_id){
		$response = $this->db->query("SELECT CONCAT(user.first_name,' ',user.last_name) AS challenger_name,user_id,turf_id FROM `bookings` INNER JOIN USER USING (user_id) WHERE booking_date = CURDATE() AND user_id!=$user_id");	
		return $response;
	}
	public function userChallengeUser($from_user_id,$to_user_id,$turf_id){
		$response = $this->db->query("INSERT INTO `challenge`(`from_user_id`,`to_user_id`,`date`,`turf_id`,`status`) VALUES('$from_user_id','$to_user_id',CURDATE(),'$turf_id','pending')");	
		return $response;
	}
	public function userLogin($username , $password){
		$this->db->from('user');
		$this->db->where('username', $username );
		$this->db->where('password', $password );
		$response = $this->db->get();
		if ( $response->num_rows() > 0 )
	    {
	        return true;
	    }
	    else{
	    	return false;
	    }
	}
	public function getUserid($username , $password){
		$this->db->from('user');
		$this->db->where('username', $username );
		$this->db->where('password', $password );
		$response = $this->db->get();
		$userdata= $response->result_array();
		return $userdata[0]['user_id'];
	}
	public function getTurfid($username , $password){
		$this->db->from('turf');
		$this->db->where('username', $username );
		$this->db->where('password', $password );
		$response = $this->db->get();
		$userdata= $response->result_array();
		return $userdata[0]['turf_id'];
	}
	public function turfLogin($username , $password){
		$this->db->from('turf');
		$this->db->where('username', $username );
		$this->db->where('password', $password );
		$response = $this->db->get();
		if ( $response->num_rows() > 0 )
	    {
	        return true;
	    }
	    else{
	    	return false;
	    }
	}
	public function userRegistration($data){
		$response = $this->db->insert('user', $data );	
		return $response;
	}
	public function getWeek(){
		$response = $this->db->get('week');	
		return $response;
	}
	public function turfAddWorkingDays($week_id,$turf_id){
		$response = $this->db->query("INSERT INTO `working_days` (week_id,turf_id)VALUES('$week_id','$turf_id')");
		return $response;
	}
	public function getTurfWorkingdays($turf_id){
		$response = $this->db->query("SELECT working_day_id,week_name FROM `working_days` INNER JOIN `week` ON `week`.`week_id` = `working_days`.`week_id` WHERE turf_id = $turf_id");
		return $response;
	}
	public function turfDeleteWorkingWeek($working_week_id){
		$this -> db -> where('working_day_id', $working_week_id);
		$response = $this -> db -> delete('working_days');
		return $response;
	}
	public function getSlots(){
		$response = $this->db->get('slots');	
		return $response;
	}
	public function userBookSlot($user_id, $week_id, $turf_id, $slot_id, $members){
		$booking_date = date("Y/m/d");
		$status = 'booked';
		$response = $this->db->query("INSERT INTO `bookings`(`turf_id`,`user_id`,`slot_id`,`week_id`,`booking_date`,`members`,`status`) VALUES('$turf_id','$user_id','$slot_id','$week_id','$booking_date','$members','$status')");	
		return $response;
	}
	public function getUserBookings($user_id){
		$response = $this->db->query("SELECT booking_date,bookings.status,bookings.members,bookings.booking_id,turf_name,turf.location,slot_time,week_name FROM `bookings` INNER JOIN turf USING (turf_id) INNER JOIN USER USING(user_id) INNER JOIN slots USING(slot_id) INNER JOIN `week` USING (week_id) WHERE user_id='$user_id'  AND `booking_date` >= CURDATE()");	
		return $response;
	}
	public function turfViewBookings($turf_id){
		$response = $this->db->query("SELECT booking_date,bookings.status,CONCAT(first_name,last_name) AS username,turf.location,slot_time,week_name FROM `bookings` INNER JOIN turf USING (turf_id) INNER JOIN USER USING(user_id) INNER JOIN slots USING(slot_id) INNER JOIN `week` USING (week_id) WHERE turf_id='$turf_id' AND `booking_date` >= CURDATE()");	
		return $response;
	}
	public function admnViewBookings(){
		$response = $this->db->query("SELECT bookings.booking_id,turf.turf_name,booking_date,bookings.status,CONCAT(first_name,last_name) AS username,turf.location,slot_time,week_name FROM `bookings` INNER JOIN turf USING (turf_id) INNER JOIN USER USING(user_id) INNER JOIN slots USING(slot_id) INNER JOIN `week` USING (week_id) WHERE `booking_date` >= CURDATE()");	
		return $response;
	}
	public function userCheckSLotAvailability($turf_id, $slot_id){
		$response = $this->db->query("SELECT * FROM `bookings` INNER JOIN turf USING(turf_id) INNER JOIN slots USING(slot_id) WHERE booking_date = CURDATE() AND turf_id = $turf_id AND slot_id=$slot_id");	
		return $response->num_rows();
	}
	public function getUserPhoneNumber($user_id){
		$response = $this->db->query("SELECT phone FROM `user` WHERE user_id='$user_id'");	
		$array_result=$response->result_array();
		$phone =$array_result[0]['phone'];
		return $phone;
	}
	public function updateBookingStatusAfterPayment($booking_id){
		$response = $this->db->query("UPDATE `bookings` SET STATUS = 'paid' WHERE booking_id = '$booking_id'");	
		return $response;
	}
}
