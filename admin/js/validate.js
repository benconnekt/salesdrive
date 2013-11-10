function validate(frm)
{
//	alert(frm.username.title);
	var n = frm.elements.length;
	
	for(var i=0;i<n;i++)
	{
		var alt = frm.elements[i].alt;
		var val = frm.elements[i].value;
		var title = frm.elements[i].title;
		var name = frm.elements[i].name;
		if(alt && alt != "")
		{
			var comp = alt.charAt(0);
			rtn1=alt.indexOf('{');
			rtn2=alt.lastIndexOf('}');
			if(comp=="*" || comp=="_")
			{
				if(comp=="*" && val=="")
				{
					alert("Please Enter "+title);
					frm.elements[i].focus();
					return false;
				}
				var valid_char = '';
				var valid_email = 'No';
				for(var j=rtn1+1; j<rtn2; j++)
				{
					//alert(alt.charAt(j));
					if(alt.charAt(j)=="N")
						valid_char += '0123456789.';
					else if(alt.charAt(j)=="A")
						valid_char += 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					else if(alt.charAt(j)=="C")
						valid_char += '0123456789.+-';
					else if(alt.charAt(j)=="T")
						valid_char += '0123456789.+-() ';
					else if(alt.charAt(j)=="D")
						valid_char += '0123456789-/: ';
					else if(alt.charAt(j)=="E")
					{
						valid_email = "Yes";
						valid_char += 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789._-@';
					}
					else if(alt.charAt(j)=="X")
						valid_char = '';
					else if(alt.charAt(j)=="[")
					{
						irtn1=alt.indexOf('[');
						irtn2=alt.lastIndexOf(']');
						//alert(alt.substring(irtn1+1,irtn2));
						valid_char += alt.substring(irtn1+1,irtn2);
						j = rtn2;
					}
				}
				if(valid_email == 'Yes')
				{
					valid_msg = isValidEmail(frm.elements[i].value);
					if(valid_msg != 0)
					{
						alert(valid_msg);
						frm.elements[i].focus();
						return false;
					}
				}
				for(k=0;k<val.length && valid_char!='';k++)
				{
					ch=val.charAt(k);
					rtn=valid_char.indexOf(ch);
					if(rtn==-1)
					{
						alert("Please Enter Valid "+ title);
						frm.elements[i].focus();
						return false;
					}
				}
				
				// Format Validation Here

				f_str = alt.substring(rtn2+1,alt.length);
				if(f_str != "" && comp=="*")
				{
					arr = f_str.split(':');
					if(parseInt(arr[0]) > 0)
					{
						if(val.length < parseInt(arr[0]))
						{
							alert(title + " must be atleast of "+parseInt(arr[0])+" characters");
							return false;
						} 
					}
					if(parseInt(arr[1]) > 0)
					{
						if(val.length > parseInt(arr[1]))
						{
							alert(title + " must be less than or equal of "+parseInt(arr[1])+" characters");
							return false;
						} 
					}
				}
			}
		}
	}
	return true;
}