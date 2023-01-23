<?php

namespace FSchmidDev\RedirectExceptionBundle\EventSubscriber;

use FSchmidDev\RedirectExceptionBundle\Exception\RedirectException;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    #[ArrayShape([KernelEvents::EXCEPTION => "string"])]
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'handleRedirectException'
        ];
    }

    public function handleRedirectException(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();
        if ($throwable instanceof RedirectException) {
            $event->setResponse($throwable->getRedirectResponse());
        }
    }
}