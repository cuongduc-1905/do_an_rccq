<?php include 'header.php' ?>
<div class="container">
<?php if (!isset($_SESSION['cus_login'])) :?>
	chua dang nhap
<?php else:?>
	da dang nhap
<?php endif; ?>
</div>
<?php include 'footer.php.php' ?>