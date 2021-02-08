<?php 
$request = isset($_REQUEST['q']) && $_REQUEST['q'] && $_REQUEST['q'] != '/' ? $_REQUEST['q'] : 'api/index';
$request = array_values(array_filter(explode('/', $request)));

function setJSONResponse($data) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Access-Control-Allow-Origin: *');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-Type: application/json'); 
    
    echo json_encode($data);
}

switch ($request[1]):
    case 'index':
        echo 'index val';
        break;
    case 'comic':

        if (!is_numeric($request[2])) {
            $comic = $db->fetch_first("SELECT * FROM comics WHERE slug = %s AND pub_date <= UNIX_TIMESTAMP()", $request[2]);
        } else {
            $comic = $db->fetch_first("SELECT * FROM comics WHERE comicid = %d AND pub_date <= UNIX_TIMESTAMP()", $request[2]);
        }
        
        if(!$comic) {
            header('HTTP/1.1 404 Not Found');
            header('Content-Type: application/json'); 
            echo 'Comic Page Not Found!';
            break;
        }

        $comic['text'] = fetch_text($comic['comicid']);
        $comic['nav'] = fetch_navigation($comic);

        setJSONResponse($comic);
        break;
    case 'comics':

        $latest = $db->quick("SELECT pub_date FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
        $midnight = strtotime(date('Y-m-d', $latest));
        $comics = $db->fetch("SELECT comicid, title, slug FROM comics WHERE pub_date >= %d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC LIMIT 5", $midnight);

        // warning: massive, full comic list.
        if (isset($_GET['latest'])) {
            $latest = $db->quick("SELECT pub_date FROM comics WHERE pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date DESC LIMIT 1");
            $midnight = strtotime(date('Y-m-d', $latest));
            $comics = $db->fetch("SELECT comicid, title, slug, pub_date, filename FROM comics WHERE pub_date >= %d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC", $midnight);

            setJSONResponse($comics);

            break;
        } else {
            $query = "SELECT c.*, ch.status as status FROM comics c LEFT JOIN chapters ch ON c.chapterid = ch.chapterid LEFT JOIN chapters_text ct ON c.chapterid = ct.chapterid WHERE c.pub_date <= UNIX_TIMESTAMP() ORDER BY ";
        }

        switch (config('archive_order', 'date')) {
            case 'chapter':
                $query .= "ch.order ASC, ";
            case 'date':
                $query .= "c.pub_date ASC";
                break;
        }

        $comics = $db->fetch($query);
        
        setJSONResponse($comics);

        break;
    case 'chapter':

        if (!is_numeric($request[2])) {
            $chapter = $db->fetch_first("SELECT c.*, t.description FROM chapters c LEFT JOIN chapters_text t ON c.chapterid = t.chapterid  WHERE c.slug=%s", $request[2]);
        } else {
            $chapter = $db->fetch_first("SELECT c.*, t.description FROM chapters c LEFT JOIN chapters_text t ON c.chapterid = t.chapterid  WHERE c.chapterid=%s", $request[2]);
        }

        if(!$chapter) {
            header('HTTP/1.1 404 Not Found');
            header('Content-Type: application/json'); 
            echo 'Chapter Not Found!';
            break;
        }
        $comics = $db->fetch("SELECT * FROM comics WHERE chapterid=%d AND pub_date <= UNIX_TIMESTAMP() ORDER BY pub_date ASC", $chapter['chapterid']);

        $chapter['comics'] = $comics;

        setJSONResponse($chapter);
        break;
    case 'chapters':
        $chapters = $db->fetch("SELECT c.*, t.description FROM chapters c LEFT JOIN chapters_text t ON c.chapterid = t.chapterid ORDER BY c.order");
        setJSONResponse($chapters);
        break;
    case 'rant':
        // specific rant
        $rant = $db->fetch_first("SELECT * FROM rants r LEFT JOIN rants_text t ON r.rantid = t.rantid WHERE r.rantid=%d", $request[2]);
        if(!$rant) {
            header('HTTP/1.1 404 Not Found');
            header('Content-Type: application/json'); 
            echo 'Rant Not Found!';
            break;
        }
        setJSONResponse($rant);
        break;
    case 'rants':
        $rants = $db->fetch("SELECT * FROM rants r LEFT JOIN rants_text t ON r.rantid = t.rantid ORDER BY pub_date DESC");

        setJSONResponse($rants);
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        $msg = 'We\'re sorry, this page does not exist in this site.';
        template('404', array( 'msg' => $msg));
        break;
endswitch;
?>