<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Admin Routes
$route['mybio23admin'] = 'admin/index';
$route['login'] = 'admin/login';
$route['dashboard'] = 'admin/dashboard';

$route['editprofile'] = 'admin/editprofile';
$route['changepassword'] = 'admin/password';
$route['updateprofile/(:any)'] = 'admin/updateprofile/$1';
$route['changepassword/(:any)'] = 'admin/changepassword/$1';
$route['logout'] = 'admin/logout';

$route['privacypolicy'] = 'admin/privacypolicy';
$route['updateprivacypolicy/(:any)'] = 'admin/updateprivacypolicy/$1';
$route['termsconditions'] = 'admin/termsconditions';
$route['updatetermscondition/(:any)'] = 'admin/updatetermscondition/$1';

$route['news'] = 'admin/news';
$route['addnews'] = 'admin/addnews';
$route['managenews'] = 'admin/managenews';
$route['editnews/(:any)/(:any)'] = 'admin/editnews/$1/$2';
$route['updatenews/(:any)/(:any)'] = 'admin/updatenews/$1/$2';
$route['deletenews/(:any)/(:any)'] = 'admin/deletenews/$1/$2';

$route['banner'] = 'admin/banner';
$route['addbanner'] = 'admin/addbanner';
$route['managebanner'] = 'admin/managebanner';
$route['editbanner/(:any)/(:any)'] = 'admin/editbanner/$1/$2';
$route['updatebanner/(:any)/(:any)'] = 'admin/updatebanner/$1/$2';
$route['deletebanner/(:any)/(:any)'] = 'admin/deletebanner/$1/$2';

$route['test'] = 'admin/test';
$route['addtest'] = 'admin/addtest';
$route['managetest'] = 'admin/managetest';
$route['edittest/(:any)/(:any)'] = 'admin/edittest/$1/$2';
$route['updatetest/(:any)/(:any)'] = 'admin/updatetest/$1/$2';
$route['deletetest/(:any)/(:any)'] = 'admin/deletetest/$1/$2';

$route['kit'] = 'admin/kit';
$route['addkit'] = 'admin/addkit';
$route['managekit'] = 'admin/managekit';
$route['editkit/(:any)/(:any)'] = 'admin/editkit/$1/$2';
$route['updatekit/(:any)/(:any)'] = 'admin/updatekit/$1/$2';
$route['deletekit/(:any)/(:any)'] = 'admin/deletekit/$1/$2';

$route['branch'] = 'admin/branch';
$route['addbranch'] = 'admin/addbranch';
$route['managebranch'] = 'admin/managebranch';
$route['editbranch/(:any)/(:any)'] = 'admin/editbranch/$1/$2';
$route['updatebranch/(:any)/(:any)'] = 'admin/updatebranch/$1/$2';
$route['deletebranch/(:any)/(:any)'] = 'admin/deletebranch/$1/$2';

$route['category'] = 'admin/category';
$route['addcategory'] = 'admin/addcategory';
$route['managecategory'] = 'admin/managecategory';
$route['editcategory/(:any)/(:any)'] = 'admin/editcategory/$1/$2';
$route['updatecategory/(:any)/(:any)'] = 'admin/updatecategory/$1/$2';
$route['deletecategory/(:any)/(:any)'] = 'admin/deletecategory/$1/$2';

$route['product'] = 'admin/product';
$route['addproduct'] = 'admin/addproduct';
$route['manageproduct'] = 'admin/manageproduct';
$route['editproduct/(:any)/(:any)'] = 'admin/editproduct/$1/$2';
$route['updateproduct/(:any)/(:any)'] = 'admin/updateproduct/$1/$2';
$route['deleteproduct/(:any)/(:any)'] = 'admin/deleteproduct/$1/$2';

$route['coupon'] = 'admin/coupon';
$route['addcoupon'] = 'admin/addcoupon';
$route['managecoupon'] = 'admin/managecoupon';
$route['editcoupon/(:any)/(:any)'] = 'admin/editcoupon/$1/$2';
$route['updatecoupon/(:any)/(:any)'] = 'admin/updatecoupon/$1/$2'; 
$route['deletecoupon/(:any)/(:any)'] = 'admin/deletecoupon/$1/$2';

