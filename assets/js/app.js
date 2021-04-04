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
            let url = $('span#inputCommand').data('url');
            console.log(url);

            $.ajax({
                url: url,
                type: 'GET',
                // data: {'searchTerm': searchTerm},
                success: home.displayResult
            });

            return false;
        }
    });
};

home.displayResult = function (data) {

    console.log(data)

    let div = document.createElement('div');

    div.innerHTML = `
    <span class="pr-1">
        <span class="text-green-600">haxxor@jameskitt616</span>:~$
    </span>
    <span>` + data + `</span>
  `;

    $('div#typingContainer').append(div)
};
