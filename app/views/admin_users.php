<?php
?>
<div><?= $add_user_form ?></div>
<br>
<div>

	<?php

	/*foreach ($allbooks as $row)
	{
		echo $row->book_name .' - '. $row->author . '';
		echo " <a href=\"index.php?url=admin_remove_user/remove/".$row->id_book."\">Smazat</a><br />";
	}*/

	foreach($all_users as $row)
	{
		echo "[" . $row->id . "] " . $row->user_name . ' ' . $row->lastname . ' - ' . $row->email;
		echo " <a href=\"index.php?url=admin_remove_user/remove/" .$row->id. "\">Smazat</a><br />";
	}

	?>

</div>
