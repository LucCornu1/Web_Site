function createBreakline(parent, rep)
{
	for(let i = 0; i < rep; i++)
	{
		let br = document.createElement("br");
		parent.appendChild(br);
	}
}



function initInput(type, name, id)
//BUT : Créer un input
//ENTREE : Un type, un nom et un nom d'id
//SORTIE : L'input créé
{
	let input = document.createElement("input");
	input.setAttribute("type", type);
	input.setAttribute("name", name);
	input.setAttribute("id", id);

	return input;
}

function setRange(input, min, max, step, value)
{
	if(input.type != "range")
	{
		return 0;
	}
	
	input.setAttribute("min", min);
	input.setAttribute("max", max);
	input.setAttribute("step", step);
	input.setAttribute("value", value);
}

function initDiv(class_Div, id_Div)
//BUT : Créer un div
//ENTREE : Un nom de classe et un nom d'id
//SORTIE : Le div créé
{
	let div = document.createElement("div");
	div.setAttribute("class", class_Div);
	div.setAttribute("id", id_Div);

	return div;
}

function quickDiv(class_Div, id_Div, parent)
//BUT : Créer rapidement un div
//ENTREE : Un nom de classe, un nom d'id et un parent
//SORTIE : / (Créer directement le div dans la page)
{
	let div = document.createElement("div");
	div.setAttribute("class", class_Div);
	div.setAttribute("id", id_Div);

	parent.appendChild(div);
	return div;
}

function initLabel(for_Label, string)
//BUT : Créer un label
//ENTREE : Le nom d'un input cible et un texte à afficher
//SORTIE : Le label créé
{
	let label = document.createElement("label");
	addAttribute(label, "for", for_Label);
	let node = document.createTextNode(string);
	addElementChild(node, label);

	return label;
}

function addElementChild(child, parent)
{
	parent.appendChild(child);
}

function addAttribute(element, attribute, X)
{
	element.setAttribute(attribute, X);
}



function createCheckbox(tab)
//BUT : Créer une liste de checkbox
//ENTREE : Un tableau avec les valeurs à entrer
//SORTIE : / (créer directement la liste dans la page)
{
	let box = initDiv("box", "container0");

	addElementChild(box, infos);

	let check;
	let label;
	let node;

	for(let i = 0; i < tab.length; i++)
	{
		label = initLabel(tab[i], tab[i]);
		addElementChild(label, box);

		check = initInput("checkbox", tab[i], "check"+tab[i]);
		addAttribute(check, "value", tab[i]);
		addAttribute(check, "class", "progCheckbox");
		if(i==0)
		{
			addAttribute(check, "checked", "checked");
		}

		addElementChild(check, box);
	}
}

function curseurLangue()
//BUT : Créer un curseur pour déterminer le niveau en Anglais
//ENTREE : /
//SORTIE : / (créer directement le curseur dans la page)
{
	let box = initDiv("box", "container1");
	addElementChild(box, infos);

	let para = initDiv("text", "p0");
	let node = document.createTextNode("Votre niveau en anglais : ");

	addElementChild(node, para);
	addElementChild(para, box);

	let range = initInput("range", "lvlAnglais", "lvlAnglais");
	addAttribute(range, "value", "0");
	addAttribute(range, "max", "5");
	addAttribute(range, "min", "0");
	addAttribute(range, "step", "1");
	addAttribute(range, "onchange", "edit(this)");

	addElementChild(range, box);

	para = initDiv("text", "p1");
	node = document.createTextNode("A1");

	addElementChild(node, para);
	addElementChild(para, box);
}

function createSoloMail()
{
	let label = initLabel("mail1", "Mail 1 : ");
	addElementChild(label, infos);

	let mail1 = initInput("mail", "mail1", "mail1");
	addAttribute(mail1, "required", "required");
	//console.log(mail1);

	addElementChild(mail1, infos);

	createBreakline(infos, 1);
}

function createMailInput()
//BUT : Créer deux champs mails et un bouton pour mettre le deuxième champ égal au premier
//ENTREE : /
//SORTIE : / (créer directement les champs dans la page)
{
	let label = initLabel("mail1", "Mail 1 : ");
	addElementChild(label, infos);

	let mail1 = initInput("mail", "mail1", "mail1");
	addAttribute(mail1, "required", "required");
	//console.log(mail1);

	addElementChild(mail1, infos);

	createBreakline(infos, 1);

	label = initLabel("mail2", "Mail 2 : ");
	addElementChild(label, infos);

	let mail2 = initInput("mail", "mail2", "mail2");
	addAttribute(mail2, "required", "required");
	addAttribute(mail2, "onblur", "resetCheck()");
	//console.log(mail2);

	addElementChild(mail2, infos);

	createBreakline(infos, 1);

	label = initLabel("check", "Same ? ");
	addElementChild(label, infos);

	let check = initInput("checkbox", "check", "check");
	addAttribute(check, "onclick", "sameMail()");

	addElementChild(check, infos);
}

function edit(X)
//BUT : Changer l'affichage pour le niveau d'anglais lors du changement du curseur
//ENTREE : X, le curseur
//SORTIE : / (l'élement est modifié directement dans la page)
{
	let str = X.value;
	if(str == 0)
	{
		document.getElementById("p1").innerHTML = "A2";
	}else if(str == 1){
		document.getElementById("p1").innerHTML = "A1";
	}else if(str == 2){
		document.getElementById("p1").innerHTML = "B2";
	}else if(str == 3){
		document.getElementById("p1").innerHTML = "B1";
	}else if(str == 4){
		document.getElementById("p1").innerHTML = "C2";
	}else if(str == 5){
		document.getElementById("p1").innerHTML = "C1";
	}
}

function resetCheck()
//BUT : Décocher la checkbox lors du changement du champs 'mail2'
//ENTREE : /
//SORTIE : /
{
	let check = document.getElementById("check");

	check.checked = false;
}

function sameMail()
//BUT : Mettre le champ mail2 = au champ mail1 lorsqu'on coche la checkbox
//ENTREE : /
//SORTIE : /
{
	let mail1 = document.getElementById("mail1");
	let mail2 = document.getElementById("mail2");

	if(mail1.value != mail2.value)
	{
			mail2.value = mail1.value;
	}else if(mail1.value == mail2.value){
			console.log("YOUPIIIIIIIIIIII");
	}else{
			mail2.value = "";
	}
}

function createListeBox(tab, name, string)
//BUT : Créer une listeBox
{
	let option;

	let label = initLabel(name, string);
	addElementChild(label, infos);

	let select = document.createElement("select");
	addAttribute(select, "name", name);

	addElementChild(select, infos);

	for(let i = 0; i < tab.length; i++)
	{
		option = document.createElement("option");
		addAttribute(option, "value", tab[i]);
		addAttribute(option, "name", tab[i]);
		console.log(option.value);

		node = document.createTextNode(tab[i]);

		addElementChild(node, option);
		addElementChild(option, select);
	}
}

function createPhone()
{
	let label = initLabel("phone", "Numéro de téléphone : ");
	addElementChild(label, infos);

	let phone = initInput("tel", "phone", "phone");
	addAttribute(phone, "pattern", "[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}");
	addAttribute(phone, "required", "required");

	addElementChild(phone, infos);
}

function changePage()
{
	let form = document.getElementById("form");

	form.submit;
}