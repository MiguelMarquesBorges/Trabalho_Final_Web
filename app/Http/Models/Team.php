<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    private $id;
    private $name;
    private $symbol;

    public function get_id(){
        return $id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_name(){
        return $name;
    }
    
    public function set_name($name){
        $this->name = $name;
    }

    public function get_symbol(){
        return $symbol;
    }
    
    public function set_symbol($symbol){
        $this->symbol = $symbol;
    }

    
}
