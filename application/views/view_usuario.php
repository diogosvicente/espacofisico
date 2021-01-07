<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($css_files as $file):
	$file_new_path = str_replace("index.php/", "",$file);
?>

<link type="text/css" rel="stylesheet" href="<?= $file_new_path; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): 
$file_new_path = str_replace("index.php/", "",$file);
?>
<script src="<?= $file_new_path; ?>"></script>
<?php endforeach; ?>
 
<?= $output; ?>