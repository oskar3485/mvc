<?php


class Model
{
    public $db;
    public $table;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readAllWhere($field,$value)
    {
        $sql = "SELECT * FROM $this->table WHERE $field =:field";
        $sth = $this->db->prepare($sql);
        $sth->execute([':field'=>$value]);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $sth = $this->db->prepare($sql);
        $sth->execute(['id'=>$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findWhere($field,$value,$operator='=')
    {
        $sql = "SELECT * FROM $this->table WHERE $field  $operator :field";
        $sth = $this->db->prepare($sql);
        $sth->execute([':field'=>$value]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($data)
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode (', :' , array_keys($data));

        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        $sth = $this->db->prepare($sql);
        $result = $sth->execute($data);
        return $result;
    }

    public function update($data, $id)
    {
        $sql = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $sql .= $key . '=:' . $key . ', ' ;
        }
        $sql = rtrim($sql,', ');
        $sql .= " WHERE id=:id";

        $data = array_merge($data, ['id'=>$id]);

        $sth = $this->db->prepare($sql);
        $result = $sth->execute($data);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table";
        $sql .= " WHERE id=:id ";
        $delete = $this->db->prepare($sql);
        $result = $delete->execute(['id' => $id]);
        return $result;
    }

//    public function test()
//    {
//        $sql = "SELECT * FROM posts,users where posts.user_id=users.id and users.id = 13";
//        $sth = $this->db->prepare($sql);
//        $sth->execute();
//        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }
}