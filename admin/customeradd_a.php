<?
include_once("noentry.php");

define('SALT_LENGTH', 9); // salt for password

function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	
	$data = mysql_real_escape_string($data);
	
	return $data;
}
// Password and salt generation
function PwdHash($pwd, $salt = null)
{
    if ($salt === null)     {
        $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
    }
    else     {
        $salt = substr($salt, 0, SALT_LENGTH);
    }
    return $salt . sha1($pwd . $salt);
}

$mode = $_POST['mode'];
$id = $_POST['id'];

foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}

// Generates activation code simple 4 digit number
$activ_code = rand(1000,9999);

$usr_email = $data['email'];
$user_name = $data['user_name'];

// stores sha1 of password
$sha1pass = PwdHash($data['pwd']);

$user_ip = $_SERVER['REMOTE_ADDR'];

if($mode == 'Add')
{
    //echo $data[status];
/*$sql = "INSERT INTO customer(fname,email,company,phone,status)
		VALUES('".$_POST['fname']."','".$_POST['email']."',
		'".$_POST['company']."','".$_POST['phone']."','".$_POST['status']."')";*/
    
$sql = "INSERT into `users`
  			(`full_name`,`company`,`user_email`,`pwd`,`address`,`postcode`,`tel`,`date`,`users_ip`,`activation_code`,`country`,
    `user_name`,`approved`
			)
		    VALUES
		    ('$data[fname]','$data[company]','$usr_email','$sha1pass','$data[address]','$data[postcode]','$data[tel]',
                    now(),'$user_ip','$activ_code','$data[country]','$user_name',$data[status]
			)
			";
            

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=customerlist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{
	$sql = "UPDATE users set
			full_name = '".$_POST['fname']."',
			user_email = '".$_POST['email']."',
			company = '".$_POST['company']."',
                        address = '".$_POST['address']."',
                        postcode = '".$_POST['postcode']."',
                        country = '".$_POST['country']."',
                        tel = '".$_POST['tel']."',
                        approved = '".$_POST['status']."'   
			WHERE id = '".$_POST['id']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=customerlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Delete')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "DELETE from users WHERE id = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=customerlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Active')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "UPDATE users set approved  = '1' WHERE id = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Active Successfully ';
		header('location: index.php?file=customerlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Inactive')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "UPDATE users set approved = '0' WHERE id = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records InActive Successfully ';
		header('location: index.php?file=customerlist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=customerlist&keyword='.$_POST['keyword']);
	exit;
}
?>