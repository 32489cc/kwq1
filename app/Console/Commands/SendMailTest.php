<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Models\AppointmentModel;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'メールを定期的に配信する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $twentyFourHoursLater = $now->copy()->addHours(24);
        $appointments=AppointmentModel::query()->where('appointment_time','>',$now)
            ->where('appointment_time','<=',$twentyFourHoursLater)->get()->toArray();



                foreach ($appointments as $appointment){
                    if($appointment['send_flg']===0){
                        AppointmentModel::query()->where('appointment_id',$appointment['appointment_id'])
                            ->update(['send_flg'=>1]);

                        Mail::to('1254902153gxc@gmail.com')->send(new SendMail($appointment));
                    }else{
                        return  false;
                    }
                }



//        $contents='定期連絡メールで、返信不要です';
//        Mail::to('1254902153gxc@gmail.com')->send(new SendMail($contents));

    }
}
