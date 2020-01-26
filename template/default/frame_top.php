<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $page->title; ?></title>
	<meta name="description" content="A comic about a group of clueless friends in their quests as they look for buried treasure, fight fearsome creatures and overcome perilous challenges."/>
	<meta name="keywords" content="comic, webcomic, funny, comedy, adventure, quest, friends">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="theme-color" content="#<?php echo $page->color ?>"/>
	<meta name="robots" content="index,follow"/>
	<!-- Open Graph -->
	<meta property="og:locale" content="en_US"/>
	<meta property="og:site_name" content="Fluffy Gang - A funny adventure webcomic"/>
	<meta property="og:title" content="Fluffy Gang - A funny adventure webcomic"/>
	<meta property="og:url" content="<?php echo url('', true) ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="A comic about a group of clueless friends in their quests as they look for buried treasure, fight fearsome creatures and overcome perilous challenges."/>
	<meta property="og:image" content="<?php echo url('image/opengraph.jpg', true) ?>"/>
	<meta property="og:image:url" content="<?php echo url('image/opengraph.jpg', true) ?>"/>
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@fluffygang">
	<meta name="twitter:title" content="Fluffy Gang - A funny adventure webcomic">
	<meta name="twitter:description" content="A comic about a group of clueless friends in their quests as they look for buried treasure, fight fearsome creatures and overcome perilous challenges.">
	<meta name="twitter:image" content="<?php echo url('image/opengraph	.jpg', true) ?>">
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#fd960f">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<!-- Simplecomic CSS -->
	<?php $page->output_css(); ?>
	<!--- RSS -->
	<link rel="alternate" type="application/atom+xml" title="<?php echo config('title') ?> updates" href="<?php echo url('feed');?>" />
</head>
<body style="background-image: url(<?php echo url('image/background.svg'); ?>)">