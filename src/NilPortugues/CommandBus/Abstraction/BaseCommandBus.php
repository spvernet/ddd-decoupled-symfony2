<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 10:22 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\CommandBus\Abstraction;

/**
 * Class BaseCommandBus
 * @package NilPortugues\CommandBus
 */
abstract class BaseCommandBus implements CommandBus
{
    /**
     * @var array
     */
    protected $handlers = [];

    /**
     * @var CommandBus
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
