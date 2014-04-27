<link rel="stylesheet" href="css/table.css">
<script type="text/javascript">
	$(document).ready(function(){
		$('#all').on('change', function(){
			$('.checkbox').prop('checked', $(this).prop('checked'));
			hide_show($(this).prop('checked'));
		});
				
		$('.checkbox').on('change', function(){
			if ($(this).prop('checked'))
				hide_show($(this).prop('checked'));
			if ($( ".checkbox:checked" ).length == 0)
				hide_show(false);
		});
	});
			
	function hide_show(status){
		if (status) {
			$('#submit').show();
			$('#errorMessage').html('');
		}
		else {
			$('#submit').hide();
			$('#errorMessage').html("Please choose at least one column for search and display");
		}
	}
			
			

</script>

<?php
    foreach($tableNames as $table) {
        echo '<br><p>' . $table . '</p>';

    }
?>
<form action="index.php" method="post" accept-charset="UTF-8">
	<table>
		<thead>
			<tr>
				<th>Column name</th>
				<th>Type your search here</th>
				<th>Choose which columns you wish to see in result</th>
			<td>
		</thead>
		<tbody>
			<tr>
				<td>column 1</td>
				<td><input name="searchedColumn" type="text"></td>
				<td><input class="checkbox" name="columnCheck" value="1" type="checkbox"  checked="checked"></td>
			</tr>
			<tr>
				<td>column 2</td>
				<td><input name="searchedColumn" type="text"></td>
				<td><input class="checkbox" name="columnCheck" value="2" type="checkbox"  checked="checked"></td>
			</tr>
			<tr>
				<td>column 3</td>
				<td><input name="searchedColumn" type="text"></td>
				<td><input class="checkbox" name="columnCheck" value="3" type="checkbox"  checked="checked"></td>
			</tr>
		</c:forEach>
		</tbody>
		<tfoot>
			<tr>
				<td id="errorMessage" style="color:red"></td>
				<td><input id="submit" type="submit" value="Submit"></td>
				<td><input id="all" type="checkbox"  checked="checked">Check/uncheck all check boxes</td>
			</tr>
		</tfoot>
	</table>
</form>
