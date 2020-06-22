<html>
<head>
    <title>Learn Language Website</title>
</head>
<body>
    <?php
        if (($handle = fopen('notes.csv', 'r')) !== false) {
            $mode = 2;
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                echo '┌────────────────────┐<br />';
                // en
                echo '│en: '.trim($data[0]).'<br />';
                if ($mode == 1) {
                    echo '<audio controls><source src="en/'.trim($data[0]).'.mp3" type="audio/mpeg"></audio><br />';
                }
                // zh-tw
                echo '│zh-tw: '.trim($data[1]).'<br />';
                if ($mode == 1) {
                    echo '<audio controls><source src="zh-tw/'.trim($data[0]).'.mp3" type="audio/mpeg"></audio><br />';
                }
                // ja
                echo '│ja: '.trim($data[2]).'<br />';
                if ($mode == 1) {
                    echo '<audio controls><source src="ja/'.trim($data[0]).'.mp3" type="audio/mpeg"></audio><br />';
                }
                // ko
                echo '│ko: '.trim($data[3]).'<br />';
                if ($mode == 1) {
                    echo '<audio controls><source src="ko/'.trim($data[0]).'.mp3" type="audio/mpeg"></audio><br />';
                }
                echo '└────────────────────┘<br />';
                if ($mode == 2) {
                    echo '<audio controls><source src="en/'.trim($data[0]).'.mp3" type="audio/mpeg"></audio><br />';
                }
            }
            fclose($handle);
        }
    ?>
</body>
</html>