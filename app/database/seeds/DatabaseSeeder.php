<?php

/**
 * Class DatabaseSeeder
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        // usersTableSeedersを実行する様指示
        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded');
    }
}
