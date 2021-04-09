<!DOCTYPE html>
<html>
<?php echo $this->getBlock('Block\Customer\Layout\Head')->toHtml(); ?>
<body>

<table cellpadding="0px" width="100%" height="100%">
	<tbody>
		<tr>
			<td><?php echo $this->getChild('header')->toHtml();  ?></td>
		</tr>
	<?php /*	<tr height="10px">
			<td><?php  echo $this->getChild('message')->toHtml();  ?></td>
		</tr>
	*/  ?>
		<tr>
			<td><?php echo $this->getChild('content')->toHtml();  ?></td>
		</tr>
		<tr>
			<td><?php echo $this->getChild('footer')->toHtml(); ?></td>
		</tr>
	</tbody>
</table>
</body>
</html>