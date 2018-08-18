
var canvas = document.getElementById('snakeCanvas');
var context = canvas.getContext('2d');
var canvasWidth = canvas.width;
var canvasHeight = canvas.height;
var boxD = 25;
var xBox = 0;
var yBox = 0;
var snakeCol;
var d = "right";
var increX = Math.ceil((Math.random()*10));
var increY = Math.ceil((Math.random()*10));
var snakeArray = [];
var snakeLength = 5; 
var foodX, foodY;
var score = 0;
var myInterval; 

$('#start').click(function(){


	var newFoodCoords = createFood();
	foodX = newFoodCoords.x;
	foodY = newFoodCoords.y;
	d = "right";
	if(myInterval){
		clearInterval(myInterval);	
	}
	myInterval = setInterval(moveSnake, 500)
	score = 0;
	document.getElementById('scoreBoard').innerHTML = score;	
	$('#msg').html("").hide();
	snakeCol = '#663300'
	snakeArray = []; 
	snakeLength = 5
	for(var i = snakeLength-1; i>=0; i--){
		snakeArray.push({x: i, y:0});
	}
});

function drawBoxes(x, y, col){

		var r = boxD/2;
		context.beginPath();
		context.fillStyle = col;
		context.arc((x*boxD)+r, (y*boxD)+r, r, 0, 2*Math.PI);
		context.fill();
		context.closePath();
		
		// this creates a square instead of circle
// 		context.fillStyle = col;
// 		context.fillRect(x*boxD, y*boxD, boxD, boxD);
// 		context.strokeStyle = "#ffffff";
// 		context.strokeRect(x*boxD, y*boxD, boxD, boxD);
}

function moveSnake(){
		// clear canvas to redraw
		context.clearRect(0,0,canvasWidth,canvasHeight);
		var cPos = snakeArray[0];
		var newX = cPos.x;
		var newY = cPos.y;
		if(d === "left"){
			newX--;
		}
		if(d === "right"){
			newX++;
		}
		if(d === "down"){
			newY++;
		}
		if(d === "up"){
			newY--;
		}
		
		var newLink = {};
		
		if(newX == foodX && newY == foodY){
			score++;
			document.getElementById('scoreBoard').innerHTML = score;	
			newLink = {x:foodX, y:foodY};
			snakeLength++;
			var newFoodCoords = createFood();
			foodX = newFoodCoords.x;
			foodY = newFoodCoords.y;
		}else{
			snakeArray.pop();
			newLink = {x:newX, y:newY};
		}
	
		if(checkCollision(newX, newY, snakeArray) || newX*boxD >= canvasWidth || newY*boxD >= canvasHeight || newY*boxD < 0  || newX*boxD < 0){
			clearInterval(myInterval);
			snakeCol = "#D83E3E";
			
			$.get('api/checkScore.php', function(data){ 
				if(data.highScore < score){ 
					$('#msg').html("New High Score").show(); 
					$('#newHighScore').show(); 
					$('#playerScore').val(score);
				}
				else
				{ 
					$('#msg').html("Game Over").show(); 
				} 
			});
		}
		
	
		snakeArray.unshift(newLink);
		
		
		for(var i = 0; i<snakeLength; i++){
			var c = snakeArray[i];
			drawBoxes(c.x, c.y, snakeCol);
		}
	
		drawBoxes(foodX, foodY, '#1a1a1a');
}

function checkCollision(x, y, array){
		for(var i = 0; i < array.length; i++){
			if(array[i].x == x && array[i].y == y)
			 return true;
		}
		return false;
}

function createFood(){
	tempFoodX = Math.ceil(Math.random()*(canvasWidth/boxD)-1);
	tempFoodY = Math.ceil(Math.random()*(canvasHeight/boxD)-1);
	for (var i = 0; i < snakeArray.length; i++) {
		   var c = snakeArray[i];
           if (c.x == tempFoodX && c.y == tempFoodY) {
    			return createFood();
		   }
  	}
	result = {x:tempFoodX, y:tempFoodY}
	return result;
		
}

// keyboard events
document.addEventListener("keydown", function(ev){
		var pickedKey = ev.which;
		if(pickedKey == "37" && d != "right"){
			d = "left";
		}else if(pickedKey == "38" && d != "down"){
			d = "up";
		}else if(pickedKey == "39" && d != "left"){
			d = "right";
		}else if(pickedKey == "40" && d != "up"){
			d = "down";
		}
})

///////////////// game management ///////////////

$.getJSON('api/listScores.php', scoreTableBuilder);


function scoreTableBuilder (myData) {
	$.each(myData, function(propertyName, propertyValue){  

	var tempHTML = ""; $.each(myData, function(name, val){ 
	tempHTML +='<li>'; 
	tempHTML +='<span>'; 
	tempHTML += val.dbScore; 
	tempHTML +='</span>' 
	tempHTML +='<span>' 
	tempHTML += val.dbPlayer; 
	tempHTML +='</span>' 
	tempHTML +='</li>' }); 
	
	$('.highScores').html(tempHTML);
	})
}

$('#playerUpdate').on('click', function(ev){ 
	ev.preventDefault(); 
	var formVars = $('#playerInfo').serialize(); 
	$.post('api/addNewHighScore.php', formVars, function(data){ 
		$('#newHighScore').hide(); scoreTableBuilder(data)
	});
})