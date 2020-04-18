<?php namespace Tenaga;

use Illuminate\Database\Capsule\Manager as Capsule;

class Model {
    public $capsule;

    public function __construct(){
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            "driver"   => getenv('DATABASE_DRIVER'),
            "host"     => getenv('DATABASE_HOST'),
            "database" => getenv('DATABASE_NAME'),
            "username" => getenv('DATABASE_USER'),
            "password" => getenv('DATABASE_PASS')
        ]);

        //Make this Capsule instance available globally.
        $this->capsule->setAsGlobal();
        // Setup the Eloquent ORM.
        $this->capsule->bootEloquent();
    }

    public function connect(){
        return $this->capsule;
    }

}
