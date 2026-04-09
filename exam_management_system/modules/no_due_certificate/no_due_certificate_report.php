<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<style>
    @media print {
        /* Hide elements during print */
        .no-print {
            display: none;
        }
    }
</style>

<div class="container">
    <h1>No Due Certificate Report</h1>

    <!-- Search Form -->
    <form method="GET" class="mb-4 no-print">
        <div class="form-group row">
            <label for="search_reg_no" class="col-sm-2 col-form-label">Search by Register Number</label>
            <div class="col-sm-6">
                <input type="text" id="search_reg_no" name="reg_no" class="form-control" placeholder="Enter Registration Number">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <h2>Issued Certificates</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Registration Number</th>
                <th>Course</th>
                <th>Department</th>
                <th>Issue Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data based on the search input or display all records
            $reg_no_filter = isset($_GET['reg_no']) ? $_GET['reg_no'] : '';
            $query = "SELECT * FROM cms_no_due";
            if (!empty($reg_no_filter)) {
                $query .= " WHERE reg_no LIKE '%$reg_no_filter%'";
            }
            
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['reg_no']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['status']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="text-center mt-4 no-print">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="no_due_certificate.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php 
include '../../includes/footer.php'; 
?>
