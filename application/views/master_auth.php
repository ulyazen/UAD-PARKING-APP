<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo APP_NAME ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= base_url('assets/'); ?>bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <?php if (isset($style)) echo $style; ?>
</head>

<body id="page-top" class="bg-dark" style="font-family: 'Nunito', sans-serif !important;">

    <?php if (isset($contents)) echo $contents; ?>

</body>
<script src="<?= base_url('assets/'); ?>jquery/jquery-3.4.1.slim.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap/bootstrap.min.js"></script>
<?php if (isset($script)) echo $script; ?>

</html>