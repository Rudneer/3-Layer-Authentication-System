<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Picture Puzzle</title>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/image-puzzle.css" rel="stylesheet" />
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/image-puzzle.js"></script>
</head>
<body>
    <div id="collage">
        <h2>Picture Puzzle</h2>
        <hr />
        <div id="playPanel" style="padding:5px;display:none;">
            <h3 id="imgTitle"></h3> <hr />
            <div style="display:inline-block; margin:auto; width:95%; vertical-align:top;">
                <ul id="sortable" class="sortable"></ul>
                <div id="actualImageBox">
                    <div id="stepBox">
                        <div>Count:</div><div class="stepCount">0</div>
                    </div>
                    <div id="timeBox">
                        Time: <span id="timerPanel"></span> seconds
                    </div>
                    <img id="actualImage" />
                    <div>See the picture and solve the puzzle.</div>
                    <p id="levelPanel">
                        <input type="radio" name="level" id="easy" checked="checked" value="3" /> <label for="easy">Easy</label>
                    </p>
                    <div>
                        <button id="btnRule" type="button" class="btn" onclick="rules();">Rules</button>
                        <button id="newPhoto" type="button" class="btn">Next Picture</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="gameOver" style="display:none;">
            <div style="background-color: #fc9e9e; padding: 5px 10px 20px 10px; text-align: center; ">
                <h2 style="text-align:center">Succesfully Registered!!</h2>
                <h3><a href="index.php" >Click Here To Login </a></h3>
            </div>
        </div>

        <script>
            var images = [
                { src: 'img/neeruti.jpg', title: 'Neeruti manor' },
                { src: 'img/harju_madise.jpg', title: 'Harju-Madis Church' },
                { src: 'img/rahumae.jpg', title: 'Rahumäe train station' },
                { src: 'img/kakumae.jpg', title: 'Kakumäe Harbor' },
                { src: 'img/kohila.jpg', title: 'Kohila mill' }
            ];

            $(function () {
                var gridSize = $('#levelPanel :radio:checked').val();
                imagePuzzle.startGame(images, gridSize);
                $('#newPhoto').click(function () {
                    var gridSize = $('#levelPanel :radio:checked').val();
                    imagePuzzle.startGame(images, gridSize);
                });

                $('#levelPanel :radio').change(function (e) {
                    var gridSize = $(this).val();
                    imagePuzzle.startGame(images, gridSize);
                });
            });
            function rules() {
                alert('Rearrange the pieces so that you get a sample image. \nThe steps taken are counted');
            }
        </script>
    </div>
</body>
</html>