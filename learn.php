<html>
    <head>
        <title>Learn Language Website</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/learn.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
                // Initialize global variables
                $rows = [];
                $rowNumber = 0;
                // Read csv file
                if (($handle = fopen('notes.csv', 'r')) !== false) {
                    while (($_row = fgetcsv($handle, 1000, ',')) !== false) {
                        array_push($rows, $_row);
                    }
                    fclose($handle);
                }
                $row = $rows[$rowNumber];
                function nextRow($_rowNumber)
                {
                    global $rowNumber, $row, $rows;
                    $rowNumber = $_rowNumber;
                    $row = $rows[$_rowNumber];
                }
                if (isset($_GET['row'])) {
                    nextRow($_GET['row']);
                }
            ?>
            <table class="table">
                <tbody>
                    <tr>
                        <td>英語</td>
                        <td><?php echo trim($row[0]); ?></td>
                    </tr>
                    <tr>
                        <td>漢語</td>
                        <td><?php echo trim($row[1]); ?></td>
                    </tr>
                    <tr>
                        <td>日語</td>
                        <td><?php echo trim($row[2]); ?></td>
                    </tr>
                    <tr>
                        <td>韓語</td>
                        <td><?php echo trim($row[3]); ?></td>
                    </tr>
                    <tr>
                        <td>英語發音</td>
                        <td><audio controls><source src="en/<?php echo trim($row[0]); ?>.mp3" type="audio/mpeg"></audio></td>
                    </tr>
                    <tr>
                        <td>漢語發音</td>
                        <td><audio controls><source src="zh-tw/<?php echo trim($row[0]); ?>.mp3" type="audio/mpeg"></audio></td>
                    </tr>
                    <tr>
                        <td>日語發音</td>
                        <td><audio controls><source src="ja/<?php echo trim($row[0]); ?>.mp3" type="audio/mpeg"></audio></td>
                    </tr>
                    <tr>
                        <td>韓語發音</td>
                        <td><audio controls><source src="ko/<?php echo trim($row[0]); ?>.mp3" type="audio/mpeg"></audio></td>
                    </tr>
                    <tr>
                        <td>進度</td>
                        <td><a href='learn.php?row=<?php echo $rowNumber + 1; ?>'><?php echo $rowNumber.'/'.count($rows); ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>