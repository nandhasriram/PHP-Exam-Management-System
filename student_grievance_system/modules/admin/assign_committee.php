<?php
// Include the database connection
require_once '../../config/db.php';

// Include the header
include '../../includes/header.php';

$grievance_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $committee_id = $_POST['committee_id'];

    // Update the grievance to assign a committee
    $sql = "UPDATE grievances SET assigned_to = :committee_id WHERE grievance_id = :grievance_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['committee_id' => $committee_id, 'grievance_id' => $grievance_id]);

    echo "<p>Grievance assigned to committee successfully!</p>";
}

// Fetch available committee members
$committees = $pdo->query("SELECT * FROM users WHERE role = 'committee'")->fetchAll();
?>

<h1>Assign Committee for Grievance ID: <?php echo $grievance_id; ?></h1>
<form action="assign_committee.php?id=<?php echo $grievance_id; ?>" method="post">
    <label for="committee_id">Select Committee Member:</label>
    <select name="committee_id" required>
        <?php foreach ($committees as $committee): ?>
            <option value="<?php echo $committee['id']; ?>"><?php echo $committee['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Assign</button>
</form>

<?php
// Include the footer
include '../../includes/footer.php';
