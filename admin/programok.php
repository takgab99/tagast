<?php
    include("lib.php");
    checkLogin();

	require_once('preheader.php'); // <-- this include file MUST go first before any HTML/output

	#the code for the class
	include ('ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output

    #this one line of code is how you implement the class
    ########################################################
    ##

    $tblDemo = new ajaxCRUD("Item", "programs", "id", "");
?>

    <!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<?php
getHead();
?>
<body>
<?php
getNavbar();
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
<h1>Programok módosítása</h1>
        <div class="alert alert-warning" role="alert">
            Kezdő és záró időpont formátuma ilyen legyen: ÓÓ:PP:MM, pl. 18:00:00 !
        </div>
        <div class="alert alert-warning" role="alert">
            Új programpontot hozzáadni az oldal alján lehet.
        </div>

    <?php

    ##
    ########################################################

    ## all that follows is setup configuration for your fields....
    ## full API reference material for all functions can be found here - http://ajaxcrud.com/api/
    ## note: many functions below are commented out (with //). note which ones are and which are not

    #i can define a relationship to another table
    #the 1st field is the fk in the table, the 2nd is the second table, the 3rd is the pk in the second table, the 4th is field i want to retrieve as the dropdown value
    #http://ajaxcrud.com/api/index.php?id=defineRelationship
    //$tblDemo->defineRelationship("fkID", "tblDemoRelationship", "pkID", "fldName", "fldSort DESC"); //use your own table - this table (tblDemoRelationship) not included in the installation script
    $tblDemo->defineRelationship("locale_id", "locales", "id", "name", "id ASC"); //use your own table - this table (tblDemoRelationship) not included in the installation script

    #i don't want to visually show the primary key in the table
    $tblDemo->omitPrimaryKey();
    $tblDemo->showOnly("locale_id, name, description, day, start_time, end_time");

    #the table fields have prefixes; i want to give the heading titles something more meaningful
    $tblDemo->displayAs("locale_id", "Hely");
    $tblDemo->displayAs("name", "Program neve");
    $tblDemo->displayAs("description", "Leírás");
    $tblDemo->displayAs("day", "Nap");
    $tblDemo->displayAs("start_time", "Kezdő időpont");
    $tblDemo->displayAs("end_time", "Záró időpont");

	#set the textarea height of the longer field (for editing/adding)
    #http://ajaxcrud.com/api/index.php?id=setTextareaHeight
    $tblDemo->setTextareaHeight('description', 350);

    #i could omit a field if I wanted
    #http://ajaxcrud.com/api/index.php?id=omitField
    //$tblDemo->omitField("fldField2");

    #i could omit a field from being on the add form if I wanted
    //$tblDemo->omitAddField("fldField2");

    #i could disallow editing for certain, individual fields
    //$tblDemo->disallowEdit('fldField2');

    #i could set a field to accept file uploads (the filename is stored) if wanted
    //$tblDemo->setFileUpload("fldField2", "uploads/");

    #i can have a field automatically populate with a certain value (eg the current timestamp)
    //$tblDemo->addValueOnInsert("fldField1", "NOW()");

    #i can use a where field to better-filter my table
    //$tblDemo->addWhereClause("WHERE (fldField1 = 'test')");

    #i can order my table by whatever i want
    $tblDemo->addOrderBy("ORDER BY locale_id ASC");

    #i can set certain fields to only allow certain values
    #http://ajaxcrud.com/api/index.php?id=defineAllowableValues
    $allowableValues = array("Allowable Value1", "Allowable Value2", "Dropdown Value", "CRUD");
    $tblDemo->defineAllowableValues("fldCertainFields", $allowableValues);
    $days = array(
        array("1","Péntek"),
        array("2","Szombat"),
        array("3", "Vasárnap")
    );
    $tblDemo->defineAllowableValues("day", $days);

    //set field fldCheckbox to be a checkbox
//    $tblDemo->defineCheckbox("fldCheckbox");

    #i can disallow deleting of rows from the table
    #http://ajaxcrud.com/api/index.php?id=disallowDelete
    //$tblDemo->disallowDelete();

    #i can disallow adding rows to the table
    #http://ajaxcrud.com/api/index.php?id=disallowAdd
    //$tblDemo->disallowAdd();

    #i can add a button that performs some action deleting of rows for the entire table
    #http://ajaxcrud.com/api/index.php?id=addButtonToRow
//    $tblDemo->addButtonToRow("Add", "add_item.php", "all");

    #set the number of rows to display (per page)
    $tblDemo->setLimit(300);

	#set a filter box at the top of the table
//    $tblDemo->addAjaxFilterBox('name');

    #if really desired, a filter box can be used for all fields
    $tblDemo->addAjaxFilterBoxAllFields();

    #i can set the size of the filter box
    //$tblDemo->setAjaxFilterBoxSize('fldField1', 3);

	#i can format the data in cells however I want with formatFieldWithFunction
	#this is arguably one of the most important (visual) functions
	$tblDemo->formatFieldWithFunction('name', 'makeBlue');
    $tblDemo->formatFieldWithFunction('day', 'changeDaysText');

//	$tblDemo->modifyFieldWithClass("name", "zip required"); 	//for testing masked input functionality
	//$tblDemo->modifyFieldWithClass("fldField2", "phone");			//for testing masked input functionality

//	$tblDemo->onAddExecuteCallBackFunction("mycallbackfunction"); //uncomment this to try out an ADD ROW callback function

	$tblDemo->deleteText = "törlés";
    $tblDemo->load_tinyMCE('description', 'advanced');

?>
		<div style="float: left">
			Összes elem: <b><?=$tblDemo->insertRowsReturned();?></b><br />
		</div>

		<div style="clear:both;"></div>

<?php

	#actually show the table
	$tblDemo->showTable();

	#my self-defined functions used for formatFieldWithFunction
	function makeBold($val){
		if ($val == "") return "no value";
		return "<b>$val</b>";
	}

	function makeBlue($val){
		return "<span style='color: blue;'>$val</span>";
	}

	function myCallBackFunction($array){
		echo "THE ADD ROW CALLBACK FUNCTION WAS implemented";
		print_r($array);
	}

    function changeDaysText($val) {
//        return "péntek";
        switch ($val) {
            case 1:
                return "Péntek";
                break;
            case 2:
                return "Szombat";
            break;
            case 3:
                return "Vasárnap";
            break;
            default:
                return $val;
                break;
        }

    }
?>
    </div>
</div>
</body>
</html>