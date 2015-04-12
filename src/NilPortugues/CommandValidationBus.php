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
 * Class CommandValidationBus
 * @package NilPortugues
 */
class CommandValidationBus extends BaseCommandBus
{
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
        $commandHandler = $this->service->get($this->handlers[$commandClass]);


        if (false === $commandHandler->handle($command)) {
            $this->errors = $commandHandler->getErrors();

            throw new RuntimeException(
                sprintf('Error occurred in the %s when handling: %s', __CLASS__, $command)
            );
        }

        return $this->next->handle($command);
    }
}
