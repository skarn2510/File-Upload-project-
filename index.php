
<!DOCTYPE html>
<html>
<head>
	<title>
		File Upload Project
	</title>
</head>
<body>
	<section class="sec1">
		<h2>Please Select a file to upload</h2>
		<div>
			<form action="" method="post" enctype="multipart/form-data">
				<!-- <input type="text" name="name"> -->
				<input class="file_upload_button" required type="file" name="upload_file">
				<br />
				<br />
				<button type="submit" name="submit">submit</button>
			</form>
		</div>
	</section>
</body>
</html>
<?php 
include "config.php";

// $name = $_POST['name'];



if(isset($_POST['submit'])){
	$file2 = $_FILES['upload_file']['name'];
	$target_dir = 'assets/uploads/';
		if($file2 != ''){
			$temp_name = $_FILES['upload_file']['tmp_name'];
			$dir2 = $target_dir.$file2;
			move_uploaded_file($temp_name , $target_dir.$file2);
			$insert = "INSERT INTO `file manager`(`File Name`, `File Path`) VALUES ('{$file2}','{$dir2}')";
    		$insert_qry = mysqli_query($con,$insert);
    		?>
    		<script type="text/javascript">
    			window.location.href = "file_manager.php";
    		</script>
    		<?php
		}else{
			echo "Please Select a File";
		}
}

mysqli_close($con);
?>