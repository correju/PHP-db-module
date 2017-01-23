<?php
class MyClass {
  private $data = [];
  public function __construct($db) {
    foreach($db->query('SELECT * FROM config') as $row) {
      $this->data["api_key"] = $row["api_key"];
      $this->data["images"]["base_url"] = $row["base_url"];
      $this->data["images"]["small"] = $row["small"];
      $this->data["images"]["big"] = $row["big"];
    }
  }
  public function getData(){
    return $this->data;
  }
}