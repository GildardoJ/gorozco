            $("#letterBtn").click( function(){ 
                //alert("hi");
                //updateImage();
                var boxVal = $("#letterBox").val();
                console.log("You pressed the button and it had the value: " + boxVal);
                alert(boxVal);
                
            }); // jQuery 
            
            $(".letter").click( function(){ alert("hi"); }); // click event, when any button is clicked. 
            
            function updateImage(){
                //document.getElementById("man").innerHTML = "<img src = 'img/stick_5.png'>"
                //$("#man").html("<img src = 'img/stick_5.png'>"); //jQuery $ is a funciton. accessing element by its id with '#' or '.'
                $("img").attr("src","img/stick_3.png"); // another way to change the src image.
                
            }
            
            var selectedWord = ""; // set as global?
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = [{ word: "snake", hint: "It's a reptile" },
                         { word: "monkey", hint: "It's a mammal" },
                         { word: "beetle", hint: "It's an insect"},
                         { word:  "otter", hint: "It's a mammal"}];
            var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            window.onload = startGame();
                
          
            
            
            function startGame(){
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
            }
            
            function pickWord(){
                var randomInt = Math.floor( Math.random() * words.length ); // use of var for variable makes the variable only valid in the function. 
                selectedWord = words[randomInt].word.toUpperCase();
                selectedHint = words[randomInt].hint;
                //console.log(selectedWord);
               
            }
            
            function updateBoard(){
                $("#word").empty();
                
                for (var letter of board){
                    document.getElementById("word").innerHTML += letter + " ";
                }
                
                $("#word").append("<br/>");
                $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
            }
            
            function updateWord(positions, letter){
                for (var pos of positions){
                    board = replaceAt(board, pos, letter);
                }
                
                updateBoard();
            }
            
            function updateMan(){
                $("#hangImg").attr("src","img/stick_" + (6 - remainingGuesses) + ".png");
            }
            
            function disableButton(btn){
                btn.prop("disable",true);
                btn.attr("class","btn btn-danger");
            }
            function replaceAt(str,index,value){
                return str.substr(0, index) + value + str.substr(index + value.length);
            }
            
            function initBoard(){
                for (var i =0; i < selectedWord.length;i++){
                    board += "_";
                }
                
                console.log(board);
            }
            
            function createLetters(){
                for (var letter of alphabet){
                    $("#letters").append("<button class = 'letter' id='"+letter+"'>" + letter + "</button>");
                }
            }
            
            function checkLetter(letter){
                var positions = new Array(); // declared empty array.
                
                console.log(remainingGuesses);
                //console.log(selectedWord);
                
                for (var i=0 ; i < selectedWord.length; i ++){
                    
                    if (letter == selectedWord[i]){
                        positions.push(i);
                    }
                }
                
                if (positions.length > 0){
                    updateWord(positions, letter);
                    
                    if (!board.includes('_')){
                        endGame(true);
                    }
                    
                }else{
                    remainingGuesses--;
                    updateMan();
                    //$("#hangImg").attr("src","img/stick_" + (6 - remainingGuesses) + ".png" );
                }
                
                if (remainingGuesses <= 0){
                    endGame(false);
                }
                
            }
            
            function endGame(win){
                console.log(win);
                $("#letters").hide();
                
                if (win) {
                    $('#won').show();
                } else {
                    $('#lost').show();
                }
            }
            //events , all.
            
            $(".replayBtn").on("click", function(){
                location.reload(); 
            });
            
            $(".letter").click( function(){ 
                //alert($(this).attr("id")); 
                checkLetter( $(this).attr("id") );
                disableButton($(this));
                
            }); // click event, when any button is clicked. 
                                                                // display attribute of button, the id. 
        