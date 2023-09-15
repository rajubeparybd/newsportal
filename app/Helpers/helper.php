<?php

function permissionToWords(string $permission): string
{
    return ucwords(str_replace("_", " ", $permission));
}

function wordsToPermission(string $words): array|string
{
    return str_replace(" ", "_", strtolower($words));
}

function roleToWords(string $role): string
{
    return ucwords(str_replace("-", " ", $role));
}

function wordsToRole(string $words): array|string
{
    return str_replace(" ", "-", strtolower($words));
}
