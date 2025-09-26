<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    private $cpf;
    private $name;
    private $dateBirth;
    private $function;
    private $position;
    private $number;
    private $team;

    public function get_cpf(){
        return $cpf;
    }

    public function set_cpf($cpf){
        $this->cpf = $cpf;
    }

    public function get_name(){
        return $name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function get_dateBirth(){
        return $dateBirth;
    }

    public function set_dateBirth($dateBirth){
        $this->dateBirth = $dateBirth;
    }

    public function get_role(){
        return $role;
    }

    public function set_role($role){
        $this->role = $role;
    }

    public function get_position(){
        return $position;
    }

    public function set_position($position){
        $this->position = $position;
    }
}
