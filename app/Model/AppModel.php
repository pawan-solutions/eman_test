<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function getOwnerId($user_id){
		App::import ("Model", "User");
                $model = new User;
                $result = $model->findById($user_id, 'User.owner_id');
                if(!empty($result) and $result['User']['owner_id']>0)
                {
                	return $result['User']['owner_id'];
                }else{
                	return $user_id;
                }
		
	}

        public function getHrDetail($owner_id){
                $groupID = 8;  //this is for HR of customer side
                App::import ("Model", "User");
                $model = new User;
                $result = $model->find('first', array('conditions'=>array('User.owner_id'=>$owner_id, 'User.user_group_id'=>$groupID),
                        'fields'=>array('User.first_name','User.last_name', 'User.email')));
                if(!empty($result))
                {
                        return $result;
                }else{
                        return "HR not found";
                }
                
        }

}
