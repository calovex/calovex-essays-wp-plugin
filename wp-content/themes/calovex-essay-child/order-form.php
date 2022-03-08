<?php 
/* Template Name: PageWithoutSidebar */ 

get_header();


?>

<!--End of Order Processing Status-->
<div id="total"  class="background-color:primary;"  style="padding-top:15px;
                        padding:20px;
                        margin-top:10px;
			font-weight:bold;
			color:blue;
								
			position:fixed;
			left:0; <!--; <!--top:0; -->			
			z-index:100; ">
			No item selected yet
		</div>


  <!-- One "tab" for each step in the form: -->
  <form name="orderform" id="regForm" method="POST" action="'.plugin_dir_url( __DIR__ ).'lib/paypal/process.php" >
  <div class="tab">
  <caption><h3>Order Details</h3></caption>  
    <p>Topic:<input type="text" name="topic" id="topic" value="" required/></p>
  
	<p>Type of document:<select id="doctype" onselect="totalprice()" onchange="totalprice()" name="doctype"  required>
		 <option value="admission">Admission/Application Essay</option>
		 <option value="bibliography">Annotated Bibliography</option>
		 <option value="article">Article</option>
		 <option value="assignment">Assignment</option>
		 <option value="casestudy">Case-Study</option>
		 <option value="coursework">Coursework</option>
		 <option value="dissertation">Dissertation</option>
		 <option value="dissertation" selected="selected">Dissertation proposal</option>
		 <option value="edit">Editing</option>
		 <option value="essay">Essay</option>
		 <option value="formating">Formatting</option>
		 <option value="labreport">Lab Report</option> 
		 
		 <option value="dissertation">Dissertation - Abstract</option> 
		  <option value="dissertation">Dissertation - Introduction</option> 
		  <option value="dissertation">Dissertation - Hypothesis</option>   
		  <option value="dissertation">Dissertation - Literature review</option>  
		  <option value="dissertation">Dissertation - Methodology</option>  
		  <option value="dissertation">Dissertation - Results</option> 
		  <option value="dissertation">Dissertation - Discussion</option>
		  <option value="dissertation">Dissertation - Conclusion</option>  
		 
		 <option value="math">Math Problem</option>
		 <option value="moviereview">Movie Review</option>
		 <option value="nonword">Non-word Assignments</option>
		 <option value="outline">Outline</option>
		 <option value="paraphrasing">Paraphrasing</option>
		 <option value="statement">Personal Statement</option>
		 <option value="pptplain">PowerPoint Presentation Plain</option>
		 <option value="pptspeaker">PowerPoint Presentation with Speaker Notes</option>
		 <option value="proofreading">Proofreading</option>
		 <option value="researchpaper">Research Paper</option>
		 <option value="researchproposal">Research Proposal</option>
		 <option value="scholarshipessay">Scholarship Essay</option>
		 <option value="speech">Speech/Presentation</option>
		 <option value="stats">Statistics Project</option>
		 <option value="termpaper">Term Paper</option>
		 </select>
		  
		  <input type="hidden" name="itemnumber" id="" value="2">
	</p>
	<p>
  Subject Area:	
  <select class="marg-left-5" id="subject" name="subject" onselect="totalprice()" onchange="totalprice()">
	<option value="0">--</option>
	<optgroup label="Arts & Humanities">	
	    <option value="visual_arts_and_film_studies">Visual Arts and Film Studies</option>
		<option value="religion_and_theology">Religion and Theology</option>
		<option value="philosophy" selected="selected">Philosophy</option>
		<option value="history">History</option>
		<option value="english">English</option>
		<option value="music">Music</option>
		<option value="literature">Literature</option>
		<option value="linguistics">Linguistics</option>
		<option value="ethics">Ethics</option>
		<option value="archeology">Archaeology</option>
		<option value="anthropology">Anthropology</option>
	</optgroup>		
	<optgroup label="Social Sciences">		
		<option value="geography">Geography</option>
		<option value="psychology">Psychology</option>
		<option value="sociology">Sociology</option>
		<option value="gender and sexual studies">Gender & Sexual Studies</option>
		<option value="human resources">Human Resources (HR)</option>
		<option value="journalism, mass media and communication">Journalism, mass media and communication</option>
		<option value="political science">Political Science</option>
	</optgroup>
	
	<optgroup label="Sciences">		
		<option value="biology">Biology</option>
		<option value="chemistry">Chemistry</option>
		<option value="physics">Physics (including Earth and space sciences)</option>
		<option value="microbiology">Microbiology</option>
		<option value="astronomy">Astronomy</option>
		<option value="mathematics">Mathematics</option>
		<option value="statistics">Statistics</option>
		<option value="earth and space sciences">Earth and Space sciences</option>		
	</optgroup>


	
	<optgroup label="Information Technology">		
		<option value="computer science and information technology">Computer Science and Information Technology</option>
		<option value="logic  and programming">Logic and programming</option>
		<option value="systems science">Systems science</option>
	</optgroup>	
	
	<optgroup label="Applied sciences">		
		<option value="agriculture">Agriculture</option>
		<option value="architecture">Architecture</option>
		<option value="design and technology">Design and Technology</option>
		<option value="engineering and construction">Engineering and Construction</option>
		<option value="environmental studies">Environmental studies</option>
		<option value="health sciences and medicines">Health sciences and medicine</option>
		<option value="education">Education</option>
		<option value="nursing">Nursing</option>
		<option value="millitary sciences">Military sciences</option>
		<option value="family and consumer science">Family and consumer science</option>		
	</optgroup>

	<optgroup label="Economics">		
		<option value="7010">Macro & Micro economics</option>
		<option value="7020">Business</option>
		<option value="7030">Marketing</option>
		<option value="7040">Management</option>
		<option value="7050">Finance and Accounting</option>
		<option value="7060">E-commerce</option>
		<option value="7080">Tourism</option>
		<option value="7090">Logistics</option>
	</optgroup>
	
	<optgroup label="Economics">		
		<option value="macro and micro economics">Macro and Micro economics</option>
		<option value="business">Business</option>
		<option value="marketing">Marketing</option>
		<option value="management">Management</option>
		<option value="finance and accounting">Finance and Accounting</option>
		<option value="e-commerce">E-commerce</option>
		<option value="tourism">Tourism</option>
		<option value="logistics">Logistics</option>
	</optgroup>
	
	<optgroup label="Law">		
		<option value="law">Law</option>
	</optgroup>
		
	<optgroup label="Other">
		<option value="creative writing">Creative writing</option>
		<option value="other">Other</option>
	</optgroup></select>
	</p>
	
	<p>
	    Academic level: <select name="academic_level" id="academic_level" onselect="totalprice()" onchange="totalprice()" >
			<option value="0">High School</option>
			<option value="1">Degree/ College</option>
			<option value="2">Masters </option>
			<option value="3">PHD</option>				
		</select>
	</p>
	

	<p>
		Urgency:<select id="urgency" onselect="totalprice()"onchange="totalprice()" name="urgency" >
			<option value="2months">2 months</option>
			<option value="30days">30 days</option>
			<option value="20days">20 days</option>
			<option value="10days">10 days</option>
			<option value="5days">5 days</option>
			<option value="4days" selected="selected">4 days</option>
			<option value="3days">3 days</option>
			<option value="2days">2 days</option>
			<option value="24hours">24 hours</option>
		</select>
	</p>
	
	
	<p>
		No of pages/ Words: <select onselect="totalprice()" onchange="totalprice()" name="itemQty" id="itemQty">
			<option value="0">Please, select...</option><option value="1">1 (250 words)</option>
			<option value="2">2 (500 words)</option><option value="3">3 (750 words)</option>
			<option value="4">4 (1000 words)</option><option value="5">5 (1250 words)</option>
			<option value="6" selected="selected">6 (1500 words)</option><option value="7">7 (1750 words)</option>
			<option value="8">8 (2000 words)</option><option value="9">9 (2250 words)</option>
			<option value="10">10 (2500 words)</option><option value="11">11 (2750 words)</option>
			<option value="12">12 (3000 words)</option><option value="13">13 (3250 words)</option>
			<option value="14">14 (3500 words)</option><option value="15">15 (3750 words)</option>
			<option value="16">16 (4000 words)</option><option value="17">17 (4250 words)</option>
			<option value="18">18 (4500 words)</option><option value="19">19 (4750 words)</option>
			<option value="20">20 (5000 words)</option><option value="21">21 (5250 words)</option>
			<option value="22">22 (5500 words)</option><option value="23">23 (5750 words)</option>
			<option value="24">24 (6000 words)</option><option value="25">25 (6250 words)</option>
			<option value="26">26 (6500 words)</option><option value="27">27 (6750 words)</option>
			<option value="28">28 (7000 words)</option><option value="29">29 (7250 words)</option>
			<option value="30">30 (7500 words)</option><option value="31">31 (7750 words)</option>
			<option value="32">32 (8000 words)</option><option value="33">33 (8250 words)</option>
			<option value="34">34 (8500 words)</option><option value="35">35 (8750 words)</option>
			<option value="36">36 (9000 words)</option><option value="37">37 (9250 words)</option>
			<option value="38">38 (9500 words)</option><option value="39">39 (9750 words)</option>
			<option value="40">40 (10000 words)</option><option value="41">41 (10250 words)</option>
			<option value="42">42 (10500 words)</option><option value="43">43 (10750 words)</option>
			<option value="44">44 (11000 words)</option><option value="45">45 (11250 words)</option>
			<option value="46">46 (11500 words)</option><option value="47">47 (11750 words)</option>
			<option value="48">48 (12000 words)</option><option value="49">49 (12250 words)</option>
			<option value="50">50 (12500 words)</option><option value="51">51 (12750 words)</option>
			<option value="52">52 (13000 words)</option><option value="53">53 (13250 words)</option>
			<option value="54">54 (13500 words)</option><option value="55">55 (13750 words)</option>
			<option value="56">56 (14000 words)</option><option value="57">57 (14250 words)</option>
			<option value="58">58 (14500 words)</option><option value="59">59 (14750 words)</option>
			<option value="60">60 (15000 words)</option><option value="61">61 (15250 words)</option>
			<option value="62">62 (15500 words)</option><option value="63">63 (15750 words)</option>
			<option value="64">64 (16000 words)</option><option value="65">65 (16250 words)</option>
			<option value="66">66 (16500 words)</option><option value="67">67 (16750 words)</option>
			<option value="68">68 (17000 words)</option><option value="69">69 (17250 words)</option>
			<option value="70">70 (17500 words)</option><option value="71">71 (17750 words)</option>
			<option value="72">72 (18000 words)</option><option value="73">73 (18250 words)</option><option value="74">74 (18500 words)</option><option value="75">75 (18750 words)</option><option value="76">76 (19000 words)</option><option value="77">77 (19250 words)</option><option value="78">78 (19500 words)</option><option value="79">79 (19750 words)</option><option value="80">80 (20000 words)</option><option value="81">81 (20250 words)</option><option value="82">82 (20500 words)</option><option value="83">83 (20750 words)</option><option value="84">84 (21000 words)</option><option value="85">85 (21250 words)</option><option value="86">86 (21500 words)</option><option value="87">87 (21750 words)</option><option value="88">88 (22000 words)</option><option value="89">89 (22250 words)</option><option value="90">90 (22500 words)</option><option value="91">91 (22750 words)</option><option value="92">92 (23000 words)</option><option value="93">93 (23250 words)</option><option value="94">94 (23500 words)</option><option value="95">95 (23750 words)</option><option value="96">96 (24000 words)</option><option value="97">97 (24250 words)</option><option value="98">98 (24500 words)</option><option value="99">99 (24750 words)</option><option value="100">100 (25000 words)</option><option value="101">101 (25250 words)</option><option value="102">102 (25500 words)</option><option value="103">103 (25750 words)</option><option value="104">104 (26000 words)</option><option value="105">105 (26250 words)</option><option value="106">106 (26500 words)</option><option value="107">107 (26750 words)</option><option value="108">108 (27000 words)</option><option value="109">109 (27250 words)</option><option value="110">110 (27500 words)</option><option value="111">111 (27750 words)</option><option value="112">112 (28000 words)</option><option value="113">113 (28250 words)</option><option value="114">114 (28500 words)</option><option value="115">115 (28750 words)</option><option value="116">116 (29000 words)</option><option value="117">117 (29250 words)</option><option value="118">118 (29500 words)</option><option value="119">119 (29750 words)</option><option value="120">120 (30000 words)</option><option value="121">121 (30250 words)</option><option value="122">122 (30500 words)</option><option value="123">123 (30750 words)</option><option value="124">124 (31000 words)</option><option value="125">125 (31250 words)</option><option value="126">126 (31500 words)</option><option value="127">127 (31750 words)</option><option value="128">128 (32000 words)</option><option value="129">129 (32250 words)</option><option value="130">130 (32500 words)</option><option value="131">131 (32750 words)</option><option value="132">132 (33000 words)</option><option value="133">133 (33250 words)</option><option value="134">134 (33500 words)</option><option value="135">135 (33750 words)</option><option value="136">136 (34000 words)</option><option value="137">137 (34250 words)</option><option value="138">138 (34500 words)</option><option value="139">139 (34750 words)</option><option value="140">140 (35000 words)</option><option value="141">141 (35250 words)</option><option value="142">142 (35500 words)</option><option value="143">143 (35750 words)</option><option value="144">144 (36000 words)</option><option value="145">145 (36250 words)</option><option value="146">146 (36500 words)</option><option value="147">147 (36750 words)</option><option value="148">148 (37000 words)</option><option value="149">149 (37250 words)</option><option value="150">150 (37500 words)</option><option value="151">151 (37750 words)</option><option value="152">152 (38000 words)</option><option value="153">153 (38250 words)</option><option value="154">154 (38500 words)</option><option value="155">155 (38750 words)</option><option value="156">156 (39000 words)</option><option value="157">157 (39250 words)</option><option value="158">158 (39500 words)</option><option value="159">159 (39750 words)</option><option value="160">160 (40000 words)</option><option value="161">161 (40250 words)</option><option value="162">162 (40500 words)</option><option value="163">163 (40750 words)</option><option value="164">164 (41000 words)</option><option value="165">165 (41250 words)</option><option value="166">166 (41500 words)</option><option value="167">167 (41750 words)</option><option value="168">168 (42000 words)</option><option value="169">169 (42250 words)</option><option value="170">170 (42500 words)</option><option value="171">171 (42750 words)</option><option value="172">172 (43000 words)</option><option value="173">173 (43250 words)</option><option value="174">174 (43500 words)</option><option value="175">175 (43750 words)</option><option value="176">176 (44000 words)</option><option value="177">177 (44250 words)</option><option value="178">178 (44500 words)</option><option value="179">179 (44750 words)</option><option value="180">180 (45000 words)</option><option value="181">181 (45250 words)</option><option value="182">182 (45500 words)</option><option value="183">183 (45750 words)</option><option value="184">184 (46000 words)</option><option value="185">185 (46250 words)</option><option value="186">186 (46500 words)</option><option value="187">187 (46750 words)</option><option value="188">188 (47000 words)</option><option value="189">189 (47250 words)</option><option value="190">190 (47500 words)</option><option value="191">191 (47750 words)</option><option value="192">192 (48000 words)</option><option value="193">193 (48250 words)</option><option value="194">194 (48500 words)</option><option value="195">195 (48750 words)</option><option value="196">196 (49000 words)</option><option value="197">197 (49250 words)</option><option value="198">198 (49500 words)</option><option value="199">199 (49750 words)</option><option value="200">200 (50000 words)</option></select>

	</p>
	
	
	<p><label>Spacing</label>:
		<label>Double</label><input type="radio"  name="spacing" id="spacing" checked="checked" value="Double" onclick="" />
		<label>Single</label><input type="radio"  name="spacing" id="spacing" value="Single" onclick="" />
	</p>

	
	<p>
		Cost per page: <input type="text" name="itemprice" id="page_cost" value="" style="color:red;"/>
	</p>

	Total Amount: 
	<p>
		<input type="text" name="total" id="total" value="" style="color:red;background:none;"/>
	</p>

	<label>Referencing Style: </label>
	<p>
		<select name="reference_style" id="reference_style">
			
				<option value="APA">APA</option>
				<option value="MLA">MLA</option>
				<option value="Harvard">Harvard</option>
				<option value="Chicago">Chicago</option>
				<option value="Oxford">Oxford</option>			
		</select>
	</p>

	<label>No. of References</label>:
	<p>
		<input type="text" name="references" id="references" value=""/>
	</p>
    
	<label>Preferred Language</label>: 
	<p>
		<select name="language" id="language">
			<option value="American English">American English</option>
			<option value="British (UK) English">American English</option>
		</select>
	</p>
	
	<label> Add One page summary</label>
	
	<p><input type="checkbox" name="onepage" id="onepage" value="1"></p>
    
	<label>Order Description:</label>
	<p><textarea name="description" id="description" rows="5" cols="60">Type your description here</textarea>
	</p>
	
	</div>
    <table>
	<tr><td><label>First name:</label></td><td><span id="first_name_display"></span></td></tr>
	<tr><td><label>Last name:</label></td><td><span id="last_name_display"></span></td></tr>
	<tr><td><label>E-mail:</label></td><td><span id="email_display"></span></td></tr>
	<tr><td><label>Country:</label></td><td><span id="country_display"></span></td></tr>
	<tr><td><label>Contact Phone:</label></td><td><span id="phone_display"></span></td></tr>
	<h3>Order details</h3>
	<tr><td><label>Subject:</label></td><td><span id="subject_display"></span></td></tr>
	<tr><td><label>Topic:</label></td><td><span id="topic_display"></span></td></tr>
	<tr><td><label>Type of work:</label></td><td><span id="doctype_display"></span></td></tr>
	<tr><td><label>Language:</label></td><td><span id="language_display"></span></td></tr>
	<tr><td><label>Style:</label></td><td><span id="style_display"></span></td></tr>
	<tr><td><label>Deadline in:</label></td><td><span id="deadline_display"></span></td></tr>
	<tr><td><label>Level:</label></td><td><span id="level_display"></span></td></tr>
	<tr><td><label>Number of pages:</label></td><td><span id="numpages_display"></span></td></tr>
	<tr><td><label>Spacing:</label></td><td><span id="space_display"></span></td></tr>
	<tr><td><label>Order instructions:</label></td><td><span id="instructions_display"></span></td></tr>
	<tr><td><label>1-page summary:</label></td><td><span id="onepage_display"></span></td></tr>
	<tr><td><label>Plagiarism Report:</label></td><td><span id="plagiarism_display"></span></td></tr>
	<tr><td><label>Sources:</label></td><td><span id="sources_display"></span></td></tr>
	<tr><td><label>Total:</label></td><td><span id="total_display"></span></td></tr>
	</table>
  </div>
  
  

  <div class="tab">Contact Info:
    <p>Username: <input type="text" placeholder="E-mail..." name="email"></p>
    <p>Password:<input type="text" placeholder="Phone..."  name="phone"></p>
	<p>Confirm Password:<input type="text" placeholder="Phone..." name="phone"></p>
  </div>
	
		


  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1);showInput()">Next</button>
    </div>
  </div>

  
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
	<span class="step"></span>
    
    
  </div>
</form>

<!-- End of Order Details-->  


<?php get_footer(); ?>