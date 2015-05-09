<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 5/8/15
 * Time: 9:47 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Test\MyBoundedContextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\Client
     */
    private $client;

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    /**
     *
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->client = null;
    }

    /**
     * \NilPortugues\MyBoundedContextBundle\Controller\UserController::ViewUser
     */
    public function testViewUserReturnsFound()
    {
        $this->client->request('GET', '/user/1e58fe7d-cfbb-4fa7-b919-7a0ccd940e7d');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    /**
     * \NilPortugues\MyBoundedContextBundle\Controller\UserController::ViewUser
     */
    public function testViewUserReturnsNotFoundWhenBlogIdIsInvalid()
    {
        $this->client->request('GET', '/user/1');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }

    /**
     * \NilPortugues\MyBoundedContextBundle\Controller\UserController::ViewUser
     */
    public function testViewUserReturnsNotFoundWhenBlogIdNotFoundInRepository()
    {
        $this->client->request('GET', '/user/00000000-0000-0000-0000-000000000000');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }
}
