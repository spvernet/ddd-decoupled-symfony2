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
use NilPortugues\CommandBus\Abstraction\CommandBus as AbstractCommandBus;
use NilPortugues\CommandBus\Abstraction\CommandHandlerResolver;
use RuntimeException;

/**
 * Class CommandBus
 * @package NilPortugues\CommandBus
 */
class CommandBus extends BaseCommandBus
{
    /**
     * @param CommandHandlerResolver $resolver
     * @param array $handlers
     * @param AbstractCommandBus $next
     */
    public function __construct(CommandHandlerResolver $resolver, array $handlers, AbstractCommandBus $next = null)
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
        $response = null;
        $commandClass = get_class($command);

        try {
            $commandHandler = $this->resolver->get($this->handlers, $commandClass);
            return $commandHandler->handle($command);
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            throw new RuntimeException(
                sprintf('Error occurred in the %s when handling: %s', __CLASS__, $commandClass)
            );
        }
    }
}
