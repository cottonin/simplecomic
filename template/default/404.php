<?php template('head'); ?>
<figure class="image">
	<?php $n = rand(1,4); $img = 'image/404-'.$n.'.png'; ?>
	<img style="width: 405px; margin: 0 auto" src="<?php echo url($img); ?>" alt="">
	<div style="text-align: center;">
		<p><?php echo $msg; ?></p>
		<p>Were you looking for a comic page? You should look for it in the <a href="<?php echo url('archive/');?>">archive.</a></p>
	</div>
</figure>
<?php template('foot'); ?>
