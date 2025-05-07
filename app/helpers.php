<?php
function logToTerminal($content)
{
    file_put_contents("php://stdout", json_encode($content) . PHP_EOL);
}