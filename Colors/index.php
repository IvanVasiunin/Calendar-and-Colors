<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Color</title>
</head>
<body>
	<div>Введите значения от 0 до 255</div>
	<form action="/" method="post">
		<input type="text" name="red">
		<input type="text" name="green">
		<input type="text" name="blue">
		<input type="submit">
	</form>


<?php
	if(!empty($_REQUEST))
	{
		$data = [];
		foreach ($_REQUEST as $key => $value) {
			if($value=="")
			{
				$value = 0;
			}
			if($value > 255)
			{
				$value = 255;
			}
			if($value < 0)
			{
				$value = 0;
			}
			$data[$key] = $value;
		}
		?>

	<span style='background: 
		rgb(<?php echo $data['red'] ?>,<?php echo $data['green'] ?>,<?php echo $data['blue'] ?>);
		color:
		rgb(<?php echo rand(0,255) ?>,<?php echo rand(0,255) ?>,<?php echo rand(0,255) ?>);'>
		Текст, у которого меняется цвет фона
	</span>

	<?php
	}
?>
	
</body>
</html>

