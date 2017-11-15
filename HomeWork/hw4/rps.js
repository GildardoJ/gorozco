var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById('btnGo');
	deselectAll();
}

function deselectAll(){
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
}

function select(choice){
	//alert(choice);
	playerChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if(choice=='rock') btnRock.style.backgroundColor = '#888888';
	if(choice=='paper') btnPaper.style.backgroundColor = '#888888';
	if(choice=='scissors') btnScissors.style.backgroundColor = '#888888';
	
	btnGo.style.display = 'block';
}

function go(){
	var txtEndTittle = document.getElementById('txtEndTittle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	
	var numChoice = Math.floor(Math.random()*3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice==0){
		computerChoice = 'rock';
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTittle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';	
		} 
		else if(playerChoice=='paper'){
			txtEndTittle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		else if(playerChoice=='scissors'){
			txtEndTittle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'You LOSE';
		}
	} 
	else if(numChoice==1){
		computerChoice = 'paper';
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTittle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU LOSE';	
		} 
		else if(playerChoice=='paper'){
			txtEndTittle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
		else if(playerChoice=='scissors'){
			txtEndTittle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'You WIN';
		}
	}
	else if(numChoice==2){
	    computerChoice = 'scissors';
	    imgComputer = 'images/scissors';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTittle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'YOU WIN';	
		} 
		else if(playerChoice=='paper'){
			txtEndTittle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'You LOSE';
		}
		else if(playerChoice=='scissors'){
			txtEndTittle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
	}	
	document.getElementById('endScreen').style.display ='block';
	//alert(playerChoice + ', ' + computerChoice);
}

function startGame(){
	//alert('start Game button pressed!');
	document.getElementById('introScreen').style.display = 'none';
}

function replay(){
	document.getElementById('endScreen').style.display = 'none';
	btnGo.style.display = 'none';
	
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	imgPlayer.src= 'images/question.png';
	document.getElementById('imgComputer').src = 'images/question.png';
	
}