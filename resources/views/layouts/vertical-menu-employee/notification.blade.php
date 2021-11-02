<!-- /Notification -->
							<div class="d-flex  ml-auto header-right-icons header-search-icon">
								<div class="dropdown d-md-flex">
									<a class="nav-link icon full-screen-link nav-link-bg">
										<i class="fe fe-maximize fullscreen-button"></i>
									</a>
								</div><!-- FULL-SCREEN -->
								<div class="dropdown profile-1">
									<a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
										<span>
											<img src="{{URL::asset('assets/images/users/10.jpg')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-0">Alwan Mazun</h5>
												<small class="text-muted">intern</small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="{{ url('/' . $page='profile/employee') }}">
											<i class="dropdown-icon mdi mdi-account-outline"></i> Profile
										</a>

										<div class="dropdown-divider mt-0"></div>
										<a class="dropdown-item" href="{{ url('/' . $page='login') }}">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
							</div>
<!-- /Notification Ends -->
