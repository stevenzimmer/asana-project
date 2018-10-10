<?php


include('inc/get_project_list.php');
include('inc/project_form.php');

$project_name = ( $project_id ? $project_tasks[0]['projects'][0]['name'] . ' project tasks' : 'Enter your project ID');

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $project_name; ?></title>
	<link rel="icon" type="image/png" href="img/favicon.png">
	<link rel="stylesheet" type="text/css" href="/prod/css/main.min.css">

</head>
<body>

<div class="task-list">
	<div class="task-list-header">
		<h1><?php echo $project_name; ?></h1>
	</div>

<?php


	if ( $project_id ) :

		foreach ( $project_tasks as $project_task ) :

			$project_task_id = $project_task['id'];
			$project_complete = $project_task['completed'] ? 'complete' : '';

			$task_url = 'https://app.asana.com/0/' . $project_id . '/' . $project_task_id;

			$task = '<div class="' . $project_complete . ' task-list-item">

						<div class="task-list-item-icon">
							<div class="task-list-item-icon-wrapper dash">
								<span>&#8211;</span>
								<div class="tooltip"></div>
							</div>

						</div>

						<div class="task-list-item-icon">
							<div class="task-list-item-icon-wrapper check" data-task-id="' . $project_task['id'] . '">
								<span>&#10003;</span>
								<div class="tooltip"></div>
							</div>
						</div>

						<div class="task-list-item-name">
							<a href="' . $task_url . '">' . $project_task['name'] . '</a>
						</div>


					</div>';

			echo $task;

  		endforeach;

	endif;
	echo $form;
?>
</div>
<script type="text/javascript" src="/prod/js/main.min.js"></script>
</body>
</html>