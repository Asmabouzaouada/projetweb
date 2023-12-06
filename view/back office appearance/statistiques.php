<?php

require_once __DIR__ . '/../../controller/produitC.php';




$db = config::getConnexion();
$produitC = new produitC();
$statistics = $produitC->listProduitsStatistics($db);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Backoffice - Statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <h1>Statistiques</h1>
    <canvas id="categoryChart" width="300" height="300"></canvas>

    <script>
        var categoryData = <?php echo json_encode($statistics); ?>;

        // data+ doura chart
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['pour femmes', 'pour hommes', 'pour enfants '],
                datasets: [{
                    data: categoryData.map(item => item.productCount),
                    backgroundColor: [
                        '#ff69b4', // Rose for Pour Femmes
                        '#3498db', // Bleu for Pour Hommes
                        '#f1c40f', // Yellow for Pour Enfants
                    ]
                }]
            }
        });
    </script>
    </script>

</body>

</html>