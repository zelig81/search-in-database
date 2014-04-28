<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <input type="hidden" name="rt" value="Index">
    <input type="hidden" name="action" value="logoff">
    <p>You logged on as [<?php  echo $user;?>]. Do You want to <input type='submit' value='logoff'>?</p>
</form>

