@extends ('layout.users_layouts.postsLayout')


@section ('posts')




@foreach($all_posts as $key => $value)

<!-- {{$user1 = $user[($value['user_id']) - 1]}} -->

								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure>
											

												<img src='{{asset("images/$user1->image")}}' alt="">
											</figure>
											<div class="friend-name">
											
												<ins><a href="time-line.html" title="">{{$user1['name']}}</a></ins>
												<span>{{$value['created_at']}}</span>
											</div>
											<div class="post-meta">
											<div class="description" style="background-color:#DCDCDC">
													
													<h3>
                                                    {{$value['post_desc']}}
													</h3>
												</div>
												<img src="/images/{{$value['post_image']}}" alt="">
												
												
											</div>
											
										</div>


										@if (Auth::id() == $user1->id)


										<div>

											<button type="submit" id="myBtn" href="/posts/{{$value['id']}}/edit" class="btn btn-primary btn-lg btn-block m-2">Edit</button>
											<!-- Trigger/Open The Modal -->
    <!-- <button id="myBtn">Edit</button> -->
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
                                <div class="central-meta">
									<div class="new-postbox">
										<figure>
											<img src='{{asset("images/$user1->image")}}' alt="">
										</figure>
										<div class="newpst-input">
											<form method="post" action="/posts/{{$value['id']}}/update" enctype="multipart/form-data">
												@method('PUT')
                                                @csrf
                                                <textarea rows="2" placeholder="write something" name="post_desc"> {{$value['post_desc']}}</textarea>
												
												<div class="attachments">
													<ul>
														
														<li>
															<i class="fa fa-image"></i>
															<label class="fileContainer">
																<input type="file" name="image">
															</label>
														</li>
														
														
														<li>
															<button type="submit">Post</button>
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div><!-- add post new box -->
          </form>
        </div>
      </form>
    </div>
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks the button, open the modal
      btn.onclick = function () {
        modal.style.display = "block";
      };
      // When the user clicks on <span> (x), close the modal
      span.onclick = function () {
        modal.style.display = "none";
      };
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      };
    </script>
											<form action="/posts/{{$value['id']}}" method="post">
											@method("DELETE")
                        					@csrf
											<input type="submit"  value="Delete" class="btn btn-danger btn-lg btn-block m-2">
											</form>
										</div>
    									





										@endif


										
										<div class="coment-area">
											<ul class="we-comet">

												@foreach($all_comments as $key1 => $value1)
												@if($value1['post_id'] == $value['id'])
												<!-- {{$commenter = $user[($value1['user_id']) - 1]}} -->
												
												<li>
													<div class="comet-avatar">
														<img src='{{asset("images/$commenter->image")}}' alt="">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="time-line.html" title="">{{$commenter['name']}}</a></h5>
															<span>{{$value1['created_at']}}</span>
															@if (Auth::id() == $commenter->id || Auth::id() == $user1->id) 
															<form action="/comments/{{$value1['id']}}" method="post">
															@method('Delete')
															@csrf
															<button class="we-reply" type="submit" class="btn btn-primary">comment<i class="fa fa-times-circle fa-1x" ></i></button>
	  														</form>
															@endif
														</div>
														<p>{{$value1['comment_description']}}
															<i class="em em-smiley"></i>
														</p>
													</div>
												</li>
												@endif

												@endforeach
												
												<li>
													<a href="#" title="" class="showmore underline">more comments</a>
												</li>
												@if(Auth::check())
												<!-- {{$user2= (auth()->user())}} -->
												<li class="post-comment">
													<div class="comet-avatar">
														<img src='{{asset("images/$user2->image")}}' alt="">
													</div>
													<div class="post-comt-box">
														<form method="post" action="/comments/create/{{$value['id']}}">
														@csrf
															<textarea placeholder="Post your comment" name="comment_description"></textarea>
															<div class="add-smiles">
																<span class="em em-expressionless" title="add icon"></span>
															</div>
															<div class="smiles-bunch">
																<i class="em em---1"></i>
																<i class="em em-smiley"></i>
																<i class="em em-anguished"></i>
																<i class="em em-laughing"></i>
																<i class="em em-angry"></i>
																<i class="em em-astonished"></i>
																<i class="em em-blush"></i>
																<i class="em em-disappointed"></i>
																<i class="em em-worried"></i>
																<i class="em em-kissing_heart"></i>
																<i class="em em-rage"></i>
																<i class="em em-stuck_out_tongue"></i>
															</div>
															<button type="submit">Comment</button>
														</form>	
													</div>

												</li>
												@endif
											</ul>
										</div>
									</div>
								</div>

@endforeach




@endsection