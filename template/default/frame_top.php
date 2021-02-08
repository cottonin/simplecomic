<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $page->title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="robots" content="index,follow"/>
	<!-- Meta Tags -->
	<?php template('seo'); ?>
	<!-- Simplecomic CSS -->
	<?php $page->output_css(); ?>
	<!--- RSS -->
	<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body style="background-image: url(<?php echo url('image/background.png'); ?>)">