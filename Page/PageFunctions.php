<?php 
	function makeMenu(){
	 echo 			'</ul>
		</form>
	</div>';
	 
	 
	 echo '<div class=menu id="floatdiv">
				<table class="menu">
					<tr class="menu">
						<td><span class="menudata">Item Number</span></td>
						<td class="menuIndex" onclick="expandEl(\'menudata\', 60)">1</td>
					</tr>
					<tr class="menu">
						<td><span class="menudata">Item Number</span></td>
						<td class="menuIndex" onclick="expandEl(\'menudata\', 60)">2</td>
					</tr>
					<tr class="menu">
						<td><span class="menudata">Item Number</span></td>
						<td class="menuIndex" onclick="expandEl(\'menudata\', 60)">3</td>
					</tr>
					<tr class="menu">
						<td><span class="menudata">Item Number</span></td>
						<td class="menuIndex" onclick="expandEl(\'menudata\', 60)">4</td>
					</tr>
				</table>
	</div>
	<script type="text/javascript">
	expandEl(\'menudata\', 60);
	</script>
	';
	 
	 echo '</body>

<script type="text/javascript">
	JSFX_FloatDiv("floatdiv", 80,30,"container").floatIt();
</script>
</html>';
	}
	
?>


<?php 


?>

<?php 

	
	
	
	
	
?>