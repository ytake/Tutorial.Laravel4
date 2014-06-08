## Tutorial Application
###for Laravel4.2
Laravel4のチュートリアルアプリケーションサンプルです。  
簡易的な管理機能のついたブログ投稿アプリケーションです。  
app/App配下をPSR-4としていますので、dump-autoloadは不要です。  

##含まれる実装
**router**:名前空間や、namedを用いたルーティング  
**filter**:カスタムフィルターの実装や、認証フィルターの使用方法など  
**controller**:ベーシックなコントローラー、リソースコントローラーを含みます  
**model**:当アプリケーションではモデル という括りでは使用していません  
  Repositoriesを参照してください  
**authenticate**:認証はEloquentを用いたベーシックなもので実装  
**form**:登録 実行 確認、validateを含みます

databaseはsqliteを使用しているため、お手元で動作確認が可能です  

##URL
###実装されたURI
**/api/v1/article[GET]** jsonでブログ記事一覧を返却  
**/api/v1/article/{article}[GET]** jsonで任意の記事を返却  
**/[GET]** ホーム  
**/managed/login[GET]** 管理画面ログイン  
**/managed/logout[GET]** 管理画面ログアウト  
**managed/[GET]** 管理画面ホーム
**managed/article[GET]** 管理画面ブログ記事一覧  

詳細については、  
```bash
$ php artisan routes
```
で確認してください。
##利用方法
###install
composerは別途インストールしてください
```bash
$ composer update
# or
$ composer install
```
###permission
app/storage　の実行権限を忘れずに
```bash
$ chmod -R 777 app/storage
```
###初期設定
認証を用いるため、必ずキーを作成する必要があります  
```bash
$ php artisan key:generate
```
データベースを作成します
```bash
$ php artisan migrate
```
データベースに初期値を挿入します
```bash
$ php artisan db:seed
```
ビルトインサーバでアプリケーションを動作させます
```bash
$ php artisan serve
```
**http://localhost:8000** でアクセス可能です。  
portを変更したい場合は任意のポートを指定してください。  

ログインに必要なアカウント情報は、  
**user_name:tutorial**  
**password:tutorial**  
です。