$route['manageenquiry'] = 'admin/manageenquiry';
$route['otphistory'] = 'admin/otphistory';
$route['registereduser'] = 'admin/registereduser';
$route['appointment-history'] = 'admin/appointmenthistory';
$route['appointmenthistory/(:num)'] = 'admin/appointmenthistory/$1';
$route['orderhistory/(:num)'] = 'admin/order_history/$1';
$route['order-history'] = 'admin/order_history';
$route['change-order-status/(:num)'] = 'admin/change_order_status/$1';
$route['payment/(:any)']  = 'admin/payment/$1';
$route['timeslot'] = 'admin/branchtimeslot';

$route['location'] = 'admin/location';
$route['addlocation'] = 'admin/addlocation';
$route['managelocation'] = 'admin/managelocation';
$route['editlocation/(:any)/(:any)'] = 'admin/editlocation/$1/$2';
$route['updatelocation/(:any)/(:any)'] = 'admin/updatelocation/$1/$2'; 
$route['deletelocation/(:any)/(:any)'] = 'admin/deletelocation/$1/$2';

$route['testimonial'] = 'admin/testimonial';
$route['addtestimonial'] = 'admin/addtestimonial';
$route['managetestimonial'] = 'admin/managetestimonial';
$route['edittestimonial/(:any)/(:any)'] = 'admin/edittestimonial/$1/$2';
$route['updatetestimonial/(:any)/(:any)'] = 'admin/updatetestimonial/$1/$2'; 
$route['deletetestimonial/(:any)/(:any)'] = 'admin/deletetestimonial/$1/$2';

$route['subscription'] = 'admin/subscription';
$route['addsubscription'] = 'admin/addsubscription';
$route['managesubscription'] = 'admin/managesubscription';
$route['editsubscription/(:any)/(:any)'] = 'admin/editsubscription/$1/$2';
$route['updatesubscription/(:any)/(:any)'] = 'admin/updatesubscription/$1/$2'; 
$route['deletesubscription/(:any)/(:any)'] = 'admin/deletesubscription/$1/$2';

$route['view-appointment/(:num)/(:any)'] = 'admin/viewappointment/$1/$2';
$route['view-product/(:num)/(:any)'] = 'admin/viewproduct/$1/$2';
$route['view-user/(:num)/(:any)'] = 'admin/viewuser/$1/$2';
$route['view-order/(:num)/(:any)'] = 'admin/vieworder/$1/$2';
$route['view-branch/(:num)/(:any)'] = 'admin/viewbranch/$1/$2';

$route['active/(:num)/(:any)/(:any)'] = 'admin/changeactivestatus/$1/$2/$3';
$route['inactive/(:num)/(:any)/(:any)'] = 'admin/changeinactivestatus/$1/$2/$3'; 
   
// Branch Routes
$route['mybio23branch'] = 'branch/index';
$route['branch-login'] = 'branch/login';
$route['branch-dashboard'] = 'branch/dashboard';
$route['branch-profile'] = 'branch/profile';
$route['branch-update-profile/(:any)'] = 'branch/updateprofile/$1'; 
$route['branch-password'] = 'branch/password';
$route['branch-change-password/(:any)'] = 'branch/changepassword/$1';
$route['branch-logout'] = 'branch/logout';

$route['branch-staff'] = 'branch/staff';
$route['branch-add-staff'] = 'branch/addstaff';
$route['branch-manage-staff'] = 'branch/managestaff';
$route['branch-edit-staff/(:any)'] = 'branch/editstaff/$1';
$route['branch-update-staff/(:any)'] = 'branch/updatestaff/$1';
$route['branch-delete-staff/(:any)'] = 'branch/deletestaff/$1';

$route['branch-timeslot'] = 'branch/timeslot';
$route['branch-add-timeslot'] = 'branch/addtimeslot';
$route['branch-manage-timeslot'] = 'branch/managetimeslot';
$route['branch-edit-timeslot/(:any)'] = 'branch/edittimeslot/$1';
$route['branch-update-timeslot/(:any)'] = 'branch/updatetimeslot/$1';
$route['branch-delete-timeslot/(:any)'] = 'branch/deletetimeslot/$1';

