//Code for Text Over Image Adding
<html>
	<head><title>Image Write</title></head>
		<form action="" method="POST">
		File Name: <input type="text" name="flname" placeholder="Enter (.jpg)Filename with Extension"><br>
		X-Coordinate: <input type="text" placeholder="Enter X Cordinate" name="xcord"><br>
		Y-Coordibate: <input type="text" placeholder="Enter Y Cordinate" name="ycord"><br>
		Diplaying Text: <input type="text" placeholder="Enter Text" name="text"><br>
		<input type="submit" name="sbmit">
		</form>
</html>

<?php
	//Set the Content Type
	header('Content-type', 'image/jpeg');   
	$flnm='a.jpg'; //Assume some Default File needs to give at time of run
	$op='op.jpg';
	$x=0;
	$y=0;
	$Text='';
	$a="\n initial Image Is: \n";
	if(isset($_POST['sbmit']))
	{
		$flnm=(string)$_POST['flname'];
		$x=$_POST['xcord'];
		$y=$_POST['ycord'];
		$Text=$_POST['text'];
		echo $flnm;
		echo $x;echo $y;echo $Text;
		$a="\n Image After Text Adding: \n";
	}

	// Load And Create Image From Source
	$our_image = imagecreatefromjpeg($flnm); //imagecreatefromjpeg($flnm); 
	//for png Image imagecreatefromjpeg($flnm);
	//for gif Image imagecreatefromgif($flnm);
	//for sample colour images $our_image=imagecreatetruecolor(600,600);

	// Allocate A Color For The Text Enter RGB Value
	$white_color = imagecolorallocate($our_image, 255, 0, 255);

	// Set Path to Font File    //Download Font From https://www.freefontspro.com/14454/arial.ttf place in corresponding file location
	$font_path = 'arial.TTF';

	// Set font Size and Angle to display Text on Image

	$size=30;
	$angle=0;
		
	// Print Text On Image
	if(imagettftext($our_image, $size,$angle,$x,$y, $white_color, $font_path, $Text))

	// Saving Image and Send to Browser
	imagejpeg($our_image,$op);

	// Clear Memory

	imagedestroy($our_image);
?>
<?php echo $a; ?>
<img src="<?php echo $op; ?>"/>
