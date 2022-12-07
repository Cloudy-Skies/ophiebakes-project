<?php
require('../settings/db_class.php');

class Product extends db_connection

//
{
    //methods
    //add product brand
    // public function add_product_brand($brandName)
    // {
    //     $sql = "INSERT into brands(brand_name) values('$brandName')";
    //     return $this->query($sql);
    // }
    //add product category
    public function add_product_category($category)
    {
        $sql = "INSERT into categories(cat_name) values('$category')";
        return $this->query($sql);
    }
    //add new product
    public function add_product($category, $brand, $title, $price, $desc, $image, $keywords)
    {
        $sql = "INSERT into products
            (product_cat, product_brand ,product_title, 
            product_price, product_desc,product_image, 
            product_keywords ) values('$category','$brand','$title','$price','$desc','$image','$keywords')";
        return $this->query($sql);
    }


    //Selects:
    //select all brands
    function select_all_brands()
    {
        return $this->db_fetch_all("SELECT * from brands");
    }

    //select all categories
    function select_all_categories()
    {
        return $this->db_fetch_all("SELECT * from categories");
    }

    //select all products
    function select_all_products()
    {
        return $this->db_fetch_all("SELECT * from products");
    }


    //select one brand
    function select_one_brand($id)
    {
        return $this->db_fetch_one("SELECT * from brands where brand_id='$id'");
    }

    //select one category
    function select_one_category($id)
    {
        return $this->db_fetch_one("SELECT * from brands where cat_id='$id'");
    }

    //select one product
    function select_one_product($id)
    {
        return $this->db_fetch_one("SELECT * from brands where product_id='$id'");
    }

    //EDITS
    //edit one brand
    function update_brand($id, $name)
    {
        return $this->query("UPDATE brands set brand_name='$name' where brand_id='$id'");
    }

    //edit one category
    function edit_category($id, $name)
    {
        return $this->query("UPDATE categories set cat_name='$name' where cat_id='$id'");
    }

    //edit one product
    function edit_product($id, $category, $brand, $title, $price, $desc, $keywords)
    {
        return $this->query("UPDATE products set 
            product_cat='$category', product_title='$title',product_price='$price', 
            product_desc='$desc', product_keywords='$keywords' where cat_id='$id'");
    }

    //delete one product
    function delete_one_product($product_id)
    {
        //returns true or false
        return $this->query("delete from products where product_id = '$product_id'");
    }
    //delete one category
    function delete_one_category($cat_id)
    {
        //returns true or false
        return $this->query("delete from categories where cat_id = '$cat_id'");
    }

    //search products
    function search_products($search)
    {
        $sql = "select * from products where product_title LIKE '%$search%' OR product_keywords LIKE '%$search'";
        return $this->db_fetch_all($sql);
    }
}
// $new = new Product();