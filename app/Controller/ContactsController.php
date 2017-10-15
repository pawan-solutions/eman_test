<?php

class ContactsController extends AppController {

	public function add() {
		$this->layout='';

		 if($this->request->data){
		 	if($this->Contact->save($this->request->data))
		 	{
		 		echo "saved";
		 	 $this->Session->setFlash(__('Contact has been saved successfully'));                 	
		 	}else{
		 		echo "not saved";
		 		$this->Session->setFlash(__('Contact has been not saved successfully'));
		 	}
       		//pr($this->request->data);
       	 }
	}







// class Post extends AppModel {
// public function newest() { 
// 	$result = Cache::read('newest_posts', 'long'); 
// 	if (!$result) { $result = $this->find('all', array('order' => 'Post.updated DESC', 'limit' => 10));
// 	 Cache::write('newest_posts', $result, 'long'); } return $result; }
// }



// class Post extends AppModel {
// public function newest() { 
// 	$model = $this; return Cache::remember('newest_posts', function() use ($model){ 
// 		return $model->find('all', array( 'order' => 'Post.updated DESC', 'limit' => 10 )); }, 'long'); }
// }




















	 // public function save($id = NULL){
  //       if(!empty($this->request->data)){
  //           $this->set($this->data);
  //           if($this->Contact->contactValidate()){
  //               if($this->Contact->save($this->request->data)){
  //                   $this->Session->setFlash(__('Contact has been saved successfully'));
  //                   $this->redirect('/contacts');
  //               }
  //           }else{
  //               return $this->Contact->validationErrors();
  //           }
  //       }else{
  //           if(!empty($id)){
  //               $data = $this->Contact->read(null, $id);
  //               if(!empty($data)){
  //                   $this->request->data = $data;
  //               }else{
  //                   $this->Session->setFlash(__('Contact not found'));
  //               }    
  //           }
  //       }
        
  //   } 
   





}
