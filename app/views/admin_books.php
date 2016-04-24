<?php
?>
<div><?= $add_book_form ?></div>
<br>
<div>

	<?php

	if(isset($all_books))
	{
		foreach ($all_books as $row)
		{
			echo "[" . $row->id_book . "] " . $row->book_name .' - '. $row->author . '';
			echo " <a href=\"index.php?url=admin_remove_book/remove/".$row->id_book."\">Smazat</a> <a href=\"index.php?url=admin_home/edit_book/".$row->id_book."\">Upravit</a><br />";
		}
	}

	if(isset($info))
	{
		echo $info;
	}

	?>

</div>
