<?php namespace Invo\Tools;

class TestEcho
{
    // ------------------------------------------------------------------------------

    public static function p($param, $break = FALSE)
    {
        echo '<pre />';

        print_r($param);

        if ($break) exit;
    }

    // ------------------------------------------------------------------------------

    public static function pp(array $param, $break = FALSE, $field = [])
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