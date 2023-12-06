<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LatestNews;
use Carbon\Carbon;

class StudentHeadlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LatestNews::truncate();
        $now = Carbon::now();

        $headlines = array(
        array('description' =>'Bhumika Chauhan of our college on account of scoring highest marks in English was awarded shree Swaminarayan Gurukul Bhavnagar Gold plate.','description_guj' => 'અમારી કોલેજની ભૂમિકા ચૌહાણે અંગ્રેજીમાં સૌથી મોટી ગુણગણમાં સાકારી થઈ છે, અને તેને શ્રી સ્વામિનારાયણ ગુરુકુલ ભાવનગરનો ગોલ્ડ પ્લેટ અનેકા પ્રશંસા મળી છે.','sort_id' => '1','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('description' =>'Goyani Krinal stood first in university for the subject of psychology in semester second of masters','description_guj' => 'ગોયાની કૃણાલ માસ્ટર્સના દ્વિતીય સેમેસ્ટરના મનોવિજ્ઞાન વિષયમાં યુનિવર્સિટીમાં પ્રથમ સ્થાન પર રહ્યો છે.','sort_id' => '2','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('description' =>'Gohil Vibhutiba stood third in university for the subject of psychology in semester second of masters','description_guj' => 'ગોહિલ વિભૂતીબા માસ્ટર્સના દ્વિતીય સેમેસ્ટરના મનોવિજ્ઞાન વિષયમાં યુનિવર્સિટીમાં ત્રીજું સ્થાન પર રહ્યો છે.','sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),  
       array('description' =>'Sarvaiya Sheetalba stood seventh in university for the subject of psychology in semester second of masters','description_guj' => 'સરવાઇયા શીતલબા માસ્ટર્સના દ્વિતીય સેમેસ્ટરના મનોવિજ્ઞાન વિષયમાં યુનિવર્સિટીમાં સાતમું સ્થાન પર રહ્યી છે.','sort_id' => '4','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),   

        array('description' =>'Makwana Tanaz has secured first rank in school and in entire Gujarat for scoring highest in 10th boards exams from Gujrati medium section','description_guj' => 'મકવાણા તનાઝે ગુજરાતી મીડિયમ સેક્શનમાં 10મી બોર્ડ પરીક્ષાઓમાં સૌથી મોટી ગુણગણ મળાવ્યો છે અને તેને મળેલું પ્રથમ સ્થાન શિક્ષણસંસ્થાનું અને ગુજરાત સમૂહ માં.','sort_id' => '5','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),  

         array('description' =>'Solanki Ayushiba secured first rank in school for scoring highest in 10th boards exams from English medium section','description_guj' => 'સોલંકી આયુષીબાએ ઇંગ્લિશ મીડિયમ સેક્શનમાં 10મી બોર્ડ પરીક્ષાઓમાં સૌથી મોટી ગુણગણ મળાવી છે અને તેને મળેલું પ્રથમ સ્થાન શાળાનું.','sort_id' => '6','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),  

         array('description' =>'Chudasama Dityaba secured highest rank in for scoring highest in 12th boards exams from Gujarati medium section','description_guj' => 'ચુદાસમા દિત્યબાએ ગુજરાતી મીડિયમ સેક્શનમાં 12મી બોર્ડ પરીક્ષાઓમાં સૌથી મોટી ગુણગણ મળાવી છે અને તેને મળેલું સર્વોચ્ચ સ્થાન છે.','sort_id' => '7','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),  

         array('description' =>'Patel Dhruvya secured highest rank in for scoring highest in 12th boards exams from English medium section','description_guj' => 'પટેલ ધ્રુવ્યાએ ઇંગ્લિશ મીડિયમ સેક્શનમાં 12મી બોર્ડ પરીક્ષાઓમાં સૌથી મોટી ગુણગણ મળાવી છે અને તેને મળેલું સર્વોચ્ચ સ્થાન છે.','sort_id' => '8','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()), 

         array('description' =>'CDT Hiralba Chudasama who is a part of 03 GUJ AIR SQN NCC Bhavnagar completed four sorties by flying for 62 minutes','description_guj' => 'સી.ડી.ટી. હિરલબા ચુદાસમા, જે એક ભાગ છે 03 ગુજરાત વાયુયોદ્ધાયે સ્ક્વ્યાડરની એન.સી.સી. ભાવનગર માં, 62 મિનિટ માં 04 સોર્ટીઓ દ્વારા ઉડવામાં સફળ રહ્યો છે.','sort_id' => '9','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        
         array('description' =>'Niyatiba Gohil is selected for Basketball National Level in school games federation India SGIF, entitling her to attend camp in Delhi','description_guj' => 'નિયતીબા ગોહિલ એ સ્કૂલ ગેમ્સ ફેડરેશન ઇન્ડિયા (SGFI) ની બાસ્કેટબોલ નેશનલ લેવલની પસંદગી મેળવ્યું છે, જેમણે તેમને દિલ્હીમાં કેમ્પ અટેન્ડ કરવાનો અધિકાર આપ્યો છે.','sort_id' => '10','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()), 

          array('description' =>"Rajeshwariba Gohil and Rumi were honoured with Khel Veerangana award under MKBU'S Youth Talent awards",'description_guj' => 'રાજેશ્વરીબા ગોહિલ અને રૂમીને MKBU (Maharaja Krishnakumarsinhji Bhavnagar University) ની યુવા પ્રતિષ્ઠા પુરસ્કાર અંતર્ગત "ખેલ વીરાંગણા" પુરસ્કારથી સન્માન મળ્યો છે.','sort_id' => '11','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),        

        array('description' =>"Ruhi Kureshi of Gujarati medium section is selected for National Talent camp organized by Sports Authority of India",'description_guj' => 'ગુજરાતી મીડિયમ સેક્શનની રૂહી ખુરેશી ને ભારતીય ખેલ પ્રાધિકૃત નેશનલ ટેલેન્ટ કેમ્પમાં પસંદગી મળ્યો છે, જે ખેલ પ્રાધિકૃત બાળકોનું પ્રશિક્ષણ અને તયારી માટે આયોજિત થયેલ છે.','sort_id' => '12','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),        
 
       array('description' =>"Niyatiba Gohil of English medium section is awarded with prize money of 12,000 rupees by Iscon club for basketball league championship",'description_guj' => 'ઇંગ્લિશ મીડિયમ સેક્શનની નિયતીબા ગોહિલને બાસ્કેટબોલ લીગ ચેમ્પિયનશિપ માં મળેલા પ્રિઝ મની 12,000 રુપિયાનો સન્માન ઇસ્કોન ક્લબ દ્વારા આપ્યો છે.','sort_id' => '13','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()), 

       array('description' =>"Solanki Tanvi Kishorbhai of 5th standard from Gujarati Medium section stood second in Roller skating championship held in Jamnagar",'description_guj' => 'ગુજરાતી મીડિયમ સેક્શનની 5મી તમ મંગલવાર છાત્રી સોલંકી તનવી કિશોરભાઇ જામનગરમાં યોજાયેલા રોલર સ્કેટિંગ ચેમ્પિયનશિપમાં દ્વિતીય સ્થાન પર રહ્યો છે.','sort_id' => '14','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()), 
 
       array('description' =>"Solanki Drija Kishorbhai participated in open Bhavnagar Skating Championship and won a silver medal",'description_guj' => 'સોલંકી દ્રિજા કિશોરભાઇને ખુલ્લી ભાવનગર સ્કેટિંગ ચેમ્પિયનશિપમાં ભાગ લેવામાં આવ્યો હતો અને તેને વર્દી પદક મળ્યો હતો.','sort_id' => '15','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),

       array('description' =>"Rucha Bhatt of our college won 1st prize in mix doubles and 2nd in women singles in AYBA tournament",'description_guj' => 'આમારી કોલેજની રુચા ભટ્ટે એ AYBA ટૂર્નામેંટમાં મિક્સ ડબલ્સમાં પ્રથમ પ્રશસ્તિ અને મહિલા સિંગલ્સમાં બીજુ સ્થાન મેળવ્યો છે.','sort_id' => '16','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()), 


          );
        foreach ( $headlines as $key => $name) {
                    LatestNews::create($name);
                }

    }
}
