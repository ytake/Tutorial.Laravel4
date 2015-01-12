<?php

/**
 * usersテーブルにデータを挿入します。
 * アプリケーションで必要とする初期データとなります。
 * Class UsersTableSeeder
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::connection()->table('users')->delete();
        // username:tutorial, password:tutorialで作成します
        // created user data username:tutorial, password:tutorial
        $params = [
            'user_name' => 'tanaka@sai-net.jp',
            'password' => \Hash::make('rikitakeuchi'),
            'remember_token' => '',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ];
        \DB::connection()->table('users')->insert($params);
    }

}
