# 簡介

大致上這份五子棋作業的判斷思路都在以下「2019/9/14 心得部分」，所以這邊就不贅述，來談談這份作業我學到了 React 的概念

首先在 App Component 部分的 state 只簡單控制兩個東西，即「當前下棋玩家」`nextIsBlack` 與 `gameIsOver` 的 Boolean

而這一部分 render 的則是棋盤本身，棋盤本身我是怎麼做的呢？

我的每一個 Square 是長這樣的:

![](https://upload.cc/i1/2019/09/18/VohXMx.jpg)

這個 `<div>` 裡面還包著 `<div className="x-line"></div>` 與 `<div className="y-line"></div>`，調整 CSS 讓他們變得又細又長並分別上下與垂直置中，而下的棋子我就可以放在正中間，而我「下棋」的方式就只是讓原本沒有 Class 的 `<div>`元素加上 Class 而已。

但這樣做會有一個問題，那就是棋盤邊邊會有凸出的線，這邊我就沒有在想要怎麼解了，打算結束之後去觀摩同學做的，畢竟重點是在 React

而移動會有落子光標的部分則是使用 CSS `:hover`，這也很基礎，看到同學成品有做自己試著模仿的 XD

程式碼的部分，我覺得 `judgeWinner(id)` 內中很多函式還是可以包在一起寫，只是分開寫出來比較好個別註解 (但應該也沒必要)

大概就是這樣，以下談一個我沒有做的功能：悔棋功能

這個功能我自己沒有寫出來，但我認為應該可以這樣寫：

1. 將回合從一個單純的數字變成一個陣列，陣列中有每一回合的棋譜

2. 棋譜要怎麼做呢 ? 因為我的棋盤上每一個 Square 都有 id，而每一個 Square 也都有自己的棋子顏色 : `black`、`white` 或是為空`''`

3. 承上，將回合數視作「回合」這個陣列的索引，而每個元素就是每一回合的棋譜，棋譜本身是一個 19*19 共的物件陣列`[{...},{...},{...}...]`

4. 依照「回合」陣列 render 出按鈕就好

仔細想想覺得不難，但礙於時間就沒有做了，或許這不是最好的解法，但我會這樣寫啦

另外中文字寫出來可能也有點用詞誤差，但概念差不多是這樣子

作業部分就到這邊，這份五子棋判斷獲勝的方式請接著下看
-----

# 2019/9/14 心得部分

解題思路大概是

1. React 的教程，也就是圈圈叉叉，是直接給定獲勝情形，然後去比對這樣，但是 19*19 棋盤格太大，而且又只取其中五子連線，不太可能去列出所有獲勝情形

2. 獲勝的方式有橫線五子，直線五子，左上->右下斜五子，左下->右上斜五子，可以讓程式直接去掃整個棋盤，但我覺得這樣太耗效能了

3. 於是我突然想到，上述這四種連線五子的獲勝棋譜「一定會通過我當下落下的那枚棋子」，所以我只要以落下的為中心，往四面八方延伸出去，獲勝的五子一定會是以下範圍之內：

![](https://upload.cc/i1/2019/09/14/kKToyv.jpg)

4. 承上，雖然還有想到更想做的解法，也就是只找落點向外延伸最多四步的棋譜，但是寫起來實在太麻煩了，就沒有這樣做：

![](https://upload.cc/i1/2019/09/14/YRdWge.jpg)

5. 但問題來了，這樣做我會需要判斷這四條線的起點，畢竟由起點開始找到終點，才能找到範圍內所以獲勝的棋子

![](https://upload.cc/i1/2019/09/14/FnTvhJ.jpg)

所以我需要一落棋，就能找到圖中四條線的起點 ..... 於是花了不少張紙來計算，順帶一提，我的棋盤產生是一維棋盤，但即使是這樣還是可以算出 x 座標與 y 座標，在歷經十小時之後，終於被我找到起點了！

以下就是一落棋子就可以找到起點的 DEMO :

![](https://upload.cc/i1/2019/09/14/i87LUD.gif)

獲得起點之後，我把這四條線弄成四個陣列，最後用一個函式去掃這四個陣列中，若有連續五個元素相同且顏色等於黑或白，則獲勝，遊戲結束

----



