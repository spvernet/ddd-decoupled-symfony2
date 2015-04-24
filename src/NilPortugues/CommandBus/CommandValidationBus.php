<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 8:35 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\CommandBus;

use NilPortugues\CommandBus\Abstraction\BaseCommandBus;
use NilPortugues\CommandBus\Abstraction\CommandBus;
use NilPortugues\CommandBus\Abstraction\CommandHandlerResolver;
use RuntimeException;

/**
 * Class CommandValidationBus
 * @package NilPortugues
 */
class CommandValidationBus extends BaseCommandBus
{
    /**
     * @param CommandHandlerResolver $resolver
     * @param array $handlers
     * @param CommandBus $next
     */
    public function __construct(CommandHandlerResolver $resolver, array $handlers, CommandBus $next)
    {
        $this->resolver = $resolver;
        $this->handlers = $handlers;
        $this->next = $next;
    }

    /**
     * @param $command
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public function handle($command)
    {
        try {
            $commandClass = get_class($command);
            $commandHandler = $this->resolver->get($this->handlers, $commandClass);

            if (true !== $commandHandler->handle($command)) {
                $this->errors = $commandHandler->getErrors();
                throw new RuntimeException(
                    sprintf('Error occurred in the %s when handling: %s', __CLASS__, $commandClass)
                );
            }

            return $this->next->handle($command);
        } catch (\Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
}
