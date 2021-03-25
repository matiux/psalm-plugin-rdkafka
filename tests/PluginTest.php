<?php

namespace Matiux\PsalmPluginRdKafka\Tests;

use SimpleXMLElement;
use Matiux\PsalmPluginRdKafka\Plugin;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psalm\Plugin\RegistrationInterface;

class PluginTest extends TestCase
{
    /**
     * @var RegistrationInterface
     */
    private $registration;

    public function setUp(): void
    {
        $this->registration = \Mockery::spy(RegistrationInterface::class);
    }

    /**
     * @test
     * @return void
     */
    public function hasEntryPoint()
    {
        $this->expectNotToPerformAssertions();
        $plugin = new Plugin();
        $plugin($this->registration, null);
        $this->registration->shouldHaveReceived('addStubFile')->with(\Mockery::type('string'));
    }

    /**
     * @test
     * @return void
     */
    public function acceptsConfig()
    {
        $this->expectNotToPerformAssertions();
        $plugin = new Plugin();
        $plugin($this->registration, new SimpleXMLElement('<myConfig></myConfig>'));
        $this->registration->shouldHaveReceived('addStubFile')->with(\Mockery::type('string'));
    }
}
