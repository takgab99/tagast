<?php
include("lib.php");
checkLogin();

require_once('preheader.php'); // <-- this include file MUST go first before any HTML/output

#the code for the class
include ('ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output

#this one line of code is how you implement the class
########################################################
##

$tblDemo = new ajaxCRUD("Item", "videos", "id", "");
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
        <h1>Videók módosítása</h1>


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

        #i don't want to visually show the primary key in the table
        $tblDemo->omitPrimaryKey();
        $tblDemo->showOnly("date, title, body, video");

        #the table fields have prefixes; i want to give the heading titles something more meaningful
        $tblDemo->displayAs("date", "Feladás dátuma");
        $tblDemo->displayAs("title", "Cím");
        $tblDemo->displayAs("body", "Szöveg");
        $tblDemo->displayAs("image", "Videók link");

        #set the textarea height of the longer field (for editing/adding)
        #http://ajaxcrud.com/api/index.php?id=setTextareaHeight
        $tblDemo->setTextareaHeight('body', 400);

        #i could omit a field if I wanted
        #http://ajaxcrud.com/api/index.php?id=omitField
        //        $tblDemo->omitField("date");

        #i could omit a field from being on the add form if I wanted
        $tblDemo->omitAddField("date");

        #i could disallow editing for certain, individual fields
        //$tblDemo->disallowEdit('fldField2');

        #i could set a field to accept file uploads (the filename is stored) if wanted
//        $tblDemo->setFileUpload("image", "./../img/news/");

        #i can have a field automatically populate with a certain value (eg the current timestamp)
        $tblDemo->addValueOnInsert("date", "NOW()");

        #i can use a where field to better-filter my table
        //$tblDemo->addWhereClause("WHERE (fldField1 = 'test')");

        #i can order my table by whatever i want
        $tblDemo->addOrderBy("ORDER BY date DESC");

        #i can set certain fields to only allow certain values
        #http://ajaxcrud.com/api/index.php?id=defineAllowableValues
        //    $allowableValues = array("Allowable Value1", "Allowable Value2", "Dropdown Value", "CRUD");
        //    $tblDemo->defineAllowableValues("fldCertainFields", $allowableValues);

        //set field fldCheckbox to be a checkbox
        //    $tblDemo->defineCheckbox("fldCheckbox");

        #i can disallow deleting of rows from the table
        #http://ajaxcrud.com/api/index.php?id=disallowDelete
        //        $tblDemo->disallowDelete();

        #i can disallow adding rows to the table
        #http://ajaxcrud.com/api/index.php?id=disallowAdd
        //        $tblDemo->disallowAdd();

        #i can add a button that performs some action deleting of rows for the entire table
        #http://ajaxcrud.com/api/index.php?id=addButtonToRow
        //    $tblDemo->addButtonToRow("Add", "add_item.php", "all");

        #set the number of rows to display (per page)
        $tblDemo->setLimit(50);

        #set a filter box at the top of the table
        //    $tblDemo->addAjaxFilterBox('name');

        #if really desired, a filter box can be used for all fields
        $tblDemo->addAjaxFilterBoxAllFields();

        #i can set the size of the filter box
        //$tblDemo->setAjaxFilterBoxSize('fldField1', 3);

        #i can format the data in cells however I want with formatFieldWithFunction
        #this is arguably one of the most important (visual) functions
        $tblDemo->formatFieldWithFunction('title', 'makeBold');
//        $tblDemo->formatFieldWithFunction('video', 'displayVideo');
        //    $tblDemo->formatFieldWithFunction('day', 'changeDaysText');

        //	$tblDemo->modifyFieldWithClass("name", "zip required"); 	//for testing masked input functionality
        //$tblDemo->modifyFieldWithClass("fldField2", "phone");			//for testing masked input functionality

        //	$tblDemo->onAddExecuteCallBackFunction("mycallbackfunction"); //uncomment this to try out an ADD ROW callback function

        $tblDemo->deleteText = "törlés";
        $tblDemo->load_tinyMCE('body', 'advanced');

        ?>

        <div style="clear:both;"></div>

        <?php

        #actually show the table
        $tblDemo->showTable();

        function makeBlue($val){
            return "<span style='color: blue;'>$val</span>";
        }
        function makeBold($val){
            if ($val == "") return "no value";
            return "<b>$val</b>";
        }


        ?>

    </div>
</div>
</body>
</html>