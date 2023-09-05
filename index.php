<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Calculator</title>
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="display-4 pb-3">Loan Calculator</h1>
                        <form id="loan-form" method="POST" action="">
                            <!-- Username -->
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="User Name"
                                    name="username"
                                />
                            </div>
                            <!-- Loan Amount -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="amount"
                                        placeholder="Loan Amount"
                                    />
                                </div>
                            </div>
                            <!-- Years to Repay -->
                            <div class="form-group">
                                <input
                                    type="number"
                                    name="years"
                                    class="form-control"
                                    placeholder="Years To Repay"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    type="submit"
                                    value="Calculate"
                                    class="btn btn-dark btn-block"
                                />
                            </div>
                        </form>
                        <?php
                        echo "<hr>";
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (!empty($_POST['username']) && !empty($_POST['amount']) && !empty($_POST['years'])) {
                                $username = $_POST['username'];
                                $amount = $_POST['amount'];
                                $years = $_POST['years'];
                                if ($years < 3) {
                                    $interest = 0.1;
                                } else {
                                    $interest = 0.15;
                                }
                                $total_interest = $amount * $interest;
                                $total_interest = round($total_interest * $years,0);
                                $total = round($amount + $total_interest,0);
                                $in_month = round($total / ($years * 12),0);
                                
                                echo '<table class="table">';
                                echo '<thead class="thead-dark">';
                                echo '<tr>';
                                echo '<th scope="col">Name</th>';
                                echo '<th scope="col">Interest </th>';
                                echo '<th scope="col">Total</th>';
                                echo '<th scope="col">Monthly</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<th scope="row">' . $username . '</th>';
                                echo '<td>' . $total_interest . '</td>';
                                echo '<td>' . $total . '</td>';
                                echo '<td>' . $in_month . '</td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
