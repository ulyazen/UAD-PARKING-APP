<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<title>PARKIR UAD</title>
<link href="<?= base_url('assets/'); ?>bootstrap/bootstrap.min.css" rel="stylesheet">
<?php if (isset($style)) echo $style; ?>
</head>

<?php if (isset($contents)) echo $contents; ?>


<script src="<?= base_url('assets/'); ?>jquery/jquery-3.4.1.slim.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap/bootstrap.min.js"></script>
<?php if (isset($script)) echo $script; ?>

</html>