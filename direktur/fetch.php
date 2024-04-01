<?php 
if(isset($_POST["view"]))
{
	$connect=mysqli_connect("localhost", "root","", "surat");
	if($_POST["view"] != '')
	{
		$update_query="UPDATE surat_masuk SET notif=1 WHERE notif=0"; mysqli_query($connect, $update_query);
	}
	

	$query="SELECT * FROM surat_masuk ORDER BY id_surat DESC LIMIT 5";
	$result =mysqli_query($connect, $query);
	$output='';
	if(mysqli_num_rows($result)>0)
	{
		while($row =mysqli_fetch_array($result))
		{
			$output .='
			<li>
			<a href="#">
			<strong>'.$row["comment_subject"].'</strong><br/>
			<small><em>'.$row["comment_text"].'</em></small>
			</a>
			</li>
			';
		}
	}
	else
	{
		$output .= '
		<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
		';
	}
	$query_1="SELECT * FROM surat_masuk WHERE notif=0";
	$result1=mysqli_query($connect, $query_1);
	$count=mysqli_num_rows($result1);
	$data=array(
		'notification' => $output,
		'unseen_notification' => $count

	);
	echo json_encode($data);
}
?>