<?php

session_start();

$userInput = ["salary" => $_POST["salary"], "yearly/monthly" => $_POST['yearly/monthly'], "taxFreeAllowance" => $_POST["taxFreeAllowance"]];

$_SESSION["userInput"] = $userInput;

if ($_POST['yearly/monthly'] == 'yearly') {

    $yearlySalary = $_SESSION["userInput"]['salary'];
    $yearlyTax = round(taxcalculation($yearlySalary));
    $yearlySocialSecurityFee = round(socialSecurityFee($yearlySalary));
    $yearlySalaryAfterTax = round(salaryAfterTax($yearlySalary, $_SESSION['userInput']["taxFreeAllowance"]));
} else {

    $monthlytaxFreeAllowance = $_SESSION['userInput']["taxFreeAllowance"]/12;
    $monthlySalary = $_SESSION["userInput"]['salary'];
    $monthlyTax = round(taxcalculation($monthlySalary));
    $monthlySocialSecurityFee = round(socialSecurityFee($monthlySalary));
    $monthlySalaryAfterTax = round(salaryAfterTax($monthlySalary, $monthlytaxFreeAllowance));
}

function taxcalculation($num)
{

    if ($num > 10000 && $num <= 25000) {
        $tax = $num * (11 / 100);
    } elseif ($num > 25000 && $num <= 50000) {
        $tax = $num * (30 / 100);
    } elseif ($num > 50000) {
        $tax = $num * (45 / 100);
    }

    return $tax;
}

function socialSecurityFee($num1)
{
    if ($num1 > 10000) {
        $securityFee = $num1 * (4 / 100);
    }

    return $securityFee;
}

function salaryAfterTax($num2, $taxFreeAllowance)
{
    $salaryAfterTax = $num2 + $taxFreeAllowance - taxcalculation($num2) - socialSecurityFee($num2);
    return $salaryAfterTax;
}

function requiredFields()
{
    if ($_POST["salary"] != null && $_POST['yearly/monthly'] != null && $_POST["taxFreeAllowance"] != null) {

        return true;
    } else {
        return false;
    }
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/incomeTaxCalculator.css">
    <title>Income Tax Calculator</title>
</head>

<body>
    <h3>Income Tax Calculator</h3>
    <div class="list">
        <ul>
            <li>All information are required.</li>
            <li>Provide all amounts in USD.</li>
        </ul>
    </div>
    <div class="wrapper">
        <form action="incomeTaxCalculator.php" method="POST">

            <div class="form">
                <div class="box">
                    <label for="salary">Salary</label><br>
                    <input id="salary" type="number" name="salary" value=<?php echo $_SESSION["userInput"]["salary"]; ?>><br><br>
                </div>
                <div class="box">
                    <label for="taxFreeAllowance">Tax Free Allowance </label><br>
                    <input id="taxFreeAllowance" type="number" name="taxFreeAllowance" value=<?php echo $_SESSION["userInput"]["taxFreeAllowance"]; ?>><br><br>
                </div>

                <div class="radio-btn">

                    <?php

                    if ($_SESSION["userInput"]["yearly/monthly"] == "yearly") {

                        echo "<input id='monthly' type='radio' name='yearly/monthly' value='monthly'>
                        <label for='monthly'>Monthly</label>";

                        echo "<input id='yearly' type='radio' name='yearly/monthly' value='yearly' checked >
                        <label for='yearly'>Yearly</label><br><br>";
                    } else {

                        echo "<input id='monthly' type='radio' name='yearly/monthly' value='monthly' checked>
                        <label for='monthly'>Monthly</label>";

                        echo "<input id='yearly' type='radio' name='yearly/monthly' value='yearly' >
                        <label for='yearly'>Yearly</label><br><br>";
                    }
                    ?>
                </div>
                <button type="submit" name="calculate-btn">Calculate</button>

            </div>

        </form>

        <br><br>
    </div>

    <?php if (isset($_POST["calculate-btn"])) : ?>
        <?php if (requiredFields()) : ?>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Yearly</th>
                        <th>Monthly</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>Total salary</td>
                        <?php
                        if (isset($_POST['calculate-btn'])) {
                            echo "<td class='background-table'>$yearlySalary</td>";
                            echo "<td class='background-table'>$monthlySalary</td>";
                        }
                        ?>

                    </tr>
                    <tr>
                        <td>Tax amount</td>
                        <?php
                        if (isset($_POST['calculate-btn'])) {
                            echo "<td>$yearlyTax</td>";
                            echo "<td>$monthlyTax</td>";
                        }
                        ?>

                    </tr>
                    <tr>
                        <td>Social security fee</td>
                        <?php
                        if (isset($_POST['calculate-btn'])) {
                            echo "<td class='background-table'>$yearlySocialSecurityFee</td>";
                            echo "<td class='background-table'>$monthlySocialSecurityFee</td>";
                        }
                        ?>

                    </tr>
                    <tr>
                        <td>Salary after tax</td>
                        <?php
                        if (isset($_POST['calculate-btn'])) {
                            echo "<td>$yearlySalaryAfterTax</td>";
                            echo "<td>$monthlySalaryAfterTax</td>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        <?php else : ?>
            <p class="error">Some fields are missing</p>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>