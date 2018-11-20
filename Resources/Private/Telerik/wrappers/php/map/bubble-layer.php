<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/map_data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $db = new PDO('sqlite:..//sample.db');

    $sql  = 'select';
    $sql .= '  City, Country, Latitude, Longitude, Pop2010 ';
    $sql .= 'from ';
    $sql .= '  UrbanAreas';

    $statement = $db->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as &$row) {
        $row['Location'] = array($row['Latitude'], $row['Longitude']);
        unset($row['Latitude']);
        unset($row['Longitude']);
    }

    echo json_encode(
        $result,
        JSON_NUMERIC_CHECK
    );

    exit;
}

require_once '../include/header.php';

$tile_layer = new \Kendo\Dataviz\UI\MapLayer();
$layer->type("tile")
      ->urlTemplate("http://#= subdomain #.tile.openstreetmap.org/#= zoom #/#= x #/#= y #.png")
      ->subdomains(array('a', 'b', 'c'))
      ->attribution("&copy; <a href='http://osm.org/copyright'>OpenStreetMap contributors</a>");

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read(array('url' => 'bubble-layer.php', 'type' => 'POST', 'dataType' => 'json'));

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport);

$style = new \Kendo\Dataviz\UI\MapLayerStyle();
$style->fill(array('color' => '#00f', 'opacity' => 0.4))
      ->stroke(array('width' => 0));

$bubble_layer = new \Kendo\Dataviz\UI\MapLayer();
$bubble_layer->type('bubble')
      ->style($style)
      ->dataSource($dataSource)
      ->locationField('Location')
      ->valueField('Pop2010');

$map = new \Kendo\Dataviz\UI\Map('map');
$map->center(array(45, 45))
    ->zoom(4)
    ->minZoom(3)
    ->wraparound(false)
    ->addLayer($tile_layer)
    ->addLayer($bubble_layer)
    ->shapeMouseEnter('onShapeMouseEnter')
    ->reset('onReset');

?>
<div class="box wide">
    <div class="box-col select-col">
        <h4>Bubble symbol</h4>
        <ul id="select-symbol">
            <li>Circle</li>
            <li>Square</li>
        </ul>
    </div>
    <div id="info" class="box-col"></div>
</div>

<?php echo $map->render(); ?>

<script id="info-template" type="text/x-kendo-template">
    <h4>#: City #, #= Country #</h4>
    <p class="info">Population #= kendo.toString(Pop2010 * 1000, "N0") #</p>
</script>
<script id="empty-info-template" type="text/x-kendo-template">
    <h4>Hover over urban areas</h4>
    <p>&nbsp;</p>
</script>
<script>
var template = kendo.template($("#info-template").html());
var emptyTemplate = kendo.template($("#empty-info-template").html());
var activeShape;

function onShapeMouseEnter(e) {
    if (activeShape) {
        activeShape.options.set("stroke", null);
    }

    activeShape = e.shape;
    activeShape.options.set("stroke", { width: 1.5, color: "#00f" });

    $("#info").html(template(e.shape.dataItem));
}

function onReset() {
    $("#info").html(emptyTemplate({}));
    activeShape = null;
}

$("#select-symbol").kendoMobileButtonGroup({
    select: function(e) {
        var layer = $("#map").data("kendoMap").layers[1];
        layer.options.symbol = e.index === 0 ? "circle" : "square";
        layer.reset();
    },
    index: 0
});
</script>

<?php require_once '../include/footer.php'; ?>
