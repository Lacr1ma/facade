<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">
    <h4 class="tab-header">Left</h4>
<?php
    $tabstripleft = new \Kendo\UI\TabStrip('tabstrip-left');
    $tabstripleft->tabPosition('left');

    $item = new \Kendo\UI\TabStripItem();
    $item->text("One")
        ->selected(true)
        ->startContent();
?>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis libero, lobortis ac rutrum quis, varius a velit. Donec lacus erat, cursus sed porta quis, adipiscing et ligula. Duis volutpat, sem pharetra accumsan pharetra, mi ligula cursus felis, ac aliquet leo diam eget risus. Integer facilisis, justo cursus venenatis vehicula, massa nisl tempor sem, in ullamcorper neque mauris in orci.</p>
<?php
    $item->endContent();
    $tabstripleft->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Two")
        ->startContent();
?>
    <p>Ut orci ligula, varius ac consequat in, rhoncus in dolor. Mauris pulvinar molestie accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean velit ligula, pharetra quis aliquam sed, scelerisque sed sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam dui mi, vulputate vitae pulvinar ac, condimentum sed eros.</p>
<?php
    $item->endContent();
    $tabstripleft->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Three")
        ->startContent();
?>
    <p>Aliquam at nisl quis est adipiscing bibendum. Nam malesuada eros facilisis arcu vulputate at aliquam nunc tempor. In commodo scelerisque enim, eget sodales lorem condimentum rutrum. Phasellus sem metus, ultricies at commodo in, tristique non est. Morbi vel mauris eget mauris commodo elementum. Nam eget libero lacus, ut sollicitudin ante. Nam odio quam, suscipit a fringilla eget, dignissim nec arcu. Donec tristique arcu ut sapien elementum pellentesque.</p>
<?php
    $item->endContent();
    $tabstripleft->addItem($item);

    // set animation
    $animation = new \Kendo\UI\TabStripAnimation();
    $openAnimation = new \Kendo\UI\TabStripAnimationOpen();
    $openAnimation->effects("fadeIn");
    $animation->open($openAnimation);

    $tabstripleft->animation($animation);

    echo $tabstripleft->render();
?>

<h4 class="tab-header">Right</h4>

<?php
    $tabstripright = new \Kendo\UI\TabStrip('tabstrip-right');
    $tabstripright->tabPosition('right');

    $item = new \Kendo\UI\TabStripItem();
    $item->text("One")
        ->selected(true)
        ->startContent();
?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis libero, lobortis ac rutrum quis, varius a velit. Donec lacus erat, cursus sed porta quis, adipiscing et ligula. Duis volutpat, sem pharetra accumsan pharetra, mi ligula cursus felis, ac aliquet leo diam eget risus. Integer facilisis, justo cursus venenatis vehicula, massa nisl tempor sem, in ullamcorper neque mauris in orci.</p>
<?php
    $item->endContent();
    $tabstripright->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Two")
        ->startContent();
?>
<p>Ut orci ligula, varius ac consequat in, rhoncus in dolor. Mauris pulvinar molestie accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean velit ligula, pharetra quis aliquam sed, scelerisque sed sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam dui mi, vulputate vitae pulvinar ac, condimentum sed eros.</p>
<?php
    $item->endContent();
    $tabstripright->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Three")
        ->startContent();
?>
<p>Aliquam at nisl quis est adipiscing bibendum. Nam malesuada eros facilisis arcu vulputate at aliquam nunc tempor. In commodo scelerisque enim, eget sodales lorem condimentum rutrum. Phasellus sem metus, ultricies at commodo in, tristique non est. Morbi vel mauris eget mauris commodo elementum. Nam eget libero lacus, ut sollicitudin ante. Nam odio quam, suscipit a fringilla eget, dignissim nec arcu. Donec tristique arcu ut sapien elementum pellentesque.</p>
<?php
    $item->endContent();
    $tabstripright->addItem($item);

    // set animation
    $animation = new \Kendo\UI\TabStripAnimation();
    $openAnimation = new \Kendo\UI\TabStripAnimationOpen();
    $openAnimation->effects("fadeIn");
    $animation->open($openAnimation);

    $tabstripright->animation($animation);

    echo $tabstripright->render();
?>

<h4 class="tab-header">Bottom</h4>

<?php
    $tabstripbottom = new \Kendo\UI\TabStrip('tabstrip-bottom');
    $tabstripbottom->tabPosition('bottom');

    $item = new \Kendo\UI\TabStripItem();
    $item->text("One")
        ->selected(true)
        ->startContent();
?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis libero, lobortis ac rutrum quis, varius a velit. Donec lacus erat, cursus sed porta quis, adipiscing et ligula. Duis volutpat, sem pharetra accumsan pharetra, mi ligula cursus felis, ac aliquet leo diam eget risus. Integer facilisis, justo cursus venenatis vehicula, massa nisl tempor sem, in ullamcorper neque mauris in orci.</p>
<?php
    $item->endContent();
    $tabstripbottom->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Two")
        ->startContent();
?>
<p>Ut orci ligula, varius ac consequat in, rhoncus in dolor. Mauris pulvinar molestie accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean velit ligula, pharetra quis aliquam sed, scelerisque sed sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam dui mi, vulputate vitae pulvinar ac, condimentum sed eros.</p>
<?php
    $item->endContent();
    $tabstripbottom->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Three")
        ->startContent();
?>
<p>Aliquam at nisl quis est adipiscing bibendum. Nam malesuada eros facilisis arcu vulputate at aliquam nunc tempor. In commodo scelerisque enim, eget sodales lorem condimentum rutrum. Phasellus sem metus, ultricies at commodo in, tristique non est. Morbi vel mauris eget mauris commodo elementum. Nam eget libero lacus, ut sollicitudin ante. Nam odio quam, suscipit a fringilla eget, dignissim nec arcu. Donec tristique arcu ut sapien elementum pellentesque.</p>
<?php
    $item->endContent();
    $tabstripbottom->addItem($item);

    // set animation
    $animation = new \Kendo\UI\TabStripAnimation();
    $openAnimation = new \Kendo\UI\TabStripAnimationOpen();
    $openAnimation->effects("fadeIn");
    $animation->open($openAnimation);

    $tabstripbottom->animation($animation);

    echo $tabstripbottom->render();
?>
</div>
<style>
	.tab-header {
		margin-top: 10px;
	}
</style>
<?php require_once '../include/footer.php'; ?>
