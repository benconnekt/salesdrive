<?php include("include.php");
include ('registercheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Registration </title>
    <meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Connektor">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.6.4.min.js"></script>
    <script src="js/script.js"></script>
	<!--[if lt IE 7]>
  		<div class='aligncenter'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"border="0"></a></div>  
 	<![endif]-->
    <!--[if lt IE 9]>
   		<script src="js/html5.js"></script>
  		<link rel="stylesheet" href="css/ie.css"> 
	<![endif]-->
    <script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>

  <script>
  $(document).ready(function(){
    $.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");

    $("#regForm").validate();
  });
  </script>
</head>
<body>
<div class="bg">
    <div class="bg2">
        <div class="body2">
    <!--==============================header=================================-->
    <div class="wrapper">
 <?include 'header.php';?>
       
    <!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="wrapper">
                <div class="block_container">
                <div class="outer_block_top"></div>
                 
                <div class="blockmain">
                    <div class="main">
                        <article class="grid_32 regForm">
                            <p>
	<?php 
	 if (isset($_GET['done'])) { ?>
	  <h2>Thank you</h2> Your registration is now complete and you can <a href="login.php">login here</a>";
	 <?php exit();
	  }
	?></p>
      <h3 class="titlehdr">Free Registration / Signup</h3>
      <p>Please register a free account, before you can start posting your ads. 
        Registration is quick and free! Please note that fields marked <span class="required">*</span> 
        are required.</p>
	 <?php	
	 if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	 ?> 
	 
	  <br>
      <form action="register.php" method="post" name="regForm" id="regForm" >
          <p>
          <label>Name</label><span class="required">*</span>
              <input name="full_name" type="text" id="full_name" class="required">
          </p>
          <p>
          <label>Company Name</label><span class="required">*</span>
              <input name="company" type="text" id="company" class="required">
          </p>
          <p>
              <label>Contact Address</label><span class="required">*</span>
              <textarea name="address" id="address" class="required"></textarea> 
              <span class="example">VALID CONTACT DETAILS</span>
          </p>
          <p>
          <label>Post Code</label><span class="required">*</span>
              <input name="postcode" type="text" id="postcode" class="required">
          </p>
          <p>
              <label>Country</label> <span>*</span>
            <select name="country" class="required" id="select8">
                <option value="" selected></option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Anguila">Anguila</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia ">Armenia </option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaidjan">Azerbaidjan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmans Islands">Christmans Islands</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Estonia">Estonia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guyana">French Guyana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="Gabon">Gabon</option>
                <option value="Germany">Germany</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Georgia">Georgia</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guinea">Guinea</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati ">Kiribati </option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's 
                Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia ">Malaysia </option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marocco">Marocco</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldavia">Moldavia</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Niue">Niue</option>
                <option value="North Korea">North Korea</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru ">Peru </option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal ">Portugal </option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Korea Reunion">Republic of Korea Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint kitts and nevis">Saint kitts and nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="St.Pierre and Miquelon">St.Pierre and Miquelon</option>
                <option value="St.Vincent and the Grenadines">St.Vincent and the 
                Grenadines</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan ">Taiwan </option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Thailand">Thailand</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Ukraine">Ukraine</option>
                <option value="UAE">UAE</option>
                <option value="UK" selected="selected">UK</option>
                <option value="USA">USA</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (GB)">Virgin Islands (GB)</option>
                <option value="Virgin Islands (U.S.) ">Virgin Islands (U.S.) </option>
                <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                <option value="Yemen">Yemen</option>
                <option value="Yugoslavia">Yugoslavia</option>
              </select>
          </p>
          <p>
            <label>Phone</label><span class="required"><span>*</span> 
                <input name="tel" type="text" id="tel" class="required">
                </p>
          
            <p><h4>Login Details</h4></p>
          
            <p><label>Username</label><span class="required">*</span>
            <input name="user_name" type="text" id="user_name" class="required username" minlength="5" > 
              <input name="btnAvailable" type="button" id="btnAvailable" 
			  onclick='$("#checkid").html("Please wait..."); $.get("checkuser.php",{ cmd: "check", user: $("#user_name").val() } ,function(data){  $("#checkid").html(data); });'
			  value="Check Availability"> 
			    <span style="color:red; font: bold 12px verdana; " id="checkid" ></span> 
            </p>
          <p><label>Your Email</label><span class="required">*</span> 
        <input name="usr_email" type="text" id="usr_email3" class="required email"> 
              <span class="example">** Valid email please..</span>
          </p>
          <p><label>Password</label><span class="required">*</span> 
       
         <input name="pwd" type="password" class="required password" minlength="5" id="pwd"> 
              <span class="example">** 5 chars minimum..</span>
          </p>
            <p>
                <label>Retype Password</label><span class="required">*</span> 
          <input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd"></td>
          </p>
         
            <p><label>Image Verification </label>
       
              <?php 
			require_once('recaptchalib.php');
			
				echo recaptcha_get_html($publickey);
			?>
            </p>
   
        <p>
            <label>&nbsp;</label>
          <input name="doRegister" type="submit" id="doRegister" value="Register">
        </p>
      </form>
             
                    </article>
                       <div class="clear"></div>
                    </div>
                </div>
                </div>
               <div class="outer_block_bottom"> </div>
                </div>
                   <div class="clear"></div>
                   <div class="main">
                       <?//include('news.php') ?>
                       <div class="clear"></div>
                       
                   
   <? include('footer.php')?>

</body>
</html>