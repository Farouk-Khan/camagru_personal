<?php

if(session_id() == '' || !isset($_SESSION)){
    session_start();
  }

include "header.php";
include "topbar.php";
include "feed.php";
include "footer.php";
?>