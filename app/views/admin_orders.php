<?php
?>

<br>
<div>

	<?php

	/*foreach ($allbooks as $row)
	{
		echo $row->book_name .' - '. $row->author . '';
		echo " <a href=\"index.php?url=admin_remove_user/remove/".$row->id_book."\">Smazat</a><br />";
	}*/

	if(isset($all_orders))
	{
		$currentId = -1;
		foreach($all_orders as $row)
		{
			$orderId = $row->id_order;

			if($currentId != $orderId)
			{
				$currentId = $orderId;
				echo "<h4>" . ($row->solved == 1 ? "[VYRIZENO]" : "") . "Order ID " . $orderId . " from " . $row->username . "(". $row->id_user . "), datum " . $row->order_date . "</h4>";
				
				echo "<a href=\"index.php?url=admin_remove_order/solve/" .$row->id_order. "\">Vyrizeno</a> <a href=\"index.php?url=admin_remove_order/remove/" .$row->id_order. "\">Smazat</a>";
			}

			echo "<p>Book [" . $row->id_book . "] " . $row->book_name . "" ;
			echo " </p>";
		}
	}

	if(isset($info))
	{
		echo $info;
	}

	?>

</div>
