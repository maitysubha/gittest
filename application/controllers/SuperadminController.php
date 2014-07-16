<?php

class SuperadminController extends Controller {

	function __construct($controller, $action) {
		parent::__construct($controller, $action);
		
	}


	function index() {
		$this->render = 1;
		$this->_view->set('value', "testValue");
		
		if(!empty($_REQUEST['aa'])){
                       $cond = array(
                               'SuperAdmin.username' => $this->request->data['SuperAdmin']['username'],
                               'SuperAdmin.password' => $this->request->data['SuperAdmin']['password']
                       );
               
                       $users = $this->SuperAdmin->find('all', array('conditions' => $cond,'limit' => 1));
                       if(count($users)>0){
                               $users[0]['SuperAdmin']['last_login_date'] = date('Y-m-d h:i:s');
                               $users[0]['SuperAdmin']['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
                               $this->SuperAdmin->id = $users[0]['SuperAdmin']['id'];
                               $this->Session->write('SUPER_ADMIN_LOGGED', serialize($users[0]));
                               $this->redirect(array('controller'=>'superadmin', 'action'=>'dashboard'));
                       }
                       else {
                               $this->Session->setFlash('Username or password is incorrect!!');
                               return false;
                       }
               }
		//header("Location: " . BASEURL . "search/form");
	}

	function noviewaction() {

		$this->render = 0;
		
		echo "NoViewAction";
		//header("Location: " . BASEURL . "search/form");
	}
}