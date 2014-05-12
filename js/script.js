$(document).ready(function(){ 

	$("#reservationEmail").css( "display", "none" );
	$("#lblemail").css( "display", "none" );

	$("#reservationConfirmation").on('click',function(){
	if($("#reservationConfirmation").is(":checked")){
		
		$("#reservationEmail").css( "display", "block" );
		$("#lblemail").css( "display", "block" );

	}else{

		$("#reservationEmail").css( "display", "none" );
		$("#lblemail").css( "display", "none" );

	}
	});








	// YANNICK'S CUSTOM CODE


	$('.toggleMenu').on('click', function(e){

		$('.menu').slideToggle();

		e.preventDefault();	
	});

	$('.toggleTable').on('click', function(e){

		$('.tableToggle').slideToggle();

		e.preventDefault();	
	});	

	$('.toggleHours').on('click', function(e){

		$('.ohoursToggle').slideToggle();

		e.preventDefault();	
	});
	
});


	//KRISTOF'S CUSTOM AJAX CALLS

	$(document).on("click","#menuView input#btnSubmit",function(e)
	{
		// /alert("OK");
		var restaurantID = $("input#specificRestaurantMenu").val();
		var menuName = $("input#menu_name").val();
		var menuDescription = $("input#menu_description").val();
		var menuPrice = $("input#menu_price").val();
		var menuCategory = $("select#menu_category").val();

		$.ajax(
		{
			type: "POST",
			url: "ajax/addMenu.php",
			data: 
				{
					restaurantID: restaurantID,
					menu_name: menuName,
					menu_description: menuDescription,
					menu_price: menuPrice,
					menu_category: menuCategory
				},
			cache: false,
	 
			success: function( lastEntryID )
			{
				var tr = 	"<tr style='display:none;'>" +
									"<td>" + menuName + "</td>" +
									"<td>" + menuDescription + "</td>" +
									"<td>€"+ menuPrice + "</td>" +
									"<td><a href='#' class='deleteMenuItem' data-delete-menu-item=" + lastEntryID + ">Delete</a></td>" +
							"</tr>";

				if(menuCategory == "beverages")
				{
					$("tbody#beveragesList").prepend(tr);
					$("tbody#beveragesList tr").first().slideDown();
				}

				if(menuCategory == "alcoholBeverages")
				{
					$("tbody#alcoholList").prepend(tr);
					$("tbody#alcoholList tr").first().slideDown();
				}

				if(menuCategory == "appetizers")
				{
					$("tbody#appetizerList").prepend(tr);
					$("tbody#appetizerList tr").first().slideDown();
				}

				if(menuCategory == "soups")
				{
					$("tbody#soupList").prepend(tr);
					$("tbody#soupList tr").first().slideDown();
				}

				if(menuCategory == "soups")
				{
					$("tbody#soupList").prepend(tr);
					$("tbody#soupList tr").first().slideDown();
				}

				if(menuCategory == "salads")
				{
					$("tbody#saladList").prepend(tr);
					$("tbody#saladList tr").first().slideDown();
				}

				if(menuCategory == "chicken")
				{
					$("tbody#chickenList").prepend(tr);
					$("tbody#chickenList tr").first().slideDown();
				}

				if(menuCategory == "pasta")
				{
					$("tbody#pastaList").prepend(tr);
					$("tbody#pastaList tr").first().slideDown();
				}

				if(menuCategory == "seafood")
				{
					$("tbody#seafoodList").prepend(tr);
					$("tbody#seafoodList tr").first().slideDown();
				}

				if(menuCategory == "ribSteaks")
				{
					$("tbody#ribsteakList").prepend(tr);
					$("tbody#ribsteakList tr").first().slideDown();
				}

				if(menuCategory == "burgerSandwiches")
				{
					$("tbody#burgerList").prepend(tr);
					$("tbody#burgerList tr").first().slideDown();
				}

				if(menuCategory == "kidsMenu")
				{
					$("tbody#kidsList").prepend(tr);
					$("tbody#kidsList tr").first().slideDown();
				}

				if(menuCategory == "desserts")
				{
					$("tbody#dessertList").prepend(tr);
					$("tbody#dessertList tr").first().slideDown();
				}
			}
		});

	    e.preventDefault();
	});

$(document).on("click",".menu a.deleteMenuItem",function(e)
{
	var id = $(this).attr('data-delete-menu-item');
	var data = 'id=' + id;
	var parent = $(this).parent().parent();

	$.ajax(
	{
		type: "POST",
		url: "ajax/deleteMenuItem.php",
		data: data,
		cache: false,
 
		success: function(msg)
		{
			parent.slideUp('slow', function() {$(this).remove();});
		}
	});

    e.preventDefault();
});


