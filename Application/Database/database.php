<?php

function deleteOrder($pdo, $orderId)
{
    $smt = $pdo->prepare('DELETE FROM `rendelesek` WHERE `id` LIKE :orderId');

    $smt->bindParam(':orderId', $orderId);

    try 
    {
        if (!$smt->execute())
        {
            throw new Exception($smt->errorInfo()[2]);            
        }

        return true;
    } 
    catch (Exception $e) 
    {    
        return false;
    }
}




function getCategoies( PDO $pdo)
{   
    $smt = $pdo->prepare('select * from `kategoriak` ');


    try 
    {
        if (!$smt->execute())
        {
            throw new Exception($smt->errorInfo()[2]);            
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (Exception $e) 
    {    
        return false;
    }
}

function  getOrdersById($pdo, $termekId)
{
    $smt = $pdo->prepare('select * from `rendelesek` where `termekId` lIKE :termekId');
    
    $smt->bindParam(':termekId', $termekId);

    try 
    {
        if (!$smt->execute())
        {
            throw new Exception($smt->errorInfo()[2]);            
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (Exception $e) 
    {   
        return false;
    }
}


function getTermekek(PDO $pdo, $categoryId)
{

    if ($categoryId)
    {
        $smt = $pdo->prepare('select 
            t.id,
            k.megnevezes kategoria, 
            t.megnevezes termek, 
            feszultseg, 
            teljesitmeny, 
            foglalat, 
            elettartam, 
            ar 
        from 
            termekek t join kategoriak k on 
            t.kategoriaId = k.id 
        where t.kategoriaId = :kategoriaId
        order by ar');

        $smt->bindParam(':kategoriaId', $categoryId);

    }
    else
    {
        $smt = $pdo->prepare('select 
            t.id,
            k.megnevezes kategoria, 
            t.megnevezes termek, 
            feszultseg, 
            teljesitmeny, 
            foglalat, 
            elettartam, 
            ar 
        from 
            termekek t join kategoriak k on 
            t.kategoriaId = k.id 
        order by ar');    
    }


    try 
    {
        if (!$smt->execute())
        {
            throw new Exception($smt->errorInfo()[2]);            
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (Exception $e) 
    {
        echo $e->getMessage();
        return [];
    }
    
}

function getConnection($config)
{
    extract($config);

    try 
    {
        return new PDO(
            "mysql:host={$hostName};dbname={$database};charset=utf8",
            $userName,
            $password
        );
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
        return false;
    }
}