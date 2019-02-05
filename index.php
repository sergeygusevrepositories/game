<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>The game</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(function() {
            var player = 0;
            var computer = 0;

            function gameOver(element, title) {
                if (element == 10) {
                    $('.content').before("<div class='modal'>" + title + "</div>");
                    $('.modal').css({
                        marginLeft: '-' + $('.modal').width() + 'px'
                    });
                    $('button').remove();
                }
            }

            $("button").on('click', function () {
                $('.square').removeClass('green').removeClass('red').removeClass('yellow')
                var index = Math.floor(Math.random() * $('.square').length);
                $('.square').eq(index).addClass('yellow')
                setTimeout(function () {
                    var thisSquare = $('.square').eq(index);
                    if (thisSquare.hasClass('green'))
                        return;
                    if (thisSquare.hasClass('yellow')) {
                        thisSquare.addClass('red');
                        computer += 1;
                        $('#computer').val(computer);
                        gameOver(computer, "Computer win!");
                    }
                }, $("#time").val());
                $('.square.yellow').on('click', function () {
                    if ($('.square').eq(index).hasClass('red'))
                        return;
                    $(this).addClass('green');
                    player += 1;
                    $('#player').val(player);
                    gameOver(player, "You win!");
                })
            })
        })
    </script>
    <style type="text/css">
        .content {
            width: 590px;
            margin: 200px auto;
            position: relative;
        }

        .square {
            width: 50px;
            height: 50px;
            background: blue;
            display: inline-block;
            margin: 0;
        }

        .yellow {
            background: yellow;
        }

        .red {
            background: red;
        }

        .green {
            background: green;
        }

        .modal {
            border: 1px solid blue;
            position: absolute;
            z-index: 10;
            left: 50%;
            margin-top: 200px;
            background: white;
            text-align: center;
            padding: 30px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>

<div class="content">
    <?php for ($i = 1; $i <= 100; $i ++ ):?>
        <div class="square"></div>
    <?php endfor;?>
    <div class="clear"></div>
    <label for="time">Time</label><br />
    <input value="1000" type="text" id="time" /><br />
    <label for="player">Player</label><br />
    <input type="text" id="player" /><br />
    <label for="computer">Computer</label><br />
    <input type="text" id="computer" /><br />
    <button>Начать</button>
</div>

</body>
</html>

