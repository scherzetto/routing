<?php

declare(strict_types=1);

namespace Scherzetto\Routing\Test;

use PHPUnit\Framework\TestCase;
use Scherzetto\Routing\RouteCollection;
use Scherzetto\Routing\RouteLoader;

class RouteLoaderTest extends TestCase
{
    public function testLoadRoutesLoadsWithArg()
    {
        $loader = new RouteLoader('./Scherzetto/Routing/Test/fixtures/routing.yml');
        $collection = $loader->loadRoutes();

        $this->assertInstanceOf(RouteCollection::class, $collection);
        $this->assertEquals(3, $collection->count());
    }
}
