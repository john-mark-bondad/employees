<?php
$mode=$_POST['mode'];
$id=$_POST['id'];

$fname=strtoupper($this->db->escape_str($_POST['fname']));
$lname=strtoupper($this->db->escape_str($_POST['lname']));
$age=strtoupper($this->db->escape_str($_POST['age']));
$birthday=strtoupper($this->db->escape_str($_POST['birthday']));



$msg=""; $sql="";
$ex1=""; $ex2=""; $ex2=""; $ex3=""; $ex4="";
$pat1="/^[0-9]+$/"; $pat2="/^\D+$/"; $pat3="/^[a-zA-Z0-9]$/"; 


/*  Validation Process => You can customize this validation process*/
if(trim($fname)==""){ $msg="Invalid First name";  $ex1="1"; }
else if(preg_match($lname)){ $msg="Invalid Last name";  $ex2="1";}
else if(trim($age)==""){ $msg="Invalid Age";  $ex3="1"; }
else if(preg_match($birthday)){ $msg="Invalid Birthdday";  $ex4="1"; }	


if($mode=='add')
{


$q1=$this->db->query("select * from across_test_employees where fname like '$fname' and lname like '$lname' and age like '$age' and birthday like '$birthday' ");
if($q1->num_rows()==0)
{
$id=$this->mainmodel->getMaxId("across_test_employees","id")+1;
$sql.="insert into  across_test_employees values('$id','$fname','$lname','$age','$birthday', '1');";
}
else
{
$msg="This Employee Already Exists"; 
}

$q2=$this->db->query("select * from across_test_employees ");
if($q2->num_rows()==0)
{

/* Create a personnel_id*/
// $emp=$this->mainmodel->getMaxVal("across_p_personnel",'personnel_id',"where personnel_id like '%-".date("Y")."-%'");
// $cut=explode("-",$emp);
// $num=(isset($cut[2]))?$cut[2]:"0";
// $code=$this->mainmodel->coding(1);
// $codeStart=$code[0]['codePrefix'];
// $codelen=$code[0]['codeLength'];
// $strt=(trim($codeStart)=="")?"":"$codeStart-";
// $personnel_id=$strt.date("Y")."-".$this->mainmodel->numformat($codelen,($num+1));


$sql.="insert into across_test_employees values('$id','$fname','$lname','$age','$birthday','1');";	
}
else{
$sql.="update across_test_employees set fname='$fname', lname='$lname', age='$age', birthday='$birthday', remark='1' where id='$id';";	
}







}
else if($mode=='edit')
{





$sql.="update across_test_employees set fname='$fname',lname='$lname',age='$age', birthday='$birthday' where id='$id';";
$q3=$this->db->query("select * from across_test_employees where id='$id'");
if($q3->num_rows()==0)
{
$emp=$this->mainmodel->getMaxVal("across_test_employees",'id',"where id like '%-".date("Y")."-%'");
$cut=explode("-",$emp);
$num=(isset($cut[2]))?$cut[2]:"0";
$code=$this->mainmodel->coding(1);
$codeStart=$code[0]['codePrefix'];
$codelen=$code[0]['codeLength'];
$strt=(trim($codeStart)=="")?"":"$codeStart-";
$id=$strt.date("Y")."-".$this->mainmodel->numformat($codelen,($num+1));

$sql.="insert into across_test_employees values('$id', '$fname', '$lname', '$age', '$birthday','1');";	
}
else{
$sql.="update across_test_employees set fname='$fname', lname='$lname', age='$age', birthday='$birthday', remark='1' where id='$id';";	
}







}

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;
$a['ex1']=$ex1;
$a['ex2']=$ex2;
$a['ex3']=$ex3;
$a['ex4']=$ex4;

echo json_encode($a);

?>