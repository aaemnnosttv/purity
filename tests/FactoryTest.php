<?php

class FactoryTest extends \PHPUnit\Framework\TestCase
{
    use FactoryHelper;

    /** @test */
    function the_file_returns_a_new_instance()
    {
        $factory = $this->getFactory();

        $this->assertTrue((new ReflectionClass($factory))->isAnonymous());
    }

    /** @test */
    function factory_properties_return_components()
    {
        $factory = $this->getFactory();

        $this->assertInstanceOf(Closure::class, $factory->each);
    }

    /** @test */
    function factory_retrieved_instances_are_unique()
    {
        $factory = $this->getFactory();

        $this->assertNotSame($factory->each, $factory->each);
    }

}
