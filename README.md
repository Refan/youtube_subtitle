# YouTube 字幕獲取工具

## 重要事項

### 路徑
請確保將 `pythonPath`、`$pythonScript` 替換為您實際的 Python 腳本路徑。

### Python 執行環境
確保您的伺服器上已安裝 Python 及 `youtube_transcript_api` 模組。您可以使用以下命令安裝所需的模組：
```bash
pip install youtube-transcript-api
```

### PHP 設定
確保 PHP 擁有執行 Python 腳本的權限，並且已正確配置執行環境。

### 使用說明
當您執行 PHP 腳本時，它會通過 `exec()` 函數調用 Python 腳本，並顯示從 YouTube 影片獲取的字幕。
