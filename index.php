<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Currency Converter</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e7ff; /* Soft blue background */
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
            width: 300px; /* Set a fixed width */
        }
        h2 {
            color: #4b0082; /* Indigo color */
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 12px;
            margin: 10px 0;
            width: 90%; /* Adjusted width */
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px; /* Rounded corners */
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #4b0082; /* Change border color on focus */
            outline: none;
        }
        button {
            background-color: #4b0082; /* Indigo color */
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5c0f8f; /* Darker shade on hover */
        }
        p {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #333; /* Dark gray color */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Currency Converter</h2>
    <form method="POST" action="">
        <input type="number" name="amount" placeholder="Enter amount" required>
        <select name="from_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="IDR">IDR</option>
        </select>
        <select name="to_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="IDR">IDR</option>
        </select>
        <button type="submit" name="convert">Convert</button>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $amount = $_POST['amount'];
        $from_currency = $_POST['from_currency'];
        $to_currency = $_POST['to_currency'];

        // Nilai tukar sementara (update ini sesuai kebutuhan)
        $exchange_rates = [
            "USD" => ["USD" => 1, "EUR" => 0.85, "IDR" => 15000],
            "EUR" => ["USD" => 1.18, "EUR" => 1, "IDR" => 17700],
            "IDR" => ["USD" => 0.000067, "EUR" => 0.000056, "IDR" => 1],
        ];

        // Periksa jika kombinasi mata uang valid
        if (isset($exchange_rates[$from_currency][$to_currency])) {
            $rate = $exchange_rates[$from_currency][$to_currency];
            $converted_amount = $amount * $rate;
            echo "<p>Converted Amount: <strong>" . number_format($converted_amount, 2) . " $to_currency</strong></p>";
        } else {
            echo "<p>Conversion rate not available.</p>";
        }
    }
    ?>
</div>

</body>
</html>
