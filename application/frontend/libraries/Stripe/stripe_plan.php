<?php 		
		require_once('init.php');
		Stripe\Stripe::setApiKey("sk_test_YnbXjuOvEWCVtAqGnqb33qNl");
		//Stripe\Stripe::setApiKey("sk_test_tbqIiSnQbXyBHl9Qp2mrYMWo");   // mark test account
		/* $Plan = \Stripe\Plan::create(array(
		  "amount" => bcmul('8.49', 100),
		  "interval" => "day",
		  "name" => "day.49",
		  "currency" => "usd",
		  "id" => "day.49"
		  ));
		echo "Plan id    ".  $Plan->id; 
		echo "<pre>";
		print_r($Plan);*/
		$Subscription= \Stripe\Subscription::create(array(
		  "customer" => "cus_BUR3rZJT3agZyS",
		  "items" => array(
			array(
			  "plan" => "elm30.00",
			),
		  )
		));
		if( $Subscription->id){
			echo "assign subs";
		}
        echo "<pre>";
		print_R($Subscription);
		/*$sub = \Stripe\Subscription::retrieve('sub_BRAoofQnDJ0t5O');
        $del= $sub->cancel();
		echo "<pre>";
		print_r($del);
		$sub = \Stripe\Subscription::retrieve('sub_BRAzDvCokpckCl');
        $del= $sub->cancel(array('at_period_end' => true));
		echo "<pre>";
		print_r($del);*/
		
	
				
?>
