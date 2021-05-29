各支程式的主要用途：
- addBoard.php:新增看板
- admin.php:管理管理員
- edit_profile.php:修改使用者資料
- hw5.php:討論版首頁
- login.php:登入
- logout.php:登出
- pdoInc.php:連接資料庫
- register.php:註冊
- viewBoard.php:瀏覽看板
- viewThread.php:瀏覽主題

有做的加分功能：
- 管理員可動態開板
- 管理員可以任免新的管理員(有防呆，不能自我免職)
- 一般用戶可編輯**和**刪除自己的回應
    如何避免用戶編輯/刪除他人回應:檢查session和回應帳號是否一致
- 積分制度(發表或回應加分)
- 主題可設定閱讀權限

刪除功能如何控管權限：檢查session，看登入者是否為管理員
