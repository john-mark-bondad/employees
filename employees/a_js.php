<script type="text/javascript">

function SYS_employees_list(){
SYS_TableStart('#t_maintable'); /* Table declaration*/


$.post(URL+"index.php/acctload/loadEmployeesList").done(function(data){ 
$('#t_maintable tbody').html(data); /* Attatch list content to tbody*/
SYS_TablefirstInstance1('#t_maintable',10,10);	/* Table set*/
});

}



/*Add employees*/
function SYS_employees_form(){
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','1000px','Add employees',function(){ SYS_dealer_finalsave(); });
$.post(URL+"index.php/acctload/loadEmployeesForm",{mode:'add',id:""}).done(function(data){
$("#dialog1").html(data).dialog("open");
});  
}


/*Edit employees*/
function SYS_employees_edit(x)
{	
var id=$('#tbl_id'+x).val();
$('#dialog1').remove();
$('body').append("<div id='dialog1'></div>"); /*Creates a virtual DOM <div id='dialog1'></div>*/


SYS_dialog('#dialog1','500','1000px','Edit employees',function(){ SYS_dealer_finalsave(); });
$.post(URL+"index.php/acctload/loadEmployeesForm",{mode:'edit',id:id}).done(function(data){
$("#dialog1").html(data).dialog("open");
});  



}


/* Delete employees */
function SYS_employees_delete(x)
{
var id=$('#tbl_id'+x).val();	
SYS_confirm("Do you wish Proceed?","Information will be deleted from the database","warning","Yes","No",function(){
sweetAlertClose();  



$.post(URL+"index.php/acctload/loadEmployeesDelete",{id:id}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success");  SYS_employees_list();
}
else{ swal("Error",n.msg,"warning");  }
});



});	
}



function SYS_dealer_finalsave()
{
SYS_confirm("Do you wish Proceed?","Information will be saved to the database","warning","Yes","No",function(){
sweetAlertClose();  
SYS_employees_save();
});	
}




function SYS_employees_save(){
/********* Gets values from form ***************/
var mode=$('#form_mode').val();
var id=$('#form_default_id').val();

var fname=$('#form_fname').val();
var lname=$('#form_lname').val();
var age=$('#form_age').val();
var birthday=$('#form_birthday').val();

/********  Saving process **************/
$.post(URL+"index.php/acctload/loadEmployeesSave",{
	mode:mode,
	id:id,
	fname:fname,
	lname:lname,
    age:age,
    birthday:birthday
}).done(function(data){
n=JSON.parse(data);
if(n.msg==""){
swal("Done","Information was saved","success"); SYS_closeDialog2("#dialog1"); SYS_employees_list();
}
else{ $('#msg').html(SYS_validateMsg(n.msg));  }

if(n.ex1==""){ $('#form_fname').css({'border-color':'#68BEFD'}); }else{ $('#form_fname').css({'border-color':'red'}); } 
if(n.ex2==""){ $('#form_lname').css({'border-color':'#68BEFD'}); }else{ $('#form_lname').css({'border-color':'red'}); } 
if(n.ex3==""){ $('#form_age').css({'border-color':'#68BEFD'}); }else{ $('#form_age').css({'border-color':'red'}); } 
if(n.ex4==""){ $('#form_birthday').css({'border-color':'#68BEFD'}); }else{ $('#form_birthday').css({'border-color':'red'}); } 
}); 





}
</script>