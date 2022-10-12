<?php
	$array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
	
	$emailTo = "cariavalentin95@gmail.com";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$array["firstname"] = verifyInput($_POST["firstname"]);
		$array["name"] = verifyInput($_POST["name"]);
		$array["email"] = verifyInput($_POST["email"]);
		$array["phone"] = verifyInput($_POST["phone"]);
		$array["message"] = verifyInput($_POST["message"]);
		$array["isSuccess"] = true;
		$emailText = "";
		
		if(empty($array["firstname"]))
		{
			$array["firstnameError"] = "Je veux connaitre ton prénom !";
			$array["isSuccess"] = false;
		}
		else
		{
			$emailText .="Firstname: {$array["firstname"]}\n" ;
		
		}
		if(empty($array["name"]))
		{
			$array["nameError"] = "Et oui je veux tout savoir. Même ton nom!";
			$array["isSuccess"] = false;
		}
		else
		{
			$emailText .="Name: {$array["name"]}\n" ;
		
		}
		if(!isEmail($array["email"]))
		{
			$array["emailError"] = "T'essaies de me rouler ? C'est pas un email ça !";
			$array["isSuccess"] = false;
		}
		else
		{
			$emailText .="Email: {$array["email"]}\n" ;
		
		}
		if(!isPhone($array["phone"]))
		{
			$array["phoneError"] = "Que des chiffres et des espaces, stp...";
			$array["isSuccess"] = false;
		}
		else
		{
			$emailText .="Phone: {$array["phone"]}\n" ;
		
		}
		if(empty($array["message"]))
		{
			$array["messageError"] = "Qu'est-ce que tu veux me dire ?";
			$array["isSuccess"] = false;
		}
		else
		{
			$emailText .="Message: {$array["message"]}\n" ;
		
		}
		if($array["isSuccess"])
		{
			$headers = "From: {$array["firstname"]} {$array["name"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}";
			mail($emailTo, "Un message de votre site", $emailText , $headers);
		}
		echo json_encode($array);
	}

	function isPhone($var)
	{
		return preg_match("/^[0-9 ]*$/", $var);
	}
	function isEmail($var)
	{
		return filter_var($var, FILTER_VALIDATE_EMAIL);
	}
	function verifyInput($var)
	{
		$var = trim($var);
		$var = stripslashes($var);
		$var = htmlspecialchars($var);

		return $var;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contactez-moi !</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://font.googleapis.com/css?family=Lato">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="divider"></div>
		<div class="heading">
			<h2>contactez-moi</h2>
		</div>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
					<div class="row">
						<div class="col-md-6">
							<label for="firstname">Prénom<span class="blue">*</span></label>
							<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $array["firstname"]; ?>"></input>
							<p class="comments"><?php echo $array["firstnameError"]; ?></p>
						</div>
						<div class="col-md-6">
							<label for="name">Nom<span class="blue">*</span></label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $array["name"]; ?>"></input>
							<p class="comments"><?php echo $array["nameError"]; ?></p>
						</div>
						<div class="col-md-6">
							<label for="email">Email<span class="blue">*</span></label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $array["email"]; ?>"></input>
							<p class="comments"><?php echo $array["emailError"]; ?></p>
						</div>
						<div class="col-md-6">
							<label for="phone">Téléphone<span class="blue">*</span></label>
							<input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre Téléphone" value="<?php echo $array["phone"]; ?>"></input>
							<p class="comments"><?php echo $array["phoneError"]; ?></p>
						</div>
						<div class="col-md-12">
							<label for="message">Message<span class="blue">*</span></label>
							<textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4"><?php echo $array["message"]; ?></textarea>
							<p class="comments"><?php echo $array["messageError"]; ?></p>
						</div>
						<div class="col-md-12">
							<p class="blue">* Ces informations sont requises</p>
						</div>
						<div class="col-md-12">
							<input type="submit" class="button1" value="Envoyer">
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>