<?php

declare(strict_types=1);



namespace PapsAPILib;

use PapsAPILib\Http\HttpRequest;

/**
 * Interface for defining the behavior of Authentication Classes.
 */
interface AuthManagerInterface
{
    /**
     * Adds authentication to the given HttpRequest.
     */
    public function apply(HttpRequest $httpRequest);
}
