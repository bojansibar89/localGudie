
<?php
	/* require_once __DIR__ . '/../model/data/Office.php';
	
	if (isset($_POST['search']))
	{
		$conn = oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1");
		if (!$conn) {
			$e = oci_error();
			print htmlentities($e['message']);
			exit;
		}
		$word = ($_POST['search']);
		$characters = strlen($word);
		if($characters >2)
		{
			$query="SELECT * FROM OFFICE WHERE OFFICENAME LIKE '" . $word . "%'"; 
			
			$stid = oci_parse($conn, $query);
			$result = oci_execute($stid);
		
			$count = oci_fetch_all($stid,$res);
		
			if($count!=0)
			{
				
				$rez='<div id="seaech_result_text_m">'.$count.' Treffer zur Suche "'.$word.'" </div>';
				echo $rez;
				$end_result = '';
				 foreach($res['OFFICENAME'] as $r) 
				{
					$myresult         = $r;
					$bold           = '<span class="found">' . $word . '</span>';    
					$end_result     .= '<li>' . str_ireplace($word, $bold, $myresult) . '</li>';            
				}
			echo $end_result;
			
			}
			else
			{
				echo '<li style="color: red;">No results </li>';
			}
			oci_free_statement($stid);
			oci_close($conn);
		}
		else
		
			echo '<li style="color: red;">Provide more characters in textbox </li>';
		}
		
	}	 */
	include('../model/db/OfficeDB.php');
	include('../model/data/Office.php');
	if(isset($_POST['variable1']))
	{
		$paging = $_POST['variable1'];
		//echo 'desilo se';
	}
	else
	{
		//echo 'nije desilo se';
		$paging=1;
	}

	
	
	
	if (isset($_POST['search']) || isset($_POST['variable2']))
	{
		
		if (isset($_POST['search']))
		{
		$word = ($_POST['search']);
		}
		else if(isset($_POST['variable2']))
		{
		$word = ($_POST['variable2']);
		}
		// $conn = oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1");
		// if (!$conn) 
		// {
			// $e = oci_error();
			// print htmlentities($e['message']);
			
			// exit;
		// }
	
		$temp = $word;
		
		$characters = strlen($word);
		if($characters >2)
		{
			
			$z=$paging-1;
			$officeDB = new OfficeDB($word, $z);
			$numberOfSearchResults =$officeDB->numberOfOffices;	
			//$numberOfSearchResults = 39;			
			$rez='<div id="seaech_result_text_m">'.$numberOfSearchResults.' Treffer zur Suche "'.$word.'" </div>';
			echo $rez;
			
			
			$per_page = 10; // Number of items to show per page
			$showeachside = 5; //  Number of items to show either side of selected page
			$temp= $word;
			if(empty($start))$start=0;  // Current start position
			$start=$z;
			$max_pages = ceil($numberOfSearchResults / $per_page); // Number of pages
			$cur = $z+1; // Current page number
			
			if($numberOfSearchResults == 0)
			{
				echo '<li style="color: red;">No results </li>';
			}
			else
			{
				for ($i = 0; $i < min($per_page,$numberOfSearchResults-$z*10); ++$i) 
				{
					$office = $officeDB->officeArray[$i];
					 echo '<br/>';
					 echo '<label style="font-family: Calabria; font-size: 25px;">'.$office->office_name.'</label><br/>';
					 echo '<button id="weiter">weiter</button>';
					 echo '<div style="border:2px solid #323232; color: #A9A9A9; background: #323232;"> '.$office->office_id.'</div>';
					 echo '<div style="border:2px solid #323232; color: #A9A9A9; background: #323232;"> '.$office->office_address .'</div>';
					 echo '<br/>';
					 echo '<hr/>';
				}
				
				echo '<br/>Page '.$cur.' of '.$max_pages.' pages <br/>';
				if($cur==1)
				{
					for ($i = $cur; $i <= min($showeachside-1,$max_pages); ++$i)
					{
						if($i==$cur)
						{
							echo '<a class="linkPage" style="border: 2px solid #C1D00F; margin:5px 5px 0px 5px; background: #C1D00F; ">'.($i).'</a>';
						}
						else
						{
							echo '<a class="linkPage" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">'.($i).'</a>';
						}
					}
					
					if($max_pages >= 5)
					{
						echo '<a class="nextLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  > </a> <a class="lastLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> >> </a>';
					}
				}
				else if($cur==2)
				{
					//echo '<a style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  << </a> <a style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> < </a>';
					for ($i = 1; $i <= min($showeachside-1,$max_pages); ++$i)
					{
						if($i==($cur))
						{
							echo '<a class="linkPage" style="border: 2px solid #C1D00F; margin:5px 5px 0px 5px; background: #C1D00F; ">'.$i.'</a>';
						}
						else
						{
							echo '<a class="linkPage" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">'.$i.'</a>';
						}
					}
					
					if($max_pages >= 5)
					{
						echo '<a class="nextLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  > </a> <a class="lastLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> >> </a>';
					}
				}
				else if($cur==($max_pages-1))
				{
					if($max_pages >= 5)
					{
						echo '<a class="firstLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  << </a> <a class="previousLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> < </a>';
					}
					
					for ($i = $cur-3; $i <= $max_pages; ++$i)
					{
						if($i==($cur))
						{
							echo '<a class="linkPage" style="border: 2px solid #C1D00F; margin:5px 5px 0px 5px; background: #C1D00F; ">'.($i).'</a>';
						}
						else
						{
							echo '<a class="linkPage" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">'.($i).'</a>';
						}
					}
					
				}
				
				else if($cur==$max_pages)
				{
					if($max_pages >= 5)
					{
						echo '<a class="firstLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  << </a> <a class="previousLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> < </a>';
					}
					
						for ($i = ($cur-min(3,$max_pages-1)); $i <= $max_pages; ++$i)
					{
						if($i==($cur))
						{
							echo '<a class="linkPage" style="border: 2px solid #C1D00F; margin:5px 5px 0px 5px; background: #C1D00F; ">'.($i).'</a>';
						}
						else
						{
							echo '<a class="linkPage" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">'.($i).'</a>';
						}
					}
					
				}
				
				else
				{
					echo '<a class="firstLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  << </a> <a class="previousLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> < </a>';
					for ($i = $cur-2; $i <= $cur+2; ++$i)
					{
						if($cur==$i)
						{
							echo '<a  class="linkPage" style="border: 2px solid #C1D00F; margin:5px 5px 0px 5px; background: #C1D00F; ">'.($i).'</a>';
						}
						else
						{
							echo '<a class="linkPage" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">'.($i).'</a>';
						}
					}
					
					if($max_pages >= 5)
					{
						echo '<a class="nextLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; ">  > </a> <a class="lastLink" style="border: 2px solid #A9A9A9; margin:5px 5px 0px 5px; background: #A9A9A9; "> >> </a>';
					}
				}
			
				
			}
		}
		else
		{
			echo '<li style="color: red;">Provide more characters in textbox </li>';
		}
	}
	
