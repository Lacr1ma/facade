<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$spreadsheet = new \Kendo\UI\Spreadsheet('spreadsheet');

$spreadsheet->attr('style', 'width: 100%;');

$spreadsheet->columns(26);
$spreadsheet->rows(30);
$spreadsheet->sheetsbar(false);

$contactsSheet = new \Kendo\UI\SpreadsheetSheet();
$contactsSheet->name("ContactsForm")
      ->mergedCells(array("A1:E1"));

$listSheet = new \Kendo\UI\SpreadsheetSheet();
$listSheet->name("ListValues");

$spreadsheet->addSheet($contactsSheet);
$spreadsheet->addSheet($listSheet);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(70);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("CONTACTS FORM");
	$cell->fontSize(32);
	$cell->textAlign("center");
	$cell->background("rgb(96,181,255)");
	$cell->enable(false);
	$cell->color("white");

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Full Name");
	$cell->textAlign("center");
	$cell->background("rgb(167,214,255)");
	$cell->enable(false);
	$cell->color("rgb(0,62,117)");

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Email");
	$cell->textAlign("center");
	$cell->background("rgb(167,214,255)");
	$cell->enable(false);
	$cell->color("rgb(0,62,117)");

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Date of Birth");
	$cell->textAlign("center");
	$cell->background("rgb(167,214,255)");
	$cell->enable(false);
	$cell->color("rgb(0,62,117)");

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Phone");
	$cell->textAlign("center");
	$cell->background("rgb(167,214,255)");
	$cell->enable(false);
	$cell->color("rgb(0,62,117)");

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Confirmed");
	$cell->textAlign("center");
	$cell->background("rgb(167,214,255)");
	$cell->enable(false);
	$cell->color("rgb(0,62,117)");

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Maria Anders");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A3)>3, LEN(A3)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("maria.anders@mail.com");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B3))), NOT(ISERROR(FIND(\".\", B3))), ISERROR(FIND(\" \", J1)), LEN(B3)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(31232);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(921123465);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D3),LEN(D3)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Ana Trujillo");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A4)>3, LEN(A4)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("ana.trujillo@mail.com");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B4))), NOT(ISERROR(FIND(\".\", B4))), ISERROR(FIND(\" \", J1)), LEN(B4)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(31222);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(55554729);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D4),LEN(D4)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Antonio Moreno");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A5)>3, LEN(A5)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("antonio.moreno@mail.com");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B5))), NOT(ISERROR(FIND(\".\", B5))), ISERROR(FIND(\" \", J1)), LEN(B5)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(32232);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("(5) 555-3932");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D5),LEN(D5)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Thomas Hardy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A6)>3, LEN(A6)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("thomas.hardy@mail.com");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B6))), NOT(ISERROR(FIND(\".\", B6))), ISERROR(FIND(\" \", J1)), LEN(B6)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(21232);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(1715557788);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D6),LEN(D6)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Christina Toms");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A7)>3, LEN(A7)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("christina.toms");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B7))), NOT(ISERROR(FIND(\".\", B7))), ISERROR(FIND(\" \", J1)), LEN(B7)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(30102);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(921123465);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D7),LEN(D7)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("Hanna Moos");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A8)>3, LEN(A8)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("hanna.moos@mail.com");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B8))), NOT(ISERROR(FIND(\".\", B8))), ISERROR(FIND(\" \", J1)), LEN(B8)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(0);
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(62108460);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D8),LEN(D8)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);

$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(25);
$contactsSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(LEN(A9)>3, LEN(A9)<200)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Full Name validation error");
		$validation->messageTemplate("The full name should be longer than 3 letters and shorter than 200.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(NOT(ISERROR(FIND(\"@\", B9))), NOT(ISERROR(FIND(\".\", B9))), ISERROR(FIND(\" \", J1)), LEN(B9)>5)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate( "Email validation error");
		$validation->messageTemplate("The value entered is not an valid email address.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("");
	$cell->format("M/d/yyyy");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("date");
		$validation->comparerType("between");
		$validation->from("DATEVALUE(\"1/1/1900\")");
		$validation->to("DATEVALUE(\"1/1/1998\")");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Birth Date validaiton error");
		$validation->messageTemplate("Birth Date should be between 1899 and 1998 year.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("custom");
		$validation->from("AND(ISNUMBER(D9),LEN(D9)<14)");
		//$validation->type("reject");
		$validation->allowNulls("true");
		$validation->titleTemplate("Phone validation error");
		$validation->messageTemplate("The value entered is not an valid phone number. Please enter numeric value with less than 14 digits.");
		$cell->validation($validation);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value("");
		$validation = new \Kendo\UI\SpreadsheetSheetRowCellValidation();
		$validation->dataType("list");
		$validation->from("ListValues!A1:B1");
		$validation->type("reject");
		$validation->allowNulls(true);
		$validation->titleTemplate("Invalid value");
		$validation->messageTemplate("Valid values are 'true' and 'false'.");
		$cell->validation($validation);
    
$row = new \Kendo\UI\SpreadsheetSheetRow();
$row->height(70);
$listSheet->addRow($row);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(true);

	$cell = new \Kendo\UI\SpreadsheetSheetRowCell();
	$row->addCell($cell);
	$cell->value(false);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(100);
$contactsSheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(215);
$contactsSheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$contactsSheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$contactsSheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(115);
$contactsSheet->addColumn($column);

$column = new \Kendo\UI\SpreadsheetSheetColumn();
$column->width(155);
$contactsSheet->addColumn($column);

echo $spreadsheet->render();
?>

<!-- Include JSZip to enable Excel Export-->
<script src="../content/shared/js/jszip.min.js"></script>

<?php require_once '../include/footer.php'; ?>
