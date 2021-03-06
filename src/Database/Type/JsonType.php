<?php


namespace CodeBlastrUsers\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

/**
 * Class JsonType
 * @package CodeBlastrUsers\Database\Type
 *
 * @todo This needs to move the core app me thinks, but again this would require making this plugin dependent on CodeBlastrFramework
 */
class JsonType extends Type
{

    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }
        return json_decode($value, true);
    }

    public function marshal($value)
    {
        if (is_array($value) || $value === null) {
            return $value;
        }
        return json_decode($value, true);
    }

    public function toDatabase($value, Driver $driver)
    {
        return json_encode($value);
    }

    public function toStatement($value, Driver $driver)
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_STR;
    }

}