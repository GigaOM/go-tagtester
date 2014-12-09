<?php get_header(); ?>
<form id="open_calais_tester_submit" method="POST" action="tagtester-submit">
	<div class="submit_section">
	<fieldset id="submit_fieldset">
		<legend> Submit </legend>
		<label> Headline </label><textarea name="headline"	rows="3"	cols="30" 	id="headline"></textarea> </br>
		<label> Summary</label>   <textarea name="summary"  rows="5"	cols="30" 	id="summary"></textarea></br>
		<label> Body </label> 	  <textarea name="body" 	rows="20"	cols="30" 	id="body"></textarea></br>
	</fieldset>
	</div>
	<div class="variables_section">
	<fieldset id="variables_fieldset">
		<legend>Variables</legend>
		<fieldset id="variables_submit_fieldset">
			<legend> Submit </legend>
			<label> Body Count </label> <textarea id="body_count" name="body_count" cols="8" rows="1"></textarea></br>
		</fieldset>
		<fieldset id="variables_weighting_fieldset">
			<legend> Weighting </legend>
			<div><label> Headline </label> 	<textarea name="headline_weight" cols="8" rows="1"></textarea></div>
			<div><label> Summary	</label> 	<textarea name="summary_weight" cols="8" rows="1"></textarea></div>
			<div><label> Body </label>		<textarea name="body_weight" cols="8" rows="1"></textarea></div>
		</fieldset>
		<div><button id="submit" class="button set">Submit</button></div>
	</fieldset>
	</div>
</form>

<form id="open_calais_tester_results" method="POST" action="tagtester-submit.php" >
	<fieldset>
		<legend> Results </legend>
		<table>
			<tr>
				<th>Tag</th>
				<th>Count</th>
				<th>Relevance</th>
				<th>Weighting</th>
				<th>blacklist</th>
			</tr>
			<tr>
				<td>Ello</td>
				<td>Ello count</td>
				<td>Ello Relevance</td>
				<td>Ello weighting</td>
				<td>Ello blacklist</td>
			</tr>
			<tr>
				<td>Social Media</td>
				<td>Social Media count</td>
				<td>Social Media Relevance</td>
				<td>Social Media weighting</td>
				<td>Social Media blacklist</td>
			</tr>
			<tr>
				<td>Facebook</td>
				<td>Facebook count</td>
				<td>Facebook Relevance</td>
				<td>Facebook weighting</td>
				<td>Facebook blacklist</td>
			</tr>
		</table>
	</fieldset>
</form>


<?php get_footer(); ?>