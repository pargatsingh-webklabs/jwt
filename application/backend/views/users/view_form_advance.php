<html>
<style>
.cborder{border-right: 2px solid #2FD1EC;}
.tborder{border-top: 2px solid #2FD1EC;
border-bottom: 2px solid #2FD1EC;}
.bborder{border-bottom: 2px solid #2FD1EC;}
.topborder{border-top:2px solid #2FD1EC;}
</style>
<body>
<div id="view-form-layout">
<div class="page-content">
<div class="pull-right" style="padding:1%; "><a href="<?php echo BASEURL ?>/users/view_advance_form/<?php echo $ID; ?>"  class="btn green">Go back to list</a></div>
<form  action="<?php echo BASEURL ?>/pdf" method="post" name="event_update">	
<input    type="hidden" name="form" value="advance" /> 
<input    type="hidden" name="name" value="Commission-Advance-Agreement" /> 
<input    type="hidden" name="titlename" value="<?php echo  $advance_form_data['escrow_file_number'] ; ?>"/> 	
<input      type="hidden" name="routing_no" value="<?php echo $this->config->item('routing_no') ; ?>"/> 	
<input      type="hidden" name="account_no" value="<?php echo $this->config->item('account_no') ; ?>"/> 
<input    type="hidden" name="id" value="<?php echo $ID; ?>"/> 
<input    type="hidden" name="recored_id" value="<?php echo $recored_id; ?>"/>
<input    type="hidden" name="city" value="<?php echo $advance_form_data['city']  ?> "/> 
<input    type="hidden" name="state" value="<?php echo $advance_form_data['state']  ?> "/> 
<input    type="hidden" name="zipcode" value="<?php echo  $advance_form_data['zipcode']  ?>" />  
<input    type="hidden" name="current_time" value="<?php echo date('m/d/Y', time())  ?>" /> 

	<div class="clearfix"></div>

<div id="commision-form">
	<div id="commision_form">
    <div class="panel">
    	<div class="row  col-border">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<img src="<?php echo THEME_URL; ?>assets/new/img/ecommission-logo.png" class="img-responsive"  />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<h4>3042 S Durango Las Vegas NV	89012</h4>
                    <h4>TEL	702-685-3000</h4>
                </div>
             </div>
            </div>
            
            <div class="row col-border">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                	<h4>Commission	Advance	Agreement</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    	 <span class="text-layout">Date:</span>   
						   <div class="input-box">
								<input   readonly   value="<?php echo date('m/d/Y', $advance_form_data['created']); ?>"     type="text" class="form-control" name="created" placeholder="" />
						   </div> 
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	 <span class="text-layout">Escrow#</span>   
					   <div class="input-box">
									<input   readonly   value="<?php echo  $advance_form_data['escrow_file_number'] ; ?>"     type="text" class="form-control" name="escrow_file_number" placeholder="" />
					   </div> 
                    </div>
                </div>
            </div>
           <div id="mian-form" style="width:100%;">

           <div class="input-box1">
           <input   readonly   value="<?php echo agent_name(array('id'=>$ID)) ; ?>"     type="text" class="form-control" name="display_name" placeholder="" /></div>
           <span class="text-layout">(Agent),</span>   
           <div class="input-box2"> <input   readonly   value="<?php echo  $advance_form_data['broker_name'] ; ?>"     type="text" class="form-control" name="broker_name" placeholder="" /></div>  
           <span class="text-layout">(Broker)of</span> 
           <div class="input-box3"><input   readonly   value="<?php echo  $advance_form_data['brokerage_name']  ; ?>"     type="text" class="form-control" name="brokerage_name" placeholder="" /></div>
           <span class="text-layout"> (Brokerage)	 located	 at	</span>   <div class="borkerage-address"><input   readonly   value="<?php echo  $advance_form_data['brokerage_address'] ; ?>"     type="text" class="form-control" name="brokerage_address" placeholder="" /></div>
           <span class="text-layout"> (Brokerage	 Address)	</span>    <span class="text-layout"> and	 CommissionCheckAdvance.com	 (Company)	 for	 the	 advanced	 payment	 of	$</span>   
          
             <div class="borkerage-located"><input   readonly   value="<?php echo  $advance_form_data['amount_requested'] ; ?>"     type="text" class="form-control" name="amount_requested" placeholder="" />
			 </div> <span class="text-layout"> (Advance)	 for	 the	 property	 located	 at	</span>
			 <div class="property-address">
			<input   readonly   value="<?php echo  $advance_form_data['property_address'].",".$advance_form_data['city'].",".$advance_form_data['state'].",".$advance_form_data['zipcode'] ; ?>"     type="text" class="form-control" name="property_address" placeholder="" />
			 </div><span class="text-layout">(Property),	 Escrow	 to	 be	 with</span> 
			 <div class="input-box4">
           <input   readonly   value="<?php echo  $advance_form_data['closing_company_name'] ; ?>"     type="text" class="form-control" name="closing_company_name" placeholder="" /></div> <span class="text-layout">Title	 Company,	 Escrow	 Officer</span>	
           <div class="input-box5">
           <input   readonly   value="<?php echo  $advance_form_data['escrow_officer'] ; ?>"     type="text" class="form-control" name="escrow_officer" placeholder="" /></div><span class="text-layout">Escrow#</span>
 
		   <div class="input-box6">
			 <input   readonly   value="<?php echo  $advance_form_data['escrow_file_number'] ; ?>"     type="text" class="form-control" name="escrow_file_number" placeholder="" />
		   </div>
		   <span class="text-layout">(Escrow).	Broker shall advance </span>          
           <span class="text-layout"> Agent the amount	of	$</span>
		   <div class="input-box7">
				<input   readonly   value="<?php echo  $advance_form_data['amount_requested'] ; ?>"     type="text" class="form-control" name="amount_requested" placeholder="" />
				
		   </div> 
		   <span class="text-layout">(Advance)	upon	execution	of	this	agreement. Upon	 successful	 Close	of	 Escrow	 of property  in exchange </span>
		   <span class="text-layout">for Advance Company shall	collect</span>
		   <div class="input-box8">
		   <!--  -----------***************** This is the amount including commission Calculations ******************----------------------        -->			
			<?php  $amount = $advance_form_data['amount_requested'] ;
				   $commission = (ADV_COMMISSION * $amount)/100 ;	
				   $total_amount = $advance_form_data['amount_requested'] + $commission ; ?>
<!--  -----------*****************  Calculations Ends ******************----------------------        -->
				<input   readonly   value="<?php  echo $total_amount ; ?>"     type="text" class="form-control" name="total_amount_one" placeholder="" />
		   </div>
		   <span class="text-layout">(Commission	plus	fees)	Directly	from	Escrow.</span>
           <div  style="width:100%; float:left;"></div>
           <span class="text-layout"> <strong>Close	of	Escrow </strong>(COE) is	presently	schedule for</span>
		   <div class="input-box9">
			<input   readonly   value="<?php echo  date('m/d/Y',$advance_form_data['close_date']) ; ?>"     type="text" class="form-control" name="close_date" placeholder="" />
		   </div> 
		   <span class="text-layout">In	the	event	that	COE	does	not	 take place 	as	scheduled,	Company shalls </span>
		   <span class="text-layout">  l take	the	full	commission	amount	($</span>     
		   <div class="input-box10">
				<input   readonly   value="<?php echo  $total_amount ; ?>"     type="text" class="form-control" name="total_amount_two" placeholder="" />
		   </div>	
		   <span class="text-layout">from	 the	 next	 property	 that	 Agent	 closes. In	 the	 event	 that	 the	 next	 transaction	 closed</span><span class="text-layout"> 	 by	 Agent	 is	 not	
			greater	 than	 or	equal	 to	 the	 full	 commission	amount	 then	Company shall	 take	any	 remaining	 balance
			from	any	subsequent	closing(s).   </span> 

			<span class="text-layout">In	the	event	that	Agent	transfers	to	a	different	Brokerage	while	monies	are	still	owed	then	subsequent	
			Brokerage	shall	also	be	bound	by	this	agreement	and	is	hereby	instructed	to	pay	any	remaining	balances	
			directly	to	Company prior	to	any	monies	being	received	by	Agent	from	subsequent	Brokerage.</span>

			<span class="text-layout">
			<strong>Executed	By	And	Between:</strong></span>
			<div  style="width:100%; float:left;"></div>
			<span class="text-layout">-Pursuant	 to	a	written	agreement </span>
			<div class="input-box11">
				<input   readonly   value="<?php echo  $advance_form_data['sellers_name'] ; ?>"     type="text" class="form-control" name="sellers_name" placeholder="" />
			</div>
			<span class="text-layout">	 between as	 Seller	and </span>
           <div class="input-box12">
           <input   readonly   value="<?php echo  $advance_form_data['buyers_name'] ; ?>"     type="text" class="form-control" name="buyers_name" placeholder="" />
		   </div>
		   <span class="text-layout">as	 Buyer,	 Broker</span> 
		   <span class="text-layout"> has	earned	a	 Commission in	which	Agent	 has	an	interest,	arising	 out	 of	 the	 sale	 of	 the	
				Property.	The	Commission	is	payable	upon	COE
				-As	a	financial	accommodation	to	the	Agent,	Broker	hereby	requests	that Company pay	the	Advance to	
				Agent.</span>
				<span class="text-layout">
				-As	an	inducement	to	Agent Company	agrees	to	purchase	the	Commission,	Broker	to	direct	Company to	
				pay	 the	 Commission,	 Agent	 unconditionally	 and	 irrevocably	 warrants	 to	 Company that	 the	 Sale	 will,	
				close	on	the	Closing	Date.
				-	Company purchase	of	the	Commission	shall	be	deemed	to	be	a	true	purchase	of	an	account	receivable
				with	transfer	of	title	and	shall	not	be	deemed	to	be	a	loan	arrangement	or	secured	transaction.</span>



			<span class="text-layout"><strong>Representations and	Warranties</strong></span>
			<span class="text-layout">Broker	and	Agent warrant	and	represent	that:	 Agent	is	an	independent	contractor	and	not	an	employee	
			of	 Broker. Agent	 at	 this	 time	 is	 not	 the	 subject	 of	 a	 bankruptcy	 proceeding.	 There	 are	 no	 disputes,	
			claims,	 setoffs,	 liens	 or	 defenses,	 or	 any	 other	 matter	 which	 would	 adversely	 affect	 or	 delay	 the	
			payment	of	the	Commission	to	Company on	the	Closing	Date,	the	Commission	will	be	due and	payable	
			on	 the	Closing	Date,	and the	Commission	is	conveyed	 to	Company free	and	clear	of	all	encumbrances	
			and	claims	of	third	parties.	Agent	 further	warrants	that	the	Agent	will	use	the	proceeds	received	 from	
			Company in	 connection	 with	 this	 purchase	 of	 the	 Commission	 for	 business	 purposes	 only,	 with	 no	
			portion	of	such	proceeds	to	be	used	for	any	personal,	family	or	household	purposes.</span>



			<span class="text-layout"><strong>Reimbursement	of	Commission</strong></span>
			<span class="text-layout">Upon	 the	 closing	 date,	 Broker	 irrevocably	 instructs	Escrow to	 reimburse	Company the	 Commission.	If	
			the	Commission	is	not	paid	to	Company within	20	days	of	the	Closing	Date	(the	'Grace	Period")	so	long	
			as	 the	 sale	 remains	active,	 then	 the	 Agent	 shall	 pay	a	 closing	extension	 fee	equal	 to	 $88.10	 ("Closing	
			Extension	Fee"),	in	return	for	which	the	Due	Date	shall	be	extended	for	ten	days	and,	at	the	end	of	such	
			ten	day	period,	Agent	shall	pay	an	additional	Closing	Extension	Fee	every	ten	days	thereafter	until	such	
			time	as	 the	Commission,	plus	all	other	accrued	and	unpaid	Closing	Extension	Fees	is	paid	in	 full.	If	 the	
			Closing	 does	 not	 occur	 for	any	 reason,	Agent	authorizes	 Broker	and	 Broker	 herein	agrees	 to	 direct	 to	
			Company the	 amount	 of	 the	 Commission,	 plus	 all	 accrued	 and	 unpaid	 Closing	 Extension	 Fees	 ('Total	
			Payment'),	out	of	future	commissions	'earned	by	Agent	from	Broker,	until	the	Total	Payment	is	paid	in	
			full.	This	payment	may	also	be	made	by	submitting	a	replacement	sale(s)	to	Company that	close	within	
			120	days	of	 the	 replacement	 sale(s)	 subject	 to	a	$200	 fee	per	 replacement	occurrence.	Broker	is now	
			indebted	or	may	in	the	future	become	indebted	to	the	Agent	for	a	commission,	payment	thereof	must	
			be	 made	 payable	 to	 us	 and	 not	 to	 the	 Agent	 or	 any	 other	 entity.	 The	 payment	 should	 be	 sent	 to	
			Company at	3042	S.	Durango	Drive,	Las	Vegas,	NV	89117.	This assignment	may	only	be	revoked	by	an	
			officer	of	Company in	writing.	</span>




<span class="text-layout"><strong>Limited	Liability	of	Agent's	Broker</strong></span>
<span class="text-layout">Other	than	the	obligations	set	forth	above	with	respect	to	future	commissions	•named	by	Agent,	Broker	
shall	 have	 no	 obligation	 with	 respect	 to	 repayment	 of	 the	 Commission	 on	 behalf	 of	 the	 Agent	 in	 the	
event	the	sale	falls	to	close.	</span>
<span class="text-layout"><strong>Closing	Date	Extensions</strong></span>
<span class="text-layout">In	 the	 event	 Agent	 notifies	 Company that	 the	 Closing	 Date	 will	 be	 extended	 (the	 new	 date	 being	
referred	to	as	the	"Extended	Closing Date'),	then	an	extension	 fee	 ("Closing	Date	Extension	Fee")	shall	
be	assessed	and	added	to	the	amount	of	the	Commission	to	be	received	by	Company.	The	Closing	Date	
Extension	 Fee	 is	 to	 be	 calculated	 by	 multiplying	 the	 number	 of	 days	 that	 the	 Closing	 Date	 is	 to	 be	
extended	by	$8.81	(the	"Daily	Rate"),	and	shall	increase	the	amount	of	the	Commission	to	be	received	
by	Company.	In	no	event	shall	the	Extended	Closing	Date	be	extended	to	a	date	which	is	more	than	120	
days	beyond	 the	Closing	Date.	In	 the	event	 the	Closing	Date	is	extended	pursuant	 to	 the	provisions	of	
this	paragraph,	the	Grace	Period	shall	be	extended	for	20	days	from	the	Extended	Closing	Date.</span>

<span class="text-layout"><strong>Grant	of	Security	Interest</strong></span>
<span class="text-layout">As	 collateral	 securing	 Agent's	 obligations	 hereunder,	 Agent	 grants	 to	 Company a	 continuing	 security	
interest	in	Agent's	now	owned	and	hereafter	acquired	accounts,	including	but	not	limited	to	all	current	
and	future	commissions	earned	by	Agent.</span>

<span class="text-layout"><strong>ACH	Authorization</strong></span>
<span class="text-layout">In	order	to	satisfy	any	of	its	obligations	hereunder,	Agent	authorizes	Company to	initiate	electronic	debit	
or	credit	entries	through	the	ACH	system	to	any	deposit	account	maintained	by	Agent.</span>

<span class="text-layout"><strong>Attorneys'	Fees</strong></span>
<span class="text-layout">In	the	event	of	any	litigation	to	interpret	or	enforce	the	provisions	of	this	Agreement	the	prevailing	party	
shall	be	entitled	to	recover	its	reasonable	attorneys'	fees	and	costs	of	court	from	the	other	party.</span>
<span class="text-layout"><strong>Miscellaneous</strong></span>
<span class="text-layout">Should	any	part	of	this	Agreement	be	determined	by	a	court	to	be	illegal	or	in	conflict	with	applicable	
law,	 the	 validity	 of	 the	 remaining	 provisions	 shall	 not	 be	 affected	 by	 such	 determination. This	
Agreement	may	be	executed in	counterparts,	each	of	which	shall	be	considered	and	shall	constitute	an	
original	and	 together	with	all	 other	 documents	 required,	 be	executed	and	 transmitted	 by	 facsimile	 or	
electronically	and	shall	be	in	their	entirety	considered	as	original	documents.</span>
<span class="text-layout"><strong>Arbitration	Agreement</strong></span>
<span class="text-layout">In	order	to	gain	the	benefits	of	a	speedy,	impartial,	and	cost-effective	dispute	resolution	procedure,	and	
for	good	and	valid	consideration	as	covenanted	herein,	and	intending	to	be	legally	bound,	Company and	
Agent	 agree	 that,	 except	 as	 otherwise	 provided	 herein,	 at	 the	 election	 of	 any	 party,	 all	 disputes	 and	
claims	for	which	a	court	otherwise	would	be	authorized	by	law	to	grant	relief,	in	any	manner,	that	Agent	
and	 may	 have,	 now	 or	 in	 the	 future,	 of	 any	 and	 every	 kind	 or	 nature	 whatsoever	 with	 or	 against	
Company,	any	of	Company affiliated	or	subsidiary	companies,	members,	owners,	joint	ventures,	and/or	
any	of	Company managers,	directors,	officers,	employees	or	agents	(collectively	'Buyer	Parties'),	shall	be	
submitted	to	the	American	Arbitration	Association("AAA")	to	be	resolved	and	determined	through	final	
and	 binding	arbitration	according	 to	 the	 Commercial	 Arbitration	 Rules	 of	 the	 AAA.	If	a	 party	 seeks	 to	
have	a	dispute	settled	by	arbitration,	 that	party	must	 first	send	 to	 the	other	party,	by	certified	mail,	a	
written	 Notice	 of	 Intent	 to	 Arbitrate.	 If	 the	 parties	 do	 not	 reach	 an	 agreement	 to	 resolve	 the	 claim	
within	30	days	after	the	Notice	is	received,	a	party	may	commence	an	arbitration	proceeding	with	AAA.	
Company will	promptly	reimburse	Agent	any	arbitration	 filing	 fee.	If	the	arbitrator	 finds	that	ether	the	
substance	of	 the	claim	 raised	by	Agent	or	 the	 relief	sought	by	Agent	is	improper	or	not	warranted,	as	
measured	by	 the	standards	set	 forth	in	Federal	Rule	of	Procedure	11(b),	 then	Company will	pay	 these	
fees	 only	 if	 required	 by	 the	 MA	 Rules.	 If	 the	 arbitrator	 grants	 relief	 to	 the	 Agent	 that	 is	 equal	 to	 or	
greater	 than	 the	 value	 of	 what	 Company has	 requested	 in	 the	 arbitration,	 Company shall	 reimburse	
agent	 for	 that	 person's	 reasonable	 attorneys'	 fees	 and	 expenses	 incurred	 for	 the	 arbitration.	 Agent	
agrees	that	by	entering	into	this	Agreement	they	are	waiving	the	right	to	trial	by	jury.	EACH	PARTY	MAY	
BRING	CLAIMS	AGAINST	ANY	OTHER	PARTY	ONLY	IN	THEIR	INDIVIDUAL	CAPACITY,	and	not	as	a	plaintiff	
or	 class	member	 in	 any	 purported	 class	 or	 representative	 proceeding.	 Further,	 the	 parties	 agree	 that	
arbitrator	may	not	consolidate	proceedings	for	more	than	one	person's	claims,	and	may not	otherwise preside	over	any	form	of	a	represents	i.e	or	class	proceeding,	and	that	if	this	specific	provision	is	found	unenforceable,	then	the	entirety	of	this	arbitration	clause	shall	be	null	and	void,sss</span>

<span class="text-layout" style="width:100%"><strong>Signatures</strong></span>

<span class="text-layout">By ssigning	below	all	parties	agree they	have	read	and	will	abide	by	all	rules	set	forth	in	this	agreement.</span>


<div id="Funding-information">

<div class="funding-box">
<h2 style="width:100%;">Detailed Funding Information:</h2>
<div id="lable">
<span class="text-layout">Property:</span>
<div class="input-box13">
           <input   readonly   value="<?php echo  $advance_form_data['property_address'] ; ?>"     type="text" class="form-control" name="property_address" placeholder="" /></div></div>
            <div class="clearfix"></div>
          <span class="text-layout"> Close Date:</span>
		  <div class="input-box14">
            <input   readonly   value="<?php echo  date('m/d/Y',$advance_form_data['close_date']) ; ?>"     type="text" class="form-control" name="close_date" placeholder="" /></div>
           
           <div class="clearfix"></div>
           
           <span class="text-layout">Advance Amount:</span>
		   <div class="input-box15">
            <input   readonly   value="<?php echo  $advance_form_data['amount_requested'] ; ?>"     type="text" class="form-control" name="amount_requested" placeholder="" /></div>
           
            <div class="clearfix"></div>
          
           <span class="text-layout">  Fees:</span>
		   <div class="input-box16">
           <input   readonly   value="<?php echo  $commission  ; ?>"     type="text" class="form-control" name="commission_one" placeholder="" /></div>
<span class="text-layout">Total Due at Closing </span>
<div class="input-box17">
             <input   readonly   value="<?php echo $total_amount ; ?>"     type="text" class="form-control" name="total_amount_three" placeholder="" /></div>
           
           
           
</div>

</div>
           
    
<div id="Signatures-information">

<div class="funding-box">
<h2 style="width:100%;">Signatures</h2>
<span class="text-layout">Agent</span><div class="input-box18">
          <input   readonly   value=""     type="text" class="form-control" name="username" placeholder="" /></div>
           
          <span class="text-layout"> Broker</span><div class="input-box19">
            <input   readonly   value=""     type="text" class="form-control" name="username" placeholder="" /></div>
           
           <span class="text-layout">Company</span><div class="input-box20">
            <input   readonly  value="<?php echo  $advance_form_data['closing_company_name'] ; ?>"    type="text" class="form-control" name="username" placeholder="" /></div>
           

</div>

</div>       
           
           
           </div><!--mian-form--->
           
           
           
           
           
           <div class="clearfix"></div>
            
            
            </div>

    </div>
</div>


<div id="commision-form2">
	<div class="">
    <div class="panel">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<img src="http://www.neo-crews.com/E_commision/application/backend/themes/assets/img/logo-white.png" class="img-responsive"  />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<span class="text-layout">Escrow#</span>
                    <label  class="text-layout"><?php echo  $advance_form_data['escrow_file_number']  ?> </label>
					<!--<div class="input-box">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle">
					</div>
                	-->
                </div>
             </div>
            </div>
             <div class="row tborder">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<h4><b>Irrevocable Commission Disbursement Authorization Form</b></h4>
                </div>
			</div>	
            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                	<span class="text-layout">To</span>
                	<label class="text-layout"><?php echo  $advance_form_data['escrow_officer'] .' At ' .$advance_form_data['closing_company_name'] ;  ?> </label>
                </div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                	<span class="text-layout">Date:</span>
                     <label  class="text-layout"><?php echo  $advance_form_data['created']  ?> </label>
					<!--<div class="input-box">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle">
					</div>-->
                </div>
            </div>
			
			
			<div id="form">
			   
			  
			
			
			
				<div class="row col-border1">
				<div class="col-md-12 col-sm-12 col-xs-12 ">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cborder"> 
						<span><h5><b><center>Property Address</center></b></h5></span>
					</div>
				
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
						<span><h5><b><center>Agent and Broker</center></b></h5></span>
					</div>
				</div>
				</div>
				
				<div class="row col-border1">
				
				
					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cborder">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <label  class="text-layout"><?php echo  $advance_form_data['property_address']  ?> </label>
                    	 <!-- <textarea class="form-control" rows="0" id="comment" style="height: 34px;"></textarea>-->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    	 <span class="text-layout">City:</span>  
                         <label  class="text-layout" name="city"><?php echo  $advance_form_data['city']  ?> </label> 
						<!-- <div class="input-box1">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div>-->
					</div>
					 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <span class="text-layout">State:</span>   
                            <label  class="text-layout" name="state"><?php echo  $advance_form_data['state']  ?> </label> 
						<!-- <div class="input-box2">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
				     </div>
					  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <span class="text-layout" >Zip Code:</span>  
                            <label  class="text-layout" name="zipcode"><?php echo  $advance_form_data['zipcode']  ?> </label>  
						<!-- <div class="input-box3">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
                    </div>
                </div>
				
				
					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    	 <span class="text-layout">Agent:</span> 
                         <label  class="text-layout"><?php echo agent_name(array('id'=>$ID)) ; ?> </label>    
						<!-- <div class="input-box4">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	 <span class="text-layout">Broker:</span>  
                         <label  class="text-layout"><?php echo  $advance_form_data['broker_name']  ?> </label>   
						<!-- <div class="input-box5">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
                    </div>
                </div>
				</div>
			</div>
			<div class="row col-border1">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cborder">
							 <span class="text-layout">Buyer</span> 
                             <label  class="text-layout"><?php echo  $advance_form_data['buyers_name']  ?> </label>  
							 <!--<div class="input-box6">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
						 </div>
						  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
							 <span class="text-layout">Seller</span> 
                             <label  class="text-layout"><?php echo  $advance_form_data['sellers_name']  ?> </label>  
							 <!--<div class="input-box7">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
						 </div> -->
						 </div>
                </div>
			</div>
			<div class="row col-border1">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  bborder">
                    	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							 <span class="text-layout">Scheduled Closing Date</span> 
							 <label  class="text-layout"><?php echo date('m/d/Y', $advance_form_data['close_date'] ); ?> </label>  
						 </div>
						   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
						     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <span class="text-layout">Invoice Amount</span> 

							 </div>
							
						</div>
                        
                   	</div>     
                        
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
							 <span class="text-layout pull-left">$</span> 
          
                              
                               <span class="text-layout pull-right">Amount Due</span> 
							 <!--<div class="input-box8">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
							</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							
							 
						 </div>
                       </div>
		
			</div>
			
			
			<div class="row col-border1">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-border">
					<h4>Irrevocable Commission Disbursement Instructions to Escrow</h4>
				</div>
			</div>
			
			<div class="col-border">
				<span class="text-layout">If you have any questions regarding these instructions, please telephone our office at 702-685-3000, Monday
to Friday 9:00 to 5:30 PST, PRIOR TO CLOSING ESCROW.</span> 
				<span class="text-layout">Commission Check Advance.com has been assigned a portion of the commissions earned on the sale of the
property above by</span>
 <label  class="text-layout"><?php echo  $advance_form_data['brokerage_name']  ?> </label>  
  <label  class="text-layout"><?php echo  $advance_form_data['closing_company_name']  ?> </label>  
				<!--<div class="input-box9">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>-->
				
				<!--<div class="input-box10">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>-->
				
				<span class="text-layout">is hereby irrevocably instructed to deduct</span>
                  <label  class="text-layout">Total amount</label>  
                
				<!--<div class="input-box11">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>-->
				
				<span class="text-layout">from the commission proceeds that would be otherwise payable to</span>
                 <label  class="text-layout"><?php echo  $advance_form_data['brokerage_name']  ?> </label>  
				<!--<div class="input-box12">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>-->
			
				<span class="text-layout">and to remit this amount at closing to Commission Check Advance.com. These instructions cannot be changed. This shall be your good and sufficient authority to make this disbursement to Commission Check Advance.com</span><br />
				<span class="text-layout">In the event that the</span>
                 <label  class="text-layout"><?php echo date('m/d/Y',$advance_form_data['close_date']) ;  ?> </label>  
<!--				<div class="input-box13">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>
-->				<span class="text-layout">closing date for this sale is delayed or otherwise extended, causing the Amount to be Disbursed to Commission Check Advance.com to change,</span>
 <label  class="text-layout"><?php echo  $advance_form_data['brokerage_name']  ?> </label>  
			<!--	<div class="input-box14">
					<input type="text" class="form-control" name="username" placeholder=""  align="middle"></div>-->
				
				<span class="text-layout">hereby authorizes Commission Check Advance.com to provide you with amended/updated disbursement instructions, as required.</span>
				<span class="text-layout">Because time is of the essence in receiving this payment, we encourage wire transfers or repayments by FedEx.</span>
			</div>	
			
			
			<div class="row col-border1">
            <div class="col-md-12 col-sm-12 col-xs-12 topborder">
            	<div class="col-md-6 col-sm-6 col-xs-12 ">
					<h4><b><center>If Repaying By courier or check send to:</center></b></h4>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<h4><b><center>If Repaying By ACH or Wire Transfer:</center></b></h4>
				</div>
            </div>
				
			</div>
			<div class="row col-border1">
				<div class="col-md-6 col-sm-6 col-xs-12 cborder" style="padding-bottom: 30%;">
					<label  class="text-layout">Commision Check Advance.com</label>  
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="col-mg-12 col-sm-12 col-xs-12">
					<h4>Commision Check advance.com Bank Information</h4>
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
					<h4>Nevda State Bank</h4>
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
					<h4>Payee:Commision Check Advance.com</h4>
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
						<span class="text-layout">From</span> 
                        <label  class="text-layout" name="display_name"><?php echo agent_name(array('id'=>$ID)) ; ?> </label>
							<!-- <div class="input-box15">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
							<span class="text-layout">Account No.</span> 
                             <label  class="text-layout"><?php echo $this->config->item('account_no') ; ?> </label>
							<!-- <div class="input-box16">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
							<span class="text-layout">Routing No.</span> 
                             <label  class="text-layout"><?php echo $this->config->item('routing_no') ; ?> </label>
							<!-- <div class="input-box17">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
					</div>
					<div class="col-mg-12 col-sm-12 col-xs-12 ">
							<span class="text-layout">Please Reference Escrow Number</span> 
                             <label  class="text-layout"><?php echo  $advance_form_data['escrow_file_number'] ?></label>
							<!-- <div class="input-box18">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
					</div>
				</div>
			</div>
			<div class="row col-border1">
				<div class="col-mg-12 col-sm-12 col-xs-12 ">
					<h4>Broker's Signature Authorizing Direct payment to commission check advance.com</h4>
				</div>
			</div>
			
			<div class="row col-border1">
				<div class="col-mg-6 col-sm-6 col-xs-6 ">
					<span class="text-layout">Broker:</span>

							 <!--<div class="input-box">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
				</div>
				<div class="col-mg-6 col-sm-6 col-xs-6 ">
							<span class="text-layout">Date:</span> 

							 <!--<div class="input-box">
								<input type="text" class="form-control" name="username" placeholder="" align="middle">
							</div>-->
				</div>
			</div>

           
           
           
           
           
           <div class="clearfix"></div>
            
            
            </div>

    </div>
</div>

  <div class="clearfix"></div>
<div class="row">
<div class="pull-right" style="padding:1%; "><a href="<?php echo BASEURL ?>/users/change_Status/0/<?php echo $recored_id ?>/<?php echo $ID; ?>"  class="btn btn-primary"><i class="fa fa-dedent"></i> &nbsp; Deny</a></div>
<div class="pull-right" style="padding:1%; "><button   value="pdf"  onclick="set_value()"  class="btn green"><i class="fa fa-send"></i> &nbsp; Approved and send to docusign</button></div>

</div>
</form>
</div>
</div>
</body>
</html>
