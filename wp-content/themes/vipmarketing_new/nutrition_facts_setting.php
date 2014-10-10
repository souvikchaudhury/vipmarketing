<?php
global $wpdb;
if(isset($_POST['nutrition_setting']) && $_POST['nutrition_setting']=='Add')
{	
	$content_details= $_POST['content_details'];
	$image_url= $_POST['image_url'];
	$content_link= $_POST['content_link'];
	$sql="INSERT INTO `wp_nutrition_facts` (`id`, `content_details`, `image_url`, `content_link`) VALUES ('', '".$content_details."', '".$image_url."', '".$content_link."')";
	if($wpdb->query($sql))
	{
		echo "Data added successfully";
	}else{
	
		echo "Data are not added";
	}
}elseif(isset($_POST['nutrition_setting']) && $_POST['nutrition_setting']=='Update')
{
	$id= $_POST['id'];
	$content_details= $_POST['content_details'];
	$image_url= $_POST['image_url'];
	$content_link= $_POST['content_link'];
	
	$sqlUpdate="UPDATE `wp_nutrition_facts` SET `content_details`='".$content_details."',`image_url`='".$image_url."',`content_link`='".$content_link."' WHERE id='".$id."'";
	if($wpdb->query($sqlUpdate))
	{
		echo "Data updated successfully";
	}else{
	
		echo "Data are not updated";
	}
}
$sqlData="SELECT * FROM wp_nutrition_facts";
$rsData=$wpdb->get_results($sqlData);
//echo "<pre>";print_r($rsData);exit;
if(count($rsData)>0)
{
$submit="Update";
$id=$rsData[0]->id;
$content_details=$rsData[0]->content_details;
$image_url=$rsData[0]->image_url;
$content_link=$rsData[0]->content_link;
}else{
$submit="Add";
$id='';
$content_details='';
$image_url='';
$content_link='';

}
?>
<form action="" method="post">
	<table>
		<tr>
			<td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
		</tr>
		<tr>
			<td>Content</td><td><textarea name="content_details"><?php echo $content_details; ?></textarea></td>
		</tr>
		<tr>
			<td>Image Url</td><td><input type="text" name="image_url" size="50" value="<?php echo $image_url; ?>" /></td>
		</tr>
		<tr>
			<td>View detailed Fact Link</td><td><input type="text" name="content_link" size="50" value="<?php echo $content_link; ?>" /></td>
		</tr>
		<tr>
			<td><input type="submit" name="nutrition_setting" value="<?php echo $submit; ?>" /></td>
		</tr>
	</table>
</form>