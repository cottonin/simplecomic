<?php template('admin_head'); ?>
<?php $page->get_breadcrumbs(); ?>
<section class="section content">
<div>For the purpose of publishing, the date is: <b><?php echo date('F jS, Y \a\t  H:i:s'); ?></b></div>
<h3>Comics</h3>
<ul>
<?php
echo '<li><a href="', url('admin/comic/new'), '">Add a new one</a></li>';
foreach($comics as $c) {
    echo '<li>';
    echo '<a title="Edit this page" href="', url('admin/comic/'.$c['comicid']), '">';
    echo $c['title'];
    echo '</a> | Posted on '  ,date('F jS, Y', $c['pub_date']);
    if($c['pub_date'] > time()) {
        echo ' UNPUBLISHED';
    }
    echo '</li>';
}
?>
</ul>

<h3>Rants</h3>
<ul>
<?php
echo '<li><a href="', url('admin/rant/new'), '">Add a new one</a></li>';
foreach($rants as $c) {
    echo '<li>';
    echo '<a title="Edit this rant" href="', url('admin/rant/'.$c['rantid']), '">';
    echo $c['title'];
    echo '</a> | Posted on ' ,date('F jS, Y', $c['pub_date']);
    if($c['pub_date'] > time()) {
        echo ' UNPUBLISHED';
    }
    echo '</li>';
}
?>
</ul>

<h3 id="chapters">Chapters</h3>
<ul class="chapter-list">
    <?php
    echo '<li><a href="', url('admin/chapter/new'), '">Add a new one</a></li>';
    $num_chapters = count($chapters);
    foreach($chapters as $c) {
        echo '<li>', $c['order'], ': ';
        echo '<a title="Edit this chapter" href="', url('admin/chapter/'.$c['chapterid']), '" name="chapter', $c['chapterid'], '">';
        echo $c['title'];
        echo '</a> ';
        if ($c['order'] > 1) {
            // move-up
            echo post_link('admin/chapter/'.$c['chapterid'].'/down', '↓ down');
        }
        if ($c['order'] < $num_chapters) {
            // move-down
            echo post_link('admin/chapter/'.$c['chapterid'].'/up', '↑ up');
        }
        echo '</li>';
    }
    ?>
    </ul>
</section>
<?php template('admin_foot'); ?>
