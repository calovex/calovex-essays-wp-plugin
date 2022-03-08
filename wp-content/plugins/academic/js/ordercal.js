function get_doc_type_cost()

	{
		

	var theform=document.forms["orderform"];
	var formtypeOfDocument=theform.elements["doctype"];
	
	var typeOfDocument= new Array();
	var actual_typeOfDocument_cost;
	
	    	
	typeOfDocument["admission"] = 3;     
	typeOfDocument["assignment"] = 2;    
	typeOfDocument["casestudy"] = 3;      
	typeOfDocument["coursework"] = 3;    	
	typeOfDocument["moviereview"] = 2;  
	typeOfDocument["nonword"] = 2; 
	typeOfDocument["outline"] = 2;
	typeOfDocument["statement"] = 2; 	
	typeOfDocument["pptplain"] = 2;   	
	typeOfDocument["pptspeaker"] =2;   
	typeOfDocument["proofreading"] = 3;   
	typeOfDocument["researchpaper"] = 2;   
	typeOfDocument["researchproposal"] = 2;   
	typeOfDocument["scholarshipessay"] = 2;   
	typeOfDocument["speech"] = 2; 
	typeOfDocument["stats"] = 2; 
	typeOfDocument["termpaper"] = 2; 
	typeOfDocument["bibliography"] = 2;
	typeOfDocument["article"] = 2;  
	typeOfDocument["edit"] = 1; 
	typeOfDocument["essay"] = 2; 
	typeOfDocument["formating"] = 0; 
	typeOfDocument["labreport"] = 3; 
	typeOfDocument["dissertation"] = 3; 
	typeOfDocument["math"] = 3; 

	
actual_typeOfDocument_cost=typeOfDocument[formtypeOfDocument.value];
return actual_typeOfDocument_cost;
	
	
	}
	

function get_subject_cost()

	{
		

	var theform=document.forms["orderform"];
	var formsubject=theform.elements["subject"];
	
	var subjectname= new Array();
	var actual_subject_cost;
	
	subjectname["visual_arts_and_film_studies"] = 1;     
	subjectname["religion_and_theology"] = 2;    
	subjectname["philosophy"] = 3;      
	subjectname["history"] = 4;    	
	subjectname["english"] = 4;  
	
	
		
subjectname["music"] = 0;  
subjectname["literature"] = 4;
subjectname["linguistics"] = 4;
subjectname["ethics"] = 4;
subjectname["archeology"] = 4;
subjectname["anthropology"] = 4;
subjectname["geography"] = 4;
subjectname["psychology"] = 4;
subjectname["sociology"] = 4;
subjectname["gender and sexual studies"] = 4;
subjectname["human resources"] = 4;
subjectname["journalism, mass media and communication"] = 4;
subjectname["political science"] = 4;

subjectname["biology"] = 4;
subjectname["chemistry"] = 4;
subjectname["physics"] = 4;
subjectname["microbiology"] = 4;
subjectname["astronomy"] = 4;
subjectname["mathematics"] = 4;
subjectname["statistics"] = 4;
subjectname["earth and space sciences"] = 4;

subjectname["computer science and information technology"] = 4;
subjectname["logic and programming"] = 4;
subjectname["systems science"] = 4;

subjectname["agriculture"] = 4;
subjectname["architecture"] = 4;
subjectname["design and technology"] = 4;
subjectname["engineering and construction"] = 4;
subjectname["environmental studies"] = 4;
subjectname["health sciences and medicines"] = 4;
subjectname["education"] = 4;
subjectname["nursing"] = 4;
subjectname["millitary sciences"] = 4;
subjectname["family and consumer science"] = 4;

subjectname["macro and micro economics"] = 4;
subjectname["business"] = 4;
subjectname["marketing"] = 4;
subjectname["management"] = 4;
subjectname["finance and accounting"] = 4;
subjectname["e-commerce"] = 4;
subjectname["tourism"] = 4;
subjectname["logistics"] = 4;

subjectname["law"] = 4;
subjectname["creative writing"] = 4;
subjectname["other"] = 4;	

	
actual_subject_cost=subjectname[formsubject.value];
return actual_subject_cost;
	

	}


	
function get_academic_level()

	{
		
var academic_level=new Array();
//high school
academic_level[0]=0.1;
//degree/ college
academic_level[1]=2;
//masters
academic_level[2]=3;
//phd
academic_level[3]=4;

var pages=new Array();


	 var cost_for_academic=0;
	 
	 var theform=document.forms['orderform'];
	 
	 var theelement2=theform.elements['academic_level'];
	 
	 cost_for_academic=academic_level[theelement2.value];
	
	 return cost_for_academic;
		
	}
		
	
	
	
function deadline()
{
	var theform=document.forms["orderform"];
	var deadline_form_element=theform.elements["urgency"]
	
	var deadline_price_catalogue=new Array();
	
	deadline_price_catalogue["2months"]=0;
	deadline_price_catalogue["30days"]=2;
	deadline_price_catalogue["20days"]=2;
	deadline_price_catalogue["10days"]=2;
	deadline_price_catalogue["5days"]=2;
	deadline_price_catalogue["4days"]=3;
	deadline_price_catalogue["3days"]=3;
	deadline_price_catalogue["2days"]=4;
	deadline_price_catalogue["24hours"]=5;
	
	urgency_cost=deadline_price_catalogue[deadline_form_element.value];
	
	return urgency_cost;
	
}



function get_pages()

		{
		
		
	var theform=document.forms["orderform"];
	var pagesformelement=theform.elements["itemQty"];
	var pages=pagesformelement.value;
	
	
	return pages;
		
		}
		

function cost_per_page() // assumes page is double

		{
		var costPerPage=0;
		
		// cost per page = (docType + subject+ level  +  Deadline )* spacing assuming double
		costPerPage=get_doc_type_cost()+ get_subject_cost() + get_academic_level()+ deadline();
		
		return costPerPage.toFixed(2);;
		
		}


function summaryPageCost()
{
	
	 var summary_page=0;
    //Get a reference to the form name="orderform"
    var theForm = document.forms["orderform"];
    //Get a reference to the select id="filling"
     var onePageStatus = theForm.elements["onepage"];
	 
 summary_page = onePageStatus.value;
 
 if ( summary_page===1)
   {  summary_page=10; 
    return summary_page=10;
   }
   else{return 0}
	
}


function totalprice()

				{
				
									
				var order_total=0;
				
					//total=cost per page * number of pages +one page summert

			    order_total=(cost_per_page()*get_pages()) + summaryPageCost();
				order_total_rounded=order_total.toFixed(2);;
				
				
				var divElementForTotal=document.getElementById('total');
					
				divElementForTotal.style.display='block';
				
				divElementForTotal.innerHTML="Total Cost: $ "+order_total_rounded+"<br> (cost per page:$ "+cost_per_page()+")";
				
				
				var  cpp=document.forms["orderform"];
				var cppel=cpp.elements["page_cost"];				
				cppel.value=cost_per_page();
				
				var  cpp1=document.forms["orderform"];
				var cppel1=cpp1.elements["total"];				
				cppel1.value=order_total;

				

				
				}

function hideTotal()
{
    var divobj = document.getElementById('total');
    divobj.style.display='none';
}




function showInput() {
        document.getElementById('topicx').innerHTML = 
document.getElementById("topic").value; }

console.log(showInput());