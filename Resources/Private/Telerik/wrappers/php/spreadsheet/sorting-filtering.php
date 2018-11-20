<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$spreadsheet = new \Kendo\UI\Spreadsheet('spreadsheet');

$sheet = new \Kendo\UI\SpreadsheetSheet();
$filter = new \Kendo\UI\SpreadsheetSheetFilter();
$filter->ref("A3:G49");

$sheet->name("OrdersLog")
  	  ->filter($filter)
      ->mergedCells(array("A1:G1", "A2:F2"));

$spreadsheet->addSheet($sheet);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(50);
$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("ORDERS LOG");
$cell->fontSize(18);
$cell->textAlign("center");
$cell->background("rgb(144,164,174)");
$cell->color("white");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("REPORT");
$cell->textAlign("right");
$cell->background("rgb(176,190,197)");
$cell->color("white");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->index(6);
$cell->background("rgb(176,190,197)");
$cell->color("white");
$cell->formula("TODAY()");
$cell->format("MMM-dd");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("ID");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("DATE");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("TIME");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("CLIENT");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("COMPANY");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("SHIPPING");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("DISCOUNT");
$cell->textAlign("center");
$cell->background("rgb(236,239,241)");
$cell->bold("true");
$cell->color("black");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10223");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("09:30");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Terry Lawson");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.02");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10247");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("15:15");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Charles Miller");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10251");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:13");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Jennie Walker");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.1");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10226");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("17:43");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Samuel Green");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10227");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10:27");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("James Smith");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.01");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10228");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("11:12");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Nora Allen");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10229");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("13:56");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Robyn Mason");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.07");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10230");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:40");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Ralph Burke");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.06");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10231");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:25");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Patty Prince");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.02");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10232");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10:09");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Natasha Green");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10233");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("12:54");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("James Smith");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.03");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10259");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("11:28");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Francis Stevens");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10235");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("18:22");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Roger Peters");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.03");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10236");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("09:07");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Nora Allen");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.02");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10224");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("12:14");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Scott Lewis");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Circuit Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.09");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10225");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/30/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:58");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Scott Fox");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Zig Zag Coder");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.1");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10239");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("17:20");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Marian Rodriguez");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Zig Zag Coder");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.06");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10240");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:04");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Joe Lawrence");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.07");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10241");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10:49");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Francis Stevens");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10242");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("13:33");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Lynda Evans");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.05");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10243");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("16:18");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Keith Clark");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Circuit Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10244");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("19:02");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Kara Wood");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10245");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("09:46");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Juan Jacobs");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.07");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10237");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("13:51");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Samuel Green");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.15");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10265");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:36");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Alison Thompson");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Circuit Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.1");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10248");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("18:07");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Jerry Wright");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.07");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10234");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("15:38");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Nora Allen");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Plan Smart");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.1");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10238");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('6/29/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:36");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Mark Moore");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Webcom Services");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.09");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10246");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("12:31");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Patty Prince");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10252");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("16:57");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("James Smith");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.02");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10253");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("18:42");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Marian Rodriguez");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Zig Zag Coder");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.01");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10254");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("09:46");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Patty Prince");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10255");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("12:31");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Jack Sims");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Circuit Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10256");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("15:15");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Hannah Watson");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.01");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10257");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("18:07");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Gregory Morrison");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Webcom Services");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.04");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10258");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:44");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Joe Lawrence");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10249");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:44");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Edward Hall");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Zig Zag Coder");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10260");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("14:13");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Glenda White");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Webcom Services");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.05");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10261");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("16:57");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Lynda Evans");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.01");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10262");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:48");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Edward Hall");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Zig Zag Coder");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.04");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10250");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/1/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("11:28");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Jerry Wright");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.08");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10264");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("13:51");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Jerry Wright");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("2 days");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10263");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("09:07");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Charles Miller");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Complete Tech");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.1");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10266");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("17:20");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Alison Ross");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Excella");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("express");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.02");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10267");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("08:04");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Alexandra Kennedy");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Webcom Services");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("regular");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0.05");
$cell->textAlign("center");
$cell->format("0%");
 
    
$row = new \Kendo\UI\SpreadsheetSheetRow();

$sheet->addRow($row);

$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10268");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value(date('7/2/2014'));
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("10:49");
$cell->textAlign("center");
$cell->format("hh:mm");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Agnes Hill");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("Integra Design");
$cell->textAlign("left");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("1 day");
$cell->textAlign("center");
 
$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
$row->addCell($cell);

$cell->value("0");
$cell->textAlign("center");
$cell->format("0%");
 
    

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(80);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(100);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(100);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(150);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(150);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(130);
$sheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(130);
$sheet->addColumn($column);


echo $spreadsheet->render();
?>
<style>
	#spreadsheet {
		width: 100%;
	}
</style>
<!-- Include JSZip to enable Excel Export-->
<script src="../content/shared/js/jszip.min.js"></script>

<?php require_once '../include/footer.php'; ?>
