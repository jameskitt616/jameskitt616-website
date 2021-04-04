require('../css/app.scss');

$(document).ready(function () {
    home.init();
});

let home = {};

home.init = function () {

    $(window).keypress(function (e) {
        let key = e.which;
        if(key === 13)
        {
            let input = $('span#input');
            let url = input.data('url');

            let textInput = input.html();
            $.ajax({
                url: url,
                type: 'POST',
                data: {'input': textInput},
                success: function(data) {

                    home.displayResult(data, textInput)
                }
            });

            return false;
        }
    });

    $('div#consoleWindow').click(function(){
        $('#input').focus();
    });
};

home.displayResult = function (data, input) {

    let div = document.createElement('div');

    div.innerHTML = `
    <div class="pr-1">
        <span class="text-green-600">satoshi@jameskitt616</span>:~$ ` + input + `
    </div>
    <div>` + data + `</div>
  `;

    $('div#pastInputs').append(div);
    $('span#input').html('');
};
