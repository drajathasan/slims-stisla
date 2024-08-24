<?php

if (!function_exists('stislaUrl'))
{
    function stislaUrl(string $additionalUrl = '')
    {
        return STISLA_URL . $additionalUrl;
    }
}

if (!function_exists('stislaAssetUrl'))
{
    function stislaAssetUrl(string $additionalUrl = '')
    {
        return stislaUrl('assets/' . $additionalUrl);
    }
}

if (!function_exists('stislaComponents'))
{
    function stislaComponent(string $additionalPath = '')
    {
        if (!empty($additionalPath)) $additionalPath = basename($additionalPath) . '.php';
        return STISLA_TEMPLATE . 'stisla' . DS . 'components' . DS . $additionalPath;
    }
}