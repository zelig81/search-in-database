<?php
    echo '<h2>' . $welcome . '</h2>';
?>
<form action="index.php" method="post">
    <input type="radio" name ="rt" value="Index" checked> index option<br>
    <input type="radio" name="rt" value="Test"> test option<br>
    <input type="hidden" name="checkAccess" value="">
    <input type="submit" value="Submit">
</form>
