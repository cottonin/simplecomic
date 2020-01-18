<?php
/*
available variables:
 $page: array of info about the page
 $rants: array of info about the rants
*/
template('rant_head');
?>
<section class="rant-list">
    <h2 class="title">Rants</h2>
    <p class="description">Relevant updates and ramblings.</p>
    <?php if($rants) { ?>
    <ul>
        <?php foreach($rants as $rant) { ?>
        <li>
            <h3 class="rant-title"><a href="<?php echo url('rant/'.$rant['rantid']); ?>"><?php echo $rant['title'] ?></a></h3>
            <span class="rant-date"><?php echo date('F jS, Y', $rant['pub_date']); ?></span>
        </li>
        <?php } ?>
    </ul>
    <?php } else { ?>
    <p>No Rants</p>
    <?php } ?>
</section>
<?php
template('rant_foot');
?>