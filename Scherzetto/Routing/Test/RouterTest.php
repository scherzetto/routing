<?php

declare(strict_types=1);

namespace Scherzetto\Routing\Test;

use PHPUnit\Framework\TestCase;
use Scherzetto\Http\Request;
use Scherzetto\Routing\RouteLoader;
use Scherzetto\Routing\Router;
use Scherzetto\Routing\UrlMatcher;
use PHPUnit\Framework\MockObject\MockObject;

class RouterTest extends TestCase
{
    public function testMatcherIsCalled()
    {
        /** @var UrlMatcher&MockObject $matcher */
        $matcher = $this
            ->getMockBuilder(UrlMatcher::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->setMethods(['match'])
            ->getMock();
        /** @var RouteLoader&MockObject $loader */
        $loader = $this
            ->getMockBuilder(RouteLoader::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $router = new Router($loader, $matcher);

        $matcher->expects($this->once())->method('match');

        $router->route(new Request());
    }
}
