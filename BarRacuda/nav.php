<div class="inner-navigation collapse">
						<div class="inner-nav onepage-nav">
							<ul>
								<li><a href="<?php echo home_url();?>"><span class="menu-item-span">Home</span></a></li>
								<li><a href="<?php echo home_url();?>#story"><span class="menu-item-span">Our story</span></a></li>
								<li><a href="<?php echo home_url();?>#special"><span class="menu-item-span">Special</span></a></li>
								<li><a href="<?php echo home_url();?>#popular"><span class="menu-item-span">Popular</span></a></li>
								<li><a href="<?php echo home_url();?>#gallery"><span class="menu-item-span">Gallery</span></a></li>
								<li><a href="<?php echo home_url();?>#services"><span class="menu-item-span">Services</span></a></li>
                                <li><a href="<?php echo get_page_link( get_page_object('RECIPES')->ID );?>"><span class="menu-item-span">Recipes</span></a></li>
								<li><a href="<?php echo get_page_link( get_page_object('NEWS')->ID );?>"><span class="menu-item-span">News</span></a></li>
                                <li><a href="<?php echo get_page_link( get_page_object('ARCHIVES')->ID );?>"><span class="menu-item-span">Archives</span></a></li>
                                <li><a href="<?php echo get_page_link( get_page_object('CONTACT')->ID );?>"><span class="menu-item-span">Contact</span></a></li>
								
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- Extra-nav - will be hidden on mobile-->
					<div class="extra-nav">
						<ul>
							<li><a class="popup-book-a-table" href="#test-form"><span class="menu-item-span">Book now</span></a></li>
						</ul>
					</div>
					<!-- Mobile menu-->
					<div class="nav-toggle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></div>
				</div>