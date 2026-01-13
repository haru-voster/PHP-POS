<?php include 'lib/header.php'; ?>
<?php
$dash = new Dashboard();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Today Sale -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $dash->todaySale(); ?></h3>
                        <p>Today Sale</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="invoicelist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Today Memo -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $dash->todayMemo(); ?></h3>
                        <p>Today Memo</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Memo -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $dash->totalMemo(); ?></h3>
                        <p>Total Memo</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Due (Admin only) -->
            <?php if (Session::get('status') == 'admin'): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $dash->totalDue(); ?></h3>
                            <p>Total Due</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-usd"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Second Row -->
        <div class="row">
            <!-- Total Purchase -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $dash->totalPurchase(); ?></h3>
                        <p>Total Purchase</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-institution"></i>
                    </div>
                    <a href="purchaselist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Products -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $dash->totalProducts(); ?></h3>
                        <p>Total Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Customers -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $dash->totalCustomers(); ?></h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="customerlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Suppliers -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $dash->totalSuppliers(); ?></h3>
                        <p>Total Suppliers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <a href="supplierlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'lib/footer.php'; ?>
