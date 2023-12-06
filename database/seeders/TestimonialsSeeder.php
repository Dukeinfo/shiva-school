<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonials;
use Carbon\Carbon;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonials::truncate();
        $now = Carbon::now();

        $testimonials = array(
        array('name' => 'Rajeshwariba Jadeja','name_guj' => 'રાજેશ્વરીબા જાડેજા','position' => 'Music Teacher, Christ School, Rajkot','position_guj' => 'સંગીત શિક્ષક, ક્રાઈસ્ટ સ્કૂલ, રાજકોટ' ,'description' =>'One of the most memorable times I have spent was at my School Shri Nandkuvarba Kshatriya Kanya Vidhyalaya. It holds a very special place in my heart. Especially the hostel life. Although the theoretical knowledge has played a key role in my career, The Importance of sports at School cannot be undermined in developing my personality. While All the staff members are dearly remembered, one special person who has taught me lifelong lessons was our Respected principle Vachinididi.','description_guj' =>"મારી શાળા શ્રી નંદકુંવરબા ક્ષત્રિય કન્યા વિદ્યાલયમાં મેં વિતાવેલો સૌથી યાદગાર સમય હતો. તે મારા હૃદયમાં ખૂબ જ વિશિષ્ટ સ્થાન ધરાવે છે. ખાસ કરીને હોસ્ટેલ લાઈફ. સૈદ્ધાંતિક જ્ઞાને મારી કારકિર્દીમાં મુખ્ય ભૂમિકા ભજવી હોવા છતાં, મારા વ્યક્તિત્વના વિકાસમાં શાળામાં રમતગમતનું મહત્વ ઓછું કરી શકાતું નથી. જ્યારે સ્ટાફના તમામ સભ્યોને ખૂબ જ યાદ કરવામાં આવે છે, ત્યારે એક ખાસ વ્યક્તિ કે જેણે મને જીવનભરના પાઠ શીખવ્યા હતા તે અમારા આદરણીય સિદ્ધાંત વાચીનીદીદી હતા.",'rating' => '5','sort_id' => '1','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),

         array('name' => 'Riddhiba Harshjitsinh Vala','name_guj' => 'રિદ્ધિબા હર્ષજીતસિંહ વાલા','position' => 'MBBS, Critical Care Fellow, Sterling Hospital Ahmedabad','position_guj' => 'MBBS, ક્રિટિકલ કેર ફેલો, સ્ટર્લિંગ હોસ્પિટલ અમદાવાદ' ,'description' =>'As a student my school life in shri Nandkuvarba kshatriya kanya vidhyalaya was the best life. It was the golden period of learning and it had truly impacted my life very positively. Whenever I thought about it ,one face constantly comes in my mind, our principal shri vachinididi, my inspiration and exemplar.

		SNKKV has blessed me with many good friends, teachers and many more, their memories remain with me for the rest of my life. For me these days are like an invaluable treasure.

		My school life is a wonderful chapter in my memories because I learned dedication, hard work, motivation and self-actualization. The school years were also the period in which I started working hard towards my goals. One of my best high school memories was the day when I won a prize as a best student of the school. It was a moment of pride for me, as well as for my parents and for my school. The principal of our school Shree Vachinididi gave me a shield of self-confidence and boldness which I still have and treasure to this day.

		I still have a lot of pictures we took in school which remind me of all the good memories I made. I remember celebration of different days we celebrated and the extracurricular activities I took part in. I remember how happy my parents, Vachinididi, my teachers and my friends were when I became the top achiever in my entire school.

		Whatever I am today is because of best lesson of life I learned from my school and my principal Vachinidi','description_guj' =>"એક વિદ્યાર્થી તરીકે શ્રી નંદકુંવરબા ક્ષત્રિય કન્યા વિદ્યાલયમાં મારું શાળા જીવન શ્રેષ્ઠ હતું. તે શીખવાનો સુવર્ણ સમય હતો અને તેણે ખરેખર મારા જીવન પર ખૂબ જ સકારાત્મક અસર કરી હતી. જ્યારે પણ હું તેના વિશે વિચારું છું, ત્યારે મારા મગજમાં સતત એક ચહેરો આવે છે, અમારા આચાર્ય શ્રી વચનિદીદી, મારા પ્રેરણા અને અનુકરણીય.

SNKKV એ મને ઘણા સારા મિત્રો, શિક્ષકો અને ઘણા બધા સાથે આશીર્વાદ આપ્યા છે, તેમની યાદો મારા બાકીના જીવન માટે મારી સાથે રહેશે. મારા માટે આ દિવસો અમૂલ્ય ખજાના જેવા છે.

મારું શાળા જીવન મારી યાદોમાં એક અદ્ભુત પ્રકરણ છે કારણ કે મેં સમર્પણ, સખત મહેનત, પ્રેરણા અને સ્વ-વાસ્તવિકતા શીખી છે. શાળાના વર્ષો પણ તે સમયગાળો હતો જેમાં મેં મારા લક્ષ્યો તરફ સખત મહેનત કરવાનું શરૂ કર્યું. મારી શ્રેષ્ઠ હાઇસ્કૂલની યાદોમાંની એક એ દિવસ હતો જ્યારે મેં શાળાના શ્રેષ્ઠ વિદ્યાર્થી તરીકે ઇનામ જીત્યું હતું. તે મારા માટે, તેમજ મારા માતા-પિતા અને મારી શાળા માટે ગર્વની ક્ષણ હતી. અમારી શાળાના આચાર્ય શ્રી વાચીનીદીદીએ મને આત્મવિશ્વાસ અને નીડરતાનું કવચ આપ્યું જે આજે પણ મારી પાસે છે અને ખજાનો છે.

મારી પાસે હજુ પણ અમે શાળામાં લીધેલા ઘણા બધા ચિત્રો છે જે મને બનાવેલી બધી સારી યાદોને યાદ કરાવે છે. મને યાદ છે કે અમે ઉજવેલા જુદા જુદા દિવસોની ઉજવણી અને અભ્યાસેતર પ્રવૃત્તિઓમાં મેં ભાગ લીધો હતો. મને યાદ છે કે જ્યારે હું મારી આખી શાળામાં ટોચની સિદ્ધિ પ્રાપ્ત કરનાર બન્યો ત્યારે મારા માતા-પિતા, વાચીનીદીદી, મારા શિક્ષકો અને મારા મિત્રો કેટલા ખુશ હતા.

આજે હું જે કંઈ પણ છું તે મારી શાળા અને મારા આચાર્ય વાચીનીદી પાસેથી શીખેલા જીવનના શ્રેષ્ઠ પાઠને કારણે છું.",'rating' => '5','sort_id' => '2','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),

         array('name' => 'Rajeshwariba Jadeja','name_guj' => 'રાજેશ્વરીબા જાડેજા','position' => 'Assistant Director, Food & Civil Supply Department','position_guj' => 'મદદનીશ નિયામક, અન્ન અને નાગરિક પુરવઠા વિભાગ','description' =>"During my time at Nandkunvarba Kshatriya Kanya Vidyalaya School (Bhavnagar), I was fortunate to have had an exceptional experience that enriched my life in countless ways. The supportive environment, our principal Shree Vachinidevi Gohil and dedicated teachers helped me to realize my potential and develop a diverse range of talents/ As I pursued my love for music, it became clear that this was my true passion. Now, as a music teacher at Christ School in Rajkot, I have the privilege of passing on my knowledge and enthusiasm to a new generation of students. Witnessing their growth and witnessing the transformative power of music in their lives is incredibly fulfilling.

			My journey from Nandkuvarba to Christ School has been one of self-discovery and growth, and I owe it all to the nurturing and encouraging atmosphere I experienced during my formative years. I am grateful for the opportunities I had, and I am determined to create a positive impact on my students, just as my principal and teachers did for me.

			Teaching music is not just about imparting technical skills; it's about instilling a lifelong love for the art form and encouraging creativity and self-expression. I strive to be a mentor, guiding my students to discover their unique musical strengths and supporting them as they pursue their dreams.

			As I reflect on my journey, I can't help but feel immense gratitude for both my school experiences and my chosen path as a music teacher. They have shaped me into the person I am today, and I am excited about the endless possibilities that lie ahead. With a heart full of passion and dedication.",'description_guj' =>"નંદકુંવરબા ક્ષત્રિય કન્યા વિદ્યાલય શાળા (ભાવનગર)માં મારા સમય દરમિયાન, હું એક અસાધારણ અનુભવ મેળવવાનું નસીબદાર હતો જેણે મારા જીવનને અસંખ્ય રીતે સમૃદ્ધ બનાવ્યું. સહાયક વાતાવરણ, અમારા પ્રિન્સિપાલ શ્રી વાચીનીદેવી ગોહિલ અને સમર્પિત શિક્ષકોએ મને મારી ક્ષમતાનો અહેસાસ કરવામાં અને પ્રતિભાઓની વિવિધ શ્રેણી વિકસાવવામાં મદદ કરી/ જેમ જેમ મેં સંગીત પ્રત્યેના મારા પ્રેમને આગળ વધાર્યો, તે સ્પષ્ટ થઈ ગયું કે આ મારો સાચો જુસ્સો છે. હવે, રાજકોટની ક્રાઇસ્ટ સ્કૂલમાં સંગીત શિક્ષક તરીકે, મને મારા જ્ઞાન અને ઉત્સાહને વિદ્યાર્થીઓની નવી પેઢી સુધી પહોંચાડવાનું સૌભાગ્ય મળ્યું છે. તેમની વૃદ્ધિની સાક્ષી અને તેમના જીવનમાં સંગીતની પરિવર્તનશીલ શક્તિની સાક્ષી એ અદ્ભુત રીતે પરિપૂર્ણ છે.

નંદકુંવરબાથી ક્રાઇસ્ટ સ્કૂલ સુધીની મારી સફર એક સ્વ-શોધ અને વૃદ્ધિની રહી છે, અને આ બધું હું મારા રચનાત્મક વર્ષો દરમિયાન અનુભવેલા સંવર્ધન અને પ્રોત્સાહક વાતાવરણને આભારી છું. મને મળેલી તકો માટે હું આભારી છું, અને મારા આચાર્ય અને શિક્ષકોએ મારા માટે કરી હતી તેવી જ રીતે હું મારા વિદ્યાર્થીઓ પર સકારાત્મક અસર બનાવવા માટે કટિબદ્ધ છું.

સંગીત શીખવવું એ માત્ર ટેકનિકલ કૌશલ્યો આપવાનું નથી; તે કલાના સ્વરૂપ માટે જીવનભરનો પ્રેમ અને સર્જનાત્મકતા અને સ્વ-અભિવ્યક્તિને પ્રોત્સાહિત કરવા વિશે છે. હું એક માર્ગદર્શક બનવાનો પ્રયત્ન કરું છું, મારા વિદ્યાર્થીઓને તેમની અનન્ય સંગીતની શક્તિઓ શોધવા માટે માર્ગદર્શન આપું છું અને તેઓ તેમના સપનાને અનુસરે છે ત્યારે તેમને ટેકો આપું છું.

જેમ જેમ હું મારી સફર પર પ્રતિબિંબિત કરું છું, હું મદદ કરી શકતો નથી પણ મારા શાળાના અનુભવો અને સંગીત શિક્ષક તરીકે મારા પસંદ કરેલા માર્ગ બંને માટે અપાર કૃતજ્ઞતા અનુભવી શકું છું. તેઓએ મને આજે હું જે વ્યક્તિ છું તે વ્યક્તિમાં આકાર આપ્યો છે, અને હું આગળ રહેલી અનંત શક્યતાઓ વિશે ઉત્સાહિત છું. જુસ્સા અને સમર્પણથી ભરેલા હૃદય સાથે.",'rating' => '5','sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),  

         );
        foreach ( $testimonials as $key => $name) {
                    Testimonials::create($name);
                }

    }
}
