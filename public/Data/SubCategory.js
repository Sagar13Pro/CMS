
var SubCategory_arr = new Array("Agriculture","Banking","Digital Payment Modes","Drugs And Cosmetics","E-Commerce","E-Governance","Electricity","FMCG","Food","Government Identity Services","Government Tax","Transport","GST","Health","Education","Legal","Petroleum","Postal","Public System Distribution","Publication","Railway","Govt. Real Estate","Right to Information","Telecom","Tourism","Water","Municipality","Anti-Corruption Bureau");


var s_aa = new Array();
s_aa[0]="";
s_aa[1]="Agriculture-Others|Fertilizers|Kishan Call Centre|Pesticides|Seed Problem";
s_aa[2]="ATM & Debit Card|Credit Card|e-Wallet|Loans Nodal Bank/Govt. Schemes| Saving/Current/Deposit Accounts";
s_aa[3]="BHIM UPI |e-Wallet| Internet Banking| Gift Card| RTGS/NEFT/IMPS| UPI Banking |USSD/SMS";
s_aa[4]="Chemist Issue |Cosmetics| Drugs| Drugs & Cosmetics-Others";
s_aa[5]="Comparison Sites |Mobile Wallet/Payment Gateway| Online Booking(Hotel/Travel/Ticket)| Online Cab Services/Car Rentals |Online Food Order| Online Pharmacy |Online Shopping| Tele Shopping |Online Loan ";
s_aa[6]="";
s_aa[7]="Electricity-Others| Electricity-Govt.| Electricity-Private ";
s_aa[8]="Apparels/Footwares |Construction/Building Material |FMCG-Others| Housing Hardware Items/Plumbing/Sanitarywares| Toiletries| Other Personal Care ";
s_aa[9]="Canteen and Mess-School/Colleges/Offices |Food Premises-Food Cart/Roadside Vendor/Restaurants |Packaged Food Products| Agri Products";
s_aa[10]="Aadhar| Employees Provident Fund| Govt. Identity Services-Other| PAN Card |Passport| Voter ID ";
s_aa[11]="Educational Cess |FAT Tax |Govt. Tax -Other| Income tax |Service Tax| VAT";
s_aa[12]="Govt Transport-Others| Metro Rail| State Transport| Municipality Transport";
s_aa[13]="Enquiries| Service Repairs etc Charges| Traders| Consumer-Non Packaged Commodity |Consumer-Packaged Commodity";
s_aa[14]="Diagnostic Center|Hospital Service|Medical Instruments|Health-Others|Pharmacy & Chemist Stores";
s_aa[15]="CA Institute|Central University|Collage of Veterinary Science & Animal Husbandry|Higher Education-Other|IIMs|IISc and IISERs|IITs|Law Courses|Medical Education & Reachers|NITs|Nursing Course/Dental/Pharmaceutial Cources|Private Classes|Private University|State University|State Education Board|Technical Cources";
s_aa[16]="Distirct Forum|Enquiry|State Commission|Legal-Others";
s_aa[17]="CNG|LPG|Petrol Pumps|Petroleum-Other|PNG|Research Association/Institute";
s_aa[18]="Postal|Postal Financial Services|Postal Mail Services";
s_aa[19]="Public Distribution System|Public Distribution System-Other";
s_aa[20]="Autonomous Publication House|Magazine|Newspaper|Publication-Other";
s_aa[21]="IRCTC-Catering|IRCTC-I Ticketing|IRCTC-Tourism|Railways|Railways-Other";
s_aa[22]="Govt. Development Authority|Private Developers/Builder|Real Estate-Other|RWA & Societies|Urban Transport-Metro Rail";
s_aa[23]="CIC|Right to Information-Others|SIC";
s_aa[24]="Govt. Telecom|Private Telecom|Telecom-Others";
s_aa[25]="Holiday Packaged|Offline Hotel & Resorts|State Govt. Tourism Packaged";
s_aa[26]="Sewage|Water-Other|Water Supply|Water Wastage";
s_aa[27]="Municipality|Nagar palika";



function AuthDept( SubCategoryElementId, AuthDeptElementId ){
	
	var selectedSubCategoryIndex = document.getElementById( SubCategoryElementId ).selectedIndex;

	var AuthDeptElement = document.getElementById( AuthDeptElementId );
	
	AuthDeptElement.length=0;	
	AuthDeptElement.options[0] = new Option('Select Authority Department','-1');
	AuthDeptElement.selectedIndex = 0;
	
	var AuthDept_arr = s_aa[selectedSubCategoryIndex].split("|"); ;
	for (var i=0; i<AuthDept_arr.length; i++) {
		AuthDeptElement.options[AuthDeptElement.length] = new Option(AuthDept_arr[i],AuthDept_arr[i]);
	}
	

}

function SubCategory(SubCategoryElementId,AuthDeptElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var SubCategoryElement = document.getElementById(SubCategoryElementId);
	SubCategoryElement.length=0;
	SubCategoryElement.options[0] = new Option('Select Sub-Category','-1');
	SubCategoryElement.selectedIndex = 0;
	for (var i=0; i<SubCategory_arr.length; i++) {
		SubCategoryElement.options[SubCategoryElement.length] = new Option(SubCategory_arr[i],SubCategory_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the states.

	if( AuthDeptElementId ){
		SubCategoryElement.onchange = function(){
			AuthDept( SubCategoryElementId, AuthDeptElementId );
		};
	}
}