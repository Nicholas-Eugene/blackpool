<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            ['name' => 'Table 1'],
            ['name' => 'Table 2'],
            ['name' => 'Table 3'],
            ['name' => 'Table 4'],
            ['name' => 'Table 5'],
            ['name' => 'Table 6'],
            ['name' => 'Table 7'],
            ['name' => 'Table 8'],
            ['name' => 'Table 9'],
            ['name' => 'Table 10'],
            ['name' => 'Table 11'],
            ['name' => 'Table 12'],
            ['name' => 'Table 13'],
            ['name' => 'Table 14'],
            ['name' => 'Table 15'],
            ['name' => 'Table 16']
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
?>
