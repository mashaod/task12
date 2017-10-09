<?php
Class Db extends Sql
{
    public $db;

    public function __construct($nameDb)
    {
        switch($nameDb)
        {
        case('mySql'):
            $this->db =  new PDO('mysql:host='.DB_HOST.'; dbname='.DB_DB , DB_USER, DB_PASSWORD_MY);
            break;
        case('pgSql'):
            $this->db =  new PDO('pgsql:host='.DB_HOST.'; dbname='.DB_DB , DB_USER, DB_PASSWORD_PG);
            break;
        default:
            throw new Exception('Invalid DB');
            break;
        }

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function exec()
    {
        parent::exec();

        if(!empty($this->selectVal))
        {
            $sth = $this->db->query($this->sql);
            while($row = $sth->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = $row['data']; 
            }
            return $result;
        }
        elseif(!empty($this->insertVal) || !empty($this->updateVal))
        {
            $sth = $this->db->prepare($this->sql);
            $sth->execute(); 
        }
        elseif(!empty($this->deleteVal))
        {
            $this->db->exec($this->sql);
        }
        else
        {
            throw new Exception("Wrong values");
        }
    }
}

