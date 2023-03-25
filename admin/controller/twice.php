<?php
  if( $user["access"]["twice"] != 1  ):
    header("Location:".site_url("admin"));
    exit();
  endif;
require admin_view('twice');

?>