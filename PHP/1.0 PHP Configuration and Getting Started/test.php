<?php
    echo "\n";
    $serverName = "tcp:csucla2016.database.windows.net,1433";

    $connectionOptions = array("Database"=>"cusclas2016",
        "Uid"=>"meet_bhagdev", "PWD"=>"channelV1");

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $tsql = "SELECT [CompanyName] FROM SalesLT.Customer";

        $getProducts = sqlsrv_query($conn, $tsql);

        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));

        $productCount = 0;
        $ctr = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {   
            $ctr++;
            echo($row['CompanyName']);
            echo("<br/>");
            $productCount++;
            if($ctr>10)
                break;
        }

        sqlsrv_free_stmt($getProducts);

         $tsql = "INSERT SalesLT.Product (Name, ProductNumber, StandardCost, ListPrice, SellStartDate) OUTPUT INSERTED.ProductID VALUES ('SQL Sessddas 102w201', 'SQLEsdas001', 0, 0, getdate())";


        $insertReview = sqlsrv_query($conn, $tsql);
        if($insertReview == FALSE)
            die(FormatErrors( sqlsrv_errors()));


        while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
        {   
            echo($row['ProductID']);
        }
        sqlsrv_free_stmt($insertReview);

        $tsql = "DELETE FROM [SalesLT].[Product] WHERE Name=?";
        $params = array("SQL Sessddas 102w201");

        $deleteReview = sqlsrv_prepare($conn, $tsql, $params);
        if($deleteReview == FALSE)
            die(FormatErrors(sqlsrv_errors()));

        if(sqlsrv_execute($deleteReview) == FALSE)
            die(FormatErrors(sqlsrv_errors()));

        while($row = sqlsrv_fetch_array($deleteReview, SQLSRV_FETCH_ASSOC))
        {   
            echo($row['ProductID']);
        }
        sqlsrv_free_stmt($deleteReview);
         $tsql = "INSERT SalesLT.Product (Name, ProductNumber, StandardCost, ListPrice, SellStartDate) OUTPUT INSERTED.ProductID VALUES ('SQL Sessddas 102w201', 'SQLEsdas001', 0, 0, getdate())";


        $insertReview = sqlsrv_query($conn, $tsql);
        if($insertReview == FALSE)
            die(FormatErrors( sqlsrv_errors()));


        while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
        {   
            echo($row['ProductID']);
        }
        sqlsrv_free_stmt($insertReview);

?>