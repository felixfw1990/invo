<?php

class TestEcho
{
    // ------------------------------------------------------------------------------

    public static function p(array $param, $break = FALSE, $field = [])
    {
        $output = $param;

        if($field)
        {
            $output = [];

            foreach ($param as $v)
            {
                $_temp = [];
                $v = (array)$v;

                foreach ($field as $vv)
                {
                    $_temp[$vv] = $v[$vv] ?? '';
                }

                $output[] = $_temp;
            }

        }

        echo '<pre />';

        print_r($output);

        if ($break) exit;
    }

    // ------------------------------------------------------------------------------
}