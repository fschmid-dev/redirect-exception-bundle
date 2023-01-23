<?php

namespace FSchmidDev\RedirectExceptionBundle\Exception;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

class RedirectException extends \Exception
{
    public function __construct(
        private RedirectResponse $redirectResponse,
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getRedirectResponse(): RedirectResponse
    {
        return $this->redirectResponse;
    }
}