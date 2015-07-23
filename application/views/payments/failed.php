<section class="module">
	<div class="container">
		<div class="row">

			<div class="col-sm-12" style="padding:8%">
				<?php if(isset($_SESSION['payment_error_message'])) { ?>
			    <div class="alert alert-danger fade in">
			    	
			        <h3><strong>Oops !</strong> Unfortunately your payment has been failed !</h3>
			        
			        
		
			        <p>Message from bank : <strong><?= $_SESSION['payment_error_message']; ?></strong></p>
			        
			        <?php 	unset($_SESSION['error_Message']);
			        		unset($_SESSION['payment_error_message']);
			        		unset($_SESSION['event_slug']);
			        ?>  
			    </div>
			    <?php }else{ ?>
			    Go to <?= anchor('/', 'Home'); ?> page
			    <?php } ?>
			</div>
		</div>
	</div>
</section>