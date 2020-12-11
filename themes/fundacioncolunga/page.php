<?php

$title = get_the_title();
include('header.php');

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  the_content();
  endwhile; endif;
 ?>


<?php include('footer.php'); ?>