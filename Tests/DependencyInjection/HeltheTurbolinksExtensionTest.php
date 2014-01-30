<?php

namespace Helthe\Bundle\TurbolinksBundle\Tests\DependencyInjection;

use Helthe\Bundle\TurbolinksBundle\DependencyInjection\HeltheTurbolinksExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HeltheTurbolinksExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadDefault()
    {
        $container = new ContainerBuilder();
        $loader = new HeltheTurbolinksExtension();
        $loader->load(array(array()), $container);

        // Turbolinks Service
        $this->assertTrue($container->hasParameter('helthe_turbolinks.turbolinks.class'));
        $this->assertTrue($container->hasDefinition('helthe_turbolinks.turbolinks'));

        // Turbolinks Listener Service
        $this->assertTrue($container->hasParameter('helthe_turbolinks.listener.turbolinks.class'));
        $this->assertTrue($container->hasDefinition('helthe_turbolinks.listener.turbolinks'));
        $this->assertTrue($container->getDefinition('helthe_turbolinks.listener.turbolinks')->hasTag('kernel.event_subscriber'));
    }
}