<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 8:35 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues;

use RuntimeException;

/**
 * Class CommandBus
 * @package NilPortugues
 */
class CommandBus extends BaseCommandBus
{
    /**
     * @param                     $container
     * @param array               $handlers
     * @param CommandBusInterface $next
     */
    public function __construct($container, array $handlers, CommandBusInterface $next = null)
    {
        $this->service  = $container;
        $this->handlers = $handlers;
        $this->next     = $next;
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
        $this->commandMappedToCommandHandlerGuard($commandClass);

        try {
            return $this->service->get($this->handlers[$commandClass])->handle($command);
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            throw new RuntimeException(
                sprintf('Error occurred in the %s when handling: %s', __CLASS__, $commandClass)
            );
        }
    }
}
