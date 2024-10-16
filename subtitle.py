import sys
from youtube_transcript_api import YouTubeTranscriptApi
from urllib.parse import urlparse, parse_qs

# 解析 YouTube 影片網址並提取影片 ID
def extract_video_id(url):
    parsed_url = urlparse(url)
    query_params = parse_qs(parsed_url.query)
    return query_params.get('v', [None])[0]

# 顯示字幕
def display_transcript(video_id):
    # 使用傳入的 YouTube video ID
    key = video_id
    if not key:
        print("無效的 YouTube 影片 ID。")
        return
    
    try:
        srt = YouTubeTranscriptApi.get_transcript(key, languages=['zh-Hant'])
    except Exception as e:
        print("獲取字幕失敗：", e)
        print("請確認影片是否有字幕或語言設定是否正確。")
        return
    
    # 顯示字幕內容
    for item in srt:
        if item['text'] not in ["[Music]", "[Laughter]"]:
            print(item['text'])

if __name__ == "__main__":
    if len(sys.argv) > 1:
        video_id = sys.argv[1]  # 獲取從 PHP 傳入的影片 ID
        display_transcript(video_id)
    else:
        print("請提供 YouTube 影片 ID。")
