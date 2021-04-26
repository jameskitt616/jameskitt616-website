require('../css/app.scss');

$(document).ready(function () {
    home.init();
    blog.init();
});

let home = {};
let blog = {};

home.init = function () {

    // TODO: only for terminal page
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

    $('div#input').click(function(){
        $('#input').focus();
    });
};

blog.init = function () {

    $('a#deletePost').click(blog.deletePost);
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

blog.deletePost = function (e) {
    e.preventDefault();

    let url = $(this).attr('href');

    if (confirm("Are you sure?")) {
        window.location = url;
    }
};
