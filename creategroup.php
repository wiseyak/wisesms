<?php
include('db.php');

require_once('Common/header.php');
?>
<div class="container">


<div class="row">
 <h2>Group Management</h2>

 <button id="create-group" class='btn btn-success btn-sm'><span class="glyphicon glyphicon-plus"></span> Create new group</button>
</div>

<div class="row notification">
	<div id="notificationbox" class="notificationbox"></div>

</div>
<div class="row accordion">
<?php
          $record=getgroups();
          while($row=mysql_fetch_assoc($record))
           {
           echo "<h3>".$row['Name']."</h3>";
           $record1=getActiveUsersbygroupid($row['id']);
           echo "<ul class='grp-users'>";
            while($row1=mysql_fetch_assoc($record1))
           {
 echo "<li class='bg-primary'><span class='glyphicon glyphicon-user'></span> ".$row1['Name']."<button type='button' class='close' aria-hidden='true' data-id='".$row1['id'].",".$row['id']."'>×</button></li>";
           }
            echo "<li class='bg-success'><span class='glyphicon glyphicon-user'></span>  Include new member to ".$row['Name']."<button type='button' class='close' aria-hidden='true' data-id='".$row1['id'].",".$row['id']."'>+</button></li>";
          echo "</ul>";
          }

      ?>



</div>

<button type="button" class="close" aria-hidden="true">&times;</button>





<div class="row create-form-group">
 <div class="form-group">
<label class="control-label">Group Name : </label><input type="Text" name="grpName" id="grpName" class="form-control input-sm" placeholder="Enter Group Name"/>
</div>
<div id="feedback">
<h4>Members In Group :</h4> <h4 id="select-result">none</h4>.
</div>

<ol id="selectable">
<?php

$record=getActiveUsers();

while($row=mysql_fetch_assoc($record))
{
echo "<li class='ui-widget-content' data-userid='".$row['id']."'>".$row['Name']."</li>";

}

?>
</ol>

</div>

 <style>
#feedback { font-size: 1.4em; }
#selectable .ui-selecting { background: #FECA40; }
#selectable .ui-selected { background: #F39814; color: white; }
#selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; width:30%;}
#grpName{width:200px;}
.create-form-group{display : none;}
#create-group{margin-bottom: 20px;}
.accordion {margin-left: -16px;}
#selectable li {
    font-size: .7em;
    height: auto;
    margin: 1px;
    padding: 0.4em;
    width: auto;
}
#feedback h4 {color:#428BCA;}
#selectable .ui-selected {background-color: #428BCA;
    color: #FFFFFF;}
    .grp-users li{ width: 300px;margin: 10px 0;padding: 10px;}
    #notificationbox {margin-right: 16px; padding: 10px;}
</style>

<?php require_once('Common/footer.php'); ?>