<?php
class exercise
{
    const SELECTSINGLE=1;
    const SELECTALL=2;
    const EXECUTE=3;

    private $pdo;
    public function __construct()
    {
        $this->pdo=new PDO("mysql:host=localhost;dbname=vithu","vithu","123");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function queryDB($sql,$mode,$values=array())
    {
        $stmt=$this->pdo->prepare($sql);

        foreach($values as $bindValue)
        {
            $stmt->bindValue($bindValue[0],$bindValue[1]);
        }
        $stmt->execute();

        if($mode==exercise::SELECTSINGLE)
        {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else if($mode==exercise::SELECTALL)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
}
?>