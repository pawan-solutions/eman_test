<?php echo $this->Form->create('Application'); ?>
<table class="table table-sm">
    <?php if(!empty($wrong_barcode)){ ?>
    <tr>
        <td colspan="2"><p>Barcode not in system : <?php echo implode(',',$wrong_barcode);?></p></td>
    </tr>
    <?php } 
    if($userGroup== HR || $userGroup== USER)
    {
        if(!empty($receivable_gro)){ ?>
        <tr>
            <td colspan="2"><p>Already dispatched barcode : <?php echo implode(',',$receivable_gro);?></p></td>
        </tr>
        <?php }?>

    <tr>
        <?php if(!empty($dispatchable_hr)){ ?>
        <td>
            <table class="table">
                    <tr><td>Barcode To Be Dispatch</td>
                        <td><?php echo date('d M Y H:i:s');?></td>
                    </tr>
                    <?php foreach ($dispatchable_hr as $key => $barcode) { ?>
                    <tr>
                        <td><?php echo ucfirst($name_and_barcode[$barcode]);?></td>
                        <td><?php echo $barcode;?></td>
                    </tr>
                    <?php } ?>
            </table>    
        </td>
        <?php }
        if(!empty($receivable_hr)){ ?>
        <td>
            <table class="table">
                    <tr><td colspan="3"><b>Barcode To Be Receive</b></td></tr>
                    <tr><th>Name</th> <th>Barcode</th> <th>Dispatched date</th> </tr>
                    <?php foreach ($receivable_hr as $key => $barcode) { ?>
                    <tr>
                        <td><?php echo ucfirst($name_and_barcode[$barcode]);?></td>
                        <td><?php echo $barcode;?></td>
                        <td><?php echo date("d M Y H:i:s",strtotime($rcvble_hr_datetime[$barcode]));?></td>
                        
                    </tr>
                    <?php } ?>
            </table>    
        </td>
        <?php } ?>
    </tr>
    <?php } 

    if($userGroup== GRO)
    {

        if(!empty($receivable_hr)){ ?>
        <tr>
            <td colspan="2"><p>Already dispatched barcode : <?php echo implode(',',$receivable_hr);?></p></td>
        </tr>
        <?php }?>

    <tr>
        <?php if(!empty($dispatchable_gro)){ ?>
        <td>
            <table>
                    <tr><td colspan="2">Barcode To Be Dispatch</td></tr>
                    <?php foreach ($dispatchable_gro as $key => $barcode) { ?>
                    <tr>
                        <td><?php echo ucfirst($name_and_barcode[$barcode]);?></td>
                        <td><?php echo $barcode;?></td>
                    </tr>
                    <?php } ?>
            </table>    
        </td>
        <?php }
        if(!empty($receivable_gro)){ ?>
        <td>
            <table width="100%" class="table">
                    <tr><td colspan="3"><strong>Barcode To Be Receive</strong></td></tr>
                    <tr><th>Name</th> <th>Barcode</th> <th>Dispatched date</th> </tr>
                    <?php foreach ($receivable_gro as $key => $barcode) {
                    ?>
                    <tr>
                        <td><?php echo ucfirst($name_and_barcode[$barcode]);?></td>
                        <td><?php echo $barcode;?></td>
                        <td><?php echo date("d M Y H:i:s",strtotime($rcvble_hr_datetime[$barcode]));?></td>
                    </tr>
                    <?php } ?>
            </table>    
        </td>
        <?php } ?>
    </tr>
    <?php } ?>

    <?php if(!empty($dispatchable_hr) ||  !empty($dispatchable_gro)){ ?>
    <tr><td  colspan="4">
        <table class="table">
            <tr><td colspan="2" align="center"><b>PASSPORT DISPATCH TO</b></td></tr>
            <tr>
                <td>Dispatch To  </td>
                <td><?php echo $this->Form->input('dispatch_to',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$dispatch_to,"label"=>false, 'id'=>"dispatch_to")); ?>
                </td>
            </tr>
            
            <tr>
                <td>Name Of Massager</td>
                <td><?php echo $this->Form->input('massager',array('type'=>'text' ,'class'=>"form-control" ,"label"=>false, 'id'=>"massager_name")); ?></td>
            </tr>

        </table>
    </td></tr>
    <?php }

    if(!empty($completed)){?>
    <!-- <tr>
        <td colspan="2"><p><b>Already Closed Barcode</b> : <?php echo implode(',',$completed);?></p></td>
    </tr> -->
    <?php } ?>

    <tr><td  colspan="2">
    <?php 
    if(empty($dispatchable_hr) && empty($receivable_hr) && empty($receivable_gro) && empty($dispatchable_gro))
    {
        //not any button will shown
    }else{
        echo $this->Form->button('Submit',array('type'=>'button', 'class'=>'btn btn-success', 'id'=>'final_submit_barcode'));
        echo "&nbsp;";
        echo $this->Form->button('View',array('type'=>'button', 'class'=>'btn btn-info'));
        echo "&nbsp;";
        
        //echo $this->Form->button('Print List',array('type'=>'button', 'class'=>'btn btn-primary'));
        ?>
        <a href="javascript:print_window()" class='btn btn-primary'>Print List</a>
    <?php } ?>

    </td></tr>

    
</table>
<?php echo $this->Form->end();?>
<script type="text/javascript">
    

function print_window() {
    window.print();
}
</script>

<style type="text/css" media="print">
    .container, .wrapper{display: none;}
    @page {
        margin: 0mm;  /* this affects the margin in the printer settings */  
    }


</style>


