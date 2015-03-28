<?php
require_once('header.php');
//addOrder.php
$applicantId= $_REQUEST['applicantId'];
?>
<!--
			<div class="panel panel-success">
                <div class="panel-heading">
					<h3 class="panel-title">Applicant Detail</h3>
                </div>
				<div class="panel-body">
                    <form>
                        <div class="form-group">
                            <input type="text" value="Applicant profile should be here">
                        </div>
                        <div class="form-group">
                            <input type="text" value="Applicant skillset should be here">
                        </div>
                        <div class="form-group">     
                            <input type="text" value="Applicant interaction log should be here">
                        </div>                        
                    </form>
                </div>
			</div>
-->
	<div class="container">
			<div class="panel panel-success">
                <div class="panel-heading">
﻿﻿                    <h3 class="panel-title"><strong>ESCANO, TITO MARI FRANCIS HARICAL</strong>&nbsp;<a class="btn btn-default right" href="updateCustomer.php?profileid=1" role="button">View and Update Profile &raquo;</a></h3>
                </div>
				<div class="panel-body">
					<div class="col-sm-6">
						<!-- box 1 
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"></h3>
							</div>
							<div class="panel-body">
								<div class="list-group" role="navigation">
									<a class="list-group-item"><h1><div><strong>Applicant details here</strong></div></h1></a>
								</div>
							</div>
						</div>
                        -->
						<!-- box 2 -->
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Applicant Profile</h3>
							</div>
							<div class="panel-body">
										<a href="addOrder.html" class="list-group-item">
                                            Lastname: Telly<br/>
                                            Firstname: William<br/>
                                            Firstname: William<br/>
                                            Birthdate: 4 Dec 1997<br/>
                                            Contact #: 09178170092<br/>
                                            Email: william.telly@gmail.com<br/>
                                            Address: Suite 321, Palm Drive, San Dimas, California<br/>
                                            
                                        </a>
							</div>
							<div class="panel-body">
										<a href="addOrder.html" class="list-group-item">Linux, OpenBSD, FreeBSD, HaikuOS, BeOS, MacOS, iOS, PHP, PostgreSQL, Javascript, jQuery, Bootstrap, Knockout, Objective-C, Python, Django, x64 Assembly Language, GNU Compiler Collection, LESS, SASS, Grunt</a>
							</div>                            
						</div>
					</div>
					
					<!-- column 2 -->
					<div class="col-sm-6">
						<!-- box 3
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Click button to process order delivery</h3>
							</div>
							<div class="panel-body">
                                <p>
                                    <a class="btn btn-large btn-warning right" data-toggle="modal" href="orderDelivery.php?customerid=1">Order Delivery &raquo;</a>
                                </p>
							</div>
						</div>
                         -->
						<!-- box 4 -->
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">Applicant Notes (start from latest)</h3>
							</div>
							<div class="panel-body">
                                <form role="form" method="post" action="addCustomerNotes.php">
                                <div class="form-group">
                                    <input type="hidden" name="customerId" value="1">
                                    <label for="customerNotes">Applicant Note Entry</label>
                                    <textarea name="customerNotes" id="customerNotes" name="customerNotes" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Add to Notes</button>
                                </form>
								<p>
									<div class="list-group" role="navigation">
										<a href="addOrder.html" class="list-group-item">Entry Date: 2015-03-25 09:23:14.105+08 by Tito Mari Francis Escano<br/><h3>Submitted SSS, BIR and NBI clearance before due date( 27 Mar 2015)</h3></a>
									</div>							
								</p>
								<p>
									<div class="list-group" role="navigation">
										<a href="addOrder.html" class="list-group-item">Entry Date: 2015-01-20 08:31:24.72+08 by Tito Mari Francis Escano<br/><h3>Passed initial interview</h3></a>
									</div>							
								</p>
							</div>
						</div>
					</div> <!-- /column 2 -->					
				</div>
			</div>			
            
<?
require_once('footer.php');