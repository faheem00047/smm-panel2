<?php
  if( $user["access"]["callback"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;
require admin_view('callback');

?>