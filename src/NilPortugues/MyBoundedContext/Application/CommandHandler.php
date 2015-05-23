<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 5/23/15
 * Time: 11:49 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application;

use NilPortugues\CommandBus\CommandHandler as CommandHandlerInterface;

/**
 * Class CommandHandler
 * @package NilPortugues\MyBoundedContext\Application
 */
abstract class CommandHandler implements CommandHandlerInterface
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var mixed
     */
    protected $result;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Returns an array containing error messages.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
} 