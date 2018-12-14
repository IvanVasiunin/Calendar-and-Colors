<?php 
	$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	$daysOfWeek = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calendar</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<div class="text">Select a month</div>
	<form action="/">
	<?php
		?>
		<div class="container">
			<?php
			for($i = 0; $i < 12; $i++)
			{
				?>
				<div class="monthContainer">
					<label for="<?php echo $months[$i]?>" > <?php echo $months[$i]?> </label>
					<input type="radio" id="<?php echo $months[$i]?>" name="month" value=<?php echo ($i+1)?>>
				</div>
				<?php
			}
			?>
		</div>
		<input type="submit" value="Show">
	</form>
	
	<?php
		if(!empty($_REQUEST))
		{
			$firstDay = mktime(0, 0, 0, $_REQUEST["month"],1,2018);
			$dayOfWeek = date("w", $firstDay);
			if($dayOfWeek == 0)
			{
				$dayOfWeek = 7;
			}
			$daysInMonth = date('t', $firstDay);
			$rowsCount = ceil(($daysInMonth - (7 - $dayOfWeek))/7 + 1);
			$counter = 1;
			?>
			
			<div class="currentMonth">Selected month: <?php echo $months[$_REQUEST["month"]-1]?> </div>
			<table>
				<?php
				for($i = 0; $i <= $rowsCount; $i++)
				{
					?>
					<tr>
					<?php
					for($j = 0; $j < 7; $j++)
					{
						if($i > 0 && $i < $rowsCount && ($j == 5 || $j == 6) && $j >= $dayOfWeek-1)
						{
							?>
							<th data-weekend="true"> <?php echo $counter ?> </th>
							<?php
							$counter++;
							continue;
						}
						if($i == 0)
						{
							?>
							<th> <?php echo $daysOfWeek[$j]?> </th>
							<?php
						}
						if($i == 1 && $j < $dayOfWeek-1)
						{
							?>
							<th></th>
							<?php
							continue;
						}
						else if($i == 1 && $j >= $dayOfWeek-1)
						{
						?>
							<th> <?php echo $counter ?> </th>
						<?php
							$counter++;
						}
						else if($i == $rowsCount && $counter == $daysInMonth+1)
						{
							break;
						}
						else if($i > 0)
						{
							?>
							<th> <?php echo $counter ?> </th>
							<?php
							$counter++;
						}
						
					}
					?>
					</tr>
				<?php
				}
				?>
			</table>

		<?php	
		}
	?>
</body>
</html>