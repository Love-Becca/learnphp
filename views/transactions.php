<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- YOUR CODE -->
                <?php
                    foreach (array_slice($csvData, 1) as $csv) {
                        $timestamp = strtotime($csv[0]);
                        $formattedDate = date('M d, Y', $timestamp);
                        $formattedDate;
                        echo "<tr>";
                        echo "<td>" . $formattedDate . "</td>";
                        echo "<td>" . $csv[1] . "</td>";
                        echo "<td>" . $csv[2] . "</td>";
                        if (substr($csv[3], 0, 1) === '-') {
                            echo "<td style='color:red'>" . $csv[3] . "</td>";
                        }else{
                            echo "<td style='color:green'>" . $csv[3] . "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?php echo "$".$amount ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?php echo substr((string)$expense, 0, 1)."$".substr((string)$expense, 1) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?php echo "$".$netTotal ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
