<?php

namespace FakerPerson\Provider;

class PhoneNumber extends Base
{
    protected static $operators = array(
        130, 131, 132, 133,
        134, 135, 136, 137,
        138, 139, 145, 147,
        150, 151, 152, 153,
        155, 156, 157, 158,
        159, 170, 171, 176,
        177, 178, 180, 181,
        182, 183, 184, 185,
        186, 187, 188, 189,
    );

    public function phoneNumber()
    {
        $operator = static::randomElement(static::$operators);
        return $operator . static::numerify('########');
    }
}
