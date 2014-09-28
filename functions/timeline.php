<?php 

	// Timeline Shortcode
function psfc_timeline( $atts , $content = null ) {

 return <<< EOF
	<div id="timeline" class="col-xs-12">
		<table>
			<tr>
				<th>Survey</th>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th>Interviews</th>
				<td></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th>Card Sorting</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th>Identity</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
			</tr>
			<tr>
				<th>Design</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
			</tr>
			<tr>
				<th>Development</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t1"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t2"></td>
				<td class="t3"></td>
				<td class="t3"></td>
				<td class="t3"></td>
			</tr>
		</table>
	</div>
EOF;
}
add_shortcode( 'timeline', 'psfc_timeline' );
?>