<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

die;

?>
<script type="text/javascript">
	window.location = "index.php";
</script>
