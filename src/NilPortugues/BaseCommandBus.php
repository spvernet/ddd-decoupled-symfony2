<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 10:22 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues;

use RuntimeException;

/**
 * Class BaseCommandBus
 * @package NilPortugues
 */
abstract class BaseCommandBus implements CommandBusInterface
{
    /**
     * @var array
     */
    protected $handlers = [];

    /**
     * @var CommandBusInterface
     */
    protected $next;

    /**
     * @var CommandHandlerResolver
     */
    protected $resolver;

    /**
     * @var array
     */
    protected $errors = [];


    /**
     * @return array
     */
    public function getErrors()
    {
        return array_merge($this->errors, (null !== $this->next) ? $this->next->getErrors() : []);
    }
}
