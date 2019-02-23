<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 运行数据填充，网站必须的数据
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuTableSeeder::class,
            CategoryTableSeeder::class
        ]);
    }
}
