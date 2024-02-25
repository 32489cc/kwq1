<?php

namespace App\Console\Commands;

use App\Models\UnivModel;
use Illuminate\Console\Command;

class UnivInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'univ:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array=[
            'univ_typ'=>'1',
            'univ_cd4'=>'1100',
            'univ_name'=>'横浜市立大学',
            'univ_typ_name'=>'大',
            'univ_kana'=>'よこはましりつ',
            'univ_atena'=>'横浜市立大学',
            'univ_chg_typ'=>'0',
            'establish_y'=>'1949',
        ];
        UnivModel::insert_univ($array);
    }
}
