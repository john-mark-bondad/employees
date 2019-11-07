<?php
   $idofpage=$this->session->userdata('pageId');
              $idofaccount=$this->session->userdata('accountId'); 
             $x=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'add'); /*Returns true or false*/
             $y=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'edit'); /*Returns true or false*/
             $z=$this->mainmodel->hasButtonAccess($idofaccount,$idofpage,'delete'); /*Returns true or false*/
             $st1=($y)?"":"display:none";
             $st2=($z)?"":"display:none";


/*Perform your MYSQL query here*/
            
// $q=$this->db->query("select * from 
// 	across_test_employees ");

$q=$this->db->query("select * from 
    across_test_employees WHERE remark='1' order by id");




$str="";



$r=$q->result_array();
for($x=0;$x<count($r);$x++){
$id=$r[$x]['id'];
// $personnel_id=$r[$x]['personnel_id'];
// $name=strtoupper($r[$x]['lname']." ".$r[$x]['fname'].", ".$r[$x]['age']." ".$r[$x]['birthday']);

$fname=strtoupper($r[$x]['fname']);
$lname=strtoupper($r[$x]['lname']);
$age=strtoupper($r[$x]['age']);
$birthday=strtoupper($r[$x]['birthday']);

$str.="
<tr ondblclick='SYS_employees_edit($x)'>
<td>".($x+1)."
<input type='hidden' id='tbl_id$x' value='$id'/>
</td>
<td>$id</td>
<td>$fname</td>
<td>$lname</td>
<td>$age</td>
<td>$birthday</td>
<td style='$st1'><button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px;' title='Edit' onclick='SYS_employees_edit($x)'><span class='glyphicon glyphicon-edit'></span></button></td>

<td style='$st2'><button class='btn' style='background:rgba(0,0,0,0); width:100%; font-size:15px;' title='Delete' onclick='SYS_employees_delete($x)'><span class='glyphicon glyphicon-remove'></span></button></td>
</tr>
";
}


echo $str;
?>
