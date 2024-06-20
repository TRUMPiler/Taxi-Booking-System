<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','youtube');
$res=mysqli_query($con,"select * from user");
if(mysqli_num_rows($res)>0){
	$html='<style></style><table class="table">';
		$html.='<tr><td>ID</td><td>Name</td><td>Email</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td></tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>