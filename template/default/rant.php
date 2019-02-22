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
        <h2><?php echo $title; ?></h2>
        <h6>Posted on <span class="date"><?php echo date('F jS, Y', $pub_date); ?></span></h6>
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