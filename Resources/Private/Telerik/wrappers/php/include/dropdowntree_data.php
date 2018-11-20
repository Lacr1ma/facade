<?php
    function categories() {
        return array(
            array('text' => 'Furniture', 'value' => 1, 'expanded' => true,  'items' => array(
                    array('text' => 'Tables & Chairs', 'value' => 2),
                    array('text' => 'Sofas', 'value' => 3),
                    array('text' => 'Occasional Furniture', 'value' => 4)
                )
            ),
            array('text' => 'Decor', 'value' => 5, 'items' => array(
                array('text' => "Bed Linen", 'value' => 6),
                array('text' => "Curtains & Blinds", 'value' => 7),
                array('text' => "Carpets", 'value' => 8))
            )
        );
    }

    function categories_extended() {
        return array(
            array('id' => 1, 'text' => 'Furniture', 'items' => array(
                array('text' => 'Tables & Chairs', 'id' => 2),
                array('text' => 'Sofas', 'id' => 3),
                array('text' => 'Occasional Furniture', 'id' => 4),
                array('text' => 'Childrens furniture', 'id' => 5),
                array('text' => 'Beds', 'id' => 6)
            )),
            array('id' => 7, 'text' => 'Decor', 'items' => array(
                array('text' => 'Bed linen', 'id' => 8),
                array('text' => 'Throws', 'id' => 9),
                array('text' => 'Curtains & blinds', 'id' => 10),
                array('text' => 'Rugs', 'id' => 11),
                array('text' => 'Carpets', 'id' => 12)
            )),
            array('id' => 13, 'text' => 'Storage', 'items' => array(
                array('text' => 'Wall shelving', 'id' => 14),
                array('text' => 'Kids storage', 'id' => 15),
                array('text' => 'Multimedia storage', 'id' => 16),
                array('text' => 'Floor shelving', 'id' => 17),
                array('text' => 'Toilet roll holders', 'id' => 18),
                array('text' => 'Storage jars', 'id' => 19),
                array('text' => 'Drawers', 'id' => 20),
                array('text' => 'Boxes', 'id' => 21)
            ))
        );
    }

    function documents() {
        return array(
            array('id' => 1, 'text' => 'My Docuemnts', 'expanded' => true, 'spriteCssClass' => 'rootfolder', 'items' => array(
                array('id' => 2, 'text' => 'Kendo UI Project', 'expanded' => true, 'spriteCssClass' => 'folder', 'items' => array(
                    array('id' => 3, 'text' => 'about.html', 'spriteCssClass' => 'html'),
                    array('id' => 4, 'text' => 'index.html', 'spriteCssClass' => 'html'),
                    array('id' => 5, 'text' => 'logo.html', 'spriteCssClass' => 'image')
                )),
                array('id' => 6, 'text' => 'New Web Site', 'expanded' => true, 'spriteCssClass' => 'folder', 'items' => array(
                    array('id' => 7, 'text' => 'mockup.jpg', 'spriteCssClass' => 'image'),
                    array('id' => 8, 'text' => 'Research.pdf', 'spriteCssClass' => 'pdf')
                )),
                array('id' => 9, 'text' => 'Reports', 'expanded' => true, 'spriteCssClass' => 'folder', 'items' => array(
                    array('id' => 10, 'text' => 'February.pdf', 'spriteCssClass' => 'pdf'),
                    array('id' => 11, 'text' => 'March.pdf', 'spriteCssClass' => 'pdf'),
                    array('id' => 12, 'text' => 'April.pdf', 'spriteCssClass' => 'pdf')
                ))
            ))
        );
    }
?>