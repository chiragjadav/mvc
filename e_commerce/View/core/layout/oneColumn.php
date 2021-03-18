<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e7222f1108.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/jquery-3.6.0.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/mage.js'); ?>"></script>

</head>

<body>

<table cellpadding="0px" width="100%" height="100%">
	<tbody>
		<tr>
			<td><?php echo $this->getChild('header')->toHtml();  ?></td>
		</tr>
		<tr height="10px">
			<td><?php // echo $this->getChild('message')->toHtml();  ?></td>
		</tr>
		<tr height="600px">
			<td><?php echo $this->getChild('content')->toHtml();  ?></td>
		</tr>
		<tr height="100px">
			<td><?php echo $this->getChild('footer')->toHtml(); ?></td>
		</tr>
	</tbody>
</table>
</body>
</html>