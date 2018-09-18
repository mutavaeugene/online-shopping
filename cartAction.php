<?php
session_start();
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
//connect to mysql database
include "dbconfig.php";

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'gardencity.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){






$query = $db->query("SELECT amount from details where email='".$_SESSION['usr_id']."'");
    $row=mysqli_fetch_array($query);
    if($row){                     
            $balance=$row['amount'];
        
}
        if(balance<=($cart->total())){

$balance=$balance-($cart->total());
$_SESSION['bill']=($cart->total());
$query = $db->query("UPDATE details SET amount='".$balance."' WHERE email='".$_SESSION['usr_id']."'");
if($query){
}                                


               // echo "dear customer  ,your bank balance is kshs". $balance;



        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            

            if($insertOrderItems){

                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");

        }
        $_SESSION['CASHOUT']="Order successiful. your order id is #";
        $_SESSION['balance']=$balance;
    }
    else{
         $_SESSION['CASHOUT']="Order not successiful. please recharge your account and try again";
header("Location: orderSuccess.php?id=$orderID");
$_SESSION['balance']=$balance;
    }



    }else{
        header("Location: transaction.php");
    }
}else{
    header("Location: transaction.php");
}