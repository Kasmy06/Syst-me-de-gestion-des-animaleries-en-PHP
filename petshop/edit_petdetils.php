<?php
if(isset($_GET['id']))
	{
		
			include("db.php");
			$petid=$_GET['id'];
			$query=$con->prepare("select *from petdetails where pet_id='$petid'");
			
			$query->execute();
			$row=$query->fetch();
	}
?>
<html>
<head>
<style>
#mainact{width:1000px;height:auto;background:#fffff;margin-left:160px;box-shadow:5px 5px 5px #400040;border:2px solid #400040;}

#mainact h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;}
#mainact table{margin-left:200px;}
#mainact table tr td{font-size:25px;padding:5px;font-weight:bold;}
#mainact table tr td input{font-size:20px;padding:5px;width:300px;height:40px;border-radius:4px;border:2px solid aquamarine;margin-left:50px;}

</style>


</head>
<body>
<form method="post" enctype="multipart/form-data">
<div id="mainact">
	<h1>Mettre à jour les détails de l'animal</h1>
	<table>
	<tr>
	<td>Enter le Nom :</td>
	<td><input type="text" name="petname" placeholder="Enter le Nom" value="<?php echo "".$row['pet_name']."";?>"></td>
	</tr>
	<tr>
	<td>Enter la Catégorie :</td>
	<td><input type="text" name="pettype" placeholder="Enter la Catégorie" value="<?php echo "".$row['pet_type']."";?>"></td>
	</tr>
	<tr>
	<td>Enter la Couleur :</td>
	<td><input type="text" name="petcolor" placeholder="Enter la Couleur" value="<?php echo "".$row['pet_color']."";?>"></td>
	</tr>
	<tr>
	<td>Enter le Tarif:</td>
	<td><input type="text" name="petrate" placeholder="Enter le Tarif" value="<?php echo "".$row['pet_rate']."";?>"></td>
	</tr>
	<tr>
	<td>Enter le Mot clé :</td>
	<td><input type="text" name="petkeyword" placeholder="Enter le Mot clé" value="<?php echo "".$row['pet_keywords']."";?>"></td>
	</tr>
	<tr>
	<td>Enter la photo1  :</td>
	<td><input type="text" name="petfeature1" placeholder="Enter photo1" value="<?php echo "".$row['pet_features1']."";?>"></td>
	</tr>
	<tr>
	<td>Enter la Photo2  :</td>
	<td><input type="text" name="petfeature2" placeholder="Enter la photo2" value="<?php echo "".$row['pet_features2']."";?>"></td>
	</tr>
	<tr>
	<td>Enter la photo1 :</td>
	<td><input type="file" name="petimg1">
	
	<img src="petphotos/<?php echo"".$row['pet_img1']."";?>" style="width:60px;height:60px;"></td>
	</tr>
	<tr>
	<td>Enter la photo2  :</td>
	<td><input type="file" name="petimg2">
	
	<img src="petphotos/<?php echo"".$row['pet_img2']."";?>" style="width:60px;height:60px;"></td>
	</tr>
	<tr>
	<td>Enter la photo3 :</td>
	<td><input type="file" name="petimg3">
	
	<img src="petphotos/<?php echo"".$row['pet_img3']."";?>" style="width:60px;height:60px;">
	</td>
	</tr>
	<tr>
	<td>Enter la photo4 :</td>
	<td><input type="file" name="petimg4">
	<img src="petphotos/<?php echo"".$row['pet_img4']."";?>" style="width:60px;height:60px;">
	
	</td>
	</tr>
	<tr>
	<td>Enter la Nourriture  :</td>
	<td><input type="text" name="petfoods" placeholder="Enter la Nourriture" value="<?php echo "".$row['pet_foods']."";?>"></td>
	</tr>
	
	</table>
		<input type="submit" name="click" value="Mise ajout des détails" style="margin-top:20px;margin-bottom:20px;font-size:20px;margin-left:500px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#fff;">
</div>

</form>
</body>
</html>
<?php

		if(isset($_POST['click']))
		{
		
		$petname=$_POST['petname'];
		$pettype=$_POST['pettype'];
		$petcolor=$_POST['petcolor'];
		
		$petrate=$_POST['petrate'];
		$petfeature1=$_POST['petfeature1'];
		$petfeature2=$_POST['petfeature2'];
		$petkeyword=$_POST['petkeyword'];
		
		if($_FILES['petimg1']['tmp_name']=="")
			{
				
			}
			else
			{
				$petimage1=$_FILES['petimg1']['name'];
			$pet_img1_temp=$_FILES['petimg1']['tmp_name'];												
			move_uploaded_file($pet_img1_temp,"petphotos/$petimage1");	
		
				$up_img2=$con->prepare("update petdetails set pet_img1='$petimage1' where pet_id='$petid'");
			
				$up_img2->execute();
			
			}
			if($_FILES['petimg2']['tmp_name']=="")
			{
				
			}
			else
			{
				$petimage2=$_FILES['petimg2']['name'];
			$pet_img2_temp=$_FILES['petimg2']['tmp_name'];												
			move_uploaded_file($pet_img2_temp,"petphotos/$petimage2");	
		
				$up_img2=$con->prepare("update petdetails set pet_img2='$petimage2' where pet_id='$petid'");
			
				$up_img2->execute();
			
			}
			if($_FILES['petimg3']['tmp_name']=="")
			{
				
			}
			else
			{
				$petimage3=$_FILES['petimg3']['name'];
			$pet_img3_temp=$_FILES['petimg3']['tmp_name'];												
			move_uploaded_file($pet_img3_temp,"petphotos/$petimage3");	
		
				$up_img3=$con->prepare("update petdetails set pet_img3='$petimage3' where pet_id='$petid'");
			
				$up_img3->execute();
			
			}
			if($_FILES['petimg4']['tmp_name']=="")
			{
				
			}
			else
			{
				$petimage4=$_FILES['petimg4']['name'];
			$pet_img4_temp=$_FILES['petimg4']['tmp_name'];												
			move_uploaded_file($pet_img4_temp,"petphotos/$petimage4");	
		
				$up_img4=$con->prepare("update petdetails set pet_img4='$petimage4' where pet_id='$petid'");
			
				$up_img4->execute();
			
			}
			
			$petfoods=$_POST['petfoods'];
			
			$query=$con->prepare("update petdetails set pet_name='$petname',pet_type='$pettype',pet_color='$petcolor',pet_Rate='$petrate',pet_keywords='$petkeyword',pet_features1='$petfeature1',pet_features2='$petfeature2',pet_foods='$petfoods' where pet_id='$petid'");
			
			if($query->execute())
			{
				echo"<script>alert('update pet details')</script>";
				 echo"<script>window.open('viewallpetdetails.php','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('not update pet details')</script>";
			
			}
			
			
			
			
		

		

		}
?>