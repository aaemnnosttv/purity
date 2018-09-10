<?php

class EachTest extends \PHPUnit\Framework\TestCase
{
    use FactoryHelper;

    /** @test */
    function it_iterates_over_each_item_in_an_iterable()
    {
        $factory = $this->getFactory();
        $each = $factory->each;
        $count = '';

        $each(range(1, 5), function ($num) use (&$count) {
            $count .= $num;
        });

        $this->assertEquals('12345', $count);
    }

    /** @test */
    function it_provides_the_key_as_the_second_argument()
    {
        $factory = $this->getFactory();
        $each = $factory->each;
        $keys = $values = [];
        $iterable = [
            'a' => 'apple',
            'b' => 'beet',
            'c' => 'carrot',
        ]; // yum

        $each($iterable, function ($value, $key) use (&$keys, &$values) {
            array_push($keys, $key);
            array_push($values, $value);
        });

        $this->assertEquals(['a','b','c'], $keys);
        $this->assertEquals(['apple','beet','carrot'], $values);
    }
}