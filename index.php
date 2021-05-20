<?php

require('inc/nav.php');

?>

<body class="container">
	<div class="border container card">
		<div class="col-md-12">
			<br>
			<marquee scrollamount="8">
				<h3 class="text-danger">Kindly find .SQL File in DIR - Thanks Assigning the Project it made me to learn lot things</h3>
			</marquee>
			<h5>Details about Application</h5>
			<br>
			<b>Name :</b>
			<span>Question Management Web App</span>
			<br>
			<b>Commented :</b>
			<span>Partially</span>
			<br>

			<b>Dealine for submission :</b>
			<span>21-05-2021</span>
			<br>


			<hr>
			<div class="row">
				<div class="col-md-6">
					<b>Programming Languages & Frameworks Used</b>
					<br>
					<span>
						<b>FrontEnd</b>
						<ul>
							<li>HTML 5</li>
							<li>CSS 3</li>
							<li>JavaScript + jQuery</li>
						</ul>
						<b>BackEnd</b>
						<ul>
							<li>PHP</li>
							<li>SQL</li>
						</ul>
					</span>
				</div>
				<div class="col-md-6">
					<b>Tools Used</b>
					<span>
						<ul>
							<li>Apache Web Server</li>
							<li>MySQL Database Server</li>
							<li>phpMyAdmin - DB Panel</li>
							<li>XAMPP - Control Panel</li>
							<li>Visual Studio Code - Editor</li>
						</ul>
					</span>
					<b>System Configuration</b>
					<span>
						<ul>
							<li>Model : Asus F571GT</li>
							<li>OS : Windows 10 [64 bit] - HomeEdition</li>
							<li>RAM : 8 GB DDR4</li>
							<li>ROM : 512 GB SSD</li>

						</ul>
					</span>
				</div>

			</div>




		</div>
		<b>Folder Stucture</b>
		<pre><span style="background-color:#F4775C"><font color="#000">.</font></span>
