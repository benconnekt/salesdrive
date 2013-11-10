function valid_search(actPath)
{	
	
	if(Trim(document.frmlist.keyword.value)=="")
	{
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
function valid(actPath)
{	
	val=event.keyCode;
	if(val==13)
	{
		if(Trim(document.frmlist.keyword.value)=="")
		{
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
	
}


function checkAll()
{
	var rs = (document.frmlist.abc.checked)?true:false;
	
	for(i=0;i<document.frmlist.elements.length;i++)
	{
	  	if(document.frmlist.elements[i].id == 'iId')
  		{
			document.frmlist.elements[i].checked = rs;
		}

	}  
}

/* modified by chetan 20/jan*/
function checkDelete()
{

	var y=0; var ans;
	y = getCheckCount();
	var actionvalue='Delete';
	if(y>0)
	{	ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	
			document.frmlist.mode.value=actionvalue;
		    document.frmlist.submit();
		}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}
function getCheckCount()
{	var x=0;

	for(i=0;i < document.frmlist.elements.length;i++)
	{	if (document.frmlist.elements[i].id == 'iId' && document.frmlist.elements[i].checked == true) 
			{x++;}
	}
	return x;
}

function checkActive()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confirm Active Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Active";	
			//return true;
			document.frmlist.submit();		
		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Activate.");	return false;	}
}

function checkInActive()
{
	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Inactive Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Inactive";	
			document.frmlist.submit();		
			// return true;
		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Deactivate.");	return false;	}
}

function Highlight(e)
{
	//if(e.className!="raw_selectedbg")
	e.className="td-mouseover";
}
function UnHighlight(e,classname)
{
	//alert(e.className)
	//if(e.className!="raw_selectedbg")
	e.className=classname;
}
function goto(url)
{
	window.location=url;
	return false;
}