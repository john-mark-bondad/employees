<?php
/* Values from the $.post*/
$mode=$_POST['mode'];
$id=$_POST['id'];

$employees=$this->mainmodel->employees_data($id); /* In SQL => select * from across_test_employees where id='$id'*/

 // $employees_datas=$this->mainmodel->employees_datas($id); /* In SQL => select * from across_test_employees where id='$id'*/



/* Gets valus from executed query in $emmployees*/
$fname=($mode=="add")?"":strtoupper($employees[0]['fname']);
$lname=($mode=="add")?"":strtoupper($employees[0]['lname']);
$age=($mode=="add")?"":strtoupper($employees[0]['age']);
$birthday=($mode=="add")?"":strtoupper($employees[0]['birthday']);




/* Gets valus from executed query in $employees_datas*/
// $fname=($mode=="add")?"":strtoupper($employees_datas[0]['fname']);
// $lname=($mode=="add")?"":strtoupper($employees_datas[0]['lname']);
// $age=($mode=="add")?"":strtoupper($employees_datas[0]['age']);
// $birthday=($mode=="add")?"":strtoupper($employees_datas[0]['birthday']);

?>
<script type="text/javascript">
SYS.ready(function(){
$( ".datepicker" ).datepicker({
     changeMonth: true,
      changeYear: true,
    dateFormat: "yy-mm-dd"
  });	

// <?php
// echo "
// $('#form_gender').val($gender);
// $('#form_civilstat').val($civilstat);
// ";

// ?>

});  // end function

</script>

<input type='hidden' id='form_mode' value="<?= $mode; ?>">
<input type='hidden' id='form_default_id' value="<?= $id; ?>">

<!-- <input type='hidden' id='form_id' value="<?= $id; ?>"> -->

<!-- VALIDATION DIV TAG  -->
<div id='msg' style='height:15px; margin-top:1%;'></div>




<div id='sys_mainbody'>

<div class='col-sm-6'>
<div class='row'>
<div class='col-sm-5'><label>First Name*</label></div>
<div class='col-sm-7'><input type='text' id='form_fname' class='textbox' value="<?= $fname; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Last Name*</label></div>
<div class='col-sm-7'><input type='text' id='form_lname' class='textbox' value="<?= $lname; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Age*</label></div>
<div class='col-sm-7'><input type='text' id='form_age' class='textbox' value="<?= $age; ?>"/></div>
</div>
<div class='row'>
<div class='col-sm-5'><label>Birthday(YYYY-MM-DD)</label></div>
<div class='col-sm-7'><input type='text' id='form_birthday' class='textbox datepicker' value="<?= $birthday; ?>"/></div>
</div>
</div>

</div>






</div>
