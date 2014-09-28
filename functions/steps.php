<?php 
	// Steps Shortcode
function psfc_process( $atts , $content = null ) {
 return <<< EOF
 	<div class="col-xs-12 step-wrap">
		<div class="step active">
			<h5>Step 1: <span>Survey</span></h5>
			<p>
				Surveying members to find out about their overall experiences with the Coop’s current website.
			</p>
		</div>
		<div class="step">
			<h5>Step 2: <span>Interviews</span></h5>
			<p>
				Interviewing members to gain a deeper understanding of their experiences at the Coop and with the website.
			</p>
		</div>
		<div class="step">
			<h5>Step 3: <span>Video Interviews</span></h5>
			<p>
				Recording interviews to create a visual library of the qualities and experiences that make the Coop 
				special to its members.  
			</p>
		</div>
		<div class="step">
			<h5>Step 4: <span>Group Card Sorting</span></h5>
			<p>
				Using <a href="http://en.wikipedia.org/wiki/Card_sorting">card sorting</a>, 
				groups of members will organize ideas to explore ways the new website can be structured.
			</p>
		</div>
		<div class="step">
			<h5>Step 5: <span>Identity</span></h5>
			<p>
				Aligning and expanding the current Coop branding to reflect what we’ve learned from members.
			</p>
		</div>
		<div class="step">
			<h5>Step 6: <span><a href="http://en.wikipedia.org/wiki/Information_architecture">Information architecture</a></span></h5>
			<p>
				Reorganizing our website content and verifying its usability and accessibility for members.
			</p>
		</div>
		<div class="step">
			<h5>Step 7: <span>Design &amp; Build</span></h5>
			<p>
				Revising early prototypes and producing the new site.
			</p>
		</div>
	</div>
EOF;
}
add_shortcode( 'process', 'psfc_process' );
?>