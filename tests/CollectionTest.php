<?php

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    use FactoryHelper;

    /** @test */
    function a_new_instance_can_be_retrieved_from_the_factory()
    {
        $collection = $this->getFactory()->collection;

        $this->assertEquals([], $collection->all());
    }

    /** @test */
    function it_iterates_over_each_item_in_an_iterable()
    {
        $class = $this->getFactory()->collection;
        $collection = new $class(range(1, 5));
        $count = '';

        $collection->each(function ($num) use (&$count) {
            $count .= $num;
        });

        $this->assertEquals('12345', $count);
    }

    /** @test */
    function it_is_iterable()
    {
        $class = $this->getFactory()->collection;
        $collection = new $class(range(1, 5));
        $string = '';

        foreach ($collection as $item) {
            $string .= $item;
        }

        $this->assertEquals('12345', $string);
    }

}