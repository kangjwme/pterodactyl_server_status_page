# 基於 Pterodactyl 製作的小型伺服器資訊版面

# 範例網頁：https://kangjw.me/mc-status/

## config.php
- 基本參數設定
- server_id：Pterodactyl 伺服器 ID，可以在網址找得到
  - 以NAFH為例，就是在 https://panel.notafree.host/server/84631080 的 84631080 這串數字
- server_ip：伺服器對外連線 IP，用於獲取伺服器人數及 MOTD
- pterodactyl_url：Pterodactyl 網址，舉例：`https://panel.notafree.host` （請務必包含 http 或是 https）
- pterodactyl_client_api：Pterodactyl 金鑰，請自行生成

丟進去通常即可使用，有任何問題請發 Issue 或通知 Discord：KJW#6666
