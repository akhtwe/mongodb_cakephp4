# CakePHP 4x and MongoDB

## Adding Mongodb PHP driver
- Download <a href="https://pecl.php.net/package/mongodb" style="text-decoration:none;" target="_blank">MongoDB driver</a>  for PHP
- move `php_mongodb.dll` to PHP extension directory
- add `extension=php_mongodb.dll` into `php.ini` file. 

## Download Mogodb
- download <a herf="https://www.mongodb.com/try/download/community" style="text-decoration:none;" target="_blank"> MongoDB</a>
- create `data\db` directory in the operation root directory.

## Configuration in CakePHP
- set configs for mongodb in `config/app_local.php`
<div style="border:1px solid border;border-radius:5px;">
'Datasources' => [ <br>
  &emsp;  .......<br>
  &emsp; 'mongodb'=>[<br>
        &emsp;&emsp;    'className' => 'Cake\Database\Connection',<br>
        &emsp;&emsp;    'driver' => 'MongoDB\Client',<br>
        &emsp;&emsp;    'persistent' => false,<br>
        &emsp;&emsp;    'host' => '127.0.0.1',<br>
        &emsp;&emsp;   'port' => '27017',<br>
        &emsp;&emsp;    'username' => &lt; username &gt; ,<br>
        &emsp;&emsp;    'password' => &lt; password &gt; ,<br>
        &emsp;&emsp;    'database' => &lt; databasename &gt; ,<br>
        &emsp;&emsp;    'cacheMetadata' => true,<br>
    &emsp;    ]<br>
</div>

### Note
`In development progress . . . . `