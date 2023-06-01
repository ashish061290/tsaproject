function createTable(){

    var container = document.getElementById('layout');  //container main
	var number= document.getElementById('number').value;
	while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
	for(var i=1;i<=number;i++){
	
    var div = document.createElement('div');
	div.setAttribute('class','col-sm-6');
	container.appendChild(div);							// append div

	var table = document.createElement("table");
	table.setAttribute('id','table'+i);
	table.setAttribute('border','3');
	table.setAttribute('width','100%');
	table.setAttribute('class','table table-responsive table-hover');  //append table into div
	div.appendChild(table);

var tableHead = document.createElement('tr');
    tableHead.setAttribute('id','tableheadrow'+i);
	table.appendChild(tableHead);

var tableHeadCol = document.createElement('td');
	tableHeadCol.setAttribute('colspan','2');
	tableHead.appendChild(tableHeadCol);

var tableHeadInp = document.createElement('input');
    tableHeadInp.setAttribute('type','text');
    tableHeadInp.setAttribute('class','form-control');
    tableHeadInp.setAttribute('placeholder','Enter Table Heading');
    tableHeadInp.setAttribute('name','tableheading'+i);
    tableHeadCol.appendChild(tableHeadInp);



for(var k=1;k<=7;k++){
var row = document.createElement('tr');
	row.setAttribute('id','t'+i+'r'+k);
	table.appendChild(row);							//append row into table

	for(var j=1;j<=2;j++){
	var td = document.createElement('td');
	td.setAttribute('id','t'+i+'r'+k+'t'+j);
	row.appendChild(td);						//append td into tr

	var input = document.createElement('input');
	input.setAttribute('type','text');
	input.setAttribute('name','table'+i+'row'+k+'col'+j);    //append input in td
	input.setAttribute('class','form-control');
	if(j==2){
		input.setAttribute('placeholder','Description');
	}
	else{
		input.setAttribute('placeholder','Title');
	}
	td.appendChild(input);
	}
}
	
	}
}
function addRow(str){
var container = document.getElementById('table'+str);
var row = document.createElement('row');
//row.setAttribute('id','t'+i+'r'+i+);
container.appendChild(row);							//append row into table
	for(var j=1;j<=2;j++){
	var td = document.createElement('td');
//	td.setAttribute('id','t'+i+'r'+i+'t'+j);
	row.appendChild(td);						//append td into tr

	var input = document.createElement('input');
	input.setAttribute('type','text');
//	input.setAttribute('name','table'+i+'row'+i+'col'+j);    //append input in td
	input.setAttribute('class','form-control');
	if(j==2){11
		input.setAttribute('placeholder','Description');
	}
	else{
		input.setAttribute('placeholder','Title');
	}
	td.appendChild(input);
	}

}