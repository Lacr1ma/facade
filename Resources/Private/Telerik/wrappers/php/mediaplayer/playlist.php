<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$mediaPlayer = new \Kendo\UI\MediaPlayer('mediaPlayer');
$mediaPlayer->autoPlay(true);
?>

<div class="demo-section k-content wide" style="max-width: 925px;">
<?php
echo $mediaPlayer->render();

$data = array(
          array('source' => 'https://www.youtube.com/watch?v=ykQhk1zFVeg', 'title' => "Cognitive first",'poster' => "http://img.youtube.com/vi/N3P6MyvL-t4/1.jpg"),
          array('source' => 'https://www.youtube.com/watch?v=dyvxivS5EcI', 'title' => "Build HIPAA-Compliant Healthcare Apps Fast",'poster' => "http://img.youtube.com/vi/_S63eCewxRg/1.jpg"),
          array('source' => 'https://www.youtube.com/watch?v=Gp7tcOcSKAU', 'title' => "ProgressNEXT 2018 Highlights",'poster' => "http://img.youtube.com/vi/DYsiJRmIQZw/1.jpg"),
          array('source' => 'https://www.youtube.com/watch?v=itoKeywVNBI', 'title' => "Kendo UI Testimonial",'poster' => "http://img.youtube.com/vi/gNlya720gbk/1.jpg"),
          array('source' => 'https://www.youtube.com/watch?v=A2rmIx9rPG0', 'title' => "Introducing Test Studio DevEdition",'poster' => "http://img.youtube.com/vi/rLtTuFbuf1c/1.jpg"),
          array('source' => 'https://www.youtube.com/watch?v=3Ce11N9udR4&list=PLC679RvCan2BJ9HCdUyZhnhHKActnrape', 'title' => "Progress Application Server OpenEdge",'poster' => "https://i.ytimg.com/vi/CpHKm2NruYc/1.jpg")
      );
$dataSource = new \Kendo\Data\DataSource();
$dataSource->data($data);

$listview = new \Kendo\UI\ListView('listView');
$listview->dataSource($dataSource)
            ->selectable(true)
            ->templateId('template')
            ->dataBound("onDataBound")
            ->change("onChange");
            
echo "<div class='k-list-container playlist'>";
echo $listview->render();
echo "</div>";
?>
</div>

<script type="text/x-kendo-template" id="template">
    <div class="k-item k-state-default" onmouseover="$(this).addClass('k-state-hover')"
        onmouseout="$(this).removeClass('k-state-hover')">
        <span>
            <img src="#:poster#" />
            <h5>#:title#</h5>
        </span>
    </div>
</script>

<script>
    function onChange() {
        var index = this.select().index();
        var dataItem = this.dataSource.view()[index];
        $("#mediaPlayer").data("kendoMediaPlayer").media(dataItem);
    }

    function onDataBound() {
        this.select(this.element.children().first());
    }
</script>

<style>
    .k-mediaplayer {
        float: left;
        height: 360px;
        box-sizing: border-box;
        width: 70%;
    }
    .playlist {
        float: left;
        height: 360px;
        overflow: auto;
        width: 30%;
    }
    @media(max-width: 800px) {
        .playlist,
        .k-mediaplayer {
            width: 100%;
        }
    }
    .playlist .k-item {
        border-bottom-style: solid;
        border-bottom-width: 1px;
        padding: 14px 15px;
    }
    .playlist .k-item:last-child {
        border-bottom-width: 0;
    }
    .playlist span {
        cursor: pointer;
        display: block;
        overflow: hidden;
        text-decoration: none;
    }
    .playlist span img {
        border: 0 none;
        display: block;
        height: 56px;
        object-fit: cover;
        width: 100px;
        float: left;
    }
    .playlist h5 {
        display: block;
        font-weight: normal;
        margin: 0;
        overflow: hidden;
        padding-left: 10px;
        text-align: left;
    }
</style>

<?php require_once '../include/footer.php'; ?>