<?php
include './services/ledgerServices/fetchSingleLedger.php';
// Start output buffering to capture content for layout
ob_start();
?>
<form action="./services/ledgerServices/editLedger.php<?php echo '?ledger_id=' . $ledger_id ; ?>" method="post">
    <label for="">Ledger Name</label>
    <input type="text" name="entity" value="<?php echo $ledger['entity'] ?>">
    <button type="submit">Submit</button>
</form>
<!-- content endss -->
<?php
// Get the content and clean the output buffer
$content = ob_get_clean();
// Include the layout file with the content
include 'layout.php';
?>