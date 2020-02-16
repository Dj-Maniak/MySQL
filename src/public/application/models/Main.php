<?php

namespace application\models;


use application\core\Models;


class Main extends Models
{
  public function getNew(){
      $result = $this->db->row('SELECT * FROM `users` WHERE 1');
      return $result;
  }
}
