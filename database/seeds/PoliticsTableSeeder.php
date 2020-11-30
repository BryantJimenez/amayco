<?php

use Illuminate\Database\Seeder;

class PoliticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $politics = [
            ['id' => 1, 'booking' => '<ul><li>El 50% del total de las reserva debe ser pre-pagado en concepto de seña al momento de la realización de la reserva.</li><li>El saldo deberá ser abonado al menos 1 día previo al servicio.</li><li>Todas las reservas deben ser pre-pagadas para ser consideradas confirmadas.</li></ul>', 'cancellations' => '<ul><li>Toda cancelación realizada dentro de los 15 días previos a la llegada del pasajero, no sufrirá penalidad.</li><li>Toda cancelación realizada hasta los 5 días previos a la llegada del pasajero, tendrá una penalidad equivalente al 30% del total de la reserva.</li><li>Toda cancelación realizada dentro de los 4 días previos a la llegada del pasajero, tendrá una penalidad equivalente al 100% de la reserva.</li><li>Todo cambio a realizar sobre reservas confirmadas a través del pago parcial o total quedará sujeto a la disponibilidad de AMAYCO Turismo y Expediciones.</li></ul>', 'slug' => 'politicas', 'language_id' => 1],
            ['id' => 2, 'booking' => '<ul><li>50% of the total reservation must be prepaid as a down payment at the time of making the reservation.</li><li>The balance must be paid at least 1 day prior to the service.</li><li>All reservations must be prepaid to be considered confirmed.</li></ul>', 'cancellations' => '<ul><li>Any cancellation made within 15 days prior to the arrival of the passenger will not suffer a penalty.</li><li>Any cancellation made up to 5 days prior to the arrival of the passenger, will have a penalty equivalent to 30% of the total reservation.</li><li>Any cancellation made within the 4 days prior to the arrival of the passenger, will have a penalty equivalent to 100% of the reservation.</li><li>Any changes to be made on confirmed reservations through partial or total payment will be subject to the availability of AMAYCO Turismo y Expediciones.</li></ul>', 'slug' => 'politicas-0', 'language_id' => 2]
        ];
        DB::table('politics')->insert($politics);
    }
}
