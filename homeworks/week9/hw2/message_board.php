<html>
    <header>
        <title>主頁面</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
        <nav class="bar">
        <input class="btn from__end" type="button" value="New"> 
            <input class="btn from__start" type="button" value="Begin"> 
            <input class="btn create__story" type="button" value="Create" onclick="location.href='message_board.php'"> 
            <input class="btn create__member" type="button" value="Log in" onclick="location.href='member_login.php'">
            <input class="btn create__member" type="button" value="Sign up" onclick="location.href='member_create.php'">
        </nav>
        <div class="wrapper">
            <h1>Walk here and write your story</h1>
            <div>
                <div class="sign__up">
                    <div class="register">
                        <form  method="POST" action="./handle_article.php">
                            <div><h2>請輸入標題 :</h2><input name="title" /></div>
                            <div><h2>請輸入文章 :</h2> 
                                <textarea rows="20" cols="20" name="content">
                                在w3school，你可以找到你所需要的所有的網站建設教程。
                                </textarea>
                            </div>
                            <div><input type="submit" value="送出文章" /></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>