<?php
// Include necessary files

//require_once __DIR__ . '/../controller/produitC.php';
require_once __DIR__ . '/../../controller/produitC.php';




// Create an instance of the produitC class
$db = config::getConnexion(); 
$produitC = new produitC();

// Call the listProduitsStatistics function to get category statistics
$statistics = $produitC->listProduitsStatistics($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Backoffice - Statistiques</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h1>Statistiques</h1>
<canvas id="categoryChart" width="300" height="300"></canvas>

<script>
// Inject PHP data into JavaScript
var categoryData = <?php echo json_encode($statistics); ?>;

// Process the data and create the pie chart
var ctx = document.getElementById('categoryChart').getContext('2d');
var categoryChart = new Chart(ctx, {
    type: 'pie',
    data: {
            labels: categoryData.map(item => {
                // Assign colors based on category names
                if (item.categorie === 'Femmes') return 'Pour Femmes';
                else if (item.categorie === 'Hommes') return 'Pour Hommes';
                else if (item.categorie === 'Enfants') return 'Pour Enfants';
            }),
            datasets: [{
                data: categoryData.map(item => item.productCount),
                backgroundColor: [
                    '#ff69b4', // Rose for Pour Femmes
                    '#3498db', // Bleu for Pour Hommes
                    '#f1c40f', // Yellow for Pour Enfants
                    // Add more colors as needed
                ]
            }]
        }
    });
</script>
</script>

</body>
</html>
