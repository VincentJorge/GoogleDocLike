<?php
Class Upload extends Model
{
  	public function get_list()
    {
     $req = "SELECT * FROM files";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
   }
   public function insert_Create($create = null)
    {
      $req = "
      INSERT INTO creates (name, paths, type, size, ext)
      VALUES (:name, :paths, :type, :size, :ext)";
      $execute = $this->db->prepare($req);
      $execute->execute(array(
        'name' => $create['name'],
        'paths' => $create['paths'],
        'type' => $create['type'],
        'size' => $create['size'],
        'ext' => $create['ext']
        ));
    }
   public function get_create()
    {
     $req = "SELECT * FROM creates";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
   }
   public function get_spc_create($id)
  {
   $req = "SELECT * FROM creates WHERE id = :id";
   $execute = $this->db->prepare($req);
   $execute->execute(array(
     'id' => $id
     ));
   $results = $execute->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  }
   public function del_file($id)
   {
    $request = "DELETE FROM files WHERE id = :id";
    $execute = $this->db->prepare($request);
    $execute->execute(array(
      'id' => $id
      ));
  }
  public function del_create($id)
   {
    $request = "DELETE FROM creates WHERE id = :id";
    $execute = $this->db->prepare($request);
    $execute->execute(array(
      'id' => $id
      ));
  }
  public function get_file($id)
  {
   $req = "SELECT * FROM files WHERE id = :id";
   $execute = $this->db->prepare($req);
   $execute->execute(array(
     'id' => $id
     ));
   $results = $execute->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  }
  public function update_file($file){
      $req = "UPDATE files
        SET name = :name, size = :size
        WHERE id = :id";
        $execute = $this->db->prepare($req);
              $execute->execute(array(
                'name' => $file['name'],
                'size' => $file['size'],
                'id' => $file['id']
            ));
    }
     public function update_create($file){
      $req = "UPDATE creates
        SET name = :name, size = :size
        WHERE id = :id";
        $execute = $this->db->prepare($req);
              $execute->execute(array(
                'name' => $file['name'],
                'size' => $file['size'],
                'id' => $file['id']
            ));
    }
    public function check_name($name){
    $req = "SELECT * FROM creates WHERE name = :name";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
          'name' => $name
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
  }
  public function check_name_file_modif($name, $id){
    $req = "SELECT * FROM files WHERE name = :name AND id != :id";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
          'name' => $name,
          'id' => $id
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
  }
  public function check_name_create_modif($name, $id){
    $req = "SELECT * FROM creates WHERE name = :name AND id != :id";
     $execute = $this->db->prepare($req);
     $execute->execute(array(
          'name' => $name,
          'id' => $id
      ));
     $results = $execute->fetchAll(PDO::FETCH_ASSOC);
     return $results;
  }
}