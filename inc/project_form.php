<?php

	$form = '
			<div class="project-form">
				<form method="get" action="' . $_SERVER['REQUEST_URI'] .'">
					<input class="project-form-input" type="number" name="project" placeholder="&#128269; Go to an Asana project">
					<input class="project-form-button" type="submit" value="Get Project list">
				</form>
				<div class="proejct-form-hint">
					<p><em>Hint: 854291251040965 </em></p>
				</div>
			</div>';

?>