$route['branch-ticket'] = 'branch/ticket';
$route['branch-add-ticket'] = 'branch/addticket';
$route['branch-manage-ticket'] = 'branch/manageticket';
$route['branch-edit-ticket/(:any)'] = 'branch/editticket/$1';
$route['branch-update-ticket/(:any)'] = 'branch/updateticket/$1';
$route['branch-delete-ticket/(:any)'] = 'branch/deleteticket/$1';

$route['branch-appointment-history'] = 'branch/appointmenthistory';
$route['branch-appointmenthistory/(:num)'] = 'branch/appointmenthistory/$1';
$route['branch-change-appointment-status/(:num)'] = 'branch/change_appointment_status/$1';
$route['branch-change-appointmentstatus/(:num)'] = 'branch/changeappointmentstatus/$1';

$route['branch-manage-kit'] = 'branch/managekit';
$route['branch-manage-test'] = 'branch/managetest';
$route['branch-manage-product'] = 'branch/manageproduct';
$route['branch-registered-user'] = 'branch/registereduser';
$route['branch-manage-category'] = 'branch/managecategory';
$route['branch-view-product/(:any)'] = 'branch/viewproduct/$1';

$route['branch-active/(:num)/(:any)/(:any)'] = 'branch/changeactivestatus/$1/$2/$3';
$route['branch-inactive/(:num)/(:any)/(:any)'] = 'branch/changeinactivestatus/$1/$2/$3'; 

// Homepage Routes
$route['/'] = 'home/index';
$route['about'] = 'home/about';
$route['shop'] = 'home/shop';
$route['contact-us'] = 'home/contact';
$route['contact-us-post'] = 'home/contact_post';
$route['services'] = 'home/services';
$route['latest-news'] = 'home/latestnews';
$route['plan'] = 'home/plan';
$route['terms-conditions'] = 'home/termsconditions';
$route['privacy-policy'] = 'home/privacypolicy';

$route['userprofile'] = 'home/userprofile';
$route['lab-view'] = 'home/lab_view';
$route['lab'] = 'home/lab';
$route['lab-category'] = 'home/labcategory';
$route['branch-test'] = 'home/branch_test';
$route['home-test'] = 'home/home_test';
$route['appointment'] = 'home/appointment';
$route['order'] = 'home/order';
$route['user-order-history'] = 'home/order_history';
$route['user-order-tracking'] = 'home/order_tracking';
$route['user-reward'] = 'home/reward';
$route['user-reward-history'] = 'home/reward_history';

$route['test-detail/(:any)'] = 'home/testdetail/$1';
$route['branch-detail/(:any)'] = 'home/branchdetail/$1';
$route['product-detail/(:any)'] = 'home/productdetail/$1';

$route['cart'] = 'home/cart';
$route['add-to-cart/(:any)/(:any)/(:any)'] = 'home/addtocart/$1/$2/$3';
$route['replace-cart-item/(:any)/(:any)/(:any)'] = 'home/replacecartitem/$1/$2/$3';

// User Dashboard Routes
$route['signin'] = 'home/signin';
$route['signin-post'] = 'home/signin_post';
$route['register'] = 'home/register';
$route['register-post'] = 'home/register_post';
$route['user-dashboard'] = 'home/dashboard';
$route['user-logout'] = 'home/logout';
$route['user-profile/(:num)'] = 'home/profile/$1';
$route['user-edit-profile/(:num)'] = 'home/editprofile/$1';
$route['user-update-profile/(:num)'] = 'home/updateprofile/$1';
$route['user-change-password/(:num)'] = 'home/changepassword/$1';
$route['user-change-password-post/(:num)'] = 'home/changepasswordpost/$1';
$route['user-change-verification-code/(:num)'] = 'home/changeverificationcode/$1';
$route['user-change-verification-code-post/(:num)'] = 'home/changeverificationcodepost/$1';
$route['user-create-verification-code/(:num)'] = 'home/createverificationcode/$1';
$route['user-create-verification-code-post/(:num)'] = 'home/createverificationcodepost/$1';
$route['user-forgot-password'] = 'home/forgotpassword';
$route['user-forgot-password-post'] = 'home/forgotpasswordpost';



