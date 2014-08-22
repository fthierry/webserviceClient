<?php
	include('include/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client webservice</title>
</head>

<body>
<h1>Client webservice</h1>
<h2>Exemples</h2>
<h3>Récupérer tous les exemples</h3>
<form action="<?php echo CURRENT_PAGE; ?>" method="post">
	<input type="hidden" name="method" value="getAllExemples" />
    <input type="submit" value="Récupérer" />
</form>
<h3>Récupérer un exemple avec son identifiant</h3>
<form action="<?php echo CURRENT_PAGE; ?>" method="post">
	<input type="hidden" name="method" value="getExemple" />
    <input type="text" name="exemple_id" value="" />
    <input type="submit" value="Récupérer" />
</form>
<?php if($_SESSION["result"]!=""){ ?>
<script>
alert("<?php echo $_SESSION["result"]; ?>");
</script>
<?php } ?>
</body>
</html>
