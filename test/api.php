<?php

require_once __DIR__ . '/../vendor/autoload.php';
$openai = \OpenApi\Generator::scan(['/part/to/project']);
header('Content-Type: application/x-yaml');
echo $openai->toYaml();
?>