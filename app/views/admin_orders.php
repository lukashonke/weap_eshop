<?php
?>
<div><?= $add_order_form ?></div>
<br>
<div>

	<?php

	/*foreach ($allbooks as $row)
	{
		echo $row->book_name .' - '. $row->author . '';
		echo " <a href=\"index.php?url=admin_remove_user/remove/".$row->id_book."\">Smazat</a><br />";
	}*/

	foreach($all_orders as $row)
	{
		echo "Order ID [" . $row->id_order . '] from user [' . $row->id_user . '] ' . $row->user_name . " book [" . $row->id_book . "] " . $row->book_name . " (" . $row->order_date . ")" ;
		echo " <a href=\"index.php?url=admin_remove_order/remove/" .$row->id_order. "\">Smazat</a><br />";
	}

	?>

</div>
