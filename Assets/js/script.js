(function() {
	insert_file = function () {
		var key = "draft",
		contentEl = document.getElementById("textarea");
		post = document.getElementById("register");
		post.value = contentEl.innerHTML; 
	};


	var color = document.getElementById('panelcolor');

	color.addEventListener('change', setColor);


 function setColor()
	{
		var test = color.value;
		console.log(test);
		document.execCommand('foreColor', false, test);
	}

	doLink = function ()
	{
		var idContent = document.getElementById('textarea');
		var createA = document.createElement('a');
		var link = prompt('LINK')
		if (link != null || link != '') {
			var createAText = document.createTextNode(link);
			createA.setAttribute('href', link);
			createA.appendChild(createAText);
			idContent.appendChild(createA);  	
		}
		else
			alert('Merci de saisir un lien')
	}

var i = 0;
	$("#imageLoader").change(function () {
       var file = this.files[0];
       var reader = new FileReader();
       reader.onload = function (e) {
           i++;
           $('#textarea').append('<img id="img'+ i +'" src="" alt=""/>');
           $('#img' + i).attr("src", e.target.result);
       };
       reader.readAsDataURL(file);
   });

	function addimage()
	{
		selection = window.getSelection()

		console.log(selection);
	}
	value_pdf = function () {

		contentEl = document.getElementById("textarea");
		post = document.getElementById("export");
		post.value = contentEl.innerHTML; 
	};
	
	value_html = function () {     
       contentEl = document.getElementById("textarea");
       post = document.getElementById("html");
       post.value = contentEl.innerHTML;
   };
}());
