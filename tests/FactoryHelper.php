<?php

trait FactoryHelper
{
    /**
     * @return mixed
     */
    protected function getFactory()
    {
        return include __DIR__ . '/../factory.php';
    }
}