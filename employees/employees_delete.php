<?php
$id=$_POST['id'];

$msg=""; $sql="";

$sql.="delete from across_test_employees where id='$id';";

if($msg==""){ $this->mainmodel->database_update1($sql); }

$a['msg']=$msg;


echo json_encode($a);

?>