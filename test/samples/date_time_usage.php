<?php

function any_function_or_method()
{
    DateTime::createFromFormat('Y-m-d');
    $object instanceof DateTime;
    $object instanceof \DateTime;

    return new DateTime();
}

/**
 * @SuppressWarnings(ForbiddenDateTime)
 */
function allowed_usage()
{
    return new DateTime();
}
