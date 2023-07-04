<?php

function permissionToWords(string $permission)
{
    return ucwords(str_replace("_", " ", $permission));
}

function wordsToPermission(string $words)
{
    return str_replace(" ", "_", strtolower($words));
}
