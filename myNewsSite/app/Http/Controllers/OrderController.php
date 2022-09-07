<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $name = $request->input('name');
      $phone = $request->input('phone');
      $email = $request->input('email');
      $description = $request->input('description');
      
      $order = array($name, $phone, $email, $description);
      $orderText = implode(" ", $order);
   
      file_put_contents('orders.txt', $orderText, FILE_APPEND);
      
      
      
      // $order = $_POST;
      //file_put_contents('orders.php', $order, FILE_APPEND);
        
      //   file_put_contents('orders.php', $_POST['name'], FILE_APPEND);
      //   file_put_contents('orders.php', " ", FILE_APPEND);
      //   file_put_contents('orders.php', $_POST['phone'], FILE_APPEND);
      //   file_put_contents('orders.php', " ", FILE_APPEND);
      //   file_put_contents('orders.php', $_POST['email'], FILE_APPEND);
      //   file_put_contents('orders.php', " ", FILE_APPEND);
      //   file_put_contents('orders.php', $_POST['description'], FILE_APPEND);
      //   file_put_contents('orders.php', "\n", FILE_APPEND);
       
       return redirect('/');
    }

    
    
}
