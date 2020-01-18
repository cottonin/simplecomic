<?php
/*
available variables:
 $page: array of info about the page
 $title: comic title
 $pub_date: timestamp that comic was published
 $nav: navigation info for comic
 $text: array of text related to comic
*/
$page->add_js(template_path('nav.js'));
?>
<div class="comic" id="comic">
    <?php if (isset($title)) { ?>
    <?php //template('comicnav', $nav); ?>
    <div style="position: relative;" class="comic-wrapper">
        <?php if (isset($nav['prev'])): ?>
            <a class="comic-link prev" href="<?php echo url('comic/'.$nav['prev'].'#comic'); ?>"></a>
        <?php endif ?>
        <?php if (isset($nav['next'])): ?>
            <a class="comic-link next" hhref="<?php echo url('comic/'.$nav['next'].'#comic'); ?>"></a>
        <?php endif ?>
        <img src="<?php echo url($filename); ?>" alt="comic" <?php
        if($text['alt_text']) {
            echo 'title="', htmlspecialchars($text['alt_text']), '"';
        }
        ?> />
    </div>
    <?php template('comicnav', $nav); ?>
    <section class="comic-content">
        <h2 class="title"><?php echo $title; ?></h2>
        <span class="date">Posted on <span class="date"><?php echo date('F jS, Y', $pub_date); ?></span></span>
        <?php
        if($text['description']) {
            echo '<div class="description">';
            echo $text['description'];
            echo '</div>';
        }
        if($text['transcript']) {
            echo '<div id="transcript-toggle">Show Transcript</div>';
            echo '<div class="transcript"><h3 class="title">Transcript</h3>';
            echo $text['transcript'];
            echo '</div>';
        }
        ?>
        <?php // template('disqus', array('comicid' => $comicid)) ?>
    </section>
    <?php } else { ?>
    No comic.
    <?php } ?>
</div>