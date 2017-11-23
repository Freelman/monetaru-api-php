<?php

namespace AvtoDev\MonetaApi\Types;

use AvtoDev\MonetaApi\Traits\ConvertToArray;
use AvtoDev\MonetaApi\Traits\ConvertToCarbon;
use AvtoDev\MonetaApi\Support\AttributeCollection;
use AvtoDev\MonetaApi\Support\Contracts\Arrayable;
use AvtoDev\MonetaApi\Support\Contracts\Configurable;

abstract class AbstractType implements Configurable, Arrayable
{
    use ConvertToArray, ConvertToCarbon;

    /**
     * Коллекция аттрибутов.
     *
     * @var AttributeCollection
     */
    protected $attributes;

    public function __construct($response = null)
    {
        $this->attributes = new AttributeCollection;
        $this->configure($response);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $array = [];
        foreach ($this->attributes as $attribute) {
            $array = array_merge($array, $attribute->toArray());
        }

        return $array;
    }
}
