
		<div class="container_top">
			<div class="row-fluid ">
				<div class="top_bar_stats to_hide_tablet">
					<div class="stats">
						<span class="title"><?php echo $title;?></span>
					</div>
				</div>

				<div class="top_right">
					<ul class="nav search">
						<li>
							<form class="form-search">
								<div class="input-append">
									<input type="text" class=" search-query" placeholder="Search..">
								</div>
							</form>
						</li>
					</ul>
					<ul class="nav nav_menu">

						<li class="dropdown"><a class="dropdown-toggle administrator"
							id="dLabel" role="button" data-toggle="dropdown" data-target="#"
							href="/page.html"> <span class="icon"><img
									src="<?php echo base_url();?>/img/menu_top/profile-avatar.png"></span><span
								class="title">Administrator</span></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<!--  <li><a href="#"><i class=" icon-user"></i> My Profile</a></li>-->
								<!-- <li><a href="#"><i class=" icon-cog"></i>Settings</a></li>-->
								<li><a href="<?php echo site_url('login/logout');?>"><i class=" icon-unlock"></i>Log Out</a></li>
								<!-- <li><a href="#"><i class=" icon-flag"></i>Help</a></li>-->
							</ul></li>
						<!--  <li class="dropdown"><a id="dLabel" role="button"
							data-toggle="dropdown" data-target="#" href="/page.html"> <span
								class="icon"><img src="<?php echo base_url();?>/img/menu_top/profile-messages.png"></span><span
								class="notifications">3</span>
						</a>
							<ul class="dropdown-menu messages" aria-labelledby="dLabel">
								<div class="container">
									<div class="heading">
										<span class="title"><i class="icon-comments"></i>Messages</span><span
											class="link"><a href="#">Send a new message</a></span>
									</div>
									<ul>
										<li><a href="#">
												<div class="avatar">
													<img src="<?php echo base_url();?>/img/message_avatar1.png" />
												</div>
												<div class="container">
													<span class="name">John Smith</span> <span class="message"><i
														class="icon-share-alt"></i>The first thing I remember.. <br /></span>
													<span class="date">Aug 8</span>
												</div>
										</a></li>
										<li><a href="#">
												<div class="avatar">
													<img src="<?php echo base_url();?>/img/message_avatar2.png" />
												</div>
												<div class="container">
													<span class="name">Celeste Holm</span> <span
														class="message"><i class="icon-share-alt"></i>What have
														you learned from.. <br /></span> <span class="date">Aug 6</span>
												</div>
										</a></li>
										<li><a href="#">
												<div class="avatar">
													<img src="<?php echo base_url();?>/img/message_avatar3.png" />
												</div>
												<div class="container">
													<span class="name">Mark Jobs</span> <span class="message"><i
														class="icon-share-alt"></i>Start it and stick with it.. <br /></span>
													<span class="date">Jul 27</span>
												</div>
										</a></li>
									</ul>
									<div class="footer">
										<a class="see_all">See All Messages <i
											class="icon-chevron-right"></i></a>
									</div>
								</div>
							</ul></li>-->
					</ul>
				</div>
				<!-- End top-right -->

				<div class="span4"></div>
			</div>
		</div>