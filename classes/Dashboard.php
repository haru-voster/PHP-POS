<?php
$path = realpath(dirname(__DIR__));

include_once 'DB.php';
include_once $path . '/helper/Helper.php';

class Dashboard
{
    private $dbObj;

    public function __construct()
    {
        $this->dbObj = new Database();
    }

    /*
    !--------------------------------------
    !               Today's Sale
    !-------------------------------------
    */
    public function todaySale()
    {
        date_default_timezone_set('Asia/Dhaka');
        $starting = date('Y-m-d') . " 00:00:00";
        $ending = date('Y-m-d') . " 23:59:59";

        $query = "SELECT SUM(sub_total) as subtotal FROM tbl_sell ts WHERE ts.sell_date BETWEEN '$starting' AND '$ending'";
        $st = $this->dbObj->select($query);
        if ($st) {
            $subtotal = $st->fetch_object()->subtotal;
            return ($subtotal > 0) ? number_format((float)$subtotal, 2, '.', '') : 0;
        }
        return 0;
    }

    /*
    !--------------------------------------
    !               Today Sales Count
    !-------------------------------------
    */
    public function todayMemo()
    {
        $starting = date('Y-m-d') . " 00:00:00";
        $ending = date('Y-m-d') . " 23:59:59";

        $query = "SELECT COUNT(sell_id) as totalsell FROM tbl_sell WHERE sell_date BETWEEN '$starting' AND '$ending'";
        $st = $this->dbObj->select($query);
        if ($st) {
            return $st->fetch_object()->totalsell;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Total Sales Count
    !----------------------------------
    */
    public function totalMemo()
    {
        $query = "SELECT COUNT(sell_id) as totalsell FROM tbl_sell";
        $st = $this->dbObj->select($query);
        if ($st) {
            return $st->fetch_object()->totalsell;
        }
        return 0;
    }

    /*
    !----------------------------------
    !         Total Purchase
    !----------------------------------
    */
    public function totalPurchase()
    {
        $query = "SELECT COUNT(serial) as totalinvoice FROM tbl_invoice";
        $st = $this->dbObj->select($query);
        if ($st) {
            return $st->fetch_object()->totalinvoice;
        }
        return 0;
    }

    /*
    !----------------------------------
    !         Total Customers
    !----------------------------------
    */
    public function todayCustomer()
    {
        $query = "SELECT COUNT(customer_id) as totalcustomer FROM tbl_customer";
        $st = $this->dbObj->select($query);
        if ($st) {
            return $st->fetch_object()->totalcustomer;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Today Profit
    !----------------------------------
    */
    public function todayProfile()
    {
        $starting = date('Y-m-d') . " 00:00:00";
        $ending = date('Y-m-d') . " 23:59:59";

        $query = "SELECT SUM(profit) as profit FROM profit WHERE date BETWEEN '$starting' AND '$ending'";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            $profit = $stmt->fetch_assoc()['profit'];
            return ($profit > 0) ? number_format((float)$profit, 2, '.', '') : 0;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Total Products
    !----------------------------------
    */
    public function totalProducts()
    {
        $query = "SELECT COUNT(product_id) as total FROM tbl_product";
        $st = $this->dbObj->link->query($query);
        if ($st) {
            $total = $st->fetch_object()->total;
            return ($total !== null) ? $total : 0;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Total Customers
    !----------------------------------
    */
    public function totalCustomers()
    {
        $query = "SELECT COUNT(customer_id) as total FROM tbl_customer";
        $st = $this->dbObj->link->query($query);
        if ($st) {
            $total = $st->fetch_object()->total;
            return ($total !== null) ? $total : 0;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Total Suppliers
    !----------------------------------
    */
    public function totalSuppliers()
    {
        $query = "SELECT COUNT(supplier_id) as total FROM tbl_supplier";
        $st = $this->dbObj->link->query($query);
        if ($st) {
            $total = $st->fetch_object()->total;
            return ($total !== null) ? $total : 0;
        }
        return 0;
    }

    /*
    !----------------------------------
    !           Total Due
    !----------------------------------
    */
    public function totalDue()
    {
        $query = "SELECT SUM(total_due) as totaldue FROM tbl_sell";
        $st = $this->dbObj->link->query($query);
        if ($st) {
            $total = $st->fetch_object()->totaldue;
            return ($total !== null) ? number_format((float)$total, 2, '.', '') : 0;
        }
        return 0;
    }

}
