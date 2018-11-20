<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$spreadsheet = new \Kendo\UI\Spreadsheet('spreadsheet');

$spreadsheet->attr('style', 'width: 100%;');

$spreadsheet->excelExport('onExcelExport')
			->renderEvent('onRender');

$sheet = new \Kendo\UI\SpreadsheetSheet();
$sheet->name("Food Order")
      ->mergedCells(array("A1:F1", "C15:E15"));

$spreadsheet->addSheet($sheet);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(70);
$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Invoice #1");
$cell->fontSize(25);
$cell->textAlign("center");

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("ID");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Product");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Quantity");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Price");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Tax");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Amount");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("216321");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Calzone");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("12.39");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C3*D3*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C3*D3+E3");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("546897");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Margarita");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("8.79");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C4*D4*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C4*D4+E4");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("456231");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Pollo Formaggio");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("13.99");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C5*D5*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C5*D5+E5");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("455873");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Greek Salad");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("9.49");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C6*D6*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C6*D6+E6");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("456892");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Spinach and Blue Cheese");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("3");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("11.49");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C7*D7*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C7*D7+E7");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("546564");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Rigoletto");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10.99");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C8*D8*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C8*D8+E8");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("789455");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Creme Brulee");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("5");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("6.99");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C9*D9*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C9*D9+E9");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("123002");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Radeberger Beer");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("4");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("4.99");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C10*D10*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C10*D10+E10");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("564896");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Budweiser Beer");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("3");
$cell->textAlign("center");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("4.49");

$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C11*D11*0.2");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("C11*D11+E11");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Tip:");
$cell->textAlign("right");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->formula("SUM(F3:F11)*0.1");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(50);
$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->index(1);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->index(2);
$cell->value("Total Amount:");
$cell->fontSize(20);
$cell->textAlign("right");

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->index(5);

$cell->formula("SUM(F3:F14)");
$cell->format("$#,##0.00");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->index(6);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(100);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(215);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(155);
$sheet->addColumn($column);
?>


<?php
echo $spreadsheet->render();
?>

<div class="box wide">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<!-- Include JSZip to enable Excel Export-->
<script src="../content/shared/js/jszip.min.js"></script>
<script>
        function onRender(arg) {
            kendoConsole.log("Spreadsheet is rendered");
        }

        function onExcelExport(arg) {
            kendoConsole.log("Spreadsheet is exported to Excel");
        }
</script>
<?php require_once '../include/footer.php'; ?>
