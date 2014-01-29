var news_title = $("#news_title");
var news_text = $("#news_text");
var news_beschreibung = $("#news_beschreibung");
var datepicker_von = $('#datepicker_von');
var datepicker_bis = $('#datepicker_bis');
var rubriken_message =$('#rubriken_message'); 

$(".save").click(function(){
	if(news_title.val().trim().length === 0 )
	{
		title= true;
		news_title.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		news_title.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}

	if(news_text.val().trim().length === 0 )
	{
		text= true;
		news_text.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		news_text.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}

	if(news_beschreibung.val().trim().length === 0 )
	{
		beschreibung= true;
		news_beschreibung.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		news_beschreibung.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}

	if(datepicker_von.val().trim().length === 0 )
	{
		title= true;
		datepicker_von.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		datepicker_von.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}

	if(datepicker_bis.val().trim().length === 0 )
	{
		title= true;
		datepicker_bis.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		datepicker_bis.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}

	if(rubriken_message.val().trim().length === 0 )
	{
		title= true;
		rubriken_message.css({"border-color": "red", 
		 "border-width":"2px", 
		 "border-style":"solid"});

	}
	else
	{
		rubriken_message.css({"border-color": "#E5E5E5", 
		 "border-width":"2px", 
		 "border-style":"solid"});
	}
});