<?php

namespace App\lib\datasources;

use Cake\Core\Configure;
use MongoDB\Client as MongoClient;
use MongoDB\BSON\ObjectId as MongoObjectId;

class Mongo extends MongoClient{
    public static function connect()
    {
        if (file_exists(CONFIG . 'app_local.php')) {
            Configure::load('app_local', 'default');
            $mongo_config=Configure::read('Datasources.mongodb');
            $username=isset($mongo_config['username'])?$mongo_config['username']:null;
            $password=isset($mongo_config['password'])?$mongo_config['password']:null;
            $host=isset($mongo_config['host'])?$mongo_config['host']:'localhost';
            $port=isset($mongo_config['port'])?$mongo_config['port']:'27017';
            $database=isset($mongo_config['database'])?$mongo_config['database']:null;
        }
        try {
            $connection_string="mongodb://".$host.":".$port."/?authSource=".$database."&readPreference=primary";
            if($username) $connection_string="mongodb://".$username.":".$password."@".$host.":".$port."/?authSource=".$database."&readPreference=primary";
            $connect=new MongoClient($connection_string);
            return $connect->$database;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
