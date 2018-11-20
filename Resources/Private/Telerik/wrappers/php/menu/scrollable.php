<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>
<div class="demo-section k-content">
    <h4>Horizontal</h4>
    <?php
        $menu = new \Kendo\UI\Menu('horizontalMenu');

        $menu->scrollable(true);

        $menu->addItem((new \Kendo\UI\MenuItem("Mens"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem((new \Kendo\UI\MenuItem("Ladies"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem((new \Kendo\UI\MenuItem("Kids"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem(new \Kendo\UI\MenuItem("Sports"));
        $menu->addItem(new \Kendo\UI\MenuItem("Brands"));
        $menu->addItem(new \Kendo\UI\MenuItem("Accessories"));
        $menu->addItem(new \Kendo\UI\MenuItem("Promotions"));

        echo $menu->render();
    ?>

    <h4 style="padding-top: 2em;margin-top:30px">Vertical</h4>
    <?php
        $menu = new \Kendo\UI\Menu('verticalMenu');

        $menu->scrollable(true);
        $menu->orientation('vertical');
        $menu->attr('style', 'width: 100px; height: 150px');

        $menu->addItem((new \Kendo\UI\MenuItem("Mens"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem((new \Kendo\UI\MenuItem("Ladies"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem((new \Kendo\UI\MenuItem("Kids"))->addItem(
            new \Kendo\UI\MenuItem("Jackets and Coats"),
            new \Kendo\UI\MenuItem("Jeans"),
            new \Kendo\UI\MenuItem("Knitwear"),
            new \Kendo\UI\MenuItem("Shirts"),
            new \Kendo\UI\MenuItem("Belts"),
            new \Kendo\UI\MenuItem("Socks"),
            new \Kendo\UI\MenuItem("Fan Zone")
        ));

        $menu->addItem(new \Kendo\UI\MenuItem("Sports"));
        $menu->addItem(new \Kendo\UI\MenuItem("Brands"));
        $menu->addItem(new \Kendo\UI\MenuItem("News"));
        $menu->addItem(new \Kendo\UI\MenuItem("About us"));

        echo $menu->render();
    ?>
</div>

<style>
    .k-menu-scroll-wrapper.horizontal li.k-item.k-last {
        border-right-width: 0;
    }
</style>

<?php require_once '../include/footer.php'; ?>