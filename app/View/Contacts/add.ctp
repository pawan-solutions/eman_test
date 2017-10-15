
		
			<?php echo $this->Form->create(); 
			echo $this->Form->input('name',array('required'=>false));
			echo $this->Form->input('email',array('required'=>false));
			echo $this->Form->input('phone',array('required'=>false));
			
			echo $this->Form->button('submit',array('type'=>'submit'));
			?>
			
		
			
			 <?php  echo $this->Form->end(); ?>
		