<?php
/*
available variables:
 $page: array of info about the page
 $title: rant title
 $pub_date: timestamp that rant was published
 $nav: navigation info for rant
 $text: text of rant
*/
?>
<section class="rant section">
    <div class="content">
        <?php if (isset($title)) { ?>
        <h3 class="title"><?php echo $title; ?></h3>
        <span class="is-italic">Posted on <span class="date"><?php echo date('F jS, Y', $pub_date); ?></span></span>
        <?php
        echo '<div class="description">';
        echo $text;
        echo '</div>';
        ?>
        <?php } else { ?>
        No rant.
        <?php } ?>
    </div>
</section>