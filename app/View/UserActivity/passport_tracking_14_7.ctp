<?php 
if(!empty($wrong_barcode)){?>
<p>Barcode not in system : <?php echo implode(',',$wrong_barcode);?></p>
<?php }

    echo $this->Form->create('Application'); 
    if($userGroup== HR || $userGroup== "user")
    {
        $step1_text = "Dispatchable barcode";
        $step2_text = "Receivable barcode";
        if(!empty($dispatchable_hr)){
            echo "<p>".$step1_text."</p>";
            $dispatchable_hr = implode(',',$dispatchable_hr);
            echo "<p>".$dispatchable_hr."</p>";
        }

        if(!empty($receivable_hr)){
            echo "<p>".$step2_text."</p>";
            $receivable_hr = implode(',',$receivable_hr);
            echo "<p>".$receivable_hr."</p>";
        }

    }elseif($userGroup== GRO){
        $step1_text = "Receivable barcode";
        $step2_text = "Dispatchable barcode";

        if(!empty($receivable_gro)){
            echo "<p>".$step1_text;
            $receivable_gro = implode(',',$receivable_gro);
            echo "<p>".$receivable_gro."</p>";
        }

        if(!empty($dispatchable_gro)){
            echo "<p>".$step2_text;
            $dispatchable_gro = implode(',',$dispatchable_gro);
            echo "<p>".$dispatchable_gro."</p>";
        }
    }
    
     echo $this->Form->button('Submit',array('type'=>'button', 'class'=>'btn btn-primary', 'id'=>'final_submit_barcode'));
     echo $this->Form->end();
?> 

