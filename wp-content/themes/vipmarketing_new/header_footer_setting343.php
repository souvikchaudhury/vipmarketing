<?php
global $wpdb;
if(isset($_POST['header_setting']) && $_POST['header_setting']=='Add')
{	
	$contact_no= $_POST['contact_no'];
	$fax= $_POST['fax'];
	$facebook_link= $_POST['facebook_link'];
	$twitter_link= $_POST['twitter_link'];
	$pinterest_link= $_POST['pinterest_link'];
	$sql="INSERT INTO `wp_header_footer` (`id`, `contact_no`, `fax`, `facebook_link`, `twitter_link`, `pinterest_link`) VALUES ('', '".$contact_no."', '".$fax."', '".$facebook_link."', '".$twitter_link."', '".$pinterest_link."')";
	if($wpdb->query($sql))
	{
		echo "Data added successfully";
	}else{
	
		echo "Data are not added";
	}
}elseif(isset($_POST['header_setting']) && $_POST['header_setting']=='Update')
{
	$id= $_POST['id'];
	$contact_no= $_POST['contact_no'];
	$fax= $_POST['fax'];
	$facebook_link= $_POST['facebook_link'];
	$twitter_link= $_POST['twitter_link'];
	$pinterest_link= $_POST['pinterest_link'];
	$sqlUpdate="UPDATE `wp_header_footer` SET `contact_no`='".$contact_no."',`fax`='".$fax."',`facebook_link`='".$facebook_link."',`twitter_link`='".$twitter_link."',`pinterest_link`='".$pinterest_link."' WHERE id='".$id."'";
	if($wpdb->query($sqlUpdate))
	{
		echo "Data updated successfully";
	}else{
	
		echo "Data are not updated";
	}
}
$sqlData="SELECT * FROM wp_header_footer";
$rsData=$wpdb->get_results($sqlData);
//echo "<pre>";print_r($rsData);exit;
if(count($rsData)>0)
{
$submit="Update";
$id=$rsData[0]->id;
$c_no=$rsData[0]->contact_no;
$fax_no=$rsData[0]->fax;
$f_link=$rsData[0]->facebook_link;
$t_link=$rsData[0]->twitter_link;
$p_link=$rsData[0]->pinterest_link;
}else{
$submit="Add";
$id='';
$c_no='';
$fax_no='';
$f_link='';
$t_link='';
$p_link='';
}
?>
<form action="" method="post">
	<table>
		<tr>
			<td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
		</tr>
		<tr>
			<td>Contact No</td><td><input type="text" name="contact_no" value="<?php echo $c_no; ?>" /></td>
		</tr>
		<tr>
			<td>Fax</td><td><input type="text" name="fax" value="<?php echo $fax_no; ?>" /></td>
		</tr>
		<tr>
			<td>Facebook Link</td><td><input type="text" name="facebook_link" value="<?php echo $f_link; ?>" /></td>
		</tr>
		<tr>
			<td>Twitter Link</td><td><input type="text" name="twitter_link" value="<?php echo $t_link; ?>" /></td>
		</tr>
		<tr>
			<td>Logo URL</td><td><input type="text" name="pinterest_link" value="<?php echo $p_link; ?>" /></td>
			
		</tr>
		<tr><td>Note:Upload the logo in media library and copy the url here.</td></tr>
		<tr>
			<td><input type="submit" name="header_setting" value="<?php echo $submit; ?>" /></td>
		</tr>
	</table>
</form>