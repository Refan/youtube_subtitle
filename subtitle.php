請輸入YouTube 影片 ID：<br>
https://www.youtube.com/watch?v=dQw4w9WgXcQ<br>
<form method="POST" action="" enctype="multipart/form-data">
    <input style="width:400;" type="text" name="videoUrl" placeholder="請輸入完整的 YouTube 影片連結"><br>
    <button type="submit">送出</button>
</form>

<?php
date_default_timezone_set("Asia/Taipei");
if (!empty($_POST['videoUrl']) ){
    // 使用完整的 Python 路徑
    $pythonPath = '/Users/xxxx/opt/anaconda3/bin/python'; // 替換成你的 Python 路徑
    $pythonScript = '/Users/xxxx/Projects/localhost/youtube_subtitle/subtitle.py'; // 替換成你的腳本路徑

    $videoUrl = $_POST['videoUrl'];

    if (!empty($videoUrl)){
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $query);
        $videoId = $query['v'] ?? '';
    }

    // 使用 exec() 執行 Python 腳本，並將影片 ID 作為參數
    $output = [];
    $returnVar = 0;
    exec("$pythonPath $pythonScript $videoId", $output, $returnVar);

    // 檢查是否成功執行
    if ($returnVar === 0) {
        echo '<textarea cols="60" rows="30">';
        foreach ($output as $line) {
            echo htmlspecialchars($line) . PHP_EOL;
        }
        echo '</textarea>';
    } else {
        echo "執行 Python 腳本失敗，錯誤代碼：$returnVar";
    }
}
?>