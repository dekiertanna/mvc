<?php
namespace mvc\Model;

class Category extends \mvc\Engine\Model
{
    public function getAll()
    {
        $query = $this->pdo->query("SELECT * from categories");
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);

        if(isset($items))
        {
            return $items;
        }

        else{
            return null;
        }
    }

    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO categories (name) VALUES (:name)');
        $ins->bindValue(':name',$data['name'], \PDO::PARAM_STR);
        $ins->execute();
    }

    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM categories where id=:id');
        $del->bindValue(':id',$id,\PDO::PARAM_INT);
        $del->execute();
    }
}