$(document).on("click","#tableView input#tableSave",function(e)
	{
		var restaurantID = $("input#specificRestaurantTable").val();
		var tableNumber = $("select#tableNumber").val();
		var tablePeople = $("select#tablePeople").val();
		var tableDescription = $("input#tableDescription").val();
		var tableStatus = $("select#tableStatus").val();

		$.ajax(
		{
			type: "POST",
			url: "ajax/addTable.php",
			data: 
				{
					restaurantID: restaurantID,
					table_number: tableNumber,
					table_people: tablePeople,
					table_description: tableDescription,
					table_status: tableStatus
				},
			cache: false,
	 
			success: function( lastEntryID )
			{
				var tr = 	"<tr>" +
								"<td>" + tableNumber + "</td>" +
								"<td>" + tablePeople + "</td>" +
								"<td>" + tableDescription + "</td>" +
								"<td>" + tableStatus + "</td>" +
								
								"<td>" + 
									"<select class='form-control changeTableStatus' name='change_table_status' data-change-status-table='" + lastEntryID + "'>" +
										"<option value='' disabled selected>Change status</option>" +
										"<option value='Free'>Free</option>" +
										"<option value='Reserved'>Reserved</option>" +
										"<option value='Occupied'>Occupied</option>" +
									"</select></td>" +

								"<td><a href='#' class='deleteTable' data-delete-table='" + lastEntryID + "'>Delete</a></td>" +
							"</tr>";

				$("tbody#tableList").append(tr);
				$("tbody#tableList tr").first().slideDown();
			}
		});
	    e.preventDefault();
	});


$(document).on("click","#tableList a.deleteTable",function(e)
{
	var id = $(this).attr('data-delete-table');
	var data = 'id=' + id;
	var parent = $(this).parent().parent();
	
	$.ajax(
	{
		type: "POST",
		url: "ajax/deleteTable.php",
		data: data,
		cache: false,
 
		success: function(msg)
		{
			parent.slideUp('slow', function() {$(this).remove();});
		}
	});

    e.preventDefault();
});

$(document).on("click",".changeTableStatus",function(e)
{
	$(this).parent().parent().attr("id", "activeEdit").siblings().removeAttr("id", "activeEdit");;
});


$(document).on('change', '.changeTableStatus', function(e) 
{
	var statusChangedTo = $(this).val();

	var id = $(this).attr('data-change-status-table');

	$.ajax(
	{
		type: "POST",
		url: "ajax/changeStatus.php",
		data: 
			{
				id: id,
				status_change: statusChangedTo
			},
		cache: false,
 
		success: function( ChangedInfo )
		{
			var StatusChangedTo = JSON.parse(ChangedInfo);
			var updatedStatus = StatusChangedTo[0].table_status;

			$("tr#activeEdit td.tableStatusText").html(updatedStatus);
		}
	});

	e.preventDefault();
});


$(document).on('click', 'a.deleteEntireRestaurant', function(e) 
{
	//alert('sup');
	var id = $(this).attr('data-delete-restaurant');

	var ConfirmationDiv = "<div id='confirmationMessage' style='position: fixed; width: 252px; background-color: #fff; top: 50%; left: 50%; border-radius: 15px; border: solid 1px lightgrey; margin-left: -126px; margin-top: -51.5px'>" +

								"<div style='border-bottom: 1px solid lightgrey;'><h1 style='font-size: 20px; font-family: Helvetica Neue; text-align: center; height: 40px; line-height: 40px;'>Are you sure?</h1></div>" +
								"<div style='border-right: 1px solid lightgrey; overflow: hidden; float: left; width: 125px; height: 40px;'><a style='line-height: 40px; text-decoration: none; text-align: center; display: block; color: #7f8c8d; font-size: 16px;' id='cancelAction' href='#'>Cancel</a></div>" +
								"<div style='overflow: hidden; float: left; width: 125px; height: 40px;'><a style='line-height: 40px; text-decoration: none; text-align: center; display: block; color: #e74c3c; font-size: 16px;' id='deleteRestaurant' href='#' data-delete-it='" + id + "'>Delete</a></div>" +

						   "</div>";
	$("body").append(ConfirmationDiv);

	$("#cancelAction").on("click", function(f)
	{
		$("#confirmationMessage").closest("div").remove();

		f.preventDefault();
	});

	$("#deleteRestaurant").on("click", function(f)
	{
		var ConfirmId = $(this).attr('data-delete-it');

		var deletedRow = $("a[data-delete-restaurant='"+ConfirmId+"']").parent().parent();

		$.ajax(
		{
			type: "POST",
			url: "ajax/deleteRestaurant.php",
			data: 
				{
					id: ConfirmId
				},
			cache: false,
	 
			success: function( msg )
			{	
				deletedRow.slideUp('slow', function() {$(this).remove();});

				$("#deleteRestaurant").parent().parent().closest("div").remove();

			}
		});
		f.preventDefault();
	});
	e.preventDefault();
});
