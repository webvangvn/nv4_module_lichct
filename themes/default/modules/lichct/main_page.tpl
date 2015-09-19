<!-- BEGIN: main -->
	<!-- BEGIN: block_table-->
	<div class="thongbao"><h3>{LANG.notice01}: {WEEKS}</h3></div>
		<!-- BEGIN: begin -->
		<div class="thongbao"><h1>{PART}</h1></div>
		<div class="thongbao"><h2>{LANG.notice02} {BEGTIME} {LANG.notice03} {ENDTIME} </h2></div><br/>
		<table class="tieude" style="border-collapse:collapse;border-color:#999999" cellpadding="2" cellspacing="2" width="100%" border="1">
			<tr class = "header_n">
				<td width="10%"></td>
				<td width="43%">{LANG.notice07}</td>
				<td width="43%">{LANG.notice08}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice09}</td>
				<td>{MONAM}</td>
				<td>{MONPM}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice10}</td>
				<td>{TUEAM}</td>
				<td>{TUEPM}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice11}</td>
				<td>{WEDAM}</td>
				<td>{WEDPM}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice12}</td>
				<td>{THUAM}</td>
				<td>{THUPM}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice13}</td>
				<td>{FRIAM}</td>
				<td>{FRIPM}</td>
			</tr>
			<tr class = "content_n">
				<td>{LANG.notice14}</td>
				<td>{SATAM}</td>
				<td>{SATPM}</td>
			</tr>			
			<tr class = "content_n">
				<td>{LANG.notice15}</td>
				<td>{SUNAM}</td>
				<td>{SUNPM}</td>
			</tr>
		</table>
		<!-- END: begin -->
		<form id="search_n" name="frm_search" method="post" align="center">
			<div align="center">	
				<select name="keywords" >
					<option value="0">{LANG.notice04}</option>
				<!-- BEGIN: loop_ds-->
					<option value={TUAN}>{LANG.notice05} {TUAN} - {LANG.notice02} {BEGTIME} {LANG.notice03} {ENDTIME}</option>
				<!-- END: loop_ds -->
				</select>
				<button id="button_submit" value="click" type="submit">{LANG.notice06}</button></p>
			</div>
		</form>
	<!-- END: block_table -->
	<!-- BEGIN: notice-->
	<br />
	<div class="thongbao">
		<h1>{TITLE}</h1>
		<p>{NOTICE}</p>
	</div>
	<!-- END: notice -->
<!-- END: main -->
