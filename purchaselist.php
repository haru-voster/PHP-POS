<?php include 'lib/header.php'; ?>

<?php
// Add invoice
if (isset($_POST['addpurchase'])) {
    if ($inv->saveInvoice($_POST)) {
        echo "<script>alert('Purchase Added Successfully');</script>";
    } else {
        echo "<script>alert('Purchase Addition Failed!');</script>";
    }
}

// Update invoice
if (isset($_POST['edit'])) {
    if ($inv->updateInvoice($_POST)) {
        echo "<script>alert('Purchase Updated Successfully');</script>";
        echo "<script>window.location='purchaselist.php';</script>"; // fixed typo 'loction'
    } else {
        echo "<script>alert('Purchase Update Failed!');</script>";
    }
}

// Delete invoice
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $serial = $_GET['serial'];
    if ($inv->deleteInvoice($serial, $_GET['invoice_id'])) {
        echo "<script>alert('Purchase Deleted Successfully');</script>";
        echo "<script>window.location='purchaselist.php';</script>"; // reload after delete
    } else {
        echo "<script>alert('Purchase Deletion Failed!');</script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="lnr lnr-list"></i> &nbsp;Purchase List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo BASE_URL; ?>">Dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Purchases</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="purchaselist" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width="10%">Serial</th>
                                    <th width="10%">Invoice No</th>
                                    <th width="15%">Supplier</th>
                                    <th width="10%">Quantity</th>
                                    <th width="5%">Total</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $status = $inv->showInvoices();
                                if ($status) {
                                    $i = 0;
                                    while ($result = $status->fetch_assoc()) {
                                        $i++;
                                        ?>
                                        <tr style="text-align: center;" id="rowid-<?php echo $result['serial']; ?>">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['invoice_number']; ?></td>
                                            <td style="text-align: left;"><?php echo $result['supplier_name']; ?></td>
                                            <td><?php echo $result['quantity']; ?></td>
                                            <td><?php echo $result['total']; ?></td>
                                            <td><?php echo $help->formatDate($result['date'],'d-m-Y'); ?></td>

                                            <td>
                                                <a href="viewpurchase.php?action=view&serial=<?php echo $result['serial']; ?>&invoice_id=<?php echo $result['invoice_number']; ?>" title="View"><i class="fa fa-eye"></i></a>
                                                <?php if(Session::get('status') == 'admin'): ?>
                                                    &nbsp;<a href="editpurchase.php?action=edit&serial=<?php echo $result['serial']; ?>&invoice_id=<?php echo $result['invoice_number']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                    &nbsp;<a href="printfiles/purchase/printpurchase.php?serial=<?php echo $result['serial']; ?>&invoice_id=<?php echo $result['invoice_number']; ?>" title="Print"><i class="fa fa-print"></i></a>
                                                    &nbsp;<a href="?action=delete&serial=<?php echo $result['serial']; ?>&invoice_id=<?php echo $result['invoice_number']; ?>" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="lnr lnr-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7" style="text-align:center;">No purchases found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'lib/footer.php'; ?>
