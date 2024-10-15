請輸入YouTube 影片 ID：<br>
https://www.youtube.com/watch?v=<b style="color:red;">dQw4w9WgXcQ</b><br>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="text" name="videoId" value=""><br>
    <button type="submit">送出</button>
</form>

<?php
date_default_timezone_set("Asia/Taipei");
if (!empty($_POST['videoId']) ){
    // 使用完整的 Python 路徑
    $pythonPath = 'python'; // 替換成你的 Python 路徑
    $pythonScript = '/subtitle.py'; // 替換成你的腳本路徑

    $videoId = $_POST['videoId'];

    // 使用 exec() 執行 Python 腳本，並將影片 ID 作為參數
    $output = [];
    $returnVar = 0;
    exec("$pythonPath $pythonScript $videoId", $output, $returnVar);

    // 檢查是否成功執行
    if ($returnVar === 0) {
        echo '<textarea cols="60" rows="0">';
        foreach ($output as $line) {
            echo htmlspecialchars($line) . PHP_EOL;
        }
        echo '</textarea>';
    } else {
        echo "執行 Python 腳本失敗，錯誤代碼：$returnVar";
    }
}
?>