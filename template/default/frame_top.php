<!DOCTYPE html5>
<html>
<head>
<title><?php echo $page->title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.png" type="image/png">
<link rel="icon" href="favicon.png" type="image/png">
<?php $page->output_css(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body style="background-image: url(<?php echo url('image/background.png'); ?>)">