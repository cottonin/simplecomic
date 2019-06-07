<?php

define('BASEURL', ''); // no trailing slash
define('DEBUG', false);

$config = array(
    'title' => "A Simple Comic",
    'author' => "Author Name",
    'author_site' => false, // author's url, if different to the comic's
    'comicpath' => "/comics",
    'template' => "default",
    'full_feed' => true, // means that comic images and rants appear in the feed
    'uses_slug' => false,
    'pretty_urls' => true,
    'frontpage_comic' => 'latest', // 'latest', 'first', or 'first-of-latest-day'
    'archive_order' => 'chapter', // 'date', 'chapter'
    'default_time' => '00:00:00', // HH:MM:SS default time for new content
    'adminuser' => "admin",
    'adminpass' => "admin",
);

$db = new DataBase('localhost', 'database', 'username', 'password', DEBUG);

?>
