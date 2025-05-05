<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class ReservasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Reservasi
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('/home')
                    ->type('Nama', 'Afta')
                    ->type('Nomor WhatsApp','08158848031')
                    ->select('Pilih Layanan','layanan')
                    ->press('Kirim')
                    ->type('Merk HP','Iphone')
                    ->type('deskripsi kasus','LCD Rusak')
                    ->clickLink('[src="'.url('images/copas.png').'"]')
                    ->assertSee('Success!');
        });
    }
}
