        <nav class="navbar">
        	<div class="navbar-start">
                <?php 
                    $r = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
                    $active = isset($r[0]) ? $r[0] : "" ;
                ?>
        	    <a class="navbar-item <?php if ($active == 'archive'){ echo 'active';} ?>" href="<?php echo url('archive/');?>">Archive</a>
        	    <a class="navbar-item <?php if ($active == 'chapters'){ echo 'active';} ?>" href="<?php echo url('chapters/');?>">Chapters</a>
        	    <a class="navbar-item <?php if ($active == 'rants'){ echo 'active';} ?>" href="<?php echo url('rants/');?>">Rants</a>
        	    <a class="navbar-item <?php if ($active == 'feed'){ echo 'active';} ?>" href="<?php echo url('feed/');?>">RSS</a>
            </div>
        </nav>