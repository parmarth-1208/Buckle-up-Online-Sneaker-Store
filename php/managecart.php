<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'Item_Name');
            if(in_array($_POST['Item_Name'],$myitems))
            {
                echo"<script>
                    alert('Item already added');
                    window.location.href='des1.php';
                </script>";
            }
        else
        {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            echo"<script>
                    alert('Item added');
                    window.location.href='des1.php';
            </script>";
        }    
        }
        else
        {
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            echo"<script>
                    alert('Item added');
                    window.location.href='des1.php';
            </script>";
        }
    }
    if(isset($_POST['Remove_item']))
    {
        foreach($_SESSION['cart'] as $key)
        {
            echo $key;
        }
    }
}

?>