function isValidEmail(email){ 
    var RegExp = /^((([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+(\.([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+)*)@((((([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.))*([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.)[\w]{2,4}|(((([0-9]){1,3}\.){3}([0-9]){1,3}))|(\[((([0-9]){1,3}\.){3}([0-9]){1,3})\])))$/ 
    if(RegExp.test(email)){ 
        return true; 
    }else{ 
        return false; 
    } 
} 

function verif_des_champs(frm) {
var mess_info = "";


if ( !isValidEmail(frm.mail.value) )
  mess_info += '\nSyntaxe de mail ('+frm.mail.value+') incorrecte';
  
if ( mess_info != "" )
	{
	alert(mess_info);
	return false;
	}
else 
	return true;
}
