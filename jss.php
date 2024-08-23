<?php

function jss_parse_file(string $file_name) : void
{
    $file = fopen($file_name, "r");
    if ($file === false) 
    {
        die("Failed to open file\n");
    }

    $json_data = NULL;
    $val = NULL;

    try 
    {
        while ($line = fgets($file, 1024)) 
        {
            if (strchr($line, '#')) continue;
            if (strstr($line, "END")) break;

            if (strstr($line, "FILE") !== false)
            {
                preg_match_all('/"([^"]*)"/', $line, $matches);
                if (isset($matches[1][0])) 
                {
                    $data_buffer = file_get_contents($matches[1][0]);
                    $json_data = json_decode($data_buffer, true);
                }
                else 
                {
                    die("No json file found\n"); 
                }
            }

            if (strstr($line, "GET") !== false) 
            {
                preg_match_all('/"([^"]*)"/', $line, $matches);
                $key = $matches[1][0];

                if (isset($key))
                {
                    $val = $json_data[$key];
                }
                else 
                {
                    die("Key not found\n");
                }
            }

            if (strstr($line, "PRINT") !== false) 
            {
                echo $val . "\n";
            }
        }
    }
    finally 
    {
        fclose($file); 
    }
}

if ($GLOBALS["argc"] < 2) 
{
    die("Usage: php jss.php [file_name]\n");
}

jss_parse_file($GLOBALS["argv"][1]);