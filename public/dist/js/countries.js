
var District_arr = new Array("Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kachchh","Kheda","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad");

// States
var s_a = new Array();
s_a[0]="";
s_a[1]="City East|City West|Bavla|Daskroi|Detroj-Rampura|Dhandhuka|Dholera|Dholka|Mandal|Sanand|Viramgam";
s_a[2]="Amreli|Babra|Bagasara|Dhari|Jafrabad|Khambha|Kunkavav vadia|Lathi|Lilia|Rajula|Savarkundla";
s_a[3]="Anand|Anklav|Borsad|Khambhat|Petlad|Sojitra|Tarapur|Umreth";
s_a[4]="Bayad|Bhiloda|Dhansura|Malpur|Meghraj|Modasa";
s_a[5]="Amirgad|Bhabhar|Danta|Dantiwada|Deesa|Deodar|Dhanera|Kankrej|Lakhani|Palanpur|Suigam|Tharad|Vadgam|Vav";
s_a[6]="Bharuch|Amod|Ankleshwar|Hansot|Jambusar|Jhagadia|Netrang|Vagra|Valia";
s_a[7]="Bhavnagar|Gariadhar|Ghogha|Jesar|Mahuva|Palitana|Sihor|Talaja|Umrala|Vallabhipur";
s_a[8]="Botad|Barwala|Gadhada|Ranpur";
s_a[9]="Chhota Udepur|Bodeli|Jetpur pavi|Kavant|Nasvadi|Sankheda";
s_a[10]="Dahod|Devgadh baria|Dhanpur|Fatepura|Garbada|Limkheda|Sanjeli|Jhalod|Singvad";
s_a[11]="Ahwa|Subir|Waghai";
s_a[12]="Bhanvad|Kalyanpur|Khambhalia|Okhamandal";
s_a[13]="Gandhinagar|Dehgam|Kalol|Mansa";
s_a[14]="Gir-Gadhada|Kodinar|Sutrapada|Talala|Una|Patan-Veraval";
s_a[15]="Jamnagar|Dhrol|Jamjodhpur|Jodiya|Kalavad|Lalpur";
s_a[16]="Junagadh City|Bhesana|Junagadh Rural|Keshod|Malia|Manavadar|Mangrol|Mendarda|Vanthali|Visavadar";
s_a[17]="Abdasa|Anjar|Bhachau|Bhuj|Gandhidham|Lakhpat|Mandvi|Mundra|Nakhatrana|Rapar";
s_a[18]="Kheda|Galteshwar|Kapadvanj|Kathlal|Mahudha|Matar|Mehmedabad|Nadiad|Thasra|Vaso";
s_a[19]="Balasinor|Kadana|Khanpur|Lunawada|Santrampur|Virpur";
s_a[20]="Mehsana|Becharaji|Jotana|Kadi|Kheralu|Satlasana|Unjha|Vadnagar|Vijapur|Visnagar|Gojariya";
s_a[21]="Halvad|Maliya|Morbi|Tankara|Wankaner";
s_a[22]="Dediapada|Garudeshwar|Nandod|Sagbara|Tilakwada";
s_a[23]="Navsari|Vansda|Chikhli|Gandevi|Jalalpore|Khergam";
s_a[24]="Ghoghamba|Godhra|Halol|Jambughoda|Kalol|Morwa Hadaf|Shehera";
s_a[25]="Patan|Chanasma|Harij|Radhanpur|Sami|Sankheswar|Santalpur|Sarasvati|Sidhpur";
s_a[26]="Porbandar|Kutiyana|Ranavav";
s_a[27]="Rajkot|Dhoraji|Gondal|Jamkandorna|Jasdan|Jetpur|Kotada Sangani|Lodhika|Paddhari|Upleta|Vinchchiya";
s_a[28]="Himatnagar|Idar|Khedbrahma|Poshina|Prantij|Talod|Vadali|Vijaynagar";
s_a[29]="Surat|Bardoli|Choryasi|Kamrej|Mahuva|Mandvi|Mangrol|Olpad|Palsana|Umarpada";
s_a[30]="Chotila|Chuda|Dasada|Dhrangadhra|Lakhtar|Limbdi|Muli|Sayla|Thangadh|Wadhwan";
s_a[31]="Nizar|Songadh|Uchhal|Valod|Vyara|Kukarmunda|Dolvan";
s_a[32]="Vadodara|Dabhoi|Desar|Karjan|Padra|Savli|Sinor|Vaghodia";
s_a[33]="Valsad|Dharampur|Kaprada|Pardi|Umbergaon|Vapi";


function populateCity( DistrictElementId, CityElementId ){
	
	var selectedDistrictIndex = document.getElementById( DistrictElementId ).selectedIndex;

	var CityElement = document.getElementById( CityElementId );
	
	CityElement.length=0;	// Fixed by Julian Woods
	CityElement.options[0] = new Option('Select City/Taluka','');
	CityElement.selectedIndex = 0;
	
	var City_arr = s_a[selectedDistrictIndex].split("|");
	
	for (var i=0; i<City_arr.length; i++) {
		CityElement.options[CityElement.length] = new Option(City_arr[i],City_arr[i]);
	}
}

function populateDistricts(DistrictElementId,CityElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var DistrictElement = document.getElementById(DistrictElementId);
	DistrictElement.length=0;
	DistrictElement.options[0] = new Option('Select District','-1');
	DistrictElement.selectedIndex = 0;
	for (var i=0; i<District_arr.length; i++) {
		DistrictElement.options[DistrictElement.length] = new Option(District_arr[i],District_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the states.

	if( CityElementId ){
		DistrictElement.onchange = function(){
			populateCity( DistrictElementId, CityElementId );
		};
	}
}
