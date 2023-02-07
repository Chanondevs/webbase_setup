<?php
require_once __DIR__ . '/../vendor/autoload.php';
$openai = \OpenApi\Generator::scan(['/../controllers']);
header('Content-Type: application/x-yaml');
echo $openai->toYaml();
?>