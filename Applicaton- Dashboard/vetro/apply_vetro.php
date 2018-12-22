<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php  
error_reporting(0);  



    require_once 'Google/autoload.php';
    session_start(); 
    
    parse_str(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY), $queries);

if (isset($queries['referral'])) {
   

$_SESSION['referral_code']=$queries['referral'];
}
    // ********************************************************  //
    // Get these values from https://console.developers.google.com
    // Be sure to enable the Analytics API
    // ********************************************************    // 
   $client_id = 'XXXXXXXXX';
    $client_secret = 'XXXXXXXXX';
    $redirect_uri = 'http://pingnetwork.in/apply_vetro.php';
$server_key='XXXXXXXXX';
             

    $client = new Google_Client();
    $client->setApplicationName("Client_Library_Examples");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->setScopes(array('https://www.googleapis.com/auth/youtubepartner-channel-audit','https://www.googleapis.com/auth/youtube.readonly'));
    $client->setAccessType('offline');   // Gets us our refreshtoken
    $nameis;

    //For loging out.
		if (isset($_GET['logout']) && $_GET['logout'] == "1") {
			unset($_SESSION['token']);
			unset($_SESSION['post-data']);
   	}
    
    // Step 1:  The user has not authenticated we give them a link to login    
    if (!$client->getAccessToken() && !isset($_SESSION['token'])) {
    	$authUrl = $client->createAuthUrl();
      print '<base target="_blank" /><head><link href="google_auth_style.css" rel="stylesheet"> 
				
        <script>
					function divFunction(){
					 var check_box = document.getElementById("agree").checked;
										      if(!(check_box))
										      {
										      alert("Please accept Terms of Service");
										      return false;
										      }
                                              
					}
					function validateForm()
					{
						var re = /((http|https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9]{1,}/;
		  			//var x = document.forms["user_form"]["channel_url"].value;
						var x= document.user_form.channel_url.value ;
						//alert(x);
		 				//alert("Check Network URL");
		 				//alert(re.test(x));
						if(!(re.test(x)) )	
						alert("Check channel URL");
					}
				</script>        
        <section id="intro" class="top dark-bg img-bg-center img-bg-soft" style="background-image: url(bg-apply.jpg);">
        <div class="container inner">

            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-10 center-block">
                    <header>
                        <h1 >
                           Apply now
                                                    </h1>
                        <p>
                            Are you ready to take your channel to the next level?
                            Whether you\'re just starting out on the path to greatness,
                            or you\'re a seasoned YouTuber looking for brand deals and
                            opportunities beyond YouTube, we have the team and tools to get you there.
                        </p>
                    </header>
                </div>
            </div>

        </div>
    </section>
    <section id="apply">
        <div class="container inner-top-xs inner-bottom-md">

            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-10 center-block animated">

                   <p>Please fill out the form below, and we will review your application within two business days.</p>

                    <form name="user_form" method="POST" action="" accept-charset="UTF-8" class="form"><input name="_token" type="hidden" value="UVX0DcqvxJzCNZslEXE774H8fUqrODx9M0GtgItn">



<div class="form-group ">
    <label for="email" >Email</label>
    <input class="form-control" name="email" type="text" id="email">
        </div>




<div class="form-group ">

       
        <label for="first_name" >Name</label>
        <input class="form-control" name="full_name" type="text" id="first_name">
            

        <!--<div class="col-md-6 ">
        <label for="last_name">Last Name</label>
        <input class="form-control" name="last_name" type="text" id="last_name">
            </div>-->

</div>

<div class="form-group ">

        <!--<div class="col-md-6 ">
        <label for="network_name">Network Name</label>
        <input class="form-control" name="network_name" type="text" id="network_name">
            </div>-->

        
        <label for="channel_url">Channel Url</label>
        <input onchange="return validateForm()" class="form-control" name="channel_url" type="text" id="channel_url">
            

</div>



    
    
    <div class="form-group ">

       
        <label for="first_name" >PayPal ID  </label>
        <input class="form-control" name="PayPal_ID" type="text" id="PayPal_ID">
        
</div>

<div class="form-group ">
    <label for="agree"  >Terms of Service</label>
    <div class="scrollable" >
  
  <p> The terms and conditions (the "Terms and Conditions") which govern the 

relationship between you (the "Content Provider") on the one hand, and 

VETRO DIGITAL Limited, a company incorporated under the England & 

Wales companies Act, 1956, having its registered office at 21 ROWTON 

ROAD,GREENWICH, LONDON, UNITED KINGDOM, SE182TE, (hereinafter 

called `VETRO\'), on the other hand, with regard to the YouTube channel(s) 

broadcast over the internet (collectively, the "Properties") described in the 

application (the "Application") submitted to Vetro Digital Network. By 

accepting these Terms, you covenant and agree to be bound by the 

Application and the Terms (collectively, the "Agreement").

In consideration of the mutual agreements and undertakings of the 

parties set forth herein below, and for good and valuable consideration, 

the receipt, adequacy and sufficiency of which are hereby acknowledged 

by the parties hereto, the parties hereto hereby agree as follows:

1. Properties/Content. Content Provider represents and warrants that 

Content Provider exclusively owns and/or has all necessary rights to 

control the Properties during the Term of this Agreement, as well as all 

content (both audio and visual) exploited through such Properties 

(collectively, the "Content").</p>

<p>2. License. Content Provider hereby grants to VETRO DIGITAL Network the 

exclusive, worldwide right and license, during the Term hereof, to exploit, 

manage and monetize (through enabling and selling advertising) the 

Properties and the Content as part of VETRO DIGITAL Network\'s branded 

YouTube network(s). Without limiting the foregoing, VETRO DIGITAL 

Network will have the exclusive right throughout the Term hereof to 

represent, sell and manage all advertising inventory pertaining to the 

Properties, including but not limited to any advertising sales and/or 

sponsorship opportunities, inclusion of advertising by advertising 

networks, use of annotations and related features, and the serving and 

monitoring of all advertising and/or sponsorship campaigns and 

programs. VETRO DIGITAL Network will collect all revenue generated from 

the Properties directly (e.g., through Ad Sense, Video Ad Sense, YouTube 

direct sales, VETRO DIGITAL Network\'s direct sales, etc.) (collectively, the 

"Revenue"), and pay Content Provider its share of such Revenue in 

accordance with the terms of this Agreement. Without limiting the 

foregoing license, Content Provider further grants to VETRO DIGITAL 

Network any and all rights and licenses reasonably required for VETRO 

DIGITAL Network to perform and enjoy its rights under this Agreement.

a. At such time as monetization of the Content via Facebook and/or 

other forms of social media becomes available, Content Provider shall 

further grant to VETRO DIGITAL Network the exclusive, worldwide right 

and license, during the Term hereof, to exploit, manage and monetize 

(through enabling and selling advertising) the Content via all forms of 

social media including but not limited to Facebook. In such cases, 

VETRO DIGITAL Network will collect all revenue generated from the 

Content directly from the social media source (e.g. Facebook), and pay 

Content Provider its share of such Revenue in accordance with the 

terms of this Agreement.</p>

<p>3. Revenue Share and Payment Terms. All Revenue generated hereunder 

with respect to the Properties and/or Content shall be allocated and paid 

thirty percent (30%) to VETRO DIGITAL Network and seventy percent (70%) 

to Content Provider, respectively. VETRO DIGITAL Network will pay 

Content Provider its share of all Revenue due to Content Provider 

hereunder, if any, on a monthly basis in accordance with the terms of this 

Agreement, within thirty (30) days after the end of each calendar month; 

provided that a) if payment is made via PayPal, then the minimum 

monthly payment to Content Provider is Ten dollar (US$10), and b) if 

payment is made via any means other than PayPal, then VETRO DIGITAL 

Network need not make payment to Content Provider hereunder until 

such time as there is an aggregate of at least one hundred dollars 

(US$100) due and payable to Content Provider hereunder. 

Notwithstanding anything to the contrary contained herein, VETRO 

DIGITAL Network may deduct from any and all Revenue otherwise 

payable to Content Provider hereunder all wire transfer fees, ACH fees, 

and other reasonable administrative fees (such administrative fees not to 

exceed 5% of the amount of Revenues payable to Content Provider in any 

given month) that are charged to VETRO DIGITAL Network in connection 

with the carrying out of its duties in accordance with this Agreement 

and/or otherwise incurred by VETRO DIGITAL Network in connection with 

monetizing the Properties and/or Content hereunder.

a. Notwithstanding the foregoing, all Revenue generated as a result of 

so-called claimed views (“Claimed Views”), i.e. views that are a) 

generated by third-party, user-generated content, and b) claimed by 

Company on Content Provider’s behalf, shall be allocated and paid fifty 

percent (50%) to VETRO DIGITAL Network and fifty percent (50%) to 

Content Provider, respectively. All other payment terms described in 

Paragraph 3 above shall remain unchanged.</p>

<p>4. License to Use Intellectual Property. Content Provider also grants to 

VETRO DIGITAL Network a non-exclusive, worldwide, royalty-free license 

to use any trademarks, trade names, trade dress, slogans, designs, 

copyrights and/or logos that are provided by Content Provider in 

connection with the Properties and/or the Content in connection with 

VETRO DIGITAL Network\'s performance of its duties hereunder and/or in 

connection with VETRO DIGITAL Network\'s promotional activities.</p>

<p>5. Removal/Modification of Content. On occasion, VETRO DIGITAL Network 

may request that Content Provider remove certain Content or disable 

advertising on certain Content if it is deemed unsuitable for advertising 

purposes or in violation of YouTube terms of use. Such requests will be 

issued by VETRO DIGITAL Network via email or telephone call and must be 

handled with expediency by Content Provider. Notwithstanding the 

foregoing or anything contained herein to the contrary, VETRO DIGITAL 

Network has the right to terminate this Agreement upon written notice to 

Content Provider if it is determined by VETRO DIGITAL Network, in VETRO 

DIGITAL Network\'s sole discretion, that Content Provider has uploaded 

and/or received a ‘strike\' for copyrighted material in violation of YouTube 

terms of use, and/or for any reason whatsoever.</p>

6. Term of Agreement. This Agreement shall begin on the Effective Date 

and may be terminated at any time upon thirty (30) days\' prior written 

notice by either party. Until such time as the Agreement is terminated, if 

ever, by either party, the Agreement shall remain in full force and effect. 

The period of time during which this Agreement is in effect is referred to 

herein as the "Term".</p>

<p>7. Obligations of Content Provider.

Content Provider\'s obligations are as follows:

Content Provider shall deliver/upload the Content and associated 

metadata pursuant to specifications and terms of use provided by 

YouTube, which are subject to change by YouTube.

Content Provider shall not deliver Content Provider Content that infringes 

on the rights of others.

If Content Provider receives a copyright takedown notice from YouTube or 

any third party, Content Provider shall immediately notify VETRO DIGITAL 

Network in writing of same. Content Provider\'s failure to send such 

notification may result in suspension from YouTube and the termination 

of this Agreement.

If any Content contains visibly prominent paid advertisements or 

sponsorships, Content Provider shall immediately notify VETRO DIGITAL 

Network in writing of same.

Content Provider shall enable advertising on all Properties and Content 

unless such enabling of advertising infringes on the rights of others or is 

otherwise in violation of YouTube terms of use; VETRO DIGITAL Network 

shall have no obligation to make payments to Content Provider for any 

Properties that have not been ad-enabled by Content Provider.

Content Provider shall not enter into any agreement during the Term that 

is inconsistent with the terms or spirit of this Agreement.</p>

<p>8. Ownership and Control of Properties. Content Provider shall retain full 

control and ownership of, and absolute liability for, the Properties, 

including the creation, procurement, and uploading of all Content and the 

ongoing management and look and feel of the Properties.</p>

<p>9. Taxes. All payments made in connection with this Agreement are 

exclusive of taxes imposed by governmental entities of whatever kind and 

imposed with respect to the transactions for services provided under this 

Agreement. Each party shall be responsible for any taxes relating to 

payments it makes or receives under this Agreement.</p>

<p>10. Assignment. VETRO DIGITAL Network shall have the right to assign this 

Agreement to any party for any reason upon written notice to Content 

Provider. Content Provider may not assign this Agreement to any party, 

with the sole exception of an outright sale by Content Provider of Content 

Provider\'s Properties and/or Content. In the event that Content Provider 

desires to sell its Properties and/or Content, Content Provider must first 

provide to VETRO DIGITAL Network i) advance written notice of such sale, 

and ii) any information about the new owner, including but not limited to 

name, address, payment details and tax information, which VETRO 

DIGITAL Network may reasonably request in order to fulfill its obligations 

under this Agreement.</p>

<p>11. Fraud. Content Provider will not, directly or indirectly, authorize or 

encourage any third party to generate automated, fraudulent or 

otherwise invalid advertising actions (e.g., "click fraud," "action fraud" or 

"impression fraud"). If VETRO DIGITAL Network believes in good faith that 

Content Provider has violated this Section, VETRO DIGITAL Network may 

(i) withhold payments to Content Provider until such suspected fraud is 

resolved and remedied to VETRO DIGITAL Network\'s satisfaction, and/or 

(ii) immediately terminate this Agreement.</p>

<p>12. Nature of Relationship. Nothing herein creates a partnership, joint 

venture, employer/employee or other relationship between the parties 

other than that of independently contracting parties. It is acknowledged 

and understood that VETRO DIGITAL Network reserves the right to reject 

any Application for any or no reason.</p>

<p>13. Confidentiality. Neither party will disclose the terms hereof to any 

third party without the other party\'s prior written agreement. Further, the 

parties shall not disclose to any third party any non-public and/or 

proprietary information disclosed by one party to the other hereunder, 

and each party shall protect such information from the other with at least 

the same degree of care used to protect its own confidential information.</p>

<p>14. Representations and Warranties; Indemnity. Content Provider 

represents and warrants that: (i) Content Provider is at least 18 years of 

age or has obtained the written consent of Content Provider\'s parent or 

legal guardian to enter into this Agreement (as evidenced below); (ii) 

Content Provider has the full right, power and authority to enter into and 

perform this Agreement and grant the rights herein granted without the 

consent of any third party; (ii) Content Provider exclusively owns and/or 

controls any and all rights and clearances necessary in connection with 

this Agreement for the exploitation of the Properties and Content as 

contemplated herein, free and clear of any liens, encumbrances, other 

third party interests of any kind, and free of any claims or litigation, 

whether pending or threatened, (iii) none of the Properties or Content nor 

any elements thereof infringes the copyright in any other work, or violates 

the rights to privacy or publicity of any person or entity, nor constitutes a 

defamation against any person or entity, nor in any other way violate the 

rights of any person entity; (iv) VETRO DIGITAL Network\'s performance of 

activities contemplated herein will not infringe upon the rights of, or 

require the consent of, any third party or parties; and (iv) Content 

Provider will not include in the Properties any Content that violates (a) 

YouTube\'s or VETRO DIGITAL Network\'s terms of use or (b) the terms of 

this Agreement. Content Provider agrees to indemnify, defend and hold 

VETRO DIGITAL Network and its employees, agents, representatives, 

principals, managers, members, contractors and affiliates harmless from 

and against any and all claims, actions, liabilities, damages, costs and 

expenses (including, without limitation, reasonable attorneys\' fees and 

costs) arising out of or relating to the inaccuracy, incompleteness or 

breach of any of Content Provider\'s representations, warranties or 

agreements contained herein.</p>

<p>15. DISCLAIMER; LIMITATIONS ON LIABILITY. EXCEPT FOR THE EXPRESS 

WARRANTIES MADE HEREIN, THE PARTIES DISCLAIM ALL WARRANTIES, 

EXPRESS OR IMPLIED, INCLUDING ANY IMPLIED WARRANTY OF 

MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. EXCEPT FOR 

THE INDEMNITIES SET FORTH HEREIN: (I) NEITHER PARTY WILL BE LIABLE 

TO THE OTHER FOR INDIRECT, CONSEQUENTIAL, SPECIAL, PUNITIVE OR 

EXEMPLARY DAMAGES OR PENALTIES ARISING FROM OR RELATED TO 

THIS AGREEMENT; AND (II) NEITHER PARTY\'S AGGREGATE LIABILITY FOR 

ANY CAUSE OF ACTION ARISING FROM OR RELATED TO THIS AGREEMENT 

WILL EXCEED $1,00,000.</p>

<p>16. Arbitration. Any dispute arising hereunder shall be resolved through 

confidential binding arbitration conducted in Mumbai,India, in accordance 

with and pursuant to the rules and regulations of JAMS. There shall be a 

single arbitrator mutually selected by the parties (or the parties cannot 

agree, then mutually selected by arbitrators appointed by each of the 

parties). The determination of the arbitrator shall be final and binding on 

the parties, and judgment on the award rendered may be entered in any 

court having jurisdiction.</p>

<p>17. Governing Law and Jurisdiction. This Agreement is entered into in 

London, Uk and shall be governed by internal laws of United Kingdom. 

Subject to the mandatory binding arbitration provisions set forth above, 

only the courts in London,UK shall have jurisdiction over controversies 

regarding this Agreement, and any proceeding involving such a 

controversy shall be brought only in those courts and not elsewhere. Any 

process in such proceeding may be served by, among other methods, 

delivering it or mailing it, by registered or certified mail, directed to a 

party. </p>

<p>18. Limitation of Remedies. No act or omission on the part of VETRO 

DIGITAL Network shall constitute a breach or default of this Agreement 

unless Content Provider shall first notify VETRO DIGITAL Network in 

writing and VETRO DIGITAL Network has not commenced to cure such 

default within twnty one (21) business days from its receipt of such 

written notice. In the event of any such default or breach, Content 

Provider acknowledges and agrees that it shall be limited to its remedy at 

law for money damages, if any, actually and proximately caused by such 

breach, and Content Provider shall not have the right to: (i) terminate or 

rescind this Agreement or any rights, privileges or benefits granted or 

licensed hereunder, or (ii) seek injunctive or other equitable relief, or (iii) 

enjoin or restrain the exhibition, distribution, broadcast, use, advertising, 

promotion or other exploitation of any of the Properties or Content or any 

elements thereof or other rights relating thereto.<p>

<p>19. Miscellaneous/Entire Agreement. If any provision hereof shall be held 

by a court to be invalid or unenforceable, such finding shall not otherwise 

affect the validity of the other terms of this Agreement. This Agreement 

contains the parties\' entire agreement, and supersedes any and all prior 

or contemporaneous agreements between the parties, whether oral or 

written, with respect to the subject matter hereof.

Agreed to with force and effect from and as of the Effective Date.</p> 
</div>
</div>
<div class="form-group ">
    <div class="checkbox single">
        <label>
            <label>
                <input id="agree" class="form-control2" name="agree" type="checkbox" value="1">
                I accept the Terms of Service. 
                                                                                             </label>
        </label>
    </div>
</div>


<br>

<div class="form-group">';
print "<button name='submit' type='submit' onClick='return divFunction()' id='submit_button' class='btn btn-submit btn-primary btn-block' >Connect Me!</button>";
 print'  </div>

</form>


                </div>
            </div>

        </div>
    </section>
    ';
	}
    
 	if ( isset( $_POST['submit'] )) {
 		$_SESSION['post-data'] = $_POST;
       
		echo "<script>window.location=\"$authUrl\";</script>";
      
       
	}
  // Step 3: We have access we can now create our service
	if (isset($_SESSION['token'])) {
		 
		print '<!--<base target="_blank" />--><head><link href="google_auth_style.css" rel="stylesheet"> 
    	<body ><center><div id="d1">
      <div id="d2" >
		    <img src="National_Thank_You_Day.png" 
				alt="National_Thank_You_Day" width="500" 	height="200" class="aligncenter size-full wp-image-35137" />
      </div>
      <center>Your application is received and we will contact you soon.</center>';
		/*print "<a style=' background: #95CFFF; border-radius: 5px; padding: 5px; ' class='logout' 
			href='http://vetro.tv/'>Back</a><br>";*/
		print '</div></center></body>';
        
	}
// Step 2: The user accepted your access now you need to exchange it.
if (isset($_GET['code'])) { 
	$client->authenticate($_GET['code']);  
	$_SESSION['token'] = $client->getAccessToken();
    
    $network_name=$_SESSION['post-data']['network_name'];
   	$channel_url=$_SESSION['post-data']['channel_url'];
		$full_name=$_SESSION['post-data']['full_name'];
		$email=$_SESSION['post-data']['email'];
    $PayPal_ID=$_SESSION['post-data']['PayPal_ID'];
    $referral_code=$_SESSION['referral_code'];
		$node = array (
			'type' => 'channel_applications',
		  'language' => 'und',
		  'title' => 'Vetro'     
		);
		$node['field_email']['und'][0]['value'] = $email;
		$node['field_network_name']['und'][0]['value'] = 'Vetro';
		$node['field_full_name']['und'][0]['value'] = $full_name;
		$node['field_channel_url']['und'][0]['value'] = $channel_url;
		$node['field_paypal_id']['und'][0]['value'] = $PayPal_ID;
		date_default_timezone_set('Asia/Calcutta');
		$node['field_date']['und'][0]['value']['date'] = date("Y-m-d");			
		$node['field_date']['und'][0]['value']['time'] = date("H:i");
       $node['field_referral_code']['und'][0]['value'] =$referral_code;
		
    //print "Access from google: " . $_SESSION['token']."<br>"; 
		$token_string=$_SESSION['token'];
       
    $token_string= json_decode($token_string,true);
   	$token=$token_string['access_token'];
		$ch = curl_init("http://prism.pingnetwork.in:8080/HawkEye/channelinfoAPIKey?api_key=$server_key&at=$token");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($ch);
		$result=(json_decode($result, true));
		curl_close($ch);
		
        
		//die;
		if($result['response'] != "FAIL") {
			$node['field_channel_id']['und'][0]['value'] = $result['id'];
			$node['field_channel_display_name']['und'][0]['value'] = $result['name'];
			$node['field_comment_count']['und'][0]['value'] = $result['channelStatistics']['commentCount'];
			$node['field_hidden_subscriber_count']['und'][0]['value'] = $result['channelStatistics']['hiddenSubscriberCount'];
			$node['field_subscriber_count']['und'][0]['value'] = $result['channelStatistics']['subscriberCount'];
			$node['field_video_count']['und'][0]['value'] = $result['channelStatistics']['videoCount'];
			$node['field_ch_view_count']['und'][0]['value'] = $result['channelStatistics']['viewCount'];
			if(isset($result['channelAuditDetails']['communityGuidelinesGoodStanding']) ){
				$node['field_community_guidelines_stand']['und'] = 
				$result['channelAuditDetails']['communityGuidelinesGoodStanding'] ? '1' : '0';
			}
			if(isset($result['channelAuditDetails']['contentIdClaimsGoodStanding'])) {
				$node['field_content_id_claims_standing']['und'] = 
				$result['channelAuditDetails']['contentIdClaimsGoodStanding'] ? '1' : '0';
			}
			if(isset($result['channelAuditDetails']['copyrightStrikesGoodStanding'])) {
				$node['field_copyright_strikes_standing']['und'] = 
				$result['channelAuditDetails']['copyrightStrikesGoodStanding'] ? '1' : '0';
			}
			if(isset($result['channelAuditDetails']['overallGoodStanding'])) {
				$node['field_overall_standing']['und'] = 
				$result['channelAuditDetails']['overallGoodStanding'] ? '1' : '0';
			}
		}
		$rest_endpoint = "http://cms.pingnetwork.in/channel-application/";
		$options[CURLOPT_RETURNTRANSFER] = true;
		$options[CURLOPT_POST] = true;
		//login as rest user
	  $username = 'XXXXXXXXX';
	  $password = 'XXXXXXXXX';
	  $login_url = $rest_endpoint.'user/login.json';
	  $credentials = array(
	    'username' => $username,
	    'password' => $password
	  );
		$ch_login = curl_init($login_url);
		$options[CURLOPT_POSTFIELDS] = $credentials;
		curl_setopt_array($ch_login, $options);
		$c_exe = curl_exec($ch_login);
		$response = json_decode($c_exe);
		$http_code = curl_getinfo($ch_login, CURLINFO_HTTP_CODE);
	  if ($http_code != 200) {
	    $response = curl_error($ch_login);
	  }
		else {
			$drupal_cookie = $response->session_name . '=' . $response->sessid;    
			$csrf_token = $response->token;
			$url = $rest_endpoint."node.json";
			$ch_node = curl_init($url);
			$options[CURLOPT_HTTPHEADER] = array('X-CSRF-Token: ' . $csrf_token);
			$options[CURLOPT_COOKIE] = $drupal_cookie;
			$options[CURLOPT_POSTFIELDS] = http_build_query($node);
			curl_setopt_array($ch_node, $options);
			$response = curl_exec($ch_node);
			$http_code = curl_getinfo($ch_node, CURLINFO_HTTP_CODE);    
			if ($http_code != 200) {
			  $response = curl_error($ch_node);
			}
			curl_close($ch_node);
		}
		curl_close($ch_login);
		
		
       print'<html>
 <head>
   <script type="text/javascript">
     setTimeout(function() {
       window.opener;
      window.opener.location.reload();
     

       window.close();
       
     }, 1);
   </script>
 </head>
 <body>
   <p>Please wait. Redirecting you back now...</p>
 </body>
</html>';
	//echo "<script>window.location=\"$redirect_uri\";</script>";
    //echo header("LOCATION: $redirect_uri");
   
	//$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	//header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

/*########## MySql details  #############
$db_username = "goauth"; //Database Username
$db_password = "zMS3T76heeany5bF!"; //Database Password
$host_name = "sg2nldg55mysql9.secureserver.net"; //Mysql Hostname
$db_name = 'goauth'; //Database Name
###################################################################

// connect to database
$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
else
{


$sql = "INSERT INTO google_auth (id, name,commentCount,hiddenSubscriberCount,subscriberCount,videoCount,viewCount,communityGuidelinesGoodStanding,contentIdClaimsGoodStanding,copyrightStrikesGoodStanding,overallGoodStanding,network_name,channel_url,full_name,email,PayPal_ID,date)
VALUES ('$id', '$name', '$commentCount','$hiddenSubscriberCount','$subscriberCount','$videoCount','$viewCount','$communityGuidelinesGoodStanding','$contentIdClaimsGoodStanding','$copyrightStrikesGoodStanding','$overallGoodStanding','$network_name','$channel_url','$full_name','$email','$PayPal_ID','$date')
ON DUPLICATE KEY UPDATE 
name='$name', commentCount='$commentCount',hiddenSubscriberCount='$hiddenSubscriberCount',subscriberCount='$subscriberCount',videoCount='$videoCount',viewCount='$viewCount',communityGuidelinesGoodStanding='$communityGuidelinesGoodStanding',contentIdClaimsGoodStanding='$contentIdClaimsGoodStanding',copyrightStrikesGoodStanding='$copyrightStrikesGoodStanding',overallGoodStanding='$overallGoodStanding',network_name='$network_name',channel_url='$channel_url',full_name='$full_name',email='$email',PayPal_ID='$PayPal_ID',date='$date'";
//echo $sql;
$mysqli->query($sql);
} 
/*$client->setAccessToken($_SESSION['token']);
$service = new Google_Service_Analytics($client);    

// request user accounts
$accounts = $service->management_accountSummaries->listManagementAccountSummaries();
*/

/* foreach ($accounts->getItems() as $item) {

echo "<b>Account:</b> ",$item['name'], "  " , $item['id'], "<br /> \n";

foreach($item->getWebProperties() as $wp) {
echo '-----<b>WebProperty:</b> ' ,$wp['name'], "  " , $wp['id'], "<br /> \n";    
$views = $wp->getProfiles();
if (!is_null($views)) {
// note sometimes a web property does not have a profile / view

foreach($wp->getProfiles() as $view) {

echo '----------<b>View:</b> ' ,$view['name'], "  " , $view['id'], "<br /> \n";    
}  // closes profile
}
} // Closes web property

} // closes account summaries
*/
?>