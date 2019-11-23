<!DOCTYPE html5 >
<html lang="en">
<head>
	<title><?php echo $page->title; ?></title>
	<meta name="description" content="A comic about adventures, friends and terrible jokes."/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="theme-color" content="#<?php echo $page->color ?>"/>
	<meta name="robots" content="index,follow"/>

	<link rel="shortcut icon" href="<?php echo url('/favicon.png') ?>" type="image/png">
	<link rel="icon" href="<?php echo url('/favicon.png') ?>" type="image/png">

	<?php $page->output_css(); ?>
	<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body>