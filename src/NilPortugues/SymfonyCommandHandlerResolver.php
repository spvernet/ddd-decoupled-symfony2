<?php

namespace NilPortugues;

use NilPortugues\CommandBus\CommandHandlerResolver;
use RuntimeException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class SymfonyCommandHandlerResolver
 * @package NilPortugues
 */
class SymfonyCommandHandlerResolver implements CommandHandlerResolver
{
    /**
     * @var ContainerInterface
     */
    protected $service;

    /**
     * @param ContainerInterface $service
     */
    public function __construct(ContainerInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param array $handlers
     * @param       $commandClass
     * @param       $parentClass
     *
     * @return mixed|object
     */
    public function get(array &$handlers, $commandClass, $parentClass)
    {
        $commandClassKey = $this->resolveCommandName($commandClass);
        $this->commandMappedToCommandHandlerGuard($handlers, $commandClass, $commandClassKey, $parentClass);

        return $this->service->get($handlers[$commandClassKey], true);
    }


    /**
     * @param array $handlers
     * @param       $commandClass
     * @param       $commandClassKey
     * @param       $parent
     *
     * @throws \RuntimeException
     */
    protected function commandMappedToCommandHandlerGuard(array &$handlers, $commandClass, $commandClassKey, $parent)
    {
        if (false === array_key_exists($commandClassKey, $handlers)) {
            throw new RuntimeException(
                sprintf('%s has no Command Handler assigned in %s.', $commandClass, $parent)
            );
        }
    }

    /**
     * @param $commandClass
     * @return mixed
     */
    protected function resolveCommandName($commandClass)
    {
        return str_replace('\\', '_', $commandClass);
    }
}
