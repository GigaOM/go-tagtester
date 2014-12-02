<?php get_header(); ?>

<form id="open_calais_tester_submit" method="post">
	<fieldset>
		<legend> Submit </legend>
		<div><label> Headline </label> <textarea name="headline" 	id="headline" 	cols="50" rows"1"></textarea></div>
		<div><label> Summary	</label> <textarea name="summary" 	id="summary" 	cols="50" rows"4"></textarea></div>
		<div><label> Body </label> <textarea name="body" 		id="body"		cols="50" rows"15"></textarea></div>
	</fieldset>
</form>
<form id="open_calais_tester_variables" method="post">
	<fieldset>
		<legend>Variables</legend>
		<fieldset>
			<legend> Submit </legend>
			<div><label> Body Count </label> <textarea id="body_count" name="body_count" cols="8" rows"1"></textarea></div>
		</fieldset>
		<fieldset>
			<legend> Weighting </legend>
			<div><label> Headline </label> 	<textarea name="headline_weight" cols="8" rows"1"></textarea></div>
			<div><label> Summary	</label> 	<textarea name="summary_weight" cols="8" rows"1"></textarea></div>
			<div><label> Body </label>		<textarea name="body_weight" cols="8" rows"1"></textarea></div>
		</fieldset>
		<div><button id="submit" class="button set">Submit</button></div>
</form>

<form id="open_calais_tester_results" method="get">
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