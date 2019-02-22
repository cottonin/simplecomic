<!DOCTYPE html5>
<html>
<head>
<title><?php echo $page->title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $page->output_css(); ?>
<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body>