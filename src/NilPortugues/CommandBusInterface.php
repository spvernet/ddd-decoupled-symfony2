<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 10:20 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues;

/**
 * Class CommandBusInterface
 * @package NilPortugues
 */
interface CommandBusInterface
{
    /**
     * @param                     $container
     * @param array               $handlers
     * @param CommandBusInterface $next
     */
    public function __construct($container, array $handlers, CommandBusInterface $next = null);

    /**
     * @param $command
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public function handle($command);

    /**
     * @return array
     */
    public function getErrors();
}
