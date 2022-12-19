<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [  'Cod' => '469', 'name'  => 'ACOTRON INGENIERIA, S.L.', 'abbreviated' => 'ACOTRON', 'nif' => 'B72146897' ],
            [  'Cod' => '11', 'name'  => 'A.G. FARMA, S.A', 'abbreviated' => 'A.G. FARMA', 'nif' => 'A80628266' ],
            [  'Cod' => '0005', 'name'  => 'ALTER FARMACIA, S.A.', 'abbreviated' => 'ALTER', 'nif' => 'A80932361' ],
            [  'Cod' => '0277', 'name'  => 'ANDROS GRANADA, S.L.U', 'abbreviated' => 'ANDROS', 'nif' => 'B86747599' ],
            [  'Cod' => '0093', 'name'  => 'LABORATORIOS ANTEA, S.A', 'abbreviated' => 'ANTEA', 'nif' => 'A78237393' ],
            [  'Cod' => '0157', 'name'  => 'ANTONIO PUIG, S.A', 'abbreviated' => 'ANTONIO PUIG', 'nif' => 'A08158289' ],
            [  'Cod' => '0483', 'name'  => 'AZACONSA, S.L.', 'abbreviated' => 'AZACONSA', 'nif' => 'B03189677' ],
            [  'Cod' => '0429', 'name'  => 'AB AZUCARERA IBERIA, SL.U', 'abbreviated' => 'AZUCARERA', 'nif' => 'B78373511' ],
            [  'Cod' => '0106', 'name'  => 'BIOCOSMETICS LABORATORIES', 'abbreviated' => 'BIOCOSMETICS', 'nif' => 'B80924632' ],
            [  'Cod' => '0381', 'name'  => 'B&S CODAGE', 'abbreviated' => 'CODAGE', 'nif' => 'FR81519259162' ],
            [  'Cod' => '0264', 'name'  => 'CANTABRIA LABS SPAIN', 'abbreviated' => 'CANTABRIA LABS', 'nif' => 'A39000914' ],
            [  'Cod' => '0014', 'name'  => 'CATALYSIS, S.L', 'abbreviated' => 'CATALYSIS', 'nif' => 'B81880353' ],
            [  'Cod' => '0351', 'name'  => 'CERAMICAS ARCOLA, S.L.', 'abbreviated' => 'CERAMICAS ARCOLA', 'nif' => 'B46147856' ],
            [  'Cod' => '0457', 'name'  => 'CEVAG LIQUIDOS, S.L.', 'abbreviated' => 'CEVAG', 'nif' => 'B88252903' ],
            [  'Cod' => '0031', 'name'  => 'LABORATORIOS CHANTELET, S.A.', 'abbreviated' => 'CHANTELET', 'nif' => 'A28445682' ],
            [  'Cod' => '0059', 'name'  => 'CHEMIGROUP FRANCE', 'abbreviated' => 'CHEMIGROUP', 'nif' => 'N0016442F' ],
            [  'Cod' => '0493', 'name'  => 'HC CLOVER PRODUCTOS Y SERVICIOS, S.L.', 'abbreviated' => 'CLOVERTY', 'nif' => 'B85318319' ],
            [  'Cod' => '0198', 'name'  => 'LABORATORIOS COSMODENT, S.L', 'abbreviated' => 'COSMODENT', 'nif' => 'B39364583' ],
            [  'Cod' => '0494', 'name'  => 'FORVIL FRANCE SARL', 'abbreviated' => 'FORVIL', 'nif' => 'FR16882969629' ],
            [  'Cod' => '0044', 'name'  => 'FRIDDA DORSCH. S.L.', 'abbreviated' => 'FRIDDA', 'nif' => 'B78854999' ],
            [  'Cod' => '0025', 'name'  => 'GLOBAL FOOD, S.L', 'abbreviated' => 'GLOBAL FOOD', 'nif' => 'B86117850' ],
            [  'Cod' => '0177', 'name'  => 'HEBER FARMA, S.L.', 'abbreviated' => 'HEBER FARMA', 'nif' => 'B82976820' ],
            [  'Cod' => '0092', 'name'  => 'INDUXTRA DE SUMINISTROS, S.A.', 'abbreviated' => 'INDUXTRA', 'nif' => 'A17055153' ],
            [  'Cod' => '0203', 'name'  => 'ISDIN. S.A.', 'abbreviated' => 'ISDIN', 'nif' => 'A08291924' ],
            [  'Cod' => '495', 'name'  => 'J2, S.L.', 'abbreviated' => 'J2 - SAMPLING', 'nif' => 'B16984510' ],
            [  'Cod' => '0371', 'name'  => 'LABORATORIOS BETAMADRILEÑO, S.L.', 'abbreviated' => 'LAB. BETAMADRILEÑO', 'nif' => 'B81196024' ],
            [  'Cod' => '0063', 'name'  => 'LABORATORIOS AGRUPADOS, A.I.E.', 'abbreviated' => 'LAB. AGRUPADOS', 'nif' => 'G82145137' ],
            [  'Cod' => '0288', 'name'  => 'LABORATORIOS ALTER, S.A.', 'abbreviated' => 'LAB. ALTER', 'nif' => 'A80932338' ],
            [  'Cod' => '002', 'name'  => 'PRODUCTOS CAPILARES LOREAL, S.A.', 'abbreviated' => 'LOREAL', 'nif' => 'A82177973' ],
            [  'Cod' => '0232', 'name'  => 'NUA BIOLOGICAL INNOVATIONS. S.L.', 'abbreviated' => 'NUA', 'nif' => 'B26355446' ],
            [  'Cod' => '0350', 'name'  => 'NUTRIS INGREDIENTS, S.L.', 'abbreviated' => 'NUTRIS', 'nif' => 'B86710258' ],
            [  'Cod' => '0040', 'name'  => 'OLEOSALGADO.S.A.', 'abbreviated' => 'OLEOSALGADO', 'nif' => 'A91399774' ],
            [  'Cod' => '0491', 'name'  => 'PRODUCTOS PERSAGA, SL.L.', 'abbreviated' => 'PERSAGA', 'nif' => 'B03303534' ],
            [  'Cod' => '0342', 'name'  => 'PERFUMES Y DISEÑO COMERCIAL.S.L.', 'abbreviated' => 'PYD', 'nif' => 'B81061616' ],
            [  'Cod' => '0161', 'name'  => 'PIELES Y TEJIDOS COMBINADOS, S.L.', 'abbreviated' => 'PYTECO', 'nif' => 'B28816247' ],
            [  'Cod' => '0055', 'name'  => 'QUINSU, S.L.', 'abbreviated' => 'QUINSU', 'nif' => 'B21151576' ],
            [  'Cod' => '0256', 'name'  => 'BEAUTYGE SPAIN, S.L. (REVLON)', 'abbreviated' => 'REVLON', 'nif' => 'B08000135' ],
            [  'Cod' => '0250', 'name'  => 'SAMPLING INNOVATIONS EUROPE UK.', 'abbreviated' => 'SAMPLING UK.', 'nif' => 'GB179115787' ],
            [  'Cod' => '0197', 'name'  => 'SAMPLING INNOVATIONS EUROPE, S.L.', 'abbreviated' => 'SAMPLING EU.', 'nif' => 'B65045932' ],
            [  'Cod' => '0228', 'name'  => 'SUPRACAFE, S.A.', 'abbreviated' => 'SUPRACAFE', 'nif' => 'A79433405' ],
            [  'Cod' => '0299', 'name'  => 'SURIVAN FEEL THE TASTE S.L.', 'abbreviated' => 'SURIVAN', 'nif' => 'B73790347' ],
            [  'Cod' => '0442', 'name'  => 'THE LOVE EXPERTS, S.L.', 'abbreviated' => 'THE LOVE EXPERTS', 'nif' => 'B93647659' ],
            [  'Cod' => '0190', 'name'  => 'LABORATORIOS THEA, S.A.', 'abbreviated' => 'THEA', 'nif' => 'A60917028' ],
            [  'Cod' => '0344', 'name'  => 'TOUS PERFUMES,S A.', 'abbreviated' => 'TOUS', 'nif' => 'A82722042' ],
            [  'Cod' => '0480', 'name'  => 'TWIN TEAM CONSULTING 7 S.L.', 'abbreviated' => 'TWIN TEAM', 'nif' => ' B67545871' ],
            [  'Cod' => '0258', 'name'  => 'LABORATORIOS VAZA. S.L.', 'abbreviated' => 'VAZA', 'nif' => 'B57147969' ],
            [  'Cod' => '0058', 'name'  => 'WEIDER NUTRICION, S.L.', 'abbreviated' => 'WEIDER', 'nif' => 'B81523888' ],


           ];

           foreach($customers as $customer){
            Customer::create($customer);
        }
    }
}
