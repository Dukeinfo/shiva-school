<?php

namespace Database\Seeders;

use App\Models\Facilities;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$facilities = array(
		array('title' => 'Library','description' => '<p>Boasting a collection of 18,000 books, the library is a sacred place, a temple of knowledge, which is open and accessible to all students</p>','title_guj' => 'પુસ્તકાલય','description_guj' =>'18,000 પુસ્તકોના સંગ્રહની ગૌરવ સાથે, પુસ્તકાલય એક પવિત્ર સ્થળ છે, જ્ઞાનનું મંદિર છે, જે તમામ વિદ્યાર્થીઓ માટે ખુલ્લું અને સુલભ છે','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:20:29','updated_at' => '2023-08-04 17:20:29'),

		array('title' => 'Computer Laboratory','description' => '<p>The computer laboratory is essential in the current curriculum for students and we take great pride in our computer lab</p>','title_guj' => 'કોમ્પ્યુટર લેબોરેટરી','description_guj' =>'વિદ્યાર્થીઓ માટે વર્તમાન અભ્યાસક્રમમાં કોમ્પ્યુટર લેબોરેટરી આવશ્યક છે અને અમે અમારી કોમ્પ્યુટર લેબ પર ખૂબ ગર્વ અનુભવીએ છીએ','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '2','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:20:29','updated_at' => '2023-08-04 17:20:29'),

        array('title' => 'Science Laboratory','description' => '<p>Performing experiments by one’s own hand, helps students understand the concepts of science with more clarity</p>','title_guj' => 'વિજ્ઞાન પ્રયોગશાળા','description_guj' =>'પોતાના હાથે પ્રયોગો કરવાથી વિદ્યાર્થીઓને વિજ્ઞાનના ખ્યાલોને વધુ સ્પષ્ટતા સાથે સમજવામાં મદદ મળે છે','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:20:29','updated_at' => '2023-08-04 17:20:29'),

          array('title' => 'Prayer Hall','description' => '<p>Prayer hall is an essential place for students to gather everyday before the school starts to indulge into a melodious experience</p>','title_guj' => '
			પ્રાર્થના હોલ','description_guj' =>'પ્રેયર હોલ એ વિદ્યાર્થીઓ માટે રોજેરોજ ભેગા થવા માટેનું એક આવશ્યક સ્થળ છે, તે પહેલાં શાળા એક મધુર અનુભવમાં સામેલ થવાનું શરૂ કરે છે.','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '4','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:20:29','updated_at' => '2023-08-04 17:20:29'),

          

        );
		  foreach ( $facilities as $key => $name) {
		            Facilities::create($name);
		   }
    }
}
