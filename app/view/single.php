<?php
require_once (K_AppBase.'view/inc/n_header_meta.php');
require_once (K_AppBase.'view/inc/n_header.php');
?>


<?php echo $test ?>


<div class="row">
  <div class="col-md-8">
	
	<?php 
	foreach ($posts as $post) {

		echo $post['title'];
		echo '<hr>';
		echo $post['contents'];

	}
	?>



  </div>

  <div class="col-md-4">右リスト</div>
</div>






<?php
require_once (K_AppBase.'view/inc/n_footer.php');


