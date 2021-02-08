<?php
/*
available variables:
 $page: array of info about the page
 $title: comic title
 $filename: filename or location of the comic
 $pub_date: timestamp that comic was published
 $nav: navigation info for comic
 $text: array of text related to comic
*/
$page->add_js(template_path('nav.js'));
?>
<div class="comic" id="comic">
    <?php if (isset($title)) : ?>
    <!-- Top Navigation -->
    <?php // template('comicnav', $nav); ?>
    <!-- Comic Page Container -->
    <figure class="comic-wrapper">
        <?php if (isset($nav['prev'])): ?>
            <a class="comic-link prev" href="<?php echo url('comic/'.$nav['prev'].'#comic'); ?>"></a>
        <?php endif; ?>
        <?php if (isset($nav['next'])): ?>
            <a class="comic-link next" href="<?php echo url('comic/'.$nav['next'].'#comic'); ?>"></a>
        <?php endif; ?>
        <img 
            src="<?php echo comic_url($comicid); ?>"
            alt="Comic Page"
            <?php if ($text['alt_text']): ?>
            title="<?php echo htmlspecialchars($text['alt_text']); ?>"
            <?php endif ?> />
    </figure>
    <!-- Bottom Navigation -->
    <?php template('comicnav', $nav); ?>
    <!-- Comic Info -->
    <section class="comic-content">
        <h2 class="title"><?php echo $title; ?></h2>
        <span class="date">Posted on <span class="date"><?php echo date('F jS, Y', $pub_date); ?></span></span>
        <!-- Description -->
        <?php if ($text['description']): ?>
            <div class="description"><?php echo $text['description']; ?></div>
        <?php endif ?>
        <!-- Transcript -->
        <?php if ($text['transcript']): ?>
            <div id="transcript-toggle">Show Transcript</div>
            <div class="transcript">
                <h3 class="title">Transcript</h3>
                <div><?php echo $text['transcript']; ?></div>
            </div>
        <?php endif ?>
        <!-- Disqus -->
        <?php // template('disqus', array('comicid' => $comicid)) ?>
    </section>
    <?php else: ?>
    No comic.
    <?php endif; ?>
</div>