<?php
include('config.php');
include('libs/Sql.php');
include('libs/Db.php');

$dbMy = new Db('mySql');
$dbPg = new Db('pgSql');

$msgMy = '';
$msgPg = '';

//MySql
try
{
    if(isset($_POST['ButMy']))
    {
        if($_POST['ButMy'] == 'Insert')
        {
            $data = $dbMy->select('`data`')->from('`MY_TEST`')->where('`key`', 'User01')->exec();
            $dbMy->restartVal();
            if(!$data)
            {
                $insert = $dbMy->insert('`MY_TEST`','`key`','`data`')->values('User01', 'someText')->exec();
                $dbMy->restartVal();
            }
            else
            {
                $msgMy = 'value exist';
            }
        }
            elseif($_POST['ButMy'] == 'Update')
        {
            $update = $dbMy->update('`MY_TEST`')->set('`data`', 'newText')->where('`key`', 'User01')->exec();
	        $dbMy->restartVal();
        }
            elseif($_POST['ButMy'] == 'Delete')
        {
            $delete = $dbMy->delete('`MY_TEST`')->where('`key`', 'User01')->exec();
	        $dbMy->restartVal();
        }	
    }

    $resultMy = $dbMy->select('`data`')->from('`MY_TEST`')->where('`key`', 'User01')->exec();
    $dbMy->restartVal();
    if(empty($resultMy))
        $resultMy[] = 'Empty value'; 

}
catch(Exception $error)
{
    $msgMy = $error->getMessage();
}


//PgSql
try
{
    if (isset($_POST['ButPg']))   
    {
        if($_POST['ButPg'] == 'Insert')
        {
            $data = $dbPg->select('data')->from('PG_TEST')->where('key', 'User01')->exec();
            $dbPg->restartVal();

            if(!$data)
            {
                $insert = $dbPg->insert('PG_TEST','key','data')->values('User01', 'someText')->exec();
                $dbPg->restartVal();
            }
            else
            {
                $msgPg = 'value exist';
            }
        }
        elseif($_POST['ButPg'] == 'Update')
        {
            $update = $dbPg->update('PG_TEST')->set('data', 'newText')->where('key', 'User01')->exec();
            $dbPg->restartVal();
        }
        elseif($_POST['ButPg'] == 'Delete')
        {
            $delete = $dbPg->delete('PG_TEST')->where('key', 'User01')->exec();
            $dbPg->restartVal();
        }
    }

    $resultPg = $dbPg->select('key, data')->from('PG_TEST')->where('key', 'User01')->exec();
    $dbPg->restartVal();
    if(empty($resultPg))
        $resultPg[] = 'Empty value'; 
}
catch(Exception $error)
{
    $msgPg = $error->getMessage();	
}

include('templates/index.php');
