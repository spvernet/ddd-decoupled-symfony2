<?php

namespace NilPortugues;

/**
 * Class CommandHandlerResolver
 * @package NilPortugues
 */
interface CommandHandlerResolver
{
    /**
     * @param array $handlers
     * @param $commandClass
     * @return mixed
     */
    public function get(array &$handlers, $commandClass);
}
