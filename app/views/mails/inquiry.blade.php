<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>【お問い合わせ】{{ $inquiry_title }}</h2>
 
        <div>
            <ui>
                <li>メールアドレス：<p>{{ $inquiry_email }}</p></li>
                <li>お名前：<p>{{ $inquiry_name }}</p></li>
                <li>タイトル：<p>{{ $inquiry_title }}</p></li>
                <li>本文：<p>{{ $inquiry_body }}</p></li>
            </ui>
        </div>
    </body>
</html>