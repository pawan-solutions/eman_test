<?php


App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class AutocompleteController extends UserMgmtAppController {
	public function fetch($model, $field) {
		if($this->RequestHandler->isAjax()) {
			$results = array();
			if(isset($_GET['term'])) {
				$query = $_GET['term'];
				$this->loadModel($model);
				$results = $this->$model->find('all', array(
				   'conditions'=>array(
					   $model . "." . $field . " LIKE '%" . $query . "%'"
				   ), 'fields'=>array(
					   "DISTINCT(".$model . "." . $field.")"
				   )
				));
			}
			$resultToPrint=array();
			foreach($results as $res) {
				$resultToPrint[]=$res[$model][$field];
			}
		}
		echo json_encode($resultToPrint);
		exit;
	}
}