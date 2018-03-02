<?php

?>
<div class="wrap">
	<h1 class="wp-heading-inline">Pages</h1>
	<form id="gdpr-export-form" method="GET" action="#" enctype="multipart/form-data">
		<input type="hidden" name="action" value="gdpr_get_data">
		<table class="form-table">

			<tbody>
				<tr>
					<th scope="row"><label for="search_email">Email</label></th>
					<td><input name="email" type="email" id="search_email" aria-describedby="new-admin-email-description" value="wordpress@peytz.dk" class="regular-text ltr"></td>
				</tr>
				<tr>
					<th scope="row"><label for="export_format">Export format</label></th>
					<td>
					<fieldset><legend class="screen-reader-text"><span>Export format</span></legend>
						<label><input type="radio" name="export_format" value="" checked="checked"> <span class="">Normal</span></label><br>
						<label><input type="radio" name="export_format" value="json"> <span class="" >JSON</span></label><br>
					</fieldset>
					</td>
				</tr>
			</tbody>
		</table
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Export"><div class="spinner"></div></p>


	<!-- Here we can present data. if plain view, use table. if json, just use a big box. -->
	<table class="wp-list-table widefat fixed striped pages">
	<thead>
	<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td><th scope="col" id="title" class="manage-column column-title column-primary sortable desc"><a href="http://wpdemosite.test/wp-admin/edit.php?post_type=page&amp;orderby=title&amp;order=asc"><span>Title</span><span class="sorting-indicator"></span></a></th><th scope="col" id="author" class="manage-column column-author">Author</th></tr>
	</thead>

	<tbody id="the-list">
		<tr class="no-items"><td class="colspanchange" colspan="3">No pages found.</td></tr>	</tbody>

	<tfoot>
	<tr>
		<td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></td><th scope="col" class="manage-column column-title column-primary sortable desc"><a href="http://wpdemosite.test/wp-admin/edit.php?post_type=page&amp;orderby=title&amp;order=asc"><span>Title</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-author">Author</th></tr>
	</tfoot>

</table>

</form>

</div>
