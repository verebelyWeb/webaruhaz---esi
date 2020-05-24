<?php

function newOrderInsert( PDO $pdo, $order)
{
    extract($order);

    $smt = $pdo->prepare('INSERT INTO `rendelesek` VALUES
        ((SELECT MAX(id) + 1 FROM ( SELECT * FROM`rendelesek`) t),:datum,:termekId, :db)
    ');

    $currDate = date("Y-m-d");

    $smt->bindParam(':datum',    $currDate);
    $smt->bindParam(':termekId', $termekId);
    $smt->bindParam(':db',       $count);
   

    try 
    {
        if (!$smt->execute())
        {
            throw new PDOException($smt->errorInfo()[2]);            
        }

        return true;     
    } 
    catch (PDOException $e) 
    {    
        var_dump($e->getMessage());
        die;
        return false;
    }
}

function updateProduct( PDO $pdo, $product)
{
    extract($product);

    $smt = $pdo->prepare('UPDATE `termekek` SET  
                 `megnevezes`   = :megnevezes,
                 `feszultseg`   = :feszultseg,  
                 `teljesitmeny` = :teljesitmeny,
                 `foglalat`     = :foglalat,
                 `elettartam`   = :elettartam,
                 `ar`           = :ar
                 WHERE `id` = :id');

    $smt->bindParam(':megnevezes',      $megnevezes);
    $smt->bindParam(':feszultseg',      $feszultseg);
    $smt->bindParam(':teljesitmeny',    $teljesitmeny);
    $smt->bindParam(':foglalat',        $foglalat);
    $smt->bindParam(':elettartam',      $elettartam);
    $smt->bindParam(':ar',              $ar);
    $smt->bindParam(':id',              $id);

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

function getProduct( PDO $pdo, $productId)
{
    $smt = $pdo->prepare('SELECT * FROM `termekek` WHERE `id` LIKE :productId');

    $smt->bindParam(':productId', $productId);

    try 
    {
        if (!$smt->execute())
        {
            throw new Exception($smt->errorInfo()[2]);            
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC)[0];     
    } 
    catch (Exception $e) 
    {    
        return false;
    }
}





function deleteOrder( PDO $pdo, $orderId)
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