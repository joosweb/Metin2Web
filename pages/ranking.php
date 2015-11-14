<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Ranking</h3>
		</div>
		<div class="well">
			<script type="text/javascript">
			$(document).ready(function() {
				$("#results" ).load( "fetch_pages.php"); //load initial records	
				//executes code below when user click on pagination links
				$("#results").on( "click", ".pagination a", function (e){
					e.preventDefault();
					$(".loading-div").show(); //show loading element
					var page = $(this).attr("data-page"); //get page number from link
					$("#results").load("fetch_pages.php",{"page":page}, function(){ //get content from PHP page
						$(".loading-div").hide(); //once done, hide loading element
					});
					
				});
			});
			</script>
			<style>
			.contents{
				margin: 20px;
				padding: 20px;
				list-style: none;
				background: #F9F9F9;
				border: 1px solid #ddd;
				border-radius: 5px;
			}
			.contents li{
			    margin-bottom: 10px;
			}
			.loading-div{
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(0, 0, 0, 0.56);
				z-index: 999;
				display:none;
			}
			.loading-div img {
				margin-top: 20%;
				margin-left: 50%;
			}

			</style>

			<div class="loading-div"><img src="ajax-loader.gif" ></div>
			<div id="results"><!-- content will be loaded here --></div>
		</div>
	</div>
</div>
