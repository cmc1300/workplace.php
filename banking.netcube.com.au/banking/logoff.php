<?php
session_start();
//echo "activeLoginUser: " . $_SESSION['activeLoginUser'];
if(!empty($_SESSION['activeLoginUser'])) {
	unset($_SESSION['activeLoginUser']);
}

session_destroy();
print "<script>window.location=\"index.php\"</script>";
?>