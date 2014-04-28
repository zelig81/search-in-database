<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>Please choose table name 
        <select name="chosenTable">
            <?php
                foreach($tableNames as $table) {
                    echo '<option value="' . $table . '">' . $table . '</option>';
                }
            ?>
        </select>
    </p>
    <table>
        <thead>
            <tr>
                <th>and please choose action You want to make on it</th>
            </tr>
        </thead>
        <tbody>
            <?php
                switch ($access) {
                case 'edit':
                    echo '<tr><td><input type="radio" name="rt" value="ChangeStructure">You can change structure of chosen table</td></tr>';
                    echo '<tr><td><input type="radio" name="rt" value="EditEntry">You can edit entries of chosen table</td></tr>';
                case 'add':
                    echo '<tr><td><input type="radio" name="rt" value="AddEntry">You can add record to chosen table</td></tr>';
                case 'read':
                    echo '<tr><td><input type="radio" name="rt" value="Search" checked>You can search in chosen table</td></tr>';
                }
            ?>
        </tbody>
        <tfoot>
            <tr><td><input type="submit" value="Submit"></td></tr>
        </tfoot>
    </table>
</form>
