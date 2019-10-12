<?php
/*
available variables:
 $page: array of info about the page
 $rants: array of info about the rants
*/
template('rant_head');
?>
<section class="rants section">
    <div class="content">
        <h1>Rants</h1>
        <p>Relevant updates and ramblings.</p>
        <?php if($rants) { ?>
        <ul>
            <?php foreach($rants as $rant) { ?>
            <li><a href="<?php echo url('rant/'.$rant['rantid']); ?>"><?php echo $rant['title'] ?></a></li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        <p>No Rants</p>
        <?php } ?>
    </div>
</section>
<?php
template('rant_foot');
?>