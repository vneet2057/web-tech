<?php
include './services/ledgerServices/fetchLedger.php';
// Start output buffering to capture content for layout
ob_start();
?>
<form action="./services/ledgerServices/addLedger.php" method="post">
    <label for="">Ledger Name</label>
    <input type="text" name="entity">
    <button type="submit">Submit</button>
</form>
<!-- content -->
<h5 class="mt-5">All Ledger List</h5>
<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ledger Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through $ledger_data and display each row in the table
        foreach ($ledger_data as $row) {
            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['entity'] . "</td>";
            echo "<td>" .
                "<a href='edit-ledger.php?ledger_id=" . $row['id'] . "'><button>Edit</button></a>" .
                "<a href='./services/ledgerServices/deleteLedger.php?ledger_id=" . $row['id'] . "'><button>Delete</button></a>" .
                "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- content endss -->
<?php
// Get the content and clean the output buffer
$content = ob_get_clean();

// Include the layout file with the content
include 'layout.php';
?>