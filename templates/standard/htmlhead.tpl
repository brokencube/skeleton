<!DOCTYPE html>
<html lang="en">
<head>
    <title>{$title|escape}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="en-gb" />

{if $display.meta}
    <!-- Custom Meta -->
{foreach $config.meta as $metaname => $metacontent}
    <meta {if $metaname|substr:0:2 == 'p:'}property="{$metaname|substr:2}"{else}name="{$metaname}"{/if} content="{$metacontent}">
{/foreach}
{/if}

    <!-- Stylesheets -->
{foreach from=$config.css item=css}
    <link rel="stylesheet" type="text/css" href="{$css}?v={$config.version}" />    
{/foreach}
{foreach from=$config.lesscss item=less}
    <link rel="stylesheet/less" type="text/less" href="{$less}?v={$config.version}" />    
{/foreach}

    <!-- Local JS libraries -->
{foreach from=$config.js item=js}
    <script type="text/javascript" src="{$js}?v={$config.version}"></script>
{/foreach}
</head>
<body>

