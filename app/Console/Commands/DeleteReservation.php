<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\reservation;

class DeleteReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * اسم الامر 
     * php artisan delete:reservation // مثلا
     */
    protected $signature = 'delete:reservation';

    /**
     * The console command description.
     * الوصف بعد تنفيذ الامر
     * @var string
     */
    protected $description = 'Reservation deleted successfully';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     *  الشي المراد تنفيذة
     * 
     * @return mixed
     */
    public function handle()
    {
        // now()->addDays(3) يزد 3 ايام ع اليوم
        // now()->subDays(3) ينقص 3 ايام ع اليوم

        $reservation = reservation::where('flag','=',0)
                        ->where('created_at', '<', now()->subDays(3))
                        ->delete();

        $this->info('Reservation deleted successfully');
    }
}
