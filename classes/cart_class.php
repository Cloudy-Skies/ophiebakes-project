<?php

//inheriting the methods from connection
require('../settings/db_class.php');


class Cart extends db_connection
{

    //add to cart class
    function add_to_cart($product_id, $ip_address, $customer_id, $quantity)
    {
        //returns true or false
        return $this->query("insert into cart (p_id, ip_add, c_id, qty) values('$product_id','$ip_address', '$customer_id', '$quantity')");
    }

    // remove from cart class
    function remove_from_cart($product_id, $customer_id)
    {
        return $this->query("delete from cart where p_id = '$product_id' and c_id = '$customer_id'");
    }

    //select all from cart class
    function select_all_from_cart($customer_id)
    {
        return $this->db_fetch_all("select * from cart inner join products on p_id = product_id where c_id = '$customer_id'");
    }

    //select one item from cart class
    function select_one_item($customer_id, $product_id)
    {
        return $this->db_fetch_one("select * from cart where c_id = '$customer_id' and  p_id = '$product_id'");
    }

    function update_quantity($product_id, $customer_id, $quantity)
    {
        return $this->query("update cart set qty = '$quantity' where p_id = '$product_id' and c_id = '$customer_id'");
    }


    // calculate the total amount for items in the cart
    function total_amount($customer_id)
    {
        return $this->db_fetch_one("SELECT SUM(products.product_price *cart.qty) as Amount FROM cart join products on (products.product_id = cart.p_id) where cart.c_id = '$customer_id'");
    }


    function add_order($customer_id, $invoice_no, $order_date, $order_status)
    {
        return $this->query("insert into orders (customer_id, invoice_no, order_date, order_status) values('$customer_id','$invoice_no', '$order_date', '$order_status')");
    }


    function add_order_details($order_id, $product_id, $quantity)
    {
        return $this->query("insert into orderdetails (order_id,product_id,	qty) values('$order_id','$product_id', '$quantity')");
    }

    function get_recent_order()
    {
        return $this->db_fetch_one("SELECT MAX(order_id) as last_order from orders");
    }

    function add_payment($amount, $customer_id, $order_id, $currency, $payment_date)
    {
        return $this->query("insert into payment(amt, customer_id, order_id, currency, payment_date) values('$amount', '$customer_id', '$order_id', '$currency', '$payment_date')");
    }

    function select_all_orderdetails()
    {
        return $this->db_fetch_one("select * from orderdetails");
    }
}