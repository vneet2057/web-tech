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
<h5 class="mt-5">All Transaction List</h5>
<table class="table mt-2" border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ledger</th>
            <th scope="col">Transaction Type</th>
            <th scope="col">Transaction Amount</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through $ledger_data and display each row in the table
        foreach ($transaction_data as $row) {
            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['entity'] . "</td>";
            echo "<td>" . $row['is_credit_or_debit'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "<td>" .
                "<a href='edit-transaction.php?ledger_id=" . $row['id'] . "'><button>Edit</button></a> " .
                "<a href='./services/transactionServices/deleteTransaction.php?transaction_id=" . $row['id'] . "'><button>Delete</button></a>" .
                "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>