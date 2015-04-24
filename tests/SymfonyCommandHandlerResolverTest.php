<?php

namespace NilPortugues\Test;

use NilPortugues\SymfonyCommandHandlerResolver;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class SymfonyCommandHandlerResolverTest
 * @package NilPortugues\Test
 */
class SymfonyCommandHandlerResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SymfonyCommandHandlerResolver
     */
    private $resolver;

    /**
     * @var array
     */
    private $handlers = [
        'dummyCommand' => 'std_class'
    ];

    /**
     *
     */
    public function setUp()
    {
        $this->resolver = new SymfonyCommandHandlerResolver($this->getServiceContainerMock());
    }

    /**
     * @return ContainerInterface
     */
    private function getServiceContainerMock()
    {
        $serviceContainer = $this
            ->getMockBuilder(ContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $serviceContainer
            ->expects($this->any())
            ->method('get')
            ->willReturn(new \stdClass);

        return $serviceContainer;
    }

    /**
     *
     */
    public function testItShouldResolveCommandToCommandHandler()
    {
        $commandHandler = $this->resolver->get($this->handlers, 'dummyCommand');
        $this->assertInstanceOf('stdClass', $commandHandler);
    }

    /**
     *
     */
    public function testItThrowsRuntimeExceptionWhenCommandHandlerNotMapped()
    {
        $this->setExpectedException('RuntimeException');
        $this->resolver->get($this->handlers, 'undefinedCommand');
    }
}
