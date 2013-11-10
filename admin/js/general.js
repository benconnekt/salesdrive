function valid(actPath)
{	
if(document.frmlist.keyword.value=="")
	{ 
        alert(actPath);
		alert("Please Enter keyword for Search.");
		document.frmlist.keyword.value="";
		document.frmlist.keyword.focus();
		return false;
	}
	document.frmlist.keyword.value = Trim(document.frmlist.keyword.value);
	document.frmlist.mode.value="Search";
	if(actPath)
	{ 
    window.location=actPath +"&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value;
		return false;
	}
}

function RedirectURL(URL,ExtraParam)
{
	if(!ExtraParam)ExtraParam='';
	window.location=URL+ExtraParam;
	return false;
}

function number(value,length){
	chk1="1234567890-";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}


function Trim(s) 
{
	return s.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

/* It is compare the condition (equal,greater,less) 
Parameter : Objname,
comparision value
condition pass 'Equal', 'Greater','Less'
Alere Message to Dipslay
*/
function getHTTPObject()
{
	// code for Mozilla, etc.
	if (window.XMLHttpRequest)
  	{
  		xmlhttp=new XMLHttpRequest()
  	}
// code for IE
	else if (window.ActiveXObject)
  	{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  	}
	return xmlhttp;
}
var ajax = getHTTPObject();

function Highlight(e)
{
	if(e.className!="raw_selectedbg")
		e.className="mouseover";
}
function UnHighlight(e,classname)
{
//	alert(e.className)
	if(e.className!="raw_selectedbg")
		e.className=classname;
}
