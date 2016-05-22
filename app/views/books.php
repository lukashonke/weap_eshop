<?php
?>

<div>

	<?php

	echo "<h2>" . \libs\Categories::getCategoryname($categoryId) . "</h2>";

	if(isset($all_books))
	{
		foreach ($all_books as $row)
		{
			echo "<article class=\"shopItem\">";
        	echo "<div><a href=\"index.php?url=viewbook/id/" . $row->id_book . "\"><img src=\"images/book_thumb.jpg\" class=\"img-responsive\" width=\"200\" height=\"200\" alt=\"\"/></a></div>";
        	echo "<a href=\"index.php?url=viewbook/id/" . $row->id_book . "\"><p class=\"itemName\">" . $row->book_name . "</p></a>";
        	echo "<p class=\"itemPrice\">" . $row->price . " kc</p>";
			echo "</article>";
		}
	}

	if(isset($info))
	{
		echo $info;
	}

	?>

</div>


</nav>
