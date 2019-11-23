<?php
/*
available variables:
 $page: array of info about the page
 $rants: array of info about the rants
*/
template('rant_head');
?>
<section class="rant-list">
    <h1 class="title">Rants</h1>
    <p class="description">Relevant updates and ramblings.</p>
    <?php if($rants) { ?>
    <ul>
        <?php foreach($rants as $rant) { ?>
        <li><a href="<?php echo url('rant/'.$rant['rantid']); ?>"><?php echo $rant['title'] ?></a></li>
        <?php } ?>
    </ul>
    <?php } else { ?>
    <p>No Rants</p>
    <?php } ?>
</section>
<?php
template('rant_foot');
?>