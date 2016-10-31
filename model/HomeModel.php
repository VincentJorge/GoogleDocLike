<?php

Class Home extends Model
{

  public function upload($files = null)
  {
    $req = "
    INSERT INTO files (name, paths, type, size, ext)
    VALUES (:name, :paths, :type, :size, :ext)";
    $execute = $this->db->prepare($req);
    $execute->execute(array(
      'name' => $files['name'],
      'paths' => $files['paths'],
      'type' => $files['type'],
      'size' => $files['size'],
      'ext' => $files['ext']
      ));
  }
  public function check_name($name){
    $req = "SELECT * FROM files WHERE name = :name";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
          'name' => $name
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
  }
}