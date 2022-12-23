<?php
require('../classes/product_class.php');

//The code below is organised in groups of add, select and edit.
//For the product brand, product category and product controller in that order

//add product brand
// function add_product_brand_ctr($name)
// {
//     //instantiating a product class
//     $add_product_brand = new Product();
//     return $add_product_brand->add_product_brand($name);
// }

//add product category
function add_category_controller($category)
{
    //instantiating a product class
    $add_product_cat = new Product();
    return $add_product_cat->add_category($category);
}

//add product
function add_product_controller($category, $title, $price, $desc, $image, $keywords)
{
    $product_instance = new Product();
    return $product_instance->add_product(
        $category,
        $title,
        $price,
        $desc,
        $image,
        $keywords
    );
}

//Selects:
//select all brands
function select_all_brands_controller()
{
    $product_instance = new Product();
    return $product_instance->select_all_brands();
}

//select all categories
function select_all_categories_ctr()
{
    $product_instance = new Product();
    return $product_instance->select_all_categories();
}

//select all products
function select_all_products_ctr()
{
    $product_instance = new Product();
    return $product_instance->select_all_products();
}


//select one brand
function select_one_brand_ctr($id)
{
    $product_instance = new Product();
    return $product_instance->select_one_brand($id);
}

//select one category
function select_one_category_ctr($id)
{
    $category_instance = new Product();
    return $category_instance->select_one_category($id);
}

function select_one_categoryname_controller($category)
{
    // create an instance of the Product class
    $category_instance = new Product();
    // call the select_one_categoryname method from the class
    return $category_instance->select_one_category_name($category);
}

//select one product
function select_one_product_ctr($id)
{
    $product_instance = new Product();
    return $product_instance->select_one_product($id);
}


//edit one brand
function update_brand_ctr($id, $name)
{
    $product_instance = new Product();
    return $product_instance->update_brand($id, $name);
}

//edit one category
function edit_category_ctr($id, $name)
{
    $product_instance = new Product();
    return $product_instance->edit_category($id, $name);
}

//edit one product
function edit_product_ctr($id, $category, $title, $price, $desc,$image, $keywords)
{
    $product_instance = new Product();
    return $product_instance->edit_product($id, $category,  $title, $price, $desc,$image, $keywords);
}

function search_product_ctr($searchterm)
{
    $product_instance = new Product();
    return $product_instance->search_products($searchterm);
}

function delete_one_category_ctr($cat_id)
{
    //create an instance of the product class
    $product_instance = new Product();
    //call the delete_one_category method from the class
    return $product_instance->delete_one_category($cat_id);
}

function delete_one_product_ctr($product_id)
{
    //create an instance of the product class
    $product_instance = new Product();
    //call the delete_one_category method from the class
    return $product_instance->delete_one_product($product_id);
}