        <div class="form-group">
            <div class="col-sm-16">
            Comment by GRO : <?php echo $processArray['ApplicationIssue']['comment'];?>
            </div>
        </div>
        
        <h4>Upload Supporting Document:</h4>
        <?php
        $issues = json_decode($processArray['ApplicationIssue']['issues']);
        $issues1 = array_filter($issues);
        foreach ($issues1 as $key => $value) { echo "<p>".ucfirst($value);?>
             : 

             <?php echo $this->Form->input($value, array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)")); ?>

             
        <?php echo "</p>"; }  ?>