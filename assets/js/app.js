require('../css/app.scss');

$(document).ready(function () {
    home.init();
});

let home = {};

home.init = function () {
    $('#navbarToggle').click(home.toggleNavbar);

    $(window).keypress(function (e) {
        let key = e.which;
        if(key === 13)
        {
            let inputCommand = $('span#inputCommand');
            let url = inputCommand.data('url');

            $.ajax({
                url: url,
                type: 'POST',
                data: {'input': inputCommand.html()},
                success: home.displayResult
            });

            return false;
        }
    });
};

home.displayResult = function (data) {

    let div = document.createElement('div');

    div.innerHTML = `
    <span class="pr-1">
        <span class="text-green-600">satoshi@jameskitt616</span>:~$
    </span>
    <span>` + data + `</span>
  `;

    $('div#typingContainer').append(div)
};
