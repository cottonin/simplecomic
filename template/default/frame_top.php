<!DOCTYPE html5 >
<html lang="en">
<head>
	<title><?php echo $page->title; ?></title>
	<meta name="description" content="A comic about adventures, friends and terrible jokes."/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="theme-color" content="#<?php echo $page->color ?>"/>
	<meta name="robots" content="index,follow"/>
	
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#fd960f">
	<meta name="msapplication-TileColor" content="#ffc40d">

	<?php $page->output_css(); ?>
	<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body>