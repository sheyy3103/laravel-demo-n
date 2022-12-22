<?php

use Illuminate\Support\Str;

function slug_format($str)
{
    return Str::slug($str);
}
