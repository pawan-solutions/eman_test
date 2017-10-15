<?php
class InvoicesController  extends AppController {

    var $uses = array("SubOrder", "Subscription","Invoice");
    var $components = array('Usermgmt.Search');

    public function all(){
        $this->paginate = array('limit' => 10, 'order'=>'Invoice.id desc', 'fields'=>array('Invoice.*', 'User.first_name'));
        $invoices = $this->paginate('Invoice');
        $this->set('invoices', $invoices);
    }

    public function generate_invoice($order_id){
        $user_id = $this->UserAuth->getUserId();
        if($order_id!='')
        {
            $order_result = $this->SubOrder->find('first', array('conditions'=>array('SubOrder.id'=>$order_id)));
            $from_date = $this->Session->read('from_date');
            $to_date = $this->Session->read('to_date');
            $session_order_id = $this->Session->read('session_order_id');
            if($order_id==$session_order_id)
            {
                $invoice_date = date("Y-m-d");
                $created_by = $user_id;
                $user_id = $order_result['SubOrder']['user_id'];
                $plan_amount = $order_result['Subscription']['plan_price'];
                $f_date = date("d",strtotime($from_date));
                if($f_date>1)
                {
                    $l_date = date("d",strtotime($from_date));
                    $rest_day = $l_date-$f_date;
                    $plan_amount = ($plan_amount/30) *$rest_day;
                }

                $new_invoice_array = array('id'=>'','user_id'=>$user_id,'sub_order_id'=>$order_id,
                    'amount'=>$plan_amount,'total_with_tax'=>'',
                'discount'=>'','from_date'=>$from_date, 'to_date'=>$to_date,'description'=>'','payment_status'=>0,
                'status'=>1,'invoice_date'=>$invoice_date,'created_by'=>$created_by);
                $this->Invoice->save($new_invoice_array);
            }
        }
        return $this->redirect(array('controller' => 'invoices', 'action' => 'all'));
                 
    }



}
