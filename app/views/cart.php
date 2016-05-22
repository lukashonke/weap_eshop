<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 22:10
 */

?>
<?php

if(isset($all_books))
{
    $pocet = 0;

    echo "Vas kosik obsahuje:<br>";

    echo "<div>";

    foreach ($all_books as $row)
    {
        $pocet++;
        echo "<article class=\"shopItem\">";
        echo "<div><img src=\"images/book_thumb.jpg\" class=\"img-responsive\" width=\"200\" height=\"200\" alt=\"\"/></div>";
        echo "" . $row->book_name . "";
        echo "<p class=\"itemPrice\">" . $row->price . " kc</p>";
        echo "<a href=\"index.php?url=viewbook/remove/" . $row->id_book . "\"><p class=\"itemName\">Remove</p></a>";
        echo "</article>";
    }

    echo "</div>";

    if($pocet == 0)
    {
        echo "Kosik je prazdny.";
    }
    else
    {
        echo "<br><div class=\"newline\"><a class=\"btn btn-default\" href=\"index.php?url=cart/order\" role=\"button\">Send Order</a></div>";
    }
}



if(isset($info))
{
    echo $info;
}

?>
