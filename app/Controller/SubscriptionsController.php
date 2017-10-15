<?php
class SubscriptionsController extends AppController {
    
    var $uses = array("SubOrder","Subscription", "Application","Invoice");
    public function upgrade() {
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $this->layout='user_layout_new';
        $subscriptions = $this->Subscription->find('all', array('conditions'=>array('status'=>true), 'recursive'=>-1));
        $selected_plans = $this->SubOrder->find('list', array('fields'=>array('subscription_id'),'conditions'=>array('user_id'=>$owner_id),'recursive'=>-1));
        $this->set(compact('subscriptions','selected_plans'));
    }

    public function view($id) {
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $results = $this->SubOrder->find('first', array('conditions'=>array('SubOrder.id'=>$id)));
        $invoice_res = $this->Invoice->find('all', array('conditions'=>array('Invoice.sub_order_id'=>$id)));
        
        $row = 0;
        $invoices = array();
        if(empty($invoice_res))
        {
           $from_date = $results['SubOrder']['from_date'];
        }else{
           foreach($invoice_res as $invoice)
            {
                $invoices[$row]['from'] = $invoice['Invoice']['from_date'];
                $invoices[$row]['to'] = $invoice['Invoice']['to_date'];
                $invoices[$row]['date'] = $invoice['Invoice']['created_date'];
                $invoices[$row]['invoice_amount'] = $invoice['Invoice']['amount'];
                $invoices[$row]['title'] = "View";
                $invoices[$row]['controller'] = "invoices";
                $invoices[$row]['action'] = "view";
                $invoices[$row]['id'] = $invoice['Invoice']['id'];
                $row++;
                $from_date = $invoice['Invoice']['to_date'];
            } 
        }

        if(!empty($invoices))
        {
            $from_date = date("Y-m-d", strtotime("+1 day", strtotime($from_date)));
        }

            $to_date = date("Y-m-t",strtotime($from_date));
            $invoices[$row]['from'] = $from_date;
            $invoices[$row]['to'] = $to_date;
            $invoices[$row]['date'] = '';
            $invoices[$row]['invoice_amount'] = ''; 
            $invoices[$row]['title'] = "Generate";
            $invoices[$row]['controller'] = "invoices";
            $invoices[$row]['action'] = "generateInvoice";
            $invoices[$row]['id'] = $id;
            $this->Session->write('from_date', $from_date, false, '1 hour');
            $this->Session->write('to_date', $to_date, false, '1 hour');
            $this->Session->write('session_order_id',  $id, false, '1 hour');
            $this->set(compact("results","invoices"));
    }

    public function all() {
    	$this->paginate = array('limit' => PAGE_LIMIT, 'order'=>'Subscription.id desc');
        $subscriptions = $this->paginate('Subscription');
        $this->set('subscriptions', $subscriptions);

	}

    public function selected_plan() {
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $this->paginate = array('limit' => PAGE_LIMIT, 'order'=>'SubOrder.id desc');
        $results = $this->paginate('SubOrder'); 
        $this->set(compact("results"));
    }

	public function choose_plan_user()
	{ 
		$this->layout = $this->autoRender = false;
        if($this->request->data){
            $plan_id = $this->request->data['plan_id'];
            $user_id = $this->UserAuth->getUserId();
            $owner_id = $this->Application->getOwnerId($user_id);

            $created_date = date('Y-m-d H:i:s');
            $date = date('Y-m-d');
            $array1['SubOrder'] = array('id'=>'',
                        'user_id'=>$owner_id,
                        'subscription_id'=>$plan_id,
                        'company_ids'=>$plan_id,
                        'created_by'=>$user_id,
                        'from_date'=>$date,
                        'created_date'=>$created_date);
            $this->SubOrder->save($array1);
            echo "Plan successfully submitted";
           
        }

    }
		
	

}