<?php
/*
available variables:
 $page: info about the page
 $chapter: array of info about the chapter
 $comics: array of comics
*/
template('archive_head');
$current_chapter = -1;
$current_page = 1;
?>
<section class="archive">
    <h2 class="title">Archive</h2>
    <p class="description">Take a look at the chapters of the story. If you like reading everything in one go, click "Read Full Chapter". Otherwise, click "Browse Pages" to take a quick look at each chapter and pick a page to start reading one by one.</p>
    <div class="archive-reverse">Order: <a href="#" id="reverse">Oldest to Newest</a></div>
    <div id="archive-list" class="archive-list">
    <div class="outer-dummy"><div class="inner-dummy">
    <?php
    $i = 0;
    foreach($comics as $comic) {
        
        if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) {
            $current_chapter = $comic['chapterid'];
            $i++;
            $current_page  = 1;
            ?>
        </div></div><div class="archive-item">
            <!-- Image -->
            <div class="cover-image"><img src="<?php echo url($comic['filename']); ?>" alt="<?php echo $comic['chapter_title'];?>"></div>
            <!-- Start Content -->
            <div class="content">
                <!-- Title -->
                <h3 class="title">
                    <a href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>"><?php echo $i.'. '.$comic['chapter_title']; ?></a>
                </h3>
                <!-- Description -->
            <?php if ($comic['chapter_description']): ?>
                <p class="description"><?php echo $comic['chapter_description']; ?></p>
            <?php endif ?>
                <!-- Links -->
                <div class="buttons">
                    <div class="button-wrapper">
                        <?php if ($comic['status'] == 1 ): ?>
                        <a class="btn-archive"
                           href="<?php echo url('read/'.$comic['chapter_slug']); ?>">Read Full Chapter</a>
                        <?php else: ?>
                        <p class="btn-archive is-disabled">Ongoing</p>
                        <?php endif ?>
                    </div>
                    <div class="button-wrapper">
                        <a class="btn-archive" href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>">Browse Pages</a>
                    </div>
                </div>
        <?php } ?>
    <?php } ?>
    </div>
</section>
<script>
    var list_btn = document.getElementById('reverse');
    var list = document.getElementById('archive-list');

    list_btn.addEventListener('click', function(e) {
        e.preventDefault();

        if (list_btn.classList.contains('active')) {
            list_btn.classList.remove('active');
            list_btn.innerHTML = 'Oldest to Newest';
            list.classList.remove('reverse');
        } else {
            list_btn.classList.add('active');
            list_btn.innerHTML = 'Newest to Oldest';
            list.classList.add('reverse');
        }
    })
</script>
<?php
template('archive_foot');
?>