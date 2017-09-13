@extends('layouts.master')

@section('content') 



<div class="main-1">
	    		<div class="heading">
	    			<h1>Imagens Publicadas</h1>
	    		</div>
	    		<div class="page-no">
	    			<p>Result Pages:</p><ul>
	    				<li><a href="#">1</a></li>
	    				<li class="active"><a href="#">2</a></li>
	    				<li><a href="#">3</a></li>
	    				<li>[<a href="#"> Next&gt;&gt;&gt;</a>]</li>
	    				</ul><p></p>
	    		</div>
	    		<div class="clearfix"> </div>
    	    </div>




<div class="container">


<h1>Pure Css Responsive Masonry Gallery</h1>
<div class="col-md-12">
<div class="row">
<hr>

	<div class="gal">
	

<!-- 2. Create links -->


<div>
<a data-fancybox="gallery" href="images/4.jpeg"><img src="images/4.jpeg"></a>
<input type="submit" value="Add to Cart" class="button">
</div>

<div>
<a data-fancybox="gallery" href="https://preview.ibb.co/mWpE3Q/2.jpg"><img src="https://preview.ibb.co/mWpE3Q/2.jpg"></a>
<input type="submit" value="Add to Cart" class="button">
</div>

<div>
<a data-fancybox="gallery" href="https://preview.ibb.co/mWpE3Q/2.jpg"><img src="https://preview.ibb.co/mWpE3Q/2.jpg"></a>
<input type="submit" value="Add to Cart" class="button">
</div>


<div>
<a data-fancybox="gallery" href="https://preview.ibb.co/mWpE3Q/2.jpg"><img src="https://preview.ibb.co/mWpE3Q/2.jpg"></a>
<input type="submit" value="Add to Cart" class="button">
</div>


<div>
<a data-fancybox="gallery" href="https://preview.ibb.co/mWpE3Q/2.jpg"><img src="https://preview.ibb.co/mWpE3Q/2.jpg"></a>
<input type="submit" value="Add to Cart" class="button">
</div>
	
		
</div>
	
</div>
</div>
</div>


<style>
.gal {
	
	
	-webkit-column-count: 3; /* Chrome, Safari, Opera */
    -moz-column-count: 3; /* Firefox */
    column-count: 3;
	  
}	
.gal img{ width: 100%; padding: 7px 0;}
@media (max-width: 500px) {		
.gal {
	
	
-webkit-column-count: 1; /* Chrome, Safari, Opera */
-moz-column-count: 1; /* Firefox */
column-count: 1;
	  
	
	}
		
}
	


</style>


<!-- 1. Add latest jQuery and fancyBox files 

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>-->

@include('layouts.includes.scriptFancyBox')

<!-- 3. Have fun! -->



@endsection  