?>
<script type="text/javascript">
	$(".linkPage").click( function()
	{
		
		var selectedLink = $(this).text();
		//alert(selectedLink);
		var vord = '<?php echo $temp?>';
		//alert(vord);
		$.ajax(
		{
			type:"POST",
			url: "php/doSearch.php",
			data: "variable1=" + selectedLink + "\u0026variable2="+ vord,
			beforeSend: function(html) { // this happens before actual call
				$("#load_search").css('display','block');
				$("#results").html('');
				$("#searchresults").show();				
		   },
			success: function(html){ // this happens after we get results
				$("#load_search").hide();
				$("#results").show();
				$("#results").append(html);
				//alert(data);
			}
		});
		
	});
	
	$(".firstLink").click( function()
	{
		var selectedLink = 1;
		//alert(selectedLink);
		var vord = '<?php echo $temp?>';
		//alert(vord);
		$.ajax(
		{
			type:"POST",
			url: "php/doSearch.php",
			data: "variable1=" + selectedLink + "\u0026variable2="+ vord,
			beforeSend: function(html) { // this happens before actual call
				$("#load_search").css('display','block');
				$("#results").html('');
				$("#searchresults").show();				
		   },
			success: function(html){ // this happens after we get results
				$("#load_search").hide();
				$("#results").show();
				$("#results").append(html);
				//alert(data);
			}
		});
	});
	
	$(".lastLink").click( function()
	{
		var selectedLink = <?php echo $max_pages ?>;
		//alert(selectedLink);
		var vord = '<?php echo $temp?>';
		//alert(vord);
		$.ajax(
		{
			type:"POST",
			url: "php/doSearch.php",
			data: "variable1=" + selectedLink + "\u0026variable2="+ vord,
			beforeSend: function(html) { // this happens before actual call
				$("#load_search").css('display','block');
				$("#results").html('');
				$("#searchresults").show();				
		   },
			success: function(html){ // this happens after we get results
				$("#load_search").hide();
				$("#results").show();
				$("#results").append(html);
				//alert(data);
			}
		});
	});
	
	$(".nextLink").click( function()
	{
		var selectedLink = <?php echo ($cur+1) ?>;
		//alert(selectedLink);
		var vord = '<?php echo $temp?>';
		//alert(vord);
		$.ajax(
		{
			type:"POST",
			url: "php/doSearch.php",
			data: "variable1=" + selectedLink + "\u0026variable2="+ vord,
			beforeSend: function(html) { // this happens before actual call
				$("#load_search").css('display','block');
				$("#results").html('');
				$("#searchresults").show();				
		   },
			success: function(html){ // this happens after we get results
				$("#load_search").hide();
				$("#results").show();
				$("#results").append(html);
				//alert(data);
			}
		});
	});
	
	$(".previousLink").click( function()
	{
		var selectedLink = <?php echo ($cur-1) ?>;
		//alert(selectedLink);
		var vord = '<?php echo $temp?>';
		//alert(vord);
		$.ajax(
		{
			type:"POST",
			url: "php/doSearch.php",
			data: "variable1=" + selectedLink + "\u0026variable2="+ vord,
			beforeSend: function(html) { // this happens before actual call
				$("#load_search").css('display','block');
				$("#results").html('');
				$("#searchresults").show();				
		   },
			success: function(html){ // this happens after we get results
				$("#load_search").hide();
				$("#results").show();
				$("#results").append(html);
				//alert(data);
			}
		});
	});
	
	
</script>





