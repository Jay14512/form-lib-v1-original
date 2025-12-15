<?php
error_reporting(E_ALL & ~E_DEPRECATED);
require_once 'vendor/autoload.php';

// Konfiguration aller Inputs
$formConfig = [
	'username' => [
		'name' => 'username',
		'type' => 'text',
		'id' => 'myUserName',
		'label' => 'Username'
	],
	'email' => [
		'name' => 'email',
		'type' => 'email',
		'id' => 'myEmail',
		'label' => 'E-Mail'
	],
	'password' => [
		'name' => 'password',
		'type' => 'password',
		'id' => 'myPassword',
		'label' => 'Password'
	],
	'date' => [
		'name' => 'date',
		'type' => 'date',
		'id' => 'myDate',
		'label' => 'Date'
	],
	'message' => [
		'name' => 'message',
		'type' => 'textarea',
		'id' => 'myMessage',
		'label' => 'Message',
		'cols' => 30,
		'rows' => 5
	],
	'country' => [
		'name' => 'country',
		'type' => 'select',
		'id' => 'country',
		'label' => 'Country',
		'options' => ['Austria', 'Sweden', 'Germany', 'Italy', 'Canada']
	],
	'gender' => [
		'name' => 'gender',
		'type' => 'radio',
		'id' => 'gender',
		'label' => 'Gender',
		'genders' => ['Male', 'Female', 'Diverse']
	],
	'privacy' => [
		'name' => 'privacy',
		'type' => 'checkbox',
		'id' => 'privacy',
		'label' => 'I agree to the general terms and conditions.'
	],
	'submit' => [
		'name' => 'submit',
		'type' => 'submit',
		'id' => 'mySubmit',
		'label' => 'Send'
	]
];

// Alle Formularfelder werden in $fields gespeichert
$fields = [];

foreach ($formConfig as $key => $conf) {
	switch ($conf['type']) {
		case 'submit':
			$fields[$key] = new FormLib\Submit(
				$conf['name'],
				$conf['id'],
				$conf['label'],
				$conf['type']
			);
			break;
		case 'textarea':
			$fields[$key] = new FormLib\Textarea(
				$conf['name'],
				$conf['id'],
				$conf['label'],
				$conf['type'],
				$conf['cols'],
				$conf['rows'],
			);
			break;
		case 'select':
			$fields[$key] = new FormLib\Select(
				$conf['name'],
				$conf['id'],
				$conf['label'],
				$conf['options'],
			);
			break;
		case 'checkbox':
			$fields[$key] = new FormLib\Checkbox(
				$conf['name'],
				$conf['id'],
				$conf['label'],
			);
			break;
		case 'radio':
			$fields[$key] = new FormLib\Radiobutton(
				$conf['name'],
				$conf['id'],
				$conf['label'],
				$conf['genders'],
			);
			break;
		default:
			$fields[$key] = new FormLib\Input(
				$conf['name'],
				$conf['id'],
				$conf['label'],
				$conf['type']
			);
			break;
	}
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$validator = new FormLib\Validation($_POST);

	$validator->required('email');
	$validator->email('email');

	$validator->required('username');
	$validator->required('password');
	$validator->required('country');
	$validator->required('gender');
	$validator->required('privacy');

	if ($validator->hasErrors()) {
		$errors = $validator->getErrors();
	}
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Input Test</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
</head>

<body>
	<div class="container mt-5">
		<h1>Input Test</h1>
		<form action="" method="post">
			<?php if (!empty($errors)): ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach ($errors as $error): ?>
							<li><?= htmlspecialchars($error) ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>


			<?php foreach ($fields as $field): ?>
				<div class="mb-3">
					<?= $field->render(); ?>
				</div>
			<?php endforeach; ?>

		</form>
	</div>
</body>

</html>