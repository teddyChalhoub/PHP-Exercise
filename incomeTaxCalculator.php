<?php

session_start();

$userInput = ["salary" => $_POST["salary"], "yearly/monthly" => $_POST['yearly/monthly'], "taxFreeAllowance" => $_POST["taxFreeAllowance"]];



$_SESSION["userInput"] = $userInput;

if ($_POST['yearly/monthly'] == 'yearly') {

    $yearlySalary = $_SESSION["userInput"]['salary'];
    $yearlyTax = round(taxcalculation($yearlySalary));
    $yearlySocialSecurityFee = round(socialSecurityFee($yearlySalary));
    $yearlySalaryAfterTax = round(salaryAfterTax($yearlySalary, $userinput["taxFreeAllowance"]));
} else {

    $monthlySalary = $_SESSION["userInput"]['salary'];
    $monthlyTax = round(taxcalculation($monthlySalary));
    $monthlySocialSecurityFee = round(socialSecurityFee($monthlySalary));
    $monthlySalaryAfterTax = round(salaryAfterTax($monthlySalary, $userinput["taxFreeAllowance"]));
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

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="incomeTaxCalculator.php" method="POST">

        <label for="salary">Salary:</label>
        <input id="salary" type="text" name="salary" value=<?php echo $_SESSION["userInput"]["salary"]; ?> required><br><br>

        <?php if ($_SESSION["userInput"]["yearly/monthly"] == "yearly") :
        ?>
            <input id="yearly" type="radio" name="yearly/monthly" value="yearly" checked required>
            <label for="yearly">Yearly</label><br><br>

            <input id="monthly" type="radio" name="yearly/monthly" value="monthly">
            <label for="monthly">Monthly</label><br><br>

        <?php else : ?>

            <input id="yearly" type="radio" name="yearly/monthly" value="yearly" required>
            <label for="yearly">Yearly</label><br><br>

            <input id="monthly" type="radio" name="yearly/monthly" value="monthly" checked>
            <label for="monthly">Monthly</label><br><br>
        <?php endif; ?>

        <label for="taxFreeAllowance">Tax Free Allowance in USD:</label>
        <input id="taxFreeAllowance" type="text" name="taxFreeAllowance" value=<?php echo $_SESSION["userInput"]["taxFreeAllowance"]; ?> required><br><br>

        <button type="submit">submit</button>

    </form>

    <br><br>

    <table style="width: 100%; border-collapse:collapse;">
        <thead>
            <tr style="text-align: left; border-spacing:0;">
                <th style="border-bottom: 0.1rem black solid;"></th>
                <th style="border-bottom: 0.1rem black solid;">Yearly</th>
                <th style="border-bottom: 0.1rem black solid;">Monthly</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Total salary</td>
                <td><?php echo $yearlySalary; ?></td>
                <td><?php echo $monthlySalary; ?></td>

            </tr>
            <tr>
                <td>Tax amount</td>
                <td><?php echo $yearlyTax; ?></td>
                <td><?php echo $monthlyTax; ?></td>

            </tr>
            <tr>
                <td>Social security fee</td>
                <td><?php echo $yearlySocialSecurityFee; ?></td>
                <td><?php echo $monthlySocialSecurityFee; ?></td>

            </tr>
            <tr>
                <td>Salary after tax</td>
                <td><?php echo $yearlySalaryAfterTax; ?></td>
                <td><?php echo $monthlySalaryAfterTax; ?></td>


            </tr>
        </tbody>
    </table>

</body>

</html>