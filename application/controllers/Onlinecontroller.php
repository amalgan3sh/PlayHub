<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
@author : amal ganesh
@email : amalganesh4u@gmail.com
**Onlinecontroller used to manage the dataflow between the front end and models
*/

class Onlinecontroller extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	public function adminHome(){
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_home');
		$this->load->view('admin/admin_footer');
	}
	public function adminLogout(){
		$this->session->unset_userdata('id');
		$this->index();
	}

	public function ResetPassword(){
		$phonenumber = $this->input->get_post('phonenumber');
		$newpassword = $this->input->get_post('newpassword');
		$confirmpassword = $this->input->get_post('confirmpassword');
		if($confirmpassword == $newpassword){
			$response = $this->Onlinemodel->ResetPassword($phonenumber,$confirmpassword);
			?>
				<script type="text/javascript">
				alert('Password Changed');
				</script> 
				<?php
				$this->index();
		}else{
			?>
				<script type="text/javascript">
				alert('Passwords not matching');
				</script> 
				<?php
				$this->index();
		}
	}
	//login section starts here

	public function login(){
		$usertype = $this->input->get_post('usertype');
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		if($usertype=='admin'){
			$response = $this->Onlinemodel->adminLogin($username,$password);

			if($response==true){
				$this->session->set_userdata('id','1');
				$this->adminHome();
			}else{
				?>
				<script type="text/javascript">
				alert('incorrect username or password');
				</script> 
				<?php 
				$this->index();
			}
		}
		if($usertype=='user'){
			$response = $this->Onlinemodel->userLogin($username,$password);
			if($response==true){
				$user_id = $this->Onlinemodel->getUserid($username,$password);
				$this->session->set_userdata('id',$user_id);
				$this->userHome();
			}else{
				?>
				<script type="text/javascript">
				alert('incorrect username or password');
				</script> 
				<?php 
				$this->index();
			}
		}
		if($usertype=='turf'){
			$response = $this->Onlinemodel->turfLogin($username,$password);
			if($response==true){
				$turf_id = $this->Onlinemodel->getTurfid($username,$password);
				$this->session->set_userdata('id',$turf_id);
				$this->turfHome();
			}else{
				?>
				<script type="text/javascript">
				alert('incorrect username or password');
				</script> 
				<?php 
				$this->index();
			}
		}
		
	}

	//login ends

	// user section starts here

	public function userRegistrationPage(){
		$this->load->view('user/user_registration');
	}
	public function userHome(){
		if( $this->session->userdata('id'))
		{ 
			$this->session->userdata('id');
			$this->load->view('user/user_header');
			$this->load->view('user/user_home');
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}

	public function userRegistration(){
		$data['first_name']=$this->input->get_post('first_name');
		$data['last_name']=$this->input->get_post('last_name');
		$data['email']=$this->input->get_post('email');
		$data['phone']=$this->input->get_post('phone');
		$data['location']=$this->input->get_post('location');
		$data['pin']=$this->input->get_post('pincode');
		$data['username']=$this->input->get_post('username');
		$data['password']=$this->input->get_post('password');
		$data['status']='active';
		$response = $this->Onlinemodel->userRegistration($data);
		if($response==1){
			?>
			<script type="text/javascript">
			alert('Your registration is success');
			</script> 
			<?php 
			$this->index();
		}
	}

	public function userViewTurf(){
		if( $this->session->userdata('id'))
		{ 
			$this->session->userdata('id');
			$data['turf'] = $this->Onlinemodel->getTurf();
			$this->load->view('user/user_header');
			$this->load->view('user/user_view_turf',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userSelectWeek(){
		if( $this->session->userdata('id'))
		{ 
			$this->session->userdata('id');
			$data['weeks'] = $this->Onlinemodel->getWeek();
			$this->load->view('user/user_header');
			$this->load->view('user/user_select_week',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userViewSlots(){
		if( $this->session->userdata('id'))
		{ 
			$this->session->userdata('id');
			$data['slots'] = $this->Onlinemodel->getSlots();
			$data['weeks'] = $this->Onlinemodel->getWeek();
			$this->load->view('user/user_header');
			$this->load->view('user/user_view_slots',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userBookSlot(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$week_id = $_GET['week_id'];
			$turf_id = $_GET['turf_id'];
			$slot_id = $_GET['slot_id'];
			$members = $_POST['members'];
			$check_availability = $this->Onlinemodel->userCheckSLotAvailability($turf_id, $slot_id);
			if($check_availability ==0){
				//available
				$response = $this->Onlinemodel->userBookSlot($user_id, $week_id, $turf_id, $slot_id,$members);
				if($response==1){
					$phone_number = $this->Onlinemodel->getUserPhoneNumber($user_id);
					// $response = $this->sentBookingConfirmationSMStoUser($phone_number);
					$this->sendSMSNew($phone_number);

				?>
				<script type="text/javascript">
				alert('Your booking is successfull');
				</script> 
				<?php 
				$this->userViewBookings();
				}else{
					?>
				<script type="text/javascript">
				alert('Your booking is failed');
				</script> 
				<?php 
				$this->userViewTurf();
				}
			}else{
				//not available
				?>
				<script type="text/javascript">
				alert('This slot is already booked');
				</script> 
				<?php
				$this->userViewTurf();
			}
			
		
		}else{
			$this->index();
		}

	}
	public function userViewBookings(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$data['bookings'] = $this->Onlinemodel->getUserBookings($user_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_view_bookings',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userViewChallengeRequest(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$data['challenge_request'] = $this->Onlinemodel->userGetChallengeRequest($user_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_challenge_request',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userAcceptChallenge(){
		if( $this->session->userdata('id'))
		{ 
			$challenge_id = $this->input->get_post('challenge_id');
			$response = $this->Onlinemodel->userAcceptChallenge($challenge_id);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Challenge Accepted');
				</script> 
				<?php 
				$this->userViewChallengeRequest();
			}

		}else{
			$this->index();
		}
	}
	public function userChallenge(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$data['challenger'] = $this->Onlinemodel->getUserChallengers($this->session->userdata('id'));
			$this->load->view('user/user_header');
			$this->load->view('user/user_challenge',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userChallengeUser(){
		if( $this->session->userdata('id'))
		{ 
			$to_user_id = $this->input->get_post('user_id');
			$turf_id = $this->input->get_post('turf_id');
			$response = $this->Onlinemodel->userChallengeUser($this->session->userdata('id'),$to_user_id,$turf_id);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Challenge initiated');
				</script> 
				<?php 
				$this->userChallenge();
			}

		}else{
			$this->index();
		}
	}
	public function userSelectMembers(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$data['bookings'] = $this->Onlinemodel->getUserBookings($user_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_select_members',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}

	public function userViewTurfImages(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$turf_id = $this->input->get_post('turf_id');
			$data['images'] = $this->Onlinemodel->userViewTurfImages($turf_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_view_turf_images',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function userCancelBooking(){
		if( $this->session->userdata('id'))
		{ 
			$booking_id = $this->input->get_post('booking_id');
			$response = $this->Onlinemodel->userCancelBooking($booking_id);
			$this->userViewBookings();

		}else{
			$this->index();
		}
	}
	public function userGiveFeedback(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$data['feedback'] = $this->Onlinemodel->getUserFeedback($user_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_give_feedback',$data);
			$this->load->view('admin/admin_footer');

		}else{
			$this->index();
		}
	}

	public function userGiveFeedbackToPropreitor(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$turf_id = $this->input->get_post('turf_id');
			$data['feedback'] = $this->Onlinemodel->getUserFeedbackPropreitor($user_id, $turf_id);
			$this->load->view('user/user_header');
			$this->load->view('user/user_give_feedback_to_propreitor',$data);
			$this->load->view('admin/admin_footer');

		}else{
			$this->index();
		}
	}

	public function userAddFeedbackPropreitor(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$feedback = $this->input->get_post('feedback');
			$turf_id = $this->input->get_post('turf_id');
			$response = $this->Onlinemodel->userAddFeedbackPropreitor($user_id,$feedback,$turf_id);
			
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Feedback Added');
				</script> 
				<?php 
				$this->userGiveFeedbackToPropreitor();
			}

		}else{
			$this->index();
		}
	}

	public function userAddFeedback(){
		if( $this->session->userdata('id'))
		{ 
			$user_id = $this->session->userdata('id');
			$feedback = $this->input->get_post('feedback');
			$response = $this->Onlinemodel->userAddFeedback($user_id,$feedback);
			
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Feedback Added');
				</script> 
				<?php 
				$this->userGiveFeedback();
			}

		}else{
			$this->index();
		}
	}

	public function userAddMembers(){
		if( $this->session->userdata('id'))
		{ 
			$data['week_id'] = $this->input->get_post('week_id');
			$data['turf_id'] = $this->input->get_post('turf_id');
			$data['slot_id'] = $this->input->get_post('slot_id');
			$data['members'] = $this->input->get_post('members');
			echo json_encode($data);
		}else{
			$this->index();
		}
	}
	public function updateBookingStatusAfterPayment(){
		$booking_id = $_GET['booking_id'];
		$this->Onlinemodel->updateBookingStatusAfterPayment($booking_id);
	}

	public function sentBookingConfirmationSMStoUser($user_phone_number) {

	// $url = 'https://www.fast2sms.com/dev/bulkV2?authorization=urZWPVsXkLzHGghKIlRcOSA0nYw89fitqQyD7JmxFbvBpCj2MTkElSsenTo7zMGait1mC0Wd3Zcq6pyx&route=q&message=Booking%20confirmed%20!%0ACheck%20the%20status%20of%20your%20booking%20in%20PlayHub%20Website.%0A-Playhub&flash=0&numbers='.$user_phone_number;

	$url = 'https://www.fast2sms.com/dev/bulkV2?authorization=urZWPVsXkLzHGghKIlRcOSA0nYw89fitqQyD7JmxFbvBpCj2MTkElSsenTo7zMGait1mC0Wd3Zcq6pyx&route=q&message=Confirmed&flash=0&numbers=9778198100';

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and capture the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        return 'cURL error: ' . curl_error($ch);
    } else {
        // Output the response
        return $response;
    }

    // Close cURL session
    curl_close($ch);
}

function sendSMSNew($user_phone_number) {
    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=urZWPVsXkLzHGghKIlRcOSA0nYw89fitqQyD7JmxFbvBpCj2MTkElSsenTo7zMGait1mC0Wd3Zcq6pyx&route=q&message=Confirmed&flash=0&numbers=".$user_phone_number;
    
    $response = file_get_contents($url);

    // You can handle the response here, e.g., by printing it or returning it.
    // Example: echo $response;
}
public function sentPaymentConfirmationSMStoUser($user_phone_number) {

	$url = 'https://www.fast2sms.com/dev/bulkV2?authorization=bWgIyuBeoFfglkrxhdL6pf1YL1XObTgyJXiUgUhb27fMw1rYZsptPpEaInWR&route=q&message=Payment%20Received%20!%0ACheck%20your%20status%20of%20booking%20in%20PlayHub%20website.%0A-PlayHub&flash=0&numbers='.$user_phone_number;

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and capture the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        return 'cURL error: ' . curl_error($ch);
    } else {
        // Output the response
        return $response;
    }

    // Close cURL session
    curl_close($ch);
}

	public function sendSMS($senderId = '', $route = 'p') {

		// Example usage:
		$apiKey = 'bWgIyuBeoFfglkrxhdL6pf1YL1XObTgyJXiUgUhb27fMw1rYZsptPpEaInWR';
		$phoneNumber = '7356529545'; // Replace with the recipient's phone number
		$message = 'Hello, this is a test message from Fast2SMS API.';
		$url = 'https://www.fast2sms.com/dev/bulkV2';

	    $data = [
	        'authorization' => $apiKey,
	        'sender_id' => $senderId,
	        'message' => $message,
	        'route' => $route,
	        'numbers' => $phoneNumber,
	    ];

	    $ch = curl_init($url);

	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    curl_close($ch);

	    $responseData = json_decode($response, true);

	    if ($responseData['return'] == true) {
	        echo json_encode([
	            'success' => true,
	            'message_id' => $responseData['message'][0]['message_id'],
	        ]);
	    } else {
	        echo json_encode([
	            'success' => false,
	            'error' => $responseData['message'],
	        ]);
	    }
	}

	// user section ends

	//admin section starts here

	public function adminManageTurf(){
		$data['turf'] = $this->Onlinemodel->getTurf();
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_manage_turf',$data);
		$this->load->view('admin/admin_footer');
	}

	public function adminViewFeedback(){
		$data['feedback'] = $this->Onlinemodel->adminViewFeedback();
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_view_feedback',$data);
		$this->load->view('admin/admin_footer');
	}
	public function adminDeleteFeedback(){
		$feedback_id=$this->input->get_post('feedback_id');
		$response=$this->Onlinemodel->adminDeleteFeedback($feedback_id);
		if($response==1){
				?>
				<script type="text/javascript">
				alert('Feedback Deleted');
				</script> 
				<?php 
				$this->adminViewFeedback();
			}
		
	}

	public function adminAddTurf(){
		$action=$this->input->get_post('btnsave');
		if($action=="Save"){
			$data['turf_name']=$this->input->get_post('turf_name');
			$data['location']=$this->input->get_post('location');
			$data['username']=$this->input->get_post('username');
			$data['password']=$this->input->get_post('password');
			$data['status']='active';
			$response = $this->Onlinemodel->adminAddTurf($data);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Turf added succesfully');
				</script> 
				<?php 
				$this->adminManageTurf();
			}
		}else{
			$id=$this->input->get_post('id');
			$data['turf_name']=$this->input->get_post('turf_name');
			$data['location']=$this->input->get_post('location');
			$data['username']=$this->input->get_post('username');
			$data['password']=$this->input->get_post('password');
			$data['status']='active';
			$response = $this->Onlinemodel->adminUpdateTurf($id,$data);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Turf updated succesfully');
				</script> 
				<?php 
				$this->adminManageTurf();
			}
		} 
	}



	public function adminDeleteTurf(){
		$id=$this->input->get_post('id');
		$response = $this->Onlinemodel->adminDeleteTurf($id);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Turf deleted succesfully');
				</script> 
				<?php 
				$this->adminManageTurf();
			}
	}
	public function admnViewBookings(){
		$data['bookings'] = $this->Onlinemodel->admnViewBookings();
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_view_bookings',$data);
		$this->load->view('admin/admin_footer');
	}

	// admin section ends

	//turf section starts here
	public function turfHome(){
		if( $this->session->userdata('id'))
		{ 
			// echo $this->session->userdata('id');
			$this->load->view('turf/turf_header');
			$this->load->view('turf/turf_home');
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}

	public function turfManageWorkingDays(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
			$data['week'] = $this->Onlinemodel->getWeek();
			$data['working_days'] = $this->Onlinemodel->getTurfWorkingdays($turf_id);
			$this->load->view('turf/turf_header');
			$this->load->view('turf/turf_manage_working_days',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function turfAddWorkingDays(){
		if( $this->session->userdata('id'))
		{ 
			$week_id=$this->input->get_post('week_id');
			$turf_id = $this->session->userdata('id');
			$response = $this->Onlinemodel->turfAddWorkingDays($week_id,$turf_id);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Week added succesfully');
				</script> 
				<?php 
				$this->turfManageWorkingDays();
			}
		}else{
			$this->index();
		}
	}
	public function turfDeleteWorkingWeek(){
		if( $this->session->userdata('id'))
		{ 
			$week_id=$this->input->get_post('id');
			$turf_id = $this->session->userdata('id');
			$response = $this->Onlinemodel->turfDeleteWorkingWeek($week_id);
			if($response==1){
				?>
				<script type="text/javascript">
				alert('Week deleted succesfully');
				</script> 
				<?php 
				$this->turfManageWorkingDays();
			}
		}else{
			$this->index();
		}
	}
	public function turfManageSlots(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
			$data['working_weeks'] = $this->Onlinemodel->getTurfWorkingdays($turf_id);
			$this->load->view('turf/turf_manage_slots',$data);
		}else{
			$this->index();
		}
	}
	public function turfViewBookings(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
			$data['bookings'] = $this->Onlinemodel->turfViewBookings($turf_id);
			$this->load->view('turf/turf_header');
			$this->load->view('turf/turf_view_bookings',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function turfViewImages(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
			$data['images'] = $this->Onlinemodel->turfViewImages($turf_id);
			$this->load->view('turf/turf_header');
			$this->load->view('turf/turf_add_images',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}
	public function turfAddImages(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
		if (isset($_POST['btnsave'])) {
		    $id = $_POST['id'];
		    $image = $_FILES['image'];

		    if ($image['error'] === UPLOAD_ERR_OK) {
		        $projectRoot = "C:/wamp64/www/Playhub";
				$uploadFolder = $projectRoot . '/assets/turf_images/'; // Adjust 'uploads' to your desired folder name
				$uploadFile = $uploadFolder . basename($image['name']);

		        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
		            // File was successfully uploaded. Now, you can store the image path in the database.
		            $imagePath = $uploadFile;  // Adjust this as needed based on your folder structure.
		            // Perform database insert or update with $imagePath.
		            $this->Onlinemodel->turfAddImages($turf_id,$imagePath);
		            $this->turfViewImages();

		            // After the database operation, you may want to redirect the user or display a success message.
		        } else {
		            // Handle the case where the file couldn't be moved.
		        }
		    }
		}
	}
	}

		public function turfViewFeedback(){
		if( $this->session->userdata('id'))
		{ 
			$turf_id = $this->session->userdata('id');
			$data['bookings'] = $this->Onlinemodel->turfViewFeedback($turf_id);
			$this->load->view('turf/turf_header');
			$this->load->view('turf/turf_view_feedback',$data);
			$this->load->view('admin/admin_footer');
		}else{
			$this->index();
		}
	}



	//turf section ends here
}
