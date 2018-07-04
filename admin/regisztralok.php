<?php
include("lib.php");
checkLogin();

require_once('preheader.php'); // <-- this include file MUST go first before any HTML/output

#the code for the class
include ('ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output

#this one line of code is how you implement the class
########################################################
##

$tblDemo = new ajaxCRUD("Item", "registration2018", "id", "");
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
        <h1>Regisztrálók</h1>


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
        $tblDemo->showOnly("updated_at, name, ticket_id, city, community, first_seminar, second_seminar, update_count");

        #the table fields have prefixes; i want to give the heading titles something more meaningful
        $tblDemo->displayAs("updated_at", "Módosítás dátuma");
        $tblDemo->displayAs("name", "Név");
        $tblDemo->displayAs("ticket_id", "Jegyen szereplő kód");
        $tblDemo->displayAs("city", "Honnan jöttem");
        $tblDemo->displayAs("community", "Közösség");
        $tblDemo->displayAs("first_seminar", "Első szeminárium");
        $tblDemo->displayAs("second_seminar", "Második szeminárium");
        $tblDemo->displayAs("update_count", "Módosítások száma");


        #i can use a where field to better-filter my table
        //$tblDemo->addWhereClause("WHERE (fldField1 = 'test')");

        #i can order my table by whatever i want
        $tblDemo->addOrderBy("ORDER BY updated_at DESC");

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
        $tblDemo->formatFieldWithFunction('image', 'displayImage');
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


        function displayImage($val){
            if ($val == "") return "";
            return "<a target='_blank' href=\"./../img/news/$val\"><img src=\"./../img/news/$val\" width=\"90\"></a>";
        }

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