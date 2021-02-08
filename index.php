<?php

$start_time = microtime(true);

ob_start();

define('BASEDIR', dirname(__FILE__));

require_once 'include/db.php';
require_once 'include/page.php';
require_once 'include/common.php';
require_once 'include/config.php';

if(DEBUG) {
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
}

define('STATUS_CLOSED', 1);

$template_fallbacks = array(
    // 'template_name' => 'template_to_use_instead'
    'admin_head.php' => 'head.php',
    'admin_foot.php' => 'foot.php',
    'archive_head.php' => 'head.php',
    'archive_foot.php' => 'foot.php',
    'comic_head.php' => 'head.php',
    'comic_foot.php' => 'foot.php',
    'chapter_head.php' => 'head.php',
    'chapter_foot.php' => 'foot.php',
    'rant_head.php' => 'head.php',
    'rant_foot.php' => 'foot.php',
);

$request = isset($_REQUEST['q']) && $_REQUEST['q'] && $_REQUEST['q'] != '/' ? $_REQUEST['q'] : 'index';
$request = array_values(array_filter(explode('/', $request)));

$page = new Page();
$page->title = config('title');
$page->color = config('color');
$page->add_css(template_path('style.css'));
$page->set_start_time($start_time);

switch($request[0]) {
    case 'api':
        require_once 'include/api.php';
        break;
    case 'index':
        // frontpage
        $selection_style = config('frontpage_comic', 'latest');
        $page->debug('selection_style', $selection_style);
        switch($selection_style) {
            case 'issue':
                $latest = $db->quick("SELECT pub_date FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
                $midnight = strtotime(date('Y-m-d', $latest));
                $comics = $db->fetch("SELECT comicid, title, slug FROM comics WHERE pub_date >= %d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC LIMIT 5", $midnight);

                $chapters = $db->fetch("SELECT * FROM chapters ORDER BY `order` DESC");
                break;
            case 'first':
                $comic = $db->fetch_first("SELECT * FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC LIMIT 1");
                break;
            case 'first-of-latest-day':
                $latest = $db->quick("SELECT pub_date FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
                $midnight = strtotime(date('Y-m-d', $latest));
                $comic = $db->fetch_first("SELECT * FROM comics WHERE pub_date >= %d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC LIMIT 1", $midnight);
                break;
            case 'latest':
            default:
                $comic = $db->fetch_first("SELECT * FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
                break;
        }
        if(isset($comic) && $comic) {
            $comic['text'] = fetch_text($comic['comicid']);
            $comic['nav'] = fetch_navigation($comic);
        }
        $rant = $db->fetch_first("SELECT * FROM rants r LEFT JOIN rants_text t ON r.rantid = t.rantid WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
        $page->title.= ' - Home';

        if (config('frontpage_comic') == 'issue') {
            template('index', array(
                'comics' => $comics,
                'chapters' => $chapters,
                'rant' => $rant,
                'updates' => fetch_recent_updates(),
            ));
        } else {
            template('index', array(
                'comic' => $comic,
                'chapters' => $chapters,
                'rant' => $rant,
                'updates' => fetch_recent_updates(),
            ));
        }
        break;
    case 'comic':
        // image display!
        if($request[1] == 'image') {
            $comic = $db->fetch_first("SELECT * FROM comics WHERE comicid = %d AND pub_date <= UNIX_TIMESTAMP()", $request[2]);
            if($comic && config('comicpath')) {
                $filename = $comic['filename'];
                $file = BASEDIR . '/assets/comics/' . $filename;
                ready_file($file);
            }
            header('HTTP/1.1 404 Not Found');
            $msg = 'Wait, this image does not exist in this site!';
            template('404', array( 'msg' => $msg));
            die;
        }
        // comic page
        if (!is_numeric($request[1])) {
            $comic = $db->fetch_first("SELECT * FROM comics WHERE slug = %s AND pub_date <= UNIX_TIMESTAMP()", $request[1]);
        } else {
            $comic = $db->fetch_first("SELECT * FROM comics WHERE comicid = %d AND pub_date <= UNIX_TIMESTAMP()", $request[1]);
        }
        if(!$comic) {
            redirect("");
        }
        $page->title.= ' - '.$comic['title'];
        $comic['text'] = fetch_text($comic['comicid']);
        $comic['nav'] = fetch_navigation($comic);
        template('comic_page', array('comic'=>$comic));
        break;
    case 'archive':
        // full strip listing
        $query = "SELECT c.*, ch.title AS chapter_title, ch.slug AS chapter_slug, ch.filename as filename, ct.description AS chapter_description, ch.status as status FROM comics c LEFT JOIN chapters ch ON c.chapterid = ch.chapterid LEFT JOIN chapters_text ct ON c.chapterid = ct.chapterid WHERE c.pub_date <= UNIX_TIMESTAMP() ORDER BY ";
        switch (config('archive_order', 'date')) {
            case 'chapter':
                $query .= "ch.order ASC, ";
            case 'date':
                $query .= "c.pub_date ASC";
                break;
        }
        $page->title.= ' - Archive';
        $comics = $db->fetch($query);
        template('archive', array('comics' => $comics));
        break;
    case 'chapters':
        // chapter listing
        $page->title.= ' - Chapter List';
        $chapters = $db->fetch("SELECT * FROM chapters ORDER BY `order` ASC");
        template('chapter_list', array('chapters'=>$chapters));
        break;
    case 'chapter':
        // image display!  
        if($request[1] == 'image' && isset($request[2])) {
            $chapter = $db->fetch_first("SELECT * FROM chapters WHERE chapterid = %d", $request[2]);
            if($chapter && config('comicpath')) {
                $file = BASEDIR . '/assets/comics/' . $chapter['filename'];
                ready_file($file);
            }
            header('HTTP/1.1 404 Not Found');
            $msg = 'This image does not exist in this site.';
            template('404', array( 'msg' => $msg));
            die;
        }
        // specific chapter
        if(isset($request[1])) {
            $slug = $request[1];
            $chapter = $db->fetch_first("SELECT c.*, t.description FROM chapters c LEFT JOIN chapters_text t ON c.chapterid = t.chapterid  WHERE c.slug=%s", $slug);
            if(!$chapter) {
                redirect("chapters");
            }
            $page->title.= ' - '.$chapter['title'];
            $comics = $db->fetch("SELECT * FROM comics WHERE chapterid=%d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC", $chapter['chapterid']);

            template('chapter', array(
                'chapter' => $chapter,
                'comics' => $comics,
            ));
        } else {
            redirect("chapters");
        }
        break;
    case 'rants':
        $rants = $db->fetch("SELECT * FROM rants ORDER BY pub_date DESC");
        $page->title.= ' - Rant List';
        template('rant_list', array('rants'=>$rants));
        break;
    case 'rant':
        if(isset($request[1])) {
            // specific rant
            $rant = $db->fetch_first("SELECT * FROM rants r LEFT JOIN rants_text t ON r.rantid = t.rantid WHERE r.rantid=%d", $request[1]);
            $page->title.= ' - Rant: '.$rant['title'];
            if(!$rant) {
                redirect("rants");
            }
            template('rant_page', array(
                'rant' => $rant,
            ));
        } else {
            redirect("chapters");
        }
        break;
    case 'admin':
        $page->title.= ' - Admin';
        require 'include/admin.php';
        break;
    case 'feed':
        template('feed', array(
            'updates' => fetch_recent_updates(true),
        ));
        break;
    case 'image':
        // load a static image (not from comics dbq)
        if (!isset($request[1])) {
            echo "This not an image!";
            die;
        }
        $file = BASEDIR . '/assets/' . $request[1];
        ready_file($file);
    	header('HTTP/1.1 404 Not Found');
    	$msg = 'We\'re sorry, this image does not exist in this site.';
    	template('404', array( 'msg' => $msg));
        break;
    default:
        $page->title.= ' - '.ucfirst($request[0]);
        if(template('page_'.$request[0])) {
            // This is *so* relying on side-effects. :P
            // (template returns true if a valid template was found and displayed)
            return;
        }
        // 404
        header('HTTP/1.1 404 Not Found');
        $msg = 'We\'re sorry, this page does not exist in this site.';
        template('404', array( 'msg' => $msg));
        break;
}

?>
