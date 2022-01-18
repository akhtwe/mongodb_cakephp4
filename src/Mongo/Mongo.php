<?php 
namespace App\Mongo;

use MongoDB\Client as MongoDB;

class Mongo{
    public function connection()
    {
        // $user = "";
        // $pwd = '';
        // return new Mongo("mongodb://${user}:${pwd}@127.0.0.1:27017");
        return new Mongo("mongodb://127.0.0.1:27017");
    }
}
