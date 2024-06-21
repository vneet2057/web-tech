<?php
// Include the ledger.php file to get $ledger_data
include './services/transactionServices/fetchTransaction.php';
include './services/ledgerServices/fetchLedger.php';

// Start output buffering to capture content for layout
ob_start();
?>
<form action="./services/transactionServices/addTransaction.php" method="post">
    <label for="">Ledger Name</label>
    <select name="ledger_id" id="ledger">
        <?php
        foreach ($ledger_data as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['entity'] . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="">Transaction Type</label>
    <select name="is_credit_or_debit" id="">
        <option value="DR">Dr</option>
        <option value="CR">CR</option>
    </select>
    <br>
    <label for="">Amount</label>
    <input type="number" step="any" name="amount">
    <button type="submit">Submit</button>
</form>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>