├── <font color="#1100FF"><b>add_qns.php</b></font>
├── <font color="#1100FF"><b>add_stdnt.php</b></font>
├── <span style="background-color:#F4775C"><font color="#000">assets</font></span>
│   ├── <span style="background-color:#F4775C"><font color="#000">images</font></span>
│   │   ├── <font color="#1100FF"><b>add_new.png</b></font>
│   │   ├── <font color="#1100FF"><b>add.png</b></font>
│   │   ├── <font color="#1100FF"><b>add_stdnt.png</b></font>
│   │   ├── <font color="#1100FF"><b>home.svg</b></font>
│   │   ├── <font color="#1100FF"><b>import.png</b></font>
│   │   ├── <font color="#1100FF"><b>importq.png</b></font>
│   │   ├── <font color="#1100FF"><b>key.png</b></font>
│   │   ├── <font color="#1100FF"><b>logo.png</b></font>
│   │   ├── <font color="#1100FF"><b>log_out.png</b></font>
│   │   ├── <font color="#1100FF"><b>search.png</b></font>
│   │   ├── <font color="#1100FF"><b>stdnts.png</b></font>
│   │   ├── <font color="#1100FF"><b>view_eye.png</b></font>
│   │   └── <font color="#1100FF"><b>view.png</b></font>
│   ├── <span style="background-color:#F4775C"><font color="#000">js</font></span>
│   │   ├── <font color="#1100FF"><b>bootstrap.js</b></font>
│   │   ├── <font color="#1100FF"><b>bootstrap.js.map</b></font>
│   │   ├── <font color="#1100FF"><b>custom.js</b></font>
│   │   └── <font color="#1100FF"><b>jquery-3.5.1.min.js</b></font>
│   ├── <font color="#1100FF"><b>SimpleXLSX.php</b></font>
│   ├── <span style="background-color:#F4775C"><font color="#000">style</font></span>
│   │   ├── <font color="#1100FF"><b>bootstrap.css</b></font>
│   │   ├── <font color="#1100FF"><b>bootstrap.css.map</b></font>
│   │   └── <font color="#1100FF"><b>styles.css</b></font>
│   └── <span style="background-color:#F4775C"><font color="#000">table</font></span>
│       ├── <span style="background-color:#F4775C"><font color="#000">DataTables-1.10.21</font></span>
│       │   ├── <span style="background-color:#F4775C"><font color="#000">css</font></span>
│       │   │   ├── <font color="#1100FF"><b>dataTables.bootstrap4.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.bootstrap4.min.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.bootstrap.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.bootstrap.min.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.foundation.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.foundation.min.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.jqueryui.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.jqueryui.min.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.semanticui.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>dataTables.semanticui.min.css</b></font>
│       │   │   ├── <font color="#1100FF"><b>jquery.dataTables.css</b></font>
│       │   │   └── <font color="#1100FF"><b>jquery.dataTables.min.css</b></font>
│       │   ├── <span style="background-color:#F4775C"><font color="#000">images</font></span>
│       │   │   ├── <font color="#1100FF"><b>sort_asc_disabled.png</b></font>
│       │   │   ├── <font color="#1100FF"><b>sort_asc.png</b></font>
│       │   │   ├── <font color="#1100FF"><b>sort_both.png</b></font>
│       │   │   ├── <font color="#1100FF"><b>sort_desc_disabled.png</b></font>
│       │   │   └── <font color="#1100FF"><b>sort_desc.png</b></font>
│       │   └── <span style="background-color:#F4775C"><font color="#000">js</font></span>
│       │       ├── <font color="#1100FF"><b>dataTables.bootstrap4.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.bootstrap4.min.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.bootstrap.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.bootstrap.min.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.foundation.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.foundation.min.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.jqueryui.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.jqueryui.min.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.semanticui.js</b></font>
│       │       ├── <font color="#1100FF"><b>dataTables.semanticui.min.js</b></font>
│       │       ├── <font color="#1100FF"><b>jquery.dataTables.js</b></font>
│       │       └── <font color="#1100FF"><b>jquery.dataTables.min.js</b></font>
│       ├── <font color="#1100FF"><b>datatables.css</b></font>
│       ├── <font color="#1100FF"><b>datatables.js</b></font>
│       ├── <font color="#1100FF"><b>datatables.min.css</b></font>
│       └── <font color="#1100FF"><b>datatables.min.js</b></font>
├── <font color="#1100FF"><b>csvmake.php</b></font>
├── <font color="#1100FF"><b>deleteQP.php</b></font>
├── <font color="#1100FF"><b>deleteStdnt.php</b></font>
├── <font color="#1100FF"><b>downloadcsv.php</b></font>
├── <font color="#1100FF"><b>editStdnt.php</b></font>
├── <font color="#1100FF"><b>exit.php</b></font>
├── <font color="#1100FF"><b>fetch_qns_import.php</b></font>
├── <font color="#1100FF"><b>fetch_qns.php</b></font>
├── <font color="#1100FF"><b>fetch_sub_qns.php</b></font>
├── <font color="#1100FF"><b>finalInsert.php</b></font>
├── <font color="#1100FF"><b>impMarks.php</b></font>
├── <font color="#1100FF"><b>importMarks.php</b></font>
├── <span style="background-color:#F4775C"><font color="#000">inc</font></span>
│   ├── <font color="#1100FF"><b>db.php</b></font>
│   ├── <font color="#1100FF"><b>js.php</b></font>
│   ├── <font color="#1100FF"><b>nav.php</b></font>
│   └── <font color="#1100FF"><b>style.php</b></font>
├── <font color="#1100FF"><b>index.php</b></font>
├── <font color="#1100FF"><b>mk_qp.php</b></font>
├── <font color="#1100FF"><b>mk_qp_preview.php</b></font>
├── <span style="background-color:#F4775C"><font color="#000">New folder</font></span>
├── <font color="#1100FF"><b>preview_qp.php</b></font>
├── <font color="#1100FF"><b>qns_delete.php</b></font>
├── <font color="#1100FF"><b>qns_edit.php</b></font>
├── <span style="background-color:#F4775C"><font color="#000">temp</font></span>
│   └── <font color="#1100FF"><b>test_sub_2TEST CLASS 2QP.csv</b></font>
├── <span style="background-color:#F4775C"><font color="#000">uploads</font></span>
├── <font color="#1100FF"><b>view_qns.php</b></font>
├── <font color="#1100FF"><b>view_qp.php</b></font>
└── <font color="#1100FF"><b>view_stdnts.php</b></font>
</pre>


	</div>

</body>

</html>