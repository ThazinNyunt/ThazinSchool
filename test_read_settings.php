<?php

$settings = parse_ini_file("settings.ini");
print_r($settings);
?>

<h1>User: <?php echo $settings['user']; ?></h1>