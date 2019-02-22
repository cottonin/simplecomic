<?php
/*
available variables:
 $page: array of info about the page
 $title: comic title
 $pub_date: timestamp that comic was published
 $nav: navigation info for comic
 $text: array of text related to comic
*/
?>
<div class="comic">
    <?php if (isset($title)) { ?>
    <?php template('comicnav', $nav); ?>
    <?php if(isset($nav['next'])) { ?><a href="<?php echo url('comic/'.$nav['next']); ?>"><?php } ?>
    <img src="<?php echo url('comic/image/' . $comicid); ?>" alt="comic" <?php
    if($text['alt_text']) {
        echo 'title="', htmlspecialchars($text['alt_text']), '"';
    }
    ?> />
    <?php if(isset($nav['next'])) { ?></a><?php } ?>
    <?php template('comicnav', $nav); ?>
    <div class="content">
        <h2><?php echo $title; ?></h2>
        <h6>Posted on <span class="date"><?php echo date('F jS, Y', $pub_date); ?></span></h6>
        <?php
        if($text['description']) {
            echo '<div class="description">';
            echo $text['description'];
            echo '</div>';
        }
        if($text['transcript']) {
            echo '<div class="transcript"><h4>Transcript</h4>';
            echo $text['transcript'];
            echo '</div>';
        }
        ?>
    </div>
    <?php } else { ?>
    No comic.
    <?php } ?>
</div>